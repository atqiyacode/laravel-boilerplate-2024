<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">title</th>
            <th style="font-weight: bold;">message</th>
            <th style="font-weight: bold;">image</th>
            <th style="font-weight: bold;">attachment</th>
            <th style="font-weight: bold;">notificationType->name</th>
            <th style="font-weight: bold;">created by</th>
            <th style="font-weight: bold;">Jumlah Karyawan</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->message }}</td>
                <td>{{ $item->image }}</td>
                <td>{{ $item->attachment }}</td>
                <td>{{ $item->notificationType->name }}</td>
                <td>{{ $item->user->email }}</td>
                <td>{{ $item->employees_count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
