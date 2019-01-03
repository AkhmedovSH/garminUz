@extends('layout1')

@section('content')
    <!-- Main Content -->
    <main class="main-content">

        <!-- Error -->
        <div class="container">
            <div class="error-area tc-padding">
                <div class="error-heading">
                    <span>404</span>
                    <h2><span>OOPS!</span> NOT FOUND!</h2>
                </div>
                <p> APOLOGIES, BUT WE WERE UNABLE TO FIND WHAT YOU WERE LOOKING FOR.</p>
                <form action="#">
                    <input type="text" placeholder="Search..." required>
                    <button class="btn-1 sm shadow-0" type="submit">Submit</button>
                </form>
            </div>
        </div>
        <!-- Error -->

    </main>
    <!-- Main Content -->
@endsection