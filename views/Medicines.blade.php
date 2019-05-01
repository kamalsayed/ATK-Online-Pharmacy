@extends('layout.ClientInterface')
@section('section')
    <style>
        textarea{
            resize: none;
        }
    </style>
<table style="margin-left:3%;" xmlns="http://www.w3.org/1999/html">
@for($i=0;$i<count($display);$i++)
    @if($i <= 4)
            <th>
                <form method="post" action="{{url('/Buy_client')}}" >
                        {{csrf_field()}}

                    <div class="card" style="width:18rem;height:50rem;margin:30px;">
                    <img class="card-img-top" src="{{$display[$i]->file}}" alt="Card" style="height : 200px;">
                    <div class="card-body">
                        <label >Name : {{$display[$i]->name}} </label>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" readonly >{{$display[$i]->description }}</textarea>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Expire Date : {{$display[$i]->expire_date }}</li>
                    <li class="list-group-item">Production Date : {{$display[$i]->production_date }}</li>
                    <li class="list-group-item">Type : {{$display[$i]->type }}</li>
                    </ul>
                    <div class="card-body">
                        <input type="text" class="form-control" id="reg_Price" name="reg_Price" placeholder="Price :  {{$display[$i]->price }} $" readonly>
                        <input type="text" class="form-control" id="reg_Quantity" name="reg_Quantity" placeholder="available Quantity is {{$display[$i]->quantity}}">
                        <br>

                        <button type="submit" id="buy" name="buy" class="btn btn-primary pull-right" value={{$display[$i]->id}} >Buy</button>

                    </div>
                    </div>
                </form>
            </th>
    @endif

    @if( $i > 4 )
            <tr>
                <td>
                <form method="post" action=".{{url('/Buy_client')}}" >
                    {{csrf_field()}}
                    <div class="card" style="width:18rem;height:650px;margin:30px;">
                        <img class="card-img-top" src="{{$display[$i]->file}}" alt="Card" style="height : 200px;">
                        <div class="card-body">
                            <label >Name : {{$display[$i]->name}} </label>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" readonly >{{$display[$i]->description }}</textarea>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Expire Date : {{$display[$i]->expire_date }}</li>
                            <li class="list-group-item">Production Date : {{$display[$i]->production_date }}</li>
                            <li class="list-group-item">Type : {{$display[$i]->type }}</li>
                        </ul>
                        <div class="card-body">
                            <input type="text" class="form-control" id="reg_Price" name="reg_Price" placeholder="Price :  {{$display[$i]->price }} $" readonly>
                            <input type="text" class="form-control" id="reg_Quantity" name="reg_Quantity" placeholder="available Quantity is {{$display[$i]->quantity}}">
                            <br>

                            <button type="submit" id="buy" name="buy" class="btn btn-primary pull-right" value={{$display[$i]->id}} >Buy</button>

                        </div>
                    </div>
                </form>
                <td>
            </tr>
    @endif
@endfor

</table>




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