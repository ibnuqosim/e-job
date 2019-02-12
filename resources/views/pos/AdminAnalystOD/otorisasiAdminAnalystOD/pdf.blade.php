@extends('layouts.adminLTE')
@section('style')
@endsection

@section('script')
<script src="{{url ('Printjs/print.min.js') }}"></script>
<script>
// function cetak(){
//     //printJS('{{ url('img/ks.png') }}', 'image');
//     printJS('cetak','html');
// }
function printDiv(divName) {

var printContents = document.getElementById(divName).innerHTML;
w = window.open();
w.document.write('<html><head></head><body>');
w.document.write(printContents);
w.document.write('</body></html>');
w.document.write('<scr' + 'ipt type="text/javascript">' + 'window.onload = function() { window.print(); window.close(); };' + '</sc' + 'ript>');

w.document.close(); // necessary for IE >= 10
w.focus(); // necessary for IE >= 10
//setInterval(function(){ w.print(); }, 3000);

//w.print();
return true;
}
</script>
@endsection

@section('content')
{{-- <a href="#" onclick="printDiv('cetak');
        ">Cetak</a> --}}
<section class="content">
    <div class="box box-warning" align="right" ><div class="box-body"><a href="#" onclick="printDiv('cetak');" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        &nbsp; <a class="btn btn-warning pull-right" href="javascript:history.back()"><i class="fa fa-reply"></i> Kembali
        </a>
    </div></div>
<div id="cetak">
    <div class="box box-warning" >
            @foreach ($data as $item)
        <div class="box-body" >

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
                    <td rowspan="3" align="center"><b><h3>URAIAN JABATAN (Job Description)</h3></b></td>
                    <th>Halaman (Page)</th>
                    <th>:</th>
                    <th></th>
                </tr>
                <tr>
                    <th>IssuE Date</th>
                    <th>:</th>
                <th>{{date("d/m/Y")}}</th>
                    <th rowspan="2">Tgl. Berlaku (Validity Date)</th>
                    <th rowspan="2">:</th>
                    <th rowspan="2">{{$item->tglapproveodhcp}}</th>
                </tr>
                <tr>
                    <th>Holder</th>
                    <th>:</th>
                    <th>Divisi OD&HCP</th>
                </tr>

            </table>
            <h3>I. IDENTIFIKASI JABATAN ( Job Identification )</h3>
            <table border="1" width="100%">
               
                <tr>
                    <td width="40%">No Jabatan (Job No)</td>
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
                    <th  width="60%">Tugas & Tanggung Jawab (Duties & Responsibilities)
                    </th>
                    <th width="40%">Indikator Capaian (Performance Indicators)
                    </th>
                </tr>
                
                <?php $no=0; ?>
                @foreach ($jobres as $jres)
                
                <tr>
                <td>{{$jres->keterangan." ".lcfirst($jres->object)}}</td><td>{{$jres->id_met_indikator}}</td>
                </tr>
                <?php $no++; ?>
                @endforeach
                <tr>
                    {{-- <td>1.</td> --}}
                    <td>Melaksanakan setiap tugas dan tanggung jawab dengan memerhatikan aspek dan kondisi keuangan
                        perusahaan serta mendukung program penghematan perusahaan.
                    </td>
                    <td>Penghematan Unit Kerja
                    </td>
                </tr>
                <tr>
                    {{-- <td>2.</td> --}}
                    <td>Melaksanakan tugas sesuai dengan Sistem Manajemen Krakatau Steel (SMKS) dan peraturan/kebijakan
                        yang berlaku baik internal (Prosedur, WI, SOP, PKB) maupun eksternal (Perpres, Permen, Kepmen,
                        dll) untuk menghasilkan kualitas kerja yang tinggi dan memenuhi standar yang ditetapkan.
                    </td>
                    <td>Pelaksanaan kerja sesuai proses bisnis perusahaan serta peraturan yang berlaku
                    </td>
                </tr>
            </table>
            <h3>IV. DIMENSI (Dimensions)</h3>
            <table border="1" width="100%">
                <tr>
                    <td width="40%">b. Non Finansial (Non Financial)

                    </td>
                    <td align="center">:</td><td>{{$item->nonfinansial}}</td>
                </tr>
                <tr>
                    <td>a. Finansial (Financial)
                    </td>
                    <td align="center">:</td><td>{{$item->finansial}}</td>
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
                    <td align="center"><img  src="{{ url('storage/'.$item->gambar) }}" /></td>
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
                    <td align="center"><br><br><br>@if($item->approveodhcp==1)<p><b>APPROVED</b></p>@endif<br>{{$item->approve}}</td>
                    <td align="center"><br><br><br>@if($item->approveuser==1)<p><b>APPROVED</b></p>@endif<br>{{$item->namauser}}</td>
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
    <br>
    <div class="box box-warning" >
            <div class="box-body" >
                   
                   @foreach ($profil as $prof)
                   
                <table width="100%" >
                    <tr>
                        <td width="33%"><img  src="{{ url('img/logo.png') }}" height="70" width="130" /></td>
                        <td width="33%" align="center" valign="bottom"><strong>PROFILE JABATAN</strong></td>
                        <td width="33%" align="right">
                            <table frame="box" width="100%">
                                <tr><td>No. Issue</td><td>:</td><td>01</td></tr>
                                <tr><td>No. RS</td><td>:</td><td>RS/PO00/010</td></tr>
                                <tr><td>Tgl.</td><td>:</td><td>{{date("d/m/Y")}}</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table frame="box" width="100%" cellpadding="10">
                    <tr>
                        <td width="50%">
                            <table cellpadding="20">
                                <tr>
                                    <td>NAMA POSISI</td><td>:</td><td><b>{{$prof->namajabatan}}</b></td>
                                </tr>
                                <tr>
                                    <td>GOLONGAN</td><td>:</td><td>{{$prof->golongan}}</td>
                                </tr>
                                <tr>
                                    <td>NO. JABATAN</td><td>:</td><td>{{$prof->nojabatan}}</td>
                                </tr>
                            </table>
                        </td>
                        <td width="50%">
                            <table cellpadding="20">
                                    <tr>
                                        <td>ABREVIATION NO.</td><td>:</td><td>{{$prof->noorg}}</td>
                                    </tr>
                                    <tr>
                                        <td>UNIT kerja</td><td>:</td><td>{{$prof->unitkerja}}</td>
                                    </tr>
                                    <tr>
                                        <td>JOB GROUP</td><td>:</td><td>{{$prof->jobgroup}}</td>
                                    </tr>
                                </table>
                        </td>
                    </tr>
                </table><br>@endforeach
                <table frame="box" width="100%" >
                    <tr>
                        <td align="center" style="padding:5px;"><b>KOMPETENSI</b></td>
                    </tr>
                </table><br>
                <table border="1" width="100%">
                    <tr style="color: #fff; background: black;text-align:center;padding:5px;">
                        <th style="padding:5px;">NO</th><th style="padding:5px;">GROUP ASPEK</th><th style="padding:5px;">NAMA KOMPETENSI</th><th style="padding:5px;">PROFISIENSI</th>
                    </tr>
                    <?php $no=0;?>
                    @foreach ($profil_d as $profd)
                    <?php $no++;?>
                    <tr>
                        <td align="center">{{$no}}</td><td>{{$profd->groupaspek}}</td><td>{{$profd->namakompetensi}}</td><td>{{$profd->proficiency}}</td>
                    </tr>
                    @endforeach

                </table><br>
                @foreach ($data as $itemx)
                <table border="1" width="100%">
                    <tr>
                        <td align="center">Disiapkan Oleh</td><td colspan="2" align="center">Menyetujui</td>
                    </tr>
                    <tr>
                        <td align="center" width="33%"><br><br>@if($itemx->approveanalis==1)<p><b>APPROVED</b></p>@endif<br>{{$itemx->analis}}</td>
                        <td align="center" width="33%"><br><br><br>@if($itemx->approveodhcp==1)<p><b>APPROVED</b></p>@endif<br>{{$itemx->approve}}</td>
                        <td align="center" width="33%"><br><br><br>@if($itemx->approveuser==1)<p><b>APPROVED</b></p>@endif<br>{{$itemx->namauser}}</td>
                    </tr>
                    <tr>
                        <td align="center">{{$itemx->jabanalis}}</td>
                        <td align="center">{{$itemx->jabapprove}}</td>
                        <td align="center">{{$itemx->jabuser}}</td>
                    </tr>
                </table>
                @endforeach
            </div>
    </div>
</div>
</section>
</section>
@endsection
















</div>