@extends('layout.AdminInterface')
@section('section')
    <html>
    <head>
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
    </head>
    <body>

    <table id="customers">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Delete</th>

        </tr>


        @foreach($del as $table)

            @if ($table->type != 1)



                        <tr>
                        <td>{{$table->id}}</td>
                        <td>{{$table->name}}</td>
                        <td>{{$table->type}}</td>
                        <td> <a href="{{url('delete/'.$table->id)}}" >delete</a> </td>

                    </tr>;

            @endif
        @endforeach





    </table>

    </body>
    </html>


@endsection

