<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <td style="font-weight: bold;">name</td>
            <td style="font-weight: bold;">guard_name</td>
            <td style="font-weight: bold;">permission_count</td>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->guard_name }}</td>
                <td>{{ $item->permission_count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
