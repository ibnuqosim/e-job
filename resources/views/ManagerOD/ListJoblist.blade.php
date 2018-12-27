@extends('layouts.adminLTE') 
@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
 
@section('script')
<script src="{{ url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example1').DataTable( {
            "ajax": "{{ url('UserSuptMgrGM/show-ajax') }}",
            "columns": [
                { "data": "no"},
                { "data": "no_jabatan" },
                { "data": "analis" },
                { "data": "namauser" },
            ]
        } );
    } );

</script>
@endsection

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">JOB LIST</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>JOBDES</th>
                        <th>ANALIST</th>
                        <th>VALIDASI BY</th>
                        <th>APPROVE BY</th>
                        <th>APPROVE BY ODHCP</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection