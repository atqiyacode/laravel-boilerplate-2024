<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">NIK</th>
            <th style="font-weight: bold;">Nama Lengkap</th>
            <th style="font-weight: bold;">Foto KTP</th>
            <th style="font-weight: bold;">Foto Pasfoto</th>
            <th style="font-weight: bold;">Foto Selfie</th>
            <th style="font-weight: bold;">Foto KSWP</th>
            <th style="font-weight: bold;">Foto CV</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->applicantResume->nik }}</td>
                <td>{{ $item->applicantResume->nama_lengkap }}</td>
                <td>{{ $item->foto_ktp }}</td>
                <td>{{ $item->foto_pasfoto }}</td>
                <td>{{ $item->foto_selfie }}</td>
                <td>{{ $item->foto_kswp }}</td>
                <td>{{ $item->foto_cv }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
