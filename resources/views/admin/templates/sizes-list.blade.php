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
                        <h1 class="page-header">Sizes</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="container-fluid">

                   <a href="/admin/sizes/create" class="btn btn-primary btn-xs" role="button">Add New</a>
                    <div class="mb-3">&nbsp;</div>
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Size</th>
                                <th>Description</th>
                                 <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                    <a href="/admin/sizes/create" class="btn btn-primary btn-xs" role="button">Add New</a>
                </div>
                <script>
                    $(function() {
                        var datatable = $('#table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ url('admin/sizes/index') }}',
                            columns: [
                                { data: 'size', name: 'size' },
                                { data: 'description', name: 'description' },
                                { data: 'actions', name: 'actions' },
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

                        $('#table').on('click', '.size-edit-btn', function(){
                            var size_id = $(this).attr('sid');
                            $.get( "/sizes/get/"+size_id, function( data ) {
                                $("#description").val(data.description);
                                $("#size").val(data.size);
                                $("#size_id").val(size_id);
                            });

                            $('#myModal').modal('show');
                        });

                        $('#table').on('click', '.size-delete-btn', function(){
                            var size_id = $(this).attr('sid');
                            var size_name = $(this).attr('sname');
                            bootbox.confirm({
                                size: "small",
                                message: "Are you sure to delete this size, "+size_name+"?",
                                callback: function(result){
                                    /* result is a boolean; true = OK, false = Cancel*/
                                    if (result) {
                                        $.ajax({
                                            type: "POST",
                                            data: {size_id: size_id, _token: $('meta[name="csrf-token"]').attr('content')},
                                            cache: false,
                                            url: '/admin/sizes/delete',
                                            success: function(data){
                                                console.log(data);
                                                datatable.draw('page');
                                            },
                                            error: function(){
                                                // error handling
                                            }
                                        });
                                    }
                                }
                            });
                        });

                        $('.save-changes').click(function() {
                            $.ajax({
                                type: "POST",
                                //dataType: 'json',
                                data: {description: $('#description').val(), size_id: $("#size_id").val(), _token: $('meta[name="csrf-token"]').attr('content')},
                                cache: false,
                                url: '/admin/sizes/edit',
                                success: function(data){
                                    console.log(data);
                                },
                                error: function(){  // error handling

                                }
                            });
                            //alert('Changes saved!');
                            $('#myModal').modal('hide');
                            datatable.draw('page');
                        });

                    });


                </script>

            </div>
            <!-- /.container-flui,
                d -->
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

    <script src="/js/bootbox.min.js"></script>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Size - Update</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="size">Size</label>
                        <input type="text" class="form-control" id="size" name="size" placeholder="Enter Size" disabled>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Size Description">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="size_id" name="size_id" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save-changes" >Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</body>

</html>
