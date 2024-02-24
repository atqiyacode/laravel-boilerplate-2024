<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">NIK</th>
            <th style="font-weight: bold;">Nama Lengkap</th>
            <th style="font-weight: bold;">nama organisasi</th>
            <th style="font-weight: bold;">posisi</th>
            <th style="font-weight: bold;">jenis organisasi</th>
            <th style="font-weight: bold;">tahun mulai</th>
            <th style="font-weight: bold;">tahun selesai</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->employee->nik }}</td>
                <td>{{ $item->employee->full_name }}</td>
                <td>{{ $item->nama_organisasi }}</td>
                <td>{{ $item->posisi }}</td>
                <td>{{ $item->jenis_organisasi }}</td>
                <td>{{ $item->tahun_mulai }}</td>
                <td>{{ $item->tahun_selesai }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
