<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">device token</th>
            <th style="font-weight: bold;">user</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->device_token }}</td>
                <td>{{ $item->user->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
