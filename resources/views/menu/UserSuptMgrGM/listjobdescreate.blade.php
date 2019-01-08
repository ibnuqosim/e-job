@extends('layouts.adminLTE') 
@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
 
@section('script')
<script src="{{ url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    /*$(document).ready(function() {
        $('#example1').DataTable( {
            "ajax": "{{ url('UserSuptMgrGM/show-ajax') }}",
            "columns": [
                { "data": "no"},
                { "data": "no_jabatan" },
                { "data": "analis" },
                { "data": "namauser" },
            ]
        } );
    } );*/
function showpesan(item){
    $("#iddesc").val(item.id);
    $("#nikanalis").val(item.nikanalis);
    $("#namaanalis").val(item.analis);
    gethistorypesan(item.id);
    //console.log(item);
}
function gethistorypesan(id){
    //var id=1;
    $('#tbhispesan').DataTable( {
            "ajax": "{{ url('UserSuptMgrGM/show-historypesan') }}/"+id,
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
function validasiuser(id){
    if (confirm("Apakah anda yakin ?") == true) {
        $.ajax({
            url: "{{ url('UserSuptMgrGM/konfirmasi') }}/"+id,
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
<style>
td {
  word-wrap: break-word;
}
</style>
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
                        <th>Jobdes</th>
                        <th>Approve by analist</th>
                        <th>Approve by user</th>
                        <th>Aprove by atasan</th>
                        <th>Aproved by ODHCP</th>
                        <th>Status</th>
                        <th>Act</th>
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
                            <td>
                                @if($item->approveuser==1)
                                {{$item->namauser}} (<a class="glyphicon glyphicon-thumbs-up" title="{{$item->tglapproveuser}}"></a>)
                            @else
                                {{$item->namauser}}
                                
                            @endif
                            </td>
                            {{-- <td>Validasi by</td> --}}
                            <td>{{$item->atasan}}</td>
                            <td>{{$item->approve}}</td>
                            <td>@if($item->statusapprove==1)
                                <a class="btn btn-success" href="#">Selesai</a>
                             @else
                             <a class="btn btn-warning" href="#">Progress...</a>
                             @endif</td>
                            <td>
                                <a class="glyphicon glyphicon-pencil" href="{{ url('AdminAnalystOD/editjobdescreate',['id'=>$item->id]) }}"></a>
                                <a class="glyphicon glyphicon-search" data-toggle="modal" data-target="#modal-info"></a>
                                
                                <a class="glyphicon glyphicon-comment" data-toggle="modal" data-target="#modal-pesan" onclick="showpesan({{$item}});"></a>
                                <a class="glyphicon glyphicon-trash" href="{{ url('AdminAnalystOD/fromadddimensions') }}"></a>
                                <a class="glyphicon glyphicon-print" href="javascrpt:void(0)" onclick="printJS('print{{$item->id}}', 'html')"></a>
                                @if($item->approveuser==null)
                                <a class="glyphicon glyphicon-thumbs-up" title="Klik di sini untuk validasi !" onclick="validasiuser({{ $item->id }});"></a>
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
                                                                            <td>Ditulis oleh</td>
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
                                                     
                                                    
                                                    <form action="{{ url('UserSuptMgrGM/kirimpesan') }}" method="post">
                                                        {{ @csrf_field() }}
                                                        <input type="hidden" name="iddesc" id="iddesc">
                                                        <input type="hidden" name="nikanalis" id="nikanalis">
                                                        <input type="hidden" name="namaanalis" id="namaanalis">
                                                        <textarea type="text" class="form-control" class="form-control" id="isipesan" name="isipesan" placeholder="Isi Pesan ..." rows="4"></textarea>
                                                        <button type="submit" class="btn btn-sm btn-success">Kirim Pesan</button>

                                                    </form>
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
                                            <form action="{{ url('AdminAnalystOD/konfirmasi') }}/{{ $item->id }}" method="get">
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
                                                </thead>
                                            </table>
                                            <table id="example1" class="table table-bordered table-striped" style="color:black">
                                                <thead>
                                                    <tr>
                                                        <td>no</td>
                                                        <td>Direktorat (Directorate)</td>
                                                        <td>(Directly Responsible to)</td>
                                                        <td>jumlah</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{$item->jabatanatasanlangsung}}</td>
                                                        <td>{{$item->jabatanbawahanlangsung}}</td>
                                                        <td>{{$item->jumlah}}</td>
                                                    </tr>
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
                                                        <td>Id</td>
                                                    </tr>
                                                </thead>
                                                <thead>
                                                    <tr>
                                                        <td>Tanggung Jawab Duties & Responsibilities</td>
                                                    </tr>
                                                </thead>
                                                <thead>
                                                    <tr>
                                                        <td>Indikator Capaian (Performance Indicators)</td>
                                                    </tr>
                                                </thead>
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
                                                            <textarea type="text" class="form-control" class="form-control" id="isipesan" name="isipesan" placeholder="Isi Pesan ..." rows="4"></textarea>
                                                        </td>
                                                    </tr>
                                                </thead>
                                            </table-->
                                            
                                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                <!--button type="submit" class="btn btn-sm btn-success">Kirim Pesan</button-->
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
@endsection