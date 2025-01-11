<div class="row min-vh-lg-100 vh-100 align-items-center b-white-grey ">
   @if(!empty($values['left']) && $values['left'] == 'sideContent' )
      @include('components.views.auth.side-content')
      @include('components.views.auth.main-content')
   
   @else
      @include('components.views.auth.main-content')
      @include('components.views.auth.side-content')
   @endif
</div>