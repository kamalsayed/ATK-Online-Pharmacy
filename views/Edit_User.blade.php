@extends('layout.AdminInterface')

@section('section')
    <style>
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <div class="text-center" style="padding:50px 0">
        <div class="logo">Update or Delete user </div>
        <!-- Main Form -->
        <div class="login-form-1">

            <form id="register-form" class="text-left" method="post" action="{{url('/update_delete')}}">
                {{csrf_field()}}
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">

                        <select id="reg_email" type="text" name="reg_email" style="width :  200px ; height : 40px">
                            @foreach($users as $user)
                            <option value="{{$user->email}}">{{$user->email}}</option>
                                @endforeach
                        </select>
                        <div class="form-group">

                            <select id="type" type="text" name="type" style="width : 200px ; height : 40px">
                                <option value="update">Update</option>
                                <option value="del">Delete</option>
                            </select>
                        </div>

                    </div>
                    <button type="submit" class="login-button" value="add" name="add"><i class="fa fa-chevron-right"></i></button>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>



@stop