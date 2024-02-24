<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">NIK</th>
            <th style="font-weight: bold;">Nama Lengkap</th>

            <th style="font-weight: bold;">tempat lahir</th>
            <th style="font-weight: bold;">tanggal lahir</th>
            <th style="font-weight: bold;">alamat domisili</th>
            <th style="font-weight: bold;">alamat ktp</th>
            <th style="font-weight: bold;">tentang diri</th>
            <th style="font-weight: bold;">other fields</th>
            <th style="font-weight: bold;">foto ktp</th>
            <th style="font-weight: bold;">foto npwp</th>
            <th style="font-weight: bold;">foto pasfoto</th>
            <th style="font-weight: bold;">foto selfie</th>
            <th style="font-weight: bold;">foto kswp</th>
            <th style="font-weight: bold;">foto cv</th>

            <th style="font-weight: bold;">user email</th>
            <th style="font-weight: bold;">religion</th>
            <th style="font-weight: bold;">gender</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->tempat_lahir }}</td>
                <td>{{ $item->tanggal_lahir }}</td>
                <td>{{ $item->alamat_domisili }}</td>
                <td>{{ $item->alamat_ktp }}</td>
                <td>{{ $item->tentang_diri }}</td>
                <td>{{ $item->other_fields }}</td>
                <td>{{ $item->foto_ktp }}</td>
                <td>{{ $item->foto_npwp }}</td>
                <td>{{ $item->foto_pasfoto }}</td>
                <td>{{ $item->foto_selfie }}</td>
                <td>{{ $item->foto_kswp }}</td>
                <td>{{ $item->foto_cv }}</td>

                <td>{{ $item->user->username }}</td>
                <td>{{ $item->religion->name }}</td>
                <td>{{ $item->gender->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
