<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<style>
    .main-section{
        background-color: #F8F8F8;
    }
    .dropdown{
        float:right;
        padding-right: 30px;
    }
    .btn{
        border:0px;
        margin:10px 0px;
        box-shadow:none !important;
    }
    .dropdown .dropdown-menu{
        padding:20px;
        top:30px !important;
        width:350px !important;
        left:-110px !important;
        box-shadow:0px 5px 30px black;
    }
    .total-header-section{
        border-bottom:1px solid #d2d2d2;
    }
    .total-section p{
        margin-bottom:20px;
    }
    .cart-detail{
        padding:15px 0px;
    }
    .cart-detail-img img{
        width:100%;
        height:100%;
        padding-left:15px;
    }
    .cart-detail-product p{
        margin:0px;
        color:#000;
        font-weight:500;
    }
    .cart-detail .price{
        font-size:12px;
        margin-right:10px;
        font-weight:500;
    }
    .cart-detail .count{
        color:#C2C2DC;
    }
    .checkout{
        border-top:1px solid #d2d2d2;
        padding-top: 15px;
    }
    .checkout .btn-primary{
        border-radius:50px;
        height:50px;
    }
    .dropdown-menu:before{
        content: " ";
        position:absolute;
        top:-20px;
        right:50px;
        border:10px solid transparent;
        border-bottom-color:#fff;
    }

    .thumbnail {
        position: relative;
        padding: 0px;
        margin-bottom: 20px;
    }

    .thumbnail img {
        width: 100%;
    }

    .thumbnail .caption{
        margin: 7px;
    }

    .page {
        margin-top: 50px;
    }

    .btn-holder{
        text-align: center;
    }

    .table>tbody>tr>td, .table>tfoot>tr>td{
        vertical-align: middle;
    }
    @media screen and (max-width: 600px) {
        table#cart tbody td .form-control{
            width:20%;
            display: inline !important;
        }
        .actions .btn{
            width:36%;
            margin:1.5em 0;
        }

        .actions .btn-info{
            float:left;
        }
        .actions .btn-danger{
            float:right;
        }

        table#cart thead { display: none; }
        table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
        table#cart tbody tr td:first-child { background: #333; color: #fff; }
        table#cart tbody td:before {
            content: attr(data-th); font-weight: bold;
            display: inline-block; width: 8rem;
        }



        table#cart tfoot td{display:block; }
        table#cart tfoot td .btn{display:block;}

    }

    .steps {
        margin-top: -41px;
        display: inline-block;
        float: right;
        font-size: 16px
    }
    .step {
        float: left;
        background: white;
        padding: 7px 13px;
        border-radius: 1px;
        text-align: center;
        width: 100px;
        position: relative
    }
    .step_line {
        margin: 0;
        width: 0;
        height: 0;
        border-left: 16px solid #fff;
        border-top: 16px solid transparent;
        border-bottom: 16px solid transparent;
        z-index: 1008;
        position: absolute;
        left: 99px;
        top: 1px
    }
    .step_line.backline {
        border-left: 20px solid #f7f7f7;
        border-top: 20px solid transparent;
        border-bottom: 20px solid transparent;
        z-index: 1006;
        position: absolute;
        left: 99px;
        top: -3px
    }
    .step_complete {
        background: #357ebd
    }
    .step_complete a.check-bc, .step_complete a.check-bc:hover,.afix-1,.afix-1:hover{
        color: #eee;
    }
    .step_line.step_complete {
        background: 0;
        border-left: 16px solid #357ebd
    }
    .step_thankyou {
        float: left;
        background: white;
        padding: 7px 13px;
        border-radius: 1px;
        text-align: center;
        width: 100px;
    }
    .step.check_step {
        margin-left: 5px;
    }
    .ch_pp {
        text-decoration: underline;
    }
    .ch_pp.sip {
        margin-left: 10px;
    }
    .check-bc,
    .check-bc:hover {
        color: #222;
    }
    .SuccessField {
        border-color: #458845 !important;
        -webkit-box-shadow: 0 0 7px #9acc9a !important;
        -moz-box-shadow: 0 0 7px #9acc9a !important;
        box-shadow: 0 0 7px #9acc9a !important;
        background: #f9f9f9 url(../images/valid.png) no-repeat 98% center !important
    }

    .btn-xs{
        line-height: 28px;
    }

    /*login form*/
    .login-container{
        margin-top:30px ;
    }
    .login-container input[type=submit] {
        width: 100%;
        display: block;
        margin-bottom: 10px;
        position: relative;
    }

    .login-container input[type=text], input[type=password] {
        height: 44px;
        font-size: 16px;
        width: 100%;
        margin-bottom: 10px;
        -webkit-appearance: none;
        background: #fff;
        border: 1px solid #d9d9d9;
        border-top: 1px solid #c0c0c0;
        /* border-radius: 2px; */
        padding: 0 8px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .login-container input[type=text]:hover, input[type=password]:hover {
        border: 1px solid #b9b9b9;
        border-top: 1px solid #a0a0a0;
        -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
    }

    .login-container-submit {
        /* border: 1px solid #3079ed; */
        border: 0px;
        color: #fff;
        text-shadow: 0 1px rgba(0,0,0,0.1);
        background-color: #357ebd;/*#4d90fe;*/
        padding: 17px 0px;
        font-family: roboto;
        font-size: 14px;
        /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
    }

    .login-container-submit:hover {
        /* border: 1px solid #2f5bb7; */
        border: 0px;
        text-shadow: 0 1px rgba(0,0,0,0.3);
        background-color: #357ae8;
        /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
    }

    .login-help{
        font-size: 12px;
    }

    .asterix{
        background:#f9f9f9 url(../images/red_asterisk.png) no-repeat 98% center !important;
    }

    /* images*/
    ol, ul {
        list-style: none;
    }
    .hand {
        cursor: pointer;
        cursor: pointer;
    }
    .cards{
        padding-left:0;
    }
    .cards li {
        -webkit-transition: all .2s;
        -moz-transition: all .2s;
        -ms-transition: all .2s;
        -o-transition: all .2s;
        transition: all .2s;
        background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
        background-position: 0 0;
        float: left;
        height: 32px;
        margin-right: 8px;
        text-indent: -9999px;
        width: 51px;
    }
    .cards .mastercard {
        background-position: -51px 0;
    }
    .cards li {
        -webkit-transition: all .2s;
        -moz-transition: all .2s;
        -ms-transition: all .2s;
        -o-transition: all .2s;
        transition: all .2s;
        background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
        background-position: 0 0;
        float: left;
        height: 32px;
        margin-right: 8px;
        text-indent: -9999px;
        width: 51px;
    }
    .cards .amex {
        background-position: -102px 0;
    }
    .cards li {
        -webkit-transition: all .2s;
        -moz-transition: all .2s;
        -ms-transition: all .2s;
        -o-transition: all .2s;
        transition: all .2s;
        background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
        background-position: 0 0;
        float: left;
        height: 32px;
        margin-right: 8px;
        text-indent: -9999px;
        width: 51px;
    }
    .cards li:last-child {
        margin-right: 0;
    }
    /* images end */



    /*
     * BOOTSTRAP
     */
    .container{
        border: none;
    }
    .panel-footer{
        background:#fff;
    }
    .btn{
        border-radius: 1px;
    }
    .btn-sm, .btn-group-sm > .btn{
        border-radius: 1px;
    }
    .input-sm, .form-horizontal .form-group-sm .form-control{
        border-radius: 1px;
    }

    .panel-info {
        border-color: #999;
    }

    .panel-heading {
        border-top-left-radius: 1px;
        border-top-right-radius: 1px;
    }
    .panel {
        border-radius: 1px;
    }
    .panel-info > .panel-heading {
        color: #eee;
        border-color: #999;
    }
    .panel-info > .panel-heading {
        background-image: linear-gradient(to bottom, #555 0px, #888 100%);
    }

    hr {
        border-color: #999 -moz-use-text-color -moz-use-text-color;
    }

    .panel-footer {
        border-bottom-left-radius: 1px;
        border-bottom-right-radius: 1px;
        border-top: 1px solid #999;
    }

    .btn-link {
        color: #888;
    }

    hr{
        margin-bottom: 10px;
        margin-top: 10px;
    }

    /** MEDIA QUERIES **/
    @media only screen and (max-width: 989px){
        .span1{
            margin-bottom: 15px;
            clear:both;
        }
    }

    @media only screen and (max-width: 764px){
        .inverse-1{
            float:right;
        }
    }

    @media only screen and (max-width: 586px){
        .cart-titles{
            display:none;
        }
        .panel {
            margin-bottom: 1px;
        }
    }

    .form-control {
        border-radius: 1px;
    }
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart') }}">Panier <span style="border-radius: 100%; padding: 2px; background: red; color: white;">{{session()->get('cart') !== null ? count(session()->get('cart')) : 0}}</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
