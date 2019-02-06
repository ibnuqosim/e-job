@extends('layouts.adminLTE')
@section('style')
@endsection

@section('script')

@endsection

@section('content')

<section class="content">

    <div class="box box-warning">
            @foreach ($data as $item)
        <div class="box-body" id="print{{$item->id}}">

            <body>
                <img alt="Gambar Koala" src="{{ url('img/ks.png') }}" height="50" width="50" />
            </body>

            <body>
                <img alt="Gambar Koala" src="{{ url('img/kstulisan.png') }}" height="25" width="200" />
            </body><br><br>
            <table border="5" width="100%">
                <tr><td width="15%"></td><td ></td><td width="18%"></td><td width="20%"></td><td></td><td></td><td width="18%"></td></tr>
                <tr>
                    <th>Record Sheet No.</th>
                    <th>:</th>
                    <th>RS/PO01/001-ISSUE No. 03</th>
                    <th rowspan="3">URAIAN JABATAN (Job Description)</th>
                    <th>Halaman (Page)</th>
                    <th>:</th>
                    <th></th>
                </tr>
                <tr>
                    <th>IssuE Date</th>
                    <th>:</th>
                    <th>01/06/2010</th>
                    <th rowspan="2">Tgl. Berlaku (Validity Date)</th>
                    <th rowspan="2">:</th>
                    <th rowspan="2"></th>
                </tr>
                <tr>
                    <th>Holder</th>
                    <th>:</th>
                    <th>Divisi OD&HCP</th>
                </tr>

            </table>
            <h3>I. IDENTIFIKASI JABATAN</h3>
            <table border="1" width="100%">
               
                <tr>
                    <td>No Jabatan (Job No)</td>
                    <td>:</td>
                    <td>{{$item->no_jabatan}}<td>Gol.Jabatan (Job Level) :</td>
                    <td width="5%">{{$item->gol_jabatan}}</td>
                </tr>
                <tr>
                    <td>Nama Jabatan (Job Name)</td>
                    <td>:</td>
                    <td colspan="3">{{$item->name_jabatan}}</td>
                </tr>
                <tr>
                    <td>Dinas (Official)</td>
                    <td>:</td>
                    <td colspan="3">{{$item->dinas}}</td>
                </tr>
                <tr>
                    <td>Divisi (Division)
                    </td>
                    <td>:</td>
                    <td colspan="3">{{$item->divisi}}</td>
                </tr>
                <tr>
                    <td>Subdirektorat(Subdirectorate)
                    </td>
                    <td>:</td>
                    <td colspan="3">{{$item->subdirektorat}}</td>
                </tr>
                <tr>
                    <td>Direktorat (Directorate)

                    </td>
                    <td>:</td>
                    <td colspan="3">{{$item->direktorat}}</td>
                </tr>
                <tr>
                    <td>Bertanggung jawab langsung kepada(Directly Responsible to)
                    </td>
                    <td>:</td>
                    <td colspan="3">{{$item->jabatanatasanlangsung}}</td>
                </tr>
                <tr>
                    <td>Jabatan yang diawasi langsung(Direct supervised positions)

                    </td>
                    <td>:</td>
                    <td colspan="3"><ul>
                            @foreach ($job as $koor)
                            <li>{{$koor->jabatanbawahanlangsung}}</li>
                            @endforeach
                        </ul></td>
                </tr>
                

            </table>
            <h3>II. TUJUAN JABATAN (Primary Job Role)</h3>
            <table border="1" width="100%">
                    <tr>
                            <td><p>{{$item->jobrole}}</p></td>
                        </tr>
            </table>
            <h3>III. TANGGUNG JAWAB UTAMA (Main Responsibility)</h3>
            <table border="1" width="100%">
               
                <tr>
                    <th colspan="2" width="60%">Tugas & Tanggung Jawab (Duties & Responsibilities)
                    </th>
                    <th width="40%">Indikator Capaian (Performance Indicators)
                    </th>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>Melaksanakan setiap tugas dan tanggung jawab dengan memerhatikan aspek dan kondisi keuangan
                        perusahaan serta mendukung program penghematan perusahaan.
                    </td>
                    <td>Penghematan Unit Kerja
                    </td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Melaksanakan tugas sesuai dengan Sistem Manajemen Krakatau Steel (SMKS) dan peraturan/kebijakan
                        yang berlaku baik internal (Prosedur, WI, SOP, PKB) maupun eksternal (Perpres, Permen, Kepmen,
                        dll) untuk menghasilkan kualitas kerja yang tinggi dan memenuhi standar yang ditetapkan.
                    </td>
                    <td>Pelaksanaan kerja sesuai proses bisnis perusahaan serta peraturan yang berlaku
                    </td>
                </tr>
                <?php $no=3; ?>
                @foreach ($jobres as $jres)
                
                <tr>
                <td>{{$no}}.</td><td>{{$jres->keterangan." ".lcfirst($jres->object)}}</td><td>{{$jres->id_met_indikator}}</td>
                </tr>
                <?php $no++; ?>
                @endforeach
            </table>
            <h3>IV. DIMENSI (Dimensions)</h3>
            <table border="1" width="100%">
                <tr>
                    <td>b. Non Finansial (Non Financial)

                    </td>
                    <td>:</td><td>{{$item->nonfinansial}}</td>
                </tr>
                <tr>
                    <td>a. Finansial (Financial)
                    </td>
                    <td>:</td><td>{{$item->finansial}}</td>
                </tr>
            </table>
            <h3>V. WEWENANG (Authorities)</h3>
            <table border="1" width="100%">
               
                <tr>
                    <td> <ul>
                            @foreach ($jobres as $jres2)
                            <li>{{$jres2->id_met_kewenangan}}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>

            </table>
            <h3>VI. HUBUNGAN KERJA (Work Relationship)</h3>
            <table border="1" width="100%">
               
                <tr>
                    <th width="50%">Unit Kerja (Work unit)
                    </th>
                    <th width="50%">Dalam Hal (In Terms Of)
                    </th>
                </tr>
                <tr>
                    <td>a.Internal(Internal) :<ul>
                            @foreach ($unit as $junit)
                            {{"- ".$junit->id_emp_cskt_ltext}}
                            @endforeach
                        </ul></td>
                    <td> @foreach ($unit as $junit)
                            {{"- ".$junit->id_hal_internal}}
                            @endforeach</td>
                </tr>
                <tr>
                    <td>b. Eksternal (External):<ul>
                            
                            @foreach ($unit as $junit)
                            {{"- ".$junit->id_eksternal}}
                            @endforeach
                        </ul>
                    </td>
                    <td>@foreach ($unit as $junit)
                            {{"- ".$junit->id_hal_external}}
                            @endforeach</td>
                </tr>

            </table>
            <h3>VII. ALAT, BAHAN, DAN LINGKUNGAN KERJA (Tools, Materials, and Conditions)</h3>
            <table border="1" width="100%">
                
                <tr>
                    <td width="50%"></td>
                    <td width="50%"></td>
                </tr>
                <tr>
                    <td>1. Alat Kerja (Tools)</td>
                    <td>@foreach ($tools as $jtools)
                            {{"-".$jtools->id_deskripsi}}
                            @endforeach</td>
                </tr>
                <tr>
                    <td>2. Bahan Kerja (materials)</td>
                    <td>@foreach ($mat as $jmat)
                            {{"-".$jmat->id_deskripsi}}
                            @endforeach</td>
                </tr>
                <tr>
                    <td>3. Ling. Kerja (Conditions)</td>
                    <td>@foreach ($co as $jco)
                            {{"-".$jco->id_deskripsi}}
                            @endforeach</td>
                </tr>
            </table>
            <h3>VIII. PERSYARATAN JABATAN (Job Spesifications)</h3>
            <table border="1" width="100%">
                <tr>
                    <td width="50%"></td>
                    <td width="50%"></td>
                </tr>
              
                <tr>
                    <td>1. Pendidikan dan pengalaman kerja (Education & Work Experience)</td>
                    <td> <ul>
                            @foreach ($pen as $jpen)
                            <li>{{$jpen->id_jenjang}}
                                    @foreach ($ker as $jker) {{$jker->id_keterangan}} @endforeach
                            </li>
                            @endforeach
                        </ul></td>
                </tr>
                <tr>
                    <td>2. Persyaratan Fisik (Physical Requirements)
                    </td>
                    <td><ul>
                            @foreach ($fisik as $jfisik)
                            <li>{{$jfisik->id_persyaratan}}
                            </li>
                            @endforeach
                        </ul></td>
                </tr>
                <tr>
                    <td>3. Profil Jabatan (Job Profile)

                    </td>
                    <td>Terlampir</td>
                </tr>
            </table>
            <h3>IX. POSISI JABATAN DALAM STRUKTUR ORGANISASI (Organizational Structure)</h3>
            <table border="1" width="100%">
               
                <tr>
                    <td><img  src="{{ url($item->gambar) }}" /></td>
                </tr>
            </table>
            <h3>X. LEGALISASI (Legalization)</h3>
            <table border="1" width="100%">
                <tr>
                    <td width="33%"></td>
                    <td width="33%"></td>
                    <td width="33%"></td>
                </tr>
                
                <tr>
                    <td align="center">DIANALISIS OLEH: (Analyzed By):
                    </td>
                    <td colspan="2" align="center">MENYETUJUI (Approved By)
                    </td>
                </tr>
                <tr>
                    <td align="center"><br><br>@if($item->approveanalis==1)<p><b>APPROVED</b></p>@endif<br>{{$item->analis}}</td>
                    <td align="center"><br><br><br>@if($item->approveuser==1)<p><b>APPROVED</b></p>@endif<br>{{$item->approve}}</td>
                    <td align="center"><br><br><br>@if($item->approveodhcp==1)<p><b>APPROVED</b></p>@endif<br>{{$item->namauser}}</td>
                </tr>
                <tr>
                    <td align="center">{{$item->jabanalis}}</td>
                    <td align="center">{{$item->jabapprove}}</td>
                    <td align="center">{{$item->jabuser}}</td>
                </tr>
                <tr>
                    <td>TGL(Date): {{$item->tglapproveanalis}}</td>
                    <td>TGL(Date):{{$item->tglapproveuser}}</td>
                    <td>TGL(Date):{{$item->tglapproveodhcp}}</td>
                </tr>
            </table>




        </div>
        @endforeach
    </div>
</section>
</section>
@endsection
















</div>