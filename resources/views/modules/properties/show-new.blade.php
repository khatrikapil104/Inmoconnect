@extends('layouts.app')
@section('content')
    @push('styles')

        {{-- slick-slider --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

        {{-- title --}}
        @section('title')
            {{ trans('messages.properties.View_Property') }} Inmoconnect
        @endsection

        {{-- main-section --}}
        <div class="overlay" id="overlay"></div>
        <div id="page-content-wrapper" class="min-vh-100 b-color-background">
            <div class="crm-main-content">

                {{-- breadcrumb  --}}
                @if(requestSegment(1) == 'properties' && requestSegment(2) == 'view')
                    <x-forms.crm-breadcrumb
                    :fieldData="[['url' => route(routeNamePrefix().'properties.index'),'label' => trans('messages.sidebar.Property_Listing')],['url' => '','label' => $property->agent_name ?? ''],['url' => '','label' => trans('messages.properties.View_Property')]]" />
                    @elseif(requestSegment(1) == 'properties' && requestSegment(2) == 'search')
                    <x-forms.crm-breadcrumb
                    :fieldData="[['url' => route(routeNamePrefix().'propertySearch.index'),'label' => 'Property Search'],['url' => '','label' => $property->agent_name ?? ''],['url' => '','label' => trans('messages.properties.View_Property')]]" />
                @elseif(requestSegment(1) == 'properties' && requestSegment(2) == 'search' && requestSegment(3) == 'view')
                    <x-forms.crm-breadcrumb
                        :fieldData="[['url' => route(routeNamePrefix().'propertySearch.index'),'label' => trans('messages.sidebar.Property_Search')],['url' => '','label' => $property->agent_name ?? ''],['url' => '','label' => trans('messages.properties.View_Property')]]" />
                @elseif(requestSegment(1) == 'agents' && requestSegment(2) == 'view-agent')
                    <x-forms.crm-breadcrumb
                        :fieldData="[['url' => route(routeNamePrefix().'agents.index'),'label' => trans('messages.sidebar.Agents')],['url' => !empty($checkIfValidUser) ? route(routeNamePrefix().'agents.viewAgent',$checkIfValidUser->id) : '','label' => !empty($checkIfValidUser->name) ? $checkIfValidUser->name : ''],['url' => '','label' => trans('messages.properties.View_Property')]]" />
                @elseif(requestSegment(1) == 'users' && requestSegment(2) == 'properties')
                    <x-forms.crm-breadcrumb
                        :fieldData="[['url' => route(routeNamePrefix().'user.index'),'label' => trans('messages.sidebar.Users')],['url' => route(routeNamePrefix().'user.index'),'label' => trans('messages.properties.My_Users')],['url' => !empty($checkIfValidUser) ? route(routeNamePrefix().'user.userProperties',$checkIfValidUser->id) : '','label' => !empty($checkIfValidUser->name) ? $checkIfValidUser->name : ''],['url' => '','label' => trans('messages.properties.View_Property')]]" />
                @elseif(requestSegment(1) == 'messages' && requestSegment(2) == 'view')
                    <x-forms.crm-breadcrumb
                    :fieldData="[['url' => route(routeNamePrefix().'properties.index'),'label' => trans('messages.sidebar.Property_from_messages')],['url' => '','label' => trans('messages.properties.View_Property')]]" />
                @endif
                {{-- end-breadcrumb --}}
                
                {{-- form --}}
                <form class="" id="editPropertyForm">
                    
                    {{-- addres/prize --}}
                    <div class="row mb-30">
                        <div class="col-sm-8 col-md-8 col-lg-9">
                            {{-- property-name --}}
                            <div class="property-header-details d-flex align-items-center justify-content-between">
                                <div class="property-details property-name">
                                    <h4 class="text-18 font-weight-700 lineheight-22 color-b-blue letter-s-48">
                                        {{ $property->name }}
                                    </h4>
                                </div>
                            </div>

                            <div class="property-detail-share d-flex justify-content-between align-items-center pt-12">
                                <div class="property-details d-grid d-sm-flex flex-column gap-12 main-card-two-small">
                                   {{-- address --}}
                                    <div
                                        class="property-address main-card-two-small-one d-flex align-items-center gap-1 {{ !empty($isHidden) ? 'property-blur ' : '' }}position-relative">
                                        <i class="icon-location text-14 d-flex align-items-center gap-1"></i>
                                        @if (!empty($isHidden))
                                            <p class="text-12 color-b-blue font-weight-400 line-height-15">Lorem ipsum dolor sit
                                                consectetur</p>
                                        @else
                                            <p class="text-14 color-b-blue font-weight-400 line-height-15">
                                                {{ $property->address ?? '' }}</p>
                                        @endif
                                    </div>

                                    <div class="d-flex align-items-center gap-1 gap-sm-3">
                                       {{-- property-sale --}}
                                        <div class="property-sale d-flex align-items-center gap-1">
                                            <i class="icon-sale text-8 color-b-blue"></i>
                                            <p class="text-14 color-b-blue font-weight-400 lineheight-18">
                                                {{ $property->listed_as }}
                                            </p>
                                        </div>
                                        {{-- reference id --}}
                                        <div class="property-number d-flex align-items-center gap-1">
                                            <i class="icon-property_id text-14 color-b-blue"></i>
                                            <h6 class="text-14 color-b-blue font-weight-400 lineheight-18">
                                                {{ $property->reference }}
                                            </h6>
                                        </div>
                                    </div>
                                    @if($property->collaborated)
                                        <i class="fa-solid fa-handshake"></i>
                                    @else

                                        {{-- Open For Collaboration --}}
                                        @include('modules.properties.includes.modal')
                                        <div class="d-flex align-items-center gap-3 collabration_open" >
                                            <h6 class="color-primary text-14 collabrationOpen" data-id="{{ $property->id }}" id="property-checkbox-{{ $property->id }}" name="property-checkbox"  class="property-checkbox" data-name="{{$property->name}}" data-image="{{ !empty($property->cover_image) ? $property->cover_image : asset('img/default-property.jpg') }}" data-sqft="{{ !empty($property->size) ? number_format($property->size, 2) : '0.00' }}{{ $property->dimension_type === 'Feet' ? 'ft' : 'm' }}"
                                                >
                                            Open For Collaboration</h6>
                                            <div class="event-checkbox d-flex">
                                                <label class="switch">
                                                    <input type="checkbox" name="is_project_base_event" id="is_project_base_event" value="1"
                                                        class="form-control"  data-id="{{ $property->id }}"  name="property-checkbox"  class="property-checkbox" data-name="{{$property->name}}" data-image="{{ !empty($property->cover_image) ? $property->cover_image : asset('img/default-property.jpg') }}" data-sqft="{{ !empty($property->size) ? number_format($property->size, 2) : '0.00' }}{{ $property->dimension_type === 'Feet' ? 'ft' : 'm' }}">
                                                    <span class="slider">
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div
                            class="gap-3 col-sm-4 col-md-4 col-lg-3 d-flex flex-column justify-content-between align-items-start align-items-sm-end mt-4 pt-4 mt-sm-0 pt-sm-0">
                            <!-- property-price -->
                            <div class="property-details">
                                @if (!empty($isHidden))
                                    <p
                                        class="lineheight-32 text-32 font-weight-700 line-height-40 etter-s-64 color-b-blue propert-price-blur position-relative">
                                        <span
                                            class="propert-price-blurs text-nowrap">{{ !empty($property->price)
                                                ? config('Reading.default_currency') . ' ' . substr($property->price, 0, 2) . '000'
                                                : config('Reading.default_currency') . ' 0.00' }}</span>
                                    </p>
                                @else
                                    <p class="text-32 font-weight-700 line-height-40 etter-s-64 color-b-blue position-relative">
                                        <span
                                            class="propert-price-blurs text-nowrap">{{ !empty($property->price)
                                                ? config('Reading.default_currency') . ' ' . number_format($property->price, 2)
                                                : config('Reading.default_currency') . ' 0.00' }}</span>
                                    </p>
                                @endif
                            </div>

                            <!-- buttons -->
                            <div class="row">
                                <div class="col-md-12 d-flex gap-2 gap-md-3">
                                    @if (auth()->user()->id == $property->owner_id ||
                                            (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin'))
                                        <button type="button" class="icon-share text-24 b-color-transparent color-primary">
                                            @if ($property->status !='sold')
                                        <x-forms.crm-button :fieldData="[
                                            'type' => 'button',
                                            'url' =>
                                                requestSegment(1) == 'agents'
                                                    ? (!empty($checkIfValidUser->id )
                                                        ? route(routeNamePrefix() . 'agents.userPropertiesEdit', [
                                                            $checkIfValidUser->id,
                                                            $property->reference,
                                                        ])
                                                        : route(
                                                            routeNamePrefix() . 'properties.edit.new',
                                                            $property->reference,
                                                        ))
                                                    : (requestSegment(1) == 'users'
                                                        ? (!empty($checkIfValidUser->id)
                                                            ? route(routeNamePrefix() . 'user.userPropertiesEdit', [
                                                                $checkIfValidUser->id,
                                                                $property->reference,
                                                            ])
                                                            : route(
                                                                routeNamePrefix() . 'properties.edit',
                                                                $property->reference,
                                                            ))
                                                        : route(
                                                            routeNamePrefix() . 'properties.edit.new',
                                                            $property->reference,
                                                        )),
                                            'target' => '_self',
                                            'class' => ' icon-edit text-24 b-color-transparent color-primary',
                                            'id' => 'editBtn',
                                            'attributes' => [],
                                        ]" />
                                                                            
                                        
                                            <x-forms.crm-button :fieldData="[
                                                'type' => 'button',
                                                //'url'  => route(routeNamePrefix().'properties.index'),
                                                'target' => '_self',
                                                'class' =>
                                                    'icon-Delete text-24 b-color-transparent deleteViewProperty color-primary',
                                                'id' => 'deleteBtn',
                                                'attributes' => [
                                                    'data-id = ' . $property->id,
                                                    'data-name = ' . $property->reference,
                                                ],
                                            ]" />
                                    @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end-added/prize --}}

                    {{-- image-gallery --}}
                    <x-views.layouts.images-layout.image-gallery :fieldData="['imagesData' => $propertyImages ?? [], 'isHidden' => $isHidden]" />
                    {{-- end-image-gallery --}}

                    {{-- overview --}}
                    <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="">
                        <div class="card-main-description">
                            <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary " id="">
                                Overview:</h4>
                            <div
                                class="card-show-description card-text-description d-grid d-md-flex   align-items-center justify-content-between main-card-two-small-one flex-wrap">
                                <div class="mt-3 d-flex align-items-center  pt-2">
                                    <div
                                        class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                        <i class="icon-house_id text-24 color-b-blue"></i>
                                    </div>
                                    <div class="card-text-right ps-0 ps-md-2">
                                        <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Reference:
                                        </h6>
                                        <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                            {{ $property->reference }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="mt-3 d-flex align-items-center  pt-2">
                                    <div
                                        class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                        <i class="icon-property_type text-24 color-b-blue"></i>
                                    </div>
                                    <div class="card-text-right ps-0 ps-md-2">
                                        <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Type:</h6>
                                        <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                            {{ $property->type->name }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="mt-3 d-flex align-items-center  pt-2">
                                    <div
                                        class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                        <i class="icon-property_type text-24 color-b-blue"></i>
                                    </div>
                                    <div class="card-text-right ps-0 ps-md-2">
                                        <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Subtype:
                                        </h6>
                                        <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                            {{ !empty($property->subtype->name) ? $property->subtype->name : 'N/A' }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="mt-3 d-flex align-items-center  pt-2">
                                    <div
                                        class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                        <img src="{{ asset('img/built.svg') }}" alt="image" class="#">
                                    </div>
                                    <div class="card-text-right ps-0 ps-md-2">
                                        <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Built:</h6>
                                        <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                            {{ $property->built }}
                                            @if ($property->dimension_type == 'Feet')
                                                ft<sup>2</sup>
                                            @elseif($property->dimension_type == 'Meter')
                                                m<sup>2</sup>
                                            @endif
                                        </h6>
                                    </div>
                                </div>
                                <div class="mt-3 d-flex align-items-center  pt-2">
                                    <div
                                        class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                        <img src="{{ asset('img/listed_by.svg') }}" alt="image" class="#">
                                    </div>
                                    <div class="card-text-right ps-0 ps-md-2">
                                        <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Listed By:</h6>
                                        <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                            {{ $property->agent_name }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end-overview --}}

                    {{-- slider-tab --}}
                    <div class="position-relative">
                        <div class="blur-top-section position-absolute z-2 w-100 pt-4 {{ !empty($isHidden) ? '' : 'd-none' }}">
                            <div class="blur-head-section text-center">
                                <i class=" icon-house_lock text-120 color-b-blue"></i>
                                <div class="text-18 font-weight-700 line-height-24 color-b-blue pt-3 pb-1 text-capitalize">
                                    {{ trans('messages.properties.Connect_for_Full_Access') }}</div>
                                <div
                                    class="text-18 font-weight-400 line-height-24 color-b-blue pt-4 pb-4 m-auto blur-small-text text-capitalize">
                                    {{ trans('messages.properties.Ready_to_seize_the_full_potential_of_this_property') }}</div>
                                <button type="button"
                                    class="small-button border-r-8 text-12 font-weight-400 line-height-15 color-white b-color-Gradient showagent border-background"
                                    onclick="window.open('{{ route(routeNamePrefix() . 'agentSearch.index', ['agent' => $property->agent_email]) }}','_self')">{{ trans('messages.properties.Show_Agent') }}</button>
                            </div>
                        </div>
                    </div>
                    @if (!empty($isHidden))

                    <div class="position-relative property-blur">

                         {{-- Property Information --}}
                        <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab1">
                            <div class="card-main-description">
                                <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                    Property Information</h4>
                                <div class="row pt-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Type:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->type->name ?? '-' }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Situation:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->situation->name ?? '-' }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Subtype:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->subtype->name ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Reference:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->reference ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue"> Property
                                                    Title:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-8 col-md-8 col-lg-9">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->name ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Bathrooms:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->bathrooms ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Bedrooms:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->bedrooms ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property
                                                    Status/Completion:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->status_completion ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Select Completion
                                                    Year:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->year ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Feeds:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if ($property->feeds == '1')
                                                        Realinmo
                                                    @else
                                                        -
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row pt-3">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Description:
                                                </h6>
                                                <?php
                                                $description = strip_tags($property->description);
                                                $limitedDescription = mb_substr($description, 0, 500);
                                                ?>
                                            </div>
                                            <div class="col-lg-12 pt-2">
                                                <h6 id="propertyDescription"
                                                    class="text-14 font-weight-400 line-height-22 color-b-blue">
                                                    <span class="content"><?php echo $limitedDescription; ?></span>
                                                    <span class="hidden-content" style="display: none;"><?php echo mb_substr($description, 500); ?></span>
                                                    <?php
                                                    // Check if the description has more than 3 lines
                                                    if (strlen($description) > 500) {
                                                        echo '<a href="#" class="toggle-link text-12 font-weight-700 line-height-15 color-b-blue text-decoration-underline d-block pt-2">' . trans('messages.properties.Show_More') . '</a>';
                                                    }
                                                    ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end-property-information --}}

                        {{-- Property Pricing --}}
                        <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab2">
                            <div class="card-main-description">
                                <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                    Property Pricing:</h4>
                                <div class="row pt-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Listed As:</h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->listed_as ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Sale Price:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    € {{ $property->price ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue"> Percentage:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->percentage ?? '-' }} %
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Commission:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    € {{ $property->commission ?? '-' }}
                                                    {{-- $property->note_com --}}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Net Price:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    € {{ $property->net_price ?? '0' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Valuation:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if (!empty($property->valuation))
                                                        € {{ $property->valuation }}
                                                    @else
                                                        -
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Valuation Year:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->valuation_year ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Deed Value:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if (!empty($property->deed_value))
                                                        € {{ $property->deed_value }}
                                                    @else
                                                        -
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Minimun Price:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if (!empty($property->mini_price))
                                                        € {{ $property->mini_price }}
                                                    @else
                                                        -
                                                    @endif

                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Community Fees:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">

                                                    @if (!empty($property->comm_fees))
                                                        € {{ $property->comm_fees }}
                                                    @else
                                                        -
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Garbage Tax:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if (!empty($property->garbage_tax))
                                                        € {{ $property->garbage_tax }}
                                                    @else
                                                        -
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">IBI Fees:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if (!empty($property->ibi_fees))
                                                        € {{ $property->ibi_fees }}
                                                    @else
                                                        -
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row pt-3 mt-2">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-primary"> Listing Agent:
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue"> Listing Agent:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->list_agent_per ?? '-' }} %
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Listing Agent:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    € {{ $property->list_agent_com ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row pt-3 mt-2">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-primary"> Selling Agent:
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue"> Selling Agent:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->sell_agent_per ?? '-' }} %
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Selling Agent:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    € {{ $property->sell_agent_com ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- to add commission note here -->
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row pt-3">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue"> Commission Note:
                                                </h6>
                                                <?php
                                                $notes = strip_tags($property->commission_note);
                                                $limitedDescription = mb_substr($notes, 0, 500);
                                                ?>
                                            </div>
                                            <h6 id="propertyDescription"
                                                class="text-14 font-weight-400 line-height-22 color-b-blue">
                                                <span class="content"><?php echo $limitedDescription; ?></span>
                                                <span class="hidden-content" style="display: none;"><?php echo mb_substr($notes, 500); ?></span>
                                                <?php
                                                // Check if the description has more than 3 lines
                                                if (strlen($notes) > 500) {
                                                    echo '<a href="#" class="toggle-link text-12 font-weight-700 line-height-15 color-b-blue text-decoration-underline d-block pt-2">' . trans('messages.properties.Show_More') . '</a>';
                                                }
                                                ?>
                                            </h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- end-property-pricing --}}

                        {{-- Property Location:  --}}
                        <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab3">
                            <div class="card-main-description">
                                <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                    Property Location:</h4>
                                <div class="row pt-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Street
                                                    Number:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->street_number ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Street:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->street_name ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">City:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->city ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">State/Provenience:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->state ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Country:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->country ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Postcode:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->zipcode ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12">
                                        <div class="card-text-description">
                                            <h3
                                                class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pt-3 mt-2">
                                                Property Location:</h3>
                                            <div class="text-12 font-weight-400 line-height-22 color-b-blue pt-3">
                                                Lorem ipsum dolor
                                                sit amet
                                                consectetur adipisicing elit. Autem quaerat ipsa, eaque officiis qui fugit
                                                voluptates
                                                numquam quos facilis esse porro deleniti ullam quisquam eius libero possimus est
                                                dicta
                                                nostrum!
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-12 mt-3">
                                        <div id="propertyMap" style="height: 362px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end-Property Location: --}}

                        {{-- Property Dimensions --}}
                        <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab4">
                            <div class="card-main-description">
                                <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                    Property Dimensions:</h4>
                                <div class="row pt-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Dimensions
                                                    Type:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->dimension_type ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Total Size:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->size }}
                                                    @if ($property->dimension_type == 'Feet')
                                                        ft
                                                    @elseif($property->dimension_type == 'Meter')
                                                        m
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Floor No:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->floors ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Built:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->built ?? '-' }}
                                                    @if ($property->dimension_type == 'Feet')
                                                        ft<sup>2</sup>
                                                    @elseif($property->dimension_type == 'Meter')
                                                        m<sup>2</sup>
                                                    @endif


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Storeys:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->storeys ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">No. of
                                                    Properties
                                                    In Build in:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->no_of_properties_builtin ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Terrace:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->terrace ?? '-' }}
                                                    @if ($property->dimension_type == 'Feet')
                                                        ft<sup>2</sup>
                                                    @elseif($property->dimension_type == 'Meter')
                                                        m<sup>2</sup>
                                                    @endif

                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Levels:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->levels ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Agency Ref:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->agency_ref ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Garden/Plot:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->garden_plot ?? '-' }}
                                                    @if ($property->dimension_type == 'Feet')
                                                        ft
                                                    @elseif($property->dimension_type == 'Meter')
                                                        m
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Int. Floor
                                                    space:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->properties_int_floor_space ?? '-' }}
                                                    @if ($property->dimension_type == 'Feet')
                                                        ft
                                                    @elseif($property->dimension_type == 'Meter')
                                                        m
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        {{-- end-property-dimation --}}

                        {{-- Property Documents Information --}}
                        <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab5">
                            <div class="card-main-description">
                                <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                    Property Documents Information:</h4>
                                <div class="row pt-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Nota Simple:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if ($property->nota_simple == '1')
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Rental License
                                                    Ref:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->rental_license_ref ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">IBI Receipt:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if ($property->IBI_receipt == '1')
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Document upload
                                                    feature:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if ($propertyDocumentsData->isNotEmpty())
                                                        @foreach ($propertyDocumentsData as $documentKey => $documentVal)
                                                            <div class="text-12 font-weight-400 line-height-15 color-b-blue">
                                                                <a target="_blank"
                                                                    href="{{ $documentVal->document ?? '' }}">{{ $documentVal->original_name ?? '-' }}</a>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="text-12 font-weight-400 line-height-15 color-b-blue">
                                                            -</div>
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">First Occupancy
                                                    License / AFO:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if ($property->first_occupancy_license_aFO == '1')
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- end-Property Documents Information --}}


                        {{-- Property Listed By: --}}
                        <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab6">
                            <div class="card-main-description">
                                <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                    Property Listed By:</h4>
                                <div class="row pt-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Listed By:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->agent_name ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue text-break">Company
                                                    Email:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue text-break">
                                                    {{ auth()->user()->email ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Company Mobile:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ auth()->user()->phone ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Tax Number:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    xxx xxx xxx xxx xxx 999
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Company Website:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    realinmo.com
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Street
                                                    Address:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ auth()->user()->address ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">City:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ auth()->user()->city ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">State/Province:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ auth()->user()->state ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Country:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ auth()->user()->country ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Zipcode:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ auth()->user()->zipcode ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (!empty($property->feeds))
                                    <div class="row property-view_border">
                                        <div class="col-lg-12">
                                            <div class="d-flex align-items-center gap-3">
                                                <img src= "{{ asset('img/default-user.jpg') }}" class="border-r-12"
                                                    width="60" height="60" />
                                                <h4 class="text-18 color-primary font-weight-700 lineheight-22">Realinmo</h4>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                        {{-- end-Property Listed By: --}}

                        {{-- Property Tour: --}}
                        @if (!empty($property->virtual_tour) || !empty($property->video_tour))
                            @php
                                $virtualTourId = '';
                                $vedioTourId = '';

                                    // Check if the virtual tour URL matches a YouTube video
                                    if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $property->virtual_tour, $matches)) {
                                        $virtualTourId = $matches[1];
                                    } elseif (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $property->virtual_tour, $matches)) {
                                        $virtualTourId = $matches[1];
                                    }

                                    // Check if the video tour URL matches a YouTube video
                                    if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $property->video_tour, $matches)) {
                                        $vedioTourId = $matches[1];
                                    } elseif (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $property->video_tour, $matches)) {
                                        $vedioTourId = $matches[1];
                                    }

                                    // Construct URLs
                                    $virtualUrl = $virtualTourId ? "https://www.youtube.com/embed/{$virtualTourId}" : null;
                                    $vedioTourUrl = $vedioTourId ? "https://www.youtube.com/embed/{$vedioTourId}" : null;
                                @endphp

                                {{-- Embed the virtual tour or video tour if they exist --}}
                                @if ($virtualUrl)
                                    <iframe src="{{ $virtualUrl }}" frameborder="0" allowfullscreen></iframe>
                                @endif

                                @if ($vedioTourUrl)
                                    <iframe src="{{ $vedioTourUrl }}" frameborder="0" allowfullscreen></iframe>
                                @endif

                            <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab7">
                                <div class="card-main-description">
                                    <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                        Property Tour:</h4>
                                    <div class="row mt-3 pt-2">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="video_demo">
                                                <iframe class="border-r-12"
                                                    src="{{ $virtualUrl }}" title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="video_demo col-md-6">
                                                <iframe class="border-r-12"
                                                    src="{{ $vedioTourUrl }}" title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- end-Property Tour: --}}

                        {{-- Property Features: --}}
                        <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab8">
                            <div class="card-main-description">
                                <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                    Property Features:</h4>
                            </div>
                            @if ($property->features->isNotEmpty())
                                <div class="tab-teaser">
                                    <div class="tab-menu">
                                        <ul>

                                            @foreach ($property->features->unique() as $key => $propertyFeature)
                                                <li><a href="#" class="{{ $key == 0 ? 'active' : '' }}"
                                                        data-rel="tab-{{ $propertyFeature->id }}">{{ $propertyFeature->name }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <button class="prev-tab"></button>
                                    <button class="next-tab"></button>
                                    <div class="tab-main-box">
                                        @foreach ($property->features->unique() as $key => $propertyFeature)
                                            <div class="tab-box" id="tab-{{ $propertyFeature->id }}"
                                                @if ($key == 0) style="display: block" @endif>
                                                <div class="row">
                                                    @foreach ($property->subFeatures as $subFeatures)
                                                        @if ($propertyFeature->id == $subFeatures->feature_id)
                                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3"
                                                                class="{{ $key == 0 ? 'active' : '' }}">
                                                                <div class="property-view-feature">
                                                                    <h6
                                                                        class="text-14 color-b-blue font-weight-400 lineheight-18 position-relative">
                                                                        {{ $subFeatures->name }}</h6>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                        {{-- end-property feature --}}

                        {{-- Contact Information: --}}
                        <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab9">
                            <div class="card-main-description">
                                <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                    Contact Information:</h4>
                                <div class="row pt-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Owner1:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->owner_one ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Owner2:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->owner_two ?? '-' }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue"> Key
                                                    Holder:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->key_holder ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Developer:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->developer ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Key Status:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->key_status ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Key Id:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->key_id ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Key
                                                    Details:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->key_details ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Private
                                                    Notes:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->private_note ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row pt-3">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">
                                                    Lawyer:
                                                </h6>
                                                <?php
                                                $lawyer = strip_tags($property->lawyer);
                                                $limitedLawyer = mb_substr($lawyer, 0, 500);
                                                ?>
                                            </div>
                                            <div class="col-lg-12 pt-2">
                                                <h6 id="propertyDescription"
                                                    class="text-14 font-weight-400 line-height-22 color-b-blue">
                                                    <span class="content"><?php echo $limitedLawyer; ?></span>
                                                    <span class="hidden-content"
                                                        style="display: none;"><?php echo mb_substr($lawyer, 500); ?></span>
                                                    <?php
                                                    // Check if the description has more than 3 lines
                                                    if (strlen($lawyer) > 500) {
                                                        echo '<a href="#" class="toggle-link text-12 font-weight-700 line-height-15 color-b-blue text-decoration-underline d-block pt-2">' . trans('messages.properties.Show_More') . '</a>';
                                                    }
                                                    ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end-Contact Information: --}}

                    </div>

                    @else

                        {{-- tab-slider --}}
                        <div class="tab_slider-main" style="overflow: hidden">
                            <div class="view_property-page_slider" id="view_property-page_slider_id">
                                <div>
                                    <button class="tablinks" data-target="Tab1">Property Information</button>
                                </div>
                                <div>
                                    <button class="tablinks" data-target="Tab2">Property Pricing</button>
                                </div>
                                <div>
                                    <button class="tablinks" data-target="Tab3">Property Location</button>
                                </div>
                                <div>
                                    <button class="tablinks" data-target="Tab4">Property Dimension</button>
                                </div>
                                <div>
                                    <button class="tablinks" data-target="Tab5">Property Document Information</button>
                                </div>
                                <div>
                                    <button class="tablinks" data-target="Tab6">Property Listed By</button>
                                </div>
                                <div>
                                    <button class="tablinks" data-target="Tab7">Property Tour</button>
                                </div>
                                <div>
                                    <button class="tablinks" data-target="Tab8">Property Features</button>
                                </div>
                                <div>
                                    <button class="tablinks" data-target="Tab9">Contact Information</button>
                                </div>

                            </div>
                            <button class="prev" id="view_property-page_slider_prev"></button>
                            <button class="next" id="view_property-page_slider_next"></button>
                        </div>

                        {{-- Property Information --}}
                            <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab1">
                                <div class="card-main-description">
                                    <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                        Property Information</h4>
                                    <div class="row pt-2">
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Type:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->type->name ?? '-' }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Situation:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->situation->name ?? '-' }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Subtype:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->subtype->name ?? '-' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        @if($property->type->name=='Commercial')
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="row pt-3">
                                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                        <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">
                                                            {{trans('messages.properties.Property_Subtype2')}}:
                                                        </h6>
                                                    </div>
                                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                        <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            {{ $property->subtype2->name ?? '-' }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Reference:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->reference ?? '-' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-4 col-md-4 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue"> Property
                                                        Title:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->name ?? '-' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @dd($property->type->name); --}}
                                        {{-- @if($property->type->name !== 'plot') --}}
                                        {{-- @dd($property->plot_size) --}}
                                        @if (empty($property->plot_size))
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Bathrooms:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->bathrooms ?? '-' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Bedrooms:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->bedrooms ?? '-' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        {{-- @endif --}}
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">
                                                        {{trans('messages.property.status_completion')}}:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->status_completion ?? '-' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">
                                                        @if ($property->status_completion == 'Under Construction' || $property->status_completion == 'Off Plan')
                                                            {{trans('messages.property.month_year')}}:
                                                        @else
                                                            {{trans('messages.property.Year_selection')}}:
                                                        @endif
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        @if ($property->status_completion == 'Under Construction' || $property->status_completion == 'Off Plan')
                                                            @if (!empty($property->month && $property->year))
                                                                {{ $property->month . '/' . $property->year }}
                                                            @else
                                                                -
                                                            @endif
                                                        @else
                                                            {{ $property->year ?? '-' }}
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">
                                                        {{trans('messages.property.feeds')}}:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        @if ($property->feeds == '1')
                                                            Realinmo
                                                        @else
                                                            -
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </div> --}}
                                        @if (!empty($property->property_tenure) && ($property->type->name=='Commercial'))
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="row pt-3">
                                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                        <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">
                                                            @if ($property->property_tenure == '1')
                                                            {{ trans('messages.properties.Freehold') }}:
                                                            @elseif($property->property_tenure == '2')
                                                            {{ trans('messages.properties.Leasehold') }}:
                                                            @endif
                                                        </h6>
                                                    </div>
                                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                        <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            @if ($property->property_tenure == '1')
                                                            Yes
                                                            @elseif($property->property_tenure == '2')
                                                            Yes
                                                            @endif
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="row pt-3">
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Description:
                                                    </h6>
                                                    <?php
                                                    $description = strip_tags($property->description);
                                                    $limitedDescription = mb_substr($description, 0, 500);
                                                    ?>
                                                </div>
                                                <div class="col-lg-12 pt-2">
                                                    <h6 id="propertyDescription"
                                                        class="text-14 font-weight-400 line-height-22 color-b-blue">
                                                        <span class="content"><?php echo $limitedDescription; ?></span>
                                                        <span class="hidden-content" style="display: none;"><?php echo mb_substr($description, 500); ?></span>
                                                        <?php
                                                        // Check if the description has more than 3 lines
                                                        if (strlen($description) > 500) {
                                                            echo '<a href="#" class="toggle-link text-12 font-weight-700 line-height-15 color-b-blue text-decoration-underline d-block pt-2">' . trans('messages.properties.Show_More') . '</a>';
                                                        }
                                                        ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- end-property-information --}}

                        {{-- Property Pricing --}}
                        <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab2">
                            <div class="card-main-description">
                                <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                    Property Pricing:</h4>
                                <div class="row pt-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Listed As:</h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->listed_as ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">
                                                    @if ($property->listed_as == 'For Rent')
                                                        {{trans('messages.property.rent_type')}}:
                                                    @else
                                                        {{trans('messages.property.sale_price')}}:
                                                    @endif
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    € {{ $property->price ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue"> Percentage:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->percentage ?? '-' }} %
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Commission:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{-- $property->note_com --}}
                                                    @if (!empty($property->commission))
                                                    € {{ $property->commission }}
                                                @else
                                                    -
                                                @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Net Price:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    € {{ $property->net_price ?? '0' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Valuation:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if (!empty($property->valuation))
                                                        € {{ $property->valuation }}
                                                    @else
                                                        -
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Valuation Year:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->valuation_year ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Deed Value:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if (!empty($property->deed_value))
                                                        € {{ $property->deed_value }}
                                                    @else
                                                        -
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Minimun Price:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if (!empty($property->mini_price))
                                                        € {{ $property->mini_price }}
                                                    @else
                                                        -
                                                    @endif

                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Community Fees:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">

                                                    @if (!empty($property->comm_fees))
                                                        € {{ $property->comm_fees }}
                                                    @else
                                                        -
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Garbage Tax:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if (!empty($property->garbage_tax))
                                                        € {{ $property->garbage_tax }}
                                                    @else
                                                        -
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">IBI Fees:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if (!empty($property->ibi_fees))
                                                        € {{ $property->ibi_fees }}
                                                    @else
                                                        -
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row pt-3 mt-2">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-primary"> Listing Agent:
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue"> Listing Agent:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if (!empty($property->list_agent_per))
                                                    {{ $property->list_agent_per }} %
                                                @else
                                                    -
                                                @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Listing Agent:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if (!empty($property->list_agent_com))
                                                        € {{ $property->list_agent_com }}
                                                    @else
                                                        -
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row pt-3 mt-2">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-primary"> Selling Agent:
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue"> Selling Agent:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                @if (!empty($property->sell_agent_per))
                                                    {{ $property->sell_agent_per ?? '-' }} %
                                                @else
                                                    -
                                                @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Selling Agent:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if (!empty($property->sell_agent_com))
                                                        € {{ $property->sell_agent_com }}
                                                    @else
                                                        -
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- to add commission note here -->
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row pt-3">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue"> Commission Note:
                                                </h6>
                                                <?php
                                                $notes = strip_tags($property->commission_note);
                                                $limitedDescription = mb_substr($notes, 0, 500);
                                                ?>
                                            </div>
                                            <h6 id="propertyDescription"
                                                class="text-14 font-weight-400 line-height-22 color-b-blue">
                                                <span class="content"><?php echo $limitedDescription; ?></span>
                                                <span class="hidden-content" style="display: none;"><?php echo mb_substr($notes, 500); ?></span>
                                                <?php
                                                if (strlen($notes) > 500) {
                                                    echo '<a href="#" class="toggle-link text-12 font-weight-700 line-height-15 color-b-blue text-decoration-underline d-block pt-2">' . trans('messages.properties.Show_More') . '</a>';
                                                }
                                                ?>
                                            </h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- end-property-pricing --}}

                        {{-- Property Location:  --}}
                        <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab3">
                            <div class="card-main-description">
                                <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                    Property Location:</h4>
                                <div class="row pt-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Street
                                                    Number:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->street_number ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Street:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->street_name ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">City:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->city ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">State/Provenience:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->state ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Country:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->country ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Zipcode:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->zipcode ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12">
                                        <div class="card-text-description">
                                            <h3
                                                class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pt-3 mt-2">
                                                Property Location:</h3>
                                            <div class="text-12 font-weight-400 line-height-22 color-b-blue pt-3">
                                                Lorem ipsum dolor
                                                sit amet
                                                consectetur adipisicing elit. Autem quaerat ipsa, eaque officiis qui fugit
                                                voluptates
                                                numquam quos facilis esse porro deleniti ullam quisquam eius libero possimus est
                                                dicta
                                                nostrum!
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-12 mt-3">
                                        <div id="propertyMap" style="height: 362px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end-Property Location: --}}

                        {{-- Property Dimensions --}}
                        <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab4">
                                <div class="card-main-description">
                                    <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                        Property Dimensions:</h4>
                                    <div class="row pt-2">
                                        {{-- <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Dimensions
                                                        Type:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->dimension_type ?? '-' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">
                                                        @if ($property->plot_size)
                                                        Plot Size:
                                                        @else
                                                        Total Size:
                                                        @endif

                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        @if ($property->plot_size)
                                                        {{ $property->plot_size }}
                                                        @else
                                                        {{ $property->size }}
                                                        @endif
                                                        m<sup>2</sup>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        @if (empty($property->plot_size))
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Floor No:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->floors ?? '-' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Built:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->built ?? '0' }}
                                                            m<sup>2</sup>
                                                </div>
                                            </div>
                                        </div>
                                        @if (empty($property->plot_size))

                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Storeys:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->storeys ?? '-' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">No. of
                                                        Properties
                                                        In Build in:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->no_of_properties_builtin ?? '0' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Terrace:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->terrace ?? '-' }}
                                                            m<sup>2</sup>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Levels:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->levels ?? '-' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Agency Ref:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->agency_ref ?? '-' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Garden/Plot:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->garden_plot ?? '-' }}
                                                        m<sup>2</sup>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Int. Floor
                                                        space:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ $property->properties_int_floor_space ?? '-' }}
                                                        m<sup>2</sup>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                         {{-- here --}}
                                         {{-- <div class="col-sm-6 col-md-6 col-lg-6"></div> --}}
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Co2 Emission:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{$property->co2_emission ?? '-'}}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Co2 Emission Letter:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{$property->letter_co2 ?? '-'}}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Energy Consumption:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{$property->energy_consumption ?? '-'}}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Energy Consumption Letter:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{$property->letter_energy ?? '-'}}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        {{-- end-property-dimation --}}

                        {{-- Property Documents Information --}}
                        <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab5">
                            <div class="card-main-description">
                                <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                    Property Documents Information:</h4>
                                <div class="row pt-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Nota Simple:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if ($property->nota_simple == '1')
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">IBI Receipt:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if ($property->IBI_receipt == '1')
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Document upload
                                                    feature:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if ($propertyDocumentsData->isNotEmpty())
                                                        @foreach ($propertyDocumentsData as $documentKey => $documentVal)
                                                            <div class="text-12 font-weight-400 line-height-15 color-b-blue">
                                                                <a target="_blank"
                                                                    href="{{ $documentVal->document ?? '' }}">{{ $documentVal->original_name ?? '-' }}</a>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="text-12 font-weight-400 line-height-15 color-b-blue">
                                                            -</div>
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">First Occupancy
                                                    License / AFO:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    @if ($property->first_occupancy_license_aFO == '1')
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- end-Property Documents Information --}}


                        {{-- Property Listed By: --}}
                        <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab6">
                            <div class="card-main-description">
                                <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                    Property Listed By:</h4>
                                <div class="row pt-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Listed By:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ auth()->user()->name ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue text-break">Company
                                                    Email:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue text-break">
                                                    {{ $companyDetails->company_email ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Company Mobile:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $companyDetails->company_mobile ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    @if (auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer')
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">CIF/NIE number:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{$companyDetails->cif_nie ?? '-' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="row pt-3">
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Tax Number:
                                                    </h6>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{$companyDetails->company_tax_number ?? '-' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Company Website:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{$companyDetails->company_website ?? '-'}}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue"> Street
                                                    Address:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ auth()->user()->address ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">City:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ auth()->user()->city ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">State/Province:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ auth()->user()->state ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Country:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ auth()->user()->country ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Zipcode:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ auth()->user()->zipcode ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-12 mt-3 pt-2 border-top">
                                            <div class="company-image d-flex align-items-center mt-3">
                                                <img src="{{ !empty($companyDetails->company_image) ? $companyDetails->company_image : asset('img/logoplaceholder.svg') }}" alt="Default Image" class="border-r-12"
                                                    width="80" height="80">
                                                    <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary ms-3">
                                                        {{ $companyDetails->company_name ?? "" }}
                                                    </h4>
                                            </div>
                                        </div>
                                </div>

                            </div>
                        </div>
                        {{-- end-Property Listed By: --}}

                        {{-- Property Tour: --}}
                        @if (!empty($property->virtual_tour) || !empty($property->video_tour))
                            @php
                            $virtualTourId = '';
                            $vedioTourId = '';
                                if (
                                    preg_match(
                                        '/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/',
                                        $property->virtual_tour,
                                        $matches,
                                    )
                                ) {
                                    $virtualTourId = $matches[1];
                                } elseif (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $property->virtual_tour, $matches)) {
                                    $virtualTourId = $matches[1];
                                }

                                if (
                                    preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $property->video_tour, $matches)
                                ) {
                                    $vedioTourId = $matches[1];
                                } elseif (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $property->video_tour, $matches)) {
                                    $vedioTourId = $matches[1];
                                }

                                $virtualUrl = $virtualTourId ? "https://www.youtube.com/embed/{$virtualTourId}" : null;
                                $vedioTourUrl = $vedioTourId ? "https://www.youtube.com/embed/{$vedioTourId}" : null;
                            @endphp

                            <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab7">
                                <div class="card-main-description">
                                    <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                        Property Tour:</h4>
                                    <div class="row mt-3 pt-2">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="video_demo">
                                                <iframe class="border-r-12"
                                                    src="{{ $virtualUrl }}" title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="video_demo">
                                                <iframe  class="border-r-12"
                                                    src="{{ $vedioTourUrl }}" title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- end-Property Tour: --}}

                        {{-- Property Features: --}}
                        @if ($property->features->isNotEmpty())
                                <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab8">
                                    <div class="card-main-description">
                                        <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                            Property Features:</h4>
                                    </div>
                                        <div class="tab-teaser">
                                            <div class="tab-menu">
                                                <ul>

                                                    @foreach ($property->features->unique() as $key => $propertyFeature)
                                                        <li><a href="#" class="{{ $key == 0 ? 'active' : '' }}"
                                                                data-rel="tab-{{ $propertyFeature->id }}">{{ $propertyFeature->name }}</a>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                            <button class="prev-tab"></button>
                                            <button class="next-tab"></button>
                                            <div class="tab-main-box ">
                                                @foreach ($property->features->unique() as $key => $propertyFeature)
                                                    <div class="tab-box" id="tab-{{ $propertyFeature->id }}"
                                                        @if ($key == 0) style="display: block" @endif>
                                                        <div class="row">
                                                            @foreach ($property->subFeatures as $subFeatures)
                                                                @if ($propertyFeature->id == $subFeatures->feature_id)
                                                                    <div class="col-6 col-sm-4 col-md-4 col-lg-3"
                                                                        class="{{ $key == 0 ? 'active' : '' }}">
                                                                        <div class="property-view-feature">
                                                                            <h6
                                                                                class="text-14 color-b-blue font-weight-400 lineheight-18 position-relative">
                                                                                {{ $subFeatures->name }}
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            </div>
                                        </div>
                                {{-- </div> --}}
                        @endif
                        {{-- end-property feature --}}

                        {{-- Contact Information: --}}
                        <div class="card-description py-20 mb-30 b-color-white border-r-8  px-20" id="Tab9">
                            <div class="card-main-description">
                                <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary pb-10">
                                    Contact Information:</h4>
                                <div class="row pt-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Owner1:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->owner_one ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Owner2:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->owner_two ?? '-' }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue"> Key
                                                    Holder:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->key_holder ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Developer:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->developer ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Key Status:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->key_status ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Key Id:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->key_id ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Key
                                                    Details:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->key_details ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="row pt-3">
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Private
                                                    Notes:
                                                </h6>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                                <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $property->private_note ?? '-' }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row pt-3">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">
                                                    Lawyer:
                                                </h6>
                                                <?php
                                                $lawyer = strip_tags($property->lawyer);
                                                $limitedLawyer = mb_substr($lawyer, 0, 500);
                                                ?>
                                            </div>
                                            <div class="col-lg-12 pt-2">
                                                <h6 id="propertyDescription"
                                                    class="text-14 font-weight-400 line-height-22 color-b-blue">
                                                    <span class="content"><?php echo $limitedLawyer; ?></span>
                                                    <span class="hidden-content"
                                                        style="display: none;"><?php echo mb_substr($lawyer, 500); ?></span>
                                                    <?php
                                                    // Check if the description has more than 3 lines
                                                    if (strlen($lawyer) > 500) {
                                                        echo '<a href="#" class="toggle-link text-12 font-weight-700 line-height-15 color-b-blue text-decoration-underline d-block pt-2">' . trans('messages.properties.Show_More') . '</a>';
                                                    }
                                                    ?>
                                                </h6>
                                            </div>

                                            @if(auth()->user()->role->name == "agent" && requestSegment(1) == 'messages')
                                            @include('modules.properties.includes.modal')
                                            @include('modules.files.includes.upload_document_modal')
                                            <div class="d-flex justify-content-end align-items-center gap-3">
                                                <button type="button" id="book_an_appointment" onclick="openBooking()"
                                                data-agentid="{{ $property->owner_id }}" data-agentname="{{ $property->agent_name }}" data-agentimage="{{ $property->agent_image }}" data-agentphone="{{ $property->agent_phone }}" data-agentcity="{{ $property->agent_city }}"  data-agentemail="{{ $property->agent_email }}" data-propertyId="{{ $property->id }}" data-propertydata="{{ json_encode($property) }}" class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center" >
                                                    <i class="icon-my_calender me-2 icon-20"></i>
                                                    Book Appointment</button>
                                            </div>
                                            @endif
                                            @if(auth()->user()->role->name == "customer")
                                                @include('modules.properties.includes.contactAgentmodal')
                                                <div class="col-lg-12 pt-2">
                                                    <button type="button"
                                                        id="contactagent_modal"
                                                        class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                                        data-agentid="{{ $property->secondary_agent_id }}" data-agentname="{{ $property->secondary_agent_name }}" data-agentimage="{{ $property->secondary_agent_image }}" data-agentphone="{{ $property->secondary_agent_phone }}" data-agentcity="{{ $property->secondary_agent_city }}"  data-agentemail="{{ $property->secondary_agent_email }}" data-propertyId="{{ $property->id }}"
                                                        data-propertydata="{{ json_encode($property) }}">
                                                        <i class=" icon-Export me-2 icon-20"></i>
                                                        Contact Agent
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end-Contact Information: --}}

                    @endif
                </form>
            </div>
        </div>

                {{-- use this for button --}}
                <div class="position-fixed view_connect_agent">
                    <button type="button"
                        class="small-button border-r-8 b-color-primary text-14 font-weight-700 lineheight-18 color-white  d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#initiate_collaboration" property-id="{{ $property->id }}" property_ref="{{ $property->reference }}">
                        <i class=" icon-phone me-2 icon-20 color-white"></i>
                        Connect Agent</button>
                </div>
                {{-- end -use this for button --}}

                @include('modules.properties.includes.property_inquiry')


        @push('scripts')
            <script
                src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=places"
                defer></script>
            <script>
                var agentInquireyRoute = "{{ route(routeNamePrefix() . 'properties.storeInquirey') }}";

                var latVal = "{{ $property->latitude ?? '' }}";
                var lngVal = "{{ $property->longitude ?? '' }}";
                var isHidden = "{{ !empty($isHidden) ? 'yes' : 'no' }}";
                var propertyCheckboxes = document.querySelectorAll('.property-checkbox');

                var routeUrlAddProject = "{{ route(routeNamePrefix().'projects.store') }}";
                var generatepdfurl = "{{ route(routeNamePrefix() .'generate.pdf') }}";
                var getCustomerUrl = "{{ route(routeNamePrefix() .'property.getCustomer') }}";
                var eventAttachmentUrl = "{{ route(routeNamePrefix() . 'events.addAttachments') }}";
                var collaborateUrl = "{{ route(routeNamePrefix() .'property.collaborate') }}";
                var routeUrlAddEvent = "{{ route(routeNamePrefix() . 'events.store') }}";
                var routeUrlCommission = "{{ route(routeNamePrefix() . 'property.createCommission') }}";
                var savesignatureUrl = "{{ route(routeNamePrefix() .'property.savesignature') }}";
                var customerInquiry = "{{ route(routeNamePrefix() .'property.customerInquiry') }}";
                var propertyDeleteUrl = "{{ route(routeNamePrefix() . 'properties.destroy', ':id') }}";
                var propertyDeleteConfirmText = "{{ trans('messages.confirm_popup.You_are_attempting_to_delete_Your_Property') }}";
                var areYouSureTextConfirmPopup = "{{ trans('messages.confirm_popup.Are_you_sure') }}";
                var deleteTextConfirmPopup = "{{ trans('messages.confirm_popup.Delete') }}";
                var showMoreText = "{{ trans('messages.properties.Show_More') }}";
                var showLessText = "{{ trans('messages.properties.Show_Less') }}";
            </script>
            <script src="{{ asset('assets/js/modules/properties/show_property.js') }}"></script>
            @if(auth()->user()->role->name == "agent")
                <script src="{{ asset('assets/js/modules/properties/collaborate_property.js') }}"></script>
            @endif

            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
            <script>
                function openMyModal2() {
                let myModal = new
                bootstrap.Modal(document.getElementById('property_lead_sure'), {});
                myModal.show();
            }
            </script>


            {{-- <script>
                $(document).ready(function() {
                    var $slider = $('.tab-menu ul');

                    // Slick Slider Initialization
                    $slider.slick({
                        slidesToShow: 7,
                        slidesToScroll: 1,
                        infinite: false,
                        loop: false,
                        arrows: false,
                        responsive: [{
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 4.5,
                                }
                            },
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 2,
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                }
                            }
                        ]
                    });


                    $('.next-tab').on('click', function(event) {
                        event.preventDefault();
                        $slider.slick('slickNext');
                        // Get the current slide index
                        var currentSlideIndex = $slider.slick('slickCurrentSlide');
                        // Remove active class from all tabs
                        $('.tab-menu li a').removeClass('active');
                        // Update the active tab
                        var tabIndex = currentSlideIndex;
                        var $tab = $('.tab-menu li:eq(' + tabIndex + ') a');
                        $tab.addClass('active');
                        // Trigger the tab click handler to update the tab box content
                        $tab.trigger('click');
                    });

                    $('.prev-tab').on('click', function(event) {
                        event.preventDefault();
                        $slider.slick('slickPrev');
                        // Get the current slide index
                        var currentSlideIndex = $slider.slick('slickCurrentSlide');
                        // Check if the slider has reached the first slide
                        if (currentSlideIndex === 0) {
                            // Trigger a click on the first tab
                            $('.tab-menu li:first-child a').trigger('click');
                        } else {
                            // Update the active tab
                            var prevTabIndex = $slider.slick('slickCurrentSlide');
                            $('.tab-menu li a').removeClass('active');
                            var $prevTab = $('.tab-menu li:eq(' + prevTabIndex + ') a');
                            $prevTab.addClass('active');
                            // Trigger the tab click handler to update the tab box content
                            $prevTab.trigger('click');
                        }
                    });
                // Tab Click Handler
                    $('.tab-menu li a').on('click', function(event) {
                        event.preventDefault();
                        var target = $(this).attr('data-rel');
                        $('.tab-menu li a').removeClass('active');
                        $(this).addClass('active');
                        $("#" + target).fadeIn('slow').siblings(".tab-box").hide();
                    });
                });
            </script> --}}
            <script>
            $(document).ready(function() {
                var $slider = $('.tab-menu ul');

                // Slick Slider Initialization
                $slider.slick({
                    slidesToShow: 7,
                    slidesToScroll: 1,
                    infinite: false,
                    loop: false,
                    arrows: false,
                    responsive: [{
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 4.5,
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2,
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                            }
                        }
                    ]
                });

                $('.next-tab').on('click', function(event) {
                    event.preventDefault();
                    $slider.slick('slickNext');
                    // Get the current slide index
                    var currentSlideIndex = $slider.slick('slickCurrentSlide');
                    // Remove active class from all tabs
                    $('.tab-menu li a').removeClass('active');
                    // Update the active tab
                    var tabIndex = currentSlideIndex;
                    var $tab = $('.tab-menu li:eq(' + tabIndex + ') a');
                    $tab.addClass('active');
                    // Trigger the tab click handler to update the tab box content
                    $tab.trigger('click');
                });

                $('.prev-tab').on('click', function(event) {
                    event.preventDefault();
                    $slider.slick('slickPrev');
                    // Get the current slide index
                    var currentSlideIndex = $slider.slick('slickCurrentSlide');
                    // Check if the slider has reached the first slide
                    if (currentSlideIndex === 0) {
                        // Trigger a click on the first tab
                        $('.tab-menu li:first-child a').trigger('click');
                    } else {
                        // Update the active tab
                        var prevTabIndex = $slider.slick('slickCurrentSlide');
                        $('.tab-menu li a').removeClass('active');
                        var $prevTab = $('.tab-menu li:eq(' + prevTabIndex + ') a');
                        $prevTab.addClass('active');
                        // Trigger the tab click handler to update the tab box content
                        $prevTab.trigger('click');
                    }
                });
            // Tab Click Handler
            $('.tab-menu li a').on('click', function(event) {
                event.preventDefault();
                var target = $(this).attr('data-rel');
                $('.tab-menu li a').removeClass('active');
                $(this).addClass('active');
                $("#" + target).fadeIn('slow').siblings(".tab-box").hide();
            });
    });
</script>


            <script>
                $(document).ready(function() {

                    // Selecting Sections and Navigation Links
                    const sections = document.querySelectorAll('.card-description');
                    const navLinks = document.querySelectorAll('.tablinks');
                    const $slider = $('.view_property-page_slider');
                    const offset = 205;
                    let activeLink = null;
                    const totalTabs = navLinks.length;

                    // Slider with responsive
                    $slider.slick({
                        dots: false,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 4.5,
                        slidesToScroll: 1,
                        arrows: false,
                        draggable: false,
                        responsive: [
                            { breakpoint: 1300, settings: { slidesToShow: 4 } },
                            { breakpoint: 1200, settings: { slidesToShow: 3 } },
                            { breakpoint: 1024, settings: { slidesToShow: 3 } },
                            { breakpoint: 786, settings: { slidesToShow: 2 } },
                            { breakpoint: 600, settings: { slidesToShow: 1 } }
                        ]
                    });

                    // Keyboard Navigation
                    $(document).on('keydown', function(e) {
                        if (e.key === 'ArrowRight') {
                            e.preventDefault();
                            moveSlider('next');
                        } else if (e.key === 'ArrowLeft') {
                            e.preventDefault();
                            moveSlider('prev');
                        }
                    });

                    // Button Click Events
                    $('#view_property-page_slider_prev').on('click', function(e) {
                        e.preventDefault();
                        moveSlider('prev');
                    });

                    $('#view_property-page_slider_next').on('click', function(e) {
                        e.preventDefault();
                        moveSlider('next');
                    });

                    // Moving the Slider
                    const moveSlider = (direction) => {
                        const currentIndex = $slider.slick('slickCurrentSlide');
                        if (direction === 'next' && currentIndex < totalTabs - 1) {
                            $slider.slick('slickNext');
                        } else if (direction === 'prev' && currentIndex > 0) {
                            $slider.slick('slickPrev');
                        }
                        setTimeout(updateActiveTabAndScroll, 0);
                    };

                    // Updating Active Tab and Scrolling
                    const updateActiveTabAndScroll = () => {
                        const currentIndex = $slider.slick('slickCurrentSlide');
                        const link = navLinks[currentIndex];
                        if (link) {
                            makeActive(link);
                            const targetId = link.getAttribute('data-target');
                            const targetSection = document.getElementById(targetId);
                            if (targetSection) {
                                const sectionHeight = targetSection.offsetHeight;
                                const scrollOffset = sectionHeight > 138 ? offset : 138;
                                window.scrollTo({
                                    top: targetSection.offsetTop - scrollOffset,
                                    behavior: 'smooth'
                                });
                            }
                        }
                    };

                    // Highlighting Active Tab
                    const makeActive = (link) => {
                        if (activeLink !== link) {
                            if (activeLink) {
                                activeLink.classList.remove('active');
                            }
                            if (link) {
                                link.classList.add('active');
                                activeLink = link;
                            }
                        }
                    };

                    // Observing Section Visibility
                    const sectionObserver = new IntersectionObserver((entries) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                const targetId = entry.target.id;
                                const link = document.querySelector(`.tablinks[data-target="${targetId}"]`);
                                makeActive(link);
                                const index = Array.from(navLinks).indexOf(link);
                                $slider.slick('slickGoTo', index);
                            }
                        });
                    }, {
                        rootMargin: `-70% 0px -90% 0px`,
                        threshold: 0
                    });

                    // Observing Each Section
                    sections.forEach((section) => {
                        sectionObserver.observe(section);
                    });

                    // Handling Tab Link Clicks
                    navLinks.forEach((link) => {
                        link.addEventListener('click', (e) => {
                            e.preventDefault();
                            const targetSectionId = link.getAttribute('data-target');
                            const targetSection = document.getElementById(targetSectionId);
                            if (targetSection) {
                                const sectionHeight = targetSection.offsetHeight;
                                const scrollOffset = sectionHeight > 138 ? offset : 138;
                                window.scrollTo({
                                    top: targetSection.offsetTop - scrollOffset,
                                    behavior: 'smooth'
                                });
                                makeActive(link);
                                const index = Array.from(navLinks).indexOf(link);
                                $slider.slick('slickGoTo', index);
                            }
                        });
                    });
                });
            </script>


            <script>
                document.addEventListener('DOMContentLoaded', function() {

                    // Selecting Slider and Buttons
                    const slider = document.getElementById('view_property-page_slider_id');
                    const prevButton = document.getElementById('view_property-page_slider_prev');
                    const nextButton = document.getElementById('view_property-page_slider_next');

                    // Setting Sticky Offsets
                    const stickyOffset = slider.offsetTop;
                    const fixedTopOffset = 30;

                    // Sticky Behavior Function
                    function updateSticky() {
                        const scrollTop = window.scrollY || window.pageYOffset;
                        if (scrollTop >= stickyOffset) {
                            slider.classList.add('fixed');
                            prevButton.classList.add('fixed');
                            nextButton.classList.add('fixed');
                        } else {
                            slider.classList.remove('fixed');
                            prevButton.classList.remove('fixed');
                            nextButton.classList.remove('fixed');
                        }
                    }

                    // Scroll Event Listener
                    window.addEventListener('scroll', updateSticky);
                    updateSticky();
                });
            </script>

            {{-- <script>
                $(document).ready(function() {
                    // Selecting Sections and Navigation Links
                    const sections = document.querySelectorAll('.card-description');
                    const navLinks = document.querySelectorAll('.tablinks');
                    const $slider = $('.view_property-page_slider');
                    const offset = 205;
                    let activeLink = null;
                    const totalTabs = navLinks.length;

                    // Slider with responsive
                    $slider.slick({
                        dots: false,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 4.5,
                        slidesToScroll: 1,
                        arrows: false,
                        draggable: false,
                        responsive: [
                            { breakpoint: 1300, settings: { slidesToShow: 4 } },
                            { breakpoint: 1200, settings: { slidesToShow: 3 } },
                            { breakpoint: 1024, settings: { slidesToShow: 3 } },
                            { breakpoint: 786, settings: { slidesToShow: 2 } },
                            { breakpoint: 600, settings: { slidesToShow: 1 } }
                        ]
                    });

                    // Keyboard Navigation
                    $(document).on('keydown', function(e) {
                        if (e.key === 'ArrowRight') {
                            e.preventDefault();
                            moveSlider('next');
                        } else if (e.key === 'ArrowLeft') {
                            e.preventDefault();
                            moveSlider('prev');
                        }
                    });

                    // Button Click Events
                    $('#view_property-page_slider_prev').on('click', function(e) {
                        e.preventDefault();
                        moveSlider('prev');
                    });

                    $('#view_property-page_slider_next').on('click', function(e) {
                        e.preventDefault();
                        moveSlider('next');
                    });

                   // Moving the Slider
                    const moveSlider = (direction) => {
                        const currentIndex = $slider.slick('slickCurrentSlide');
                        if (direction === 'next' && currentIndex < totalTabs - 1) {
                            $slider.slick('slickNext');
                        } else if (direction === 'next' && currentIndex === totalTabs - 1) {
                            // Make the last tab active
                            const lastLink = navLinks[totalTabs - 1];
                            makeActive(lastLink);
                            const targetId = lastLink.getAttribute('data-target');
                            const targetSection = document.getElementById(targetId);
                            if (targetSection) {
                                const sectionHeight = targetSection.offsetHeight;
                                const scrollOffset = sectionHeight > 138 ? offset : 138;
                                window.scrollTo({
                                    top: targetSection.offsetTop - scrollOffset,
                                    behavior: 'smooth'
                                });
                            }
                        } else if (direction === 'prev' && currentIndex > 0) {
                            $slider.slick('slickPrev');
                        }
                        setTimeout(updateActiveTabAndScroll, 0);
                    };
                                        // Updating Active Tab and Scrolling
                    const updateActiveTabAndScroll = () => {
                        const currentIndex = $slider.slick('slickCurrentSlide');
                        const link = navLinks[currentIndex];
                        if (link) {
                            makeActive(link);
                            const targetId = link.getAttribute('data-target');
                            const targetSection = document.getElementById(targetId);
                            if (targetSection) {
                                const sectionHeight = targetSection.offsetHeight;
                                const scrollOffset = sectionHeight > 138 ? offset : 138;
                                window.scrollTo({
                                    top: targetSection.offsetTop - scrollOffset,
                                    behavior: 'smooth'
                                });
                            }
                        }
                    };

                    // Highlighting Active Tab
                    const makeActive = (link) => {
                        if (activeLink !== link) {
                            if (activeLink) {
                                activeLink.classList.remove('active');
                            }
                            if (link) {
                                link.classList.add('active');
                                activeLink = link;
                            }
                        }
                    };

                    // Observing Section Visibility
                    const sectionObserver = new IntersectionObserver((entries) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                const targetId = entry.target.id;
                                const link = document.querySelector(`.tablinks[data-target="${targetId}"]`);
                                makeActive(link);
                                const index = Array.from(navLinks).indexOf(link);
                                $slider.slick('slickGoTo', index);
                            }
                        });
                    }, {
                        rootMargin: `-70% 0px -90% 0px`,
                        threshold: 0
                    });

                    // Observing Each Section
                    sections.forEach((section) => {
                        sectionObserver.observe(section);
                    });

                    // Handling Tab Link Clicks
                    navLinks.forEach((link) => {
                        link.addEventListener('click', (e) => {
                            e.preventDefault();
                            const targetSectionId = link.getAttribute('data-target');
                            const targetSection = document.getElementById(targetSectionId);
                            if (targetSection) {
                                const sectionHeight = targetSection.offsetHeight;
                                const scrollOffset = sectionHeight > 138 ? offset : 138;
                                window.scrollTo({
                                    top: targetSection.offsetTop - scrollOffset,
                                    behavior: 'smooth'
                                });
                                makeActive(link);
                                const index = Array.from(navLinks).indexOf(link);
                                $slider.slick('slickGoTo', index);
                            }
                        });
                    });

                    // Sticky Slider and Buttons
                    const sliderElement = document.getElementById('view_property-page_slider_id');
                    const prevButton = document.getElementById('view_property-page_slider_prev');
                    const nextButton = document.getElementById('view_property-page_slider_next');
                    const stickyOffset = sliderElement.offsetTop;
                    const fixedTopOffset = 30;

                    function updateSticky() {
                        const scrollTop = window.scrollY || window.pageYOffset;
                        if (scrollTop >= stickyOffset) {
                            sliderElement.classList.add('fixed');
                            prevButton.classList.add('fixed');
                            nextButton.classList.add('fixed');
                        } else {
                            sliderElement.classList.remove('fixed');
                            prevButton.classList.remove('fixed');
                            nextButton.classList.remove('fixed');
                        }
                    }

                    window.addEventListener('scroll', updateSticky);
                    updateSticky(); // Ensure sticky behavior is applied on page load if scrolled
                });
            </script> --}}


        @endpush
    @endsection
