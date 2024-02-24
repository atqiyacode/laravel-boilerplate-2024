<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">NIK</th>
            <th style="font-weight: bold;">Nama Lengkap</th>
            <th style="font-weight: bold;">Nama Kegiatan</th>
            <th style="font-weight: bold;">Tahun</th>
            <th style="font-weight: bold;">Penyelenggara</th>
            <th style="font-weight: bold;">Foto Sertifikat</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->employee->nik }}</td>
                <td>{{ $item->employee->full_name }}</td>
                <td>{{ $item->nama_kegiatan }}</td>
                <td>{{ $item->tahun }}</td>
                <td>{{ $item->penyelenggara }}</td>
                <td>{{ $item->foto_sertifikat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
