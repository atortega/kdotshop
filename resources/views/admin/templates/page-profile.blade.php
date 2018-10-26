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
                                    <a href="/admin/edit" class="btn btn-primary btn-xs" role="button">Edit Profile</a>
                                    <a href="/admin/password" class="btn btn-primary btn-xs" role="button">Change Password</a>
                                </div>
                            </div>
            
                <!-- main start -->
                <!-- ================ -->

                <!-- page-title start -->
                <!-- ================ -->
                

                
                  <div class="col-lg-8 order-lg-2 ml-xl-auto">
                    <form method="POST" action="">
                        @csrf
                        <div class="row">

                            <!-- 1st Column start -->

                        <div class="card-header row border-clear">

                            <div class="col-md-6">

                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>First Name</h5>
                                        <input id="fname" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ Auth::user()->first_name }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>Middle Name</h5>
                                         <input id="middle_name" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" value="{{ Auth::user()->middle_name }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>Last Name</h5>
                                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ Auth::user()->last_name }}"disabled>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>Birthdate</h5>
                                        <input id="birthdate" type="text" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ Auth::user()->birthdate }}" disabled>
                                    </div>
                                </div>
                            </div>
                       
                            <!-- 1st Column end -->

                            <!---2nd Column start --->

                            <div class="col-md-6">
                                

                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>Gender</h5>
                                        <input id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ Auth::user()->gender }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>Phone Number</h5>
                                        <input id="phonenumber" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ Auth::user()->phone_number }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <div class="col-md-12">
                                        <h5>E-mail</h5>
                                       <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" disabled>
                                    </div>
                                </div>

                            </div>
                            <!-- 2nd Column end -->
                        </div>
                        </div>
                    </form>
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
