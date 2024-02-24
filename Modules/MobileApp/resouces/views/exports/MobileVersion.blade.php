<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">version</th>
            <th style="font-weight: bold;">version_code</th>
            <th style="font-weight: bold;">Status</th>
            <th style="font-weight: bold;">note</th>
            <th style="font-weight: bold;">device</th>
            <th style="font-weight: bold;">package_file</th>
            <th style="font-weight: bold;">download_link</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->version }}</td>
                <td>{{ $item->version_code }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->note }}</td>
                <td>{{ $item->device }}</td>
                <td>{{ $item->package_file }}</td>
                <td>{{ $item->download_link }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
