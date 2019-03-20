@extends('layout.app')

@section('content')
<!-- Where all the magic happens -->
<!-- LOGIN FORM -->
<div class="text-center" style="padding:50px 0">
    <div class="logo">login</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="login-form" class="text-left" action="../app/logincontroller.php" method="post">
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="lg_username" class="sr-only">Username</label>
                        <input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label for="lg_password" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="password">
                    </div>

                </div>
                <button name="login" value="login" type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
            </div>

        </form>
    </div>
    <!-- end:Main Form -->
</div>

<!-- REGISTRATION FORM -->
<div class="text-center" style="padding:50px 0">
    <div class="logo">register</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="register-form" class="text-left" action="../app/logincontroller.php" method="post">
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="reg_username" class="sr-only">Email address</label>
                        <input type="text" class="form-control" id="reg_username" name="reg_username" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label for="reg_password" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password">
                    </div>
                    <div class="form-group">
                        <label for="reg_password_confirm" class="sr-only">Password Confirm</label>
                        <input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" placeholder="confirm password">
                    </div>

                    <div class="form-group">
                        <label for="reg_email" class="sr-only">Email</label>
                        <input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="reg_fullname" class="sr-only">First Name</label>
                        <input type="text" class="form-control" id="reg_firstname" name="reg_firstname" placeholder="first name">
                    </div>
                    <div class="form-group">
                        <label for="reg_fullname" class="sr-only">Last Name</label>
                        <input type="text" class="form-control" id="reg_lastname" name="reg_lastname" placeholder="last name">
                    </div>


                </div>
                <button type="submit" class="login-button" value="reg" name="reg"><i class="fa fa-chevron-right"></i></button>
            </div>
        </form>
    </div>
    <!-- end:Main Form -->
</div>


@stop


