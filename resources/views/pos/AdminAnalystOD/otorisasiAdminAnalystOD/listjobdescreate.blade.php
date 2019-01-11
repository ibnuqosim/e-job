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
    <!-- Default box -->
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
                            <td>@if($item->approveanalis==1)
                                    {{$item->analis}} (<a class="glyphicon glyphicon-thumbs-up" title="{{$item->tglapproveanalis}}"></a>)
                                @else
                                    {{$item->analis}}<!--form action="{{ url('AdminAnalystOD/konfirmasi') }}/{{ $item->id }}" method="get">
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
                                <a class="glyphicon glyphicon-search" data-toggle="modal" data-target="#modal-info"></a>
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
                                    <div class="modal-dialog">
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
                                                        <td width=50%>Record Sheet No</td>
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
                                                        <td width=50%>No. Jabatan (Job No.)</td>
                                                        <td>:</td>
                                                        <td width=50%>    
                                                            {{$item->no_jabatan}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gol. Jabatan (Job Level):</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" readonly class="form-control" id="LvlOrg" name="LvlOrg"  value="{{$item->gol_jabatan}}">
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
                                                            <input type="text" readonly class="form-control" id="NameofOrgUnitDinas" name="NameofOrgUnitDinas" value="{{$item->dinas}}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Divisi (Division)</td>
                                                        <td>:</td>
                                                        <td>    
                                                            <input type="text" readonly class="form-control" id="NameofOrgUnitDivisi" name="NameofOrgUnitDivisi" value="{{$item->divisi}}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Subdirektorat(Subdirectorate)</td>
                                                        <td>:</td>
                                                        <td> 
                                                            <input type="text" readonly class="form-control" id="NameofOrgUnitSubDirektorat" name="NameofOrgUnitSubDirektorat" value="{{$item->subdirektorat}}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Direktorat (Directorate)</td>
                                                        <td>:</td>
                                                        <td>
                                                            <input type="text" readonly class="form-control"  id="NameofOrgUnitDirektorat" name="NameofOrgUnitDirektorat" value="{{$item->direktorat}}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bertanggung jawab langsung kepada: <br>
                                                            (Directly Responsible to)
                                                        </td>
                                                        <td>:</td>
                                                        <td>
                                                                <input type="text" readonly class="form-control"  id="jabatanatasanlangsung" name="jabatanatasanlangsung" value="{{$item->job[0]->jabatanatasanlangsung}}">
                                                        </td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                     
                                                <thead>
                                                    <tr>
                                                        <td>no</td>
                                                        <td>Jabatan yang diawasi langsung: <br>
                                                            (Direct supervised positions)
                                                        </td>
                                                        <td>jumlah</td>
                                                    </tr>
                                                    @foreach ($item->job as $item2)
                                                    <tr>
                                                        <td>{{$item2->id}}</td>
                                                        <td>{{$item2->jabatanbawahanlangsung}}</td>
                                                        <td>{{$item2->jumlah}}</td>
                                                    </tr>
                                                    @endforeach
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
                                                @foreach ($item->jobdescreate_res as $item3)
                                                <thead>
                                                    <tr>
                                                        <td>{{$item3->id_kata_kerja}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$item3->object}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$item3->object}}</td>
                                                    </tr>
                                                </thead>
                                                @endforeach
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <h5>IV. DIMENSI (Dimensions)</h5>
                                                <thead>
                                                    <tr>
                                                        <td>a. Finansial (Financial)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$item->finansial}}</td>
                                                    </tr>
                                                </thead>
                                                <thead>
                                                    <tr>
                                                        <td>b. Non Finansial (Non Financial)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$item->nonfinansial}}</td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <h5>WEWENANG</h5>
                                                <thead>
                                                    <tr>
                                                        <td>Indikator Capaian (Performance Indicators)</td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <h5>VI. HUBUNGAN KERJA (Work Relationship)</h5>
                                                <thead>
                                                    <tr>
                                                        <td>Indikator Capaian (Performance Indicators)</td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <h5>I. IDENTIFIKASI JABATAN (Job Identification)</h5>
                                                <thead>
                                                    <tr>
                                                        <th>Unit Kerja (Work Unit)</th>
                                                    </tr>
                                                    <tr>
                                                        <td>a. Internal (Internal)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dalam Hal (Keterangan Internal):</td>
                                                    </tr>
                                                    <tr>
                                                        <td>b. Eksternal (External)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dalam Hal (Keterangan External):</td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <h5>VII. ALAT,BAHAN,DAN LINGKUNGAN KERJA (Tools, Materials, and Conditions)</h5>
                                                <thead>
                                                    <tr>
                                                        <td>1. Alat Kerja (Tools)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2. Bahan Kerja (Materials)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3. Lingk. Kerja (Conditions)</td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <h5>VIII. PERSYARATAN JABATAN (Job Spesifications)</h5>
                                                <thead>
                                                    <tr>
                                                        <td>1. Pendidikan</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2. Pengalaman Kerja</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3. Persyaratan Fisik</td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <thead>
                                                    <tr>
                                                        <td>4. Profile Jabatan</td>
                                                    </tr>
                                                    <tr>
                                                        <td width=50%>Nama Jabatan</td>
                                                        <td>:</td>
                                                        <td width=50%>    
                                                            {{$item->no_jabatan}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width=50%>Golongan</td>
                                                        <td>:</td>
                                                        <td width=50%>    
                                                            {{$item->no_jabatan}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width=50%>No Jabatan</td>
                                                        <td>:</td>
                                                        <td width=50%>    
                                                            {{$item->no_jabatan}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width=50%>NO.ORG</td>
                                                        <td>:</td>
                                                        <td width=50%>    
                                                            {{$item->no_jabatan}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width=50%>Unit Kerja</td>
                                                        <td>:</td>
                                                        <td width=50%>    
                                                            {{$item->no_jabatan}}
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td width=50%>JOB GROUP</td>
                                                        <td>:</td>
                                                        <td width=50%>    
                                                            {{$item->no_jabatan}}
                                                        </td>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <thead>
                                                   <tr>
                                                        <td>NO</td>
                                                        <td>GROUP ASPEK</td>
                                                        <td>NAMA KOMPETENSI</td>
                                                        <td>PROFISIENSI</td>
                                                    </tr>
                                                     <tr>
                                                        <td>1</td>
                                                        <td>01</td>
                                                        <td>01</td>
                                                        <td>wePROFISIENSI</td>
                                                    </tr>
                                                    
                                                </thead>
                                            </table>
                                            <!--table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <h5>Tulis Pesan Untuk Analis</h5>
                                                <thead>
                                                    <tr>
                                                        <td>
                                                            <textarea type="text" class="form-control" class="form-control" id="nonfinansial" name="nonfinansial" placeholder="Isi Data ..."></textarea>
                                                        </td>
                                                    </tr>
                                                </thead>
                                            </table-->
                                            <form action="{{ url('AdminAnalystOD/konfirmasi') }}/{{ $item->id }}" method="get">
                                                <!--button type="submit" class="btn btn-sm btn-success">Approve</button-->
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