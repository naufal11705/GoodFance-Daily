<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Font Family -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title> Home </title>
    <style>
    .atom-spinner, .atom-spinner * {
      box-sizing: border-box;
    }

    .atom-spinner {
      height: 60px;
      width: 60px;
      overflow: hidden;
      top: 50%;
      left: 50%;
      position: fixed;
    }

    .atom-spinner .spinner-inner {
      position: relative;
      display: block;
      height: 100%;
      width: 100%;
    }

    .atom-spinner .spinner-circle {
      display: block;
      position: absolute;
      color: #24FF00;
      font-size: calc(60px * 0.24);
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .atom-spinner .spinner-line {
      position: absolute;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      animation-duration: 1s;
      border-left-width: calc(60px / 25);
      border-top-width: calc(60px / 25);
      border-left-color: #24FF00;
      border-left-style: solid;
      border-top-style: solid;
      border-top-color: transparent;
    }

    .atom-spinner .spinner-line:nth-child(1) {
      animation: atom-spinner-animation-1 1s linear infinite;
      transform: rotateZ(120deg) rotateX(66deg) rotateZ(0deg);
    }

    .atom-spinner .spinner-line:nth-child(2) {
      animation: atom-spinner-animation-2 1s linear infinite;
      transform: rotateZ(240deg) rotateX(66deg) rotateZ(0deg);
    }

    .atom-spinner .spinner-line:nth-child(3) {
      animation: atom-spinner-animation-3 1s linear infinite;
      transform: rotateZ(360deg) rotateX(66deg) rotateZ(0deg);
    }

    @keyframes atom-spinner-animation-1 {
      100% {
        transform: rotateZ(120deg) rotateX(66deg) rotateZ(360deg);
      }
    }

    @keyframes atom-spinner-animation-2 {
      100% {
        transform: rotateZ(240deg) rotateX(66deg) rotateZ(360deg);
      }
    }

    @keyframes atom-spinner-animation-3 {
      100% {
        transform: rotateZ(360deg) rotateX(66deg) rotateZ(360deg);
      }
    }
      .tales {
        width: 100%;
      }
      .carousel-inner{
        width: 100%;
        max-height: 300px !important;
      }
      .form-control:focus {
        border-color: #0f3c4c;
        box-shadow: 0 0 0 0 rgba(147, 147, 147, 0.8);
      }
      .form-select:focus {
        border-color: #0f3c4c;
        box-shadow: 0 0 0 0.2rem rgba(147, 147, 147, 0.8);
      }
      .dropdown{
        width: 140px;
        display: inline-block;
        position: relative;
      }
      .icon-container{
        width: 35px;
        position: relative;
      }
      .dropdown.toggle > input{
        display: block;
      }
      .dropdown > a, .dropdown.toggle > label{
        border-radius: 2px;
      }
      .dropdown ul{
        list-style-type: none;
        display: block;
        margin: 0;
        padding: 0 0 0 0;
        position: absolute;
        width: 100%;
        box-shadow: 0 6px 5px -5px rgba(0, 0, 0, 0.3);
        overflow: hidden;
      }
      .dropdown a, .dropdown.toggle > label{
        display: block;
        padding: 0 10px 0 10px;
        text-decoration: none;
        height: auto;
        font-size: 13px;
        background-color: #fff; 
      }
      .dropdown li{
        height: 0;
        overflow: hidden;
      }
      .dropdown.hover li{
        transition-delay: 0ms;
      }
      .dropdown li:first-child a{
        border-radius: 2px 2px 0 0; 
      }
      .dropdown li:last-child a {
        border-radius: 0 0 2px 2px;
      }
      .dropdown li:first-child a::before{
        content: "";
        display: block;
        position: absolute;
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-bottom: 10px solid #fff;
        margin: -10px 0 0 30px; 
      }
      .dropdown a:hover, .dropdown.toggle > label:hover, .dropdown.toggle > input:checked ~ label::after{
        border-top-color: #aaa;
      }
      .dropdown.hover:hover li, .dropdown.toggle > input:checked ~ ul li{
        height: auto;
      }
      .dropdown.hover:hover li:first-child, .dropdown.toggle > input:checked ~ ul li:first-child{
        margin-top: 15px;
      }
      .btn-ubah:hover{
        text-decoration: underline;
      }
      body{
        font-family: Poppins;
      }
      .count-container {
            padding:2px;
            border-radius:2px;
            background-color:#dc3545;
            color:#fff;
            font-size:11px;
            line-height:11px;
            position:absolute;
            top:5px;
            right:0
        }
        .popover-region-toggle::before{content:"";display:inline-block;border-left:10px solid transparent;border-right:10px solid transparent;border-bottom:10px solid #ddd;position:absolute;bottom:0;right:7px}
      @media (min-width: 992px) {
        .card-3{
          margin-top: -50px;
        }
      }
      @media (min-width: 576px) {
        .card-2{
          width: 100%;
        }
      }
      #preloader {
        background: #00 no-repeat center center;
        background-size: 15%;
        height: 100vh;
        width: 100%;
        position: fixed;
        z-index: 100;
      }
    </style>
  </head>
  <body>
    <!-- preloader -->
    <div id="preloader">
      <div class="atom-spinner">
        <div class="spinner-inner">
          <div class="spinner-line"></div>
          <div class="spinner-line"></div>
          <div class="spinner-line"></div>
          <!--Chrome renders little circles malformed :(-->
          <div class="spinner-circle">
            &#9679;
          </div>
        </div>
      </div>
    </div>
    
    <!-- menunya kita taruh persis di bawah <body> -->
    @include('layouts.menu')
    <!-- di bawah menu baru kontennya -->

    <!-- Mulai sini kontennya depannya kasih @ sama yield-->
    @yield('content')
    <!-- Sampai sini -->

    @include('layouts.footer')
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

    <script>
      $(document).click(function(event) {
        if(
          $('.toggle > input').is(':checked') &&
          !$(event.target).parents('.toggle').is('.toggle')
        ) {
          $('.toggle > input').prop('checked', false);
        }
      });
    </script>

    <script>
      var loader = document.getElementById("preloader");

      window.addEventListener("load", function(){
        loader.style.display = "none";
      }) 
    </script>
  </body>
</html>