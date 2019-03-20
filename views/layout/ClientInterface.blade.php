@extends('layout.app')

@section('content')

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href=#>Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="Medicines.php">Medicines <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="contactus.php">Contact Us</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="aboutus.php">About Us</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0"  action="{{url('loginn')}}" method="post" >
            {{csrf_field()}}
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
        </form>
    </div>
</nav>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="Medicines.php"><i class="material-icons">add_shopping_cart</i> Buys Medicine</a>
    <a href="?page=Add charge">&#9546 Add Charge</a>
    <a href="?page=List Medicines Client"><i class="material-icons">menu</i> List Medicines</a>
    <span style="font-size:30px;cursor:pointer ;margin-left: 10% ;" onclick="closeNav()">&#9746; close</span>

</div>

<br>

<div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
</div>

<h1 style="text-align: center;font-family: Batang;color: #3f9ae5" >Hello Dear {{Auth::user()->name}}</h1>
<br><br>

@yield('section')

@stop
