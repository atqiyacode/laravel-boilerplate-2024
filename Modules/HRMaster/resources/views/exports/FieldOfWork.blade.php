<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">Name</th>
            <th style="font-weight: bold;">Description</th>
            <th style="font-weight: bold;">Status</th>
            <th style="font-weight: bold;">Jumlah Karyawan</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->employees_count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
