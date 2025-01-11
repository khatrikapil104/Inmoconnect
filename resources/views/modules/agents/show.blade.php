@extends('layouts.app')
@section('content')

@section('title')
   Agent | Property Inmoconnect
@endsection

<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="min-vh-100 b-color-background">
      <div class="crm-main-content">
<x-forms.crm-breadcrumb :fieldData="[['url' => route(routeNamePrefix().'properties.index'),'label' => 'Property Listing'],['url' => '','label' => $property->agent_name ?? ''],['url' => '','label' => trans('messages.View_Property')]]"/>
<form action="{{ route(routeNamePrefix().'properties.show', $property->id) }}" method="post" class="" id="editPropertyForm" enctype="multipart/form-data">

<!-- ////////////// -->
<div class="row mb-30">
    <div class="col-sm-8 col-md-8 col-lg-9">
        <!-- ////////property-name//////////// -->
        <div class="property-header-details d-flex align-items-center justify-content-between">
            <div class="property-details property-name">
                <h3 class="text-18 font-weight-700 lineheight-22 color-b-blue letter-s-48">{{ $property->name }} </h3>
        </div>
    </div>
    <div class="gap-3 col-sm-4 col-md-4 col-lg-3 d-flex flex-column justify-content-between align-items-start align-items-sm-end mt-4 pt-4 mt-sm-0 pt-sm-0">
        <!--///// property-price //////////-->
        <div class="property-details">
            <p class="text-32 font-weight-700 line-height-40 etter-s-64 color-b-blue">{{ $property->price }}€</p>
        </div>
    </div>
</div>

<div class="property-detail-share d-flex justify-content-between align-items-center pt-2 pb-5">
    <div class="property-details d-flex align-items-center gap-3">
        <div class="property-address d-flex align-items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
  <g clip-path="url(#clip0_1_30987)">
    <path d="M6.99489 1.04688C4.36442 1.04688 2.17145 3.45859 2.86051 6.17656C3.63708 9.25547 7.02223 12.6898 7.02223 12.6898C7.02223 12.6898 10.3472 9.26641 11.1402 6.19297C11.8347 3.475 9.62536 1.04688 6.99489 1.04688ZM10.5824 6.03438C9.90426 8.74141 7.01676 11.8422 7.01676 11.8422C7.01676 11.8422 4.08004 8.70313 3.41286 5.99609C2.82223 3.60625 4.73629 1.60469 6.99489 1.60469C9.25348 1.61563 11.184 3.65 10.5824 6.03438Z" fill="#17213A" stroke="#17213A" stroke-width="0.5"/>
    <path d="M7.0002 3.20703C5.69316 3.20703 4.6377 4.2625 4.6377 5.56953C4.6377 6.87656 5.69316 7.93203 7.0002 7.93203C8.30723 7.93203 9.3627 6.87656 9.3627 5.56953C9.3627 4.26797 8.30176 3.20703 7.0002 3.20703ZM7.0002 7.37422C6.00488 7.37422 5.20098 6.56484 5.20098 5.575C5.20098 4.57969 6.01035 3.77578 7.0002 3.77578C7.99551 3.77578 8.79941 4.58516 8.79941 5.575C8.79941 6.56484 7.99004 7.37422 7.0002 7.37422Z" fill="#17213A" stroke="#17213A" stroke-width="0.5"/>
    <path d="M8.97432 11.35C9.96416 11.5469 10.6204 11.8914 10.6204 12.2797C10.6204 12.8922 9.00166 13.3898 7.0001 13.3898C4.99854 13.3898 3.37979 12.8922 3.37979 12.2797C3.37979 11.8914 4.0251 11.5523 4.99854 11.3555L4.87822 10.8359C3.64228 11.1258 2.81104 11.6617 2.81104 12.2797C2.81104 13.2039 4.68682 13.9531 7.00557 13.9531C9.32432 13.9531 11.2001 13.2039 11.2001 12.2797C11.2001 11.6672 10.3688 11.1258 9.12744 10.8359L8.97432 11.35Z" fill="#17213A" stroke="#17213A" stroke-width="0.5"/>
  </g>
  <defs>
    <clipPath id="clip0_1_30987">
      <rect width="14" height="14" fill="white" transform="translate(0 0.5)"/>
    </clipPath>
  </defs>
</svg>
        <p class="text-12 color-b-blue font-weight-400 line-height-15">{{ $property->address }}</p>
</div>
        <p> {{$property->category->name}}</p>
        <p> {{ $property->reference }}</p>
        <p>
		    @if ($property->owner_name)
		        {{ $property->owner_name }}
		    @else
		        {{ $property->vendor_name }}
		    @endif
		</p>
    </div>


    <div class="row">
    <div class="col-md-12 d-flex gap-2 gap-md-3">
    	<x-forms.crm-button :fieldData="[
            'type' => 'button',
            'url'  => route(routeNamePrefix().'properties.index'),
            'target' => '_self',
            'class' => '  icon-property_search text-24 b-color-transparent',
            'id' => 'shareBtn',
            'attributes' => [],
        ]"/>
        <x-forms.crm-button :fieldData="[
            'type' => 'button',
            'url'  => route(routeNamePrefix().'properties.edit.new',$property->id),
            'target' => '_self',
            'class' => '  icon-property_search text-24 b-color-transparent',
            'id' => 'editBtn',
            'attributes' => [],
        ]"/>
        <x-forms.crm-button :fieldData="[
            'type' => 'button',
            'url'  => route(routeNamePrefix().'properties.index'),
            'target' => '_self',
            'class' => '  icon-property_search text-24 b-color-transparent',
            'id' => 'deleteBtn',
            'attributes' => [],
        ]"/>
     </div>
        </div>
        </div>

<x-views.layouts.images-layout.image-gallery :fieldData="['imagesData' => $propertyImages ?? []]"/>
<x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-35 mb-30 b-color-white border-r-8 pb-3']">
<x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '','name' => 'Overview']"/>
<div class="card-text-description d-flex align-items-center justify-content-between">
         <div class="d-flex align-items-center pt-15">
            <div class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_1739_116489)">
                      <path d="M22.7819 11.6115H22.3413V6.19463C22.3413 5.75158 21.9808 5.39117 21.5378 5.39117H19.4997C19.336 5.39117 19.1834 5.3483 19.0584 5.26718C17.5771 4.30614 14.9384 3.73242 12 3.73242C9.06158 3.73242 6.42293 4.30614 4.94162 5.26718C4.81664 5.34825 4.66409 5.39117 4.50034 5.39117H2.4622C2.01916 5.39117 1.65875 5.75158 1.65875 6.19463V11.6115H1.21814C0.546454 11.6115 0 12.1579 0 12.8296V13.659C0 14.1948 0.347819 14.6505 0.829374 14.8132V18.2205C0.829374 18.7563 1.17719 19.2121 1.65875 19.3747V19.8793C1.65875 20.094 1.83281 20.2681 2.04752 20.2681C2.26222 20.2681 2.43629 20.094 2.43629 19.8793V19.4387H21.5637V19.8793C21.5637 20.094 21.7378 20.2681 21.9525 20.2681C22.1672 20.2681 22.3413 20.094 22.3413 19.8793V19.3747C22.8228 19.2121 23.1706 18.7563 23.1706 18.2205V14.8132C23.6522 14.6505 24 14.1948 24 13.659V12.8296C24 12.1579 23.4535 11.6115 22.7819 11.6115ZM2.43629 6.19463C2.43629 6.18037 2.4479 6.16871 2.4622 6.16871H4.50034C4.81462 6.16871 5.11356 6.08256 5.3648 5.91948C6.70492 5.05009 9.24736 4.50996 12 4.50996C14.7526 4.50996 17.2951 5.05009 18.6351 5.91948C18.8864 6.08256 19.1853 6.16871 19.4996 6.16871H21.5378C21.5521 6.16871 21.5637 6.18037 21.5637 6.19463V11.6115H20.4399C20.5936 11.3626 20.6825 11.0696 20.6825 10.7562V9.09743C20.6825 8.1971 19.95 7.4646 19.0497 7.4646H14.0734C13.1731 7.4646 12.4406 8.1971 12.4406 9.09743V10.7562C12.4406 11.0696 12.5296 11.3626 12.6832 11.6115H11.3167C11.4704 11.3626 11.5593 11.0696 11.5593 10.7562V9.09743C11.5593 8.1971 10.8269 7.4646 9.92651 7.4646H4.95027C4.04999 7.4646 3.31749 8.1971 3.31749 9.09743V10.7562C3.31749 11.0696 3.40645 11.3626 3.56014 11.6115H2.43629V6.19463ZM13.2181 10.7562V9.09743C13.2181 8.62583 13.6018 8.24214 14.0734 8.24214H19.0497C19.5213 8.24214 19.905 8.62583 19.905 9.09743V10.7562C19.905 11.2278 19.5213 11.6115 19.0497 11.6115H14.0734C13.6018 11.6115 13.2181 11.2278 13.2181 10.7562ZM4.09503 10.7562V9.09743C4.09503 8.62583 4.47872 8.24214 4.95032 8.24214H9.92657C10.3982 8.24214 10.7819 8.62583 10.7819 9.09743V10.7562C10.7819 11.2278 10.3982 11.6115 9.92657 11.6115H4.95032C4.47872 11.6115 4.09503 11.2278 4.09503 10.7562ZM21.9525 18.6612H2.04752C1.80456 18.6612 1.60691 18.4635 1.60691 18.2205V14.8771H22.3931V18.2205C22.3931 18.4635 22.1954 18.6612 21.9525 18.6612ZM23.2225 13.659C23.2225 13.9019 23.0248 14.0996 22.7819 14.0996H1.21814C0.975188 14.0996 0.777538 13.9019 0.777538 13.659V12.8296C0.777538 12.5867 0.975188 12.389 1.21814 12.389H2.04752H4.95032H9.92657H14.0734H19.0497H21.9525H22.7819C23.0248 12.389 23.2225 12.5867 23.2225 12.8296V13.659Z" fill="#17213A"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_1739_116489">
                        <rect width="24" height="24" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
            </div>
            <div class="card-text-right ps-2">
                <div class="text-14 font-weight-700 lineheight-18 color-b-blue">Bedroom</div>
                <div class="text-14 font-weight-400 line-height-18 color-b-blue">{{$property->bedrooms ?? 0}}</div>
            </div>
         </div>
         <div class="d-flex align-items-center pt-15">
            <div class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_1739_116496)">
                      <path d="M22.8 12.7998H22.4V4.3998C22.4 2.39979 20.8 0.799805 18.8 0.799805C17.0295 0.799805 15.7562 2.11259 15.6137 4.0361C14.6842 4.21179 14 5.01232 14 5.99979C14 6.23979 14.16 6.39977 14.4 6.39977H17.6C17.84 6.39977 18 6.23979 18 5.99979C18 5.02324 17.3309 4.22937 16.4172 4.04196C16.5367 2.7709 17.3001 1.59977 18.8 1.59977C20.36 1.59977 21.6 2.83976 21.6 4.39976V12.7998H9.56133C9.38039 11.8772 8.58267 11.1998 7.60003 11.1998C7.20005 10.7198 6.64003 10.3998 6.00005 10.3998C5.24006 10.3998 4.56005 10.8398 4.24003 11.4798C3.92002 11.3198 3.56002 11.1998 3.20002 11.1998C2.21738 11.1998 1.41966 11.8772 1.23872 12.7998H1.2C0.519984 12.7998 0 13.3197 0 13.9998C0 14.6798 0.519984 15.1998 1.2 15.1998H1.6807L2.76 19.4798C3.08002 20.7198 4.2 21.5998 5.48002 21.5998H5.80003L5.28005 22.6398C5.16005 22.8398 5.24006 23.0798 5.44003 23.1598C5.48002 23.1998 5.56003 23.1998 5.60002 23.1998C5.76 23.1998 5.88 23.1198 5.96002 22.9998L6.66 21.5998H17.76L18.44 22.9598C18.52 23.1198 18.64 23.1998 18.8 23.1998C18.88 23.1998 18.92 23.1998 18.96 23.1198C19.12 23.0397 19.2 22.7997 19.12 22.5998L18.6189 21.5976C19.8573 21.5537 20.9283 20.6887 21.24 19.5198L22.3294 15.1998H22.8C23.48 15.1998 24 14.6798 24 13.9998C24 13.3198 23.48 12.7998 22.8 12.7998ZM17.16 5.5998H14.88C15.04 5.1198 15.52 4.79979 16.04 4.79979C16.56 4.79979 17 5.1198 17.16 5.5998ZM3.20002 11.9998C3.56002 11.9998 3.88003 12.1598 4.16002 12.4398C4.24003 12.5598 4.40002 12.5998 4.56 12.5598C4.71998 12.5198 4.8 12.3998 4.83998 12.2398C4.95998 11.6398 5.43998 11.1998 6.03998 11.1998C6.48 11.1998 6.87998 11.3998 7.08 11.7998C7.16002 11.9598 7.35998 12.0398 7.52002 11.9998C7.56 11.9998 7.60003 11.9998 7.64002 11.9998C8.16 11.9998 8.60002 12.3198 8.76 12.7998H2.07998C2.24002 12.3198 2.67998 11.9998 3.20002 11.9998ZM20.52 19.2798C20.28 20.1598 19.48 20.7998 18.56 20.7998H5.52C4.59998 20.7998 3.80002 20.1598 3.56002 19.2798L2.52 15.1998H21.48L20.52 19.2798ZM22.8 14.3998H22H2.00002H1.2C0.96 14.3998 0.800016 14.2398 0.800016 13.9998C0.800016 13.7598 0.96 13.5998 1.2 13.5998H1.59998H9.19997H22.8C23.04 13.5998 23.2 13.7598 23.2 13.9998C23.2 14.2398 23.04 14.3998 22.8 14.3998Z" fill="#17213A"/>
                      <path d="M14.4 8.19969C14.64 8.19969 14.8 8.03971 14.8 7.79971V7.59969C14.8 7.35969 14.64 7.19971 14.4 7.19971C14.16 7.19971 14 7.35969 14 7.59969V7.79971C14 8.03971 14.16 8.19969 14.4 8.19969Z" fill="#17213A"/>
                      <path d="M14.4 10.0398C14.64 10.0398 14.8 9.83977 14.8 9.63981V9.19979C14.8 8.95979 14.64 8.7998 14.4 8.7998C14.16 8.7998 14 8.95979 14 9.19979V9.63981C14 9.87976 14.16 10.0398 14.4 10.0398Z" fill="#17213A"/>
                      <path d="M14.4 11.5996C14.64 11.5996 14.8 11.4396 14.8 11.1996V10.9996C14.8 10.7596 14.64 10.5996 14.4 10.5996C14.16 10.5996 14 10.7596 14 10.9996V11.1996C14 11.4396 14.16 11.5996 14.4 11.5996Z" fill="#17213A"/>
                      <path d="M15.9996 8.19969C16.2396 8.19969 16.3996 8.03971 16.3996 7.79971V7.59969C16.3996 7.35969 16.2396 7.19971 15.9996 7.19971C15.7596 7.19971 15.5996 7.35969 15.5996 7.59969V7.79971C15.5996 8.03971 15.7596 8.19969 15.9996 8.19969Z" fill="#17213A"/>
                      <path d="M15.5996 9.6398C15.5996 9.8798 15.7596 10.0398 15.9996 10.0398C16.2396 10.0398 16.3996 9.83977 16.3996 9.6398V9.19979C16.3996 8.95979 16.2396 8.7998 15.9996 8.7998C15.7596 8.7998 15.5996 8.95979 15.5996 9.19979V9.6398Z" fill="#17213A"/>
                      <path d="M15.5996 11.1996C15.5996 11.4396 15.7596 11.5996 15.9996 11.5996C16.2396 11.5996 16.3996 11.4396 16.3996 11.1996V10.9996C16.3996 10.7596 16.2396 10.5996 15.9996 10.5996C15.7596 10.5996 15.5996 10.7596 15.5996 10.9996V11.1996Z" fill="#17213A"/>
                      <path d="M17.5992 8.19969C17.8392 8.19969 17.9992 8.03971 17.9992 7.79971V7.59969C17.9992 7.35969 17.8392 7.19971 17.5992 7.19971C17.3592 7.19971 17.1992 7.35969 17.1992 7.59969V7.79971C17.1992 8.03971 17.3592 8.19969 17.5992 8.19969Z" fill="#17213A"/>
                      <path d="M17.1992 9.6398C17.1992 9.8798 17.3592 10.0398 17.5992 10.0398C17.8392 10.0398 17.9992 9.83982 17.9992 9.6398V9.19979C17.9992 8.95979 17.8392 8.7998 17.5992 8.7998C17.3592 8.7998 17.1993 8.95979 17.1993 9.19979L17.1992 9.6398Z" fill="#17213A"/>
                      <path d="M17.1992 11.1996C17.1992 11.4396 17.3592 11.5996 17.5992 11.5996C17.8392 11.5996 17.9992 11.4396 17.9992 11.1996V10.9996C17.9992 10.7596 17.8392 10.5996 17.5992 10.5996C17.3592 10.5996 17.1992 10.7596 17.1992 10.9996V11.1996Z" fill="#17213A"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_1739_116496">
                        <rect width="24" height="24" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
            </div>
            <div class="card-text-right ps-2">
                <div class="text-14 font-weight-700 lineheight-18 color-b-blue">Bathroom</div>
                <div class="text-14 font-weight-400 line-height-18 color-b-blue">{{$property->bathrooms ?? 0}}</div>
            </div>
         </div>
         <div class="d-flex align-items-center pt-15">
            <div class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M11.9996 13.6779C11.484 13.6779 10.9777 13.5936 10.5934 13.4436L1.81836 9.97481C1.04961 9.66543 0.927734 9.17793 0.927734 8.91543C0.927734 8.65293 1.04023 8.16543 1.81836 7.85606L10.5934 4.3873C11.3621 4.07793 12.6277 4.07793 13.3965 4.3873L22.1715 7.85606C22.9402 8.16543 23.0621 8.65293 23.0621 8.91543C23.0621 9.17793 22.9496 9.66543 22.1715 9.97481L13.3965 13.4436C13.0215 13.5936 12.5152 13.6779 11.9996 13.6779ZM2.63398 8.91543L11.0715 12.2529C11.5402 12.4404 12.459 12.4404 12.9277 12.2529L21.3559 8.91543L12.9277 5.57793C12.459 5.39043 11.5402 5.39043 11.0715 5.57793L2.63398 8.91543Z" fill="#17213A"/>
                    <path d="M11.9996 16.9592C11.484 16.9592 10.9777 16.8748 10.5934 16.7248L1.81836 13.2561C1.04961 12.9467 0.927734 12.4592 0.927734 12.1967C0.927734 11.9342 1.04023 11.4467 1.81836 11.1373L5.03398 9.8623L11.0621 12.2436C11.5309 12.4311 12.4496 12.4311 12.9184 12.2436L18.9465 9.8623L22.1715 11.1373C22.9402 11.4467 23.0621 11.9342 23.0621 12.1967C23.0621 12.4592 22.9496 12.9467 22.1715 13.2561L13.3965 16.7248C13.0215 16.8748 12.5152 16.9592 11.9996 16.9592ZM2.63398 12.1967L11.0715 15.5342C11.5402 15.7217 12.459 15.7217 12.9277 15.5342L21.3559 12.1967L18.9465 11.2404L13.3965 13.4342C12.6277 13.7436 11.3621 13.7436 10.5934 13.4342L5.04336 11.2404L2.63398 12.1967Z" fill="#17213A"/>
                    <path d="M11.9996 19.8374C11.484 19.8374 10.9777 19.753 10.5934 19.603L1.81836 16.1343C1.04961 15.8249 0.927734 15.3374 0.927734 15.0749C0.927734 14.8124 1.04023 14.3249 1.81836 14.0155L4.52773 12.9468L11.0621 15.5343C11.5309 15.7218 12.4496 15.7218 12.9184 15.5343L19.4527 12.9468L22.1621 14.0155C22.9309 14.3249 23.0527 14.8124 23.0527 15.0749C23.0527 15.3374 22.9402 15.8249 22.1621 16.1343L13.3871 19.603C13.0215 19.753 12.5152 19.8374 11.9996 19.8374ZM2.63398 15.0749L11.0715 18.4124C11.5402 18.5999 12.459 18.5999 12.9277 18.4124L21.3559 15.0749L19.4527 14.3249L13.4059 16.7249C12.6371 17.0343 11.3715 17.0343 10.6027 16.7249L4.53711 14.3249L2.63398 15.0749Z" fill="#17213A"/>
                  </svg>
            </div>
            <div class="card-text-right ps-2">
                <div class="text-14 font-weight-700 lineheight-18 color-b-blue">Floor </div>
                <div class="text-14 font-weight-400 line-height-18 color-b-blue">{{$property->floors ?? 0}}</div>
            </div>
         </div>
         <div class="d-flex align-items-center pt-15">
            <div class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_1739_116528)">
                      <path d="M23.5189 11.6884L14.3006 4.89006C13.8807 4.58052 13.3085 4.5825 12.8905 4.89437L3.78778 11.6928C3.26412 12.0835 3.15687 12.8248 3.54766 13.3481C3.93884 13.8714 4.67973 13.979 5.20339 13.5878L6.4238 12.6766V21.8586C6.4238 22.512 6.95338 23.0415 7.60675 23.0415H19.5904C20.2438 23.0415 20.7733 22.512 20.7733 21.8586V12.6028L22.1144 13.5918C22.3257 13.7479 22.5718 13.8228 22.8155 13.8228C23.1783 13.8228 23.5367 13.6564 23.7686 13.3417C24.1565 12.8166 24.0445 12.076 23.5189 11.6884ZM18.4074 11.2574V20.6756H8.78966V11.2574C8.78966 11.1486 8.77035 11.0449 8.74275 10.9447L13.6031 7.31505L18.4677 10.9025C18.4318 11.0154 18.4074 11.1329 18.4074 11.2574Z" fill="#17213A"/>
                      <path d="M21.6449 4.36145C21.9718 4.36145 22.2364 4.09649 22.2364 3.76997V1.54997C22.2364 1.2235 21.9718 0.958496 21.6449 0.958496H5.09636C4.76945 0.958496 4.50488 1.22346 4.50488 1.54997V3.76997C4.50488 4.09644 4.76945 4.36145 5.09636 4.36145C5.42327 4.36145 5.68784 4.09649 5.68784 3.76997V2.14145H7.21264V2.85712C7.21264 3.07517 7.38932 3.25145 7.60698 3.25145C7.82464 3.25145 8.00131 3.07521 8.00131 2.85712V2.14145H9.49458V2.85712C9.49458 3.07517 9.67126 3.25145 9.88892 3.25145C10.1066 3.25145 10.2833 3.07521 10.2833 2.85712V2.14145H11.7765V2.85712C11.7765 3.07517 11.9532 3.25145 12.1709 3.25145C12.3885 3.25145 12.5652 3.07521 12.5652 2.85712V2.14145H14.0583V2.85712C14.0583 3.07517 14.235 3.25145 14.4527 3.25145C14.6703 3.25145 14.847 3.07521 14.847 2.85712V2.14145H16.3407V2.85712C16.3407 3.07517 16.5173 3.25145 16.735 3.25145C16.9527 3.25145 17.1293 3.07521 17.1293 2.85712V2.14145H18.6226V2.85712C18.6226 3.07517 18.7993 3.25145 19.0169 3.25145C19.2346 3.25145 19.4113 3.07521 19.4113 2.85712V2.14145H21.0536V3.76997C21.0535 4.09649 21.3184 4.36145 21.6449 4.36145Z" fill="#17213A"/>
                      <path d="M3.40295 22.3162C3.40295 21.9898 3.13838 21.7248 2.81147 21.7248H1.18296V20.1999H1.89862C2.11628 20.1999 2.29295 20.0237 2.29295 19.8056C2.29295 19.5875 2.11628 19.4113 1.89862 19.4113H1.18296V17.918H1.89862C2.11628 17.918 2.29295 17.7418 2.29295 17.5237C2.29295 17.3056 2.11628 17.1293 1.89862 17.1293H1.18296V15.6361H1.89862C2.11628 15.6361 2.29295 15.4598 2.29295 15.2417C2.29295 15.0236 2.11628 14.8474 1.89862 14.8474H1.18296V13.3541H1.89862C2.11628 13.3541 2.29295 13.1779 2.29295 12.9598C2.29295 12.7417 2.11628 12.5655 1.89862 12.5655H1.18296V11.0722H1.89862C2.11628 11.0722 2.29295 10.8959 2.29295 10.6778C2.29295 10.4597 2.11628 10.2835 1.89862 10.2835H1.18296V8.79024H1.89862C2.11628 8.79024 2.29295 8.614 2.29295 8.3959C2.29295 8.17785 2.11628 8.00157 1.89862 8.00157H1.18296V6.35923H2.81147C3.13838 6.35923 3.40295 6.09427 3.40295 5.76775C3.40295 5.44123 3.13838 5.17627 2.81147 5.17627H0.591478C0.264572 5.17661 0 5.44157 0 5.76809V22.3167C0 22.6431 0.264572 22.9081 0.591478 22.9081H2.81147C3.13833 22.9077 3.40295 22.6427 3.40295 22.3162Z" fill="#17213A"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_1739_116528">
                        <rect width="24" height="24" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
            </div>
            <div class="card-text-right ps-2">
                <div class="text-14 font-weight-700 lineheight-18 color-b-blue">Sqft</div>
                <div class="text-14 font-weight-400 line-height-18 color-b-blue">{{number_format($property->size,2)}}</div>
            </div>
         </div>
         <div class="d-flex align-items-center pt-15">
            <div class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M10.2223 14.5085H13.7777C14.3081 14.5091 14.8165 14.7246 15.1915 15.1077C15.5664 15.4908 15.7772 16.0102 15.7776 16.5519V19.9566C15.7776 20.3318 16.0774 20.6373 16.4447 20.6373H20.0001C20.1768 20.6369 20.3461 20.5651 20.471 20.4375C20.5958 20.3099 20.6662 20.137 20.6665 19.9566V11.0496C20.6667 10.9513 20.646 10.8543 20.6059 10.765C20.5657 10.6757 20.5072 10.5964 20.4342 10.5325L12.434 3.52888C12.3136 3.42213 12.1595 3.36336 12 3.36336C11.8405 3.36336 11.6864 3.42213 11.566 3.52888L3.5665 10.5318C3.49331 10.5956 3.43457 10.6749 3.39433 10.7641C3.3541 10.8534 3.33333 10.9506 3.33347 11.0489V19.9559C3.33383 20.1363 3.40415 20.3093 3.52905 20.4368C3.65394 20.5644 3.82324 20.6362 3.99986 20.6366H7.55601C7.73264 20.6362 7.90193 20.5644 8.02682 20.4368C8.15172 20.3093 8.22204 20.1363 8.2224 19.9559V16.5519C8.22294 16.0103 8.4338 15.491 8.80871 15.1079C9.18362 14.7248 9.69197 14.5093 10.2223 14.5085ZM20.0001 21.9993H16.4447C15.9144 21.9988 15.4061 21.7834 15.0312 21.4004C14.6562 21.0174 14.4453 20.4982 14.4448 19.9566V16.5519C14.4448 16.3712 14.3745 16.1978 14.2495 16.0699C14.1244 15.942 13.9547 15.8701 13.7777 15.8699H10.2223C10.0454 15.8702 9.87591 15.9423 9.75097 16.0701C9.62604 16.198 9.55587 16.3713 9.55587 16.5519V19.9566C9.55515 20.4981 9.34422 21.0173 8.96933 21.4002C8.59444 21.7831 8.08619 21.9986 7.55601 21.9993H3.99986C3.46969 21.9986 2.96143 21.7831 2.58654 21.4002C2.21165 21.0173 2.00072 20.4981 2 19.9566V11.0496C2 10.4524 2.25484 9.88659 2.69842 9.49754L10.6986 2.49536C11.0601 2.17584 11.5222 2 12.0003 2C12.4784 2 12.9406 2.17584 13.3021 2.49536L21.3023 9.49893C21.5213 9.69077 21.697 9.92876 21.8175 10.1965C21.9379 10.4643 22.0002 10.7556 22 11.0503V19.9573C21.9995 20.4989 21.7886 21.0181 21.4137 21.4011C21.0387 21.7841 20.5304 21.9994 20.0001 22V21.9993Z" fill="#17213A"/>
                  </svg>
            </div>
            <div class="card-text-right ps-2">
                <div class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Reference</div>
                <div class="text-14 font-weight-400 line-height-18 color-b-blue">{{$property->reference ?? ''}}</div>
            </div>
         </div>
         <div class="d-flex align-items-center pt-15">
            <div class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M11.5605 2.02296C11.135 2.074 10.6955 2.21785 10.3027 2.4313C9.95205 2.62156 3.36867 7.75836 2.99929 8.12494C2.499 8.62609 2.14832 9.34533 2.04078 10.0739C2.00337 10.3384 1.99402 11.7072 2.00337 14.7838C2.02208 19.6746 1.99402 19.2988 2.40081 20.1201C2.58316 20.4913 2.68602 20.6259 3.04138 20.9832C3.4014 21.3358 3.537 21.4379 3.91105 21.6189C4.75735 22.0319 4.05133 21.9994 12 21.9994C19.9487 21.9994 19.2426 22.0319 20.0889 21.6189C20.463 21.4379 20.5986 21.3358 20.9586 20.9832C21.314 20.6259 21.4168 20.4913 21.5992 20.1201C22.006 19.2988 21.9779 19.6746 21.9966 14.7838C22.006 11.7072 21.9966 10.3384 21.9592 10.0739C21.8517 9.34533 21.501 8.62609 21.0007 8.12494C20.8745 7.99501 19.2473 6.70037 17.3911 5.24796C14.6277 3.08094 13.9404 2.56587 13.5897 2.3849C12.9632 2.06936 12.2572 1.94407 11.5605 2.02296ZM12.6032 3.11343C12.7388 3.14591 12.9585 3.22943 13.0941 3.2944C13.3606 3.42433 19.771 8.41728 20.2058 8.8349C20.5098 9.12724 20.7342 9.49382 20.8698 9.93465C20.9493 10.1945 20.9539 10.4729 20.9539 14.5517V18.8904L20.8511 19.2152C20.6033 19.9994 19.9674 20.6305 19.1772 20.8765L18.8499 20.9785H12H5.15011L4.82281 20.8765C4.0373 20.6305 3.44816 20.0505 3.15359 19.2384L3.04605 18.9368V14.5749C3.04605 10.4729 3.05073 10.1945 3.13021 9.93465C3.25178 9.55415 3.4014 9.27109 3.63986 8.99267C3.89235 8.69105 10.5692 3.46145 10.9106 3.2944C11.0415 3.22943 11.2519 3.14591 11.3781 3.11343C11.6821 3.0299 12.2946 3.0299 12.6032 3.11343Z" fill="#17213A"/>
                    <path d="M9.23225 17.5957C9.06392 17.6838 9.00781 17.7952 9.00781 18.0319C9.00781 18.2732 9.0686 18.3845 9.2416 18.4727C9.44733 18.5794 14.5532 18.5794 14.7589 18.4727C14.9319 18.3845 14.9927 18.2732 14.9927 18.0319C14.9927 17.7906 14.9319 17.6792 14.7589 17.591C14.5579 17.4889 9.42395 17.4889 9.23225 17.5957Z" fill="#17213A"/>
                  </svg>
            </div>
            <div class="card-text-right ps-2">
                <div class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Type</div>
                <div class="text-14 font-weight-400 line-height-18 color-b-blue">{{$property->type->name ?? ''}}</div>
            </div>
         </div>
      </div>
    
</x-views.layouts.main-card.main-card-index>

<x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-35 mb-30 b-color-white border-r-8 pb-3']">
<x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '','name' => 'Property Description']"/>
     <div class="row">
<div class="card-text-description pt-15">
           	<div id="propertyDescription" class="text-14 font-weight-400 line-height-22 color-b-blue">
	            <span class="content">{{ $property->description }}</span>
	            <a href="#" class="toggle-link text-14 font-weight-700 lineheight-18 color-b-blue text-decoration-underline d-block py-2">Show More</a>
	        </div>

            <div class="card-text-header text-16 font-weight-700 line-height-20 color-primary pt-15">Property Details</div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="d-flex pt-15">
                        <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-39">Property Reference</div> 
                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->reference}}</div> 
                    </div>
                    <div class="d-flex pt-15">
                        <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-39">Price</div> 
                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{ $property->price }}€</div> 
                    </div>
                    <div class="d-flex pt-15">
                        <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-39">Property Size</div> 
                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->size}}</div> 
                    </div>
                    <div class="d-flex pt-15">
                        <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-39">Bedrooms</div> 
                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->bedrooms}}</div> 
                    </div>
                    <div class="d-flex pt-15">
                        <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-39">Bathrooms</div> 
                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->bathrooms}}</div> 
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="d-flex pt-15">
                        <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-28">Property Owner</div> 
                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->owner_name}}</div> 
                    </div>
                    <div class="d-flex pt-15">
					    <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-28">Property Type</div> 
					    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->type->name}}</div> 
					</div>
					<div class="d-flex pt-15">
					    <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-28">Property Category</div> 
					    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->category->name}}</div> 
					</div>
					<div class="d-flex pt-15">
					    <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-28">Property Situation</div> 
					    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->situation->name}}</div> 
					</div>

                    <div class="d-flex pt-15">
                        <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-28">Property Title</div> 
                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->name}}</div> 
                    </div>
                </div>
            </div>
        </div>
        </div>
</x-views.layouts.main-card.main-card-index>

<x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-35 mb-30 b-color-white border-r-8 pb-3']">
<x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '','name' => 'Vendor Information']"/>
    <div class="card-text-description pt-15">
        <div class="row">
        	<div class="col-lg-4">
                <div class="d-flex pt-15">
                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-39">Vendor Name</div> 
                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->vendor_name}}</div> 
                </div>
                <div class="d-flex pt-15">
                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-39">Vendor Phone</div> 
                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->vendor_phone}}</div> 
                </div>
                <div class="d-flex pt-15">
                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-39">Vendor Mobile</div> 
                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->vendor_mobile}}</div> 
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex pt-15">
                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-28">Vendor Email</div> 
                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue  text-break">{{$property->vendor_email}}</div> 
                </div>
                <div class="d-flex pt-15">
                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-28">Vendor Fax</div> 
                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->vendor_fax}}</div> 
                </div>
                <div class="d-flex pt-15">
                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-28">Vendor Address </div> 
                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->vendor_address}}</div> 
                </div>
            </div>
        </div>
    </div>
</x-views.layouts.main-card.main-card-index>


<x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-35 mb-30 b-color-white border-r-8 pb-3']">
<x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '','name' => 'Location']"/>
    <div class="card-text-description pt-15">
        <div class="row">
        	<div class="col-lg-4">
                <div class="d-flex pt-15">
                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-39">Address</div> 
                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->address}}</div> 
                </div>
                <div class="d-flex pt-15">
                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-39">City</div> 
                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->city_id}}</div> 
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex pt-15">
                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-28">Zip/Postal Code</div> 
                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->zipcode}}</div> 
                </div>
                <div class="d-flex pt-15">
                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue w-28">State</div> 
                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue ">{{$property->state_id}}</div> 
                </div>
            </div>

 	    </div>
    </div>
 <x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '','name' => 'Property Notes']"/>
 	<div class="card-text-description pt-15">
        <div class="text-14 font-weight-400 line-height-22 color-b-blue">{{$property->notes}}</div>
 	</div>
     <div class="col-lg-12 mt-3">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.274257380938!2d-70.56068388481569!3d41.45496659976631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e52963ac45bbcb%3A0xf05e8d125e82af10!2sDos%20Mas!5e0!3m2!1sen!2sus!4v1671220374408!5m2!1sen!2sus"
            width="100%" height="330" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
</x-views.layouts.main-card.main-card-index>

<x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-35 mb-30 b-color-white border-r-8 pb-3']">
<x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '','name' => 'Facilities']"/>
     <div class="row">
        <div class="col-md-12 common-label-css mt-2">
            @php
            $selectedFeatures = $property->features->pluck('id')->toArray();
            @endphp
            @foreach($featur as $feature)
	           
	            @if(in_array($feature->id, $selectedFeatures))
	            <label for="feature{{ $feature->id }}" class="">
                    <span class="{{$feature->icon ?? ''}} text-24"></span>
	                <span class="feature-name-view">{{ $feature->name }}</span>
	            </label>
	        	@endif
            @endforeach
        </div>
   </div>
</x-views.layouts.main-card.main-card-index>
</form>
@push('scripts')
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const description = document.getElementById('propertyDescription');
            const content = description.querySelector('.content');
            const toggleLink = description.querySelector('.toggle-link');

            const maxLines = 3;
            const lineHeight = 22;

            // Function to toggle show more/less
            const toggleDescription = () => {
                const isExpanded = description.classList.toggle('expanded');
                const height = isExpanded ? 'auto' : `${maxLines * lineHeight}px`;
                content.style.maxHeight = height;
                toggleLink.textContent = isExpanded ? 'Show Less' : 'Show More';
            };

            // Initial setup
            content.style.maxHeight = `${maxLines * lineHeight}px`;

            // Toggle on link click
            toggleLink.addEventListener('click', function (event) {
                event.preventDefault();
                toggleDescription();
            });
        });
    </script>
@endpush

@endsection