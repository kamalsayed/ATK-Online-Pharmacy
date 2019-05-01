@extends('layout.AdminInterface')

@section('section')

    <div class="text-center" style="padding:50px 0">
        <div class="logo">Update</div>
        <!-- Main Form -->
        <div class="login-form-1">

            <form id="register-form" class="text-left" method="post" action="{{url('/Update_user')}}">
                {{csrf_field()}}
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="reg_name" class="sr-only">Name</label>
                            <input type="text" class="form-control" id="reg_name" name="reg_name" value="{{$old->name}}">
                        </div>
                        <div class="form-group">
                            <label for="reg_email" class="sr-only">Email</label>
                            <input type="text" class="form-control" id="reg_email" name="reg_email" value="{{$old->email}}">
                        </div>

                        <div class="form-group">
                            <label for="reg_password" class="sr-only">Password</label>
                            <input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password">
                        </div>

                    </div>
                    <button type="submit" class="login-button" value="{{$old->id}}" name="add"><i class="fa fa-chevron-right"></i></button>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>


    @stop


