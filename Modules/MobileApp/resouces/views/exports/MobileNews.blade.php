<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">title</th>
            <th style="font-weight: bold;">content</th>
            <th style="font-weight: bold;">Status</th>
            <th style="font-weight: bold;">cover</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->content }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->cover }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
