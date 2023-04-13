<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #eee;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> --}}

        {{-- <form id="myform" method="post" action="{{ url('/checkout') }}">
        {{ csrf_field() }}
            <input type="text" name="Invoice" value="P123"><br>
            <input type="number" name="price" value="23"><br>
            <input type="submit" name="Purchase">

        </form> --}}

            <div class="row vh-100 d-flex justify-content-center d-flex align-items-center">
               
                    <div class="col-md-4">
                        @if (Request::is('/'))
                        <form id="myform" method="post" action="{{ url('/payment') }}" class="border border-primary p-3">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Invoice</label>
                                <input type="text" name="invoice" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Price</label>
                                <input type="text" name="price" class="form-control" id="exampleInputPassword1" required>
                            </div>
                            <div class="mb-3">
                                <label for="">Select Option</label>
                                <select class="form-select" aria-label="Default select example" name="option">
                                    <option selected value="1">Embed Kit</option>
                                    <option value="2">API</option>
                                  </select>
                            </div>
                            <div class="mb-3 form-check">
                            </div>
                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </form>
                        @endif


                        @yield('content')
                    </div>
               
                
                </div>

        
{{--         
         <iframe id="sgoplus-iframe" sandbox="allow-same-origin allow-scripts allow-top-navigation allow-forms" src="" scrolling="no" frameborder="0">
        </iframe>
        
        <script type="text/javascript" src="https://sandbox-kit.espay.id/public/signature/js"></script>
        <script type="text/javascript">
            window.onload = function() {

                var data = {
                    key: "c120ee852ac32f5ef97077276ac10e6c",
                    paymentId: "123s",
                    backUrl: "http://127.0.0.1:8000/"
                },
                sgoPlusIframe = document.getElementById("sgoplus-iframe");
                if (sgoPlusIframe !== null) sgoPlusIframe.src = SGOSignature.getIframeURL(data);
                SGOSignature.receiveForm();
            };
        </script>  --}}

    <div class="row vh-100 d-flex justify-content-left d-flex align-items-left">
        <ul style="color:Black;font-size:20px; margin-left: 50px;" >
            <li>this url is not working on postman method

                <a href="https://sandbox-api.espay.id/rest/biller/inquirytransaction">
                    https://sandbox-api.espay.id/rest/biller/inquirytransaction
                </a>
               
            </li>
            <li>
                we already merchant by still having this error
                Error : [0031] Rejected, Communication error with 
                <a href="https://sandbox-portal.espay.id/">DASHBOARD</a>
            </li>
            <li>
                Using embed kit we are having an IP address rejected/ unregistered issue
                <br><code> {"rq_uuid":"PAIDBAQ721659","rs_datetime":"2023-04-13 15:21:41","error_code":"0601","error_message":"IP Address rejected \/ unregistered"}</code><br>
               does the IP in <a href="https://sandbox-portal.espay.id/espay/community/edit/comm_id/">MERCHANT->New merchant->edit</a> has to do with this?
            </li>
            <li>
                what is the usage of this url

                API JAVASCRIPT URL

                Development : https://sandbox-kit.espay.id/public/signature/js
                Production : https://kit.espay.id/public/signature/js

            </li>

            <li>    
                NEED TO REQUEST A full work flow / demo using postman or embed kit
            </li>
        </ul>
    </div>
    </body>
    @stack('scripts')
</html>
