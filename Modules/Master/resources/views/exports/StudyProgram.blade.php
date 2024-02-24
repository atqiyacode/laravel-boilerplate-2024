<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <td style="font-weight: bold;">name</td>
            <td style="font-weight: bold;">id_prodi</td>
            <td style="font-weight: bold;">kode_prodi</td>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->id_prodi }}</td>
                <td>{{ $item->kode_prodi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
