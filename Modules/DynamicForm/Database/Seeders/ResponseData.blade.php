<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <td style="font-weight: bold;">response_id</td>
            <td style="font-weight: bold;">form_field_id</td>
            <td style="font-weight: bold;">option_id</td>
            <td style="font-weight: bold;">value</td>
            <td style="font-weight: bold;">response</td>
            <td style="font-weight: bold;">formField</td>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->response_id }}</td>
                <td>{{ $item->form_field_id }}</td>
                <td>{{ $item->option_id }}</td>
                <td>{{ $item->value }}</td>
                <td>{{ $item->response }}</td>
                <td>{{ $item->formField }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
