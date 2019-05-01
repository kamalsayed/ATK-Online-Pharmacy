@extends('layout.AdminInterface')

@section('section')


    <html>
    <div class="text-center" style="padding:50px 0">
        <div class="logo">Report Result</div>
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
        <div class="container" style="margin-top: 5%;">
        <form action="{{url('/ReportDownload')}}" method="post">
            {{csrf_field()}}
        <table id="customers">
            <tr>
                <th style="text-align: center">Sellers</th>
            </tr>

            @for($i=0;$i<count($sellers);$i++)
                <tr>
                    <td>{{($i+1) . " - ". $sellers[$i]->name}}</td>
                </tr>
            @endfor
        </table>
        <table id ="customers">
            <tr>

                <th style="text-align: center">Most Selled</th>

            </tr>
            @for($i=0;$i<count($most);$i++)

                <tr>
                    <td>{{($i+1) . " - ".   $most[$i]->name}}</td>
                </tr>
            @endfor

        </table>
        <table id ="customers">
            <tr>

                <th style="text-align: center">Best Customers</th>

            </tr>
            @for($i=0;$i<count($best);$i++)

                <tr>
                    <td>{{($i+1) . " - ".   $best[$i]->name}}</td>
                </tr>
            @endfor
        </table>

               <!-- <input type="submit" value="download" name="download"> -->
            </form>
        </div>
        </body>
    </div>
    </html>
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