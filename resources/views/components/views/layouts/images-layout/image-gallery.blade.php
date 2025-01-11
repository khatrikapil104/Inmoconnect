@php

$totalCount = storeCrmComponentsDataIntoSession('image-gallery');

@endphp
@if(!empty($totalCount) && ($totalCount == 1))
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
@endpush
@endif
<!-- <div id="page-content-wrapper" class="min-vh-100 b-white-grey">
      <div class="crm-main-content"> -->
<div class=" position-relative">
<!-- <div class="empty-search-header"
  style="max-width: 1045px; margin-left: auto; margin-right: auto; height: 100vh; display: flex; align-items: center;"> -->
  @if (!empty($values['imagesData']))
  <div class="row gallery_sec mb-30 position-relative">
    @foreach ($values['imagesData'] as $imageKey => $imageVal)
    @if ($imageKey == 0)
    <div class="col-lg-5 col-md-4 col-sm-6 col-12 h-100 responsive_fancy_img">
      @if(empty($values['isHidden']))
      <a href="{{ $imageVal['image'] }}" data-fancybox="gallery">
      <img
              src="{{ (!empty($imageVal['type']) && ($imageVal['type'] == 'image')) ? $imageVal['image'] : asset('img/default-property.jpg') }}"
              data-src="{{ (!empty($imageVal['type']) && ($imageVal['type'] == 'image')) ? $imageVal['image'] : asset('img/default-property.jpg') }}"
              alt="{{ (!empty($imageVal['type']) && ($imageVal['type'] == 'image')) ? $imageVal['image'] : asset('img/default-property.jpg') }}"
              class="w-100 h-100 object-fit-fill">
      </a>
      @else
      <a href="{{ $imageVal['image'] }}" >
      <img
              src="{{ (!empty($imageVal['type']) && ($imageVal['type'] == 'image')) ? $imageVal['image'] : asset('img/default-property.jpg') }}"
              data-src="{{ (!empty($imageVal['type']) && ($imageVal['type'] == 'image')) ? $imageVal['image'] : asset('img/default-property.jpg') }}"
              alt="{{ (!empty($imageVal['type']) && ($imageVal['type'] == 'image')) ? $imageVal['image'] : asset('img/default-property.jpg') }}"
              class="w-100 h-100 object-fit-fill">
      </a>
      @endif
    </div>
    @elseif ($imageKey == 1)
    <div class="pt-2 pt-sm-0 col-lg-7 col-md-8 col-sm-6 col-12 h-100 d-flex gap-12 flex-column ps-2 ps-sm-0 responsive_fancy_box_three">
      @foreach ($values['imagesData'] as $imageKey1 => $imageVal1)
      @if ($imageKey1 > 0 && $imageKey1 < 5) 
      @if($imageKey1 == 1 || $imageKey1 == 3 )
      <div class="row {{!empty($values['isHidden']) ? 'property-blur' :''}} {{($imageKey1 == 3) ? '' : ''}} position-relative h-50 first-row">
      @endif
        <div class="col-lg-6 col-md-6 col-sm-6 col-6 h-100 first-column responsive_fancy_img_two">
          @if(empty($values['isHidden']))
          <a href="{{ $imageVal1['image'] }}" data-fancybox="gallery">
            
            <img
              src="{{ (!empty($imageVal1['type']) && ($imageVal1['type'] == 'image')) ? $imageVal1['image'] : asset('img/default-property.jpg') }}"
              data-src="{{ (!empty($imageVal1['type']) && ($imageVal1['type'] == 'image')) ? $imageVal1['image'] : asset('img/default-property.jpg') }}"
              alt="{{ (!empty($imageVal1['type']) && ($imageVal1['type'] == 'image')) ? $imageVal1['image'] : asset('img/default-property.jpg') }}"
              class="w-100 h-100 object-fit-fill">
          </a>
          @else
          <a href="{{ asset('img/default-property.jpg') }}" data-fancybox="gallery">
          <img
                  src="{{ asset('img/default-property.jpg') }}"
                  data-src="{{ asset('img/default-property.jpg') }}"
                  alt="{{ asset('img/default-property.jpg') }}"
                  class="w-100 h-100 object-fit-fill">
          </a>
          @endif
      </div>
      @if($imageKey1 == 2 || $imageKey1 == 4 )
      </div>
      @endif

      @elseif($imageKey1 >= 5)
      <div class="col-lg-6 col-md-6 col-sm-6" style="display:none;">
        @if(empty($values['isHidden']))
        <a href="{{ $imageVal1['image'] }}" data-fancybox="gallery">
          <img
              src="{{ (!empty($imageVal1['type']) && ($imageVal1['type'] == 'image')) ? $imageVal1['image'] : asset('img/default-property.jpg') }}" data-type="iframe"
              data-src="{{ (!empty($imageVal1['type']) && ($imageVal1['type'] == 'image')) ? $imageVal1['image'] : asset('img/default-property.jpg') }}"
              alt="{{ (!empty($imageVal1['type']) && ($imageVal1['type'] == 'image')) ? $imageVal1['image'] : asset('img/default-property.jpg') }}"
              class="w-100 h-100 object-fit-fill">
        </a> 
        @else
          <a href="{{ asset('img/default-property.jpg') }}" data-fancybox="gallery">
          <img
                  src="{{ asset('img/default-property.jpg') }}"
                  data-src="{{ asset('img/default-property.jpg') }}"
                  alt="{{ asset('img/default-property.jpg') }}"
                  class="w-100 h-100 object-fit-fill">
          </a>
        @endif 
      </div>
      @endif
      @endforeach
    
  </div>

  @endif
  @endforeach
</div>
@endif

@if(count($values['imagesData']) > 5)
@if(empty($values['isHidden']))
<button type="button" class="image-button text-14 font-weight-700 lineheight-18 color-b-blue border-r-8 b-color-white showAllImagesBtn">{{trans('messages.image_gallery.show_all')}} {{ count($values['imagesData']) }} {{trans('messages.image_gallery.images')}}</button>
@endif
</div>
@endif
@push('scripts')
@if(!empty($totalCount) && ($totalCount == 1))
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
  Fancybox.bind("[data-fancybox]", {
    toolbar: false,
    smallBtn: true,
    iframe: {
      preload: false
    }
    // Your custom options
  });
  $('.showAllImagesBtn').on('click', function () {
      $('[data-fancybox="gallery"]:first')[0].click();
  });
</script>
@endif

@endpush