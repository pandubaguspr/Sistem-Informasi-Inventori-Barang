@extends('template')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Instocks</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Instocks</li>
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
                        <h3 class="card-title">Instocks</h3>
                        
                        <div class="card-tools">
                            <a href="{{ route('instock.create') }}" class="btn btn-tool"><i class="fa fa-plus"></i> Add</a>
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
                                        <th>No</th>
                                        <th>Vendor</th>
                                        <th>Product</th>
                                        <th>Total</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $no = 0;
                                ?>
                                @foreach($instocks as $row)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $row->vendor->vendor_name }}</td>
                                        <td>{{ $row->product->product_name }}</td>
                                        <td>{{ $row->instock_total }}</td>
                                        <td>{{ "Rp. ".number_format($row->instock_price) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($row->instock_date)) }}</td>
                                        <!-- <td><img src="{{ asset('storage/'.$row->product_image) }}" class="img-fluid" width="120"></td> -->
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('instock.show', $row->instock_id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('instock.edit', $row->instock_id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger" onclick="deleteConfirm('{{ url('instock/delete/'.$row->instock_id) }}', '{{ $row->instock_name }}');"><i class="fa fa-trash-alt"></i></a>    
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $instocks->links() }}
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
                <h4 class="modal-title">Delete Instocks</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus Instock <b><span id="show_name"></span></b> ini?</p>
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

    $(document).ready(function() {

        $("#category").on('change', function(){
            filter();
        });

        $("#keyword").keypress(function(event){

            if(event.keyCode == 13){ // Enter
                filter();
            }

        });

        var filter  = function(){
            var category = $("#category").val();
            var keyword = $("#keyword").val();

            window.location.replace("{{ url('product') }}?category="+category+"&keyword="+keyword);
        }
    });

</script>
@endsection