<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">NIK</th>
            <th style="font-weight: bold;">Nama Lengkap</th>
            <th style="font-weight: bold">nama kegiatan</th>
            <th style="font-weight: bold">nama perusahaan</th>
            <th style="font-weight: bold">lokasi kegiatan</th>
            <th style="font-weight: bold">pengguna jasa</th>
            <th style="font-weight: bold">uraian tugas</th>
            <th style="font-weight: bold">waktu pelaksanaan mulai</th>
            <th style="font-weight: bold">waktu pelaksanaan selesai</th>
            <th style="font-weight: bold">posisi penugasan</th>
            <th style="font-weight: bold">status kepegawaian</th>
            <th style="font-weight: bold">foto surat referensi</th>
            <th style="font-weight: bold">note</th>
            <th style="font-weight: bold">Pendidikan</th>
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
                <td>{{ $item->nama_perusahaan }}</td>
                <td>{{ $item->lokasi_kegiatan }}</td>
                <td>{{ $item->pengguna_jasa }}</td>
                <td>{{ $item->uraian_tugas }}</td>
                <td>{{ $item->waktu_pelaksanaan_mulai }}</td>
                <td>{{ $item->waktu_pelaksanaan_selesai }}</td>
                <td>{{ $item->posisi_penugasan }}</td>
                <td>{{ $item->status_kepegawaian }}</td>
                <td>{{ $item->foto_surat_referensi }}</td>
                <td>{{ $item->note }}</td>
                <td>{{ $item->levelOfEducation->name }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
