@extends('layouts.adminLTE')

@section('style')
@endsection

@section('script')
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
        
        <!-- /.box-header -->
        <div class="box-body">
            <table width=50%  border="1" id="example2" class="table table-bordered table-hover">
                <tr>
                    <td width=50%>Record Sheet No</td>
                    <td>:</td>
                    <td width=50%>xxxxxxxx</td>
                </tr>
                <tr>
                    <td>Issue Date</td>
                    <td>:</td>
                    <td>xxxxxxx</td>
                </tr>
                <tr>
                    <td>Holder</td>
                    <td>:</td>
                    <td>xxxxxxx</td>
                </tr>
                <tr>
                    <td>Halaman (Page)</td>
                    <td>:</td>
                    <td>xxxxxxx</td>
                </tr>
                <tr>
                    <td>Tgl. Berlaku (Validity Date)</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </section>   
    <section class="content">
        <div class="box box-warning">   
            <div class="box-header with-border">
                <h3 class="box-title">I. URAIAN JABATAN (Job Description)</h3>
            </div>
            <div class="box-body">
                <table width=50%  border="1" id="example2" class="table table-bordered table-hover">
                    <tr>
                        <td width=50%>No. Jabatan (Job No.)</td>
                        <td>:</td>
                        <td width=50%> 
                            <input type="text" class="form-control" id="inputSuccess" placeholder="Input Abbrove ..."></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Gol. Jabatan (Job Level):</td>
                        <td>:</td>
                        <td>xxxxxxx</td>
                    </tr>
                    <tr>
                        <td>Nama Jabatan (Job Name)</td>
                        <td>:</td>
                        <td>xxxxxxx</td>
                    </tr>
                    <tr>
                        <td>Dinas (Official)</td>
                        <td>:</td>
                        <td>xxxxxxx</td>
                    </tr>
                    <tr>
                        <td>Divisi (Division)</td>
                        <td>:</td>
                        <td>xxxxxxx</td>
                    </tr>
                    <tr>
                        <td>Subdirektorat(Subdirectorate)</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Direktorat (Directorate)</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Bertangung Jawab Langsung Kepada (Directly Responsible to)</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </section> 
        <section class="content">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">II. TUJUAN JABATAN (Primary Job Role)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div> 
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Otomatis pilih Kata Kerja by Sistem </label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                style="width: 100%;">
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Otomatis Pilih Objective jabatan </label>
                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                            style="width: 100%;">
                            <option>Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Otomatis Pilih Objecy by Sistem </label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                        <option>Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                </div>
            </div>
        </section>
        <section class="content">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">III. TANGGUNG JAWAB UTAMA (Main Responsibility)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div> 
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Tugas & Tanggung Jawab Duties & Responsibilities </label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
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
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>_</label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Indikator Capaian Performance Indicators </label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
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
            </div>
        </section>
        <section class="content">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">IV. DIMENSI (Dimensions)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div> 
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> a. Finansial (Financial) </label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                style="width: 100%;">
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> b. Non Finansial (Non Financial) </label>
                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                            style="width: 100%;">
                            <option>Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">V. WEWENANG (Authorities)</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div> 
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                style="width: 100%;">
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                            style="width: 100%;">
                            <option>Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                        <option>Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">VI. HUBUNGAN KERJA (Work Relationship)</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Unit Kerja (Work Unit)</label>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>a. Internal (Internal)</label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                        <option>Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>b. Eksternal (External)</label>
                    <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                    style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Dalam Hal (In Terms of)</label>
            </select>
        </div>
        <div class="form-group">
            <label>a. Internal (Internal)</label>
            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
            style="width: 100%;">
            <option>Alabama</option>
            <option>Alaska</option>
            <option>California</option>
            <option>Delaware</option>
            <option>Tennessee</option>
            <option>Texas</option>
            <option>Washington</option>
        </select>
    </div>
    <div class="form-group">
        <label>b. Eksternal (External)</label>
        <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
        style="width: 100%;">
        <option>Alabama</option>
        <option>Alaska</option>
        <option>California</option>
        <option>Delaware</option>
        <option>Tennessee</option>
        <option>Texas</option>
        <option>Washington</option>
    </select>
</div>
</div>
</section>
<section class="content">
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">VII. ALAT,BAHAN,DAN LINGKUNGAN KERJA (Tools, Materials, and Conditions)</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div> 
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>1. Alat Kerja (Tools)</label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                        <option>Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>2. Bahan Kerja (Materials)</label>
                    <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                    style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>
            <div class="form-group">
                <label>3. Lingk. Kerja (Conditions))</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                style="width: 100%;">
                <option>Alabama</option>
                <option>Alaska</option>
                <option>California</option>
                <option>Delaware</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Washington</option>
            </select>
        </div>
    </div>
</div>
</section>
<section class="content">
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">VIII. PERSYARATAN JABATAN (Job Spesifications)</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div> 
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>1. Pendidikan dan Pengalaman Kerja </label>
                        <h6>(Education & Work Experience)</h6>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                        <option>Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>2. Persyaratan Fisik</label>
                    <h6>(Physical Requirements)</h6>
                    <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                    style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>
            <div class="form-group">
                <label>3. Profil Jabatan</label>
                <h6>(Job Profile)</h6>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                style="width: 100%;">
                <option>Alabama</option>
                <option>Alaska</option>
                <option>California</option>
                <option>Delaware</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Washington</option>
            </select>
        </div>
    </div>
</div>
</section>
<section class="content">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h4 class="box-title">IX. POSISI JABATAN DALAM STRUKTUR ORGANISASI (Organizational Structure)</h4>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
            <table width=50%  border="1" id="example2" class="table table-bordered table-hover">
                
                <tr>
                    <td></td>
                    <td class="center"> <img class="img-circle img-bordered-sm" src="{{ asset ('/adminlte/dist/img/user1-128x128.jpg') }}" alt="user image"></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
            </table>
        </div>
    </section>   
    <section class="content">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h4 class="box-title">URAIAN JABATAN (Job Description)</h4>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
                <table width=50%  border="10" id="example2" class="table table-bordered table-hover">
                    <tr>
                        <td width=30%>DIANALISIS OLEH: (Analyzed By):</td>
                        <td width=30% class="center">MENYETUJUI (Approved By)</td>
                        <td width=30%></td>
                    </tr>
                    <tr>
                        <td>Issue Date</td>
                        <td>:</td>
                        <td>xxxxxxx</td>
                    </tr>
                    <tr>
                        <td>Holder</td>
                        <td>:</td>
                        <td>xxxxxxx</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <h5>Input Nama Analis</h5>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                style="width: 100%;">
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </td>
                        <td>
                            <div class="form-group">
                                <h5>Input Nama Manager OD&HCP</h5>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                style="width: 100%;">
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </td>
                        <td>
                            <div class="form-group">
                                <h5>Input Nama User</h5>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                style="width: 100%;">
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><div class="form-group">
                            <h5>Otomatis</h5>
                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                            style="width: 100%;">
                            <option>Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select></td>
                        <td>
                            <div class="form-group">
                                <h5>Otomatis</h5>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                style="width: 100%;">
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </td>
                        <td>
                            <div class="form-group">
                                <h5>Otomatis</h5>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                style="width: 100%;">
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </section>   
        @endsection
        
        