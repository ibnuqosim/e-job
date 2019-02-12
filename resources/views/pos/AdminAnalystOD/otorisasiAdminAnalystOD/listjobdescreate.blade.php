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

    function view_job(id) {
        $.ajax({
            url: "{{ url('AdminAnalystOD/getjobdescreate') }}/" + id,
            method: 'get',
            success: function (data) {
                console.log(data);
                console.log(data.item);
                console.log(data.job);


                //alert(data[0].id);
                $('#nojabatan').val(data.item[0].no_jabatan);
                $('#NameofPosition').val(data.item[0].name_jabatan);
                $('#LvlOrg').val(data.item[0].gol_jabatan);
                $('#NameofOrgUnitDinas').val(data.item[0].dinas);
                $('#NameofOrgUnitDivisi').val(data.item[0].divisi);
                $('#NameofOrgUnitSubDirektorat').val(data.item[0].subdirektorat);
                $('#NameofOrgUnitDirektorat').val(data.item[0].direktorat);

                // untuk mengambil table dari profil
                $('#namajabatan').val(data.profil[0].namajabatan);
                $('#golongan').val(data.profil[0].golongan);
                $('#nojabatan').val(data.profil[0].nojabatan);
                $('#noorg').val(data.profil[0].noorg);
                $('#unitkerja').val(data.profil[0].unitkerja);
                $('#jobgroup').val(data.profil[0].jobgroup);

                console.log(data.job.length);
                var no = 0;
                var html = '';
                for (i = 0; i < data.job.length; i++) {
                    no++;
                    html += '<tr><td>' + no + '</td><td>' + data.job[i].jabatanbawahanlangsung + '</td><td>' + data.job[i].jumlah + '</td></tr>';
                }
                $('#jbl').html(html);

                var no2 = 0;
                var html2 = '';
                for (i = 0; i < data.jobres.length; i++) {
                    no++;
                    html2 += '<tr><td>' + data.jobres[i].keterangan + '</td><td>' + data.jobres[i].object + '</td><td>' + data.jobres[i].indikator + '</td></tr>';
                }
                $('#uno').html(html2);
                // }

                var no3 = 0;
                var html3 = '';
                for (i = 0; i < data.unit.length; i++) {
                    no++;
                    html3 += '<tr><td>' + data.unit[i].id_emp_cskt_ltext + '</td><td>' + data.unit[i].id_hal_internal + '</td><td>' + data.unit[i].id_eksternal + '</td><td>' + data.unit[i].id_hal_external + '</td></tr>';
                }
                $('#wowo').html(html3);

                var no4 = 0;
                var html4 = '';
                for (i = 0; i < data.tools.length; i++) {
                    no++;
                    html4 += '<tr><td>' + data.tools[i].id_deskripsi + '</td></tr>';
                }
                $('#tools').html(html4);

                var no5 = 0;
                var html5 = '';
                for (i = 0; i < data.mat.length; i++) {
                    no++;
                    html5 += '<tr><td>' + data.mat[i].id_deskripsi + '</td></tr>';
                }
                $('#mat').html(html5);

                var no6 = 0;
                var html6 = '';
                for (i = 0; i < data.co.length; i++) {
                    no++;
                    html6 += '<tr><td>' + data.co[i].id_deskripsi + '</td></tr>';
                }
                $('#co').html(html6);

                var no7 = 0;
                var html7 = '';
                for (i = 0; i < data.pen.length; i++) {
                    no++;
                    html7 += '<tr><td>' + data.pen[i].id_jenjang + '</td></tr>';
                }
                $('#pen').html(html7);

                var no8 = 0;
                var html8 = '';
                for (i = 0; i < data.ker.length; i++) {
                    no++;
                    html8 += '<tr><td>' + data.ker[i].id_keterangan + '</td></tr>';
                }
                $('#ker').html(html8);

                var no9 = 0;
                var html9 = '';
                for (i = 0; i < data.profil_d.length; i++) {
                    no9++;
                    html9 += '<tr><td>' + no9 + '</td><td>' + data.profil_d[i].groupaspek + '</td><td>' + data.profil_d[i].namakompetensi + '</td><td>' + data.profil_d[i].proficiency + '</td></tr>';
                }
                $('#profil_d').html(html9);

                var no10 = 0;
                var html10 = '';
                for (i = 0; i < data.fisik.length; i++) {
                    no++;
                    html10 += '<tr><td>' + data.fisik[i].id_persyaratan + '</td></tr>';
                }
                $('#fisik').html(html10);
            }

        });
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
                            @if($item->approveanalis==null && $item->konfirmvalidanalis==1)
                            <a class="glyphicon glyphicon-thumbs-up" title="Klik di sini untuk validasi !" onclick="validasianalis({{ $item->id }});"></a>
                            @endif
                            @if($item->posisiprogress==3)
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