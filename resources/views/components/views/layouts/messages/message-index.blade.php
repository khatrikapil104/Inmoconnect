@if($values->isNotEmpty())
@foreach($values as $value)
@if(!empty($value->group_id))
<div class="border-mail d-flex align-items-start justify-content-between py-2 py-sm-2 messageRow" >
    <div class="w-100 left-user d-flex align-items-center gap-3">
        <img src="{{$value->group_image ?? ""}}" alt="image" class="width-36 height-36 border-r-5">
            <div class="w-100 d-flex flex-column gap-1 gap-sm-1">
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="mail-headeer-text text-18 font-weight-700 lineheight-22 color-b-blue">{{$value->group_name ?? ''}}</div>
                    <div class="text-12 font-weight-400 lineheight-16 color-b-blue opacity-5">{{$value->time_value ?? ''}}</div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="text-12 font-weight-400 lineheight-16 primary">{{$value->sender_name ?? "" }}</div>
                    @if($value->is_read == 0)
                    <div class="right-dot"></div>
                    @endif
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="mail-text text-14 font-weight-400 lineheight-18 color-b-blue opacity-6">{{$value->message ?? ''}}</div>
                    </div>
                </div>
            </div>
</div>
@else
<div class="border-mail d-flex align-items-start justify-content-between py-2 py-sm-2 messageRow" >
    <div class="w-100 left-user d-flex align-items-center gap-3">
        <img src="{{getFileUrl($value->sender_image ?? '', 'users')}}" alt="chat_default_group" class="width-36 height-36 border-r-5">
            <div class="w-100 d-flex flex-column gap-1 gap-sm-1">
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="mail-headeer-text text-18 font-weight-700 lineheight-22 color-b-blue">{{$value->sender_name  ?? ''}}</div>
                    <div class="text-12 font-weight-400 lineheight-16 color-b-blue opacity-5">{{$value->time_value ?? ''}}</div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="text-12 font-weight-400 lineheight-16 primary">{{getUserRoleName($value->sender_role_id ?? 0)}}</div>
                    @if($value->is_read == 0)
                    <div class="right-dot"></div>
                    @endif
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="mail-text text-14 font-weight-400 lineheight-18 color-b-blue opacity-6">{{$value->message ?? ''}}</div>
                    </div>
                </div>
            </div>
</div>
@endif
@endforeach
@else
<p class="text-center">
   {{trans('messages.no_message_found')}}
</p>
@endif
