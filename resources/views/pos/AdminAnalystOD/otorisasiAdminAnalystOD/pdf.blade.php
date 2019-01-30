


<div>
    
    @foreach ($data as $item)
    <div id="print{{$item->id}}">
        <body>
            <img alt="Gambar Koala" src="{{ url('img/ks.png') }}"height="50" width="50" />
        </body>
        <body>
            <img alt="Gambar Koala" src="{{ url('img/kstulisan.png') }}"height="25" width="200" />
        </body><br><br>
        <body>
            <div class="form-group">
                <table border="10" width="100%" celladding="0" cellspacing="0" class="table table-bordered table-hover">
                    <tr>
                        <td width="40%">
                            <table>
                                <tr>
                                    <td>Record Sheet No.</td>
                                    <td>:</td>
                                    <td>RS/PO01/001-ISSUE No. 03</td>
                                </tr>
                                <tr>
                                    <td>IssuE Date</td>
                                    <td> : </td>
                                    <td> 01/01/01</td>
                                </tr>
                                <tr>
                                    <td>Holder</td>
                                    <td>:</td>
                                    <td>Divisi OD&HCP</td>
                                </tr>
                            </table>
                        </td>
                        <td width="40%">
                            <table align="center">
                                <tr>
                                    <td valign="center"><b>URAIAN JABATAN</b></td>
                                </tr>
                            </table>
                        </td>
                        <td width="40%">
                            <table>
                                <tr>
                                    <td>Halaman</td>
                                    <td>:</td>
                                </tr>
                                <tr>
                                    <td>Tgl. Berlaku</td>
                                    <td>:</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <h3>I. IDENTIFIKASI JABATAN</h3>
            <div class="form-group">
                <table border="1" width="100%" celladding="0" cellspacing="0" class="table table-bordered table-hover">
                    <tr>
                        <td width="40%"  colspan="2">
                            <table>
                                <tr>
                                    <td>Nama Jabatan</td>
                                    <td>:</td>
                                    <td>{{$item->name_jabatan}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <td width="40%">
                        <table>
                            <tr>
                                <td>Dinas</td>
                                <td>:</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Divisi</td>
                                <td>:</td>
                                <td><b>{{$item->divisi}}</b></td>
                            </tr>
                            <tr>
                                <td>Sub Direktorat</td>
                                <td>:</td>
                                <td>{{$item->subdirektorat}}</td>
                            </tr>
                            <tr>
                                <td>Direktorat</td>
                                <td>:</td>
                                <td>{{$item->direktorat}}</td>
                            </tr>
                           
                        </table>
                    </td>
                    <td width="40%">
                        <table>
                            <tr>
                                <td>No Jabatan</td>
                                <td>:</td>
                                <td>{{$item->no_jabatan}}</td>
                            </tr>
                                <td>Nama Jabatan</td>
                                <td>:</td>
                                <td>{{$item->name_jabatan}}</td>
                            </tr>
                        </table>
                    </td>
                    <tr>
                            <td width="40%"  colspan="2">
                                <table>
                                    <tr>
                                        <td>Bertangung Jawab Langsung Kepada</td>
                                        <td>:</td>
                                        <td>{{$item->jabatanatasanlangsung}}</td>
                                    </tr>
                                    <tr>
                                        <td valign="top">Jabatan Yang Langsung dikoordinasi</td>
                                        <td valign="top">:</td>
                                        <td valign="top">
                                                
                                            <ul>
                                                @foreach ($job as $koor)
                                                <li>{{$koor->jabatanbawahanlangsung}}</li>
                                                @endforeach
                                            </ul>


                                        </td>
                                    </tr>
                                                
                                </table>
                            </td>
                        </tr>
                      <!-- <td width="30%"></td> -->
                      <!-- <td width="40%"></td> -->
                </table>
            </div>
            <h3>II. TUJUAN JABATAN</h3>
            <div class="form-group">
                <table border="1" width="100%" celladding="0" cellspacing="0" class="table table-bordered table-hover">
                    <tr>
                        <td width="40%"  colspan="2">
                            <table>
                                <tr>
                                    <td><p>{{$item->jobrole}}</p>
                                    </td>
                                </tr>    
                            </table>
                        </td>
                        </tr>
                      <!-- <td width="30%"></td> -->
                      <!-- <td width="40%"></td> -->
                </table>
            </div>
            <h3>III. TANGGUNG JAWAB UTAMA</h3>
            <div class="form-group">
                <table border="1" width="100%" celladding="0" cellspacing="0" class="table table-bordered table-hover">
                    <tr>
                        <td width="40%" align="center" colspan="2">
                            <table>
                                <tr>
                                    <td><b>Tugas & Tanggung Jawab</b></td>
                                </tr> 
                            </table>
                        </td>
                        </tr>
                    </tr>
                    <tr>
                        <td width="40%"  colspan="2">
                            <table>
                                    <?php $no=1; ?>
                                    @foreach ($jobres as $jres)
                                    
                                    <tr>
                                    <td>{{$no}}.</td><td>{{$jres->keterangan." ".lcfirst($jres->object)}}</td>
                                    </tr>
                                    <?php $no++; ?>
                                    @endforeach
                            </table>
                        </td>
                    </tr>
                    
                </table>
            </div>
            <h3>IV.	DIMENSI</h3>
            <div class="form-group">
                <table border="1" width="100%" celladding="0" cellspacing="0" class="table table-bordered table-hover">
                    <tr>
                        <td width="40%" colspan="4">
                            <table>
                                <tr>
                                    <td valign="top">Finansial</td>
                                    <td valign="top">:</td>
                                    <td></td>
                                    <td valign="top">
                                            {{$item->finansial}}
                                    </td>
                                </tr> 
                                <tr>
                                        <td valign="top">Non Finansial</td>
                                        <td valign="top">:</td>
                                        <td></td>
                                        <td valign="top"> 
                                                {{$item->nonfinansial}}
                                        </td>
                                </tr> 
                            </table>
                            
                        </td>
                        </tr>
                    </tr>
                </table>
            </div>
            <h3>V.	WEWENANG</h3>
            <div class="form-group">
                <table border="1" width="100%" celladding="0" cellspacing="0" class="table table-bordered table-hover">
                    <tr>
                        <td width="40%" colspan="4">
                                <ul>
                                @foreach ($jobres as $jres2)
                                <li>{{$jres2->id_met_kewenangan}}</li>
                                @endforeach
                            </ul>
                        </td>
                        </tr>
                </table>
            </div>
            <h3>VI. HUBUNGAN KERJA (internal, eksternal)</h3>
            <div class="form-group">
                <table border="1" width="100%" celladding="0" cellspacing="0" class="table table-bordered table-hover">
                     <tr>
                         <td width="50%">Jabatan / Unit yang dituju</td><td width="50%">Dalam Hal</td>
                     </tr>
                     <tr>
                            <td width="50%">
                                <ul>
                                    <li><b>Internal</b></li>
                                    @foreach ($unit as $junit)
                                    {{"- ".$junit->id_emp_cskt_ltext}}
                                    @endforeach
                                </ul>
                                
                            </td>
                            <td width="50%">
                                    @foreach ($unit as $junit)
                                    {{"- ".$junit->id_hal_internal}}
                                    @endforeach

                            </td>
                     </tr>
                     <tr>
                            <td width="50%">
                                <ul>
                                    <li><b>Eksternal</b></li>
                                    @foreach ($unit as $junit)
                                    {{"- ".$junit->id_eksternal}}
                                    @endforeach
                                </ul>
                            </td>
                            <td width="50%">
                                    @foreach ($unit as $junit)
                                    {{"- ".$junit->id_hal_external}}
                                    @endforeach
                                
                            </td>
                     </tr>
                </table>
            </div>
            <h3>VII. ALAT, BAHAN DAN LINGKUNGAN KERJA</h3>
            <div class="form-group">
                <table border="1" width="100%" celladding="0" cellspacing="0" class="table table-bordered table-hover">
                    <tr>
                        <td width="2%" align="center">1</td><td width="10%">Alat Kerja</td><td width="2%" align="center">:</td><td>
                                @foreach ($tools as $jtools)
                                {{$jtools->id_deskripsi.", "}}
                                @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td width="2%" align="center">2</td><td width="10%">Bahan Kerja</td><td width="2%" align="center">:</td><td>
                                @foreach ($mat as $jmat)
                                {{$jmat->id_deskripsi.", "}}
                                @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td width="2%" align="center">3</td><td width="10%">Lingkungan Kerja</td><td width="2%" align="center">:</td><td>
                                @foreach ($co as $jco)
                                {{$jco->id_deskripsi.", "}}
                                @endforeach
                        </td>
                    </tr>
                </table>
            </div>
            <h3>VIII. SPESIFIKASI JABATAN </h3>
            <div class="form-group">
                <table border="1" width="100%" celladding="0" cellspacing="0" class="table table-bordered table-hover">
                    <tr>
                        <td width="2%" align="center">1.</td><td width="20%">Pendidikan dan pengalaman kerja</td><td width="2%" align="center">:</td><td>
                                <ul>
                                        @foreach ($pen as $jpen)
                                        <li>{{$jpen->id_jenjang}}
                                                @foreach ($ker as $jker) {{$jker->id_keterangan}} @endforeach
                                        </li>
                                        @endforeach
                                    </ul>
                        </td>
                    </tr>
                    <tr>
                        <td width="2%" align="center">2.</td><td width="20%">Persyaratan fisik</td><td width="2%" align="center">:</td><td></td>
                    </tr>
                    <tr>
                        <td width="2%" align="center">3.</td><td width="20%">Profil jabatan</td><td width="2%" align="center">:</td><td>Terlampir</td>
                    </tr>
                </table>
            </div>
            <h3>IX. POSISI JABATAN DALAM BAGAN ORGANISASI </h3>
            <div class="form-group" align="center">
                    
                    <img  src="{{ url('img/jobdesc/'.$item->gambar) }}" />
                    
            </div>
            <h3>X.	LEGALISASI </h3>
            <div class="form-group">
                <table border="1" width="100%" celladding="0" cellspacing="0" class="table table-bordered table-hover">
                    <tr>
                        <td width="35%" align="center">DIANALISIS OLEH :</td><td align="center" colspan="2" width="65%">MENYETUJUI</td>
                    </tr>
                    <tr>
                        <td><br><br><br>{{$item->analis}}</td><td><br><br><br>{{$item->approve}}</td><td><br><br><br>{{$item->namauser}}</td>
                    </tr>
                    <tr>
                        <td></td><td></td><td></td>
                    </tr>
                    <tr>
                        <td>Tgl:</td><td>Tgl:</td><td>Tgl:</td>
                    </tr>
                </table>
                
            </div>
            <br><br><br><br><br><br><br><br>
            <h3>PROFIL JABATAN</h3>
            <div class="form-group">
                <table border="1" width="100%" celladding="0" cellspacing="0" class="table table-bordered table-hover">
                    <td width="50%">
                        <table>
                            <tr>
                                <td>NAMA POSIS</td>
                                <td>:</td>
                                <td>Technician QualityControl WRM</td>
                            </tr>
                            <tr>
                                <td>GOLONGAN</td>
                                <td>:</td>
                                <td>EF</td>
                            </tr>
                            <tr>
                                <td>NO. JABATAN</td>
                                <td>:</td>
                                <td>3240402100</td>
                            </tr>
                        </table>
                    </td>
                    <td width="50%">
                        <table>
                            <tr>
                                <td>ABREVATION NO.</td>
                                <td>:</td>
                                <td>3202</td>
                            </tr>
                            <tr>
                                <td>UNIT KERJA</td>
                                <td>:</td>
                                <td>Seksi Quality Control WRM</td>
                            </tr>
                            <tr>
                                <td>JOB GROUP</td>
                                <td>:</td>
                                <td>Spesialis Pengendalian kualitas 12</td>
                        </table>
                    </td>
                </table>
            </div>
            <div class="form-group">
                <table border="1" width="100%" celladding="0" cellspacing="0" class="table table-bordered table-hover">
                    <td width="40%">
                        <table align="center">
                            <tr>
                                <td>K O M P E T E N S I</td>
                            </tr>
                        </table>
                    </td>
                </table>
            </div>
            <div class="form-group">
                <table border="1" width="100%" celladding="0" cellspacing="0" class="table table-bordered table-hover">
                    <td width="10%">
                        <table>
                            <tr>
                                <td>No</td>
                            </tr>
                            <tr>
                                <td>1</td>
                            </tr>
                        </table>
                    </td>
                    <td width="40%">
                        <table>
                            <tr>
                                <td>GROUP ASPEK</td>
                            </tr>
                            <tr>
                                <td>1</td>
                            </tr>
                        </table>
                    </td>
                    <td width="40%">
                        <table>
                            <tr>
                                <td>NAMA KOMPETENSI</td>
                            </tr>
                            <tr>
                                <td>1</td>
                            </tr>
                        </table>
                    </td>
                    <td width="40%">
                        <table>
                            <tr>
                                <td>PROFISIENSI</td>
                            </tr>
                            <tr>
                                <td>1</td>
                            </tr>
                        </table>
                    </td>
                </table>
            </div>
        </body>
    </div>
@endforeach
<div>