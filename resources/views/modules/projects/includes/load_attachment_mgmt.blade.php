{{-- @if ($project_attachments && $project_attachments->isNotEmpty())
@foreach ($project_attachments as $attachment)
<tr>
    <td> <i class=" icon-zip file_width me-2 icon-20"></i></td>
    <td><span>{{$attachment->file_original_name ?? ''}}.{{$attachment->file_type ?? ''}}</span><span class="d-block">
        {{trans('messages.project-show.Uploaded_by')}} 
        {{$attachment->added_by_name ?? ''}}</span></td>
    <td>
        <a href="javascript:void(0)">
            <i data-id="{{$attachment->id}}" data-name="{{$attachment->file_original_name ?? ''}}.{{$attachment->file_type ?? ''}}" class="  icon-Delete icon-20 color-b-blue deleteProjectAttachmentBtn"></i>
        </a></td>
</tr>
@endforeach
@else
<tr>
    <td colspan="2" class="text-center">

        <p>{{trans('messages.Property_no_result_found')}}</p>
    </td>
</tr>
@endif --}}
@if ($project_attachments->isNotEmpty())
    @foreach ($project_attachments as $attachment)
        <tr>
            <td><i class="icon-zip file_width me-2 icon-20"></i></td>
            <td>
                <span>{{ $attachment->file_original_name ?? '' }}.{{ $attachment->file_type ?? '' }}</span>
                <span class="d-block">{{ trans('messages.project-show.Uploaded_by') }}
                    {{ $attachment->added_by_name ?? '' }}</span>
            </td>
            <td>
                @if (auth()->user()->id == $project->owner_id)
                    <!-- Only agent can delete the attachment -->
                    <a href="javascript:void(0)" data-id="{{ $attachment->file_id }}"
                        class="downloadProjectAttachmentBtn">
                        <img src="{{ asset('img/download_project_attachment.svg') }}" alt="">
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
@else
    {{-- @dd(123) --}}
    {{-- <tr>
        <td colspan="3" class="text-center">
            <p>{{ trans('messages.Property_no_result_found') }}</p>
        </td>
    </tr> --}}
@endif
