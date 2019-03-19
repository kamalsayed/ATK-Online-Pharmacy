@extends('ClientInterface')

@section('section')

    <div class="text-center" style="padding:50px 0">
    <div class="logo">Add Vendor</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="register-form" class="text-left" >
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="reg_username" class="sr-only">User Name</label>
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
                        <input type="text" class="form-control" id="reg_fname" name="reg_fname" placeholder="first name">
                    </div>
                    <div class="form-group">
                        <label for="reg_fullname" class="sr-only">Last Name</label>
                        <input type="text" class="form-control" id="reg_lname" name="reg_lname" placeholder="last name">
                    </div>
                </div>
                <button type="submit" class="login-button" value="add" name="add"><i class="fa fa-chevron-right"></i></button>
            </div>
        </form>
    </div>
    <!-- end:Main Form -->
</div>
@stop