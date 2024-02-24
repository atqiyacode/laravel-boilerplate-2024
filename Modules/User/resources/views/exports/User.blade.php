<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <td style="font-weight: bold;">name</td>
            <td style="font-weight: bold;">username</td>
            <td style="font-weight: bold;">email</td>
            <td style="font-weight: bold;">api key</td>
            <td style="font-weight: bold;">is verified</td>
            <td style="font-weight: bold;">roles</td>
            <td style="font-weight: bold;">permissions</td>
            <td style="font-weight: bold;">is employee</td>
            <td style="font-weight: bold;">is applicant</td>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->api_key }}</td>
                <td>{{ $item->is_verified }}</td>
                <td>{{ $item->roles }}</td>
                <td>{{ $item->permissions }}</td>
                <td>{{ $item->is_employee }}</td>
                <td>{{ $item->is_applicant }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
