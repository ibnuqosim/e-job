@extends('layouts.adminLTE') 
@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
 
@section('script')
<script src="{{ url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    function showpesan(item){
        reload();
        $("#iddesc").val(item.id);
        $("#nikanalis").val(item.nikanalis);
        $("#namaanalis").val(item.analis);
        gethistorypesan(item.id);
        
        //console.log(item);
    }
    function reload(){
        
        var container = document.getElementById("notif");
        var content = container.innerHTML;
        container.innerHTML= content; 
        
    //this line is to watch the result in console , you can remove it later	
        console.log("Refreshed"); 
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
    function konfirmvalidanalis(id){
        if (confirm("Apakah anda yakin ?") == true) {
            $.ajax({
                url: "{{ url('UserSuptMgrGM/konfirmasivalidanalis') }}/"+id,
                method: 'get',
                success: function(data) {
                if(data=='success'){
                    alert('Konfirmasi berhasil !');
                    location.reload();
                    
                }else{
                    alert('Konfirmasi gagal !');
                }

            }
            });
            }
    }
    
    function view_job(id){
    // alert(id);
    $.ajax({
            url: "{{ url('UserSuptMgrGM/getjobdescreate') }}/"+id,
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
<style>
td {
  word-wrap: break-word;
}
</style>
@endsection

@section('content')
<section class="content">
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
                        <th>Name of Position</th>
                        <th>Approve by analist</th>
                        <th>Approve by Supt/Mgr/GM</th>
                        
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
                            <td>{{$item->name_jabatan}}</td>
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
                            <td>
                                @if($item->approveodhcp==1)
                                    {{$item->approve}} (<a class="glyphicon glyphicon-thumbs-up" title="{{$item->tglapproveodhcp}}"></a>)
                                @else
                                {{$item->approve}}
                                @endif
                            </td>
                            <td>@if($item->statusapprove==1)
                                    <a class="btn btn-success" href="#">Selesai</a>
                                @else
                                    <a class="btn btn-warning" href="#">Progress...</a>
                                @endif
                            </td>
                            <td>
                                <!--a class="glyphicon glyphicon-pencil" href="{{ url('AdminAnalystOD/editjobdescreate',['id'=>$item->id]) }}"></a-->
                                <a class="glyphicon glyphicon-search" data-toggle="modal" data-target="#modal-info" onclick="view_job({{$item->id}})"></a>
                                <a class="glyphicon glyphicon-comment" data-toggle="modal" data-target="#modal-pesan" onclick="showpesan({{$item}});"></a>
                                {{-- <a class="glyphicon glyphicon-trash" href="{{ url('AdminAnalystOD/fromadddimensions') }}"></a> --}}
                                <a class="glyphicon glyphicon-print" href="javascrpt:void(0)" onclick="printJS('print{{$item->id}}', 'html')"></a>
                                    @if($item->konfirmvalidanalis==null)
                                        <a class="glyphicon glyphicon-share" title="Konfirmasi untuk divalidasi analis !" onclick="konfirmvalidanalis({{ $item->id }});"></a>
                                    @endif
                                    @if($item->approveuser==null && $item->konfirmvalidanalis==1 && $item->approveanalis==1)
                                        <a class="glyphicon glyphicon-thumbs-up" title="Klik di sini untuk validasi !" onclick="validasiuser({{ $item->id }});"></a>
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
                                            <div class="table-responsive"><b>History Pesan Revisi</b>
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
                                <section>
                                    @include('menu/UserSuptMgrGM/popupgm')
                                </section>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection