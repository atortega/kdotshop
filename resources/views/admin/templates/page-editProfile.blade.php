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
    <!-- wrapper -->
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
                        <a href="/admin/profile" class="btn btn-primary btn-xs" role="button">Go Back</a>
                        <a href="/admin/password" class="btn btn-primary btn-xs" role="button">Change Password</a>
                    </div>
                </div>
            
                <div class="col-lg-8 order-lg-2 ml-xl-auto">
                    <form method="POST" action="/admin/editprofile">
                        <input type="hidden" id="referer" name="referer" value="admin">
                        @csrf
                        <div class="row">
                            <div class="card-header row border-clear">
                                <!-- 1st Column start -->
                                <div class="col-md-6">
                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>First Name</h5>
                                            <input id="fname" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                type="text" name="first_name" value="{{ old('first_name')== '' ? Auth::user()->first_name : old('first_name') }}"
                                                required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>Middle Name</h5>
                                             <input id="middle_name" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}"
                                                type="text" name="middle_name" value="{{ old('middle_name')== '' ? Auth::user()->middle_name : old('middle_name') }}"
                                                required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>Last Name</h5>
                                            <input id="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                type="text" name="last_name" value="{{ old('last_name')== '' ? Auth::user()->last_name : old('last_name') }}"
                                                required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>Birthdate</h5>
                                            <input id="birthdate" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" 
                                                type="date" name="birthdate" value="{{ old('birthdate')== '' ? Auth::user()->birthdate : old('birthdate') }}"
                                                required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <!-- 1st Column end -->

                                <!---2nd Column start --->
                                <div class="col-md-6">
                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>Gender</h5>
                                            <select id="gender" class="form-control" name="gender">
                                                <option value="M" {{ Auth::user()->gender == 'M' ? " selected " : "" }}>Male</option>
                                                <option value="F" {{ Auth::user()->gender == 'F' ? " selected " : "" }}>Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>Phone Number</h5>
                                            <input id="phonenumber" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" 
                                                type="text" name="phone_number" value="{{ old('phone_number')== '' ? Auth::user()->phone_number : old('phone_number') }}"
                                                required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback row">
                                        <div class="col-md-12">
                                            <h5>E-mail</h5>
                                            <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                type="email" name="email" value="{{ old('email')== '' ? Auth::user()->email : old('email') }}"
                                                required autofocus>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary save-changes" style="margin-top: 10%;">
                                            <span class="fa fa-save"></span> {{ __('Save changes') }}
                                        </button>
                                    </div>
                                </div>
                                <!-- 2nd Column end -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
            <!-- main-container end -->
    </div>
    <!-- /wrapper -->

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
