<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">title</th>
            <th style="font-weight: bold;">type</th>
            <th style="font-weight: bold;">project->name</th>
            <th style="font-weight: bold;">position->name</th>
            <th style="font-weight: bold;">open_date</th>
            <th style="font-weight: bold;">close_date</th>
            <th style="font-weight: bold;">job_application_count</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->project->name }}</td>
                <td>{{ $item->position->name }}</td>
                <td>{{ $item->open_date }}</td>
                <td>{{ $item->close_date }}</td>
                <td>{{ $item->job_application_count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
