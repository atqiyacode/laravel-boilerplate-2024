<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">NIK</th>
            <th style="font-weight: bold;">Nama Lengkap</th>
            <th style="font-weight: bold;">check_date</th>
            <th style="font-weight: bold;">check_in</th>
            <th style="font-weight: bold;">check_out</th>
            <th style="font-weight: bold;">photo_check_in</th>
            <th style="font-weight: bold;">photo_check_out</th>
            <th style="font-weight: bold;">location_check_in</th>
            <th style="font-weight: bold;">location_check_out</th>
            <th style="font-weight: bold;">note</th>

            <th style="font-weight: bold;">month</th>
            <th style="font-weight: bold;">date</th>

            <th style="font-weight: bold;">full_date</th>

            <th style="font-weight: bold;">tanggal_formated</th>
            <th style="font-weight: bold;">detail</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->employee->nik }}</td>
            <td>{{ $item->employee->full_name }}</td>
            <td>{{ $item->check_date }}</td>
            <td>{{ $item->check_in }}</td>
            <td>{{ $item->check_out }}</td>
            <td>{{ $item->photo_check_in }}</td>
            <td>{{ $item->photo_check_out }}</td>
            <td>{{ $item->location_check_in }}</td>
            <td>{{ $item->location_check_out }}</td>
            <td>{{ $item->note }}</td>

            <td>{{ $item->month }}</td>
            <td>{{ $item->date }}</td>

            <td>{{ $item->full_date }}</td>

            <td>{{ $item->tanggal_formated }}</td>
            <td>{{ $item->detail }}</td>
            <!-- Add more columns as needed -->
        </tr>
    @endforeach
</table>
