<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">Name</th>
            <th style="font-weight: bold;">note</th>
            <th style="font-weight: bold;">fieldOfWork</th>

            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->note }}</td>
                <td>{{ $item->fieldOfWork->name }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
