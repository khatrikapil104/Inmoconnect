@push('styles')

@endpush
@php
if(isset($values['useCkEditor']) && $values['useCkEditor']){
    $totalCount = storeCrmComponentsDataIntoSession('crm-textarea');
}
@endphp

<div class="form-group crm-textarea-container position-relative mt-3">
    @if(isset($values['hasLabel']) && $values['hasLabel'])
        <label for="{{ $values['id'] ?? '' }}" class="text-14 font-weight-400 lineheight-18 color-b-blue">{{ $values['label'] ?? 'Textarea Input' }} @if(isset($values['isRequired']) && $values['isRequired'])<span class="required">*</span>@endif</label>
    @endif

    @if(isset($values['useCkEditor']) && $values['useCkEditor'])
        <div id="{{ $values['id'] ?? '' }}_editor"></div>
        <textarea class="hasCkEditor" name="{{ $values['name'] ?? '' }}" id="{{ $values['id'] ?? '' }}" style="display:none;" @if(isset($values['attributes']) && is_array($values['attributes']))
                {!! implode(' ', $values['attributes']) !!}
            @endif >{!! $values['value'] ?? '' !!}</textarea>
        <script>
            var isCkEditorEnabled = "{{(!empty($values['attributes']) && (in_array('readonly',$values['attributes']) || in_array('disabled',$values['attributes']))) ? true : false }}";
           $(document).ready(function() {
                ClassicEditor
                    .create(document.querySelector('#{{ $values['id'] ?? '' }}_editor'), {
                        /* CKEditor configuration options */
                    })
                    .then(editor => {
                        editor.setData("{!! str_replace('"', '\\"', $values['value'] ?? '') !!}");
                        editor.model.document.on('change:data', () => {
                            document.getElementById('{{ $values['id'] ?? '' }}').value = editor.getData();
                        });
                        if(isCkEditorEnabled){

                            editor.enableReadOnlyMode("editor");
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
                    
            });
        </script>
    @else
        <textarea class="crm-textarea form-control form-control border-r-8 border-blue b-color-transparent text-16 font-weight-400 lineheight-20 text-capitalize color-b-blue{{ $values['class'] ?? '' }}" name="{{ $values['name'] ?? '' }}" id="{{ $values['id'] ?? '' }}" rows="{{ $values['rows'] ?? '3' }}"
            @if(isset($values['attributes']) && is_array($values['attributes']))
                {!! implode(' ', $values['attributes']) !!}
            @endif
        >{!! $values['value'] ?? '' !!}</textarea>
    @endif

    <div class="invalid-feedback fw-bold"></div>

    @if(isset($values['hasHelpText']) && $values['hasHelpText'])
        <small class="small-text-textarea color-b-blue opacity-8 text-10 font-weight-400 line-height-20 text-capitalize position-relative">{!! $values['help'] ?? '' !!}</small>
    @endif
</div>

<script>
    var fieldId = "{{$values['id'] ?? ''}}";
</script>

@push('scripts')
@if(isset($values['useCkEditor']) && $values['useCkEditor'] && !empty($totalCount) && ($totalCount == 1))
<!-- Include CKEditor JS -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
@endif
@endpush
