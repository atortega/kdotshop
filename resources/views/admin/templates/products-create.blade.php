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
                        <h1 class="page-header">Products - Add New</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form role="form" method="post" action="/admin/products/create/save" enctype="multipart/form-data">
                        {{ csrf_field() }}
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
                                <option value="0">Select...</option>
                                @foreach($sub_categories as $sub_category)
                                    <option value="{{$sub_category->sub_category_id}}">{{$sub_category->sub_category_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter the Product Name" value="">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter text here..."></textarea>
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
                            <label for="product_image">Product Image</label>
                            <input type="file" name="product_image" placeholder="Enter Product Image" required='require' value="">
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button> 
                    </form>
                </div>
                

            </div>
            <!-- /.container-flui,
                d -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>

    <script>
        $('#category').on('change', function(e) {
            $('#sub_category').empty();
            $('#sub_category').append('<option value="0">No Sub Category</option>')
            $.ajax({
                url: '/admin/sub-categories/get/' + e.target.value,
                success: data => {
                    $.each(data, function(index,subCatObj) {
                        $('#sub_category').append('<option value="'+ subCatObj.sub_category_id +'">'+subCatObj.sub_category_name+'</option>')
                    })
                }
            })
        });
    </script>

</body>

</html>
