<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">NIK</th>
            <th style="font-weight: bold;">Nama Lengkap</th>
            <th style="font-weight: bold;">Nama</th>
            <th style="font-weight: bold;">Jabatan</th>
            <th style="font-weight: bold;">Hubungan</th>
            <th style="font-weight: bold;">No. Telephone</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->applicantResume->nik }}</td>
                <td>{{ $item->applicantResume->nama_lengkap }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->hubungan }}</td>
                <td>{{ $item->no_telf }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
