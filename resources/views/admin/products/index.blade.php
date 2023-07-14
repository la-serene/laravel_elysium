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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Sold</th>
                                <th>Discount</th>
                                <th>Size ID</th>
                                <th>Color ID</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->id }}</a></td>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->title }}</a></td>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->price }}</a></td>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->stock }}</a></td>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->sold }}</a></td>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->discount }}</a></td>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->size_id }}</a></td>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->color_id }}</a></td>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->created_at }}</a></td>
                                <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->updated_at }}</a></td>
                                <td>
                                <form action="{{ route('admin.products.delete', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>Delete
                                    </button>
                                </form>
                                <form action="{{ route('admin.products.edit', $product->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" class="btn btn-primary">
                                        <i class="fas fa-pencil-alt"></i>Edit
                                    </button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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

