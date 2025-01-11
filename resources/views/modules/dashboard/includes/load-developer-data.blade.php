@if ($results->isNotEmpty())
    @foreach ($results as $data)
        @php
            $formattedDate = date('d/m/Y', strtotime($data->created_at));
        @endphp
        <tr class="developer_data {{ ($data->current_status == 'completed' && $data->is_active == 0) ? 'remaining_account-opacity' : '' }}">

            <td> 
                <img src="{{ !empty($data->image) ? $data->image : asset('img/default-user.jpg') }}"width="36" height="36" alt="image"
                    class="border-r-4" alt="image">
                </td>
            <td><span class="ms-2">{{ $data->name }}</td>
            <td>{{ $data->companyDetails->company_name ?? '' }}</td>
            <td>{{ $data->phone }}</td>
            <td>{{ $data->city }}</td>
            <td>{{ date('d/m/Y', strtotime($data->created_at)) }}</td>

            @if ($data->current_status == 'under_review')
                <td class="change_active">
                    <button class="d-flex align-items-center b-color-transparent">
                        <span class="change_status_developer" data-id={{ $data->id }} type='accept'>
                            <img src="{{ asset('img/table_accept.svg') }}" alt="Default Image">
                        </span>
                        <span class="change_status_developer" data-id={{ $data->id }} type='reject'>
                            <img src="{{ asset('img/table_reject.svg') }}" alt="Default Image">
                        </span>
                    </button>
                </td>
            @elseif ($data->is_active == 1)
                <td class="change_active">
                    <span class="span_active span_complate_one">
                        Accepted
                    </span>
                </td>
            @elseif ($data->is_active == 0)
                <td class="change_active">
                    <span class="span_pending span_complate_one">
                        Rejected
                    </span>
                </td>
            @endif

            <td>
                <button class="b-color-transparent developerDetails" data-id={{ $data->id }}><i
                        class=" icon-eye icon-18 color-b-blue "></i></button>

            </td>
        </tr>
    @endforeach
@else
        <p>{{ trans('messages.view-developers.no_data_found_developer') }}</p>
@endif
