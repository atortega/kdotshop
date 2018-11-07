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
                        <h1 class="page-header">Deliveries</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="container-fluid">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Delivery Method</th>
                                <th>Customer Name</th>
                                <th>Delivery Address</th>
                                <th>Payment Method</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                    </table>
                </div>
                <script>
                    $(function() {
                        $('#table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ url('admin/delivery/index') }}',
                            columns: [
                                { data: 'order_id', name: 'order_id' },
                                { data: 'delivery_method_name', name: 'delivery_method_name' },
                                { data: 'customer_name', name: 'customer_name' },
                                { data: 'delivery_address', name: 'delivery_address' },
                                { data: 'payment_name', name: 'payment_name' },
                                /*{ data: 'actions', name: 'actions', orderable: false }*/
                            ]
                        });
                    });
                </script>

            </div>
            <!-- /.container-fluid -->
	</div>
    <!-- /#wrapper -->

    

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


</body>

</html>