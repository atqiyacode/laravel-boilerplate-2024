<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">NIK</th>
            <th style="font-weight: bold;">Nama Lengkap</th>

            <td style="font-weight: bold;">project</td>
            <td style="font-weight: bold;">nama paket</td>
            <td style="font-weight: bold;">kode sirup</td>
            <td style="font-weight: bold;">nomor permohonan pengadaan</td>
            <td style="font-weight: bold;">tanggal permohonan pengadaan</td>
            <td style="font-weight: bold;">no und dpl</td>
            <td style="font-weight: bold;">tanggal und dpl</td>
            <td style="font-weight: bold;">no ba hpl</td>
            <td style="font-weight: bold;">tanggal ba hpl</td>
            <td style="font-weight: bold;">no sppbj</td>
            <td style="font-weight: bold;">tanggal sppbj</td>
            <td style="font-weight: bold;">no spk</td>
            <td style="font-weight: bold;">tanggal spk</td>
            <td style="font-weight: bold;">no spmk</td>
            <td style="font-weight: bold;">tanggal spmk</td>
            <td style="font-weight: bold;">no adendum spk</td>
            <td style="font-weight: bold;">tanggal adendum spk</td>
            <td style="font-weight: bold;">kegiatan</td>
            <td style="font-weight: bold;">sub kegiatan</td>
            <td style="font-weight: bold;">penugasan</td>
            <td style="font-weight: bold;">status</td>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->employee->nik }}</td>
                <td>{{ $item->employee->full_name }}</td>

                <td>{{ $item->project->name }}</td>

                <td>{{ $item->nama_paket }}</td>
                <td>{{ $item->kode_sirup }}</td>
                <td>{{ $item->nomor_permohonan_pengadaan }}</td>
                <td>{{ $item->tanggal_permohonan_pengadaan }}</td>
                <td>{{ $item->no_und_dpl }}</td>
                <td>{{ $item->tanggal_und_dpl }}</td>
                <td>{{ $item->no_ba_hpl }}</td>
                <td>{{ $item->tanggal_ba_hpl }}</td>
                <td>{{ $item->no_sppbj }}</td>
                <td>{{ $item->tanggal_sppbj }}</td>
                <td>{{ $item->no_spk }}</td>
                <td>{{ $item->tanggal_spk }}</td>
                <td>{{ $item->no_spmk }}</td>
                <td>{{ $item->tanggal_spmk }}</td>
                <td>{{ $item->no_adendum_spk }}</td>
                <td>{{ $item->tanggal_adendum_spk }}</td>
                <td>{{ $item->kegiatan }}</td>
                <td>{{ $item->sub_kegiatan }}</td>
                <td>{{ $item->penugasan }}</td>
                <td>{{ $item->status }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
