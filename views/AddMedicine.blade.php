@extends('layout.VendorInterface')

@section('section')

    <div class="container">
        <div class="col-md-5">
            <div class="form-area">
                <form role="form" method="post"  action='{{url('AddMedicine/store')}}' enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Add Medicine Form</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="Name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="Price" name="Price" placeholder="Price" required>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="Expire" name="Expire" placeholder="Expire : dd/mm/yyyy" required>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="Production" name="Production" placeholder="Production : dd/mm/yyyy" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="Brand" name="Brand" placeholder="Brand Name" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity" required>
                    </div>
                    <div class="form-group">

                        <select id="type" type="text" name="type" style="width : 100% ; height : 40px">
                            <option value="liquid">liquid</option>
                            <option value="capsule">capsule</option>
                            <option value="tablets">tablets</option>
                        </select>
                    </div>
                    <div>
                        <input type="file" name="file" id="file">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" type="textarea" id="message" name="Description" placeholder="Description" maxlength="255" rows="10"></textarea>
                    </div>
                    <button type="submit" id="submit" value="Add_Medicine" name="Add_Medicine" class="btn btn-primary pull-right">Add Medicine</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .form-area
        {
            background-color: #FAFAFA;
            padding: 10px 40px 60px;
            margin: 20% 75% 5%;

            width: 100%;
            border: 1px solid GREY;
        }
    </style>
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