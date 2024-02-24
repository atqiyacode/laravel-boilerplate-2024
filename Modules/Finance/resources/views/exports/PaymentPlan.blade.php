<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">period</th>
            <th style="font-weight: bold;">name_of_kak</th>
            <th style="font-weight: bold;">number_of_members</th>
            <th style="font-weight: bold;">time_peroid</th>
            <th style="font-weight: bold;">work_start_date</th>
            <th style="font-weight: bold;">end_start_date</th>
            <th style="font-weight: bold;">unit</th>
            <th style="font-weight: bold;">schema</th>
            <th style="font-weight: bold;">petition</th>
            <th style="font-weight: bold;">dispotition</th>
            <th style="font-weight: bold;">rpp</th>
            <th style="font-weight: bold;">bahp</th>
            <th style="font-weight: bold;">bast</th>
            <th style="font-weight: bold;">bapp</th>
            <th style="font-weight: bold;">spm</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->period }}</td>
                <td>{{ $item->name_of_kak }}</td>
                <td>{{ $item->number_of_members }}</td>
                <td>{{ $item->time_peroid }}</td>
                <td>{{ $item->work_start_date }}</td>
                <td>{{ $item->end_start_date }}</td>
                <td>{{ $item->unit->name }}</td>
                <td>{{ $item->schema }}</td>
                <td>{{ $item->petition }}</td>
                <td>{{ $item->dispotition }}</td>
                <td>{{ $item->rpp }}</td>
                <td>{{ $item->bahp }}</td>
                <td>{{ $item->bast }}</td>
                <td>{{ $item->bapp }}</td>
                <td>{{ $item->spm }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
