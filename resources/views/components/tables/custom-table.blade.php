{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" /> --}}
@if ($results->isnotEmpty())
    @if($listingType == 'property-listing' && auth()->user()->role->name !== 'developer')
    <div class="d-flex justify-content-between align-items-center mb-20">
        @php
        $firstRecord = $results->first();
        @endphp

        @if ($firstRecord->owner_id === auth()->id())
            @include('modules.properties.includes.modal')
            <div class="checkbox_property d-flex align-items-center gap-3">
                <input type="checkbox" id="select-all-btn" name="select-all-btn" value="Bike">
                <span class="color-primary text-14 font-weight-400 lineheight-18 text-capitalize">Select All </span>
            </div>

            <button type="button" id="open-collaboration-btn" name="open-collaboration-btn"
                class="opacity-3 delete_project small-button border-r-8 text-14 font-weight-700 lineheight-18 deleteProjectBtn"
                data-bs-toggle="modal" data-bs-target="#property_collaboration_all">
                Collaboration
            </button>
        @endif
    </div>
    @endif
    @foreach ($results as $result)

        @if (
                $listingType != 'customer-listing' &&
                $listingType != 'beta-agent-listing' &&
                $listingType != 'beta-developer-listing' &&
                $listingType != 'newsletter-listing' &&
                $listingType != 'property_lead_list' &&
                $listingType != 'file-listing' && $listingType != 'team-management-listing' && $listingType != 'development-unit-listing' && $listingType != 'property-listing-company' && $listingType != 'customer-listing-company' && $listingType != 'assign-property-listing')


                    {{-- property-listing --}}
                    @if ($listingType == 'property-listing')
                    @if(auth()->user()->role->name == 'developer')
                    <div class="main-card border-r-8 p-20 mt-20 b-color-white">
                        <div class="main-card_flex d-block d-sm-flex align-center gap-2 gap-sm-4">

                            {{-- image --}}
                            <div class="main-card-left">
                                <div class="main-card-img main_card_img_developer">
                                    <img src="{{ !empty($result->cover_image) ? $result->cover_image : asset('img/default-property.jpg') }}" alt="image">
                                </div>
                            </div>
                            <div class="d-flex flex-column w-100">
                                <div class="row">

                                    {{-- text --}}
                                    <div class="col-lg-9">
                                        <div class="gap-12 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                            <div class="d-flex flex-column gap-2">
                                                <div class="main-card-bottom">
                                                    <div
                                                        class="property-title property-h-responsive text-16 font-weight-700 lineheight-20 text-capitalize color-primary">
                                                        {{ $result->name ?? '' }}
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="property-price text-16 font-weight-700 lineheight-20 color-primary">
                                                    {{ !empty($result->price)
                                                            ? config('Reading.default_currency') . ' ' . number_format($result->price, 2)
                                                            : config('Reading.default_currency') . ' 0.00' }}</div>
                                                </div>
                                                @if(!empty($result->development_name))
                                                <div class="d-flex gap-2 align-items-start ">
                                                    <i class="icon-house_type text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary location_address text-14 font-weight-700 lineheight-18 color-b-blue">
                                                        {{ $result->development_name ?? '' }}</div>

                                                </div>
                                                @endif
                                                <div class="agent_commision-card">
                                                    <h6>
                                                        <span class="text-14 color-b-blue font-weight-400">Default Agent's
                                                            Commission:</span>
                                                        <span class="text-20 font-weight-700 color-primary">{{ (!empty($result->price) && !empty($result->agent_commission_per))
                                                            ? config('Reading.default_currency') . ' ' . number_format($result->price * ($result->agent_commission_per/100), 2)
                                                            : config('Reading.default_currency') . ' 0.00' }}</span>
                                                    </h6>
                                                </div>
                                                <div class="d-flex gap-2 align-items-start ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $result->address ?? '' }}</div>

                                                </div>
                                                <div class="d-flex gap-2 gap-md-3 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-start">
                                                        <i class="icon-my_profile text-20  color-b-blue "></i>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $result->agent_name ?? '' }}</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_id  text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $result->reference ?? '' }}</div>
                                                    </div>
                                                     <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-development_id  text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $result->development_number ?? '' }}</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-2 gap-md-3 flex-wrap">
                                                    @if(!empty($result->size))
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_scale text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ !empty($result->size) ? number_format($result->size, 2) : '0.00' }}
                                                                {{ $result->dimension_type === 'Feet' ? 'ft' : 'm' }}</div>
                                                    </div>
                                                    @endif
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-bed text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $result->bedrooms ?? '' }}</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-bathroom text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $result->bedrooms ?? '' }}</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-floor text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $result->bedrooms ?? '' }}</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    {{-- buttons --}}
                                    <div class="col-lg-3 mt-3 mt-lg-0">
                                        <div
                                            class=" h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                            <button type="button"
                                                class="text-14 font-weight-400 lineheight-18 border-r-8 b-color-primary color-white-grey viewPropertyBtn" onclick="window.open('{{route(routeNamePrefix().'properties.show',$result->reference)}}','_self')"
                                                id="viewPropertyBtn">
                                                View Property
                                            </button>
                                            <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                                <button type="button" class=" icon-share text-20 b-color-transparent color-b-blue"
                                                    id="shareBtn">
                                                </button>
                                                <button type="button" class=" icon-edit text-20 b-color-transparent color-b-blue" onclick="window.open('{{route(routeNamePrefix().'properties.edit.new',$result->reference)}}','_self')"
                                                    id="editBtn">
                                                </button>
                                                <button type="button" class=" icon-Delete text-20 b-color-transparent color-b-blue deletePropertyBtn" data-id="{{$result->id}}" data-name="{{$result->reference}}"
                                                    id="deleteBtn">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- bottom-text --}}
                                <div class="border_property-card  mt-3 pt-20">
                                    <div class="row w-100 ">
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center gap-12">
                                                <img src="{{!empty($result->user_company_image) ? getFileUrl($result->user_company_image,'user_company_details') : asset('img/logoplaceholder.svg') }}" class="border-r-4" width="36" height="36" alt="image" >
                                                <h6 class="text-14 font-weight-700 color-b-blue">{{$result->user_company_name ?? ''}}</h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="d-flex align-items-center gap-3 mb-20">
                        <div class="checkbox_property">
                            @if($result->collaborated && $firstRecord->owner_id === auth()->id())
                                <i class="fa-solid fa-handshake"></i>
                            @else
                                @if ($firstRecord->owner_id === auth()->id())
                                    <input type="checkbox" data-id="{{ $result->id }}" id="property-checkbox-{{ $result->id }}" name="property-checkbox" value="{{ $result->id }}" class="property-checkbox" data-name="{{$result->name}}" data-image="{{ !empty($result->cover_image) ? $result->cover_image : asset('img/default-property.jpg') }}" data-sqft="{{ !empty($result->size) ? number_format($result->size, 2) : '0.00' }}{{ $result->dimension_type === 'Feet' ? 'ft' : 'm' }}">
                                @endif
                            @endif
                        </div>
                        <div class="main-card border-r-8 p-10 mb-15 b-color-white w-100">
                            <div class="main-card_flex d-block d-sm-flex align-center gap-2">
                                <div class="main-card-left">
                                    <div class="main-card-img">
                                        <img src="{{ !empty($result->cover_image) ? $result->cover_image : asset('img/default-property.jpg') }}"
                                            alt="image">
                                    </div>
                                </div>
                                <div class="row w-100 ps-1 ps-md-2 ps-lg-3">
                                    <div class="col-xl-9 col-lg-8">
                                        <div
                                            class="gap-12 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                            <div class="d-flex flex-column">
                                                <div class="main-card-bottom mb-3">
                                                    <div
                                                        class="property-title property-h-responsive text-18 font-weight-700 lineheight-24 text-capitalize color-b-blue pt-2">
                                                        {{ $result->name ?? '' }}
                                                    </div>
                                                </div>
                                                <div
                                                    class="flex-column flex-row main-card-center-one  d-flex align-items-start gap-12">
                                                    <div class="main-card-center-one  d-flex align-items-start gap-2 gap-md-3">
                                                        <div
                                                            class="d-flex gap-2 align-items-start main-card-width {{ !empty($result->isHidden) ? 'property-blur position-relative ' : '' }}">
                                                            <i class=" icon-location text-20 color-b-blue"></i>
                                                            @if (!empty($result->isHidden))
                                                                <div
                                                                    class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                    Lorem ipsum dolor sit consectetur
                                                                </div>
                                                            @else
                                                                <div
                                                                    class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                    {{ $result->address ?? '' }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex gap-2 align-items-start main-card-agent-width justify-content-end">
                                                        <i class="icon-my_profile text-20  color-b-blue "></i>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $result->agent_name ?? '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="flex-column flex-row main-card-center-one  d-flex align-items-start">
                                                    @if (!empty($result->type->name)&& $result->type->name != 'Plot')
                                                        <div class="d-flex gap-2 gap-md-3 mt-12">
                                                            @if (!empty($result->bedrooms))
                                                                <div class="d-flex gap-2 align-items-center">
                                                                    <i class=" icon-bed icon-20 color-b-blue"></i>
                                                                    <div
                                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                        {{ $result->bedrooms ?? '' }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if (!empty($result->bathrooms))
                                                                <div class="d-flex gap-2 align-items-center">
                                                                    <i class="icon-bathroom icon-20 color-b-blue"></i>
                                                                    <div
                                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                        {{ $result->bathrooms ?? '' }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if (!empty($result->floors))
                                                                <div class="d-flex gap-2 align-items-center">
                                                                    <i class="icon-floor icon-20 color-b-blue"></i>
                                                                    <div
                                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                        {{ $result->floors ?? '' }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endif

                                                    <div class="d-flex gap-2 gap-md-3 mt-12">
                                                        @if (!empty($result->size))
                                                            <div class="d-flex gap-2 align-items-center">
                                                                <i class=" icon-house_scale icon-20 color-b-blue "></i>
                                                                <div
                                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                    {{ !empty($result->size) ? number_format($result->size, 2) : '0.00' }}
                                                                    {{ $result->dimension_type === 'Feet' ? 'ft' : 'm' }}<sup>2</sup>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if (!empty($result->plot_size))
                                                            <div class="d-flex gap-2 align-items-center">
                                                                <i class=" icon-house_scale icon-20 color-b-blue"></i>
                                                                <div
                                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                    {{ !empty($result->plot_size) ? number_format($result->plot_size, 2) : '0.00' }}
                                                                    {{ $result->dimension_type === 'Feet' ? 'ft' : 'm' }}<sup>2</sup>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <i class=" icon-house_id icon-20 color-b-blue"></i>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                {{ $result->reference ?? '' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-block">
                                                <div
                                                    class="prize-title {{ !empty($result->isHidden) ? 'property-blur position-relative' : '' }}">
                                                    @if (!empty($result->isHidden))
                                                        <div
                                                            class="property-price text-14 font-weight-700 lineheight-18 color-primary">
                                                            {{ config('Reading.default_currency') . ' 0000' }}
                                                        </div>
                                                    @else
                                                        <div
                                                            class="property-price text-14 font-weight-700 lineheight-18 color-primary">
                                                            {{ !empty($result->price)
                                                                ? config('Reading.default_currency') . ' ' . number_format($result->price, 2)
                                                                : config('Reading.default_currency') . ' 0.00' }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 mt-3 mt-lg-0">
                                        <div
                                            class="me-2 h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                            <div class="button-header d-flex gap-2 text-nowrap">
                                               

                                                <x-forms.crm-button :fieldData="[
                                                    'text' => trans('messages.View_Property'),
                                                    'type' => 'button',
                                                    'url' =>
                                                        requestSegment(1) == 'agents'
                                                            ? (!empty($checkIfValidUser->id)
                                                                ? route(routeNamePrefix() . 'agents.userPropertiesShow', [
                                                                    $checkIfValidUser->id,
                                                                    $result->reference,
                                                                ])
                                                                : route(
                                                                    routeNamePrefix() . 'properties.show',
                                                                    !empty($result->reference) ? $result->reference : '',
                                                                ))
                                                            : (requestSegment(1) == 'users'
                                                                ? (!empty($checkIfValidUser->id)
                                                                    ? route(routeNamePrefix() . 'user.userPropertiesShow', [
                                                                        $checkIfValidUser->id,
                                                                        $result->reference,
                                                                    ])
                                                                    : route(
                                                                        routeNamePrefix() . 'properties.show',
                                                                        !empty($result->reference) ? $result->reference : '',
                                                                    ))
                                                                : route(
                                                                    routeNamePrefix() . 'properties.show',
                                                                    $result->reference,
                                                                )),
                                                    'class' =>
                                                        'text-14 font-weight-400 lineheight-18 border-r-4 b-color-primary color-white-grey viewPropertyBtn',
                                                    'id' => 'viewPropertyBtn',
                                                    'attributes' => [],
                                                ]" />
                                               



                                            </div>
                                            <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                                {{-- <x-forms.crm-button :fieldData="[
                                    'type' => 'button',
                                    'url'  => '',
                                    'target' => '_self',
                                    'class' => ' icon-share text-20 b-color-transparent color-primary',
                                    'id' => 'shareBtn',
                                    'attributes' => [],
                                ]" /> --}}
                                                @if (auth()->user()->id == $result->owner_id ||
                                                        (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin'))
                                                    <x-forms.crm-button :fieldData="[
                                                        'type' => 'button',
                                                        'url' =>
                                                            requestSegment(1) == 'agents'
                                                                ? (!empty($checkIfValidUser->id)
                                                                    ? route(routeNamePrefix() . 'agents.userPropertiesEdit', [
                                                                        $checkIfValidUser->id,
                                                                        $result->reference,
                                                                    ])
                                                                    : route(
                                                                        routeNamePrefix() . 'properties.edit',
                                                                        $result->reference,
                                                                    ))
                                                                : (requestSegment(1) == 'users'
                                                                    ? (!empty($checkIfValidUser->id)
                                                                        ? route(routeNamePrefix() . 'user.userPropertiesEdit', [
                                                                            $checkIfValidUser->id,
                                                                            $result->reference,
                                                                        ])
                                                                        : route(
                                                                            routeNamePrefix() . 'properties.edit',
                                                                            $result->reference,
                                                                        ))
                                                                    : route(
                                                                        routeNamePrefix() . 'properties.edit.new',
                                                                        $result->reference,
                                                                    )),
                                                        'target' => '_self',
                                                        'class' => ' icon-edit text-20 b-color-transparent color-primary',
                                                        'id' => 'editBtn',
                                                        'attributes' => [],
                                                    ]" />
                                                    <x-forms.crm-button :fieldData="[
                                                        'type' => 'button',
                                                        //'url'  => route(routeNamePrefix().'properties.index'),
                                                        'target' => '_self',
                                                        'class' =>
                                                            'icon-Delete  text-20 b-color-transparent deletePropertyBtn color-primary',
                                                        'id' => 'deleteBtn',
                                                        'attributes' => [
                                                            'data-id = ' . $result->id,
                                                            'data-name = ' . $result->reference,
                                                        ],
                                                    ]" />
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                    @endif


                        {{-- property-search --}}
                    @elseif($listingType == 'property-search')
                    <div class="main-card border-r-8 p-10 mb-15 b-color-white 456789">
                        <div class="main-card_flex d-block d-sm-flex align-center gap-2">
                            <div class="main-card-left">
                                <div class="main-card-img main_card_image_one ">
                                    <div class="slider_card_fancybox">

                                        <img src="{{ !empty($result->cover_image) ? $result->cover_image : asset('img/default-property.jpg') }}"
                                            alt="image">
                                    </div>
                                    {{-- <div class="slider_card_fancybox">
                                            <div>
                                            <a data-fancybox="gallery" href="https://via.placeholder.com/600x300?text=Slide+1">
                                                <img src="https://via.placeholder.com/600x300?text=Slide+1" alt="Slide 1">
                                            </a>
                                            </div>
                                            <div>
                                            <a data-fancybox="gallery" href="https://via.placeholder.com/600x300?text=Slide+2">
                                                <img src="https://via.placeholder.com/600x300?text=Slide+2" alt="Slide 2">
                                            </a>
                                            </div>
                                            <div>
                                            <a data-fancybox="gallery" href="https://via.placeholder.com/600x300?text=Slide+3">
                                                <img src="https://via.placeholder.com/600x300?text=Slide+3" alt="Slide 3">
                                            </a>
                                            </div>
                                            <div>
                                            <a data-fancybox="gallery" href="https://via.placeholder.com/600x300?text=Slide+4">
                                                <img src="https://via.placeholder.com/600x300?text=Slide+4" alt="Slide 4">
                                            </a>
                                            </div>
                                        </div> --}}

                                </div>
                            </div>
                            <div class="d-flex flex-column w-100 pt-3 pt-sm-0 position-relative">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div
                                            class="gap-12 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                            <div class="d-flex flex-column gap-2">
                                                {{-- property-price --}}
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    @if (!empty($result->isHidden))
                                                        <div
                                                            class="property-price text-20 font-weight-700 lineheight-24 color-primary property-blur position-relative">
                                                            {{ config('Reading.default_currency') . ' 0000' }}
                                                        </div>
                                                    @else
                                                        <div
                                                            class="property-price text-20 font-weight-700 lineheight-24 color-primary">
                                                            {{ !empty($result->price)
                                                                ? config('Reading.default_currency') . ' ' . number_format($result->price, 2)
                                                                : config('Reading.default_currency') . ' 0.00' }}
                                                        </div>
                                                    @endif
                                                    @if ($result->created_at > now()->subHours(48))
                                                        <div class="form-group position-relative">
                                                            <button type="button"
                                                                class=" add_property_button border-r-8 b-color-Gradient text-12 font-weight-400 color-white ">New
                                                                Property</button>
                                                        </div>
                                                    @endif
                                                </div>
                                                {{-- property-title --}}
                                                <div class="main-card-bottom">
                                                    <div
                                                        class="property-title property-h-responsive text-16 font-weight-700 lineheight-20 text-capitalize color-primary">
                                                        {{ $result->name ?? '' }}
                                                    </div>
                                                </div>
                                                {{-- location --}}
                                                <div
                                                    class="d-flex gap-2 align-items-start {{ !empty($result->isHidden) ? 'property-blur position-relative ' : '' }}">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    @if (!empty($result->isHidden))
                                                        <div
                                                            class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            Lorem ipsum dolor sit consectetur
                                                        </div>
                                                    @else
                                                        <div
                                                            class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $result->address ?? '' }}
                                                        </div>
                                                    @endif

                                                </div>
                                                {{-- name & id --}}
                                                <div class="d-flex gap-2 gap-md-3">
                                                    {{-- name --}}
                                                    <div class="d-flex gap-2 align-items-start">
                                                        <i class="icon-my_profile text-20  color-b-blue "></i>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $result->agent_name ?? '' }}</div>
                                                    </div>
                                                    {{-- refrence-id --}}
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_id  text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $result->reference ?? '' }}</div>
                                                    </div>
                                                </div>
                                                {{-- scale,bedroom,bathroom,floors --}}
                                                <div class="d-flex gap-2 gap-md-3">
                                                    {{-- scale --}}
                                                    @if (!empty($result->size))
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <i class=" icon-house_scale icon-20 color-b-blue"></i>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                {{ !empty($result->size) ? number_format($result->size, 2) : '0.00' }}
                                                                {{ $result->dimension_type === 'Feet' ? 'ft' : 'm' }}<sup>2</sup>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if (!empty($result->plot_size))
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <i class=" icon-house_scale icon-20 color-b-blue abcd j"></i>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                {{ !empty($result->plot_size) ? number_format($result->plot_size, 2) : '0.00' }}
                                                                {{ $result->dimension_type ? 'm' : '' }}<sup>2</sup>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    {{-- bedroom --}}
                                                    @if (!empty($result->bedrooms))
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <span class="icon-bed text-20  color-b-blue"></span>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                {{ $result->bedrooms ?? '' }}</div>
                                                        </div>
                                                    @endif
                                                    {{-- bathroom --}}
                                                    @if (!empty($result->bathrooms))
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <span class="icon-bathroom text-20  color-b-blue"></span>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                {{ $result->bathrooms ?? '' }}</div>
                                                        </div>
                                                    @endif
                                                    {{-- floor --}}
                                                    @if (!empty($result->floors))
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <span class="icon-floor text-20  color-b-blue"></span>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                {{ $result->floors ?? '' }}</div>
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    {{-- buttons --}}
                                    <div class="col-lg-3 mt-3 mt-lg-0">
                                        <div
                                            class=" h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                            <x-forms.crm-button :fieldData="[
                                                'text' => trans('messages.View_Property'),
                                                'type' => 'button',
                                                'url' =>
                                                    requestSegment(1) == 'agents'
                                                        ? (!empty($checkIfValidUser->id)
                                                            ? route(routeNamePrefix() . 'agents.userPropertiesShow', [
                                                                $checkIfValidUser->id,
                                                                $result->reference ?? '',
                                                            ])
                                                            : route(
                                                                routeNamePrefix() . 'properties.show',
                                                                !empty($result->reference) ? $result->reference : '',
                                                            ))
                                                        : (requestSegment(1) == 'users'
                                                            ? (!empty($checkIfValidUser->id)
                                                                ? route(routeNamePrefix() . 'user.userPropertiesShow', [
                                                                    $checkIfValidUser->id,
                                                                    $result->reference,
                                                                ])
                                                                : route(
                                                                    routeNamePrefix() . 'properties.show',
                                                                    !empty($result->reference) ? $result->reference : '',
                                                                ))
                                                            : route(
                                                                routeNamePrefix() . 'properties.search.show',
                                                                $result->reference,
                                                            )),
                                                'class' =>
                                                    'text-14 font-weight-400 lineheight-18 border-r-8 b-color-primary color-white-grey viewPropertyBtn text-nowrap',
                                                'id' => 'viewPropertyBtn',
                                                'attributes' => [],
                                            ]" />

                                            <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                                @if (!empty($result->is_saved_property))
                                                    <button type="button"
                                                        class="fa-solid fa-heart text-20 b-color-transparent color-b-blue add_property"
                                                        data-id="{{ $result->id }}">
                                                    </button>
                                                @else
                                                    <button type="button"
                                                        class="fa-regular fa-heart text-20 b-color-transparent color-b-blue add_property"
                                                        data-id="{{ $result->id }}">
                                                    </button>
                                                @endif

                                                <x-forms.crm-button :fieldData="[
                                                    'type' => 'button',
                                                    'url' => '',
                                                    'target' => '_self',
                                                    'class' => ' icon-share text-20 b-color-transparent color-primary',
                                                    'id' => 'shareBtn',
                                                    'attributes' => [],
                                                ]" />

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- bottom-tex t --}}
                                <div class="border_property-card  mt-3 pt-20 card_property_filter">
                                    <div class="row">
                                        {{-- project-name --}}

                                        <div class="col-md-6 col-lg-6">
                                            @if (!empty($result->user_company_image || $result->user_company_name))
                                            <div class="d-flex align-items-center gap-12">
                                                <img src="{{ !empty($result->user_company_image) ? getFileUrl($result->user_company_image,'user_company_details') : asset('img/logoplaceholder.svg') }}" alt="image"
                                                    class="width-36 height-36">


                                                <h6 class="text-14 font-weight-700 color-b-blue">{{$result->user_company_name ?? ""}}</h6>
                                            </div>
                                            @endif
                                        </div>

                                        {{-- Collaboration --}}
                                        <!--
                                            <div
                                            class="col-md-6 col-lg-6 d-flex justify-content-start justify-content-md-end pt-3 pt-md-0">
                                                <button type="button"
                                                class="download_plan small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                                data-bs-toggle="modal" data-bs-target="#initiate_collaboration" property-id = "{{ $result->id }}" property_ref="{{ $result->reference }}">
                                                <i class=" icon-phone me-2 icon-20 color-primary" ></i>
                                                Connect Agent </button>
                                            </div>
                                        -->
                                        @if(auth()->user()->role->name == "customer")
                                            @include('modules.properties.includes.contactAgentmodal')
                                            <div class="col-lg-12 pt-2">
                                                <button type="button"
                                                    id="contactagent_modal"
                                                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                                    data-agentid="{{ $result->secondary_agent_id }}" data-agentname="{{ $result->secondary_agent_name }}" data-agentimage="{{ $result->secondary_agent_image }}" data-agentphone="{{ $result->secondary_agent_phone }}" data-agentcity="{{ $result->secondary_agent_city }}"  data-agentemail="{{ $result->secondary_agent_email }}" data-propertyId="{{ $result->id }}"
                                                    data-propertydata="{{ json_encode($result) }}" data-messagefrom="{{ $result->secondary_messagefrom }}" >
                                                    <i class=" icon-Export me-2 icon-20"></i>
                                                    Contact Agent
                                                </button>
                                            </div>
                                        @endif
                                        @if($result->collaborated && auth()->user()->role->name == 'agent' && !($result->lead_id))
                                            <!-- property collaborated already but secondary agent not contacted yet to primary agent -->
                                            <div
                                                class="col-md-6 col-lg-6 d-flex justify-content-start justify-content-md-end pt-3 pt-md-0">
                                                <button type="button"  data-agentid="{{ $result->owner_id }}" data-agentname="{{ $result->agent_name }}" data-agentimage="{{ $result->agent_image }}" data-messagefrom="{{ $result->messagefrom }}" data-agentphone="{{ $result->agent_phone }}" data-agentcity="{{ $result->agent_city }}"  data-agentemail="{{ $result->agent_email }}" data-propertyId="{{ $result->id }}" class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center initiate_collaboration_{{ $result->id }}" data-propertydata="{{ json_encode($result) }}"
                                                    data-toggle="modal" data-target="#initiate_collaboration">
                                                    <i class=" icon-Export me-2 icon-20"></i>
                                                    Initiate Collaboration </button>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('modules.properties.includes.property_inquiry')
                    @elseif($listingType == 'developement-search')
                    <div class="main-card border-r-8 p-20 mb-20 b-color-white box-shadow-one">
                        <div class="main-card_flex d-block d-sm-flex align-center gap-2 gap-sm-4">


                            <div class="main-card-left">
                                <div class="main-card-img main_card_img_developer">
                                    <img src="{{ !empty($result->cover_image) ? $result->cover_image : asset('img/default-property.jpg') }}" alt="image">
                                </div>
                            </div>
                            <div class="d-flex flex-column w-100">
                                <div class="row">


                                    <div class="col-lg-9">
                                        <div class="gap-2 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                            <div class="main-card-bottom">
                                                <div
                                                    class="property-title property-h-responsive text-20 font-weight-700 lineheight-24 text-capitalize color-primary">
                                                    {{ $result->development_name ?? '' }}
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column gap-2">
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    <div class="property-price text-16 font-weight-700 lineheight-20 color-primary">
                                                    {{ !empty($result->min_selling_price)
                                                            ? config('Reading.default_currency') . ' ' . number_format($result->min_selling_price, 2)
                                                            : config('Reading.default_currency') . ' 0.00' }} - {{ !empty($result->max_selling_price)
                                                            ? config('Reading.default_currency') . ' ' . number_format($result->max_selling_price, 2)
                                                            : config('Reading.default_currency') . ' 0.00' }}</div>
                                                </div>
                                                <div class="text-14 font-weight-400 lineheight-18 border-r-4 b-white-grey color-black viewAgentbtn" style="width: fit-content;">
                                                    Default Agent's Commision: <span class="text-18 color-primary" style="font-weight: 600"> {{$result->agent_commission_per}}%</span>
                                                </div>

                                                <div class="d-flex gap-2 align-items-start ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $result->location ?? '' }}</div>

                                                </div>
                                                <div class="d-flex gap-2 gap-md-3">
                                                    <div class="d-flex gap-2 align-items-start">
                                                        <i class="icon-house_type text-20  color-b-blue "></i>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $result->building_license ?? '' }}</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-estimated_possession_date  text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $result->end_date ?? '' }}</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-2 mt-3 icon-my_profile">
                                                        <p class="">{{$result->developer_name ?? ''}}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 mt-3 mt-lg-0">
                                        <div
                                            class=" h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">

                                                <div class="">
                                                    <button type="button"
                                                    class="text-14 font-weight-400 lineheight-18 border-r-8 b-color-primary color-white-grey viewPropertyBtn" onclick="window.open('{{route(routeNamePrefix().'network_connections.viewDevelopment',$result->id ?? '')}}','_self')"
                                                    id="viewPropertyBtn">
                                                    View Development
                                                </button></div>

                                            <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                                <button type="button" class=" icon-share text-24 b-color-transparent color-b-blue"
                                                    >
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <div class="border_property-card  mt-20 pt-20">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center gap-12">
                                                <img src="{{!empty($result->user->companyDetails->company_image) ? $result->user->companyDetails->company_image : asset('img/real-inmo-sidebar.svg') }}" alt="image"
                                                    class="border-r-4" width="36" height="36">
                                                <h6 class="text-14 font-weight-700 color-b-blue">{{$result->user->companyDetails->company_name ?? ''}}</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex justify-content-end">

                                            <a href="{{ $result->brochure ?? '' }}" download
                                                class="d-flex border-r-8 b-color-primary color-white text-12 font-weight-700 lineheight-18 me-3 small-button bg_gradiant_hover "><span class="icon-download_black me-2 text-18"></span>
                                                Download Brochure</a>

                                                <a href="{{ $result->developmentFloorPlan->image ?? '' }}" download
                                                    class="d-flex border-r-8 text-12 font-weight-700 lineheight-18 border-primary color-primary small-button bg_gradiant_hover "><span class="icon-download_black me-2 text-18"></span>
                                                    Download Floor Plan</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif($listingType == 'agent-listing' || $listingType == 'agent-search')
                    <div class="main-card border-r-8 p-10 mb-15 b-color-white">
                        <div class="main-card_flex d-block d-sm-flex align-center gap-2">
                            <div class="main-card-left">
                                <div class="main-card-small-img main-card-img ">
                                    <img src="{{ !empty($result->image) ? $result->image : asset('img/default-user.jpg') }}"
                                        alt="image">
                                </div>
                            </div>
                            <div class="row w-100 ps-1 ps-md-2 ps-lg-3">
                                <div class="col-xl-9 col-lg-8">
                                    <div class=" main-card-one-header d-flex  justify-content-start flex-column gap-12">
                                        <div class="main-card-bottom">
                                            <div
                                                class="property-title property-h-responsive text-18 font-weight-700 lineheight-24 text-capitalize color-b-blue">
                                                {{ $result->name ?? 'N/A' }}
                                            </div>
                                        </div>
                                        <div
                                            class="main-card-center-one d-inline-block d-md-flex align-items-center gap-2 gap-md-3">
                                            <div class="d-flex gap-2 align-items-start ">
                                                <i class=" icon-location text-20 color-b-blue"></i>
                                                @if (!empty($result->isHidden))
                                                    <div
                                                        class="property-secondary  location_address  text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{-- {{$result->property_country ?? 'N/A'}} --}}
                                                        {{ $result->country ?? 'N/A' }}
                                                    </div>
                                                @else
                                                    <div
                                                        class="property-secondary  location_address  text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{-- {{$result->property_address ?? 'N/A'}} --}}
                                                        {{ $result->address ?? 'N/A' }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div
                                            class="d-grid d-sm-flex  gap-2 gap-sm-2 align-items-center main-card-two-small">
                                            @if (empty($result->isHidden))
                                                <div
                                                    class="d-flex gap-2 align-items-center main-card-two-small-one {{ !empty($result->isHidden) ? 'property-blur position-relative ' : '' }}">
                                                    <span class=" icon-Mail  text-20  color-b-blue text-break"></span>
                                                    <div
                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue text-break">
                                                        {{ !empty($result->isHidden) ? 'loremipsum@gmail.com' : $result->email }}
                                                    </div>
                                                </div>
                                            @endif
                                            @if (empty($result->isHidden))
                                                <div class="d-flex gap-2 align-items-center">
                                                    <span class="icon-phone text-20  color-b-blue"></span>
                                                    <div
                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $result->phone ?? 'N/A' }}
                                                    </div>
                                                </div>
                                            @endif
                                            @php
                                                if ($result->role->name=='agent') {
                                                    $class = 'home_protection';
                                                }
                                                else{
                                                    $class = 'house_type';
                                                }
                                            @endphp
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-{{!empty($class) ? $class : '' }} text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-16 font-weight-400 line-height-15 color-b-blue">
                                                    @if ($result->role->name=='agent')

                                                    {{ $result->total_properties ?? 0 }}
                                                    @else

                                                    {{ $result->total_development ?? 0 }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 mt-3 mt-lg-0">
                                    <div
                                        class="me-2 h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                        <div class="button-header d-flex gap-2 text-nowrap">
                                            @if (requestSegment(2) != 'view-agent')
                                                @if (
                                                    ((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer' || auth()->user()->role->name == 'customer') &&
                                                        !empty($result->request_status) &&
                                                        $result->request_status == config('constant.REQUEST_STATUS.ACCEPTED')) ||
                                                        (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin'))

                                                    <x-forms.crm-button :fieldData="[
                                                        'text' => trans('messages.View_Connection'),
                                                        'type' => 'button',
                                                        'url' => route(
                                                                routeNamePrefix() . 'agents.viewAgent',
                                                                [
                                                                    'id' => !empty($result->id) ? $result->id : null,
                                                                    'value' => !empty($value) ? $value : ($result->value ?? null),
                                                                ]
                                                            ),

                                                        'class' =>
                                                            'text-14 font-weight-400 lineheight-18 border-r-4 b-color-primary color-white-grey viewAgentbtn',
                                                        'id' => 'viewAgentBtn',
                                                        'attributes' => [],
                                                    ]" />
                                                @elseif(
                                                    (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' ||auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer' || auth()->user()->role->name == 'customer') &&
                                                        !empty($result->request_status) &&
                                                        $result->request_status == config('constant.REQUEST_STATUS.PENDING'))
                                                    <x-forms.crm-button :fieldData="[
                                                        'text' => trans('messages.Request_Pending'),
                                                        'type' => 'button',
                                                        'class' =>
                                                            'font-weight-400 text-14 lineheight-18 color-grey b-color-dark-grey d-flex align-items-center justify-content-center border-r-4 requestPendingBtn',
                                                        'id' => 'requestPendingBtn',
                                                        'attributes' => [],
                                                    ]" />
                                                @elseif(
                                                    (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' ||auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer' || auth()->user()->role->name == 'customer') &&
                                                        !empty($result->request_status) &&
                                                        $result->request_status == config('constant.REQUEST_STATUS.REJECTED'))
                                                    <x-forms.crm-button :fieldData="[
                                                        'text' => trans('messages.request_modal.rejected_request_text'),
                                                        'type' => 'button',
                                                        'class' =>
                                                            'font-weight-400 text-14 lineheight-18 color-grey b-color-dark-grey d-flex align-items-center justify-content-center h-24 w100 border-r-4 rejectedBtn',
                                                        'id' => 'rejectedBtn',
                                                        'attributes' => [],
                                                    ]" />
                                                @else
                                                    <x-forms.crm-button :fieldData="[
                                                        'text' => auth()->user()->role->name === 'developer'
                                                                ? trans('messages.Add_Agent') : trans('messages.Add_Connection'),
                                                        'type' => 'button',
                                                        'class' =>
                                                            ' text-14 font-weight-400 lineheight-18 border-r-4 b-color-primary color-white-grey addAgentBtn',
                                                        'id' => 'addAgentBtn',
                                                        'attributes' => ['data-id = ' . $result->id],
                                                    ]" />
                                                @endif
                                            @endif

                                        </div>

                                        @if ((auth()->user()->role->name == 'agent') && $listingType=='agent-search')
                                        <div class="=text-14 font-weight-400 lineheight-18 border-r-4 b-white-grey color-primary viewAgentbtn">

                                            {{ucfirst(getUserRoleName($result->user_role_id))}} Account
                                        </div>
                                        @endif

                                        {{-- <div class="d-flex align-items-center align-mobile-end"> --}}
                                            {{-- <x-forms.crm-button :fieldData="[
                                'type' => 'button',
                                'url'  => '',
                                'target' => '_self',
                                'class' => ' icon-share text-24 b-color-transparent color-primary',
                                'id' => 'shareBtn',
                                'attributes' => [],
                            ]" /> --}}
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif($listingType == 'developer-listing')
                    <div class="main-card border-r-8 p-10 mb-15 b-color-white">
                        <div class="main-card_flex d-block d-sm-flex align-center gap-2">
                            <div class="main-card-left">
                                <div class="main-card-small-img main-card-img ">
                                    <img src="{{ !empty($result->image) ? $result->image : asset('img/default-user.jpg') }}"
                                        alt="image">
                                </div>
                            </div>
                            <div class="row w-100 ps-1 ps-md-2 ps-lg-3">
                                <div class="col-xl-9 col-lg-8">
                                    <div class=" main-card-one-header d-flex  justify-content-start flex-column gap-12">
                                        <div class="main-card-bottom">
                                            <div
                                                class="property-title property-h-responsive text-18 font-weight-700 lineheight-24 text-capitalize color-b-blue">
                                                {{ $result->name ?? 'N/A' }}
                                            </div>
                                        </div>
                                        <div
                                            class="main-card-center-one d-inline-block d-md-flex align-items-center gap-2 gap-md-3">
                                            <div class="d-flex gap-2 align-items-start ">
                                                <i class=" icon-location text-20 color-b-blue"></i>
                                                @if (!empty($result->isHidden))
                                                    <div
                                                        class="property-secondary  location_address  text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{-- {{$result->property_country ?? 'N/A'}} --}}
                                                        {{ $result->country ?? 'N/A' }}
                                                    </div>
                                                @else
                                                    <div
                                                        class="property-secondary  location_address  text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{-- {{$result->property_address ?? 'N/A'}} --}}
                                                        {{ $result->address ?? 'N/A' }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div
                                            class="d-grid d-sm-flex  gap-2 gap-sm-2 align-items-center main-card-two-small">
                                            @if (empty($result->isHidden))
                                                <div
                                                    class="d-flex gap-2 align-items-center main-card-two-small-one {{ !empty($result->isHidden) ? 'property-blur position-relative ' : '' }}">
                                                    <span class=" icon-Mail  text-20  color-b-blue text-break"></span>
                                                    <div
                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue text-break">
                                                        {{ !empty($result->isHidden) ? 'loremipsum@gmail.com' : $result->email }}
                                                    </div>
                                                </div>
                                            @endif
                                            @if (empty($result->isHidden))
                                                <div class="d-flex gap-2 align-items-center">
                                                    <span class="icon-phone text-20  color-b-blue"></span>
                                                    <div
                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $result->phone ?? 'N/A' }}
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-house_type text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-16 font-weight-400 line-height-15 color-b-blue">
                                                    {{ $result->total_development ?? 0 }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-4 mt-3 mt-lg-0">
                                    <div
                                        class="me-2 h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                        <div class="button-header d-flex gap-2 text-nowrap">
                                            @if (requestSegment(2) != 'view-agent')
                                                @if (
                                                    ((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer' || auth()->user()->role->name == 'customer') &&
                                                        !empty($result->request_status) &&
                                                        $result->request_status == config('constant.REQUEST_STATUS.ACCEPTED')) ||
                                                        (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin'))

                                                    <x-forms.crm-button :fieldData="[
                                                        'text' => trans('messages.View_Connection'),
                                                        'type' => 'button',
                                                        'url' => route(
                                                                routeNamePrefix() . 'agents.viewAgent',
                                                                [
                                                                    'id' => !empty($result->id) ? $result->id : null,
                                                                    'value' => !empty($value) ? $value : ($result->value ?? null),
                                                                ]
                                                            ),

                                                        'class' =>
                                                            'text-14 font-weight-400 lineheight-18 border-r-4 b-color-primary color-white-grey viewAgentbtn',
                                                        'id' => 'viewAgentBtn',
                                                        'attributes' => [],
                                                    ]" />
                                                @elseif(
                                                    (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' ||auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer' || auth()->user()->role->name == 'customer') &&
                                                        !empty($result->request_status) &&
                                                        $result->request_status == config('constant.REQUEST_STATUS.PENDING'))
                                                    <x-forms.crm-button :fieldData="[
                                                        'text' => trans('messages.Request_Pending'),
                                                        'type' => 'button',
                                                        'class' =>
                                                            'font-weight-400 text-14 lineheight-18 color-grey b-color-dark-grey d-flex align-items-center justify-content-center border-r-4 requestPendingBtn',
                                                        'id' => 'requestPendingBtn',
                                                        'attributes' => [],
                                                    ]" />
                                                @elseif(
                                                    (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' ||auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer' || auth()->user()->role->name == 'customer') &&
                                                        !empty($result->request_status) &&
                                                        $result->request_status == config('constant.REQUEST_STATUS.REJECTED'))
                                                    <x-forms.crm-button :fieldData="[
                                                        'text' => trans('messages.request_modal.rejected_request_text'),
                                                        'type' => 'button',
                                                        'class' =>
                                                            'font-weight-400 text-14 lineheight-18 color-grey b-color-dark-grey d-flex align-items-center justify-content-center h-24 w100 border-r-4 rejectedBtn',
                                                        'id' => 'rejectedBtn',
                                                        'attributes' => [],
                                                    ]" />
                                                @else
                                                    <x-forms.crm-button :fieldData="[
                                                        'text' => auth()->user()->role->name === 'developer'
                                                                ? trans('messages.Add_Agent') : trans('messages.Add_Connection'),
                                                        'type' => 'button',
                                                        'class' =>
                                                            ' text-14 font-weight-400 lineheight-18 border-r-4 b-color-primary color-white-grey addAgentBtn',
                                                        'id' => 'addAgentBtn',
                                                        'attributes' => ['data-id = ' . $result->id],
                                                    ]" />
                                                @endif
                                            @endif

                                        </div>

                                        @if ((auth()->user()->role->name == 'agent') && $listingType=='agent-search')
                                        <div class="=text-14 font-weight-400 lineheight-18 border-r-4 b-white-grey color-primary viewAgentbtn">

                                            {{ucfirst(getUserRoleName($result->user_role_id))}} Account
                                        </div>
                                        @endif

                                        {{-- <div class="d-flex align-items-center align-mobile-end"> --}}
                                            {{-- <x-forms.crm-button :fieldData="[
                                'type' => 'button',
                                'url'  => '',
                                'target' => '_self',
                                'class' => ' icon-share text-24 b-color-transparent color-primary',
                                'id' => 'shareBtn',
                                'attributes' => [],
                            ]" /> --}}
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                        <!-- /////////////////////////////user-listing///////////////////////// -->
                    @elseif($listingType == 'user-listing')
                    <div class="main-card border-r-8 p-10 mb-15 b-color-white">
                        <div class="main-card_flex d-block d-sm-flex align-center gap-2">
                            <div class="main-card-left">
                                <div class="main-card-small-img main-card-img ">
                                    <img src="{{ !empty($result->image) ? $result->image : asset('img/default-user.jpg') }}"
                                        alt="image">
                                </div>
                            </div>
                            <div class="row w-100 ps-1 ps-md-2 ps-lg-3">
                                <div class="col-xl-9 col-lg-8">
                                    <div class="d-flex flex-column gap-12">
                                        <div class="main-card-bottom ">
                                            <div
                                                class="property-title property-h-responsive text-18 font-weight-700 lineheight-24 text-capitalize color-b-blue">
                                                {{ $result->name ?? 'N/A' }}
                                            </div>
                                        </div>
                                        <div
                                            class="main-card-center-one flex-column flex-md-row d-flex  align-items-start gap-12">
                                            <div class="d-flex gap-2 align-items-center">
                                                <i class="icon-agent_small text-20  color-b-blue"></i>
                                                <div
                                                    class="property-secondary  text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ ucfirst($result->role->name) }}
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center mt-1 mt-md-0">
                                                <i class=" icon-Mail  text-20  color-b-blue text-break"></i>
                                                <div
                                                    class="property-secondary  text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $result->email ?? 'N/A' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-phone text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $result->phone ?? 'N/A' }}
                                                </div>
                                            </div>
                                            @if ($result->role->name == 'agent')
                                                <div class="d-flex gap-2 align-items-center">
                                                    <span class="icon-home_protection text-20  color-b-blue"></span>
                                                    <div
                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $result->total_properties ?? 0 }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4">
                                    <div
                                        class="d-flex align-items-end gap-2 gap-md-3 justify-content-end h-100 pt-3 pt-sm-0">
                                        @if ($result->role->name == 'agent')
                                            <x-forms.crm-button :fieldData="[
                                                'type' => 'button',
                                                'url' => route(routeNamePrefix() . 'user.userProperties', $result->id),
                                                'target' => '_self',
                                                'class' => ' icon-share text-24 b-color-transparent color-primary',
                                                'id' => 'shareBtn',
                                                'attributes' => [],
                                            ]" />
                                        @endif
                                        <x-forms.crm-button :fieldData="[
                                            'type' => 'button',
                                            'url' => route(routeNamePrefix() . 'user.edit', $result->id),
                                            'target' => '_self',
                                            'class' => ' icon-edit text-24 b-color-transparent color-primary',
                                            'id' => 'editBtn',
                                            'attributes' => [],
                                        ]" />
                                        <x-forms.crm-button :fieldData="[
                                            'type' => 'button',
                                            //'url'  => route(routeNamePrefix().'user.destroy',$result->id),
                                            'target' => '_self',
                                            'class' =>
                                                'icon-Delete  text-24 b-color-transparent deleteUserBtn color-primary',
                                            'id' => 'deleteBtn',
                                            'attributes' => ['data-id = ' . $result->id, 'data-name = ' . $result->name],
                                        ]" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif($listingType == 'development-listing')

                    <div class="main-card border-r-8 p-20 mb-20 b-color-white box-shadow-one">
                        <div class="main-card_flex d-block d-sm-flex align-center gap-2 gap-sm-4">


                            <div class="main-card-left">
                                <div class="main-card-img main_card_img_developer">
                                    <img src="{{ !empty($result->cover_image) ? $result->cover_image : asset('img/default-property.jpg') }}" alt="image">
                                </div>
                            </div>
                            <div class="d-flex flex-column w-100">
                                <div class="row">


                                    <div class="col-lg-9">
                                        <div class="gap-2 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                            <div class="main-card-bottom">
                                                <div
                                                    class="property-title property-h-responsive text-20 font-weight-700 lineheight-24 text-capitalize color-primary">
                                                    {{ $result->development_name ?? '' }}
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column gap-2">
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    <div class="property-price text-16 font-weight-700 lineheight-20 color-primary">
                                                    {{ !empty($result->min_selling_price)
                                                            ? config('Reading.default_currency') . ' ' . number_format($result->min_selling_price, 2)
                                                            : config('Reading.default_currency') . ' 0.00' }} - {{ !empty($result->max_selling_price)
                                                            ? config('Reading.default_currency') . ' ' . number_format($result->max_selling_price, 2)
                                                            : config('Reading.default_currency') . ' 0.00' }}</div>
                                                </div>


                                                <div class="d-flex gap-2 align-items-start ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $result->location ?? '' }}</div>

                                                </div>
                                                <div class="d-flex gap-2 gap-md-3">
                                                    <div class="d-flex gap-2 align-items-start">
                                                        <i class="icon-house_type text-20  color-b-blue "></i>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $result->building_license ?? '' }}</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-development_id  text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $result->development_number ?? '' }}</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-estimated_possession_date  text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $result->end_date ?? '' }}</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-3 mt-3">
                                                    <div class="card-units">
                                                        <h6 class="text-14 font-weight-400 color-primary">Number of Units:</h6>
                                                        <h4 class="text-20 font-weight-700 color-primary">{{$result->total_units ?? 0}}</h4>
                                                    </div>
                                                    <div class="card-units">
                                                        <h6 class="text-14 font-weight-400 color-primary">Units Sold:</h6>
                                                        <h4 class="text-20 font-weight-700 color-primary">{{$result->total_units_sold ?? 0}}</h4>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 mt-3 mt-lg-0">
                                        <div
                                            class=" h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                            @if($result->status == 'under_construction')
                                            <div class="slider-top-right in_progress">
                                                <div class="">
                                                {{trans((getModalSpecificData('Development','STATUS',trans($result->status) ?? '')))}}</div>
                                            </div>
                                            @else
                                            <div class="slider-top-right pink_button_account">
                                                <div class="">
                                                {{trans((getModalSpecificData('Development','STATUS',trans($result->status) ?? '')))}}</div>
                                            </div>
                                            @endif

                                            <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                                <button type="button" class=" icon-share text-24 b-color-transparent color-b-blue"
                                                    >
                                                </button>
                                                <button type="button" class=" icon-edit text-24 b-color-transparent color-b-blue editDevelopmentBtn" onclick="window.open('{{route(routeNamePrefix().'developments.manage',$result->id).'?action=edit'}}','_self')"
                                                    >
                                                </button>
                                                <button type="button" class=" icon-Delete text-24 b-color-transparent color-b-blue removeDevelopmentBtn" data-id="{{ $result->id }}"
                                data-name="{{ $result->development_name ?? '' }}"
                                                    >
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="border_property-card  mt-20 pt-20">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center gap-12">
                                                <img src="{{!empty($result->company_image) ? getFileUrl($result->company_image,'user_company_details') : asset('img/logoplaceholder.svg') }}" alt="image"
                                                    class="border-r-4" width="36" height="36">
                                                <h6 class="text-14 font-weight-700 color-b-blue">{{$result->company_name ?? ''}}</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex justify-content-end">
                                            <button type="button"
                                                class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  small-button gardient-button " onclick="window.open('{{route(routeNamePrefix().'developments.manage',$result->id)}}','_self')">
                                                Manage Development
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

        @else
            @if ($listingType == 'customer-listing')
                @php
                        $customeClass = '';
                @endphp
                @if ($result->current_status == 'completed' && $result->is_active == '1')
                @php
                    $customeClass = 'viewCustomerInviteBtn';
                @endphp                    
                @endif
                <tr class="{{($result->current_status != 'completed' && $result->is_active == 0 ) ? 'remaining_account-opacity' : ''}}">
                    <td class="cursor-pointer {{$customeClass}}" data-id="{{ $result->id }}" data-name="{{ $result->name ?? '' }}" > <img src="{{ !empty($result->image) ? $result->image : asset('img/default-user.jpg') }}"width="36" height="36" alt="image" class="border-r-4"></td>
                    <td class="cursor-pointer {{$customeClass}}"  data-id="{{ $result->id }}" data-name="{{ $result->name ?? '' }}"><span class="ms-2">{{ $result->name ?? '-----' }}</span></td>
                    <td class="cursor-pointer {{$customeClass}}"  data-id="{{ $result->id }}" data-name="{{ $result->name ?? '' }}">{{ $result->email ?? '-----' }}</td>
                    <td class="cursor-pointer {{$customeClass}}"  data-id="{{ $result->id }}" data-name="{{ $result->name ?? '' }}">{{ $result->phone ?? '-----' }}</td>
                    <td class="cursor-pointer {{$customeClass}}"  data-id="{{ $result->id }}" data-name="{{ $result->name ?? '' }}">{{ date('d/m/Y', strtotime($result->created_at)) }}</td>
                    <td class="cursor-pointer {{$customeClass}}"  data-id="{{ $result->id }}" data-name="{{ $result->name ?? '' }}">{{ !empty($result->last_login) ? date('d/m/Y', strtotime($result->last_login)) : '-----' }}</td>
                    <!--here -->
                    <td class="change_active cursor-pointer {{$customeClass}}" data-id="{{ $result->id }}" data-name="{{ $result->name ?? '' }}"><span
                            class="{{ $result->is_active == 1 ? 'span_active span_complate_one' : 'span_pending' }}">
                            {{ $result->is_active == 1 ? 'Active' : 'Inactive' }}
                        </span></td>
                    <td>
                        @if ($result->is_active == 1)
                            <button class="b-color-transparent removeCustomerInviteBtn" data-id="{{ $result->id }}"
                                data-name="{{ $result->name ?? '' }}"> <i
                                    class=" icon-Delete icon-18 color-b-blue "></i></button>
                        @else
                            <button class="b-color-transparent editCustomerInviteBtn" data-id="{{ $result->id }}"
                                                                           data-name="{{ $result->name ?? '' }}"> <i
                                                                               class="  icon-edit icon-18 color-b-blue "></i></button>
                        @endif
                        {{-- <button class="b-color-transparent viewCustomerInviteBtn" data-id="{{ $result->id }}" data-name="{{ $result->name ?? '' }}"> <i class="  icon-eye  icon-18 color-b-blue "></i></button> --}}

                    </td>
                </tr>
                @elseif ($listingType == 'team-management-listing')
                <tr class="{{($result->current_status != 'completed' && $result->is_active == 0 ) ? 'remaining_account-opacity' : ''}}"style="cursor: pointer;" >
                    <td @if ($result->is_active == '0' && $result->current_status != 'completed')
                        disabled
                    @else
                        onclick="window.open('{{ route(routeNamePrefix().'team_management.show', $result->id) }}', '_self')"
                    @endif ><img src="{{ !empty($result->image) ? $result->image : asset('img/default-user.jpg') }}"
                             width="36" height="36" alt="image" class="border-r-4"></td>
                    <td   @if ($result->is_active == '0' && $result->current_status != 'completed')
                        disabled
                    @else
                        onclick="window.open('{{ route(routeNamePrefix().'team_management.show', $result->id) }}', '_self')"
                    @endif><span class="ms-2">{{ $result->name ?? '-----' }}</span></td>
                    <td   @if ($result->is_active == '0' && $result->current_status != 'completed')
                        disabled
                    @else
                        onclick="window.open('{{ route(routeNamePrefix().'team_management.show', $result->id) }}', '_self')"
                    @endif>{{ $result->email ?? '-----' }}</td>
                    <td  @if ($result->is_active == '0' && $result->current_status != 'completed')
                        disabled
                    @else
                        onclick="window.open('{{ route(routeNamePrefix().'team_management.show', $result->id) }}', '_self')"
                    @endif>{{ $result->phone ?? '-----' }}</td>
                    <td   @if ($result->is_active == '0' && $result->current_status != 'completed')
                        disabled
                    @else
                        onclick="window.open('{{ route(routeNamePrefix().'team_management.show', $result->id) }}', '_self')"
                    @endif>{{ date('d/m/Y', strtotime($result->created_at)) }}</td>
                    <td   @if ($result->is_active == '0' && $result->current_status != 'completed')
                        disabled
                    @else
                        onclick="window.open('{{ route(routeNamePrefix().'team_management.show', $result->id) }}', '_self')"
                    @endif>{{ $result->city ?? '-----' }}</td>
                    <td   @if ($result->is_active == '0' && $result->current_status != 'completed')
                        disabled
                    @else
                        onclick="window.open('{{ route(routeNamePrefix().'team_management.show', $result->id) }}', '_self')"
                    @endif>{{ str_replace(" ", "-", ucwords(str_replace("-", " ", $result->role->name))) }}</td>
                    <td>
                        @if (!empty($result->parent_user_id))
                        <a href="javascript:void(0)">
                            <div class="event-checkbox">
                                <label class="switch">
                                    <input type="checkbox" name="team_management_status_checkbox" value="1"
                                           class="form-control"
                                           onclick="event.stopPropagation(); window.open('{{ route(routeNamePrefix().'team_management.updateStatus', $result->id) }}', '_self')"
                                           {{ $result->is_active == 1 ? 'checked' : '' }}
                                           {{ ($result->current_status != 'completed' && $result->is_active == 0 ) ? 'disabled' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </a>
                        @endif
                        
                    </td>
                    <td>
                        @if($result->current_status != 'completed' && $result->is_active == 0)
                        <button class="b-color-transparent editTeamMemberBtn" data-id="{{ $result->id }}" data-name="{{ $result->name ?? '' }}" >
                            <i class="icon-edit icon-18 color-b-blue"></i>
                        </button>
                        @elseif($result->current_status == 'completed')
                        @if (!empty($result->parent_user_id))
                            <button class="b-color-transparent removeTeamMemberBtn" data-id="{{ $result->id }}" data-name="{{ $result->name ?? '' }}">
                                <i class="icon-Delete icon-18 color-b-blue"></i>
                            </button>
                            @endif 
                            @if (empty($result->parent_user_id))
                            <button class="b-color-transparent " data-id="{{ $result->id }}" data-name="{{ $result->name ?? '' }}" onclick="window.open('{{ route(routeNamePrefix().'team_management.show', $result->id) }}', '_self')">
                                <i class="icon-eye icon-18 color-b-blue"></i>
                            </button>
                            @endif
                        @endif
                    </td>
                </tr>

            @elseif($listingType == 'development-unit-listing')

            <tr>
                <td><input type="checkbox" name="checkbox" value="1" class="checkbox checkboxone  fileCheckbox developmentUnitCheckbox"
                        data-id="{{$result->id}}" data-reference={{$result->reference ?? '-----'}}></td>
                <td>{{$result->reference ?? '-----'}}</td>
                <td>{{$result->type->name ?? '-----'}}</td>
                <td>{{ !empty($result->size) ? number_format($result->size, 2) : '0.00' }}
                {{ $result->dimension_type === 'Feet' ? 'ft' : 'm' }}<sup>2</sup></td>
                <td class="table_prize">{{ !empty($result->price)
                                                            ? config('Reading.default_currency') . ' ' . number_format($result->price, 2)
                                                            : config('Reading.default_currency') . ' 0.00' }}</td>
                <td class="change_active">
                    <button data-toggle="modal" data-target="#add_unit" type="button">
                        @if($result->status == 'published')
                        <span class="span_active span_complate_one">
                            Published
                        </span>
                        @elseif($result->status == 'draft')
                        <span class="span_complete">Draft</span>
                        @elseif($result->status == 'sold')
                        <span class="span_pending span_complate_one">
                            Sold
                        </span>
                        @endif

                    </button>
                </td>
                <td class="d-flex align-items-center gap-3 justify-content-end">
                <button onclick="window.open('{{route(routeNamePrefix().'properties.show',$result->reference)}}','_self')"
                    class="b-color-transparent" data-id="4"
                    data-name="Gabriel John" > <i
                        class="icon-eye icon-20 color-b-blue "></i></button>
                @if($result->status != 'sold')
                <button onclick="window.open('{{route(routeNamePrefix().'properties.edit.new',$result->reference)}}','_self')" class="b-color-transparent" data-id="4"
                    data-name="Gabriel John" > <i
                        class="icon-edit icon-20 color-b-blue "></i></button>
                <button class="b-color-transparent removeDevelopmentUnitBtn" data-id="{{$result->id}}"
                    data-name="{{$result->name}}" > <i
                        class="icon-Delete icon-20 color-b-blue "></i></button>
                </td>
                @endif
            </tr>
            @elseif($listingType == 'property-listing-company')

            <tr>
                <td> <img src="{{ !empty($result->cover_image) ? $result->cover_image : asset('img/default-property.jpg') }}"
                width="36" height="36" alt="image" class="border-r-4"></td>
                <td>{{$result->reference ?? '-----'}}</td>
                <td>{{ mb_substr($result->name, 0, 20)."..." ?? '' }}</td>
                <td>{{ date('d/m/Y H:i:s', strtotime($result->created_at)) }}</td>
                <td>{{ $result->agent_name ?? '' }}</td>
                <td>{{ $result->city ?? '' }}</td>
                <td>{{ !empty($result->price)
                                                            ? config('Reading.default_currency') . ' ' . number_format($result->price, 2)
                                                            : config('Reading.default_currency') . ' 0.00' }}</td>



                <td>
                <button onclick="window.open('{{route(routeNamePrefix().'properties.show',$result->reference)}}','_self')"
                    class="b-color-transparent"
                    data-name="Gabriel John"> <i
                        class="icon-eye icon-20 color-b-blue "></i></button></td>
            </tr>
            @elseif($listingType == 'assign-property-listing')
            <tr>
                <td><input type="checkbox" class="assign-property-checkbox" data-id="{{ $result->id }}" data-reference="{{ $result->reference }}"></td>
                <td>{{$result->reference ?? '---'}}</td>
                <td>{{ mb_substr($result->name, 0, 20)."..." ?? '' }}</td>
                <td>{{ $result->type->name ?? '' }}</td>
                <td>{{ mb_substr($result->city,0,20)."..." ?? '' }}</td>
                <td>{{ $result->size ?? '' }}</td>
                <td>{{ !empty($result->price)? config('Reading.default_currency') . ' ' . number_format($result->price, 2): config('Reading.default_currency') . ' 0.00' }}
                    </td>

            </tr>
            @elseif ($listingType == 'customer-listing-company')
                @if ($result->is_active == 1)
                <tr>
                    <td> <img src="{{ !empty($result->image) ? $result->image : asset('img/default-user.jpg') }}"
                            width="36" height="36" alt="image" class="border-r-4"></td>
                    <td><span class="ms-2">{{ $result->name ?? '-----' }}</span></td>
                    <td>{{ $result->email ?? '-----' }}</td>
                    <td>{{ $result->phone ?? '-----' }}</td>
                    <td>{{ $result->added_by_name ?? '-----' }}</td>
                    <td>{{ date('d/m/Y', strtotime($result->created_at)) }}</td>
                    <td>{{ $result->city ?? '-----' }}</td>

                    <td>

                        <button class="b-color-transparent viewCustomerInviteBtn" data-id="{{ $result->id }}"
                            data-name="{{ $result->name ?? '' }}"> <i
                                class="icon-eye  icon-18 color-b-blue "></i></button>

                    </td>
                </tr>
                @endif

                @elseif ($listingType == 'property_lead_list')
                <tr>
                    <td> <img
                        src="{{ !empty($result->propertyDetail->cover_image) ? $result->propertyDetail->cover_image : asset('img/default-user.jpg') }}"
                        width="36" height="36" alt="image" class="border-r-4"></td>
                <td><span class="ms-2">{{ !empty($result->propertyDetail->reference) ? $result->propertyDetail->reference : '' }}</span></td>
                <td class="title_wrap title_dashboard-wrap">
                    <span>{{ !empty($result->propertyDetail->name) ? $result->propertyDetail->name : '' }}</span>
                </td>
                <td> {{ date('d/m/Y', strtotime($result->created_at)) }}
                    <br />{{ date('h:i A', strtotime($result->created_at)) }}
                </td>
                <td>{{ $result->name }}</td>
                <td>{{ ucfirst($result->account_type) }}</td>
                <td>{{ ucfirst($result->city) }}</td>
                <td class="table_prize">
                    {{ config('Reading.default_currency') . ' ' . number_format(!empty($result->propertyDetail->price) ? $result->propertyDetail->price : 0, 2) }}
                </td>
                <td> <a href="{{ route(routeNamePrefix() . 'messages.index') }}"
                        class="read_message position-relative"> <i
                            class=" icon-message icon-20 color-b-blue "></i></a>
                </td>
                <td> <a href="javascript:void(0)"> <i class=" icon-eye icon-20 color-b-blue "
                            onclick="openSidebar({{ $result->id }})"></i></a>
                </td>


                </tr>

            @elseif($listingType == 'beta-agent-listing')
                <tr>
                    <td> <span class="ms-2">{{ $result->name ?? '-----' }}</span></td>
                    <td>{{ $result->email ?? '-----' }}</td>
                    <td>{{ $result->phone ?? '-----' }}</td>
                    <td>{{ $result->company_name ?? '-----' }}</td>
                    <td>{{ $result->role ?? '-----' }}</td>
                    <td>{{ date('d/m/Y', strtotime($result->created_at)) }}</td>

                </tr>
            @elseif($listingType == 'newsletter-listing')
            <tr>

                    <td>{{ $result->email ?? '-----' }}</td>
                    <td>{{ date('d/m/Y', strtotime($result->created_at)) }}</td>

                </tr>
            @elseif($listingType == 'file-listing')
            @include('modules.files.includes.table_row')
            @elseif($listingType == 'beta-developer-listing')
            <tr>
                    <td> <span class="ms-2">{{ $result->name ?? '-----' }}</span></td>
                    <td>{{ $result->email ?? '-----' }}</td>
                    <td>{{ $result->phone ?? '-----' }}</td>
                    <td>{{ $result->company_name ?? '-----' }}</td>
                    <td>{{ $result->country ?? '-----' }}</td>
                    <td>{{ date('d/m/Y', strtotime($result->created_at)) }}</td>

                </tr>
@endif
@endif
@endforeach
@else
    @if (
        $listingType != 'customer-listing' &&
            $listingType != 'beta-agent-listing' &&
            $listingType != 'beta-developer-listing' &&
            $listingType != 'newsletter-listing' &&
            $listingType != 'file-listing' &&
            $listingType != 'property_lead_list' &&
            $listingType != 'property-search' && $listingType != 'team-management-listing' && $listingType != 'development-unit-listing' && $listingType != 'property-listing-company' && $listingType != 'customer-listing-company'
            )
        @include('components.tables.empty-table')
@else
@if ($listingType == 'customer-listing')
<tr>
                <td colspan="6" class="text-center">

                    <p>No customers found</p>
                </td>
            </tr>
        @elseif ($listingType == 'team-management-listing')
            <tr>
                <td colspan="12" class="text-center">

                    <p>No Team Members found</p>
                </td>
            </tr>
        @elseif ($listingType == 'development-unit-listing')
            <tr>
                <td colspan="12" class="text-center">

                    <p>No Units found</p>
                </td>
            </tr>
        @elseif ($listingType == 'property-listing-company')
        <tr>
            <td colspan="12" class="text-center">

                <p>No Properties Found</p>
            </td>
        </tr>
        @elseif ($listingType == 'customer-listing-company')
        <tr>
            <td colspan="12" class="text-center">

                <p>No Customers Found</p>
            </td>
        </tr>
        @elseif($listingType == 'beta-agent-listing')
            <tr>
                <td colspan="6" class="text-center">

                    <p>No beta agents found</p>
                </td>
            </tr>
            @elseif($listingType == 'property_lead_list')
            <tr>
                <td colspan="6" class="text-center">

                    <p>No propety lead found</p>
                </td>
            </tr>
@elseif($listingType == 'beta-developer-listing')
<tr>
                <td colspan="6" class="text-center">

                    <p>No beta developers found</p>
                </td>
            </tr>
@elseif($listingType == 'newsletter-listing')
<tr>
                <td colspan="2" class="text-center">

                    <p>No newsletters found</p>
                </td>
            </tr>
@elseif($listingType == 'file-listing')
<tr>
                <td colspan="5" class="text-center">

                    <p>{{ trans('messages.my-files.no_files_found') }}</p>
                </td>
            </tr>
@elseif($listingType == 'property-search')
<div class="b-color-white box-shadow-one border-r-8  p-20 mt-20">
            <div class="d-block justify-content-between align-items-center text-center flex-wrap gap-2">
                <h6 class="p-10">No results found</h6>
            </div>
        </div>
@endif
    @endif
@endif

@push('scripts')
    <script src="{{ asset('assets/js/components/tables/custom-table.js') }}"></script>
    <script>
        var routeUrl = "{{ $listRouteUrl ?? '' }}";
        var sectionName = "{{ $model ?? '' }}";
        var collaborateUrl = "{{ route(routeNamePrefix() .'property.collaborate') }}";
        var customerInquiry = "{{ route(routeNamePrefix() .'property.customerInquiry') }}";
        var resetFormRoute = "{{ route(routeNamePrefix() . 'miscellaneous.refreshFilterData') }}";
        var addAgentUrl = "{{ route(routeNamePrefix() . 'miscellaneous.sendRequestToAgent') }}";
        var propertyDeleteUrl = "{{ route(routeNamePrefix() . 'properties.destroy', ':id') }}";
        var propertyAddPropertyUrl = "{{ route(routeNamePrefix() . 'properties.add_property', ':id') }}";
        var userDeleteUrl = "{{ route(routeNamePrefix() . 'user.destroy', ':id') }}";
        var userDeleteConfirmText = "{{ trans('messages.confirm_popup.You_are_attempting_to_delete_User') }}";
        var propertyDeleteConfirmText = "{{ trans('messages.confirm_popup.You_are_attempting_to_delete_Your_Property') }}";
        var areYouSureTextConfirmPopup = "{{ trans('messages.confirm_popup.Are_you_sure') }}";
        var deleteTextConfirmPopup = "{{ trans('messages.confirm_popup.Delete') }}";
        var customerDeleteConfirmText1 =
            "{{ trans('messages.confirm_popup.You_are_attempting_to_remove_customer_text_1') }}";
        var customerDeleteConfirmText2 = "{{ trans('messages.confirm_popup.You_are_attempting_to_remove_customer_text_2') }}";
        var customerDeleteUrl = "{{ route(routeNamePrefix() . 'customers.destroy', ':id') }}";
        var removeTextConfirmPopup = "{{ trans('messages.confirm_popup.Remove') }}";
        var fileDeleteUrl = "{{ route(routeNamePrefix() . 'files.destroy', ':id') }}";
        var fileDeleteConfirmText = "{{ trans('messages.confirm_popup.You_are_attempting_to_delete_Your_File') }}";
        var filesDeleteConfirmText = "{{ trans('messages.confirm_popup.You_are_attempting_to_delete_Your_Files') }}";
        var teamMemberDeleteConfirmText1 =
            "{{ trans('You Are Attempting To Remove ').((auth()->user()->role->name == 'agent') ? 'Agent' : 'Developer') }}";
        var teamMemberDeleteConfirmText2 = "{{ trans('From Your Company') }}";
        var teamMemberDeleteUrl = "{{ route(routeNamePrefix() . 'team_management.destroy', ':id') }}";
        var developmentDeleteUrl = "{{ route(routeNamePrefix() . 'developments.destroy', ':id') }}";
        var developmentDeleteConfirmText = "{{ trans('You Are Attempting To Delete Development') }}";
    </script>
    @if(auth()->user()->role->name == 'customer')
        <script src="{{ asset('assets/js/modules/properties/customer.js') }}"></script>
    @endif
    {{-- <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> --}}

{{--
<script>
$(window).on('load', function() {
  var slider = $('.slider_card_fancybox').slick({
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    fade: true,
    cssEase: 'linear'
  });

  slider.slick('setPosition');
});

</script> --}}
@endpush
