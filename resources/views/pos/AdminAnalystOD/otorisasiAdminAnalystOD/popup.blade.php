
@foreach ($tj as $item)
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
                <table class="table table-bordered" style="color:black">
                    <tr>
                            <td class="isi" width="15%">Record Sheet No.</td>
                            <td class="isi" align="center" width="1%">:</td>
                            <td class="isi">RS/PO01/001-ISSUE No.3</td>
                            <td rowspan="3" class="judul" align="center" width="25%"><b>URAIAN JABATAN<br>(Job Description)</b></td>
                            <td class="isi">Halaman(Page)</td>
                            <td class="isi" align="center" width="1%">:</td>
                            <td class="isi"></td>
                        </tr>
                        <tr>
                            <td class="isi">Issue Date</td>
                            <td class="isi" align="center">:</td>
                            <td class="isi">01/06/2010</td>
                            <td class="isi" rowspan="2">Tgl. Berlaku(Validity Date)</td>
                            <td class="isi" rowspan="2" align="center">:</td>
                            <td class="isi" rowspan="2">{{date('d/m/Y',strtotime($item->tglapproveodhcp))}}</td>
                        </tr>
                        <tr>
                            <td class="isi">Holder</td>
                            <td class="isi" align="center">:</td>
                            <td class="isi">Divisi OD&HCP</td>
                        </tr>
                        <tr>
                            <td colspan="7"><b>I.IDENTIFIKASI JABATAN (Job Identification)</b></td>
                        </tr>
                        <tr>
                                <td colspan="7">
                                    <table width="100%">
                                        <tr class="isi">
                                            <td width="25%">No. Jabatan (Job No)</td>
                                            <td align="center" width="2%">:</td>
                                            <td>{{$item->no_jabatan}}</td>
                                            <td>Gol.Jabatan (Job Level) :</td>
                                            <td align="center">{{$item->gol_jabatan}}</td>
                                        </tr>
                                        <tr class="isi">
                                            <td width="25%">Nama Jabatan (Job Name)</td>
                                            <td align="center" width="2%">:</td>
                                            <td colspan="3">{{$item->name_jabatan}}</td>
                                        </tr>
                                        <tr class="isi">
                                            <td width="25%">Dinas (Official)</td>
                                            <td align="center" width="2%">:</td>
                                            <td colspan="3">{{$item->dinas}}</td>
                                        </tr>
                                        <tr class="isi">
                                            <td width="25%">Divisi (Division)</td>
                                            <td align="center" width="2%">:</td>
                                            <td colspan="3">{{$item->divisi}}</td>
                                        </tr>
                                        <tr class="isi">
                                            <td width="25%">Subdirektorat (Subdirectorate)</td>
                                            <td align="center" width="2%">:</td>
                                            <td colspan="3">{{$item->subdirektorat}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7">
                                                <table width="100%">
                                                    <tr class="isi">
                                                        <td width="26%">Bertanggung jawab langsung kepada<br>(Directly Responsible to)</td>
                                                        <td>: {{$item->job[0]->jabatanatasanlangsung}}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                                <td colspan="7">
                                                    <table width="100%">
                                                        <tr class="isi">
                                                            <td width="26%">Jabatan yang diawasi langsung<br>(Direct Supervised positions)</td>
                                                            <td id="jbl">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        
                        
                        
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7" class="subjudul"><b>II.TUJUAN JABATAN (Primary Job Role)</b></td>
                            </tr>
                            <tr>
                                <td colspan="7" class="isi">{{$item->jobrole}}</td>
                            </tr>
                            <tr>
                                <td colspan="7" class="subjudul"><b>III.TANGGUNG JAWAB UTAMA (Main Responsibility)</b></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="subjudul" align="center"><b>Tugas & Tanggung jawab<br>(Duties & Responsibilities)</b></td>
                                <td colspan="3" class="subjudul" align="center"><b>Indikator Capaian<br>(Performance Indicators)</b></td>
                            </tr>
                            <tbody id="uno"></tbody>
                            <tr>
                                    <td colspan="4" class="isi">Melaksanakan setiap tugas dan tanggung jawab dengan memerhatikan aspek dan kondisi
                                        keuangan
                                        perusahaan serta mendukung program penghematan perusahaan.
                                    </td>
                                    <td colspan="3" class="isi">Penghematan Unit Kerja
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="isi">Melaksanakan tugas sesuai dengan Sistem Manajemen Krakatau Steel (SMKS) dan
                                        peraturan/kebijakan
                                        yang berlaku baik internal (Prosedur, WI, SOP, PKB) maupun eksternal (Perpres, Permen, Kepmen,
                                        dll) untuk menghasilkan kualitas kerja yang tinggi dan memenuhi standar yang ditetapkan.
                                    </td>
                                    <td colspan="3" class="isi">Pelaksanaan kerja sesuai proses bisnis perusahaan serta peraturan yang berlaku
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="subjudul"><b>IV. DIMENSI (Dimensions)</b></td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <table width="100%">
                                            <tr class="isi">
                                                <td width="30%">Finansial (Financial)</td>
                                                <td align="center" width="2%">:</td>
                                                <td><input type="text" readonly class="form-control" id="finansial" name="finansial" size="100px" /></td>
                                            </tr>
                                            <tr class="isi">
                                                <td width="30%">Non Finansial (Financial)</td>
                                                <td align="center" width="2%">:</td>
                                                <td><input type="text" readonly class="form-control" id="nonfinansial" name="nonfinansial" size="100px"/></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="subjudul"><b>V. WEWENANG (Authorities)</b></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="isi">
                                        <table width="100%" border="0">
                                            <?php $no=1; ?>
                                            @foreach ($item->jobdescreate_res as $item3)
                            
                                            <tr class="isi">
                                                <td width="5%">{{$no}}</td>
                                                <td>{{$item3->id_met_kewenangan}}</td>
                                            </tr>
                                            <?php $no++; ?>
                                            @endforeach
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="subjudul"><b>VI. HUBUNGAN KERJA (Work Relationship)</b></td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <table class="table table-bordered" style="color:black">
                                            <tr>
                                                <td class="subjudul" width="50%" align="center"><b>Unit Kerja<br>(Work Unit)</b></td>
                                                <td class="subjudul" width="50%" align="center"><b>Dalam Hal<br>(In Terms of)</b></td>
                                            </tr>
                                            <tr>
                                                <td class="isi">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="top" width="20%">a. Internal<br>(Internal)</td>
                                                            <td valign="top" width="1%">:</td>
                                                            <td valign="top" id="in"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="isi" valign="top">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="top" id="halin"></td>
                                                        </tr>
                                                    </table>
                            
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="isi">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="top" width="20%">b. Eksternal<br>(External)</td>
                                                            <td valign="top" width="1%">:</td>
                                                            <td valign="top" id="eks"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="isi" valign="top">
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="top" id="haleks"></td>
                                                        </tr>
                                                    </table>
                            
                                                </td>
                                            </tr>
                            
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="subjudul"><b>VII. ALAT, BAHAN, DAN LINGKUNGAN KERJA (Tools, Materials, and Conditions)</b></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="isi">
                                        <table width="100%">
                                            <tr class="isi">
                                                <td width="15%">1.Alat Kerja<br> (Tools)</td>
                                                <td align="center" width="2%">:</td>
                                                <td id="tools"></td>
                                            </tr>
                                            <tr class="isi">
                                                <td width="15%">2.Bahan Kerja<br> (Materials)</td>
                                                <td align="center" width="2%">:</td>
                                                <td id="mat"></td>
                                            </tr>
                                            <tr class="isi">
                                                <td width="15%">3.Lingk. Kerja<br> (Conditions)</td>
                                                <td align="center" width="2%">:</td>
                                                <td id="co"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="subjudul"><b>VIII. PERSYARATAN JABATAN (Job Specifications)</b></td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                            <table  class="table table-bordered" style="color:black">
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
                                                        <tbody id="fisik"></tbody>
                                                    </thead>
                                                </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        
                                    </td>
                                </tr>
                            
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
@endforeach