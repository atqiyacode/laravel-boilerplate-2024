<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">uuid</th>
            <th style="font-weight: bold;">connection</th>
            <th style="font-weight: bold;">queue</th>
            <th style="font-weight: bold;">payload</th>
            <th style="font-weight: bold;">exception</th>
            <th style="font-weight: bold;">failed_at</th>

            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->uuid }}</td>
                <td>{{ $item->connection }}</td>
                <td>{{ $item->queue }}</td>
                <td>{{ $item->payload }}</td>
                <td>{{ $item->exception }}</td>
                <td>{{ $item->failed_at }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
