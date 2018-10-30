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
                        <h1 class="page-header">Products</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="container-fluid col-lg-12">
                    <a href="/admin/products/create" class="btn btn-primary btn-xs" role="button">Add New</a>
                    <div class="mb-3">&nbsp;</div>
                    <table class="table table-bordered table-hover" id="table">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Category</th>
                                <th>Sub-Category</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                    <a href="/admin/products/create" class="btn btn-primary btn-xs" role="button">Add New</a>
                </div>

                <script>
                    $(function(){
                        var datatable = $('#table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ url("admin/products/index") }}',
                            columns: [
                                { data: 'product_id', name: 'product_id' },
                                { data: 'category_name', name: 'category_name' },
                                { data: 'sub_category_name', name: 'sub_category_name' },
                                { data: 'product_name', name: 'product_name' },
                                { data: 'product_desc', name: 'product_desc' },
                                { data: 'product_image', 
                                    "render": function(data, type, row) {
                                        if (data) {
                                            return '<img src="/storage/' + data + '" class="img-rounded img-responsive object-fit_fill imgZoomModal imgThumb" style="border:0px;" width="75" id="image-' + product_id + '" imgid="' + product_id + '"" alt="' + product_name + '"/>';
                                        } else {
                                            return '';
                                        }
                                    }, orderable: false
                                },
                                { data: 'actions', name: 'actions', orderable: false },
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

                        $('#table').on('click', '.imgZoomModal', function(){

                            var product_id = $(this).attr('imgid');                            

                            $.get( "/products/get/"+product_id, function( data ) {
                                $("#product_id").val(product_id);
                                $("#product_desc").val(data.product_desc);
                                $("#imagepreview").attr('src', $('#image-'+product_id).attr('src'));
                                $("#score").html("<p>" + data.product_name + "</p>");
                            });

                            $('#imgZoomModal').modal('show');
                        });

                        $('#table').on('click', '.product-edit-btn', function(){
                            var product_id = $(this).attr('sid');
                            console.log('id: '+product_id);
                            $.get( "/products/get/"+product_id, function( data ) {
                                console.log(data);
                                console.log('id'+product_id);
                                console.log(data[0].product_image);
                                if (data[0].product_image != null) {
                                    $('#image-preview').html('<img id="theImg" src="/storage/'+data[0].product_image+'" width="150"/>');
                                } else {
                                    $('#image-preview').html('');
                                }
                                $("#product_id").val(product_id);
                                $("#category_id").val(data[0].category_id);
                                $("#sub_category_id").val(data[0].sub_category_id);
                                $("#category_name").val(data[0].category_name);
                                $("#sub_category_name").val(data[0].sub_category_name);
                                $("#product_name").val(data[0].product_name);
                                $("#product_desc").val(data[0].product_desc);
                                $("#quantity").val(data[0].number_of_items);
                                $("#price").val(data[0].unit_price);
                            });

                            $('#myModal').modal('show');
                        });

                        $('#table').on('click', '.product-delete-btn', function(){
                            var product_id = $(this).attr('sid');
                            var product_name = $(this).attr('sname');
                            bootbox.confirm({
                                size: "small",
                                message: "Do you want to delete this product, <strong>"+product_name+"</strong>?",
                                callback: function(result){
                                    /* result is a boolean; true = OK, false = Cancel*/
                                    if (result) {
                                        $.ajax({
                                            type: "POST",
                                            data: { product_id: product_id,
                                                    _token: $('meta[name="csrf-token"]').attr('content')},
                                            cache: false,
                                            url: '/admin/products/delete',
                                            success: function(data){
                                                console.log(data);
                                                datatable.draw('page');
                                            },
                                            error: function(e){
                                                // error handling
                                                console.log(e);
                                            }
                                        });
                                    }
                                }
                            });
                        });

                        $('.save-changes').click(function() {
                            var form = $(this).closest('form');
                            var formData = new FormData();
                            formData.append('product_image', $('#product_image').prop('files')[0]);
                            formData.append('product_id', $("input[name='product_id']").val());
                            formData.append('category_id', $("input[name='category_id']").val());
                            formData.append('sub_category_id', $("input[name='sub_category_id']").val());
                            formData.append('category_name', $("input[name='category_name']").val());
                            formData.append('sub_category_name', $("input[name='sub_category_name']").val());
                            formData.append('product_name', $("input[name='product_name']").val());
                            formData.append('price', $("input[name='price']").val());
                            formData.append('quantity', $("input[name='quantity']").val());
                            formData.append('size', $("#size").val());
                            formData.append('color', $("#color").val());
                            formData.append('product_desc', $("input[name='product_desc']").val());
                            formData.append('_token', $("input[name='_token']").val());
                            $.ajax({
                                async: true,
                                type: "POST",
                                dataType: 'json',
                                processData: false,
                                contentType: false,


                                data: formData,
                                cache: true,
                                url: '/admin/products/edit',
                                success: function(data2){
                                    console.log(data2);
                                    datatable.draw('page');
                                    $('#myModal').modal('hide');
                                },
                                error: function(e){  // error handling
                                    var errors = e.responseJSON;
                                    var errorsHtml = '';
                                    $.each(errors.errors, function( key, value ) {
                                        errorsHtml += '<p class="text-danger">' + value[0] + '</p>';
                                    });

                                    $( '#form-errors' ).html( errorsHtml );

                                }
                            });

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
    <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ URL::asset('vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ URL::asset('dist/js/sb-admin-2.js') }}"></script>

    <script src="{{ URL::asset('js/admin/jquery.dataTables.min.js') }}"></script>

    <script src="{{ URL::asset('js/admin/bootbox.min.js') }}"></script>

    <!-- Creates the bootstrap modal where the image will appear -->
    <div class="modal fade" id="imgZoomModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="score"></h4>
                </div>
                <div class="modal-body" align="center">
                    <img src="" class="img-rounded img-responsive object-fit_fill" id="imagepreview" style='border:0px; width:auto;'>
                </div>
                <!-- 
                <div class="modal-footer">
                    <form method="POST" action="">
                        <h4 for="product_image" style="text-align: center" align="center">Update Product Image?</h4>
                        <div class="form-group" style="text-align: center;" align="center">
                            <input type="file" accept="image/*"
                                name="product_image" id="product_image" required>
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary update-image">Update</button>
                    </form>
                </div>
                -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Product - Update</h4>
                </div>
                <div class="modal-body">
                    <form name="updateForm" id="updateForm" >
                        {{ csrf_field() }}
                        <input type="hidden" name="product_id" id="product_id">
                        <div id="form-errors"></div>
                        <div class="form-group" hidden>
                            <label for="product_id">Product ID</label>
                            <input type="text" class="form-control" id="product_id"
                                name="product_id" placeholder="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category ID</label>
                            <input type="hidden" class="form-control" id="category_id" name="category_id">
                            <input type="text" class="form-control" id="category_name"
                                   name="category_name" placeholder="Enter Category Name" disabled>
                        </div>
                        <div class="form-group">
                            <label for="sub_category_id">Sub Category ID</label>
                            <input type="hidden" class="form-control" id="sub_category_id" name="sub_category_id">
                            <input type="text" class="form-control" id="sub_category_name"
                                   name="sub_category_name" placeholder="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name"
                                name="product_name" placeholder="Enter Product Name">
                        </div>
                        <div class="form-group">
                            <label for="product_desc">Description</label>
                            <input type="text" class="form-control" id="product_desc"
                                name="product_desc" placeholder="Enter Product Description">
                        </div>

                        <div class="form-group">
                            <label for="category">Color</label>
                            <select class="form-control" id="color" name="color">
                                <option value="0">Select Color</option>
                                @foreach($colors as $color)
                                    <option value="{{$color->color_id}}">{{$color->color}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category">Size</label>
                            <select class="form-control" id="size" name="size">
                                <option value="0">Select Size</option>
                                @foreach($sizes as $size)
                                    <option value="{{$size->size_id}}">{{$size->description}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="product_name">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter the number of items" value="">
                        </div>

                        <div class="form-group">
                            <label for="price">Unit Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter the unit price per item" value="">
                        </div>

                        <div class="form-group" id="image-preview"></div>

                        <div class="form-group">
                            <label for="product_image">Product Image</label>
                            <input type="file" id="product_image" name="product_image" placeholder="Enter Product Image" required='require' value="">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <!-- <input type="hidden" name="product_id" id="product_id"> -->
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save-changes">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




</body>

</html>