<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">NIK</th>
            <th style="font-weight: bold;">Nama Lengkap</th>
            <td style="font-weight: bold;">date of activity</td>
            <td style="font-weight: bold;">detail</td>
            <td style="font-weight: bold;">attachment</td>
            <td style="font-weight: bold;">note</td>
            <td style="font-weight: bold;">typeOfActivity</td>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->employee->nik }}</td>
                <td>{{ $item->employee->full_name }}</td>
                <td>{{ $item->date_of_activity }}</td>
                <td>{{ $item->detail }}</td>
                <td>{{ $item->attachment }}</td>
                <td>{{ $item->note }}</td>
                <td>{{ $item->typeOfActivity->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
