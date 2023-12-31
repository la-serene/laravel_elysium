@include('admin.layouts.header')

@include('admin.layouts.sidebar')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th data-orderable="false">Name</th>
                                <th data-orderable="false">Email</th>
                                <th data-orderable="false">Address</th>
                                <th data-orderable="false">District</th>
                                <th data-orderable="false">City</th>
                                <th data-orderable="false">Phone Number</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->id }}</a></td>
                                <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->first_name }} {{ $user->last_name }}</a></td>
                                <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->email }}</a></td>
                                <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->address }}</a></td>
                                <td>
                                    @if ($user && $user->district)
                                    <a href="{{ route('admin.users.show', $user->id) }}">{{ $user->district->name }}
                                    @endif
                                    </a>
                                </td>
                                <td>
                                    @if ($user && $user->city)
                                    <a href="{{ route('admin.users.show', $user->id) }}">{{ $user->city->name }}</a>
                                    @endif</td>
                                <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->phone_number }}</a></td>
                                <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->created_at }}</a></td>
                                <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->updated_at }}</a></td>
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
