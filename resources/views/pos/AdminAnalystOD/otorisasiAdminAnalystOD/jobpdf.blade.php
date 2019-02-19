<style>
    .page-break {
        page-break-after: always;
    }

    .jobdes {
        font-family: Tahoma, Verdana, Segoe, sans-serif;
        border-collapse: collapse;
        border: 1px solid black;
        width: 100%;
    }

    .jobdes td.isi {
        font-size: 11px;
    }

    .jobdes tr.isi {
        font-size: 11px;
    }

    .jobdes td.judul {
        font-size: 12px;
    }

    td.subjudul {
        padding: 5px;
        font-size: 12px;
    }

    .isiprofil {
        font-size: 11px;
    }

    .judulprofil {
        font-size: 12px;
    }
</style>
<div align="center">
    <img src="{{ public_path('img/ks.png') }}" height="40" width="50" />
</div>
<div align="center">
    <img src="{{ public_path('img/kstulisan.png') }}" height="27" width="300" />
</div>

<table class="jobdes" border="1">
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
        <td class="isi" rowspan="2">{{date('d/m/Y',strtotime($data[0]->tglapproveodhcp))}}</td>
    </tr>
    <tr>
        <td class="isi">Holder</td>
        <td class="isi" align="center">:</td>
        <td class="isi">Divisi OD&HCP</td>
    </tr>
    <tr>
        <td colspan="7" class="subjudul"><b>I.IDENTIFIKASI JABATAN (Job Identification)</b></td>
    </tr>
    <tr>
        <td colspan="7">
            <table width="100%">
                <tr class="isi">
                    <td width="25%">No. Jabatan (Job No)</td>
                    <td align="center" width="2%">:</td>
                    <td>{{$data[0]->no_jabatan}}</td>
                    <td>Gol.Jabatan (Job Level) :</td>
                    <td align="center">{{$data[0]->gol_jabatan}}</td>
                </tr>
                <tr class="isi">
                    <td width="25%">Nama Jabatan (Job Name)</td>
                    <td align="center" width="2%">:</td>
                    <td colspan="3">{{$data[0]->name_jabatan}}</td>
                </tr>
                <tr class="isi">
                    <td width="25%">Dinas (Official)</td>
                    <td align="center" width="2%">:</td>
                    <td colspan="3">{{$data[0]->dinas}}</td>
                </tr>
                <tr class="isi">
                    <td width="25%">Divisi (Division)</td>
                    <td align="center" width="2%">:</td>
                    <td colspan="3">{{$data[0]->divisi}}</td>
                </tr>
                <tr class="isi">
                    <td width="25%">Subdirektorat (Subdirectorate)</td>
                    <td align="center" width="2%">:</td>
                    <td colspan="3">{{$data[0]->subdirektorat}}</td>
                </tr>
                {{-- <tr class="isi">
                    <td width="25%">Bertanggung jawab langsung kepada (Directly Responsible to)</td>
                    <td align="center" width="2%">:</td>
                    <td colspan="3">{{$data[0]->jabatanatasanlangsung}}</td>
                </tr> --}}


            </table>
        </td>
    </tr>
    <tr>
        <td colspan="7">
            <table width="100%">
                <tr class="isi">
                    <td width="26%">Bertanggung jawab langsung kepada<br>(Directly Responsible to)</td>
                    <td>: {{$data[0]->jabatanatasanlangsung}}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="7">
            <table width="100%">
                <tr class="isi">
                    <td width="26%">Jabatan yang diawasi langsung<br>(Direct Supervised positions)</td>
                    <td> :

                        @foreach ($job as $koor)

                        - {{$koor->jabatanbawahanlangsung}}<br>

                        @endforeach

                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="7" class="subjudul"><b>II.TUJUAN JABATAN (Primary Job Role)</b></td>
    </tr>
    <tr>
        <td colspan="7" class="isi">{{$data[0]->jobrole}}</td>
    </tr>
    <tr>
        <td colspan="7" class="subjudul"><b>III.TANGGUNG JAWAB UTAMA (Main Responsibility)</b></td>
    </tr>
    <tr>
        <td colspan="4" class="subjudul" align="center"><b>Tugas & Tanggung jawab<br>(Duties & Responsibilities)</b></td>
        <td colspan="3" class="subjudul" align="center"><b>Indikator Capaian<br>(Performance Indicators)</b></td>
    </tr>
    <?php $no=0; ?>
    @foreach ($jobres as $jres)

    <tr>
        <td colspan="4" class="isi">{{$jres->keterangan." ".lcfirst($jres->object)}}</td>
        <td colspan="3" class="isi">{{$jres->id_met_indikator}}</td>
    </tr>
    <?php $no++; ?>
    @endforeach
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
                    <td>{{$data[0]->finansial}}</td>
                </tr>
                <tr class="isi">
                    <td width="30%">Non Finansial (Financial)</td>
                    <td align="center" width="2%">:</td>
                    <td>{{$data[0]->nonfinansial}}</td>
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
                @foreach ($jobres as $jres2)

                <tr class="isi">
                    <td width="5%">{{$no}}</td>
                    <td>{{$jres2->id_met_kewenangan}}</td>
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
            <table class="jobdes" border="1">
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
                                <td valign="top"> @foreach ($unit as $junit)
                                    {{"- ".$junit->id_emp_cskt_ltext}}
                                    @endforeach</td>
                            </tr>
                        </table>
                    </td>
                    <td class="isi" valign="top">
                        <table width="100%">
                            <tr>
                                <td valign="top">@foreach ($unit as $junit)
                                    {{"- ".$junit->id_hal_internal}}
                                    @endforeach</td>
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
                                <td valign="top"> @foreach ($unit as $junit)
                                    {{"- ".$junit->id_eksternal}}
                                    @endforeach</td>
                            </tr>
                        </table>
                    </td>
                    <td class="isi" valign="top">
                        <table width="100%">
                            <tr>
                                <td valign="top">@foreach ($unit as $junit)
                                    {{"- ".$junit->id_hal_external}}
                                    @endforeach</td>
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
                    <td>@foreach ($tools as $jtools)
                        {{"-".$jtools->id_deskripsi}}
                        @endforeach</td>
                </tr>
                <tr class="isi">
                    <td width="15%">2.Bahan Kerja<br> (Materials)</td>
                    <td align="center" width="2%">:</td>
                    <td>@foreach ($mat as $jmat)
                        {{"-".$jmat->id_deskripsi}}
                        @endforeach</td>
                </tr>
                <tr class="isi">
                    <td width="15%">3.Lingk. Kerja<br> (Conditions)</td>
                    <td align="center" width="2%">:</td>
                    <td>@foreach ($co as $jco)
                        {{"-".$jco->id_deskripsi}}
                        @endforeach</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="7" class="subjudul"><b>VIII. PERSYARATAN JABATAN (Job Specifications)</b></td>
    </tr>
    <tr>
            <td  class="isi" colspan="7" valign="top">
                <table>
                    <tr class="isi">
                        <td width="26%" valign="top">1. Pendidikan dan Pengalaman Kerja :<br>(Education & Work Experience)</td>
                        <td valign="top"><ul>
                                @foreach ($pen as $jpen)
                                <li>{{$jpen->id_jenjang}}
                                </li>
                                @endforeach
                            </ul></td><td>@foreach ($ker as $jker) {{$jker->id_keterangan}}<br>@endforeach


                            </td>
                    </tr>
                </table>
            </td>
            
        </tr>
    <tr>
        <td colspan="7" class="isi">
            <table width="100%">
                <tr class="isi">
                    <td width="20%">2.Persyaratan Fisik<br> (Physical Requirements)</td>
                    <td align="center" width="2%">:</td>
                    <td>
                        <ul>
                            @foreach ($fisik as $jfisik)
                            <li>{{$jfisik->id_persyaratan}}
                            </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
            <td colspan="7" class="isi">
                <table width="100%">
                    <tr class="isi">
                        <td width="20%">3.Profil Jabatan<br> (Job Profile)</td>
                        <td align="center" width="2%">:</td>
                        <td>Terlampir (Attached)</td>
                    </tr>
                </table>
            </td>
        </tr>
    <tr>
        <td colspan="7" class="subjudul"><b>IX. POSISI JABATAN DALAM STRUKTUR (Organizational Structure)</b></td>
    </tr>
    <tr>
        <td colspan="7" align="center"><img src="{{ storage_path('app/'.$data[0]->gambar) }}" height="300" width="600" /></td>
    </tr>
    <tr>
        <td colspan="7" class="subjudul"><b>X. LEGALISASI (Legalization)</b></td>
    </tr>
    <tr>
        <td colspan="3" class="isi" align="center">DIANALISIS OLEH:<br>(Analyzed By)</td>
        <td colspan="4" class="isi" align="center">MENYETUJUI<br>(Approved By)</td>
    </tr>
    <tr>
        <td colspan="3" class="isi" align="center"><br><br><br>@if($data[0]->approveanalis==1)<p><b>APPROVED</b></p>@endif<br>{{$data[0]->analis}}</td>
        <td  class="isi" align="center"><br><br><br>@if($data[0]->approveodhcp==1)<p><b>APPROVED</b></p>@endif<br>{{$data[0]->approve}}</td>
        <td colspan="3" class="isi" align="center"><br><br><br>@if($data[0]->approveuser==1)<p><b>APPROVED</b></p>@endif<br>{{$data[0]->namauser}}</td>
    </tr>
    <tr>
        <td colspan="3" class="isi" align="center">{{$data[0]->jabanalis}}</td>
        <td  class="isi" align="center">{{$data[0]->jabapprove}}</td>
        <td colspan="3"class="isi" align="center">{{$data[0]->jabuser}}</td>
    </tr>
    <tr>
        <td colspan="3" class="isi">TGL(Date): {{$data[0]->tglapproveanalis}}</td>
        <td  class="isi" align="center">TGL(Date):{{$data[0]->tglapproveodhcp}}</td>
        <td colspan="3" class="isi" align="center">TGL(Date):{{$data[0]->tglapproveuser}}</td>
    </tr>
</table>
<div class="page-break"></div>

<table width="100%" border="0">
    <tr>
        <td width="33%">
            <img src="{{ public_path('img/logo.png') }}" height="70" width="130" />
        </td>
        <td width="33%" align="center" valign="bottom"><strong>PROFILE JABATAN</strong></td>
        <td width="33%" align="right">
            <table frame="box" width="100%">
                <tr class="isiprofil">
                    <td>No. Issue</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr class="isiprofil">
                    <td>No. RS</td>
                    <td>:</td>
                    <td>RS/PO00/010</td>
                </tr>
                <tr class="isiprofil">
                    <td>Tgl.</td>
                    <td>:</td>
                    <td>{{date("d/m/Y")}}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table class="jobdes" border="1">
    <tr>
        <td width="50%">
            <table>
                <tr class="isiprofil">
                    <td>NAMA POSISI</td>
                    <td>:</td>
                    <td><b>{{$profil[0]->namajabatan}}</b></td>
                </tr>
                <tr class="isiprofil">
                    <td>GOLONGAN</td>
                    <td>:</td>
                    <td><b>{{$profil[0]->golongan}}</b></td>
                </tr>
                <tr class="isiprofil">
                    <td>NO. JABATAN</td>
                    <td>:</td>
                    <td><b>{{$profil[0]->nojabatan}}</b></td>
                </tr>
            </table>
        </td>
        <td width="50%">
            <table>
                <tr class="isiprofil">
                    <td>ABREVIATION NO.</td>
                    <td>:</td>
                    <td><b>{{$profil[0]->noorg}}</b></td>
                </tr>
                <tr class="isiprofil">
                    <td>UNIT KERJA</td>
                    <td>:</td>
                    <td><b>{{$profil[0]->unitkerja}}</b></td>
                </tr>
                <tr class="isiprofil">
                    <td>JOB GROUP</td>
                    <td>:</td>
                    <td><b>{{$profil[0]->jobgroup}}</b></td>
                </tr>
            </table>

        </td>
    </tr>
</table>
<br>
<table class="jobdes" border="1" width="100%">
    <tr>
        <td align="center" style="padding:5px;" class="judulprofil"><b>KOMPETENSI</b></td>
    </tr>
</table><br>
<table class="jobdes" border="1">
    <tr style="color: #fff; background: black;text-align:center;padding:5px;" class="judulprofil">
        <th style="padding:5px;">NO</th>
        <th style="padding:5px;">GROUP ASPEK</th>
        <th style="padding:5px;">NAMA KOMPETENSI</th>
        <th style="padding:5px;">PROFISIENSI</th>
    </tr>
    <?php $no=0;?>
    @foreach ($profil_d as $profd)
    <?php $no++;?>
    <tr class="isiprofil">
        <td align="center">{{$no}}</td>
        <td>{{$profd->groupaspek}}</td>
        <td>{{$profd->namakompetensi}}</td>
        <td>{{$profd->proficiency}}</td>
    </tr>
    @endforeach
</table><br>
<table class="jobdes" border="1" width="100%">
    <tr class="judulprofil">
        <td align="center">Disiapkan Oleh</td>
        <td colspan="2" align="center">Menyetujui</td>
    </tr>
    <tr class="judulprofil">
        <td align="center" width="33%"><br><br>@if($data[0]->approveanalis==1)<p><b>APPROVED</b></p>@endif<br>{{$data[0]->analis}}</td>
        <td align="center" width="33%"><br><br><br>@if($data[0]->approveodhcp==1)<p><b>APPROVED</b></p>@endif<br>{{$data[0]->approve}}</td>
        <td align="center" width="33%"><br><br><br>@if($data[0]->approveuser==1)<p><b>APPROVED</b></p>@endif<br>{{$data[0]->namauser}}</td>
    </tr>
    <tr class="judulprofil">
        <td align="center">{{$data[0]->jabanalis}}</td>
        <td align="center">{{$data[0]->jabapprove}}</td>
        <td align="center">{{$data[0]->jabuser}}</td>
    </tr>
</table>