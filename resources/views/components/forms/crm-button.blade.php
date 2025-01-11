<button type="{{ $values['type'] ?? '' }}"
        @if(!empty($values['url']))
            onclick="openLink('{{ $values['url'] }}', '{{ $values['target'] ?? '_self' }}')"
        @endif
        class="{{ $values['class'] ?? '' }}"
        id="{{ $values['id'] ?? '' }}"
        @if(isset($values['attributes']) && is_array($values['attributes']))
            {!! implode(' ', $values['attributes']) !!}
        @endif
>
    {!! $values['text'] ?? '' !!}
</button>
@if(!empty($values['url']))
<script>
    function openLink(url, target) {
        window.open(url, target);
    }
</script>
@endif