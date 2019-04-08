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
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })

    //$(function())
    function showpesan(item) {
        gethistorypesan(item.id);
    }
    function showapproval(item){
        console.log(item);
        gethistoryapproval(item.id);
    }
    function gethistoryapproval(id) {
        //var id=1;
        $('#tbhisapproval').DataTable({
            "ajax": "{{ url('AdminAnalystOD/show-historyapproval') }}/" + id,
            "bDestroy": true,
            "columns": [
                { "data": "no" },
                { "data": "nik" },
                { "data": "nama" },
                { "data": "sebagai" },
                { "data": "waktu" }
            ]
        });
    }
    function gethistorypesan(id) {
        //var id=1;
        $('#tbhispesan').DataTable({
            "ajax": "{{ url('AdminAnalystOD/show-historypesan') }}/" + id,
            "bDestroy": true,
            "columns": [
                { "data": "no" },
                { "data": "nama" },
                { "data": "pesan" },
                { "data": "namaanalis" },
                { "data": "created_at" },
                { "data": "status" },
            ]
        });
    }
    function konfirmasirevisi(id, descid) {
        if (confirm("Apakah anda yakin ?") == true) {
            $.ajax({
                url: "{{ url('AdminAnalystOD/konfirmasipesan') }}/" + id,
                method: 'get',
                success: function (data) {
                    if (data == 'success') {
                        alert('Konfirmasi berhasil !');
                        location.reload();
                        //gethistorypesan(descid);

                    } else {
                        alert('Konfirmasi gagal !');
                    }

                }
            });
        }
    }
    function validasianalis(id) {
        if (confirm("Apakah anda yakin ?") == true) {
            $.ajax({
                url: "{{ url('AdminAnalystOD/konfirmasi') }}/" + id,
                method: 'get',
                success: function (data) {
                    if (data == 'success') {
                        alert('Validasi berhasil !');
                        location.reload();

                    } else {
                        alert('validasi gagal !');
                    }

                }
            });
        }
    }
    function kadaluarsa(id) {
        if (confirm("Apakah anda yakin ?") == true) {
            $.ajax({
                url: "{{ url('AdminAnalystOD/kadaluarsa') }}/" + id,
                method: 'get',
                success: function (data) {
                    if (data == 'success') {
                        alert('Status kadaluarsa berhasil !');
                        location.reload();

                    } else {
                        alert('Status kadaluarsa gagal !');
                    }

                }
            });
        }
    }

    
</script>
@endsection
@section('content')

@if (session('status'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Alert!</h4>
    {{ session('status') }}
</div>
@endif
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Jobdesc</h3>
            <div class="box-footer">
                <a class="btn btn-primary" href="{{ url('AdminAnalystOD/formjobdescreate') }}">create</a>
            </div>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                        <th>No</th>
                        <th>Jobdes</th>
                        <th>Name of Position</th>
                        <th>Approve by analist</th>
                        <th>Approve by user</th>
                        <th>Aproved by ODHCP</th>
                        <th>status</th>11
                        <th width="10%">ACT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=0;?>
                    @foreach ($tj as $item)
                    <?php $no++;?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$item->no_jabatan}}</td>
                        <td>{{$item->name_jabatan}}</td>
                        <td>
                            @if($item->approveanalis==1)
                            {{$item->nikanalis."(".$item->analis."-".$item->jabanalis.")"}} (<a class="glyphicon glyphicon-thumbs-up"
                                title="{{$item->tglapproveanalis}}"></a>)
                            @else
                            {{$item->nikanalis."(".$item->analis."-".$item->jabanalis.")"}}
                            @endif
                        </td>
                        <td> @if($item->approveuser==1)
                            {{$item->nikuser."(".$item->namauser."-".$item->jabuser.")"}} (<a class="glyphicon glyphicon-thumbs-up"
                                title="{{$item->tglapproveuser}}"></a>)
                            @else
                            {{$item->nikuser."(".$item->namauser."-".$item->jabuser.")"}}

                            @endif</td>
                        <!--td>{{$item->atasan}}</td-->
                        <td>
                            @if($item->approveodhcp==1)
                            {{$item->nikapprove."(".$item->approve."-".$item->jabapprove.")"}} (<a class="glyphicon glyphicon-thumbs-up"
                                title="{{$item->tglapproveodhcp}}"></a>)
                            @else
                            {{$item->nikapprove."(".$item->approve."-".$item->jabapprove.")"}}

                            @endif</td>

                        <td>@if($item->posisiprogress==3)
                            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#modal-approval" onclick="showapproval({{$item}});"><i class="fa   fa-check" title="Selesai"></i></a>
                            @elseif($item->posisiprogress==1)
                            <a class="btn btn-warning" href="#" data-toggle="modal" data-target="#modal-approval" onclick="showapproval({{$item}});"><i class="fa  fa-spinner" title="Menunggu validasi user/atasan"></i></a>
                            @elseif($item->posisiprogress==2)
                            <a class="btn btn-warning" href="#" data-toggle="modal" data-target="#modal-approval" onclick="showapproval({{$item}});"><i class="fa  fa-spinner" title="Menunggu validasi manager odhcp"></i></a>
                            @elseif($item->posisiprogress==0)
                            <a class="btn btn-warning" href="#" data-toggle="modal" data-target="#modal-approval" onclick="showapproval({{$item}});"><i class="fa  fa-spinner" title="Draft"></i></a>

                            @elseif($item->posisiprogress==4)
                            <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-approval" onclick="showapproval({{$item}});"><i class="fa    fa-briefcase" title="Status kadaluarsa tanggal : {{$item->tglkadaluarsa}}"></i></a>

                            @endif
                        </td>
                        <td>
                            <a class="glyphicon glyphicon-pencil" href="{{ url('AdminAnalystOD/editjobdescreate',['id'=>$item->id]) }}"></a>
                            <a class="glyphicon glyphicon-search" data-toggle="modal" data-target="#modal-info" onclick="view_job({{$item->id}})"></a>
                            <a class="glyphicon glyphicon-comment" data-toggle="modal" data-target="#modal-pesan"
                                onclick="showpesan({{$item}});"></a>
                            <a class="glyphicon glyphicon-trash" href="{{ url('AdminAnalystOD/deletejobdescreate',['id'=>$item->id]) }}"></a>
                            {{-- <a class="glyphicon glyphicon-print" href="javascrpt:void(0)" onclick="printJS('print{{$item->id}}', 'html')"></a>
                            --}}
                            <a class="glyphicon glyphicon-print" href="{{ url('AdminAnalystOD/pdf',['id'=>$item->id]) }}"></a>
                            @if($item->approveanalis==0)
                            <a class="glyphicon glyphicon-thumbs-up" title="Klik di sini untuk validasi !" onclick="validasianalis({{ $item->id }});"></a>
                            @endif
                            @if($item->posisiprogress==3 && Auth::user()->userid=='12610')
                            <a class="glyphicon glyphicon glyphicon-briefcase" title="Klik di sini sebagai kadaluarsa !"
                                onclick="kadaluarsa({{ $item->id }});"></a>
                            @endif
                            <div class="modal modal-info fade" id="modal-pesan">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Pesan Revisi</h4>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <b>History Pesan Revisi</b>
                                            <table id="tbhispesan" class="table" style="color:black" width="100%">
                                                <thead>
                                                    <tr>
                                                        <td>NO</td>
                                                        <td>Dikirim oleh</td>
                                                        <td>Pesan Revisi</td>
                                                        <td>Analis</td>
                                                        <td>Tanggal</td>
                                                        <td>Status</td>
                                                    </tr>
                                                </thead>
                                                <thead>
                                                <tbody></tbody>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal modal-info fade" id="modal-approval">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">History Approval</h4>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <b>History Approval</b>
                                            <table id="tbhisapproval" class="table" style="color:black" width="100%">
                                                <thead>
                                                    <tr>
                                                        <td>NO</td>
                                                        <td>Nik</td>
                                                        <td>Nama</td>
                                                        <td>Sebagai</td>
                                                        <td>Waktu</td>
                                                    </tr>
                                                </thead>
                                                <thead>
                                                <tbody></tbody>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <section>
                                @include('pos/AdminAnalystOD/otorisasiAdminAnalystOD/popup')
                            </section>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<section>
    {{-- @include('pos/AdminAnalystOD/otorisasiAdminAnalystOD/pdf') --}}
</section>
@endsection