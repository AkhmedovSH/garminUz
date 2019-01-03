<?php

namespace App\Http\Controllers;

use App\Book;
use App\Post;
use App\Task;
use App\User;
use App\Chapter;
use App\Exercise;
use App\Solution;
use App\Task_answers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('pages.profile',compact('user','solutions'));
    }

    public function viewSomeoneProfile($user_id){
        $user = User::where('id', $user_id)->firstOrFail();
        $solutions = Solution::where('user_id', $user->id)->with('exercise','exercise.subject', 'exercise.subject.chapters2', 'exercise.subject.chapters2.book')->paginate(10);
        return view('pages.profile',compact('user','solutions'));
    }



    public function ownProfilBooks(){
        $user = Auth::user();
        $solutions = Solution::where([
        ['user_id', '=', $user->id],
        ['status', '=', 1],])
        ->with('exercise','exercise.subject', 'exercise.subject.chapters2', 'exercise.subject.chapters2.book')
        ->paginate(15);
        return view('pages.profile_books',compact('user','solutions'));
    }

    public function viewSomeoneProfileBooks($user_id){
       
        $user = User::where('id', $user_id)->firstOrFail();
        $solutions = Solution::where([
        ['user_id', '=', $user->id],
        ['status', '=', 1],])
        ->with('exercise','exercise.subject', 'exercise.subject.chapters2', 'exercise.subject.chapters2.book')
        ->paginate(15);
        return view('pages.profile_books',compact('user','solutions'));
    }



    public function ownProfilTasksAdded(){
        $user = Auth::user();
        $tasks = Task::where('user_id',$user->id)->paginate(15);
        return view('pages.profile_taskadded',compact('user','tasks'));
    }

    public function viewSomeoneProfileTasks($user_id){
        $user = User::where('id', $user_id)->firstOrFail();
        $tasks = Task::where('user_id',$user->id)->paginate(15);
        return view('pages.profile_taskadded',compact('user','tasks'));
    }


    public function ownProfilTasksAnswers(){
        $user = Auth::user();
        $tasks = Task::where('user_id',$user->id)->get();
        foreach ($tasks as $task) {
            $id[] = $task->id;
        }
        $task_answers = Task_answers::whereIn('task_id', $id)->with('task')->paginate(15);
        return view('pages.profile_taskanswers',compact('user','task_answers'));
    }

    public function viewSomeoneProfileTasksAnswers($user_id){
        $user = User::where('id', $user_id)->firstOrFail();
        $tasks = Task::where('user_id',$user->id)->get();
        foreach ($tasks as $task) {
            $id[] = $task->id;
        }
        $task_answers = Task_answers::whereIn('task_id', $id)->with('task')->paginate(15);
        return view('pages.profile_taskanswers',compact('user','task_answers'));
    }


    public function payment(){
        $user = Auth::user();
        return view('pages.profile_payment',compact('user'));
    }


    public function editOwnProfile(){
        $user = Auth::user();
        return view('pages.edit-profile',['user' => $user]);
    }


    public function store(Request $request){
        $this->validate($request,[
           'firstname' => 'nullable',
           'lastname' => 'nullable',
           'college' => 'nullable',
           'highschool' => 'nullable',
           'biography' => 'nullable',
           'shortinfo' => 'nullable',
           'avatar' => 'nullable|image|mimes:jpg,png,jpeg|max:1024'
        ]);

        $user = Auth::user();
        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));
        return redirect()->back()->with('status', 'Данные были изменены');
    }
}
