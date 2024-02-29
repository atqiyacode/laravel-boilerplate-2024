<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">Name</th>
            <th style="font-weight: bold;">Jumlah Karyawan</th>
            <th style="font-weight: bold;">Jumlah Pelamar</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->employees_count }}</td>
                <td>{{ $item->applicants_count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
