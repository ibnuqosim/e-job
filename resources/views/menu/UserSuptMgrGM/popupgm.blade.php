<script>
        function view_job(id) {
                $.ajax({
                    url: "{{ url('UserSuptMgrGM/getjobdescreate') }}/" + id,
                    method: 'get',
                    success: function (data) {
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
                        $('#finansial').val(data.item[0].finansial);
                        $('#nonfinansial').val(data.item[0].nonfinansial);
        
                        // untuk mengambil table dari profil
                        $('#namajabatan').val(data.profil[0].namajabatan);
                        $('#golongan').val(data.profil[0].golongan);
                        $('#nojabatan').val(data.profil[0].nojabatan);
                        $('#noorg').val(data.profil[0].noorg);
                        $('#unitkerja').val(data.profil[0].unitkerja);
                        $('#jobgroup').val(data.profil[0].jobgroup);
        
                        console.log(data.job.length);
                        var no ='-';
                        var html = '';
                            html+=':';
                        for (i = 0; i < data.job.length; i++) {
                            //no++;
                            html += ' <table width="100%"><tr><td>' + no + '</td><td>' + data.job[i].jabatanbawahanlangsung + '</td><td>' + data.job[i].jumlah + '</td></tr></table>';
                        }
                        $('#jbl').html(html);
        
                        var no2 = 0;
                        var html2 = '';
                        for (i = 0; i < data.jobres.length; i++) {
                            no++;
                            html2 += '<tr><td colspan="4">' + data.jobres[i].keterangan +' '+data.jobres[i].object +'</td><td colspan="3">' + data.jobres[i].indikator + '</td></tr>';
                        }
                        $('#uno').html(html2);
                        // }
        
                        var no3 = 0;
                        var int = '';
                        var halint='';
                        var eks='';
                        var haleks='';
                        for (i = 0; i < data.unit.length; i++) {
                            no++;
                            //html3 += '<tr><td>' + data.unit[i].id_emp_cskt_ltext + '</td><td>' + data.unit[i].id_hal_internal + '</td><td>' + data.unit[i].id_eksternal + '</td><td>' + data.unit[i].id_hal_external + '</td></tr>';
                            int+='-'+data.unit[i].id_emp_cskt_ltext;
                            halint+='-'+data.unit[i].id_hal_internal;
                            eks+='-'+data.unit[i].id_hal_external;
                            haleks+='-'+data.unit[i].id_eksternal;
                        }
                        $('#in').html(int);
                        $('#halin').html(halint);
                        $('#eks').html(eks);
                        $('#haleks').html(haleks);
        
                        var no4 = 0;
                        var html4 = '';
                        for (i = 0; i < data.tools.length; i++) {
                            no++;
                            //html4 += '<tr><td>' + data.tools[i].id_deskripsi + '</td></tr>';
                            html4+='-'+data.tools[i].id_deskripsi;
                        }
                        $('#tools').html(html4);
        
                        var no5 = 0;
                        var html5 = '';
                        for (i = 0; i < data.mat.length; i++) {
                            no++;
                           // html5 += '<tr><td>' + data.mat[i].id_deskripsi + '</td></tr>';
                            html5+='-'+data.mat[i].id_deskripsi;
                        }
                        $('#mat').html(html5);
        
                        var no6 = 0;
                        var html6 = '';
                        for (i = 0; i < data.co.length; i++) {
                            no++;
                            //html6 += '<tr><td>' + data.co[i].id_deskripsi + '</td></tr>';
                            html6+='-'+data.co[i].id_deskripsi;
                        }
                        $('#co').html(html6);
        
                        var no7 = 0;
                        var html7 = '';
                        for (i = 0; i < data.pen.length; i++) {
                            no++;
                            html7 += '<tr><td>' + data.pen[i].id_jenjang + '</td></tr>';
                        }
                        $('#pen').html(html7);
        
                        var no8 = 0;
                        var html8 = '';
                        for (i = 0; i < data.ker.length; i++) {
                            no++;
                            html8 += '<tr><td>' + data.ker[i].id_keterangan + '</td></tr>';
                        }
                        $('#ker').html(html8);
        
                        var no9 = 0;
                        var html9 = '';
                        for (i = 0; i < data.profil_d.length; i++) {
                            no9++;
                            html9 += '<tr><td>' + no9 + '</td><td>' + data.profil_d[i].groupaspek + '</td><td>' + data.profil_d[i].namakompetensi + '</td><td>' + data.profil_d[i].proficiency + '</td></tr>';
                        }
                        $('#profil_d').html(html9);
        
                        var no10 = 0;
                        var html10 = '';
                        for (i = 0; i < data.fisik.length; i++) {
                            no++;
                            html10 += '<tr><td>' + data.fisik[i].id_persyaratan + '</td></tr>';
                        }
                        $('#fisik').html(html10);
                    }
        
                });
            }
        </script>
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
{{-- @foreach ($tj as $item)
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
            <table id="example1" class="table table-bordered table-striped" style="color:black">      
                <h5>URAIAN JABATAN (Job Description)</h5>
                <thead>
                   <tr>
                        <td width=40%>Record Sheet No</td>
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
                        <td width=40%>No. Jabatan (Job No.)</td>
                        <td>:</td>
                        <td width=60%>    
                            <input type="text" id="nojabatan" readonly class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Gol. Jabatan (Job Level):</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly class="form-control" id="LvlOrg" name="LvlOrg"  value="{{$item->gol_jabatan}}" size="70px">
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
                            <input type="text" readonly class="form-control" id="NameofOrgUnitDinas" name="NameofOrgUnitDinas" value="{{$item->dinas}}" size="70px">
                        </td>
                    </tr>
                    <tr>
                        <td>Divisi (Division)</td>
                        <td>:</td>
                        <td>    
                            <input type="text"readonly  class="form-control" id="NameofOrgUnitDivisi" name="NameofOrgUnitDivisi" size="70px" >
                        </td>
                    </tr>
                    <tr>
                        <td>Subdirektorat(Subdirectorate)</td>
                        <td>:</td>
                        <td> 
                            <input type="text" readonly class="form-control" id="NameofOrgUnitSubDirektorat" name="NameofOrgUnitSubDirektorat" value="{{$item->subdirektorat}}" size="70px">
                        </td>
                    </tr>
                    <tr>
                        <td>Direktorat (Directorate)</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly class="form-control"  id="NameofOrgUnitDirektorat" name="NameofOrgUnitDirektorat" value="{{$item->direktorat}}" size="70px">
                        </td>
                    </tr>
                    <tr>
                        <td>Bertanggung jawab langsung kepada: <br>
                            (Directly Responsible to)
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly class="form-control"  id="jabatanatasanlangsung" name="jabatanatasanlangsung" value="{{$item->job[0]->jabatanatasanlangsung}}" size="70px">
                        </td>
                    </tr>
                </thead>
            </table>
            <table id="example1" class="table table-bordered table-striped" style="color:black">
                <thead>
                    <tr>
                        <td>no</td>
                        <td>Jabatan yang diawasi langsung(Direct supervised positions)</td>
                        <td>jumlah</td>
                    </tr>
                    <tbody id="jbl"></tbody>
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
                        <th width=20%>Kata Kerja</th>
                        <th width=40%>Tanggung Jawab (Duties & Responsibilities)</th>
                        <th width=40%>Indikator Capaian (Performance Indicators)<th>
                    </tr>
                    
                </thead>
                <tbody id="uno"></tbody>
                <tr>
                    <td>
                        Melaksanakan setiap tugas dan tanggung jawab
                    </td>
                    <td>
                        Melaksanakan tugas sesuai dengan Sistem Manajemen Krakatau Steel (SMKS) 
                    </td>
                    <td>
                        Penghematan Unit Kerja
                    </td>
                </tr>
                <tr>
                    <td>
                        dengan memerhatikan aspek dan kondisi keuangan
                        perusahaan serta mendukung program penghematan perusahaan.
                    </td>
                    <td>
                        dan peraturan/kebijakan yang berlaku baik internal (Prosedur, WI, SOP, PKB) 
                        maupun eksternal (Perpres, Permen, Kepmen, dll) untuk menghasilkan kualitas kerja 
                        yang tinggi dan memenuhi standar yang ditetapkan.
                    </td> 
                    <td>
                        Pelaksanaan kerja sesuai proses bisnis perusahaan serta peraturan yang berlaku
                    </td>
                </tr>
            </table>
            <table id="example1" class="table table-bordered table-striped" style="color:black">
                <h5>IV. DIMENSI (Dimensions)</h5>
                <thead>
                    <tr>
                        <th>a. Finansial (Financial)</th>
                    </tr>
                    <tr>
                        <td>{{$item->finansial}}</td>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>b. Non Finansial (Non Financial)</th>
                    </tr>
                    <tr>
                        <td>{{$item->nonfinansial}}</td>
                    </tr>
                </thead>
            </table>
            <table id="example1" class="table table-bordered table-striped" style="color:black">
                <h5>WEWENANG</h5>
                @foreach ($item->jobdescreate_res as $item3)
                <thead>
                    <tr>
                        <td>{{$item3->id_met_kewenangan}}</td>
                    </tr>
                </thead>
                @endforeach
            </table>
            <table id="example1" class="table table-bordered table-striped" style="color:black">
                <h5>VI. HUBUNGAN KERJA (Work Relationship)</h5>
                <thead>
                    <h5>Unit Kerja (Work Unit)</h5>
                    <tr>
                        <th width=20%>a.Internal</th>
                        <th width=30%>Dalam Hal (Keterangan Internal)</th>
                        <th width=20%>b. Eksternal</th>
                        <th width=30%>Dalam Hal (Keterangan External)<th>
                    </tr>
                </thead>
                <tbody id="wowo">

                </tbody>
            </table>
            <table id="example1" class="table table-bordered table-striped" style="color:black">
                <h5>VII. ALAT,BAHAN,DAN LINGKUNGAN KERJA (Tools, Materials, and Conditions)</h5>
                <thead>
                    <tr>
                        <th>Alat Kerja</th>
                    </tr>
                </thead>
                <tbody id="tools"></tbody>
                <thead>
                    <tr>
                        <th>Bahan Kerja (Materials)</th>
                    </tr>
                </thead>
                <tbody id="mat"></tbody>
                <thead>
                    <tr>
                        <th>Lingk. Kerja (Conditions)</th>
                    </tr>
                </thead>
                    <tbody id="co"></tbody>
            </table>
            <table id="example1" class="table table-bordered table-striped" style="color:black">
                <h5>VIII. PERSYARATAN JABATAN (Job Spesifications)</h5>
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
                    <tr>
                        <td>{{$item->persyaratan_fisik}}</td>
                    </tr>
                </thead>
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
@endforeach --}}