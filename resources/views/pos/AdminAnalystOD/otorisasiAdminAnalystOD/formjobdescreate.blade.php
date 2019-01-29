@extends('layouts.adminLTE') 
@section('style')
@endsection
 
@section('script')
<script src="{{ url('adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
    $('#bertangung').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/bertangung') }}',
            dataType: 'json'
        }
    });
    $('#hubkerjaunitkerja2').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/hubkerjaunitkerja2') }}',
            dataType: 'json'
        }
    });
    $('#fisik').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/fisik') }}',
            dataType: 'json'
        }
    });
    $('#profil').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/profil') }}',
            dataType: 'json'
        }
    });
    $('#managerodhcp').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/managerodhcp') }}',
            dataType: 'json'
        }
    });

    $('#atasan').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/atasan') }}',
            dataType: 'json'
        }
    });
    $('#analis').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/analis') }}',
            dataType: 'json'
        }
    });
    $('#AbbrPosition').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/AbbrPosition') }}',
            dataType: 'json',
        }
    });
    $('#AbbrPosition').on('select2:select', function (e) {
        var data = e.params.data;
        selectPosition(data); 
        nojabatan(data);
        abbdetail(data);
        detail(data);
        console.log(data);

        $('#namauser').select2({
            ajax: {
                url: '{{ url('AdminAnalystOD/formjobdescreate/namauser/api') }}/'+data.abbrUnit,
                dataType: 'json',
            }
        });

    });

    $('#namauser').on('select2:select', function (e) {
        var data = e.params.data;
        //alert(data);
        //getatasan (data);
        console.log(data);
    });

    function getatasan (data) {
        // console.log(data.id);
        var e = data.id;
        var res = e.split("-");
        // console.log(res[0]);
        var nikatasan = res[0];

        //var i ='4736';
        $.get('{{ url('AdminAnalystOD/formjobdescreate/atasan') }}/'+nikatasan,function(at){
            console.log(at);
            $('#nikatasan').val(at.dirnik); 
            $('#namaatasan').val(at.dirname);                                           //No jabatan:                      
        });       
    }
    // namauser
    function selectPosition(data) {

        $.get('{{ url('AdminAnalystOD/formjobdescreate/getjab') }}/'+data.id,function(jab){
            $('#LvlOrg').val(jab.LvlOrg);                                           //No jabatan:                     
            $('#NameofPosition ').val(jab.NameofPosition);                          //gol jabatan          
            $('#NameofOrgUnitDinas').val(jab.NameofOrgUnitDinas);                 	//dinas
            $('#NameofOrgUnitDivisi').val(jab.NameofOrgUnitDivisi);   		//divisi
            $('#NameofOrgUnitSubDirektorat').val(jab.NameofOrgUnitSubDirektorat);      //subdirketorat (Directorate)
            $('#NameofOrgUnitDirektorat').val(jab.NameofOrgUnitDirektorat);         //direktorat
            $('#AbbrOrgUnitDivisi').val(jab.AbbrOrgUnitDivisi);         
               
        });                                                                       
    }

    function nojabatan(kode) {
        $.get('{{ url('AdminAnalystOD/formjobdescreate/nojabatan') }}/'+kode.id,function(jbt){
            // console.log(jbt);
            var no = $('#jbt').val();
            var gol =  $('#AbbrPosition').val();
            var ret = '';
            var JbtAtasanLangsung = '';
            for (i = 0; i < jbt.length; i++) { 
                ret = ret+"<tr>"+
                            "<td></td>"+
                            "<td>"+(i+1) +"</td>"+
                            "<td><input type='text' value='"+jbt[i].jabatanbawahanlangsung+"' size='30px' readonly class='form-control' name='jabatanbawahanlangsung["+i+"]' id='jabatanbawahanlangsung'/></td>"+
                            "<td><input type='text' value='"+jbt[i].jumlah+"' size='30px' readonly class='form-control' name='jumlah["+i+"]' id='jumlah'/></td>"+
                        "</tr>";
                JbtAtasanLangsung = jbt[i].jabatanatasanlangsung;
            }           
            $('#JbtAtasanLangsung').val(JbtAtasanLangsung);
            $('#jbt').html(ret);
        });   
    }

  

    function detail(data) {
        $.get('{{ url('AdminAnalystOD/formjobdescreate/detail') }}/'+data.id,function(un){
            $('#noorg ').val(un.noorg);                                
            $('#unitkerja').val(un.unitkerja);  
            $('#nojabatan ').val(un.nojabatan);                                
            $('#namajabatan').val(un.namajabatan);        
            $('#gol ').val(un.gol);                                
            $('#job').val(un.job);                         
        });                                                                       
     }

    function abbdetail(kode) {
        $.get('{{ url('AdminAnalystOD/formjobdescreate/abbdetail') }}/'+kode.id,function(dbl){

            var no = $('#dbl').val();
            var gol =  $('#AbbrPosition').val();
            var ret = '';
            for (i = 0; i < dbl.length; i++)
            { 
             ret = ret+"<tr><td></td><td>"+ (i+1) +"</td> <td><input type='text' value='"+dbl[i].groupaspek+"' size='30px' readonly class='form-control' name='groupaspek["+i+"]' id='groupaspek'/></td> <td><input type='text' value='"+dbl[i].namakompetensi+"' size='30px' readonly class='form-control' name='namakompetensi["+i+"]' id='namakompetensi'/></td><td><input type='text' value='"+dbl[i].proficiency+"' size='30px' readonly class='form-control' name='proficiency["+i+"]' id='proficiency'/></td></tr>";
            }

            $('#dbl').html(ret);
        });   
    }

    function resjabatan() {
        var res = $('#res').val();
        var stre;

        var gol =  $('#LvlOrg').val();
        var kode = $('#AbbrOrgUnitDivisi').val(); 
        
        if('gol','kode'){
            stre = "<div id='kolom"+res+"' >"+
                        "<div class='col-sm-11' style='margin-bottom:9px' >"+
                            "<select class='js-data-example-ajax form-control res-ajax' name='res[]'></select>"+
                        "</div>"+
                        "<div class='col-sm-1' style='margin-bottom:9px' >"+
                            "<a href='javascript:void(0)' class='btn btn-primary' onclick='hapusres("+res+")' >Hapus</a>"+
                        "</div>"+
                    "</div>";

            ok =  "<div id='okkolom"+res+"' >"+
                        "<div class='col-sm-11' style='margin-bottom:9px' >"+
                            "<select class='js-data-example-ajax form-control divresk-ajax' name='divresk[]'></select>"+
                        "</div>"+
                    "</div>"; 

            indi =  "<div id='indikolom"+res+"'>"+
                        "<div class='col-sm-11' style='margin-bottom:9px' >"+
                            "<input type='text' class='kolomindi"+res+" form-control' id='id_met_indikator' name='divindi[]'/>"+
                        "</div>"+
                    "</div>";  
            
            wew =  "<div id='wewikolom"+res+"'>"+
                        "<div class='col-sm-11' style='margin-bottom:9px' >"+
                            "<input type='text' class='kolomwew"+res+" form-control' id='id_met_kewenangan' name='divwew[]'/>"+
                        "</div>"+
                    "</div>";
                    
            $("#divres").append(stre);
            $("#divresk").append(ok);
            $("#divindi").append(indi);
            $("#divwew").append(wew);
            
            $('.res-ajax').select2({
                
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/resjabatan') }}/'+gol,
                    dataType: 'json'
                }
            });
            $('.divresk-ajax').select2({
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/resunitindikator') }}/'+kode,
                    dataType: 'json'
                }
            });
            $('.divresk-ajax').on('select2:select',function (e){
                $( ".kolomindi"+(res-1).toString() ).val(e.params.data.indikator);
            });

             $('.divresk-ajax').on('select2:select',function (e){
                $( ".kolomwew"+(res-1).toString() ).val(e.params.data.kewenangan);
            });

            res = Number(res)+1;
            $('#res').val(res);
        }else{
            alert('URAIAN JABATAN MASIH KOSONG');
        }
    }
    function hapusres(res) {
        $('#kolom'+res).remove();
        $('#okkolom'+res).remove();
        $('#indikolom'+res).remove();
        $('#wewikolom'+res).remove();
    }
    function hapuswewenang(wewenang) {
        $('#kolomwe'+wewenang).remove();
    }
    function Workinternal() {
        var workint = $('#workint').val();
        var stwork;
        {
            stwork ="<div id='halsatu"+workint+"' >"+
                        "<div class='col-sm-11' style='margin-bottom:9px' >"+
                            "<select class='js-data-example-ajax form-control workint-ajax' name='work[]'></select>"+
                        "</div>"+
                        "<div class='col-sm-1' style='margin-bottom:9px' >"+
                            "<a href='javascript:void(0)' class='btn btn-primary' onclick='hapusworkint("+workint+")' >Hapus</a>"+
                        "</div>"+
                    "</div>";

            hal =   "<div id='haldua"+workint+"'>"+
                        "<div class='col-sm-11' style='margin-bottom:9px' >"+
                            "<textarea type='text' class='kolomindi"+res+" form-control' name='divhal[]'></textarea>"+
                        "</div>"+
                    "</div>";  
            
            halk =  "<div id='haltiga"+workint+"'>"+
                        "<div class='col-sm-11' style='margin-bottom:9px' >"+
                            "<textarea type='text' class='kolomindi"+res+" form-control' name='divhalk[]'></textarea>"+
                        "</div>"+
                    "</div>"; 
            halks =  "<div id='halempat"+workint+"'>"+
                        "<div class='col-sm-11' style='margin-bottom:9px' >"+
                            "<textarea type='text' class='kolomindi"+res+" form-control' name='divhalks[]'></textarea>"+
                        "</div>"+
                    "</div>"; 

            $("#divdworkint").append(stwork);
            $("#divhal").append(hal);
            $("#divhalk").append(halk);
            $("#divhalks").append(halks);
            
            $('.workint-ajax').select2({
                ajax: {
                    // url: '{{ url('AdminAnalystOD/formjobdescreate/Workinternal') }}/'+kode,
                    url: '{{ url('AdminAnalystOD/formjobdescreate/Workinternal') }}',
                    dataType: 'json'
                }
            });
            workint = (workint-1) + 2;
            $('workint').val(workint);
        }
    }
    function hapusworkint(workint) {
        $('#halsatu'+workint).remove();
        $('#haldua'+workint).remove();
        $('#haltiga'+workint).remove();
        $('#halempat'+workint).remove();
    }
    
    function eksternal() {
        var eks = $('#eks').val();
        var stre;
        var kode =  $('#AbbrOrgUnitDivisi').val();
        
        if(kode){
            stre =  "<div id='kolomeks"+eks+"' >"+
                        "<div class='col-sm-11' style='margin-bottom:9px' >"+
                            "<select class='js-data-example-ajax form-control eks-ajax' name='eks[]'></select>"+
                        "</div>"+
                        "<div class='col-sm-1' style='margin-bottom:9px' >"+
                            "<a href='javascript:void(0)' class='btn btn-primary' onclick='hapuseks("+eks+")' >Hapus</a>"+
                        "</div>"+
                    "</div>";
            halk =   "<div id='halkkolom"+eks+"'>"+
                        "<div class='col-sm-11' style='margin-bottom:9px' >"+
                            "<textarea type='text' class='kolomext"+eks+" form-control' name='divhal[]'></textarea>"+
                        "</div>"+
                    "</div>";  

            $("#divdeks").append(stre);

            $("#divhalk").append(halk);
            
            $('.eks-ajax').select2({
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/intermsiternal') }}/'+kode,
                    dataType: 'json'
                }
            });
            eks = (eks-1) + 2;
            $('eks').val(eks);
        }else{
            alert('URAIAN JABATAN MASIH KOSONG');
        }
    }
    function hapuseks(eks) {
        $('#kolomeks'+eks).remove();
        $('#halkkolom'+eks).remove();
    }
    function tmcalatkerja() {
        var tools = $('#tools').val();
        var stre;
        {
            stre =  "<div id='kolom"+tools+"' >"+
                        "<div class='col-sm-11' style='margin-bottom:10px' >"+
                            "<select class='js-data-example-ajax form-control tools-ajax' name='tools[]'></select>"+
                        "</div>"+
                        "<div class='col-sm-1' style='margin-bottom:10px' >"+
                            "<a href='javascript:void(0)' class='btn btn-primary' onclick='hapustools("+tools+")' >Hapus</a>"+
                        "</div>"+
                    "</div>"; 
            $("#divdtools").append(stre);
            
            $('.tools-ajax').select2({
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/tmcalatkerja') }}',
                    dataType: 'json'
                }
            });
            tools = (tools-1) + 2;
            $('tools').val(tools);
        }
    }
    function hapustools(tools) {
        $('#kolom'+tools).remove();
    }
    
    function tmcbahankerja() {
        var materials = $('#materials').val();
        var stre;
        {
            stre = "<div id='kolom"+materials+"' >"+
                        "<div class='col-sm-11' style='margin-bottom:10px' >"+
                            "<select class='js-data-example-ajax form-control materials-ajax' name='materials[]'></select>"+
                        "</div>"+
                        "<div class='col-sm-1' style='margin-bottom:10px' >"+
                            "<a href='javascript:void(0)' class='btn btn-primary' onclick='hapusmaterials("+materials+")' >Hapus</a>"+
                        "</div>"+
                    "</div>"; 
            $("#divdmaterials").append(stre);
            
            $('.materials-ajax').select2({
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/tmcbahankerja') }}',
                    dataType: 'json'
                }
            });
            materials = (materials-1) + 2;
            $('materials').val(materials);
        }
    }
    function hapusmaterials(materials) {
        $('#kolom'+materials).remove();
    }
    function tmclingkkerja() {
        var conditions = $('#conditions').val();
        var stre;
        {
            stre =  "<div id='kolom"+conditions+"' >"+
                        "<div class='col-sm-11' style='margin-bottom:10px' >"+
                            "<select class='js-data-example-ajax form-control conditions-ajax' name='conditions[]'></select>"+
                        "</div>"+
                        "<div class='col-sm-1' style='margin-bottom:10px' >"+
                            "<a href='javascript:void(0)' class='btn btn-primary' onclick='hapusconditions("+conditions+")' >Hapus</a>"+
                        "</div>"+
                    "</div>";            
            $("#divdconditions").append(stre);
            
            $('.conditions-ajax').select2({
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/tmclingkkerja') }}',
                    dataType: 'json'
                }
            });
            conditions = (conditions-1) + 2;
            $('conditions').val(conditions);
        }
    }
    function hapusconditions(conditions) {
        $('#kolom'+conditions).remove();
    }

    function pendidikan() {
        var pen = $('#pen').val();
        var stre;
        {
            stre =  "<div id='kolompen"+pen+"' >"+
                        "<div class='col-sm-11' style='margin-bottom:10px' >"+
                            "<select class='js-data-example-ajax form-control pen-ajax' name='pen[]'></select>"+
                        "</div>"+
                        "<div class='col-sm-1' style='margin-bottom:10px' >"+
                            "<a href='javascript:void(0)' class='btn btn-primary' onclick='hapuspen("+pen+")' >Hapus</a>"+
                        "</div>"+
                    "</div>";            
            $("#divdpen").append(stre);
            
            $('.pen-ajax').select2({
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/pendidikan') }}',
                    dataType: 'json'
                }
            });
            pen = (pen-1) + 2;
            $('pen').val(pen);
        }
    }
    function hapuspen(pen) {
        $('#kolompen'+pen).remove();
    }

    function pengalaman() {
        var penga = $('#penga').val();
        var stre;
        {
            stre =  "<div id='kolompenga"+penga+"' >"+
                        "<div class='col-sm-11' style='margin-bottom:10px' >"+
                            "<select class='js-data-example-ajax form-control penga-ajax' name='penga[]'></select>"+
                        "</div>"+
                        "<div class='col-sm-1' style='margin-bottom:10px' >"+
                            "<a href='javascript:void(0)' class='btn btn-primary' onclick='hapuspenga("+penga+")' >Hapus</a>"+
                        "</div>"+
                    "</div>";            
            $("#divdpenga").append(stre);
            
            $('.penga-ajax').select2({
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/pengalaman') }}',
                    dataType: 'json'
                }
            });
            penga = (penga-1) + 2;
            $('penga').val(penga);
        }
    }
    function hapuspenga(penga) {
        $('#kolompenga'+penga).remove();
    }

</script>
@endsection
 
@section('content')
<section class="content-header">
    <h1>
        MENU JOBDES
    </h1>
    <ol class="breadcrumb">
        <li><a href="http://e-job.site/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Edit</a></li>
        <li class="active">MENU JOBDES tess</li>
    </ol>
</section>
<section class="content">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h4 class="box-title">URAIAN JABATAN (Job Description)</h4>
        </div>
        <div class="box-body">
            <table width=50% id="example2" class="table table-bordered table-hover">
                <tr>
                    <td width=50%>Record Sheet No</td>
                    <td>:</td>
                    <td width=50%>RS/PO01/001-ISSUE No.3</td>
                </tr>
                <tr>
                    <td>Issue Date</td>
                    <td>:</td>
                    <td>01/06/2010</td>
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
            </table>
        </div>
    </div>
</section>
<form class="form-horizontal" action="{{ url('AdminAnalystOD/storejobdescreate') }}" method="post" enctype="multipart/form-data">
    <input name="_token" value="{{ csrf_token() }}" type="hidden">
    <section class="content">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">I. IDENTIFIKASI JABATAN (Job Identification)</h3>
            </div>
            <div class="box-body">
                <table width=50% id="example2" class="table table-bordered table-hover">
                    {{-- @foreach ($strukturdir as $item) --}}
                    <tr>
                        <td width=50%>No. Jabatan (Job No.)</td>
                        <td>:</td>
                        <td width=50%>
                            <select class="js-data-example-ajax form-control" id="AbbrPosition" name="getjab"></select>
                        </td>
                    </tr>
                    <tr>
                        <td>Gol. Jabatan (Job Level):</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly class="form-control" id="LvlOrg" placeholder="Otomatis pilih table" name="LvlOrg">
                        </td>
                    </tr>
                    <tr>
                        <td>name Jabatan (Job Name)</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly class="form-control" class="form-control" id="NameofPosition" placeholder="name Jabatan (Job Name)"
                                name="NameofPosition">
                        </td>
                    </tr>
                    <tr>
                        <td>Dinas (Official)</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly class="form-control" id="NameofOrgUnitDinas" placeholder="Otomatis pilih table" name="NameofOrgUnitDinas">
                        </td>
                    </tr>
                    <tr>
                        <td>Divisi (Division)</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly class="form-control" id="NameofOrgUnitDivisi" placeholder="Otomatis pilih table" name="NameofOrgUnitDivisi">
                        </td>
                    </tr>
                    <tr>
                        <td>Subdirektorat(Subdirectorate)</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly class="form-control" id="NameofOrgUnitSubDirektorat" placeholder="Otomatis pilih table" name="NameofOrgUnitSubDirektorat">
                        </td>
                    </tr>
                    <tr>
                        <td>Direktorat(Directorate)</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly class="form-control" id="NameofOrgUnitDirektorat" placeholder="Otomatis pilih table" name="NameofOrgUnitDirektorat">
                        </td>
                    </tr>
                    <tr>
                        <td>Bertanggung jawab langsung kepada: <br>
                            (Directly Responsible to)
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly class="form-control" id="JbtAtasanLangsung" placeholder="Otomatis pilih table" name="jabatanatasanlangsung" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" readonly class="form-control" id="AbbrOrgUnitDivisi" placeholder="Otomatis pilih table" name="AbbrOrgUnitDivisi">
                        </td>
                    </tr>
                    {{-- @endforeach --}}

                </table>
                <div class="form-group">
                    <table border="1" width="100%" class="table table-bordered table-hover">
                        <thead>
                            <th>
                                <td>no</td>
                                <td>Jabatan yang diawasi langsung<br>
                                    (Directly Responsible to)</td>
                                <td>jumlah</td>
                            </th>
                        </thead>
                        <tbody id="jbt">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">II. TUJUAN JABATAN (Primary Job Role)</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label></label><br>
                        <textarea class="form-control" rows="3" id="jobrole" name="jobrole" placeholder="Isi Data ..."></textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">III. TANGGUNG JAWAB UTAMA (Main Responsibility)</h3>
                <div class="box-tools pull-right">
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label></label><br>
                            <button type="button" class="btn btn-primary" onclick="resjabatan();">Tambah Data</button>
                        </div>
                        <div class="form-group" id="divres">
                            <input class="js-data-example-ajax form-control" name="id_kata_kerja" id="res" value="1" type="hidden" />
                        </div>

                        <div class="form-group">
                            <label>Tanggung Jawab (Duties & Responsibilities)</label><br>
                        </div>
                        <div class="form-group" id="divresk">
                            <input class="js-data-example-ajax form-control" name="id_met_object" id="divresk" value="1" type="hidden" />
                        </div>
                        <div class="form-group">
                            <label>Indikator Capaian (Performance Indicators) </label><br>
                        </div>
                        <div class="form-group" id="divindi">
                            <input class="form-control" name="id_met_indikatorvalue" id="divresk" value="1" type="hidden" />
                        </div>
                        <label>
                            <h6>
                                Melaksanakan setiap tugas dan tanggung jawab dengan memerhatikan aspek dan 
                                kondisi keuangan perusahaan serta mendukung program penghematan perusahaan.
                            </h6>
                        </label>
                        <label>
                            <h6>
                                Melaksanakan tugas sesuai dengan Sistem Manajemen Krakatau Steel (SMKS) dan 
                                peraturan/kebijakan yang berlaku baik internal (Prosedur, WI, SOP, PKB) maupun eksternal
                                (Perpres, Permen, Kepmen, dll) untuk menghasilkan kualitas kerja yang tinggi dan memenuhi 
                                standar yang ditetapkan.
                            </h6>
                        </label>
                        <label>
                            <h6>
                                Penghematan Unit Kerja
                            </h6>
                        </label>
                        <label>
                            <h6>
                                Pelaksanaan kerja sesuai proses bisnis perusahaan serta peraturan yang berlaku
                            </h6>
                        </label>
                    </div>
                </div>
            </div>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">IV. DIMENSI (Dimensions)</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label> a. Finansial (Financial) </label>
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" class="form-control" id="finansial" name="finansial" placeholder="Isi Data ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label> b. Non Finansial (Non Financial) </label>
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" class="form-control" id="nonfinansial" name="nonfinansial" placeholder="Isi Data ..."></textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">V. WEWENANG (Authorities)</h3>
                <div class="box-tools pull-right"></div>
            </div>
            <div class="box-body">
                <div class="form-group" id="divwew">
                    <input class="form-control" id="divwew" name="id_met_kewenangan" value="1" type="hidden" />
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">VI. HUBUNGAN KERJA (Work Relationship)</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Unit Kerja (Work Unit)</label>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>a. Internal (Internal)</label>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" onclick="Workinternal();">Tambah Data</button>
                    </div>
                    <div class="form-group" id="divdworkint">
                        <input class="js-data-example-ajax form-control" id="workint" name="id_emp_cskt_ltext" value="1" type="hidden" />
                    </div>
                    <div class="form-group">
                        <label>Dalam Hal (Keterangan Internal):</label>
                    </div>
                    <div class="form-group" id="divhal">
                        <input class="js-data-example-ajax form-control" id="divhal" name="id_hal_internal" value="1" type="hidden" />
                    </div>
                    <div class="form-group">
                        <label>b. Eksternal (External)</label>
                    </div>
                    <div class="form-group" id="divhalks">
                        <input class="js-data-example-ajax form-control" id="divhalks" name="id_eksternal" value="1" type="hidden" />
                    </div>
                    <div class="form-group">
                        <label>Dalam Hal (Keterangan External)::</label>
                    </div>
                    <div class="form-group" id="divhalk">
                        <input class="js-data-example-ajax form-control" id="divhalk" name="id_hal_external" value="1" type="hidden" />
                    </div>
                </div>
            </div>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">VII. ALAT,BAHAN,DAN LINGKUNGAN KERJA (Tools, Materials, and Conditions)</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>1. Alat Kerja (Tools)</label>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" onclick="tmcalatkerja();">Tambah Data</button>
                    </div>
                    <div class="form-group" id="divdtools">
                        <input class="js-data-example-ajax form-control" id="tools" value="1" name="id_deskripsi" type="hidden" />
                    </div>
                    <div class="form-group">
                        <label>2. Bahan Kerja (Materials)</label>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" onclick="tmcbahankerja();">Tambah Data</button>
                    </div>
                    <div class="form-group" id="divdmaterials">
                        <input class="js-data-example-ajax form-control" id="materials" name="id_deskripsi" value="1" type="hidden" />
                    </div>
                    <div class="form-group">
                        <label>3. Lingk. Kerja (Conditions)</label>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" onclick="tmclingkkerja();">Tambah Data</button>
                    </div>
                    <div class="form-group" id="divdconditions">
                        <input class="js-data-example-ajax form-control" id="conditions" name="id_deskripsi" value="1" type="hidden" />
                    </div>
                </div>
                <div>
                </div>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">VIII. PERSYARATAN JABATAN (Job Spesifications)</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>1. Pendidikan</label>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" onclick="pendidikan();">Tambah Data</button>
                    </div>
                    <div class="form-group" id="divdpen">
                        <input class="js-data-example-ajax form-control" id="pen" name="id_jenjang" value="1" type="hidden" />
                    </div>

                    <div class="form-group">
                        <label>2. Pengalaman Kerja</label>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" onclick="pengalaman();">Tambah Data</button>
                    </div>
                    <div class="form-group" id="divdpenga">
                        <input class="js-data-example-ajax form-control" id="penga" name="id_keterangan" value="1" type="hidden" />
                    </div>
                    <div class="form-group">
                        <label>3. Persyaratan Fisik</label>
                    </div>
                    <div class="form-group">
                        <select class="js-data-example-ajax form-control" id="fisik" name="persyaratan_fisik"></select>
                    </div>
                    <div class="form-group">
                        <label>4. Profil Jabatan</label>
                    </div>
                    <div class="form-group">
                        <table border="1" width="100%" class="table table-bordered table-hover">
                            <tr>
                                <td>Nama Jabatan</td>
                                <td>:</td>
                                <td>
                                    <input type="text" readonly class="form-control" id="namajabatan" placeholder="Otomatis Jabatan" name="namajabatan">
                                </td>
                                <td>NO.ORG</td>
                                <td>:</td>
                                <td>
                                    <input type="text" readonly class="form-control" id="noorg" placeholder="Otomatis Golongan" name="noorg">
                                </td>
                            </tr>
                            <tr>
                                <td>Golongan</td>
                                <td>:</td>
                                <td>
                                    <input type="text" readonly class="form-control" id="gol" placeholder="Otomatis Golongan" name="golongan">
                                </td>
                                <td>Unit Kerja</td>
                                <td>:</td>
                                <td>
                                    <input type="text" readonly class="form-control" id="unitkerja" placeholder="Otomatis untit kerja" name="unitkerja">
                                </td>
                            </tr>
                            <tr>
                                <td>No Jabatan</td>
                                <td>:</td>
                                <td>
                                    <input type="text" readonly class="form-control" id="nojabatan" placeholder="Otomatis nomer jabatan" name="nojabatan">
                                </td>
                                <td>JOB GROUP</td>
                                <td>:</td>
                                <td>
                                    <input type="text" readonly class="form-control" id="job" placeholder="Otomatis job group" name="jobgroup">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group">
                        <table border="1" width="100%" class="table table-bordered table-hover">
                            <tr>
                                <td align="center">Nama Jabatan
                                    <td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group">
                        <table border="1" width="100%" class="table table-bordered table-hover">
                            <thead>
                                <th>
                                    <td>NO</td>
                                    <td>GROUP ASPEK</td>
                                    <td>NAMA KOMPETENSI</td>
                                    <td>PROFISIENSI</td>
                                </th>
                            </thead>
                            <tbody id="dbl">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">IX. POSISI JABATAN DALAM STRUKTUR ORGANISASI (Organizational Structure)</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <div class="box-body">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="gambar" name="gambar">
            </div>
        </div>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">VIII. PERSYARATAN JABATAN (Job Spesifications)</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <table id="example2" class="table table-bordered table-hover">
                        <tr>
                            <td width=30%>DIANALISIS OLEH: (Analyzed By):</td>
                            <td width=30% class="center">MENYETUJUI (Approved By)</td>
                            <td width=30%></td>
                        </tr>
                        <tr>
                            <td>Issue Date</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Holder</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <h5>ANALIS</h5>
                                <input type="text" class="form-control" class="form-control" name="nikanalis" readonly value="{{ Auth::user()->userid }}">
                                <input type="text" class="form-control" class="form-control" name="analis" readonly value="{{ Auth::user()->username }}">
                            </td>
                            
                            <td>
                                <h5>Manajer ODCHP </h5>
                                <input type="text" class="form-control" class="form-control" readonly value="-">
                            <td>
                                <h5>Input name User</h5>
                                <select class="js-data-example-ajax form-control"  id="namauser" name="namauser" required="true"> </select>
                                <input type="hidden" class="form-control" class="form-control" id="nikatasan" name="nikatasan" readonly>
                                <input type="hidden" class="form-control" class="form-control" id="namaatasan" name="namaatasan" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="js-data-example-ajax form-control" id="conditions" readonly value="{{ date('d-m-Y') }}" />
                            </td>
                            <td>
                                <input class="js-data-example-ajax form-control" id="conditions" readonly value="{{ date('d-m-Y') }}" />
                            </td>
                            <td>
                                <input class="js-data-example-ajax form-control" id="conditions" readonly value="{{ date('d-m-Y') }}" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <div class="box-footer">
        <button type="submit" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-info pull-right">Save</button>
    </div>
    </section>

</form>
@endsection
















</div>