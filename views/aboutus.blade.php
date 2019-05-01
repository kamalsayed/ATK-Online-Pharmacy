@if(Auth::user()->type==3)

    @extends('layout.VendorInterface')
    @endif
@if(Auth::user()->type==2)

    @extends('layout.ClientInterface')
@endif
@if(Auth::user()->type==1)

    @extends('layout.AdminInterface')
@endif
@section('section')
<div class="container" style="align-content: center">
    <div class="col-md-5" >
        <h1 class="about"> About us:</h1>

        <p id="p1">Hey dear! Thank you for joining our site , here we provide many medicines to buy and ease of use for all our lovely users , we hope you enjoy dealing with us !
        </p>

        <br>
        <br>
        <caption><h1 class="about" >Authors </h1></caption>

        <ul id="p1">
            <li>Kamal Sayed </li> <li>Eman Maghneen</li> <li >Abdalrahman Emad</li><li>Bassant Essam </li> <li>Eman Maghneen</li> <li>Emad Mohamed</li> <li>Hossam Medhat</li>
        </ul>
        <h1 class="about" >Releasing date </h1>
        <p id="p1" style="text-align : auto;"> 2/5/2019</p>
    </div>
</div>
<style>
    h1.about{
        color: cadetblue;

    }

    #p1{
        font-size: 150%;
        font-family: inherit;
        text-align:  left;

        align-content: center
    }

</style>
@stop