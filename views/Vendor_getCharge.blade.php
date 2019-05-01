@extends('layout.VendorInterface')

@section('section')

<div class="text-center" style="padding:50px 0">
    <div class="logo">Get Charge</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="register-form" class="text-left" action="{{url('/vendor_collect')}}" method="post">
            {{csrf_field()}}
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="reg_username" class="sr-only">Your Charge</label>
                        <input type="text" class="form-control" id="reg_charge" name="reg_charge" placeholder="{{$cash->cash}}" readonly>
                    </div>
                </div>
                <button type="submit" id="get" value="get" name="get" class="btn btn-primary pull-right">collect money</button>
            </div>
        </form>
    </div>
    <!-- end:Main Form -->
</div>

    @stop