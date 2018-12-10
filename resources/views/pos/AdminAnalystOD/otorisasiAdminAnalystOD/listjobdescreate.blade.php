@extends('layouts.adminLTE')

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('Printjs/print.min.css') }}">
@endsection

@section('script')
<!-- DataTables -->
<script src="{{ url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{url ('Printjs/print.min.js') }}"></script>
<script>
    // printJS('printJS-form', 'html');
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

@section('content')
<!-- Main content -->

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
    
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title dimensions</h3>
            
            <div class="box-footer">
                <a class="btn btn-primary" href="{{ url('AdminAnalystOD/formjobdescreate') }}">create</a>
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
                @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                @endif

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Jobdes</th>
                            <th>Analist</th>
                            <th>Validasi by</th>
                            <th>Aprove by</th>
                            <th>Aproved by ODHCP</th>
                            <th>status</th>
                            <th>ACT</th>

                        </tr>
                    </thead>
                    <tbody>                        
                        @foreach ($tj as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->no_jabatan}}</td>
                            <td>Bambang Nugroho</td>
                            <td>MOH KOHIR AMAN</td>
                            <td>Hasri Suryani</td>
                            <td>Hasri Suryani</td>
                            <td>{{$item->verifikasi}}</td>
                            <td>
                                <a class="glyphicon glyphicon-pencil" href="{{ url('AdminAnalystOD/fromadddimensions') }}"></a>
                                <a class="glyphicon glyphicon-search" data-toggle="modal" data-target="#modal-info"></a>
                                <a class="glyphicon glyphicon-trash" href="{{ url('AdminAnalystOD/fromadddimensions') }}"></a>
                                <a class="glyphicon glyphicon-print" href="javascrpt:void(0)" onclick="printJS('print{{$item->id}}', 'html')"></a>
                                {{-- <td><a href="{{action('UserDetailController@downloadPDF', $user->id)}}">PDF</a></td> --}}
                            </td>
                        </tr>
                        <div class="modal modal-info fade" id="modal-info">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Konfirmasi</h4>
                                    </div>
                                </div>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h1 class="modal-title">text</h1>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('AdminAnalystOD/konfirmasi') }}/{{ $item->id }}" method="get">
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

    <section>
        @include('pos/AdminAnalystOD/otorisasiAdminAnalystOD/pdf')
    </section>
    @endsection