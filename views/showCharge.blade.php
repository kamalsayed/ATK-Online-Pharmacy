@if(Auth::user()->type==2)
@extends('layout.ClientInterface')
@section('section')


    <div class="text-center" style="padding:50px 0">
        <div class="logo">Add Charge</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="register-form" class="text-left" action="{{url('/addCharge')}}" method="post">
                {{csrf_field()}}
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="reg_charge" class="sr-only">Current Cash</label>
                            <input type="text" class="form-control" id="reg_charge" name="reg_charge" placeholder= {{$charge[0]->cash}} readonly >
                            <label for="reg_charge" class="sr-only">Add charge</label>
                            <input type="text" class="form-control" id="reg_charge" name="reg_charge" placeholder="Charge">
                        </div>
                    </div>
                    <button type="submit" class="login-button" name="buy"><i class="fa fa-chevron-right"></i></button>
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
@endsection
@endif

@if(Auth::user()->type==1)
    @extends('layout.AdminInterface')
@section('section')


    <div class="text-center" style="padding:50px 0">
        <div class="logo">Add Charge</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="register-form" class="text-left" action="{{url('/addCharge')}}" method="post">
                {{csrf_field()}}
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="reg_charge" class="sr-only">Current Cash</label>
                            <input type="text" class="form-control" id="reg_charge" name="reg_charge" placeholder= {{$charge[0]->cash}} readonly >
                            <label for="reg_charge" class="sr-only">Add charge</label>
                            <input type="text" class="form-control" id="reg_charge" name="reg_charge" placeholder="Charge">
                        </div>
                    </div>
                    <button type="submit" class="login-button" name="buy"><i class="fa fa-chevron-right"></i></button>
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
@endsection
@endif