@if ($results->isNotEmpty())
    @foreach ($results as $data)
        @php
            $formattedDate = date('d/m/Y', strtotime($data->created_at));
        @endphp
        <tr class="developer_data">
            <td><span class="ms-2">{{ $data->name }}</td>
            <td>{{ $data->email ?? '' }}</td>
            <td>{{ $data->phone }}</td>
            <td>{{ $data->company_name ?? '' }}</td>
            <td>{{ $data->country }}</td>
            <td>{{ date('d/m/Y', strtotime($data->created_at)) }}</td>

        </tr>
    @endforeach
@else
<p>{{ trans('messages.beta-developer.no_beta_developers_found') }}</p>
@endif
