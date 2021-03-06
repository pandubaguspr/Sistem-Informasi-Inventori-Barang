@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Instock</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Instock</a></li>
                    <li class="breadcrumb-item active">Create Instock</li>
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

                @if(!empty($errors->all())) 

                     <div class="alert alert-danger"> 
                        <ul> 
                        @foreach($errors->all() as $error) 
                            <li>{{ $error }}</li> 
                        @endforeach 
                        </ul> 
                    </div> 

                @endif 

                <div class="card">
                    {{ Form::open(['route' => 'totalstock.store', 'files' => true]) }}
                    <div class="card-header">
                        Form Tambah Instock
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('instock_id', 'Instock') }}
                                    {{ Form::select('instock_id', $instocks, null, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'id']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('outstock_id', 'Outstock') }}
                                    {{ Form::select('outstock_id', $outstocks, null, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'id']) }}
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('totalstock.index') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Add totalstock</button>
                    </div>
                    {{ Form::close() }}
                    <!-- </form> -->
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection