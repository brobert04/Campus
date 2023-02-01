@extends('admin.template')
@section('title', Auth::user()->name . ' | ' . 'User Management')
@section('custom-css')
    <link rel="stylesheet" href="{{asset('../backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('../backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Management</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->role}}</td>
                    <td class="text-center">
                        <a href="{{route('users.edit', $user->id)}}" class="text-primary" style="margin-right: 20px;">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="#" class="text-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('custom-js')
    <script src="{{asset('../backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('../backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('../backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('../backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('../backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('../backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('../backend/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('../backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('../backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('../backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('../backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('../backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        setTimeout(()=>{
            document.getElementById('alert').style.display = 'none';
        }, 3000);

        @if(session()->has('success'))
        $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'User management',
                    autohide: true,
                    delay: 2500,
                    body: '{{ session()->get('success') }}'
        })
        @endif
        @if(session()->has('error'))
        $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'User management',
                    autohide: true,
                    delay: 2500,
                    body: '{{ session()->get('error') }}'
        })
        @endif
    </script>

@endsection

