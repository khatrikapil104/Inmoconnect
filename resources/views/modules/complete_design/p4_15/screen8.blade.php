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

        <div class="p-30  box-shadow-one b-color-white border-r-8  propertyTableData">
            <h5 class="color-primary text-20 font-weight-700 text-center">XML Feed Running</h5>
            <h5 class="color-b-blue text-20 font-weight-400 text-center pt-20">Importing may take some time. Please do
                not close your browser or refresh the page until the process is complete.</h5>
            <div class="task-progress pt-20">
                <div class="d-flex justify-content-end pb-2">
                    <h6 class="text-16 font-weight-700 color-primary ">49 %</h6>
                </div>
                <progress class="progress progress1" max="100" value="0.084602739661932"></progress>
                <div class="d-flex align-items-center justify-content-between pt-3 flex-wrap">
                    <h5 class="text-18 color-b-blue font-weight-400">Time Elapsed: <span
                            class="font-weight-700">00:00:15</span></h5>
                    <h5 class="text-18 color-b-blue font-weight-400  "><span class="opacity-7">Processed: </span><span
                            class="opacity-1 color-primary font-weight-700">21/41</span></h5>
                </div>
            </div>
            <div class="activilog-height pt-30">
                <h4 class="activity_log-collapse text-18 font-weight-700 color-white lineheight-22">Activity Log</h4>
                <div class="activity_log-details activity_log-height">
                    <p><span>[12:50:22]</span> - <span class="text-uppercase">ACTION</span> pmxi_gallery_image</p>
                    <p><span>[12:50:22]</span> - Attachment with ID: 12505" has been successfully updated for image <a
                            href="#" class="font-weight-700">https://inmoconnect.feed</a></p>
                    <p><span>[12:50:22]</span> Importing image <a
                            href="#" class="text-break">'https://members.alphashare.com/photos/full_636194_42720759.jpg'</a> for
                        'Finca in Callosa de Segura</p>
                    <p><span>[12:50:22]</span> - Searching for existing image 'full 836194 42720759.jpg' by Fliename..
                    </p>
                    <p><span>[12:50:22]</span> - Using existing image 'full 836194_42720759.jpg' for post 'Finca in
                        Callosa de Segura..</p>
                    <p><span>[12:50:22]</span> - <span class="text-uppercase">ACTION</span> pmxi_gallery_image</p>
                    <p><span>[12:50:22]</span> - Using existing image 'full 836194_42720759.jpg' for post 'Finca in
                        Callosa de Segura..</p>
                    <p><span>[12:50:22]</span> - <span class="text-uppercase">ACTION</span> pmxi_gallery_image</p>
                    <p><span>[12:50:22]</span> - Attachment with ID: 12505" has been successfully updated for image <a
                            href="#" class="font-weight-700">https://inmoconnect.feed</a></p>
                    <p><span>[12:50:22]</span> Importing image <a
                            href="#" class="text-break">'https://members.alphashare.com/photos/full_636194_42720759.jpg'</a> for
                        'Finca in Callosa de Segura</p>
                </div>
            </div>
        </div>

        @push('scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
            <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>
        @endpush
    @endsection
