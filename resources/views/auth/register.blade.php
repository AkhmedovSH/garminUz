@extends('layouts.app')

@section('content')
<div class="account-create_container">
        <div class="account-create_container-title">
            GARMIN INTERNATIONAL | ACCOUNT | CREATE
        </div>
        <div class="account-create_container-main">
            <form>
                <h5>Please complete the fields below:</p>
                    <div class="form-group">
                        <label for="exampleInputName">Name*</label>
                        <input type="name" class="form-control" id="name" aria-describedby="emailHelp">
                        <small id="name" class="form-text text-muted">Enter your Name</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email Address*</label>
                        <input type="email" class="form-control" id="Email" aria-describedby="emailHelp">
                        <small id="Email" class="form-text text-muted">You'll use your email address to sign in</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRetypeEmail">Retype Email Address*</label>
                        <input type="email" class="form-control" id="RetypeEmail" aria-describedby="emailHelp">
                        <small id="RetypeEmail" class="form-text text-muted">Enter your desired email again</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password*</label>
                        <input type="password" class="form-control" id="password" aria-describedby="emailHelp">
                        <small id="password" class="form-text text-muted">Minimum password length is 8 characters.
                            Please use at least 1 uppercase letter, 1 lowercase letter and 1 number. Forward
                            slaches, spaces and double quotes are not allowed.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputretypedPassword">Retype Password*</label>
                        <input type="password" class="form-control" id="retypepassword" aria-describedby="emailHelp">
                        <small id="retypepassword" class="form-text text-muted">Enter your desired password again</small>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="exampleCheckbox1" value="option1">
                        <label class="form-check-label" for="exampleRadios1">
                            Get product news and promotions based on your preferences and registered devices.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="exampleCheckbox2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            I have read and agree to the Garmin <a href="#">Terms of Use.</a>
                        </label>
                    </div>
                    <p>Garmin takes your privacy seriously. Our <a href="#">Privacy Policy</a> is available for
                        your review.</p>

                    <button class="create-account_button create-account_button-disabled" id="disabled-button">Create
                        Account</button>
            </form>
        </div>


    </div>
@endsection
