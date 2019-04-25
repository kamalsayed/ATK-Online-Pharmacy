@extends('layout.ClientInterface')
@section('section')

 <?php
    echo "<h3 class='logo' style =' text-align: center;=left ;margin-top: 5%'> Cash  :" . $charge[0]->cash. "</h3>";
//    echo "<h3 class='logo' style =' text-align: center;=left ;margin-top: 5%'> Cash  :{{ $charge[0]->cash }}</h3>";

 ?>

@endsection