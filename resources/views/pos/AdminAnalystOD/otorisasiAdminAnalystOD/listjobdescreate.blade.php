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

    //$(function())
    function showpesan(item){
    gethistorypesan(item.id);
}
function gethistorypesan(id){
    //var id=1;
    $('#tbhispesan').DataTable( {
            "ajax": "{{ url('AdminAnalystOD/show-historypesan') }}/"+id,
            "bDestroy":true,
            "columns": [
                { "data": "no"},
                { "data": "nama" },
                { "data": "pesan" },
                { "data": "namaanalis" },
                { "data": "created_at" },
                { "data": "status" },
            ]
        } );
}
function konfirmasirevisi(id,descid){
    if (confirm("Apakah anda yakin ?") == true) {
        $.ajax({
            url: "{{ url('AdminAnalystOD/konfirmasipesan') }}/"+id,
            method: 'get',
            success: function(data) {
            if(data=='success'){
                alert('Konfirmasi berhasil !');
                location.reload();
                //gethistorypesan(descid);

            }else{
                alert('Konfirmasi gagal !');
            }

           }
        });
        }
}
function validasianalis(id){
    if (confirm("Apakah anda yakin ?") == true) {
        $.ajax({
            url: "{{ url('AdminAnalystOD/konfirmasi') }}/"+id,
            method: 'get',
            success: function(data) {
            if(data=='success'){
                alert('Validasi berhasil !');
                location.reload();
                
            }else{
                alert('validasi gagal !');
            }

           }
        });
        }
}
function view_job(id){
    $.ajax({
            url: "{{ url('AdminAnalystOD/getjobdescreate') }}/"+id,
            method: 'get',
            success: function(data) {
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
             var no=0;
             var html='';
             for (i = 0; i < data.job.length; i++) {
                no++;
                html+='<tr><td>'+no+'</td><td>'+data.job[i].jabatanbawahanlangsung+'</td><td>'+data.job[i].jumlah+'</td></tr>';
                }
                $('#jbl').html(html);

            var no2=0;
            var html2='';
            for (i = 0; i < data.jobres.length; i++) {
                no++;
                html2+='<tr><td>'+data.jobres[i].keterangan+'</td><td>'+data.jobres[i].object+'</td><td>'+data.jobres[i].indikator+'</td></tr>';
                }
                $('#uno').html(html2);
                // }

            var no3=0;
            var html3='';
            for (i = 0; i < data.unit.length; i++) {
                no++;
                html3+='<tr><td>'+data.unit[i].id_emp_cskt_ltext+'</td><td>'+data.unit[i].id_hal_internal+'</td><td>'+data.unit[i].id_eksternal+'</td><td>'+data.unit[i].id_hal_external+'</td></tr>';
                }
                $('#wowo').html(html3);

            var no4=0;
            var html4='';
            for (i = 0; i < data.tools.length; i++) {
                no++;
                html4+='<tr><td>'+data.tools[i].id_deskripsi+'</td></tr>';
                }
                $('#tools').html(html4);
            
            var no5=0;
            var html5='';
            for (i = 0; i < data.mat.length; i++) {
                no++;
                html5+='<tr><td>'+data.mat[i].id_deskripsi+'</td></tr>';
                }
                $('#mat').html(html5);
            
            var no6=0;
            var html6='';
            for (i = 0; i < data.co.length; i++) {
                no++;
                html6+='<tr><td>'+data.co[i].id_deskripsi+'</td></tr>';
                }
                $('#co').html(html6);

            var no7=0;
            var html7='';
            for (i = 0; i < data.pen.length; i++) {
                no++;
                html7+='<tr><td>'+data.pen[i].id_jenjang+'</td></tr>';
                }
                $('#pen').html(html7);
            
            var no8=0;
            var html8='';
            for (i = 0; i < data.ker.length; i++) {
                no++;
                html8+='<tr><td>'+data.ker[i].id_keterangan+'</td></tr>';
                }
                $('#ker').html(html8);
            
            var no9=0;
            var html9='';
            for (i = 0; i < data.profil_d.length; i++) {
                no++;
                html9+='<tr><td>'+no+'</td><td>'+data.profil_d[i].groupaspek+'</td><td>'+data.profil_d[i].namakompetensi+'</td><td>'+data.profil_d[i].proficiency+'</td></tr>';
                }
                $('#profil_d').html(html9);
           }
        });
}
</script>
@endsection

@section('content')
{{-- @foreach ($tj as $item)
    @foreach ($item->job as $item2)
    {{ $item2->jabatanatasanlangsung}}
    @endforeach
@endforeach
{{ dd($tj) }} --}}
<!-- Main content -->

<section class="content-header">
    <h1>
        Data Jobdesc
        <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data jobdesc</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Jobdesc</h3>
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
                            <th>No</th>
                            <th>Jobdes</th>
                            <th>Approve by analist</th>
                            <th>Approve by user</th>
                            <!--th>Aprove by atasan</th-->
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
                            <td>
                                @if($item->approveanalis==1)
                                    {{$item->analis}} (<a class="glyphicon glyphicon-thumbs-up" title="{{$item->tglapproveanalis}}"></a>)
                                @else
                                    {{$item->analis}}
                                    <!--form action="{{ url('AdminAnalystOD/konfirmasi') }}/{{ $item->id }}" method="get">
                                        <button type="submit" class="glyphicon glyphicon-thumbs-up" title="Klik disini untuk validasi"></button>
                                    </form-->
                                @endif
                            </td>
                            <td> @if($item->approveuser==1)
                                {{$item->namauser}} (<a class="glyphicon glyphicon-thumbs-up" title="{{$item->tglapproveuser}}"></a>)
                            @else
                                {{$item->namauser}}
                                
                            @endif</td>
                            <!--td>{{$item->atasan}}</td-->
                            <td>{{$item->approve}}</td>
                            <td>@if($item->statusapprove==1)
                                    <a class="btn btn-success" href="#">Selesai</a>
                                 @else
                                 <a class="btn btn-warning" href="#">Progress...</a>
                                 @endif
                                </td>
                            <td>
                                <a class="glyphicon glyphicon-pencil" href="{{ url('AdminAnalystOD/editjobdescreate',['id'=>$item->id]) }}"></a>
                                <a class="glyphicon glyphicon-search" data-toggle="modal" data-target="#modal-info" onclick="view_job({{$item->id}})"></a>
                                <a class="glyphicon glyphicon-comment" data-toggle="modal" data-target="#modal-pesan" onclick="showpesan({{$item}});"></a>
                                <a class="glyphicon glyphicon-trash" href="{{ url('AdminAnalystOD/fromadddimensions') }}"></a>
                                <a class="glyphicon glyphicon-print" href="javascrpt:void(0)" onclick="printJS('print{{$item->id}}', 'html')"></a>
                                @if($item->approveanalis==null && $item->konfirmvalidanalis==1)
                                <a class="glyphicon glyphicon-thumbs-up" title="Klik di sini untuk validasi !" onclick="validasianalis({{ $item->id }});"></a>
                                @endif
                                {{-- <td><a href="{{action('UserDetailController@downloadPDF', $user->id)}}">PDF</a></td> --}}
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
                                                            <tbody ></tbody>
                                                        </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal modal-info fade" id="modal-info">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Konfirmasi</h4>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">      
                                                <h5>URAIAN JABATAN (Job Description)</h5>
                                                <thead>
                                                   <tr>
                                                        <td width=40%>Record Sheet No</td>
                                                        <td>:</td>
                                                        <td width=50%>RS/PO01/001-ISSUE No.3</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Issue Date</td>
                                                        <td>:</td>
                                                        <td>01/06/2010{{$item->no_jabatan}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Holder</td>
                                                        <td>:</td>
                                                        <td>Divisi OD&HCP</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Halaman (Page)</td>
                                                        <td>:</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tgl. Berlaku (Validity Date)</td>
                                                        <td>:</td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                             <table id="example1" class="table table-bordered table-striped" style="color:black">  
                                                <h5>I. IDENTIFIKASI JABATAN (Job Identification)</h5>
                                                <thead>
                                                    <tr>
                                                        <td width=40%>No. Jabatan (Job No.)</td>
                                                        <td>:</td>
                                                        <td width=60%>    
                                                            <input type="text" id="nojabatan" readonly class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gol. Jabatan (Job Level):</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" readonly class="form-control" id="LvlOrg" name="LvlOrg"  value="{{$item->gol_jabatan}}" size="70px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>name Jabatan (Job Name)</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" readonly class="form-control" class="form-control" id="NameofPosition" name="NameofPosition" value="{{$item->name_jabatan}}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dinas (Official)</td>
                                                        <td>:</td>
                                                        <td>                         
                                                            <input type="text" readonly class="form-control" id="NameofOrgUnitDinas" name="NameofOrgUnitDinas" value="{{$item->dinas}}" size="70px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Divisi (Division)</td>
                                                        <td>:</td>
                                                        <td>    
                                                            <input type="text"readonly  class="form-control" id="NameofOrgUnitDivisi" name="NameofOrgUnitDivisi" size="70px" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Subdirektorat(Subdirectorate)</td>
                                                        <td>:</td>
                                                        <td> 
                                                            <input type="text" readonly class="form-control" id="NameofOrgUnitSubDirektorat" name="NameofOrgUnitSubDirektorat" value="{{$item->subdirektorat}}" size="70px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Direktorat (Directorate)</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" readonly class="form-control"  id="NameofOrgUnitDirektorat" name="NameofOrgUnitDirektorat" value="{{$item->direktorat}}" size="70px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bertanggung jawab langsung kepada: <br>
                                                            (Directly Responsible to)
                                                        </td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" readonly class="form-control"  id="jabatanatasanlangsung" name="jabatanatasanlangsung" value="{{$item->job[0]->jabatanatasanlangsung}}" size="70px">
                                                        </td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <thead>
                                                    <tr>
                                                        <td>no</td>
                                                        <td>Jabatan yang diawasi langsung(Direct supervised positions)</td>
                                                        <td>jumlah</td>
                                                    </tr>
                                                    <tbody id="jbl"></tbody>
                                                </thead>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <h5>II. TUJUAN JABATAN (Primary Job Role)</h5>
                                                <thead>
                                                    <tr>
                                                        <td>{{$item->jobrole}}</td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <h5>III. TANGGUNG JAWAB UTAMA (Main Responsibility)</h5>
                                                <thead>
                                                    <tr>
                                                        <th width=20%>Kata Kerja</th>
                                                        <th width=40%>Tanggung Jawab (Duties & Responsibilities)</th>
                                                        <th width=40%>Indikator Capaian (Performance Indicators)<th>
                                                    </tr>
                                                </thead>
                                                <tbody id="uno">
                                                  
                                                </tbody>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <h5>IV. DIMENSI (Dimensions)</h5>
                                                <thead>
                                                    <tr>
                                                        <th>a. Finansial (Financial)</th>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$item->finansial}}</td>
                                                    </tr>
                                                </thead>
                                                <thead>
                                                    <tr>
                                                        <th>b. Non Finansial (Non Financial)</th>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$item->nonfinansial}}</td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <h5>WEWENANG</h5>
                                                @foreach ($item->jobdescreate_res as $item3)
                                                <thead>
                                                    <tr>
                                                        <td>{{$item3->id_met_kewenangan}}</td>
                                                    </tr>
                                                </thead>
                                                @endforeach
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <h5>VI. HUBUNGAN KERJA (Work Relationship)</h5>
                                                <thead>
                                                    <tr>
                                                        <th width=20%>a.Internal</th>
                                                        <th width=30%>Dalam Hal (Keterangan Internal)</th>
                                                        <th width=20%>b. Eksternal</th>
                                                        <th width=30%>Dalam Hal (Keterangan External)<th>
                                                    </tr>
                                                </thead>
                                                <tbody id="wowo">

                                                </tbody>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <h5>VII. ALAT,BAHAN,DAN LINGKUNGAN KERJA (Tools, Materials, and Conditions)</h5>
                                                <thead>
                                                    <tr>
                                                        <th>Alat Kerja</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tools"></tbody>
                                                <thead>
                                                    <tr>
                                                        <th>Bahan Kerja (Materials)</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="mat"></tbody>
                                                <thead>
                                                    <tr>
                                                        <th>Lingk. Kerja (Conditions)</th>
                                                    </tr>
                                                </thead>
                                                    <tbody id="co"></tbody>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <h5>VIII. PERSYARATAN JABATAN (Job Spesifications)</h5>
                                                <thead>
                                                    <tr>
                                                        <th>Pendidikan</th>
                                                    </tr>
                                                    <tbody id="pen"></tbody>
                                                </thead>
                                                <thead>
                                                    <tr>
                                                        <th>Pengalaman Kerja</th>
                                                    </tr>
                                                    <tbody id="ker"></tbody>
                                                </thead>
                                                <thead>
                                                    <tr>
                                                        <th>Persyaratan Fisik</th>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$item->persyaratan_fisik}}</td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <thead>
                                                    <tr>
                                                        <th>4. Profile Jabatan</th>
                                                    </tr>
                                                    <tr>
                                                        <td width=50%>Nama Jabatan</td>
                                                        <td>:</td>
                                                        <td width=50%>    
                                                            <input type="text" readonly class="form-control" id="namajabatan" name="namajabatan" value="{{$item->namajabatan}}" size="70px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width=50%>Golongan</td>
                                                        <td>:</td>
                                                        <td width=50%>    
                                                            <input type="text" readonly class="form-control" id="golongan" name="golongan" value="{{$item->golongan}}" size="70px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width=50%>No Jabatan</td>
                                                        <td>:</td>
                                                        <td width=50%>    
                                                            <input type="text" readonly class="form-control" id="nojabatan" name="nojabatan" value="{{$item->nojabatan}}" size="70px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width=50%>NO.ORG</td>
                                                        <td>:</td>
                                                        <td width=50%>    
                                                            <input type="text" readonly class="form-control" id="noorg" name="noorg" value="{{$item->noorg}}" size="70px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width=50%>Unit Kerja</td>
                                                        <td>:</td>
                                                        <td width=50%>    
                                                            <input type="text" readonly class="form-control" id="unitkerja" name="unitkerja" value="{{$item->unitkerja}}" size="70px">
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td width=50%>JOB GROUP</td>
                                                        <td>:</td>
                                                        <td width=50%>    
                                                            <input type="text" readonly class="form-control" id="jobgroup" name="jobgroup" value="{{$item->jobgroup}}" size="70px">
                                                        </td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <thead>
                                                   <tr>
                                                        <th>NO</th>
                                                        <th>GROUP ASPEK</th>
                                                        <th>NAMA KOMPETENSI</th>
                                                        <th>PROFISIENSI</th>
                                                    </tr>         
                                                </thead>
                                                <thead>
                                                <tbody id="profil_d"></tbody>
                                            </table>
                                            <form action="{{ url('AdminAnalystOD/konfirmasi') }}/{{ $item->id }}" method="get">
                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
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