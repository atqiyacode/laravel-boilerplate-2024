<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">Token Code</th>
            <th style="font-weight: bold;">Expired</th>
            <th style="font-weight: bold;">User Name</th>
            <th style="font-weight: bold;">User Email</th>
            <th style="font-weight: bold;">Verification Code Type</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->token_code }}</td>
                <td>{{ $item->expired_at }}</td>
                <td>{{ $item->user->email }}</td>
                <td>{{ $item->verificationCodeType->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
