@extends('layout.AdminInterface')

@section('section')



    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>



<table id="customers">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Country</th>
        <th>Subject</th>
        <th>Message</th>
    </tr>

    @for($i=0;$i<count($data);$i++)

    <tr>
        <td>{{$data[$i]->name}}</td>
        <td>{{$data[$i]->email}}</td>
        <td>{{$data[$i]->country}}</td>
        <td>{{$data[$i]->subject}}</td>
        <td>{{$data[$i]->message}}</td>
      </tr>
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

    @stop