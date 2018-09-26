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
                        <h1 class="page-header">Products</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="container-fluid">
                    <a href="/admin/products/create" class="btn btn-primary btn-xs" role="button">Add New</a>
                    <div class="mb-3">&nbsp;</div>
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Sub-Category</th>
                                <th>Product Name</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                    <a href="/admin/products/create" class="btn btn-primary btn-xs" role="button">Add New</a>
                </div>

                <script>
                    $(function() {
                        var modal_subcat = 0;
                        var datatable = $('#table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ url('admin/products/index') }}',
                            columns: [
                                { data: 'product_id', name: 'product_id' },
                                { data: 'product_image', 
                                    "render": function(data, type, row) {
                                        return '<img src="/storage/'+data+'" width="75" /><br /><spam class="small">'+row.product_name+'<br />SKU: '+row.sku+'</span>';
                                    }
                                },
                                { data: 'category_name', name: 'category_name' },
                                { data: 'sub_category_name', name: 'sub_category_name' },
                                { data: 'product_name', name: 'product_name' },
                                { data: 'color', name: 'color' },
                                { data: 'size', name: 'size' },
                                { data: 'unit_price', name: 'unit_price' },
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

                        $('#table').on('click', '.product-edit-btn', function(){
                            var product_id = $(this).attr('sid');
                            var product = JSON.parse($(this).attr('data-product'));
                            modal_subcat = product.sub_category_id;

                            $("#product_id").val(product.product_id)
                            $("#quantity").val(product.quantity)
                            $("#price").val(product.unit_price)
                            $("#product_name").val(product.product_name)
                            $("#description").val(product.product_desc)
                            $('[name=category]').val( product.category_id);
                            $("[name=category]").trigger( "change" );
                            $('[name=color]').val( product.color_id);
                            $('[name=size]').val( product.size_id);
                            var img = $('<img />').attr({
                                'id': 'product_image_'+product.product_id,
                                'src': '/storage/'+product.product_image,
                                'alt': '',
                                'title': '',
                                'width': 150
                            });
                            $("#image_container").html(img);
                            $('#myModal').modal('show');
                        });

                        $('#table').on('click', '.product-delete-btn', function(){
                            var product_id = $(this).attr('sid');
                            var product_name = $(this).attr('sname');
                            bootbox.confirm({
                                size: "small",
                                message: "Are you sure to delete this product, "+product_name+"?",
                                callback: function(result){
                                    /* result is a boolean; true = OK, false = Cancel*/
                                    if (result) {
                                        $.ajax({
                                            type: "POST",
                                            data: {product_id: product_id, _token: $('meta[name="csrf-token"]').attr('content')},
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

                        $('#category').on('change', function(e) {
                            $('#sub_category').empty();
                            $.ajax({
                                url: '/admin/sub-categories/get/' + e.target.value,
                                success: data => {
                                    $('#sub_category').append('<option value="0">No Sub Category</option>')
                                    console.log(modal_subcat);
                                    $.each(data, function(index,subCatObj) {
                                        if (subCatObj.sub_category_id == modal_subcat) {
                                            $('#sub_category').append('<option value="' + subCatObj.sub_category_id + '" selected="selected">' + subCatObj.sub_category_name + ' </option>')
                                            modal_subcat = 0;
                                        } else {
                                            $('#sub_category').append('<option value="' + subCatObj.sub_category_id + '">' + subCatObj.sub_category_name + '</option>')
                                        }
                                    })
                                }
                            })


                        });

                        $('form#modalForm').submit(function(e) {
                            e.preventDefault()
                            var formData = new FormData(this);
                            $.ajax({
                                type: "post",
                                dataType: 'json',
                                data: formData,
                                cache: false,
                                contentType: false,
                                processData: false,
                                url: '/admin/products/edit',
                                success: function(data){
                                    console.log(data);
                                    datatable.draw('page');
                                    $('#myModal').modal('hide');
                                },
                                error: function(e){  // error handling
                                    var errors = e.responseJSON;
                                    var errorsHtml = '';
                                    console.log(errors);
                                    //$.each(errors.errors, function( key, value ) {
                                        //errorsHtml += '<p class="text-danger">' + value[0] + '</p>';
                                    //});

                                    //$( '#form-errors' ).html( errorsHtml );
                                    datatable.draw('page');
                                    $('#myModal').modal('hide');
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
                    <h4 class="modal-title">Product - Update</h4>
                </div>
                <form id="modalForm" name="modalForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-errors" id="form-errors"></div>
                        {{ csrf_field() }}
                        <input type="hidden" id="product_id" name="product_id" />
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category">
                                @foreach($categories as $category)
                                    <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category">Sub Category</label>
                            <select class="form-control" id="sub_category" name="sub_category">

                            </select>
                        </div>


                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter the Product Name" value="">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control" placeholder="Enter text here..."></textarea>
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
                            <label for="product_name">Unit Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter the unit price per item" value="">
                        </div>

                        <div class="form-group">
                            <div id="image_container"></div>
                            <label for="product_image">Product Image</label>
                            <input type="file" name="product_image" placeholder="Enter Product Image" required='require' value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save-changes" >Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


</body>

</html>
