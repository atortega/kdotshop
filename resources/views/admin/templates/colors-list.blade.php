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
                        <h1 class="page-header">Colors</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="container-fluid">
                    <a href="/admin/colors/create" class="btn btn-primary btn-xs" role="button">Add New</a>
                    <div class="mb-3">&nbsp;</div>
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Color</th>
                                <th>Description</th>
                                 <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                    <a href="/admin/colors/create" class="btn btn-primary btn-xs" role="button">Add New</a>
                </div>
                <script>
                    $(function() {
                        var datatable = $('#table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ url('admin/colors/index') }}',
                            columns: [
                                { data: 'color', name: 'color' },
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

                        $('#table').on('click', '.color-edit-btn', function(){
                            var color_id = $(this).attr('sid');
                            $.get( "/colors/get/"+color_id, function( data ) {
                                $("#description").val(data.description);
                                $("#color").val(data.color);
                                $("#color_id").val(color_id);

                            });

                            $('#myModal').modal('show');
                        });

                        $('#table').on('click', '.color-delete-btn', function(){
                            var color_id = $(this).attr('sid');
                            var color_name = $(this).attr('sname');
                            bootbox.confirm({
                                size: "small",
                                message: "Are you sure to delete this color, "+color_name+"?",
                                callback: function(result){
                                    /* result is a boolean; true = OK, false = Cancel*/
                                    if (result) {
                                        $.ajax({
                                            type: "POST",
                                            data: {color_id: color_id, _token: $('meta[name="csrf-token"]').attr('content')},
                                            cache: false,
                                            url: '/admin/colors/delete',
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
                                dataType: 'json',
                                data: {description: $('#description').val(), color_id: $("#color_id").val(), _token: $('meta[name="csrf-token"]').attr('content')},
                                cache: false,
                                url: '/admin/colors/edit',
                                success: function(data){
                                    console.log(data);
                                },
                                error: function(e){  // error handling
                                    console.log(e);
                                }
                            });
                            //alert('Changes saved!');
                            $('#myModal').modal('hide');
                            datatable.draw('page');
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

    <script src="../js/bootbox.min.js"></script>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Color - Update</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" class="form-control" id="color" name="color" placeholder="Enter Color" disabled>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Color Description">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="color_id" name="color_id" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save-changes" >Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


</body>

</html>
