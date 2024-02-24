<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">NIK</th>
            <th style="font-weight: bold;">Nama Lengkap</th>
            <th style="font-weight: bold;">ptn pts</th>
            <th style="font-weight: bold;">nama institusi</th>
            <th style="font-weight: bold;">fakultas</th>
            <th style="font-weight: bold;">jurusan</th>
            <th style="font-weight: bold;">npm</th>
            <th style="font-weight: bold;">ipk</th>
            <th style="font-weight: bold;">no ijazah</th>
            <th style="font-weight: bold;">tahun masuk</th>
            <th style="font-weight: bold;">tahun lulus</th>
            <th style="font-weight: bold;">status berkas</th>
            <th style="font-weight: bold;">status kelulusan</th>
            <th style="font-weight: bold;">foto ijazah</th>
            <th style="font-weight: bold;">foto transkrip nilai</th>
            <th style="font-weight: bold;">link dikti</th>
            <th style="font-weight: bold;">foto screenshot dikti</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->applicantResume->nik }}</td>
                <td>{{ $item->applicantResume->nama_lengkap }}</td>
                <td>{{ $item->ptn_pts }}</td>
                <td>{{ $item->nama_institusi }}</td>
                <td>{{ $item->fakultas }}</td>
                <td>{{ $item->jurusan }}</td>
                <td>{{ $item->npm }}</td>
                <td>{{ $item->ipk }}</td>
                <td>{{ $item->no_ijazah }}</td>
                <td>{{ $item->tahun_masuk }}</td>
                <td>{{ $item->tahun_lulus }}</td>
                <td>{{ $item->status_berkas }}</td>
                <td>{{ $item->status_kelulusan }}</td>
                <td>{{ $item->foto_ijazah }}</td>
                <td>{{ $item->foto_transkrip_nilai }}</td>
                <td>{{ $item->link_dikti }}</td>
                <td>{{ $item->foto_screenshot_dikti }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
