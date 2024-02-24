<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">position</th>
            <th style="font-weight: bold;">working_area</th>
            <th style="font-weight: bold;">approval1</th>
            <th style="font-weight: bold;">approval2</th>

            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->position->name }}</td>
                <td>{{ $item->working_area->name }}</td>
                <td>{{ $item->approval1->name }}</td>
                <td>{{ $item->approval2->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
