@if(!empty($values['data']))
@foreach($values['data'] as $data)
<div class="d-flex gap-2">
    <span class="{{$data['iconClass'] ?? ''}}"></span>
        <div class="text-12 font-weight-400 line-height-15 color-b-blue">{{$data['text'] ?? ''}}</div>
</div>
@endforeach
@endif