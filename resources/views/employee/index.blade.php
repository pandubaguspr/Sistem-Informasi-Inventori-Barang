@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Employee</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Employee</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Employee</h3>
                        
                        <div class="card-tools">
                            <a href="{{URL::to('employee/create') }}" class="btn btn-tool"><i class="fa fa-plus"></i> Add</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                        <div id="alert-msg" class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        @if(Session::has('info'))
                        <div id="alert-msg" class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ Session::get('info') }}
                        </div>
                        @endif
                        @if(Session::has('warning'))
                        <div id="alert-msg" class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ Session::get('warning') }}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $row)
                                    <tr>
                                        <td>{{ $row->employee_id }}</td>
                                        <td>{{ $row->employee_code }}</td>
                                        <td>{{ $row->employee_name }}</td>
                                        <td>{{ $row->employee_address }}</td>
                                        <td>{{ $row->employee_phone }}</td>
                                        <td>{{ $row->employee_email }}</td>
                                        <td>{{ $row->employee_role }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{URL::to('employee/show/'.$row->employee_id)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                <a href="{{URL::to('employee/'.$row->employee_id.'/edit')}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger" onclick="deleteConfirm('{{ URL::to('employee/delete/'.$row->employee_id) }}', '{{ $row->employee_name }}');"><i class="fa fa-trash"></i></a>    
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data <b><span id="show_name">bbcdbcndbc</span></b> ini?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="#" id="btn_delete" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>

<script>

    function deleteConfirm(url, name) {
        // Menambahkan value dari suatu atribut di HTML 
        $("#btn_delete").attr('href', url);
        // Input nama kategori ke id show_name
        $("#show_name").html(name);
        // Memanggil modal berdasarkan ID
        $("#deleteModal").modal();
    }

</script>
@endsection