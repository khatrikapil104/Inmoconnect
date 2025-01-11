@if ($project_properties && $project_properties->isNotEmpty())
    @foreach ($project_properties as $property)
        <tr>
            <td> <img
                    src="{{ !empty($property->firstImage_image) && $property->firstImage_type == 'image' ? getFileUrl($property->firstImage_image, 'properties') : asset('img/default-property.jpg') }}"
                    alt="image" width="36" height="36" alt="image" class="border-r-4"></td>
            <td><span>{{ $property->reference ?? '' }}</span></td>
            <td class="title_wrap table-text-overflow"><span>{{ $property->name ?? '' }}</span></td>
            <td>{{ $property->type_name ?? '-' }}</td>
            <td>{{ $property->city ?? '-' }}</td>
            {{-- @dd($property); --}}
            <td>
                {{ !empty($property->size) ? number_format($property->size, 2) . ' m' : '0.00 m' }}
            </td>
            <td class="table_prize">
                {{ !empty($property->price)
                    ? config('Reading.default_currency') . ' ' . substr($property->price, 0, 2) . '000'
                    : config('Reading.default_currency') . ' 0.00' }}
            </td>
            <td>
                @if (checkUserProjectPermissions($project->id, 'Property Management'))
                    <a href="#"> <i data-id="{{ $property->id }}" data-name="{{ $property->reference }}"
                            class="deleteProjectPropertyBtn icon-Delete icon-20 color-b-blue"></i></a>
                @endif
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="6" class="text-center">

            <p>
                {{ trans('messages.Property_no_result_found') }}
            </p>
        </td>
    </tr>
@endif
