@extends('layouts.adminLTE')
@section('style')
<link rel="stylesheet" href="{{ url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('script')
<script src="{{ url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
@endsection

{{-- membuat pesan simpan --}}
@section('content')
@if (session('status'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        {{ session('status') }}
    </div>
@endif
{{-- and --}}
<section class="content-header">
    <h1>
        Data Tables
        <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title Lingkungan Kerja</h3>
            
            <div class="box-footer">
                <a class="btn btn-primary" href="{{ url('AdminAnalystOD/fromAddlingkungankerja') }}">Tambah</a>
            </div>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Lingkungan</th>
                            <th>ACT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0; ?>
                        @foreach ($tj as $item)
                        <?php $no++; ?>
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->deskripsi}}</td>
                            <td>
                                <a class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modal-info{{ $item->id }}"></a>
                                {{-- <a class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modal-info{{ $item->id }}"></a> --}}
                                <a class="glyphicon glyphicon-trash" data-toggle="modal" data-target="#modal-delete{{ $item->id }}"></a>
                            </td>
                        </tr>
                        <div class="modal modal-info fade" id="modal-info{{ $item->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Yakin Ingin Melakukan Update</h4>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('AdminAnalystOD/editlingkungankerja/'.$item->id) }}" method="get">
                                            <button type="submit" class="btn btn-sm btn-success">OK</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <div class="modal modal-info fade" id="modal-delete{{ $item->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Yakin Data akan Di hapus</h4>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('AdminAnalystOD/deletelingkungankerja/'.$item->id) }}" method="get">
                                        <button type="submit" class="btn btn-sm btn-success">OK</button>
                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection