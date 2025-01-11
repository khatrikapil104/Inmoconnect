@extends('layouts.app')
@section('content')

@section('title')
    {{ trans('messages.properties.View_Property') }} Inmoconnect
@endsection

<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="min-vh-100 b-color-background">
    <div class="crm-main-content">

        {{-- breadcrumb  --}}
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                {{-- property-left --}}
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36"
                        onclick="window.open('http://127.0.0.1:8000/agent/properties','_self')">Property Listing</div>
                    <div class="small-breadcrum text-20 lineheight-24 color-primary d-inline-block font-weight-400 letter-s-36 breadcrumb-top ps-4"
                        onclick="window.open('','_self')">View Property</div>
                </div>
                {{-- property-right --}}
                <div class="header-right-button_one d-flex align-items-center gap-3">

                </div>
            </div>
        </div>
        {{-- end-breadcrumb --}}

        <div class="p-30 pb-0 box-shadow-one b-color-white border-r-8  propertyTableData">
            <h5 class="color-primary text-20 font-weight-700 text-center">Feed Synced Successfully.</h5>
            <p class="text-14 color-primary lineheight-18 font-weight-400 text-center pt-2">Last Synced at 15:30,
                27/12/2024</p>
            <div class="xml_feed mt-3">
                <div class="flex align-items-center gap-1">
                    <div class="d-block p-20">
                        <ul class="xml_list">
                            <li class="pt-0">All <span class="font-weight-700">41</span> records from <a
                                    href="#" class="font-weight-700">https://inmoconnect.feed</a> were
                                successfully processed.</li>
                            <li>Inmoconnect All Import updated <span class="font-weight-700">41</span> records, and
                                deleted <span class="font-weight-700">1</span> records.</li>
                        </ul>

                    </div>

                </div>

            </div>

            <p class="toggle_xml mt-30">
                <button
                    class="b-color-transparent color-primary text-14 font-weight-700 lineheight-18 d-inline-flex align-items-center"
                    type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                    aria-controls="collapseExample">
                    <span class="me-2"><i class="icon-dashboard text-20 color-b-blue"></i></span> View Log
                </button>
            </p>
            <div class="collapse " id="collapseExample">
                <h4 class="activity_log-collapse text-18 font-weight-700 color-white lineheight-22">Activity Log</h4>
                <div class="activity_log-details">
                    <p><span>[12:50:22]</span> - <span class="text-uppercase">ACTION</span> pmxi_gallery_image</p>
                    <p><span>[12:50:22]</span> - Attachment with ID: 12505" has been successfully updated for image <a
                            href="#" class="font-weight-700">https://inmoconnect.feed</a></p>
                    <p><span>[12:50:22]</span> Importing image <a href="#"
                            class="text-break">'https://members.alphashare.com/photos/full_636194_42720759.jpg'</a> for
                        'Finca in Callosa de Segura</p>
                    <p><span>[12:50:22]</span> - Searching for existing image 'full 836194 42720759.jpg' by Fliename..
                    </p>
                    <p><span>[12:50:22]</span> - Using existing image 'full 836194_42720759.jpg' for post 'Finca in
                        Callosa de Segura..</p>
                    <p><span>[12:50:22]</span> - <span class="text-uppercase">ACTION</span> pmxi_gallery_image</p>
                    <p><span>[12:50:22]</span> - Using existing image 'full 836194_42720759.jpg' for post 'Finca in
                        Callosa de Segura..</p>
                </div>
            </div>
        </div>

        @push('scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
            <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>
        @endpush
    @endsection
