@extends('layout.AdminInterface')

@section('section')


    <html>
    <div class="text-center" style="padding:50px 0">
        <div class="logo">List medicine</div>
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
                <th>Quantity</th>
                <th>Name</th>
                <th>Type</th>
                <th>Expire Date</th>
                <th>Brand</th>
                <th>Price</th>
                <th >Production Date</th>
                <th >description</th>
            </tr>
            <?php
            foreach($list as $table){
                echo"
            <tr>
            <td>{$table->quantity}</td>
            <td>{$table->name}</td>
            <td>{$table->type}</td>
            <td>{$table->expire_date}</td>
            <td>{$table->brand}</td>
            <td>{$table->price}</td>
            <td>{$table->production_date}</td>
            <td>{$table->description}</td>
            </tr>";
            }
            ?>


        </table>

        </body>
    </div>
    </html>

@endsection