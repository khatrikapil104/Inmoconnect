{{-- @extends('layouts.app')
@section('content')

@section('title')
    {{ trans('messages.properties.View_Property') }} Inmoconnect
@endsection
<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="min-vh-100 b-color-background">
    <div class="crm-main-content"> --}}

{{-- breadcrumb  --}}
<div class="empty-search-header">
    <div class="header-title d-flex align-items-center justify-content-between">
        {{-- property-left --}}
        <div class="header-left-breadcrumb d-flex align-items-center">
            <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36"
                onclick="window.open('{{ route(routeNamePrefix() . 'user.company-details') }}','_self')">My
                Company
            </div>
            <div class="small-breadcrum text-20 lineheight-24 color-primary d-inline-block font-weight-400 letter-s-36 breadcrumb-top ps-4"
                onclick="window.open('','_self')">XML Feed</div>
        </div>
        {{-- property-right --}}
        <div class="header-right-button_one d-flex align-items-center gap-3">
        </div>
    </div>
</div>
{{-- end-breadcrumb --}}

{{-- table --}}
<div class="p-30  box-shadow-one b-color-white border-r-8  propertyTableData">
    <div class="xml_feed px-30 py-20 d-flex align-items-center gap-3">
        <img src="{{ asset('img/e43.png') }}" alt="image" class="">
        <div class="">
            <h5 class="color-primary text-18 font-weight-700">XML feed setup from your website</h5>
            <h6 class="color-b-blue text-16 font-weight-400 pt-2">Make sure you are entering the proper Feed URL
                which was generated from your WordPress website.</h6>
        </div>
    </div>
    <div class="xml_feed mt-3">
        <div class="flex align-items-center gap-1">
            <h6 class="xml_url p-20 color-primary text-16 font-weight-700">
                Import URL : <a href="{{ $url }}" class="font-weight-400">{{ $url }}</a>
            </h6>
            <div class="d-block p-20">
                <h6 class="color-primary text-16 font-weight-700 pb-1">Notes:</h6>
                <ul class="xml_list">
                    <li>Your unique key is <span class="font-weight-700">{type[1]) in (town[1]} - {id[1]} -
                            {ref[1]}</span></li>
                    <li>Propertys previously imported by this import (ID: 1) with the same unique key will be
                        updated.</li>
                    <li>Propertys previously imported by this import (ID: 1) that aren't present for this run of
                        the import will be deleted.</li>
                    <li>Your file will be split into 1000 records chunks before processing.</li>
                </ul>

            </div>

        </div>

    </div>
    <div class="xml_button d-flex justify-content-center">
        <a type="button" 
            class="small-button Gradient_button   border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white mt-30 mb-30 confirm_run_btn"
            data-url="{{ $url }}">
            Confirm & Run Import
        </a>
    </div>
</div>
{{-- end-table --}}

{{-- @endsection --}}
