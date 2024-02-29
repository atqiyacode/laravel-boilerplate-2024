<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">Name</th>
            <th style="font-weight: bold;">Description</th>
            <th style="font-weight: bold;">Status</th>
            <th style="font-weight: bold;">start_date</th>
            <th style="font-weight: bold;">end_date</th>
            <th style="font-weight: bold;">max_apply</th>
            <th style="font-weight: bold;">job_vacancies_count</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->start_date }}</td>
                <td>{{ $item->end_date }}</td>
                <td>{{ $item->max_apply }}</td>
                <td>{{ $item->job_vacancies_count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
