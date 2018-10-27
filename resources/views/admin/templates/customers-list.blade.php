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
                        <h1 class="page-header">Customers</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="container-fluid">
                    <a href="/admin/customers/create" class="btn btn-primary btn-xs" role="button">Add New</a>
                    <div class="mb-3">&nbsp;</div>
                    <table class="table table-bordered table-hover" id="table">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name </th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                 <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                    <a href="/admin/customers/create" class="btn btn-primary btn-xs" role="button">Add New</a>
                </div>

                <script>
                    $(function() {
                        var datatable = $('#table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ url('admin/customers/index') }}',
                            columns: [
                                { data: 'first_name', name: 'first_name' },
                                { data: 'middle_name', name: 'middle_name' },
                                { data: 'last_name', name: 'last_name' },
                                { data: 'gender', name: 'gender' },
                                { data: 'email', name: 'email' },
                                { data: 'phone_number', name: 'phone_number' },
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

                        $('#table').on('click', '.customer-edit-btn', function(){
                            var customer_id = $(this).attr('sid');
                            $.get( "/customers/get/"+customer_id, function( data ) {
                                $("#customer_id").val(customer_id);
                                $("#first_name").val(data.first_name);
                                $("#middle_name").val(data.middle_name);
                                $("#last_name").val(data.last_name);
                                $("#gender").val(data.gender);
                                $("#email").val(data.email);
                                $("#phone_number").val(data.phone_number);
                            });

                            $('#myModal').modal('show');
                        });

                        $('#table').on('click', '.customer-delete-btn', function(){
                            var customer_id = $(this).attr('sid');
                            var customer_name = $(this).attr('sname');
                            bootbox.confirm({
                                size: "small",
                                message: "Are you sure to delete this customer, "+customer_name+"?",
                                callback: function(result){
                                    /* result is a boolean; true = OK, false = Cancel*/
                                    if (result) {
                                        $.ajax({
                                            type: "POST",
                                            data: {customer_id: customer_id, _token: $('meta[name="csrf-token"]').attr('content')},
                                            cache: false,
                                            url: '/admin/customers/delete',
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
                            $.ajax({
                                type: "POST",
                                dataType: 'json',
                                data: { customer_id: $("#customer_id").val(), 
                                        first_name: $('#first_name').val(), 
                                        middle_name: $('#middle_name').val(), 
                                        last_name: $('#last_name').val(), 
                                        gender: $("#gender").val(),
                                        email: $("#email").val(),
                                        phone_number: $("#phone_number").val(),
                                        _token: $('meta[name="csrf-token"]').attr('content')    },
                                cache: false,
                                url: '/admin/customers/edit',
                                success: function(data){
                                    console.log(data);
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
            <!-- /.container-flui,
                d -->
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

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Customer - Update</h4>
                </div>
                <div class="modal-body">
                    <div id="form-errors"></div>
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" >
                    </div>
                    <div class="form-group">
                        <label for="mname">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" >
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" >
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text" class="form-control" id="gender" name="gender" placeholder="Enter Gender" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="customer_id" name="size_id" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save-changes" >Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


</body>

</html>
