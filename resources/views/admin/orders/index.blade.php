@include('admin.layouts.header')

@include('admin.layouts.sidebar')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Total Price</th>
                                <th>Address</th>
                                <th>District</th>
                                <th>City</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>State</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td><a href="{{ route('admin.orders.show', $order->id) }}">{{ $order->id }}</a></td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->district->name }}</td>
                                <td>{{ $order->city->name }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->updated_at }}</td>
                                <td>
                                    @if($order->state === 'pending')
                                        <button class="btn btn-primary">{{ $order->state }}</button>
                                    @elseif($order->state === 'confirmed')
                                        <button class="btn btn-success">{{ $order->state }}</button>
                                    @elseif($order->state === 'shipping')
                                        <button class="btn btn-info">{{ $order->state }}</button>
                                    @elseif($order->state === 'success')
                                        <button class="btn btn-primary">{{ $order->state }}</button>
                                    @elseif($order->state === 'canceled')
                                        <button class="btn btn-danger">{{ $order->state }}</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
>
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
