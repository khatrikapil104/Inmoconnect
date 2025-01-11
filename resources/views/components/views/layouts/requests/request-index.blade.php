@if ($values->isNotEmpty())
    @foreach ($values as $value)
        <div class="d-flex align-items-center justify-content-between py-2 py-sm-3 requestRow">
            <div class="left-user d-flex align-items-center gap-2">

                <img src="{{ $value->user_image ?? asset('img/default-user.jpg') }}" alt="image"
                    class="width-36 height-36 border-r-8">
                <div class="d-flex flex-column">
                    <div class="text-12 color-b-blue font-weight-700 lineheight-15">{{ $value->user_name ?? '' }}
                    
                    </div>
                    <div class="text-12">
                        {{ ucfirst(getUserRoleName($value->user_role_id)) }}
                    </div>
                </div>

            </div>
            <div class="right-button d-flex align-items-center gap-2">
                @if ($value->status == config('constant.REQUEST_STATUS.PENDING'))
                    <button
                        class="accept-button text-12 font-weight-400 lineheight-15 color-white-grey b-color-primary border-r-4 acceptRequestBtn"
                        data-id="{{ $value->id }}">{{ trans('messages.request_modal.Accept') }}</button>
                    <button
                        class="reject-button text-12 font-weight-400 lineheight-15 color-white-grey b-blue-opacity-4 border-r-4 rejectRequestBtn"
                        data-id="{{ $value->id }}">{{ trans('messages.request_modal.Reject') }}
                    </button>
                @elseif($value->status == config('constant.REQUEST_STATUS.ACCEPTED'))
                    <span
                        class="badge badge-pill badge-success text-black">{{ trans('messages.request_modal.accepted_request_text') }}</span>
                @elseif($value->status == config('constant.REQUEST_STATUS.REJECTED'))
                    <span
                        class="badge badge-pill badge-danger text-black">{{ trans('messages.request_modal.rejected_request_text') }}</span>
                @elseif($value->status == config('constant.REQUEST_STATUS.BLOCKED'))
                    <span
                        class="badge badge-pill badge-danger">{{ trans('messages.request_modal.blocked_request_text') }}</span>
                @endif


            </div>
        </div>
    @endforeach
@else
    <p class="text-center">{{ trans('messages.request_dropdown.empty') }}</p>
@endif
