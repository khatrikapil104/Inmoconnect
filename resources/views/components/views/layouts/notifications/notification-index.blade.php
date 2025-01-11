@if($values->isNotEmpty())
@foreach($values as $value)
<div class="d-flex align-items-start justify-content-between py-2 py-sm-3 notificationRow"
    
onclick = "window.open('{{ !empty($value->action_url) ? url($value->action_url . (strpos($value->action_url, '?') !== false ? '&' : '?') . 'notification_id=' . $value->id) : '' }}','_self')"

>
     {{-- onclick = "window.open('{{!empty($value->action_url) ? $value->action_url.'?notification_id='.$value->id : ''}}','_self')  --}}
    <div class="left-user d-flex align-items-start gap-2">
        <img src="{{$value->image_url ?? asset('img/default-user.jpg')}}" alt="image" class="width-36 height-36 border-r-5">
        <div class="d-flex flex-column gap-1 gap-sm-2">
            <div class="text-12 font-weight-700 line-height-15 color-b-blue">{{$value->message ?? ''}}</div>
            <div class="d-flex align-items-center gap-2">
                <div class="icon-time"></div>
                <div class="text-12 font-weight-400 line-height-15 color-b-blue">{{$value->time_value ?? ''}}</div>
            </div>
        </div>
    </div>
    @if($value->is_read == 0)
    <div class="right-dot"></div>
    @endif
</div>
@endforeach
@else
<p class="text-center">{{trans('messages.notification_dropdown.empty')}}</p>
@endif