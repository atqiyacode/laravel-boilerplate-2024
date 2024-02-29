<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">Nalabelme</th>
            <th style="font-weight: bold;">Description</th>
            <th style="font-weight: bold;">icon</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->label }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->icon }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
