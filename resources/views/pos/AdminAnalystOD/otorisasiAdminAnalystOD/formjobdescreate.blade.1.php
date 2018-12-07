@extends('layouts.adminLTE')

@section('style')
@endsection

@section('script')
<script src="{{ url('adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
<script>
    $('#bertangung').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/bertangung') }}',
            dataType: 'json'
        }
    });
    $('#hubkerjaunitkerja1').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/hubkerjaunitkerja1') }}',
            dataType: 'json'
        }
    });
  
    $('#tmcalatkerja').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/tmcalatkerja') }}',
            dataType: 'json'
        }
    });
    $('#tmcbahankerja').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/tmcbahankerja') }}',
            dataType: 'json'
        }
    });
    $('#tmclingkkerja').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/tmclingkkerja') }}',
            dataType: 'json'
        }
    });
    $('#spesificationsPendidikan').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/spesificationsPendidikan') }}',
            dataType: 'json'
        }
    });
    $('#spesificationsfisik').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/spesificationsfisik') }}',
            dataType: 'json'
        }
    });
    $('#spesificationsprofile').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/spesificationsprofile') }}',
            dataType: 'json'
        }
    });
    $('#managerodhcp').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/managerodhcp') }}',
            dataType: 'json'
        }
    });
    $('#namauser').select2({
        ajax: {
            url: '{{ url('AdminAnalystOD/formjobdescreate/namauser') }}',
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
    });
    function selectPosition(data) {
        $.get('{{ url('AdminAnalystOD/formjobdescreate/getjab') }}/'+data.id,function(jab){
            console.log(jab);
            $('#LvlOrg').val(jab.LvlOrg);
            $('#NameofPosition').val(jab.NameofPosition);
            $('#NameofOrgUnitDinas').val(jab.NameofOrgUnitDinas);
            $('#NameofOrgUnitDivisi').val(jab.NameofOrgUnitDivisi);
            $('#NameofOrgUnitSubDirektorat').val(jab.NameofOrgUnitSubDirektorat);
            $('#NameofOrgUnitDirektorat').val(jab.NameofOrgUnitDirektorat);
            $('#NameofPositionID').val(jab.NameofPositionID);
        });
    }
    function kataKerja() {
        var idf = $('#idf').val();
        var stre;
        var gol =  $('#LvlOrg').val();
        
        if(gol){
            stre = "<p id='kolom"+idf+"'><select class='js-data-example-ajax form-control katakerja-ajax' name='katakerja[]'></select><br><br><a href='javascript:void(0)' class='btn btn-primary' onclick='hapusElemen("+idf+")' >Hapus</a><br></p>";
            $("#divHobi").append(stre);
            
            $('.katakerja-ajax').select2({
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/katakerja') }}/'+gol,
                    dataType: 'json'
                }
            });
            idf = (idf-1) + 2;
            $('idf').val(idf);
        }else{
            alert('URAIAN JABATAN MASIH KOSONG');
        }
        
    }
    function hapusElemen(idf) {
        $('#kolom'+idf).remove();
    }
    
    function jabatan() {
        var obj = $('#obj').val();
        var stre;
        var gol =  $('#LvlOrg').val();
        
        if(gol){
            stre = "<p id='kolomobj"+obj+"'><select class='js-data-example-ajax form-control jabatan-ajax' name='jabatan[]'></select><br><br><a href='javascript:void(0)' class='btn btn-primary' onclick='hapusobj("+obj+")' >Hapus</a><br></p>";
            $("#divobj").append(stre);
            
            $('.jabatan-ajax').select2({
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/jabatan') }}/'+gol,
                    dataType: 'json'
                }
            });
            obj = (obj-1) + 2;
            $('obj').val(obj);
        }else{
            alert('URAIAN JABATAN MASIH KOSONG');
        }
        
    } 
    function hapusobj(obj) {
        $('#kolomobj'+obj).remove();
    }
    
    function tobjecysistem() {
        var objec = $('#objec').val();
        var stre;
        var gol =  $('#LvlOrg').val();
        
        if(gol){
            stre ="<p id='kolomobjec"+objec+"'><select class='js-data-example-ajax form-control objecn-ajax' name='objecn[]'></select><a href='javascript:void(0)' class='btn btn-primary' onclick='hapusobjec("+objec+")' >Hapus</a><br><br></p>";
            $("#divobjec").append(stre);
            
            $('.objecn-ajax').select2({
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/objecysistem') }}/'+gol,
                    dataType: 'json'
                }
            });
            objec = (objec-1) + 2;
            $('objec').val(objec);
        }else{
            alert('URAIAN JABATAN MASIH KOSONG');
        }
        
    }
    function hapusobjec(objec) {
        $('#kolomobjec'+objec).remove();
    }
    
    
    
    function resjabatan() {
        var res = $('#res').val();
        var stre;
        var gol =  $('#LvlOrg').val();
        
        if(gol){
            stre = "<p id='kolom"+res+"'><select class='js-data-example-ajax form-control res-ajax' name='res[]'></select><br><br><a href='javascript:void(0)' class='btn btn-primary' onclick='hapusElemen("+res+")' >Hapus</a><br></p>";
            $("#divres").append(stre);
            
            $('.res-ajax').select2({
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/resjabatan') }}/'+gol,
                    dataType: 'json'
                }
            });
            res = (res-1) + 2;
            $('res').val(res);
        }else{
            alert('URAIAN JABATAN MASIH KOSONG');
        }
        
    }
    
    function resunitkerja() {
        var resunit = $('#resunit').val();
        var stre;
        var gol =  $('#LvlOrg').val();
        
        if(gol){
            stre = "<p id='kolom"+resunit+"'><select class='js-data-example-ajax form-control resunit-ajax' name='resunit[]'></select><br><br><a href='javascript:void(0)' class='btn btn-primary' onclick='hapusElemen("+resunit+")' >Hapus</a><br></p>";
            $("#divresunit").append(stre);
            
            $('.resunit-ajax').select2({
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/resunitkerja') }}/'+gol,
                    dataType: 'json'
                }
            });
            resunit = (resunit-1) + 2;
            $('resunit').val(resunit);
        }else{
            alert('URAIAN JABATAN MASIH KOSONG');
        }
        
    }
    
    function resunitindikator() {
        var resindikator = $('#resindikator').val();
        var stre;
        var gol =  $('#LvlOrg').val();
        
        if(gol){
            stre = "<p id='kolomre"+resindikator+"'><select class='js-data-example-ajax form-control resindikator-ajax' name='resindikator[]'></select><br><br><a href='javascript:void(0)' class='btn btn-primary' onclick='hapusElemen("+resindikator+")' >Hapus</a><br></p>";
            $("#divresindikator").append(stre);
            
            $('.resindikator-ajax').select2({
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/resunitindikator') }}/'+gol,
                    dataType: 'json'
                }
            });
            resindikator = (resindikator-1) + 2;
            $('resindikator').val(resindikator);
        }else{
            alert('URAIAN JABATAN MASIH KOSONG');
        }
        
    }

    function dimensifinansial() {
        var dimens = $('#dimens').val();
        var stre;
        var gol =  $('#LvlOrg').val();
        
        if(gol){
            stre = "<p id='kolomdimens"+dimens+"'><select class='js-data-example-ajax form-control dimens-ajax' name='dimens[]'></select><br><br><a href='javascript:void(0)' class='btn btn-primary' onclick='hapusElemen("+dimens+")' >Hapus</a><br></p>";
            $("#divdimens").append(stre);
            
            $('.dimens-ajax').select2({
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/dimensifinansial') }}/'+gol,
                    dataType: 'json'
                }
            });
            dimens = (dimens-1) + 2;
            $('dimens').val(dimens);
        }else{
            alert('URAIAN JABATAN MASIH KOSONG');
        }
    }
    function dimensinonfinansial() {
        var dimensnon = $('#dimensnon').val();
        var stre;
        var gol =  $('#LvlOrg').val();
        
        if(gol){
            stre = "<p id='kolomdimensnon"+dimensnon+"'><select class='js-data-example-ajax form-control dimensnon-ajax' name='dimensnon[]'></select><br><br><a href='javascript:void(0)' class='btn btn-primary' onclick='hapusElemen("+dimensnon+")' >Hapus</a><br></p>";
            $("#divdimensnon").append(stre);
            
            $('.dimensnon-ajax').select2({
                ajax: {
                    url: '{{ url('AdminAnalystOD/formjobdescreate/dimensinonfinansial') }}/'+gol,
                    dataType: 'json'
                }
            });
            dimensnon = (dimensnon-1) + 2;
            $('dimensnon').val(dimensnon);
        }else{
            alert('URAIAN JABATAN MASIH KOSONG');
        }
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
        <li class="active">MENU JOBDES</li>
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
<form class="form-horizontal" action="{{ url('AdminAnalystOD/storejobdescreate') }}" method="post">
    <input name="_token" value="{{ csrf_token() }}" type="hidden">  
    <section class="content">
        <div class="box box-warning">   
            <div class="box-header with-border">
                <h3 class="box-title">I. URAIAN JABATAN (Job Description)</h3>
            </div>
            <div class="box-body">
                <table width=50% id="example2" class="table table-bordered table-hover">
                    @foreach ($strukturdir as $item)
                    <tr>
                        <td width=50%>No. Jabatan (Job No.)</td>
                        <td>:</td>
                        <td width=50%>    
                            <select class="js-data-example-ajax form-control" id="AbbrPosition"  name="getjab">
                            </select>
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
                            <input type="text" readonly class="form-control" class="form-control" id="NameofPosition" name="NameofPosition">
                        </td>
                    </tr>
                    <tr>
                        <td>Dinas (Official)</td>
                        <td>:</td>
                        <td>                         
                            <input type="text" readonly class="form-control" class="form-control" id="NameofOrgUnitDinas"  placeholder="Otomatis pilih table" name="NameofOrgUnitDinas">
                        </td>
                    </tr>
                    <tr>
                        <td>Divisi (Division)</td>
                        <td>:</td>
                        <td>    
                            <input type="text" readonly class="form-control" class="form-control" id="NameofOrgUnitDivisi"  placeholder="Otomatis pilih table" name="NameofOrgUnitDivisi">
                        </td>
                    </tr>
                    <tr>
                        <td>Subdirektorat(Subdirectorate)</td>
                        <td>:</td>
                        <td> 
                            <input type="text" readonly class="form-control" class="form-control" id="NameofOrgUnitSubDirektorat" placeholder="Otomatis pilih table" name="NameofOrgUnitSubDirektorat" >
                        </td>
                    </tr>
                    <tr>
                        <td>Direktorat (Directorate)</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly class="form-control" class="form-control" id="NameofOrgUnitDirektorat" placeholder="Otomatis pilih table" name="NameofOrgUnitDirektorat">
                        </td>
                    </tr>
                    <tr>
                        <td>Bertangung Jawab Langsung</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly class="form-control" id="NameofPositionID" placeholder="Otomatis pilih table" name="NameofPositionID">
                        </td>
                    </tr> 
                    <tr>
                        <td> (Directly Responsible to)</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly class="form-control" id="NameofOrgUnitDinas" placeholder="Otomatis pilih table" name="NameofOrgUnitDinas">
                        </td>
                    </tr> 
                    @endforeach
                </table>
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
                        <label> Otomatis pilih Kata Kerja by Sistem</label><br>
                        <button type="button" class="btn btn-primary" onclick="kataKerja();">Tambah Data</button>
                    </div>
                    <div class="form-group" id="divHobi">
                        <input class="js-data-example-ajax form-control" id="idf" value="1" type="hidden" />
                    </div>
                    
                    <div class="form-group">
                        <label> Otomatis Pilih Objective jabatan</label><br>
                        <button type="button" class="btn btn-primary" onclick=" jabatan();">Tambah Data</button>
                    </div>
                    <div class="form-group" id="divobj">
                        <input class="js-data-example-ajax form-control" id="obj" value="1" type="hidden" />
                    </div>
                    
                    <div class="form-group">
                        <label> Otomatis Pilih Objecy by Sistem </label><br>
                        <button type="button" class="btn btn-primary" onclick="tobjecysistem();">Tambah Data</button>
                    </div>
                    <div class="form-group" id="divobjec">
                        <input class="js-data-example-ajax form-control" id="objec" value="1" type="hidden" />
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
                            <label> Tugas & Tanggung Jawab Duties & Responsibilities </label><br>
                            <button type="button" class="btn btn-primary" onclick="resjabatan();">Tambah Data</button>
                        </div>
                        <div class="form-group" id="divres">
                            <input class="js-data-example-ajax form-control" id="res" value="1" type="hidden" />
                        </div>
                        <label>
                            <h6>
                                x. Melaksanakan setiap tugas dan tanggung jawab dengan memerhatikan aspek dan 
                                kondisi keuangan perusahaan serta mendukung program penghematan perusahaan.
                            </h6>
                        </label>
                        <label>
                            <h6>
                                x. Melaksanakan tugas sesuai dengan Sistem Manajemen Krakatau Steel (SMKS) dan 
                                peraturan/kebijakan yang berlaku baik internal (Prosedur, WI, SOP, PKB) maupun eksternal
                                (Perpres, Permen, Kepmen, dll) untuk menghasilkan kualitas kerja yang tinggi dan memenuhi 
                                standar yang ditetapkan.
                            </h6>
                        </label> 
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" onclick="resunitkerja();">Tambah Data</button>
                        </div>
                        <div class="form-group" id="divresunit">
                            <input class="js-data-example-ajax form-control" id="resunit" value="1" type="hidden" />
                        </div>
                        
                        
                        <div class="form-group">
                            <label> Indikator Capaian Performance Indicators </label>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" onclick="resunitindikator();">Tambah Data</button>
                        </div>
                        <div class="form-group" id="divresindikator">
                            <input class="js-data-example-ajax form-control" id="resindikator" value="1" type="hidden" />
                        </div>
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
                                <button type="button" class="btn btn-primary" onclick="dimensifinansial();">Tambah Data</button>
                            </div>
                            <div class="form-group" id="divdimens">
                                <input class="js-data-example-ajax form-control" id="dimens" value="1" type="hidden" />
                            </div>
                        <div class="form-group">
                            <label> b. Non Finansial (Non Financial) </label>
                        </div>
                        <div class="form-group">
                                <button type="button" class="btn btn-primary" onclick="dimensinonfinansial();">Tambah Data</button>
                            </div>
                            <div class="form-group" id="divdimensnon">
                                <input class="js-data-example-ajax form-control" id="dimensnon" value="1" type="hidden" />
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">V. WEWENANG (Authorities)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div> 
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <select class="js-data-example-ajax form-control" id="wewenangauthorities1" name="authorities_kata_kerja_by_sistem1"></select>
                        </div>
                        <div class="form-group">
                            <select class="js-data-example-ajax form-control" id="wewenangauthorities2" name="authorities_kata_kerja_by_sistem2"></select>
                        </div>
                        <div class="form-group">
                            <select class="js-data-example-ajax form-control" id="wewenangauthorities3" name="authorities_kata_kerja_by_sistem3"></select>
                        </div>
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
                        <select class="js-data-example-ajax form-control" id="hubkerjaunitkerja1" name="kerja_Internal"></select>
                    </div>
                    <div class="form-group">
                        <label>b. Eksternal (External)</label>
                        <select class="js-data-example-ajax form-control" id="hubkerjaunitkerja2" name="kerja_non_Internal"></select>
                    </div>
                    <div class="form-group">
                        <label>Dalam Hal (In Terms of)</label>
                    </select>
                </div>
                <div class="form-group">
                    <label>a. Internal (Internal)</label>
                    <select class="js-data-example-ajax form-control" id="hubkerjadlmhal1" name="kerja_Internal_dlm_hal"></select>
                </div>
                <div class="form-group">
                    <label>b. Eksternal (External)</label>
                    <select class="js-data-example-ajax form-control" id="hubkerjadlmhal2" name="kerja_non_Internal_dlm_hal"></select>
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
                            <select class="js-data-example-ajax form-control" id="tmcalatkerja" name="alat_kerja"></select>
                        </div>
                        <div class="form-group">
                            <label>2. Bahan Kerja (Materials)</label>
                            <select class="js-data-example-ajax form-control" id="tmcbahankerja" name="bahan_kerja"></select>
                        </div>
                        <div class="form-group">
                            <label>3. Lingk. Kerja (Conditions))</label>
                            <select class="js-data-example-ajax form-control" id="tmclingkkerja" name="lingk_kerja"></select>
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
                                    <label>1. Pendidikan dan Pengalaman Kerja </label>
                                    <select class="js-data-example-ajax form-control" id="spesificationsPendidikan" name="pendidikan_pengalaman_kerja"></select>
                                </div>
                                <div class="form-group">
                                    <label>2. Persyaratan Fisik</label>
                                    <select class="js-data-example-ajax form-control" id="spesificationsfisik" name="persyaratan_fisik"></select>
                                </div>
                                <div class="form-group">
                                    <label>3. Profil Jabatan</label>
                                    <select class="js-data-example-ajax form-control" id="spesificationsprofile" name="profil_jabatan"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h4 class="box-title">IX. POSISI JABATAN DALAM STRUKTUR ORGANISASI (Organizational Structure)</h4>
                        </div>
                        <div class="box-body">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="gambar" name="gambar">
                        </div>
                    </div>
                </div>
            </section>   
            <section class="content">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h4 class="box-title">URAIAN JABATAN (Job Description)</h4>
                    </div>
                    <div class="box-body">
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
                                    <h5>Input name Analis</h5>
                                    <select class="js-data-example-ajax form-control" colspan="5" id="analis" name="dianalisis"></select>        
                                </td>
                                <td>
                                    <h5>Input name Manager OD&HCP</h5>
                                    <select class="js-data-example-ajax form-control" id="managerodhcp" name="menyetujui_manager"></select>
                                </div>
                                <td>
                                    <h5>Input name User</h5>
                                    <select class="js-data-example-ajax form-control" id="namauser" name="namauser"></select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <h5>Otomatis</h5>
                                        {{-- <select class="js-data-example-ajax form-control" id="jabatan" name="no_jabatan"></select> --}}
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <h5>Otomatis</h5>
                                        {{-- <select class="js-data-example-ajax form-control" id="jabatan" name="no_jabatan"></select> --}}
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <h5>Otomatis</h5>
                                        {{-- <select class="js-data-example-ajax form-control" id="jabatan" name="no_jabatan"></select> --}}
                                    </div>
                                </td>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
        <div class="box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Save</button>
        </div>
    </div>
</div>
</section>
</div>
</form>
</div>
@endsection
</div>

