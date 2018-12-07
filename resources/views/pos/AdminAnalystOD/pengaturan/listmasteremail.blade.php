@extends('layouts.adminLTE')

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('script')
<!-- DataTables -->
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
            <h3 class="box-title">Master Pesan Email</h3>
            <div class="box-footer">
                <a class="btn btn-primary" href="{{ url('AdminAnalystOD/formmasteremail') }}">create</a>
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
                            <th width="10%">Id</th>
                            <th width="80%">Pesan email</th>  
                            <th width="10%">ACT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tj as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->deskripsiemail}}</td>>
                            <td>
                                <a class="glyphicon glyphicon-pencil" href="{{ url('AdminAnalystOD/fromadddimensions') }}"></a>
                                <a class="glyphicon glyphicon-search" href="{{ url('AdminAnalystOD/fromadddimensions') }}"></a>
                                <a class="glyphicon glyphicon-trash" href="{{ url('AdminAnalystOD/fromadddimensions') }}"></a>
                            </td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @endsection