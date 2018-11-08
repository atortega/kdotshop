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
                        <h1 class="page-header">Product Sub-Categories</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="container-fluid">
                    <a href="/admin/sub-categories/create" class="btn btn-primary btn-xs" role="button">Add New</a>
                    <div class="mb-3">&nbsp;</div>
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Sub-Category</th>
                                <th>Category</th>
                                <th>Description</th>
                                 <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                    <a href="/admin/sub-categories/create" class="btn btn-primary btn-xs" role="button">Add New</a>
                </div>
                <script>
                    $(function() {
                        var datatable = $('#table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ url('admin/sub-categories/index') }}',
                            columns: [
                                { data: 'sub_category_name', name: 'sub_category_name' },
                                { data: 'category_name', name: 'category_name' },
                                { data: 'category_desc', name: 'sub_category_desc' },
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
                            var sub_category_id = $(this).attr('sid');
                            var subcat = JSON.parse($(this).attr('data-subcat'));
                            
                            $.get( "/categories/get/"+sub-category_id, function( data ) {
                                $("#description").val(subcat.category_desc);
                                $("#category_name").val(subcat.category_name);
                                $("#sub-category").val(subcat.sub_category_name);
                            });
                            
                            /*$("#description").val(subcat.sub_category_desc);
                            $("#category_name").val(subcat.category_name);
                            $("#sub_category_id").val(sub_category_id);
                            $("#sub_category_name").val(subcat.sub_category_name);
*/
                            $('#myModal').modal('show');
                        });

                        $('#table').on('click', '.category-delete-btn', function(){
                            var category_id = $(this).attr('sid');
                            var category_name = $(this).attr('sname');
                            bootbox.confirm({
                                size: "small",
                                message: "Are you sure to delete this sub-category, "+sub_category_name+"?",
                                callback: function(result){
                                    /* result is a boolean; true = OK, false = Cancel*/
                                    if (result) {
                                        $.ajax({
                                            type: "POST",
                                            data: {sub_category_id: sub_category_id, _token: $('meta[name="csrf-token"]').attr('content')},
                                            cache: false,
                                            url: '/admin/sub-categories/delete',
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

                        $('form#modalForm').submit(function(e) {
                            e.preventDefault();
                            var formData = new FormData(this);
                            console.log("Cat: " + $("#category_id").val());
                            $.ajax({
                                type: "post",
                                dataType: 'json',
                                data: formData,
                                cache: false,
                                contentType: false,
                                processData: false,
                                url: '/admin/sub-categories/edit',
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

    <script src="/js/admin/bootbox.min.js"></script>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Category - Update</h4>
                </div>
                <form id="modalForm" name="modalForm">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_name">Category</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category" disabled>
                        </div>
                        <div class="form-group">
                            <label for="category_name">Sub Category</label>
                            <input type="text" class="form-control" id="sub_category_name" name="sub_category_name" placeholder="Enter Sub Category" required="required">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Category Description">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="sub_category_id" name="sub_category_id" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save-changes" >Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


</body>

</html>
