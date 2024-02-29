<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">typeOfPermit</th>
            <th style="font-weight: bold;">permitStatus</th>
            <th style="font-weight: bold;">employee</th>
            <th style="font-weight: bold;">start_date</th>
            <th style="font-weight: bold;">end_date</th>
            <th style="font-weight: bold;">note</th>
            <th style="font-weight: bold;">days</th>
            <th style="font-weight: bold;">flow_status</th>

            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->typeOfPermit->name }}</td>
                <td>{{ $item->permitStatus->name }}</td>
                <td>{{ $item->employee->full_name }}</td>
                <td>{{ $item->start_date }}</td>
                <td>{{ $item->end_date }}</td>
                <td>{{ $item->days }}</td>
                <td>{{ $item->note }}</td>
                <td>{{ $item->flow_status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
