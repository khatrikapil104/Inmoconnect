@extends('layouts.app')
@section('content')

@section('title')
    {{trans('messages.properties.View_Property')}} Inmoconnect
@endsection


<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="min-vh-100 b-color-background">
    <div class="crm-main-content">

    <!-- //////////breadcrumb////////////// -->
        @if(requestSegment(1) == 'properties' && requestSegment(2) == 'view')
        <x-forms.crm-breadcrumb
        :fieldData="[['url' => route(routeNamePrefix().'properties.index'),'label' => trans('messages.sidebar.Property_Listing')],['url' => '','label' => $property->agent_name ?? ''],['url' => '','label' => trans('messages.properties.View_Property')]]" />
        @elseif(requestSegment(1) == 'properties' && requestSegment(2) == 'search' && requestSegment(3) == 'view')
        <x-forms.crm-breadcrumb
            :fieldData="[['url' => route(routeNamePrefix().'propertySearch.index'),'label' => trans('messages.sidebar.Property_Search')],['url' => '','label' => $property->agent_name ?? ''],['url' => '','label' => trans('messages.properties.View_Property')]]" />
        @elseif(requestSegment(1) == 'agents' && requestSegment(2) == 'view-agent')
        <x-forms.crm-breadcrumb
            :fieldData="[['url' => route(routeNamePrefix().'agents.index'),'label' => trans('messages.sidebar.Agents')],['url' => !empty($checkIfValidUser) ? route(routeNamePrefix().'agents.viewAgent',$checkIfValidUser->id) : '','label' => !empty($checkIfValidUser->name) ? $checkIfValidUser->name : ''],['url' => '','label' => trans('messages.properties.View_Property')]]" />
        @elseif(requestSegment(1) == 'users' && requestSegment(2) == 'properties')
        <x-forms.crm-breadcrumb
            :fieldData="[['url' => route(routeNamePrefix().'user.index'),'label' => trans('messages.sidebar.Users')],['url' => route(routeNamePrefix().'user.index'),'label' => trans('messages.properties.My_Users')],['url' => !empty($checkIfValidUser) ? route(routeNamePrefix().'user.userProperties',$checkIfValidUser->id) : '','label' => !empty($checkIfValidUser->name) ? $checkIfValidUser->name : ''],['url' => '','label' => trans('messages.properties.View_Property')]]" />
        @endif
    <!-- ///////////end-breadcrumb/////////// -->
        
        <form action="{{ route(routeNamePrefix().'properties.show', $property->id) }}" method="post" class="" id="editPropertyForm"
            enctype="multipart/form-data">

        <!--///////agent-details////  -->
        <div class="row mb-30">

            <div class="col-sm-8 col-md-8 col-lg-9">

                <!-- //////property-name/// -->
                <div class="property-header-details d-flex align-items-center justify-content-between">
                    <div class="property-details property-name">
                        <h3 class="text-18 font-weight-700 lineheight-22 color-b-blue letter-s-48">{{ $property->name }}
                        </h3>
                    </div>  
                </div>

                <!-- ////////////property-details/////// -->
                <div class="property-detail-share d-flex justify-content-between align-items-center pt-1 pt-md-2">
                    <div class="property-details d-flex flex-column main-card-two-small gap-12">

                        <!-- address -->
                        <div class="property-address main-card-two-small-one d-flex align-items-center gap-1 {{!empty($isHidden) ? 'property-blur ' : '' }}position-relative">
                            <i class="icon-location icon-14 d-flex align-items-center gap-1"></i>
                            @if(!empty($isHidden))
                            <p class="text-14 color-b-blue font-weight-400 lineheight-18">Lorem ipsum dolor sit consectetur</p>
                            @else
                            <p class="text-14 color-b-blue font-weight-400 lineheight-18">{{ $property->address ?? '' }}</p>
                            @endif
                        </div>

                        <div class="property-d-two d-flex gap-12 align-items-center">

                            <!-- property-sale -->
                            <div class="property-sale d-flex align-items-center gap-1">
                                <i class="icon-sale icon-8 color-b-blue"></i>
                                <p class="text-14 color-b-blue font-weight-400 lineheight-18"> {{$property->category->name ?? ''}} </p>
                            </div>

                            <!-- refrence -->
                            <div class="property-number d-flex align-items-center gap-1">
                                <i class=" icon-property_id text-15 color-b-blue"></i>
                                <p class="text-14 color-b-blue font-weight-400 lineheight-18">{{ $property->reference ?? '' }}</p>
                            </div>

                            <!-- agent-name -->
                            <div class="property-number d-flex align-items-center gap-1">
                                <i class="icon-my_profile text-14 d-flex align-items-center gap-1"></i>
                                 <p class="text-14 color-b-blue font-weight-400 lineheight-18">{{$property->agent_name ?? ''}}</p>
                             </div>

                        </div>

                    </div> 
                </div>
            </div>  

            <div class="gap-3 col-sm-4 col-md-4 col-lg-3 d-flex flex-column justify-content-between align-items-start align-items-sm-end mt-4 pt-4 mt-sm-0 pt-sm-0">
               
                <!-- price -->
                <div class="property-details">
                    @if(!empty($isHidden))
                    <p class="text-32 font-weight-700 line-height-40 etter-s-64 color-b-blue propert-price-blur position-relative">
                        <span class="propert-price-blurs text-nowrap">{{!empty($property->price)?config('Reading.default_currency').' '.substr($property->price , 0, 2).'000' :
                            config('Reading.default_currency').' 0.00'}}</span>
                    </p>
                    @else
                    <p
                        class="text-32 font-weight-700 lineheight-40 etter-s-64 color-b-blue position-relative letter-s-36">
                        <span class="propert-price-blurs text-nowrap">{{!empty($property->price)?config('Reading.default_currency').' '.number_format($property->price,2) :
                            config('Reading.default_currency').' 0.00'}}</span></p>
                    @endif
                </div>

                <!-- button -->
                <div class="row">
                    <div class="col-md-12 d-flex gap-2 gap-md-3">
                        <x-forms.crm-button :fieldData="[
                           'type' => 'button',
                            'url'  => '',
                            'target' => '_self',
                            'class' => ' icon-share text-24 b-color-transparent color-primary',
                            'id' => 'shareBtn',
                            'attributes' => [],
                            ]" />
                            @if(auth()->user()->id == $property->owner_id || (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin' ) )
        
                        <x-forms.crm-button :fieldData="[
                            'type' => 'button',
                            'url'  => (requestSegment(1) == 'agents')
                                ? (!empty($checkIfValidUser->id)
                                    ? route(routeNamePrefix().'agents.userPropertiesEdit', [$checkIfValidUser->id, $property->reference])
                                    : route(routeNamePrefix().'properties.edit', $property->reference)
                                )
                                 : ((requestSegment(1) == 'users')
                                ? (!empty($checkIfValidUser->id)
                                    ? route(routeNamePrefix().'user.userPropertiesEdit', [$checkIfValidUser->id, $property->reference])
                                    : route(routeNamePrefix().'properties.edit', $property->reference)
                                )
                                : route(routeNamePrefix().'properties.edit', $property->reference)),
                            'target' => '_self',
                            'class' => ' icon-edit text-24 b-color-transparent color-primary',
                            'id' => 'editBtn',
                            'attributes' => [],
                            ]" />
                            <x-forms.crm-button :fieldData="[
                                'type' => 'button',
                                //'url'  => route(routeNamePrefix().'properties.index'),
                                'target' => '_self',
                                'class' => 'icon-Delete  text-24 b-color-transparent deleteViewProperty color-primary',
                                'id' => 'deleteBtn',
                                'attributes' => ['data-id = '.$property->id,'data-name = '.$property->reference],
                                ]" />
                            @endif
                    </div>
                </div>

            </div>

        </div>
 
        <!-- ////image-section////// -->
        <x-views.layouts.images-layout.image-gallery :fieldData="['imagesData' => $propertyImages ?? [], 'isHidden' => $isHidden]" />
         
        <!-- overview -->
        <x-views.layouts.main-card.main-card-index
                :fieldData="['class' => 'card-description py-25 mb-30 b-color-white border-r-8  px-25']">
            <div class="card-main-description">
                <x-views.layouts.main-card.sub-components.card-heading
                    :fieldData="['class' => '','name' => trans('messages.properties.Overview')]" />
                <div class="card-text-description d-grid d-md-flex   align-items-center justify-content-between main-card-two-small-one flex-wrap">
                    
                    <div class="d-flex align-items-center pt-3">
                        <div
                            class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                            <i class="  icon-house_id  text-24 color-b-blue"></i>
                        </div>
                        <div class="card-text-right ps-0 ps-md-2">
                            <div class="text-14 font-weight-700 lineheight-18 color-b-blue">{{trans('messages.properties.Property_Reference')}}</div>
                            <div class="text-14 font-weight-400 lineheight-18 color-b-blue pt-1">{{$property->reference ??
                                '-'}}</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div
                            class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                            <i class="icon-icon_home text-24 color-b-blue"></i>
                        </div>
                        <div class="card-text-right ps-0 ps-md-2">
                            <div class="text-14 font-weight-700 lineheight-18 color-b-blue">{{trans('messages.properties.Property_Type')}}</div>
                            <div class="text-14 font-weight-400 lineheight-18 color-b-blue pt-1">{{$property->type->name ??
                                '-'}}</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div
                            class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                            <i class="icon-house_id  text-24 color-b-blue"></i>
                        </div>
                        <div class="card-text-right ps-0 ps-md-2">
                            <div class="text-14 font-weight-700 lineheight-18 color-b-blue">{{trans('Property Category')}}</div>
                            <div class="text-14 font-weight-400 lineheight-18 color-b-blue pt-1">{{$property->category->name ??
                                '-'}}</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div
                            class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                            <i class="icon-home_protection  text-24 color-b-blue"></i>
                        </div>
                        <div class="card-text-right ps-0 ps-md-2">
                            <div class="text-14 font-weight-700 lineheight-18 color-b-blue">{{trans('Built')}}</div>
                            <div class="text-14 font-weight-400 lineheight-18 color-b-blue pt-1">{{$property->built." m²" ??
                                '-'}}</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div
                            class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                            <i class="  icon-my_profile  text-24 color-b-blue"></i>
                        </div>
                        <div class="card-text-right ps-0 ps-md-2">
                            <div class="text-14 font-weight-700 lineheight-18 color-b-blue">{{trans('Listed By')}}</div>
                            <div class="text-14 font-weight-400 lineheight-18 color-b-blue pt-1">{{$property->agent_name ?? '-'}}</div>
                        </div>
                    </div>
                </div>
            </div>


        <!-- property-description -->
        </x-views.layouts.main-card.main-card-index>
            <div class="position-relative">
                <div class="blur-top-section position-absolute z-2 w-100 pt-4 {{!empty($isHidden) ? '' : 'd-none' }}">
                    <div class="blur-head-section text-center">
                        <i class=" icon-house_lock text-120 color-b-blue"></i>
                        <div class="text-18 font-weight-700 line-height-24 color-b-blue pt-3 pb-1 text-capitalize">
                        {{trans('messages.properties.Connect_for_Full_Access')}}</div>
                        <div
                            class="text-18 font-weight-400 line-height-24 color-b-blue pt-4 pb-4 m-auto blur-small-text text-capitalize">
                            {{trans('messages.properties.Ready_to_seize_the_full_potential_of_this_property')}}</div>
                        <button type="button" class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 small-button gardient-button searchFilterBtn showagent" onclick="window.open('{{route(routeNamePrefix().'agentSearch.index',['agent' => $property->agent_email])}}','_self')">{{trans('messages.properties.Show_Agent')}}</button>
                    </div>
                </div>
            </div>
            @if(!empty($isHidden))
            <div class="position-relative property-blur">
                <x-views.layouts.main-card.main-card-index
                    :fieldData="['class' => 'card-description py-25 mb-30 b-color-white border-r-8  px-25']">
                    <div class="card-main-description">
                    <x-views.layouts.main-card.sub-components.card-heading
                        :fieldData="['class' => '','name' => trans('messages.properties.Property_Description')]" />
            
                    <div class="card-text-description">
                        <div id="propertyDescription" class="text-14 font-weight-400 line-height-22 color-b-blue">
                            <span class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora voluptatibus vitae molestiae iure dicta! Voluptatum accusamus nobis ea minus esse at ab quisquam in, quo cumque molestias, eligendi quas voluptatibus!</span>
                            
                        </div>

                        <div class="card-text-header text-16 font-weight-700 line-height-20 color-primary pt-15">
                            {{trans('messages.properties.Property_Details')}}</div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Property_Reference')}}</div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        ABC</div>
                                </div>
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Price')}}</div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">000</div>
                                </div>
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Property_Size')}}
                                    </div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">000
                                    </div>
                                </div>
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.search_filter.Bedrooms')}}</div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        0</div>
                                </div>
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.search_filter.Bathrooms')}}
                                    </div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        0</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Property_Ownerr')}}
                                    </div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.Property_Ownerr')}}</div>
                                </div>
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Property_Type')}}
                                    </div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.Property_Type')}}</div>
                                </div>
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Property_Category')}}</div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.Property_Category')}}</div>
                                </div>
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Property_Situation')}}</div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.Property_Situation')}}</div>
                                </div>

                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Property_Title')}}
                                    </div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{trans('messages.properties.Property_Title')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
        </x-views.layouts.main-card.main-card-index>

        <!-- vendor-information -->
        <x-views.layouts.main-card.main-card-index
                    :fieldData="['class' => 'card-description py-25 mb-30 b-color-white border-r-8  px-25']">
                    <div class="card-main-description">
                    <x-views.layouts.main-card.sub-components.card-heading
                        :fieldData="['class' => '','name' => trans('messages.properties.Vendor_Information')]" />
                    <div class="card-text-description pt-2">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Vendor_Name')}}
                                    </div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.Vendor_Name')}}</div>
                                </div>
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Vendor_Phone')}}
                                    </div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.Vendor_Phone')}}</div>
                                </div>
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Vendor_Mobile')}}
                                    </div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.Vendor_Mobile')}}</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Vendor_Email')}}
                                    </div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.Vendor_Email')}}</div>
                                </div>
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Vendor_Fax')}}
                                    </div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.Vendor_Fax')}}</div>
                                </div>
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Vendor_Address')}}
                                    </div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.Vendor_Address')}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </x-views.layouts.main-card.main-card-index>

        <!-- location -->
        <x-views.layouts.main-card.main-card-index
                    :fieldData="['class' => 'card-description py-25 mb-30 b-color-white border-r-8 pb-3']">
                    
                    <x-views.layouts.main-card.sub-components.card-heading
                            :fieldData="['class' => '','name' => trans('messages.properties.Location')]" />
                    <div class="card-text-description pt-15">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue col-8 col-sm-6 col-md-6 col-lg-8">{{trans('messages.properties.Door_Flat_No')}}</div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.Door_Flat_No')}}</div>
                                </div>
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.City')}}</div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.City')}}</div>
                                </div>
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.State')}}</div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.State')}}</div>
                                </div>

                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Street')}}</div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.Street')}}</div>
                                </div>

                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Zip_Postal_Code')}}</div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.Zip_Postal_Code')}}</div>
                                </div>
                                <div class="d-flex pt-15">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Country')}}</div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{trans('messages.properties.Country')}}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ////propery-map/// -->
                    <div class="col-lg-12 mt-3">
                        <div id="propertyMap" style="height: 330px;"></div>
                    </div>
                    <x-views.layouts.main-card.sub-components.card-heading
                        :fieldData="['class' => '','name' => trans('messages.properties.Property_Notes')]" />
                    <div class="card-text-description">
                        <div class="text-12 font-weight-400 line-height-22 color-b-blue">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem quaerat ipsa, eaque officiis qui fugit voluptates numquam quos facilis esse porro deleniti ullam quisquam eius libero possimus est dicta nostrum!</div>
                    </div>
        </x-views.layouts.main-card.main-card-index>

        <!-- facility -->
        <x-views.layouts.main-card.main-card-index
                    :fieldData="['class' => 'card-description py-25 mb-30 b-color-white border-r-8  px-25']">
                    <div class="card-main-description">
                    <x-views.layouts.main-card.sub-components.card-heading
                        :fieldData="['class' => '','name' => trans('messages.properties.Facilities')]" />
                    <div class="row">
                        <div class="col-md-12 common-label-css mt-2 d-flex align-items-center gap2 flex-wrap">
                            @php
                            $featur = [1,2,3,4,5,6,7];
                            @endphp
                            @foreach($featur as $fKey => $feature)

                            <label for="feature{{ $fKey }}" class="d-flex align-items-center gap-2">
                                <span class="icon-Facilites-3 text-24 color-b-blue"></span>
                                <span class="feature-name-view text-12 font-weight-400 color-b-blue line-height-15">{{trans('messages.properties.Feature')}} {{$fKey}}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    </div>
        </x-views.layouts.main-card.main-card-index>
    </div>
            @else


            <div class="position-relative">

                <!-- property-description -->
                  <x-views.layouts.main-card.main-card-index
                    :fieldData="['class' => 'card-description py-25 mb-30 b-color-white border-r-8  px-25']">
                    <div class="card-main-description">
                    <x-views.layouts.main-card.sub-components.card-heading
                        :fieldData="['class' => '','name' => trans('messages.properties.Property_Description')]" />
                    <div class="card-text-description">
                    <?php
                        $description = strip_tags($property->description);
                        $limitedDescription = mb_substr($description, 0, 500);
                        
                    ?>

                    <div id="propertyDescription" class="text-14 font-weight-400 line-height-22 color-b-blue">
                        <span class="content"><?php echo $limitedDescription; ?></span>
                        <span class="hidden-content" style="display: none;"><?php echo mb_substr($description, 500); ?></span>
                            <?php
                                // Check if the description has more than 3 lines
                               if (strlen($description) > 500) {
                                    echo '<a href="#" class="toggle-link text-14 font-weight-700 lineheight-18 color-b-blue text-decoration-underline d-block pt-2">'.trans('messages.properties.Show_More').'</a>';
                                }
                            ?>
                        
                    </div>
                    </div>
                    </div>

                  <div class="card-main-description">
                    <div class=" card-text-header text-18 font-weight-700 lineheight-22 color-primary pt-3 pb-10">{{trans('messages.properties.Property_Details')}}</div>
                        <div class="row pt-1">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Property_Category').":"}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->category->name ?? '-'}}</div>
                                    </div>
                                </div> 
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Property_Situation').":"}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->situation->name ?? '-'}}</div>
                                    </div>
                                </div> 
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Property_Reference').":"}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->reference ?? '-'}}</div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Price').":"}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{!empty($property->price)?config('Reading.default_currency').' '.number_format($property->price,2) :
                                               config('Reading.default_currency').' 0.00'}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                          <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.search_filter.Bedrooms').":"}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->bedrooms ?? '-'}}
                                    </div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                          <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('Floor No:')}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->floors ?? '-'}}
                                    </div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                          <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('Storeys:')}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->storeys ?? '-'}}
                                    </div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                          <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('Terrace:')}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->terrace ?? '-'}}
                                    </div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                          <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('Agency Ref:')}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->agency_ref ?? '-'}}
                                    </div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                          <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('Int. Floor Space:')}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->properties_int_floor_space ?? '-'}}
                                    </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                               
                               <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Property_Type').":"}}
                                    </div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->type->name ?? '-'}}</div>
                                    </div>
                               </div>
                               <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('Property Subtype:')}}
                                    </div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->subtype->name ?? '-'}}</div>
                                    </div>
                               </div>
                                  
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Property_Title').":"}}
                                    </div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->name ?? '-'}}
                                    </div>
                                    </div>
                                </div> 
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.search_filter.Bathrooms').":"}}
                                    </div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->bathrooms ?? '-'}}</div>
                                    </div>
                                </div> 
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                           <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('Total Size:')}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{!empty($property->size)?number_format($property->size,2)." m" : '0.00 m'}}
                                    </div>
                                        </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                           <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('Built:')}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{!empty($property->built)?$property->built." m" : '0.00'}}
                                    </div>
                                        </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                           <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('No. of Properties in Build in:')}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{!empty($property->no_of_properties_builtin)?$property->no_of_properties_builtin : '-'}}
                                    </div>
                                        </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                           <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('Levels:')}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{!empty($property->levels)?$property->levels : '-'}}
                                    </div>
                                        </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                           <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('Garden/Plot:')}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{!empty($property->garden_plot)?$property->garden_plot : '-'}}
                                    </div>
                                        </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                  </div>
                </x-views.layouts.main-card.main-card-index>

                <x-views.layouts.main-card.main-card-index
                    :fieldData="['class' => 'card-description py-25 mb-30 b-color-white border-r-8  px-25']">
                    <div class="card-main-description">
                    <x-views.layouts.main-card.sub-components.card-heading
                        :fieldData="['class' => '','name' => trans('messages.properties.Vendor_Information')]" />
                    <div class="card-text-description">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Vendor_Name')}} 
                                    </div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->vendor_name ?? '-'}}</div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Vendor_Phone')}}
                                    </div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->vendor_phone ?? '-'}}</div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Vendor_Mobile')}}
                                    </div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->vendor_mobile ?? '-'}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Vendor_Email')}}
                                    </div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue  text-break">
                                        {{$property->vendor_email ?? '-'}}</div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Vendor_Fax')}}
                                    </div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->vendor_fax ?? '-'}}</div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Vendor_Address')}}
                                    </div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->vendor_address ?? '-'}}</div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                                    </div>
                </x-views.layouts.main-card.main-card-index>

                <x-views.layouts.main-card.main-card-index
                    :fieldData="['class' => 'card-description py-25 mb-30 b-color-white border-r-8  px-25']">
                    <div class="card-main-description">
                      <x-views.layouts.main-card.sub-components.card-heading
                        :fieldData="['class' => '','name' => trans('messages.properties.Location')]" />
                      <div class="card-text-description">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                          <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Door_Flat_No')}}
                                          </div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                          <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->street_number ?? '-'}}</div>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.City')}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->city ?? '-'}}</div>
                                    </div>
                                </div> 
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.State')}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                    {{$property->state ?? '-'}}</div>
                                    </div>
                                </div> 
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Street')}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->street_name ?? '-'}}</div>
                                    </div>
                                </div> 
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Zip_Postal_Code')}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->zipcode ?? '-'}}</div>
                                    </div>
                                </div> 
                                <div class="row pt-3">
                                    <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue ">{{trans('messages.properties.Country')}}</div>
                                    </div>
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-8">
                                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">
                                        {{$property->country ?? '-'}}</div>
                                    </div>
                                </div> 
                            </div>
                            
                        </div>
                      </div>
                    </div>

                    <div class="card-main-description pt-15">
                        
                        <div class="col-lg-12">
                            <div id="propertyMap" style="height: 330px;"></div>
                        </div>
                    </div>

                    <div class="card-main-description pt-15">
                        <x-views.layouts.main-card.sub-components.card-heading
                            :fieldData="['class' => '','name' => trans('messages.properties.Property_Notes')]" />
                        <div class="card-text-description">
                            <div class="text-14 font-weight-400 line-height-22 color-b-blue">{{$property->notes}}</div>
                        </div>
                        </x-views.layouts.main-card.main-card-index>
                    </div>
               
                    <!-- features -->
                <x-views.layouts.main-card.main-card-index
                    :fieldData="['class' => 'card-description py-25 b-color-white border-r-8  px-25']">
                    <div class="card-main-description">
                    <x-views.layouts.main-card.sub-components.card-heading
                        :fieldData="['class' => '','name' => trans('messages.properties.Facilities')]" />
                    <div class="row">
                
                            @php
                            $selectedFeatures = $property->features->pluck('id')->toArray();
                            @endphp
                            @if(!empty($selectedFeatures))
                            @foreach($featur as $feature)
                          
                            @if(in_array($feature->id, $selectedFeatures))
                            <div class="col-6 col-sm-4 col-md-3 common-label-css mt-2 d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                            <label for="feature{{ $feature->id }}" class="d-flex align-items-center gap-2">
                                <span class="{{$feature->icon ?? ''}} text-24 color-b-blue"></span>
                                <span class="feature-name-view text-12 font-weight-400 color-b-blue line-height-15">{{
                                    $feature->name }}</span>
                            </label>
                            </div>
                            @endif
                           
                            @endforeach
                            @else
                            <p class="text-center">{{trans('messages.properties.No_Facilities_Selected')}}</p>
                            @endif
                        </div>
                    </div>
                          
                </x-views.layouts.main-card.main-card-index>


            </div>
        @endif
        </form>

        @push('scripts')
        <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap&libraries=places" defer></script>
        <script>
            var latVal = "{{$property->latitude ?? ''}}";
            var lngVal = "{{$property->longitude ?? ''}}";
            var isHidden = "{{!empty($isHidden) ? 'yes' : 'no'}}";
            var propertyDeleteUrl = "{{route(routeNamePrefix().'properties.destroy',':id')}}";
            var propertyDeleteConfirmText = "{{trans('messages.confirm_popup.You_are_attempting_to_delete_Your_Property')}}";
            var areYouSureTextConfirmPopup = "{{trans('messages.confirm_popup.Are_you_sure')}}";
            var deleteTextConfirmPopup = "{{trans('messages.confirm_popup.Delete')}}";
            var showMoreText = "{{trans('messages.properties.Show_More')}}";
            var showLessText = "{{trans('messages.properties.Show_Less')}}";
        </script>
        <script src="{{ asset('assets/js/modules/properties/show_property.js') }}"></script>    

        
        @endpush

        @endsection