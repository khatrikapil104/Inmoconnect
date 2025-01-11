@extends('layouts.app')
@section('content')
@section('title')
    View Company Inmoconnect
@endsection

<style>
    .btn_DnoneOntab.current ~ .d-btn-none-tab {
        display: none;
    }
</style>

<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">

        <!-- //breadcrumb///// -->
        <x-forms.crm-breadcrumb :fieldData="[
           [
                'url' => route(routeNamePrefix() . 'user.view-company'),
                'label' => trans('messages.dashboard.Company_Detail'),
            ],
            [
                'url' => '',
                'label' => trans('View Company'),
            ],
        ]" />

        
        <div class="b-color-white box-shadow-one border-r-8  p-30">
            <!-- /////tabs///////// -->
            <ul class="tabs" style="height: 50px">
                <li class="d-flex align-items-center pb-0 tab-link current text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                    data-tab="tab-1">{{ trans('messages.profile-setup.Company_Information') }} </li>
                <li class="d-flex align-items-center pb-0 tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black btn_DnoneOntab"
                    data-tab="tab-2">{{ trans('messages.profile-setup.Team_Member') }}</li>
                @if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer')
                    <li id="xml_feed_tab"
                        class="d-flex align-items-center pb-0 tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black btn_DnoneOntab"
                        data-tab="tab-3"> XML Feeds
                    </li>
                @endif
                <li class="ms-auto d-btn-none-tab" style="padding-bottom: 10px;">
                    @if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer')
                    <button
                    class="edit_profile_agent border-r-8  d-flex justify-content-center align-items-center px-3"
                    data-bs-toggle="modal" data-bs-target="#dataFilterModal" onclick="window.location.href='{{ route(routeNamePrefix() . 'user.company-details') }}';">
                    <i class="icon-edit icon-20"></i><span class="ms-2 d_none_mob text-14"><strong>Edit
                            Company </strong></span>
                </button>
                @endif
                </li>
            </ul>

            
            {{-- <div id="tab-1" class="tab-content current"> --}}
            <!-- ///////////company-information/////////// -->
            <div id="tab-1" class="tab-content_one current">
                <div class="border-r-12 b-color-white edit_profiile-tab_one">
                    <div class="main-card_profile">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pt-3 d-flex align-items-center">
                                    <div class="personal_information_img">
                                        <img src="{{ !empty($user->company_image) ? getFileUrl($user->company_image,'user_company_details') : asset('img/logoplaceholder.svg') }}"
                                            alt="image" class="border-r-20" width="100" height="101">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Company Name:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{$user->company_name ?? 'N/A'}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Company Email:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $user->company_email ?? 'N/A' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Company Mobile Number:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $user->company_mobile ?? 'N/A' }}</div>
                                </div>
                            </div>
                            @if(auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent')
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Tax Number:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $user->company_tax_number ?? 'N/A' }}</div>
                                </div>
                            </div>
                            @endif
                            @if(auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer')
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        CIF/NIE Number:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $user->cif_nie ?? 'N/A' }}</div>
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Company Website:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $user->company_website ?? 'N/A' }}</div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Primary Service Area:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $user->primary_service_area ?? 'N/A' }}</div>
                                </div>
                            </div>
                            @if(auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer')
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Professional Title/Role:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $user->professional_title ?? 'N/A' }}</div>
                                </div>
                            </div>
                            @endif
                            @if(auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent')
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Number of Current Customer:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $number_of_current_customers[$user->number_of_current_customers]  ?? 'N/A' }}</div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Number of Sub-Agent:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $number_of_sub_agents[$user->company_sub_agent]  ?? 'N/A' }}</div>
                                </div>
                            </div>
                            @endif
                            @if(auth()->user()->role->name == 'developer')
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Number of Sub-Developers:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $number_of_sub_agents[$user->company_sub_agent]  ?? 'N/A' }}</div>
                                </div>
                            </div>
                            @endif
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Property Types Specialized In:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                            @if(!empty($user->typeNames))
                                                {{$user->typeNames}}
                                            @else
                                                N/A
                                            @endif
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Property in Portfolio:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $total_properties_in_portfolio[$companyDetails->companyDetails->total_properties_in_portfolio]  ?? 'N/A' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Year of Experience in Real Estate:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $total_years_experiance[$user->total_years_experiance] ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Average Number of Properties Managed/Listed:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{$avg_number_properties_managed[$user->avg_number_properties_managed]  ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ///////////professional-information////////// -->
            
            <div id="tab-2" class="tab-content_one">
                <form action="" id="tab2Form" type="post" enctype="multipart/form-data">
                    <div class="row pt-2">
                    @if($teamMembersData->isNotEmpty())
                    @foreach($teamMembersData as $member)
                        <div class="col-lg-4 mt-20">
                            <div class="team_member_card">
                                
                                <div class="d-flex gap-3">
                                    <img src="{{ !empty($member->image) ? $member->image : asset('img/default-user.jpg') }}" alt="image" class="border-r-4"
                                        width="42" height="42">
                                    <div class="">
                                        <h6 class="text-14 font-weight-700 color color-primary">{{ $member->name ?? 'N/A' }}</h6>
                                        <h6 class="text-14 mt-2 color-black ">{{ str_replace(" ","-",ucwords(str_replace("-", " ", $member->role->name))) }}</h6>
                                    </div>
                                </div>
                               
                                <div class="mt-20 pt-4 border_team">
                                    <div class="d-flex gap-3 align-items-center">
                                        <i class="icon-Mail icon-18 color-primary"></i>
                                        <a href="#" class="text-14   color-b-blue">{{ $member->email ?? 'N/A' }}</a>
                                    </div>
                                    <div class="d-flex mt-3 justify-content-between">
                                        <div class="d-flex gap-3 align-items-center">
                                            <i class="icon-phone icon-18 color-primary"></i>
                                            <a href="#" class="text-14   color-b-blue">{{ $member->phone ?? 'N/A' }}</a>
                                        </div>
                                        <div class="">
                                            @if($member->id != auth()->user()->id)
                                            <i class="icon-message  icon-20 color-b-blue" onclick="window.open('{{ route(routeNamePrefix() . 'messages.index') }}','_self')"></i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                       
                    </div>
                </form>
            </div>

            <!-- //// xml-feeds //// --->
            <div id="tab-3" class="tab-content_one">
                <div class="xml_button-content ">
                    <div class="d-block d-md-flex  align-items-center gap-3">
                        <div class="xml_img">
                            <img src="{{ asset('img/xml_feed-img.svg') }}" alt="image" class="#">
                        </div>
                        <div class="xml_text">
                            <div class="">
                                <h5 class="color-primary text-16 font-weight-700">Contact Us For Integration</h5>
                                <h6 class="text-14 color-b-blue font-weight-400 lineheight-18 pt-3">Send us your inquiry
                                    and
                                    our technical team will get in touch with you within 24 hours and will take over
                                    from
                                    there to setup the XML feed between your Inmoconnect CRM and Wordpress Website</h6>
                                <button type="button"
                                    class="small-button Gradient_button   border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white mt-20"
                                    onclick="toggleContent(' assisted_setup')">
                                    Assisted Setup
                                </button>
                            </div>
                            <div class="xml_border-top">
                                <h5 class="color-primary text-16 font-weight-700">Setup XML Feed Manually</h5>
                                <h6 class="text-14 color-b-blue font-weight-400 lineheight-18 pt-3">Follow the listed
                                    steps
                                    below to install and setup Wodrpess Plugin and your website and connect it with our
                                    CRM.
                                </h6>
                                <button type="button"
                                    class="small-button Gradient_button   border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white mt-20"
                                    onclick="toggleContent('manual_setup')">
                                    Manual Setup
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                @php
                    $nameParts = explode(' ', auth()->user()->name);
                    $firstname = $nameParts[0];
                    $lastname = isset($nameParts[1]) ? $nameParts[1] : '';
                @endphp
                <div id=" assisted_setup" class="content_setup">
                    <form method="post" id="xmlassistedform">
                        @if ($xmlfeedsassisted->isEmpty())
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'first_name',
                                        'hasLabel' => true,
                                        'label' => 'First Name:',
                                        'id' => 'reference',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'First Name:',
                                        'isRequired' => true,
                                        'value' => $firstname ?? '',
                                    ]" />
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'last_name',
                                        'hasLabel' => true,
                                        'label' => 'last Name:',
                                        'id' => 'reference',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'last Name',
                                        'isRequired' => true,
                                        'value' => $lastname ?? '',
                                    ]" />
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'email',
                                        'hasLabel' => true,
                                        'label' => 'Email:',
                                        'id' => 'reference',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'isRequired' => true,
                                        'value' => auth()->user()->email ?? '',
                                    ]" />
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'phone',
                                        'hasLabel' => true,
                                        'label' => 'Mobile Number:',
                                        'id' => 'reference',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'isRequired' => true,
                                        'value' => auth()->user()->phone ?? '',
                                    ]" />
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'company_name',
                                        'hasLabel' => true,
                                        'label' => 'Company Name:',
                                        'id' => 'reference',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'isRequired' => true,
                                        'value' => $user->company_name ?? '',
                                    ]" />
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'company_website',
                                        'hasLabel' => true,
                                        'label' => 'Company Website:',
                                        'id' => 'reference',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        {{-- 'isRequired' => true, --}}
                                        'value' => $user->company_website ?? '',
                                    ]" />
                                </div>
                                <div class="col-md-12 common-label-css mt-2 ">
                                    <x-forms.crm-textarea :fieldData="[
                                        'name' => 'notes',
                                        'hasLabel' => true,
                                        'label' => 'Message',
                                        'id' => 'notes',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        //'isRequired' => true,
                                        'value' => $property->notes ?? '',
                                    ]" />
                                </div>
                                <div class="col-md-12 mt-30 d-flex justify-content-end">
                                    <button type="button"
                                        class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  small-button gardient-button request_setup">
                                        Request Setup
                                    </button>
                                </div>
                            </div>
                        @else
                            <h4>Your Request has been Submitted Successfully. Our Team will get back to you soon</h4>
                        @endif
                    </form>
                </div>
                <div id="manual_setup" class="content_setup">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="setup_steps">
                                <h4 class="text-18 color-black font-weight-700 lineheight-22 pt-30">Step 1 : Download
                                    and Setup XML Feed Plugin on your WordPress website.</h4>
                                <p class="text-14 font-weight-400 lineheight-18 color-b-blue pt-20"><span
                                        class="font-weight-700">A</span> - Click On The Download Button Below Which
                                    Will
                                    <br /> Provide You With WordPress Plugin And User Guide.
                                </p>
                                <p class="text-14 font-weight-400 lineheight-18 color-b-blue pt-20"><span
                                        class="font-weight-700">B</span> - Extract The Downloaded User Guide And
                                    Perform
                                    <br /> Steps For Setting Up The WordPress Plugin.
                                </p>
                                <p class="text-14 font-weight-400 lineheight-18 color-b-blue pt-20"><span
                                        class="font-weight-700">C</span> - Use Your Account XML Feed URL Which Is To Be
                                    <br />Used During The WordPress Plugin Setup.
                                </p>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="form-group mt-3 position-relative">
                                        <input type="text" id="url-input"
                                            class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 pac-target-input form_step-copy"
                                            value="{{env('APP_URL')}}/api/xml-feed" readonly>
                                    </div>
                                    <button type="button"
                                        class="small-button Gradient_button border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white mt-20"
                                        onclick="copyEnteredUrl()">
                                        Copy
                                    </button>
                                </div>
                            </div>


                            {{-- <button type="button" 
                                        class="small-button Gradient_button   border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white mt-20" >
                                        Download
                                    </button> --}}
                            <button type="button"
                                class="small-button Gradient_button border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white mt-20"
                                onclick="openPDF()">
                                Download
                            </button>
                            <h4 class="text-18 color-black font-weight-700 lineheight-22 pt-30">Step 2 : Setup XML
                                Feed URL at your CRM Backend.</h4>
                            <h4 class="text-18 color-black font-weight-700 lineheight-22 pt-30">Directory :</h4>
                            <div class=" d-flex gap-3 align-items-center mt-3">
                                <input type="checkbox" id="checkbox_modal" name="button_reset" value="button_reset">
                                <p class="text-14 color-b-blue font-weight-400 run_feed_pra opacity-25">I confirm
                                    that WP plugin is setup
                                    at
                                    my wordpress website and i have got the XML Feed URL from the setup wizard of
                                    the plugin.</p>
                            </div>
                            <div class="d-flex align-items-start gap-2 run_feed opacity-25">
                                <form method="POST" id="run_feed_form">
                                    @csrf
                                    <div class="form-group mt-3 position-relative">
                                        <input type="text" name="run_feed"
                                            class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 pac-target-input form_step-copy run_feed_copy">
                                        <div class="invalid-feedback fw-bold"></div>
                                    </div>
                                </form>
                                <button type="button"
                                    class="small-button Gradient_button border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white mt-20 run_feed_btn ">
                                    Run Feed
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@push('scripts')
    <script>
        var feedsyncedurl = "{{ route(routeNamePrefix() . 'feed-synced-index') }}";
        var importProgress = "{{ route(routeNamePrefix() . 'importProgress') }}";
        var TestxmlUploads = "{{ route(routeNamePrefix() . 'test-xml-uploads') }}";
        // var xmlUploads = "{{ route(routeNamePrefix() . 'xml-uploads') }}";
        var xmlrunfeedroute = "{{ route(routeNamePrefix() . 'xmlFeedsRun') }}";
        var assistedSetup = "{{ route(routeNamePrefix() . 'XmlFeedsAssisted') }}";
        var updateCompanyDetail = "{{ route(routeNamePrefix() . 'user.company-details') }}";
        var routeUrlTab2 = "{{ route(routeNamePrefix() . 'user.profileTab2') }}";
        var addCertificateUrl = "{{ route(routeNamePrefix() . 'user.uploadCertificates') }}";
        var removeCertificateUrl = "{{ route(routeNamePrefix() . 'user.removeCertificate', ':id') }}";
        var addGovCertificateUrl = "{{ route(routeNamePrefix() . 'user.uploadGovtCertificates') }}";
        var downloadGovCertificateUrl = "{{ route(routeNamePrefix() . 'user.downloadGovCertificate', ':id') }}";
    </script>
    <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>
    <script>
        function toggleContent(contentId) {

            var contents = document.querySelectorAll('.content_setup');
            contents.forEach(function(content) {
                console.log(content.id === contentId);

                if (content.id === contentId) {
                    content.style.display = content.style.display === 'block' ? 'none' : 'block';
                } else {
                    content.style.display = 'none';
                }
            });
        }
    </script>
    {{-- for coping url in uploads function  --}}
    <script>
        function copyEnteredUrl() {
            // Get the input field
            var input = document.getElementById("url-input");

            if (input.value.trim() === "") {
                // show_message("Please enter a URL to copy.");
                return;
            }

            input.select();
            input.setSelectionRange(0, 99999);

            navigator.clipboard.writeText(input.value)
                .then(() => {
                    toastr.success('Your URL has been Copied successfully!');
                })
                .catch(err => {
                    console.error('Failed to copy text: ', err);
                });
        }
    </script>
    {{-- to download pdf in new tab  --}}
    <script>
        function openPDF() {
            window.open('/assets/pdf/inmoconnect_xml_feeds.pdf', '_blank');
        }
    </script>

    {{-- <script src="{{ asset('assets/js/modules/profile-setup/agent-setup.js') }}"></script> --}}
@endpush
@endsection
