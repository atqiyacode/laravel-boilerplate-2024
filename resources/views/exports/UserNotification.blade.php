<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <th style="font-weight: bold;">Name</th>
            <th style="font-weight: bold;">Archived</th>
            <th style="font-weight: bold;">Status</th>
            <th style="font-weight: bold;">Template Notification</th>
            <th style="font-weight: bold;">Template Message</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->archived }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->templateNotification->title }}</td>
                <td>{{ $item->templateNotification->message }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
