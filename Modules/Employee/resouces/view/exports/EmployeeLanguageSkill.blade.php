<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">NIK</th>
            <th style="font-weight: bold;">Nama Lengkap</th>
            <th style="font-weight: bold;">bahasa</th>
            <th style="font-weight: bold;">kemampuan lisan</th>
            <th style="font-weight: bold;">kemampuan tulisan</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->employee->nik }}</td>
                <td>{{ $item->employee->full_name }}</td>
                <td>{{ $item->bahasa }}</td>
                <td>{{ $item->kemampuan_lisan }}</td>
                <td>{{ $item->kemampuan_tulisan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
