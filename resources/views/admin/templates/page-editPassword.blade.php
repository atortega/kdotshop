<!DOCTYPE html>
<html lang="en">

<head>

     @include('admin.templates.layout.header')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            <!-- /.navbar-header -->

            @include('admin.templates.layout.navigation')
            <div class="navbar-default sidebar" role="navigation">
                    @include('admin.templates.layout.sidebar')
                </div>
            <!-- /.navbar-top-links --> 
            <!-- /.navbar-static-side -->
        </nav>


    <!-- main-container start -->
    <!-- ================ -->
     <section class="main-container">
            <div id="page-wrapper">
                <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="page-header">My Profile</h1>
                                    <a href="/admin/edit" class="btn btn-primary btn-xs" role="button" active>Edit Profile</a>
                                    <a href="/admin/password" class="btn btn-primary btn-xs" role="button">Change Password</a>
                                </div>
                            </div>
            
             <div class="main col-lg-8 order-lg-2 ml-xl-auto">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form method="POST" action="/change-password">
                        @csrf
                        <div class="row">
                            <div class="card-header col-md-8">
                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>Enter Current Password</h5>
                                        <input id="current_password" type="password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" name="current_password" value="{{ old('current_password') }}" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>Enter New Password</h5>
                                         <input id="new_password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" value="{{ old('new_password') }}" required autofocus>
                                    </div>
                                </div>


                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>Re-Enter New Password</h5>
                                        <input id="new_password_confirmation" type="password" class="form-control{{ $errors->has('new_password_confirmation') ? ' is-invalid' : '' }}" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}" required autofocus>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="card-footer col-md-8 text-center border-clear">
                                <button type="submit" class="btn btn-animated btn-default btn-md">
                                     {{ __('Update Password') }}
                                     <i class="fa fa-lock"></i>
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
        </div>
    </section>
                
                  

        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
