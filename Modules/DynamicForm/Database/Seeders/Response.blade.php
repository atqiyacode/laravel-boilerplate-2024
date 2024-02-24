<table>
    <thead>
        <tr>
            <th style="font-weight: bold;">No</th>
            <td style="font-weight: bold;">form_id</td>
            <td style="font-weight: bold;">applicant_resume_id</td>
            <td style="font-weight: bold;">form</td>
            <td style="font-weight: bold;">applicantResume</td>
            <td style="font-weight: bold;">responseData</td>
            <td style="font-weight: bold;">response_data_count</td>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->form_id }}</td>
                <td>{{ $item->applicant_resume_id }}</td>
                <td>{{ $item->form }}</td>
                <td>{{ $item->applicantResume }}</td>
                <td>{{ $item->responseData }}</td>
                <td>{{ $item->response_data_count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
