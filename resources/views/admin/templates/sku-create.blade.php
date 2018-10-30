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
                    <form role="form" method="post" action="/admin/sku/create/save">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="category">Select Product</label>
                            <select class="form-control" id="product" name="product">
                                @foreach($products as $product)
                                    <option value="{{$product->product_id}}">{{$product->product_name}}</option>
                                @endforeach
                            </select>
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
