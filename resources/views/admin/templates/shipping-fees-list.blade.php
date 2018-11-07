<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.templates.layout.header')
     <style>
        .imgThumb {
            border-radius: 5px;
            cursor: zoom-in;
            transition: 0.3s;
        }
        .imgThumb:hover {opacity: 0.7;}
    </style>
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
                        <h1 class="page-header">Shipping Fees</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="container-fluid">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Barangay</th>
                                <th>Distance(km)</th>
                                <th>Fee</th>
                                <th>Date Created</th>
                                <th>Date Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <script>
                    $(function() {
                        var datatable = $('#table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ url("admin/shipping/fees/index") }}',
                            columns: [
                                { data: 'id', name: 'id' },
                                { data: 'place', name: 'place' },
                                { data: 'km', name: 'km' },
                                { data: 'shipping_fee', name: 'shipping_fee'},
                                { data: 'created_at', name: 'created_at' },
                                { data: 'updated_at', name: 'updated_at' },
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

                        $('#table').on('click', '.fees-edit-btn', function() {
                            var id = $(this).attr('sid');
                            var total = 0;
                            console.log(id);
                            $.get("/admin/shipping/fees/get/" + id, function (data) {
                                console.log(data);
                                $("#place").val(data.place);
                                $("#id").val(data.id);
                                $("#distance").val(data.km);
                                $("#shipping_fee").val(data.shipping_fee);
                            });

                            $('#editModal').modal('show');
                        });

                        $('#table').on('click', '.orders-tracker-btn', function() {
                            var order_id = $(this).attr('sid');
                            var total = 0;
                            console.log(order_id);
                            $("#tracker_order_id").html(order_id);
                            $.get( "/admin/orders/tracker/get/"+order_id, function( data ) {
                                console.log(data);
                                $("#modalOrderTracker tbody").html('');
                                $.each(data, function(index, row) {
                                    var markup = "<tr><td>"+row.reference_code+"</td><td>" + row.status + "</td><td>" + row.created_at + "</td><td>" + row.updated_at +"</td><td>" + row.notes + "</td></tr>";
                                    $("#modalOrderTracker tbody").append(markup);
                                });

                            });
                            $('#trackerModal').modal('show');
                        });
              //cutted

                    });


                </script>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="/js/admin/bootbox.min.js"></script>

    <div class="modal fade" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Shipping Fees Update</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="color">Barangay</label>
                        <input type="text" class="form-control" id="place" name="place" placeholder="Enter Barangay" disabled>
                    </div>
                    <div class="form-group">
                        <label for="description">Distnce(KM)</label>
                        <input type="text" class="form-control" id="distance" name="distance" placeholder="Enter Distance">
                    </div>
                    <div class="form-group">
                        <label for="description">Fee</label>
                        <input type="text" class="form-control" id="shipping_fee" name="shipping_fee" placeholder="Enter Shipping Fee">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id" name="id" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save-changes" >Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <div class="modal fade" id="trackerModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Order Tracker</h4>
                    <div>Order ID: <span id="tracker_order_id"></span></span></div>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="modalOrderTracker" class="table">
                            <thead>
                            <th>Reference</th>
                            <th class='text-right'>Status</th>
                            <th class='text-right'>Created On</th>
                            <th class='text-right'>Updated On</th>
                            <th class='text-right'>Notes</th>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="size_id" name="size_id" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!--<button type="button" class="btn btn-primary save-changes" >Save changes</button>-->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>

</html>
