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
@extends('master')

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
            <h3 class="box-title">Title Responsibility</h3>
            
            <div class="box-footer">
                <a class="btn btn-primary" href="{{ url('AdminAnalystOD/fromaddJobIdentification') }}">Tambah</a>
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
                <tr>
                    <td>
                      {{$user->full_name}}
                    </td>
                    <td>
                      {{$user->street_address}}
                    </td>
                  </tr>
                  <tr>
                    <td>
                      {{$user->city}}
                    </td>
                    <td>
                      {{$user->zip_code}}
                    </td>
                  </tr>
            </div>
        </div>
    </section>
    @endsection