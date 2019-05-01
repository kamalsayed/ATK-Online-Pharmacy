@extends('layout.AdminInterface')

@section('section')
    <div class="text-center" style="padding:50px 0">
        <div class="logo">Buy Medicine</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="register-form" class="text-left" action="{{url('/Adminbuy/payment')}}" method="post">
                {{csrf_field()}}
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <select class="form-control" id="medicine" name="medicine" style="width:100%;">
                                <?php
                                foreach($data as $dat){
                                    echo"
                            <option value={$dat->id}>{$dat->name} : {$dat->brand} : {$dat->price}</option>";
                                }
                                ?>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="reg_Quantity" class="sr-only">Quantity</label>
                            <input type="text" class="form-control" id="reg_Quantity" name="reg_Quantity" placeholder="Quantity">
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

@stop