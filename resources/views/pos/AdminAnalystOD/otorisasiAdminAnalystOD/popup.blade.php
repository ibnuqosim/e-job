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
                <tbody id="uno">
                  
                </tbody>
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
@endforeach