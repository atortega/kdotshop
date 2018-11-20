<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

          @include('admin.templates.layout.header')

        <style>
            html, body {
                background-color: #fff;
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
        <div id="">
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"> Add New Contact </h1>
                        </div>  
                    </div>  
                
                    <div class="container">
                        if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach(errors->all as $error)
                                        <li>{{error}}</li>
                                    @endforeach
                                </ul>  
                            </div>
                            @endif
                            @if(session()->has('message')) 
                                <div class="alert alert-success">
                                    {{ session->get('message') }}     
                                </div>
                            @endif
                            <form role="form" method="post" action="/admin/contacts/create/save">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name"> Name </label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" style="text-transform: uppercase">
                                </div>
                                <div class="form-group">
                                    <label for="number"> Number </label>
                                    <input type="text" class="form-control" id="number" name="number" placeholder=" Enter number">
                                </div>

                                <button type="submit" class="btn btn-primary"> Submit</button>
                            </form>          
                    </div>
                </div>
            </div>
        </div>

        <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../../vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../dist/js/sb-admin-2.js"></script>

    </body>
</html>
