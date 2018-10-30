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
                        <h1 class="page-header">Product Categories</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="container-fluid">
                    <a href="/admin/categories/create" class="btn btn-primary btn-xs" role="button">Add New</a>
                    <div class="mb-3">&nbsp;</div>
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Category Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                    <a href="/admin/categories/create" class="btn btn-primary btn-xs" role="button">Add New</a>
                </div>
                <script>
                    $(function() {
                        var datatable = $('#table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ url('admin/categories/index') }}',
                            columns: [
                                { data: 'category_name', name: 'category_name' },
                                { data: 'category_desc', name: 'category_desc' },
                                { data: 'category_image',
                                    "render": function(data, type, row) {
                                        if (data) {
                                            return '<img src="/storage/' + data + '" class="img-rounded img-responsive object-fit_fill imgZoomModal imgThumb" style="border:0px;" width="75" id="image-' + category_id + '" imgid="' + category_id + '"" alt="' + category_name + '"/>';
                                        } else {
                                            return '';
                                        }
                                    }, orderable: false
                                },
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

                        $('#table').on('click', '.category-edit-btn', function(){
                            var category_id = $(this).attr('sid');
                            $.get( "/categories/get/"+category_id, function( data ) {
                                $("category_image").val(data.category_image);
                                $("#description").val(data.category_desc);
                                $("#category_name").val(data.category_name);
                                $("#category_id").val(category_id);

                            });

                            $('#myModal').modal('show');
                        });

                        $('#table').on('click', '.category-delete-btn', function(){
                            var category_id = $(this).attr('sid');
                            var category_name = $(this).attr('sname');
                            bootbox.confirm({
                                size: "small",
                                message: "Are you sure to delete this category, "+category_name+"?",
                                callback: function(result){
                                    /* result is a boolean; true = OK, false = Cancel*/
                                    if (result) {
                                        $.ajax({
                                            type: "POST",
                                            data: {category_id: category_id, _token: $('meta[name="csrf-token"]').attr('content')},
                                            cache: false,
                                            url: '/admin/categories/delete',
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
                            console.log("Cat: " + $("#category_id").val());
                            var form = $(this).closest('form');
                            var formData = new FormData();
                            formData.append('category_image', $('#category_image').prop('files')[0]);
                            formData.append('description', $('#description').val());
                            formData.append('category_id', $('#category_id').val());
                            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                            $.ajax({
                                type: "POST",
                                dataType: 'json',
                                processData: false,
                                contentType: false,
                                data: formData,
                                cache: false,
                                url: '/admin/categories/edit',
                                success: function(data){
                                    console.log(data);
                                    datatable.draw('page');
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

    <script src="../js/admin/jquery.dataTables.min.js"></script>

    <script src="../js/admin/bootbox.min.js"></script>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Category - Update</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_name">Category</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category" disabled>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Category Description">
                    </div>
                    <div class="form-group">
                        <label for="product_image">Category Image</label>
                        <input type="file" id="category_image" name="category_image" placeholder="Enter Category Image" required='require' value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="category_id" name="category_id" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save-changes" >Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


</body>

</html>