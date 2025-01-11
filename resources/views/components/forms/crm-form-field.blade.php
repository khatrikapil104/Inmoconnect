@foreach ($dynamicAttributes as $key => $value)
    @if ($key === 'text')
        <label for="{{ $value['name'] }}">{{ $value['label'] ?? 'Text Input' }}:</label>
        <input  type="text" name="{{ $value['name'] }}" id="{{ $value['name'] }}" {!! $value['attributes'] ?? '' !!}>
    @elseif ($key === 'select')
        <label for="{{ $value['name'] }}">{{ $value['label'] ?? 'Select Box' }}:</label>
        <select name="{{ $value['name'] }}" id="{{ $value['name'] }}" {!! $value['attributes'] ?? '' !!}>
            <!-- Add options dynamically if needed -->
        </select>
    @elseif ($key === 'textarea')
        <label for="{{ $value['name'] }}">{{ $value['label'] ?? 'Textarea' }}:</label>
        <textarea name="{{ $value['name'] }}" id="{{ $value['name'] }}" {!! $value['attributes'] ?? '' !!}></textarea>
    @endif
@endforeach