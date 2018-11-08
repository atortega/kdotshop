<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.templates.layout.header')
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('admin.templates.layout.navigation')
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Shipping Fee - Add New</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="container">
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
                    <form role="form" method="post" action="/admin/shipping/fees/create/save">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="size">Barangay</label>
                            <input type="text" class="form-control" id="place" name="place" placeholder="Enter Barangay" >
                        </div>
                        <div class="form-group">
                            <label for="description">Distance</label>
                            <input type="text" class="form-control" id="distance" name="distance" placeholder="Distance in Kilometer">
                        </div>
                        <div class="form-group">
                            <label for="description">Shipping Fee</label>
                            <input type="text" class="form-control" id="shipping_fee" name="shipping_fee" placeholder="Shipping Fee">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                

            </div>
            <!-- /.container-flui,
                d -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>



</body>

</html>
