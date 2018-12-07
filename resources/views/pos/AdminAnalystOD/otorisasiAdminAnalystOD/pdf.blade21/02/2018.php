<div style="display : none">
    @foreach ($data as $item)
    <div id="print{{$item->id}}">
        <body>
            <img alt="Gambar Koala" src="{{ url('img/ks.png') }}"height="50" width="50" />
        </body>
        <body>
            <img alt="Gambar Koala" src="{{ url('img/kstulisan.png') }}"height="25" width="200" />
        </body><br><br>
        <table width=100% class="table table-bordered table-hover">
            <tr>
                <tr>
                    <td width="20%">Record Sheet No.</td>
                    <td width="5%">:</td>
                    <td width="20%">RS/PO01/001-ISSUE No.03</td>
                    <td width="30%">URAIAN JABATAN</td>
                    <td width="20%">Halaman</td>
                    <td width="5%">:</td>
                    <td width="20%">02</td>
                </tr>
                <tr>
                    <td>Issue Date</td>
                    <td>:</td>
                    <td>01/06/2010</td>
                    <td></td>
                    <td>Tanggal Berlaku</td>
                    <td>:</td>
                    <td>01/06/2010</td>
                </tr>
                <tr>
                    <td>Holder</td>
                    <td>:</td>
                    <td>Divisi OD&HCP</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
            </th>
        </table>
        <table width=100% class="table table-bordered table-hover">
            <tr>
                <tr>
                    <td width="20%">Nama Jabatan</td>
                    <td width="5%">:</td>
                    <td width="20%">Manager MRO Procurement</td>
                    <td width="30%">URAIAN JABATAN</td>
                    <td width="20%">Halaman</td>
                    <td width="5%">:</td>
                    <td width="20%">02</td>
                </tr>
                <tr>
                    <td>Dinas</td>
                    <td>:</td>
                    <td>01/06/2010</td>
                    <td></td>
                    <td>Tanggal Berlaku</td>
                    <td>:</td>
                    <td>01/06/2010</td>
                </tr>
                <tr>
                    <td>Divisi</td>
                    <td>:</td>
                    <td>Divisi OD&HCP</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Sub Direktorat</td>
                    <td>:</td>
                    <td>Divisi OD&HCP</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
            </th>
        </table>
        <table width=50% id="example2" class="table table-bordered table-hover">
            <tr>
                <th width=50%>Record Sheet Nok</td>
                    <td>:</td>
                    <th width=50%>RS/PO01/001-ISSUE No.3</td>
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
                    
                    <tr>
                        <td width=50%>Record Sheet No</td>
                        <td>:</td>
                        <td width=50%>RS/PO01/001-ISSUE No.3</td>
                    </tr>
                    <tr>
                        <td>No. Jabatan (Job No.)</td>
                        <td>:</td>
                        <td>{{ $item->no_jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Gol. Jabatan (Job Level):</td>
                        <td>:</td>
                        <td>{{ $item->name_jabatan }}</td>
                    </tr>
                    <tr>
                        <td>name Jabatan (Job Name)</td>
                        <td>:</td>
                        <td>{{ $item->gol_jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Dinas (Official)</td>
                        <td>:</td>
                        <td>{{ $item->dinas }}</td>
                    </tr>
                    <tr>
                        <td>Divisi (Official)</td>
                        <td>:</td>
                        <td>{{ $item->divisi }}</td>
                    </tr>
                    <tr>
                        <td>Direktorat (Directorate)</td>
                        <td>:</td>
                        <td>{{ $item->Directorate }}</td>
                    </tr>
                    <tr>
                        <td>Bertangung Jawab Langsung Kepada (Directly Responsible to)</td>
                        <td>:</td>
                        <td>{{ $item->pertangung }}</td>
                    </tr>
                </table>
            </div>
            @endforeach
            <div>
                
                {{-- jquery apande --}}