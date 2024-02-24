<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">NIK</th>
            <th style="font-weight: bold;">Nama Lengkap</th>
            <th style="font-weight: bold;">Nama Keluarga</th>
            <th style="font-weight: bold;">No. Telephone</th>
            <th style="font-weight: bold;">Alamat</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->applicantResume->nik }}</td>
                <td>{{ $item->applicantResume->nama_lengkap }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->address }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
