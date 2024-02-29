<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <td style="font-weight: bold;">form_field_id</td>
            <td style="font-weight: bold;">value</td>
            <td style="font-weight: bold;">formField</td>
            <td style="font-weight: bold;">responseData</td>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->form_field_id }}</td>
                <td>{{ $item->value }}</td>
                <td>{{ $item->formField }}</td>
                <td>{{ $item->responseData }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
