@extends('layout.AdminInterface')

@section('section')

    <div class="text-center" style="padding:50px 0">
    <div class="logo">Add Vendor</div>
    <!-- Main Form -->
    <div class="login-form-1">

        <form id="register-form" class="text-left" method="post" action="/newvendor">
            {{csrf_field()}}
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="reg_name" class="sr-only">Name</label>
                        <input type="text" class="form-control" id="reg_name" name="reg_name" placeholder="name">
                    </div>
                    <div class="form-group">
                    <label for="reg_email" class="sr-only">Email</label>
                    <input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="email">
                    </div>

                    <div class="form-group">
                        <label for="reg_password" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password">
                    </div>

                    <div class="form-group">
                        <label for="reg_password_confirm" class="sr-only">Password Confirm</label>
                        <input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" placeholder="confirm password">
                    </div>

                </div>
                <button type="submit" class="login-button" value="add" name="add"><i class="fa fa-chevron-right"></i></button>
            </div>
        </form>
    </div>
    <!-- end:Main Form -->
</div>

    @if(count($errors)>0)
    <div class="alert alert-danger">
    <ul class="list-group">
        @foreach($errors->all() as $error)
        <li class="list-group-item">{{$error}}</li>
        @endforeach
    </ul>

    </div>

    @endif



@stop