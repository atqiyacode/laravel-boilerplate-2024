<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">log type</th>
            <th style="font-weight: bold;">table name</th>
            <th style="font-weight: bold;">data</th>
            <th style="font-weight: bold;">log date</th>
            <th style="font-weight: bold;">user</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->log_type }}</td>
                <td>{{ $item->table_name }}</td>
                <td>{{ $item->data }}</td>
                <td>{{ $item->log_date }}</td>
                <td>{{ $item->user->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
