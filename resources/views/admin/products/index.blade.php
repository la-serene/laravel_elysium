@include('admin.layouts.header')

@include('admin.layouts.sidebar')

 <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product List</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th data-orderable="false">Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Sold</th>
                                <th data-orderable="false">Category</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th data-orderable="false">Options</th>
                                <th data-orderable="false">Select</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td><a href="{{ route('admin.products.show', $product->id) }}"><img src="{{ asset($product->image) }}" class="product-image" alt="Product Image"></a></td>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->title }}</a></td>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">${{ $product->price }} <br> Discount : {{ $product->discount }}% </a></td>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->total_stock }}</a></td>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->total_sales }}</a></td>
                                <td>
                                    <a href="{{ route('admin.products.show', $product->id) }}">
                                    {{ $product->category->title }}
                                    <br>
                                    @if ($product && $product->subcategory1)
                                    {{ $product->subcategory1->title }}
                                    @endif
                                    <br>
                                    @if ($product && $product->subcategory2)
                                    {{ $product->subcategory2->title }}
                                    @endif
                                    </a>
                                </td>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->created_at }}</a></td>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->updated_at }}</a></td>
                                <td>
                                    <div class="d-inline">
                                        <!-- Delete form -->
                                        <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>
                                        </form>

                                        <!-- Edit form -->
                                        <form action="{{ route('admin.products.edit', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fas fa-pencil-alt"></i>Edit
                                            </button>
                                        </form>  
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="selected_products[]" value="{{ $product->id }}">
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <!-- Add this button after the </tbody> tag -->
                    </table>
                    <button id="delete-selected" class="btn btn-danger" type="button">Delete Selected</button>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
 </div>

@include('admin.layouts.footer')
<style>
    .product-image {
        width: 100px; /* Kích thước chiều rộng mong muốn */
        height: 100px; /* Kích thước chiều cao mong muốn */
        object-fit: cover; /* Chỉnh sửa ảnh để vừa với kích thước đã định */
        display: block;
    }
</style>

<!-- DataTables & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



<script>
    $(function () {
        // Add a click event listener to the "Delete Selected" button
        $('#delete-selected').click(function () {
            var selectedProductIds = [];

            // Get the IDs of the selected products
            $('input[name="selected_products[]"]:checked').each(function () {
                selectedProductIds.push($(this).val());
            });

            // Send an AJAX request to delete the selected products
            if (selectedProductIds.length > 0) {
                if (confirm('Are you sure you want to delete the selected products?')) {
                    $.ajax({
                        url: '{{ route("admin.products.deleteSelected") }}',
                        type: 'POST',
                        data: {
                            selected_products: selectedProductIds,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            // Handle the response, e.g., show a success message or refresh the page
                            alert('Selected products deleted successfully.');
                            location.reload();
                        },
                        error: function (xhr) {
                            // Handle the error response, e.g., show an error message
                            alert('An error occurred while deleting the selected products.');
                        }
                    });
                }
            } else {
                alert('Please select at least one product to delete.');
            }
        });

        // Rest of your existing DataTables initialization code
        // ...
    });
</script>



<script>
    function confirmDelete(event) {
        event.preventDefault(); // Prevent the form from submitting immediately
        
        // Display the confirmation message with Yes/No options
        if (confirm("Are you sure you want to delete this product?")) {
            // If the user clicks "Yes", submit the form
            event.target.submit();
        } else {
            // If the user clicks "No", do nothing
            return false;
        }
    }
</script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        // Remove the initialization code for example2
    });
</script>


