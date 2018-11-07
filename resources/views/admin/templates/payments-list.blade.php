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
                                <th>Order Number</th>
                                <th>Payment Date</th>
                                <th>Customer's Name</th>
                                <th>Contact Number</th>
                                <th>Payment Method</th>
                                <th>Reference Number</th>
                                <th>Total Amount</th>
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
                                { data: 'order_id', name: 'order_id' },
                                { data: 'date_paid', name: 'date_paid' },
                                { data: 'customer_name', name: 'customer_name' },
                                { data: 'phone_number', name: 'phone_number' },
                                { data: 'payment_name', name: 'payment_name' },
                                { data: 'reference_code', name: 'reference_code' },
                                { data: 'total_amount', name: 'total_amount' },
                                { data: 'actions', name: 'actions', orderable: false }
                            ],
                            drawCallback: function( settings ) {
                                if (settings.aoData.length > 0) {
                                    $.each(settings.aoColumns, function(index, col) {
                                        col.bSortable = true;
                                    });
                                } else {
                                    $.each(settings.aoColumns, function(index, col) {
                                        col.bSortable = false;
                                    });
                                }
                                $("#count").val(settings.json.recordsFiltered);
                            }
                        });
                         $('#table').on('click', '.orders-edit-btn', function() {
                            var order_id = $(this).attr('sid');
                            var total = 0;
                            console.log(order_id);
                            $.get( "/admin/orders/details/get/"+order_id, function( data ) {
                                console.log(data);
                                $("#modalOrderDetails tbody").html('');
                                $.each(data, function(index, row) {
                                    console.log(row.product_name);
                                    var markup = "<tr><td>"+row.product_id+"</td><td>" + row.product_name + "</td><td class='text-right'>" + row.quantity + "</td><td class='text-right'>" + parseFloat(row.price).toFixed(2) +"</td><td class='text-right'>" + parseFloat(row.amount).toFixed(2) + "</td></tr>";
                                    $("#modalOrderDetails tbody").append(markup);
                                    total = total + row.amount;
                                });
                                $("#modalOrderDetails tbody").append("<tr><td colspan='5' class='text-right font-weight-bold'>" + parseFloat(total).toFixed(2) + "</td></tr>");
                            });

                            $('#editModal').modal('show');
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
