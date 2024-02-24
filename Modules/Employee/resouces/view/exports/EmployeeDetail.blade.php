<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">NIK</th>
            <th style="font-weight: bold;">Nama Lengkap</th>
            <th style="font-weight: bold;">id card</th>
            <th style="font-weight: bold;">npwp</th>
            <th style="font-weight: bold;">account number</th>
            <th style="font-weight: bold;">online attendance</th>

            <th style="font-weight: bold;">tipe penyedia jasa</th>
            <th style="font-weight: bold;">kontrak ke</th>
            <th style="font-weight: bold;">status personil</th>
            <th style="font-weight: bold;">tanggal mulai kerja</th>
            <th style="font-weight: bold;">harga satuan</th>
            <th style="font-weight: bold;">bulan kerja</th>
            <th style="font-weight: bold;">total nilai spk</th>
            <th style="font-weight: bold;">harga spk</th>
            <th style="font-weight: bold;">terbilang spk</th>
            <th style="font-weight: bold;">tanggal selesai kerja</th>
            <th style="font-weight: bold;">keterangan status</th>
            <th style="font-weight: bold;">tanggal efektif keterangan status</th>
            <th style="font-weight: bold;">jumlah izin</th>
            <th style="font-weight: bold;">tanggal pengajuan surat resign</th>
            <th style="font-weight: bold;">tanggal efektif berhenti kerja</th>
            <th style="font-weight: bold;">keterangan</th>
            <th style="font-weight: bold;">tahap</th>
            <th style="font-weight: bold;">status</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->employee->nik }}</td>
                <td>{{ $item->employee->full_name }}</td>

                <td>{{ $item->id_card }}</td>
                <td>{{ $item->npwp }}</td>
                <td>{{ $item->account_number }}</td>
                <td>{{ $item->online_attendance }}</td>

                <td>{{ $item->tipe_penyedia_jasa }}</td>
                <td>{{ $item->kontrak_ke }}</td>
                <td>{{ $item->status_personil }}</td>
                <td>{{ $item->tanggal_mulai_kerja }}</td>
                <td>{{ $item->harga_satuan }}</td>
                <td>{{ $item->bulan_kerja }}</td>
                <td>{{ $item->total_nilai_spk }}</td>
                <td>{{ $item->harga_spk }}</td>
                <td>{{ $item->terbilang_spk }}</td>
                <td>{{ $item->tanggal_selesai_kerja }}</td>
                <td>{{ $item->keterangan_status }}</td>
                <td>{{ $item->tanggal_efektif_keterangan_status }}</td>
                <td>{{ $item->jumlah_izin }}</td>
                <td>{{ $item->tanggal_pengajuan_surat_resign }}</td>
                <td>{{ $item->tanggal_efektif_berhenti_kerja }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->tahap }}</td>
                <td>{{ $item->status }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
