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
                        <h1 class="page-header">Payments</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="container-fluid">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Payment Date</th>
                                <th>Amount</th>
                                <th>Code</th>
                                <th>Order Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <script>
                    $(function() {
                        $('#table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ url('admin/payments/index') }}',
                            columns: [
                                { data: 'paymentDate', name: 'paymentDate' },
                                { data: 'amount', name: 'amount' },
                                { data: 'code', name: 'code' },
                                { data: 'orderNumber', name: 'orderNumber' },
                                { data: 'actions', name: 'actions' },
                            ]
                        });
                    });
                </script>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

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
