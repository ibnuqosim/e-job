<div style="display : none">
@foreach ($data as $item)
    <div id="print{{$item->id}}">
        <table width=50% id="example2" class="table table-bordered table-hover">
                <tr>
                    <th width=50%>Record Sheet No</td>
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