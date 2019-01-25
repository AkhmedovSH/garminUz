<?php

namespace App\Providers;
use App\Post;
use App\User;
use App\Comment;
use App\Category;
use App\Solution;
use App\BCategory;
use App\R_category;
use Lavary\Menu\Menu;
use App\Video_comments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use ied3vil\LanguageSwitcher\Facades\LanguageSwitcher;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {     
        view()->composer('layouts.app', function($view){
            $menu=BCategory::all();
            $m_builder=\Menu::make('MyNav', function ($m) use($menu){
                foreach ($menu as $item){
                    if($item->parent_id==0){
                        $m->add($item->title,  $item->parent_id)->id($item->id)->data('icons', $item->icons);
                    }
                    else {
                        if($m->find($item->parent_id)){
                            $m->find($item->parent_id)->add($item->title, $item->parent_id)->id($item->id);
                        }
                    }
                }
            });
            //dd($m_builder->items);
            $view->with('menu', $m_builder); 
            $view->with('black_title', DB::table('black_title')->first());
        });

        Blade::directive('set',function($exp) {

            list($name,$val) = explode(',',$exp);

            return "<?php $name = $val ?>";

        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
