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


        <div class="b-color-white box-shadow-one border-r-8  p-30">
            <!-- /////tabs///////// -->
            <ul class="tabs">
                <li class="tab-link current text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                    data-tab="tab-1">Company Information</li>
                <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                    data-tab="tab-2">Team Member</li>
                <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                    data-tab="tab-3">XML Feed</li>
            </ul>

            {{-- Company Information --}}
            <div id="tab-1" class="tab-content_one current">
                abv
            </div>

            {{-- Company Customers --}}
            <div id="tab-2" class="tab-content_one">
                ede
            </div>

            {{-- Company Customers --}}
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
                <div id=" assisted_setup" class="content_setup">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="setup_steps">
                                <h4 class="text-18 color-black font-weight-700 lineheight-22 pt-30">Step 1 : Download
                                    and Setup XML Feed Plugin on your WordPress website.</h4>
                                <p class="text-14 font-weight-400 lineheight-18 color-b-blue pt-20"><span
                                        class="font-weight-700">A</span> - Lorem Ipsum is simply dummy text of the
                                    printing <br /> and typesetting industry.</p>
                                <p class="text-14 font-weight-400 lineheight-18 color-b-blue pt-20"><span
                                        class="font-weight-700">B</span> - Lorem Ipsum has been the industry's standard
                                    <br /> dummy text ever since the 1500s,
                                </p>
                                <p class="text-14 font-weight-400 lineheight-18 color-b-blue pt-20"><span
                                        class="font-weight-700">C</span> - Your following Inmoconnect account XML Feed
                                    URL <br /> which is to be used during the website setup:</p>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="form-group mt-3 position-relative">
                                        <input type="text"
                                            class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 pac-target-input form_step-copy">
                                    </div>
                                    <button type="button"
                                        class="small-button Gradient_button   border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white mt-20">
                                        Copy
                                    </button>
                                </div>

                                <button type="button"
                                    class="small-button Gradient_button   border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white mt-20">
                                    download
                                </button>
                                <h4 class="text-18 color-black font-weight-700 lineheight-22 pt-30">Step 2 : Setup XML
                                    Feed URL at your CRM Backend.</h4>
                                <h4 class="text-18 color-black font-weight-700 lineheight-22 pt-30">Directory :</h4>
                                <div class=" d-flex gap-3 align-items-center mt-3">
                                    <input type="checkbox" id="checkbox_modal" name="button_reset" value="button_reset">
                                    <p class="text-14 color-b-blue font-weight-400">I confirm that WP plugin is setup at
                                        my wordpress website and i have got the XML Feed URL from the setup wizard of
                                        the plugin.</p>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="form-group mt-3 position-relative">
                                        <input type="text"
                                            class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 pac-target-input form_step-copy">
                                    </div>
                                    <button type="button"
                                        class="small-button Gradient_button   border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white mt-20">
                                        Run Feed
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="manual_setup" class="content_setup">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'reference',
                                'hasLabel' => true,
                                'label' => 'First Name:',
                                'id' => 'reference',
                                'attributes' => [],
                                'hasHelpText' => false,
                                //'help' => 'First Name:',
                                'isRequired' => true,
                                'value' => $property->reference ?? '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'reference',
                                'hasLabel' => true,
                                'label' => 'last Name:',
                                'id' => 'reference',
                                'attributes' => [],
                                'hasHelpText' => false,
                                //'help' => 'last Name',
                                'isRequired' => true,
                                'value' => $property->reference ?? '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'reference',
                                'hasLabel' => true,
                                'label' => 'Email:',
                                'id' => 'reference',
                                'attributes' => [],
                                'hasHelpText' => false,
                                //'help' => 'Please enter your name',
                                'isRequired' => true,
                                'value' => $property->reference ?? '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'reference',
                                'hasLabel' => true,
                                'label' => 'Mobile Number:',
                                'id' => 'reference',
                                'attributes' => [],
                                'hasHelpText' => false,
                                //'help' => 'Please enter your name',
                                'isRequired' => true,
                                'value' => $property->reference ?? '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'reference',
                                'hasLabel' => true,
                                'label' => 'Company Name:',
                                'id' => 'reference',
                                'attributes' => [],
                                'hasHelpText' => false,
                                //'help' => 'Please enter your name',
                                'isRequired' => true,
                                'value' => $property->reference ?? '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'reference',
                                'hasLabel' => true,
                                'label' => 'Company Website:',
                                'id' => 'reference',
                                'attributes' => [],
                                'hasHelpText' => false,
                                //'help' => 'Please enter your name',
                                'isRequired' => true,
                                'value' => $property->reference ?? '',
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
                                class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  small-button gardient-button ">
                                Request Setup
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>
    <script>
        function toggleContent(contentId) {
            var contents = document.querySelectorAll('.content_setup');
            contents.forEach(function(content) {
                if (content.id === contentId) {
                    content.style.display = content.style.display === 'block' ? 'none' : 'block';
                } else {
                    content.style.display = 'none';
                }
            });
        }
    </script>
@endpush
@endsection
