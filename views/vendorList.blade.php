@extends('layout.VendorInterface')

@section('section')
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
    </tr>
<?php
for($i=0;$i<count($data);$i++){
    echo"
    <tr>
    <td>{$data[$i]->quantity}</td>
    <td>{$data[$i]->name}</td>
        <td>{$data[$i]->type}</td>
      <td>{$data[$i]->expire_date}</td>
      <td>{$data[$i]->brand}</td>
      <td>{$data[$i]->price}</td>
      <td>{$data[$i]->production_date}</td>
      </tr>";



}

?>

    @stop
