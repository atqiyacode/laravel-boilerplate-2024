<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">user</th>
            <th style="font-weight: bold;">jobVacancy</th>
            <th style="font-weight: bold;">applicantResume</th>
            <th style="font-weight: bold;">status</th>
            <th style="font-weight: bold;">keterangan</th>
            <th style="font-weight: bold;">referal</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user }}</td>
                <td>{{ $item->jobVacancy }}</td>
                <td>{{ $item->applicantResume }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->referal }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
