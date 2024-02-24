<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">has_use</th>
            <th style="font-weight: bold;">limit</th>
            <th style="font-weight: bold;">total</th>
            <th style="font-weight: bold;">note</th>
            <th style="font-weight: bold;">employee nik</th>
            <th style="font-weight: bold;">employee name</th>

            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->has_use }}</td>
                <td>{{ $item->limit }}</td>
                <td>{{ $item->total }}</td>
                <td>{{ $item->note }}</td>
                <td>{{ $item->employee->nik }}</td>
                <td>{{ $item->employee->full_name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
