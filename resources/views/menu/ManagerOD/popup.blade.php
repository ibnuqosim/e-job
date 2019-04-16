<script>
    function view_job(id) {
            $.ajax({
                url: "{{ url('ManagerOD/getjobdescreate') }}/" + id,
                method: 'get',
                success: function (data) {
                    // console.log(data);
                    // console.log(data.item);
                    // console.log(data.job);
                    console.log(data.jobres);
    
    
                    //alert(data[0].id);
                    $('#nojabatantd').html(data.item[0].no_jabatan);
                    $('#goljabatantd').html(data.item[0].gol_jabatan);
                    $('#namajabatantd').html(data.item[0].name_jabatan);
                    $('#dinastd').html(data.item[0].dinas);
                    $('#divisitd').html(data.item[0].divisi);
                    $('#subdirtd').html(data.item[0].subdirektorat);
                    $('#jabatasantd').html(data.item[0].direktorat);
                    $('#jobroletd').html(data.item[0].jobrole);
                    
                    
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
                    //wewenang
                    var nowew =0;
                    var wewen ='';
                    wewen+='<table>';
                    for(i = 0; i < data.jobres.length; i++){
                        nowew++;
                        
                        wewen+='<tr><td>'+nowew+'. </td><td> '+data.jobres[i].id_met_kewenangan+'</td></tr>';
                    }
                    wewen+='</table>';
                    $('#wewenang').html(wewen);
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
                                                <td id="nojabatantd"></td>
                                                <td >Gol.Jabatan (Job Level) :</td>
                                                <td align="center" id="goljabatantd"></td>
                                            </tr>
                                            <tr class="isi">
                                                <td width="25%">Nama Jabatan (Job Name)</td>
                                                <td align="center" width="2%">:</td>
                                                <td colspan="3" id="namajabatantd"></td>
                                            </tr>
                                            <tr class="isi">
                                                <td width="25%">Dinas (Official)</td>
                                                <td align="center" width="2%">:</td>
                                                <td colspan="3" id="dinastd"></td>
                                            </tr>
                                            <tr class="isi">
                                                <td width="25%">Divisi (Division)</td>
                                                <td align="center" width="2%">:</td>
                                                <td colspan="3" id="divisitd"></td>
                                            </tr>
                                            <tr class="isi">
                                                <td width="25%">Subdirektorat (Subdirectorate)</td>
                                                <td align="center" width="2%">:</td>
                                                <td colspan="3" id="subdirtd"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="7">
                                                    <table width="100%">
                                                        <tr class="isi">
                                                            <td width="26%">Bertanggung jawab langsung kepada<br>(Directly Responsible to)</td>
                                                            <td id="jabatasantd">:</td>
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
                                    <td colspan="7" class="isi" id="jobroletd"></td>
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
                                        <td colspan="7" class="isi" id="wewenang">
                                            {{-- <table width="100%" border="0">
                                                <?php $no=1; ?>
                                                @foreach ($item->jobdescreate_res as $item3)
                                
                                                <tr class="isi">
                                                    <td width="5%">{{$no}}</td>
                                                    <td>{{$item3->id_met_kewenangan}}</td>
                                                </tr>
                                                <?php $no++; ?>
                                                @endforeach
                                            </table> --}}
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
                                <input type="text" readonly class="form-control" id="nojabatan" name="nojabatan" size="70px">
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