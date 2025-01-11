@extends('layouts.app')
@section('content')
    @push('styles')

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />

        @section('title')
            {{ trans('messages.sidebar.Property_Search') }} Inmoconnect
        @endsection

        <div class="overlay" id="overlay"></div>
        <div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                <!-- ////////////////////////////breadcrum///////////////////////////////////// -->
                <div class="empty-search-header"
                    style='position: fixed;z-index:99;background-color:#f6f6ff;width: calc(100% - 324px);'>
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div
                                class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36">
                                Property Listing
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ///////////////////////////end-breadcrum////////////////////////////////////// -->

                {{--  --}}
                <div class="" style="overflow: hidden">
                    <div class="your-class">
                        <div>
                            <button class="tablinks" onclick="scrollToContent('Tab1')">Property Information</button>
                        </div>
                        <div>
                            <button class="tablinks" onclick="scrollToContent('Tab2')">Property Pricing</button>
                        </div>
                        <div>
                            <button class="tablinks" onclick="scrollToContent('Tab3')">Property Location</button>
                        </div>
                        <div>
                            <button class="tablinks" onclick="scrollToContent('Tab4')">Property Dimension</button>
                        </div>
                        <div>
                            <button class="tablinks" onclick="scrollToContent('Tab5')">Property Document Information</button>
                        </div>
                        <div>
                            <button class="tablinks" onclick="scrollToContent('Tab6')">Professional Information</button>
                        </div>
                        <div>
                            <button class="tablinks" onclick="scrollToContent('Tab7')">Property Media</button>
                        </div>
                        <div>
                            <button class="tablinks" onclick="scrollToContent('Tab8')">Property Tour</button>
                        </div>
                        <div>
                            <button class="tablinks" onclick="scrollToContent('Tab9')">Property Features</button>
                        </div>
                        <div>
                            <button class="tablinks" onclick="scrollToContent('Tab10')">Contact Information</button>
                        </div>

                    </div>
                </div>

                <div id="Tab1" class="tabcontent">
                    <h3>Tab 1</h3>
                    <p>Content for Tab 1.</p>
                </div>

                <div id="Tab2" class="tabcontent">
                    <div class="card-description py-25 mb-30 b-color-white border-r-8  px-15">
                        <div class="card-main-description">
                            <div class="card-text-header text-18 font-weight-700 lineheight-22 color-primary " id="">
                                Facilities:</div>

                            <div class="row">
                                <div
                                    class="col-12 col-sm-2 col-md-3 common-label-css mt-2 d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                                    <button class="d-flex align-items-center gap-2 b-color-transparent" data-toggle="modal"
                                        data-target="#setting">
                                        <span class=" icon-gym text-20 color-b-blue"></span>
                                        <span
                                            class="feature-name-view text-14 font-weight-400 color-b-blue lineheight-18">Setting</span>
                                    </button>
                                </div>
                                <div
                                    class="col-12 col-sm-2 col-md-3 common-label-css mt-2 d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                                    <button class="d-flex align-items-center gap-2 b-color-transparent" data-toggle="modal"
                                        data-target="#orientation">
                                        <span class=" icon-gym text-24 color-b-blue"></span>
                                        <span
                                            class="feature-name-view text-12 font-weight-400 color-b-blue line-height-15">orientation</span>
                                    </button>
                                </div>
                                <div
                                    class="col-12 col-sm-2 col-md-3 common-label-css mt-2 d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                                    <label for="feature2" class="d-flex align-items-center gap-2" data-toggle="modal"
                                        data-target="#condition">
                                        <span class=" icon-gym text-24 color-b-blue"></span>
                                        <span
                                            class="feature-name-view text-12 font-weight-400 color-b-blue line-height-15">condition</span>
                                    </label>
                                </div>
                                <div
                                    class="col-12 col-sm-2 col-md-3 common-label-css mt-2 d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                                    <label for="feature2" class="d-flex align-items-center gap-2" data-toggle="modal"
                                        data-target="#pool">
                                        <span class=" icon-gym text-24 color-b-blue"></span>
                                        <span
                                            class="feature-name-view text-12 font-weight-400 color-b-blue line-height-15">Pool</span>
                                    </label>
                                </div>
                                <div
                                    class="col-12 col-sm-2 col-md-3 common-label-css mt-2 d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                                    <label for="feature2" class="d-flex align-items-center gap-2" data-toggle="modal"
                                        data-target="#climate_control">
                                        <span class=" icon-gym text-24 color-b-blue"></span>
                                        <span
                                            class="feature-name-view text-12 font-weight-400 color-b-blue line-height-15">climate
                                            control</span>
                                    </label>
                                </div>
                                <div
                                    class="col-12 col-sm-2 col-md-3 common-label-css mt-2 d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                                    <label for="feature2" class="d-flex align-items-center gap-2" data-toggle="modal"
                                        data-target="#views">
                                        <span class=" icon-gym text-24 color-b-blue"></span>
                                        <span
                                            class="feature-name-view text-12 font-weight-400 color-b-blue line-height-15">Views</span>
                                    </label>
                                </div>
                                <div
                                    class="col-12 col-sm-2 col-md-3 common-label-css mt-2 d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                                    <label for="feature2" class="d-flex align-items-center gap-2" data-toggle="modal"
                                        data-target="#Feature">
                                        <span class=" icon-gym text-24 color-b-blue"></span>
                                        <span
                                            class="feature-name-view text-12 font-weight-400 color-b-blue line-height-15">features</span>
                                    </label>
                                </div>
                                <div
                                    class="col-12 col-sm-2 col-md-3 common-label-css mt-2 d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                                    <label for="feature2" class="d-flex align-items-center gap-2" data-toggle="modal"
                                        data-target="#Furniture">
                                        <span class=" icon-gym text-24 color-b-blue"></span>
                                        <span
                                            class="feature-name-view text-12 font-weight-400 color-b-blue line-height-15">Furniture</span>
                                    </label>
                                </div>
                                <div
                                    class="col-12 col-sm-2 col-md-3 common-label-css mt-2 d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                                    <label for="feature2" class="d-flex align-items-center gap-2" data-toggle="modal"
                                        data-target="#Kitchen">
                                        <span class=" icon-gym text-24 color-b-blue"></span>
                                        <span
                                            class="feature-name-view text-12 font-weight-400 color-b-blue line-height-15">Kitchen</span>
                                    </label>
                                </div>
                                <div
                                    class="col-12 col-sm-2 col-md-3 common-label-css mt-2 d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                                    <label for="feature2" class="d-flex align-items-center gap-2" data-toggle="modal"
                                        data-target="#Garden">
                                        <span class=" icon-gym text-24 color-b-blue"></span>
                                        <span
                                            class="feature-name-view text-12 font-weight-400 color-b-blue line-height-15">Garden</span>
                                    </label>
                                </div>
                                <div
                                    class="col-12 col-sm-2 col-md-3 common-label-css mt-2 d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                                    <label for="feature2" class="d-flex align-items-center gap-2" data-toggle="modal"
                                        data-target="#Security">
                                        <span class=" icon-gym text-24 color-b-blue"></span>
                                        <span
                                            class="feature-name-view text-12 font-weight-400 color-b-blue line-height-15">security</span>
                                    </label>
                                </div>
                                <div
                                    class="col-12 col-sm-2 col-md-3 common-label-css mt-2 d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                                    <label for="feature2" class="d-flex align-items-center gap-2" data-toggle="modal"
                                        data-target="#parking">
                                        <span class=" icon-gym text-24 color-b-blue"></span>
                                        <span
                                            class="feature-name-view text-12 font-weight-400 color-b-blue line-height-15">Parking</span>
                                    </label>
                                </div>
                                <div
                                    class="col-12 col-sm-2 col-md-3 common-label-css mt-2 d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                                    <label for="feature2" class="d-flex align-items-center gap-2" data-toggle="modal"
                                        data-target="#Utilities">
                                        <span class=" icon-gym text-24 color-b-blue"></span>
                                        <span
                                            class="feature-name-view text-12 font-weight-400 color-b-blue line-height-15">Utilities</span>
                                    </label>
                                </div>
                                <div
                                    class="col-12 col-sm-2 col-md-3 common-label-css mt-2 d-flex align-items-center gap-2 gap-md-5 flex-wrap">
                                    <label for="feature2" class="d-flex align-items-center gap-2" data-toggle="modal"
                                        data-target="#Category">
                                        <span class=" icon-gym text-24 color-b-blue"></span>
                                        <span
                                            class="feature-name-view text-12 font-weight-400 color-b-blue line-height-15">Category</span>
                                    </label>
                                </div>
                            </div>
                            {{-- <p>Content for Tab 2.</p> --}}
                        </div>
                    </div>
                </div>
                <div id="Tab3" class="tabcontent">
                    <h3>Tab 3</h3>
                    <p>Content for Tab 3.</p>
                </div>

                <div id="Tab4" class="tabcontent">
                    <h3>Tab 4</h3>
                    <p>Content for Tab 4.</p>
                </div>

                <div id="Tab5" class="tabcontent">
                    <h3>Tab 5</h3>
                    <p>Content for Tab 5.</p>
                </div>

                <div id="Tab6" class="tabcontent">
                    <h3>Tab 6</h3>
                    <p>Content for Tab 6.</p>
                </div>

                <div id="Tab7" class="tabcontent">
                    <h3>Tab 7</h3>
                    <p>Content for Tab 7.</p>
                </div>

                <div id="Tab8" class="tabcontent">
                    <h3>Tab 8</h3>
                    <p>Content for Tab 8.</p>
                </div>

                <div id="Tab9" class="tabcontent">
                    <h3>Tab 9</h3>
                    <p>Content for Tab 9.</p>
                </div>

                <div id="Tab10" class="tabcontent">
                    <h3>Tab 10</h3>
                    <p>Content for Tab 10.</p>
                </div>



                {{-- setting --}}
                <div class="modal fade checkbox_modal" id="setting" tabindex="-1" role="dialog"
                    aria-labelledby="setting" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="SelectSettingsLabel">Select Settings</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="beachfront" name="beachfront" value="beachfront">
                                            <label class="text-14 color-b-blue" for="beachfront">
                                                Beachfront</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="frontline_golf" name="frontline_golf"
                                                value="frontline_golf">
                                            <label class="text-14 color-b-blue" for="frontline_golf">
                                                Frontline
                                                Golf</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="town" name="town" value="town">
                                            <label class="text-14 color-b-blue" for="town">
                                                Town</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="suburban" name="suburban" value="suburban">
                                            <label class="text-14 color-b-blue" for="suburban">
                                                Suburban</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="country" name="country" value="country">
                                            <label class="text-14 color-b-blue" for="country">
                                                Country</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="commercial_area" name="commercial_area"
                                                value="commercial_area">
                                            <label class="text-14 color-b-blue" for="commercial_area">
                                                Commercial
                                                Area</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="beachside" name="beachside" value="beachside">
                                            <label class="text-14 color-b-blue" for="beachside">
                                                Beachside</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="close_to_schools" name="close_to_schools"
                                                value="close_to_schools">
                                            <label class="text-14 color-b-blue" for="close_to_schools">
                                                Close To
                                                Schools</label>
                                        </div>

                                    </div>


                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="village" name="village" value="village">
                                            <label class="text-14 color-b-blue" for="village">
                                                Village</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="mountain_pueblo" name="mountain_pueblo"
                                                value="mountain_pueblo">
                                            <label class="text-14 color-b-blue" for="mountain_pueblo">
                                                Mountain
                                                Pueblo</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="close_to_golf" name="close_to_golf"
                                                value="close_to_golf">
                                            <label class="text-14 color-b-blue" for="close_to_golf">
                                                Close To
                                                Golf</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="close_to_port" name="close_to_port"
                                                value="close_to_port">
                                            <label class="text-14 color-b-blue" for="close_to_port">
                                                Close To
                                                Port</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="close_to_shops" name="close_to_shops"
                                                value="close_to_shops">
                                            <label class="text-14 color-b-blue" for="close_to_shops">
                                                Close To
                                                Shops</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="close_to_sea" name="close_to_sea"
                                                value="close_to_sea">
                                            <label class="text-14 color-b-blue" for="close_to_sea">
                                                Close To
                                                Sea</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="close_to_town" name="close_to_town"
                                                value="close_to_town">
                                            <label class="text-14 color-b-blue" for="close_to_town">
                                                Close To
                                                Town</label>
                                        </div>


                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="close_to_skiing" name="close_to_skiing"
                                                value="close_to_skiing">
                                            <label class="text-14 color-b-blue" for="close_to_skiing">
                                                Close To
                                                Skiing</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="close_to_forest" name="close_to_forest"
                                                value="close_to_forest">
                                            <label class="text-14 color-b-blue" for="close_to_forest">
                                                Close To
                                                Forest</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="marina" name="marina" value="marina">
                                            <label class="text-14 color-b-blue" for="marina">
                                                Marina</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="close_to_marina" name="close_to_marina"
                                                value="close_to_marina">
                                            <label class="text-14 color-b-blue" for="close_to_marina">
                                                Close To
                                                Marina</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="urbanization" name="urbanization"
                                                value="urbanization">
                                            <label class="text-14 color-b-blue" for="urbanization">
                                                Urbanization</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="front_line_beach_complex"
                                                name="front_line_beach_complex" value="front_line_beach_complex">
                                            <label class="text-14 color-b-blue" for="front_line_beach_complex">
                                                Front Line Beach
                                                Complex</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="port" name="Port" value="Port">
                                            <label class="text-14 color-b-blue" for="Port">
                                                Port</label>
                                        </div>


                                    </div>
                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteCustomerBtn ">
                                        Add Setting
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- orientation --}}
                <div class="modal fade checkbox_modal" id="orientation" tabindex="-1" role="dialog"
                    aria-labelledby="orientation" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="SelectOrientationLabel">Select Orientation</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="north" name="north" value="north">
                                            <label class="text-14 color-b-blue" for="north">
                                                North</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="south_east" name="south_east" value="south_east">
                                            <label class="text-14 color-b-blue" for="south_east">
                                                South
                                                East</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="west" name="west" value="west">
                                            <label class="text-14 color-b-blue" for="west">
                                                West</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="north_east" name="north_east" value="north_east">
                                            <label class="text-14 color-b-blue" for="north_east">
                                                North
                                                East</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="south" name="south" value="south">
                                            <label class="text-14 color-b-blue" for="south">
                                                South</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="north_west" name="north_west" value="north_west">
                                            <label class="text-14 color-b-blue" for="north_west">
                                                North
                                                West</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="east" name="east" value="east">
                                            <label class="text-14 color-b-blue" for="east">
                                                East</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="south_west" name="south_west" value="south_west">
                                            <label class="text-14 color-b-blue" for="south_west">
                                                South
                                                West</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteCustomerBtn ">
                                        Add Orientation
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Condition --}}
                <div class="modal fade checkbox_modal" id="condition" tabindex="-1" role="dialog"
                    aria-labelledby="condition" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="SelectConditionLabel">Select Condition</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="excellent" name="excellent" value="excellent">
                                            <label class="text-14 color-b-blue" for="excellent">
                                                Excellent</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="renovation_required" name="renovation_required"
                                                value="renovation_required">
                                            <label class="text-14 color-b-blue" for="renovation_required">
                                                Renovation
                                                Required</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="restoration_required" name="restoration_required"
                                                value="restoration_required">
                                            <label class="text-14 color-b-blue" for="restoration_required">
                                                Restoration
                                                Required</label>
                                        </div>


                                    </div>


                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="good" name="good" value="good">
                                            <label class="text-14 color-b-blue" for="good">
                                                Good</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="recently_renovated" name="recently_renovated"
                                                value="recently_renovated">
                                            <label class="text-14 color-b-blue" for="recently_renovated">
                                                Recently
                                                Renovated</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="new_construction" name="new_construction"
                                                value="new_construction">
                                            <label class="text-14 color-b-blue" for="new_construction">
                                                New
                                                Construction</label>
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="fair" name="fair" value="fair">
                                            <label class="text-14 color-b-blue" for="fair">
                                                Fair</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="recently_refurbished" name="recently_refurbished"
                                                value="recently_refurbished">
                                            <label class="text-14 color-b-blue" for="recently_refurbished">
                                                Recently
                                                Refurbished</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteCustomerBtn ">
                                        Add Condition
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Select Pool --}}
                <div class="modal fade checkbox_modal" id="pool" tabindex="-1" role="dialog" aria-labelledby="pool"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="SelectPoolLabel">Select Pool</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="communal" name="communal" value="communal">
                                            <label class="text-14 color-b-blue" for="communal">
                                                Communal</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="heated" name="heated" value="heated">
                                            <label class="text-14 color-b-blue" for="heated">
                                                Heated</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="private" name="private" value="private">
                                            <label class="text-14 color-b-blue" for="private">
                                                Private</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="room_for_pool" name="room_for_pool"
                                                value="room_for_pool">
                                            <label class="text-14 color-b-blue" for="room_for_pool">
                                                Room For
                                                Pool</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="indoor" name="indoor" value="indoor">
                                            <label class="text-14 color-b-blue" for="indoor">
                                                Indoor</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="children_pool" name="children_pool"
                                                value="children_pool">
                                            <label class="text-14 color-b-blue" for="children_pool">
                                                Children`s
                                                Pool</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteCustomerBtn ">
                                        Add Pool
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Select Climate Control --}}
                <div class="modal fade checkbox_modal" id="climate_control" tabindex="-1" role="dialog"
                    aria-labelledby="climate_control" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="SelectClimateControlLabel">Select Climate Control</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="air_conditioning" name="air_conditioning"
                                                value="air_conditioning">
                                            <label class="text-14 color-b-blue" for="air_conditioning">
                                                Air
                                                Conditioning</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="cold_ac" name="cold_ac" value="cold_ac">
                                            <label class="text-14 color-b-blue" for="cold_ac">
                                                Cold A/C</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="uf_heating" name="uf_heating" value="uf_heating">
                                            <label class="text-14 color-b-blue" for="uf_heating">
                                                U/F
                                                Heating</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="pre_installed_ac" name="pre_installed_ac"
                                                value="pre_installed_ac">
                                            <label class="text-14 color-b-blue" for="pre_installed_ac">
                                                Pre Installed
                                                A/C</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="central_heating" name="central_heating"
                                                value="central_heating">
                                            <label class="text-14 color-b-blue" for="central_heating">
                                                Central
                                                Heating</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="ufh_bathrooms" name="ufh_bathrooms"
                                                value="ufh_bathrooms">
                                            <label class="text-14 color-b-blue" for="ufh_bathrooms">
                                                U/F/H
                                                Bathrooms</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="hot_ac" name="hot_ac" value="hot_ac">
                                            <label class="text-14 color-b-blue" for="hot_ac">
                                                Hot A/C</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="fireplace" name="fireplace" value="fireplace">
                                            <label class="text-14 color-b-blue" for="fireplace">
                                                Fireplace</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteCustomerBtn ">
                                        Add Climate Control
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- views --}}
                <div class="modal fade checkbox_modal" id="views" tabindex="-1" role="dialog" aria-labelledby="views"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="SelectViewsLabel">Select Views</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="sea" name="sea" value="sea">
                                            <label class="text-14 color-b-blue" for="sea">
                                                Sea</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="beach" name="beach" value="beach">
                                            <label class="text-14 color-b-blue" for="beach">
                                                Beach</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="panoramic" name="panoramic" value="panoramic">
                                            <label class="text-14 color-b-blue" for="panoramic">
                                                Panoramic</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="courtyard" name="courtyard" value="courtyard">
                                            <label class="text-14 color-b-blue" for="courtyard">
                                                Courtyard</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="ski" name="ski" value="ski">
                                            <label class="text-14 color-b-blue" for="ski">
                                                Ski</label>
                                        </div>

                                    </div>


                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="mountain" name="mountain" value="mountain">
                                            <label class="text-14 color-b-blue" for="mountain">
                                                Mountain</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="port" name="port" value="port">
                                            <label class="text-14 color-b-blue" for="port">
                                                Port</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="garden" name="garden" value="garden">
                                            <label class="text-14 color-b-blue" for="garden">
                                                Garden</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="lake" name="lake" value="lake">
                                            <label class="text-14 color-b-blue" for="lake">
                                                Lake</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="forest" name="forest" value="forest">
                                            <label class="text-14 color-b-blue" for="forest">
                                                Forest</label>
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="golf" name="golf" value="golf">
                                            <label class="text-14 color-b-blue" for="golf">
                                                Golf</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="country" name="country" value="country">
                                            <label class="text-14 color-b-blue" for="country">
                                                Country</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="pool" name="pool" value="pool">
                                            <label class="text-14 color-b-blue" for="pool">
                                                Pool</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="urban" name="urban" value="urban">
                                            <label class="text-14 color-b-blue" for="urban">
                                                Urban</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="street" name="street" value="street">
                                            <label class="text-14 color-b-blue" for="street">
                                                Street</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteCustomerBtn ">
                                        Add views
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Feature --}}
                <div class="modal fade checkbox_modal" id="Feature" tabindex="-1" role="dialog"
                    aria-labelledby="Feature" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="SelectFeatureLabel">Select Feature</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="covered_terrace" name="covered_terrace"
                                                value="covered_terrace">
                                            <label class="text-14 color-b-blue" for="covered_terrace">
                                                Covered
                                                Terrace</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="near_transport" name="near_transport"
                                                value="near_transport">
                                            <label class="text-14 color-b-blue" for="near_transport">
                                                Near
                                                Transport</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="satellite_tv" name="satellite_tv"
                                                value="satellite_tv">
                                            <label class="text-14 color-b-blue" for="satellite_tv">
                                                Satellite
                                                TV</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="sauna" name="sauna" value="sauna">
                                            <label class="text-14 color-b-blue" for="sauna">
                                                Sauna</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="tennis_court" name="tennis_court"
                                                value="tennis_court">
                                            <label class="text-14 color-b-blue" for="tennis_court">
                                                Tennis
                                                Court</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="storage_room" name="storage_room"
                                                value="storage_room">
                                            <label class="text-14 color-b-blue" for="storage_room">
                                                Storage
                                                Room</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="wood_flooring" name="wood_flooring"
                                                value="wood_flooring">
                                            <label class="text-14 color-b-blue" for="wood_flooring">
                                                Wood
                                                Flooring</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="bar" name="bar" value="bar">
                                            <label class="text-14 color-b-blue" for="bar">
                                                Bar</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="domotics" name="domotics" value="domotics">
                                            <label class="text-14 color-b-blue" for="domotics">
                                                Domotics</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="car_hire_facility" name="car_hire_facility"
                                                value="car_hire_facility">
                                            <label class="text-14 color-b-blue" for="car_hire_facility">
                                                Car Hire
                                                Facility</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="near_mosque" name="near_mosque" value="near_mosque">
                                            <label class="text-14 color-b-blue" for="near_mosque">
                                                Near
                                                Mosque</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="near_church" name="near_church" value="near_church">
                                            <label class="text-14 color-b-blue" for="near_church">
                                                Near
                                                Church</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="lift" name="lift" value="lift">
                                            <label class="text-14 color-b-blue" for="lift">
                                                Lift</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="private_terrace" name="private_terrace"
                                                value="private_terrace">
                                            <label class="text-14 color-b-blue" for="private_terrace">
                                                Private
                                                Terrace</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="wifi" name="wifi" value="wifi">
                                            <label class="text-14 color-b-blue" for="wifi">
                                                WiFi</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="games_room" name="games_room" value="games_room">
                                            <label class="text-14 color-b-blue" for="games_room">
                                                Games
                                                Room</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="guest_apartment" name="guest_apartment"
                                                value="guest_apartment">
                                            <label class="text-14 color-b-blue" for="guest_apartment">
                                                Guest
                                                Apartment</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="utility_room" name="utility_room"
                                                value="utility_room">
                                            <label class="text-14 color-b-blue" for="utility_room">
                                                Utility
                                                Room</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="marble_flooring" name="marble_flooring"
                                                value="marble_flooring">
                                            <label class="text-14 color-b-blue" for="marble_flooring">
                                                Marble
                                                Flooring</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="barbeque" name="barbeque" value="barbeque">
                                            <label class="text-14 color-b-blue" for="barbeque">
                                                Barbeque</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="hour_reception" name="hour_reception"
                                                value="hour_reception">
                                            <label class="text-14 color-b-blue" for="hour_reception">
                                                24 Hour
                                                Reception</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="courtesy_bus" name="courtesy_bus"
                                                value="courtesy_bus">
                                            <label class="text-14 color-b-blue" for="courtesy_bus">
                                                Courtesy
                                                Bus</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="staff_accommodation" name="staff_accommodation"
                                                value="staff_accommodation">
                                            <label class="text-14 color-b-blue" for="staff_accommodation">
                                                Staff
                                                Accommodation</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="basement" name="basement" value="basement">
                                            <label class="text-14 color-b-blue" for="basement">
                                                Basement</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="fitted_wardrobes" name="fitted_wardrobes"
                                                value="fitted_wardrobes">
                                            <label class="text-14 color-b-blue" for="fitted_wardrobes">
                                                Fitted
                                                Wardrobes</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="solarium" name="solarium" value="solarium">
                                            <label class="text-14 color-b-blue" for="solarium">
                                                Solarium</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="gym" name="gym" value="gym">
                                            <label class="text-14 color-b-blue" for="gym">
                                                Gym</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="paddle_tennis" name="paddle_tennis"
                                                value="paddle_tennis">
                                            <label class="text-14 color-b-blue" for="paddle_tennis">
                                                Paddle
                                                Tennis</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="guest_house" name="guest_house"
                                                value="guest_house">
                                            <label class="text-14 color-b-blue" for="guest_house">
                                                Guest
                                                House</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="ensuite_bathroom" name="ensuite_bathroom"
                                                value="ensuite_bathroom">
                                            <label class="text-14 color-b-blue" for="ensuite_bathroom">
                                                Ensuite
                                                Bathroom</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="jacuzzi" name="jacuzzi" value="jacuzzi">
                                            <label class="text-14 color-b-blue" for="jacuzzi">
                                                Jacuzzi</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="double_glazing" name="double_glazing"
                                                value="double_glazing">
                                            <label class="text-14 color-b-blue" for="double_glazing">
                                                Double
                                                Glazing</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="restaurant_on_site" name="restaurant_on_site"
                                                value="restaurant_on_site">
                                            <label class="text-14 color-b-blue" for="restaurant_on_site">
                                                Restaurant On
                                                Site</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="day_care" name="day_care" value="day_care">
                                            <label class="text-14 color-b-blue" for="day_care">
                                                Day Care</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="stables" name="stables" value="stables">
                                            <label class="text-14 color-b-blue" for="stables">
                                                Stables</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="fiber_optic" name="fiber_optic"
                                                value="fiber_optic">
                                            <label class="text-14 color-b-blue" for="fiber_optic">
                                                Fiber
                                                Optic</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="fitted_wardrobes" name="fitted_wardrobes"
                                                value="fitted_wardrobes">
                                            <label class="text-14 color-b-blue" for="fitted_wardrobes">
                                                Access for
                                                people with
                                                reduced
                                                mobility</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteCustomerBtn ">
                                        Add Features
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Furniture --}}
                <div class="modal fade checkbox_modal" id="Furniture" tabindex="-1" role="dialog"
                    aria-labelledby="Furniture" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="SelectFurnitureLabel">Select Furniture</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="fully_furnished" name="fully_furnished"
                                                value="fully_furnished">
                                            <label class="text-14 color-b-blue" for="fully_furnished">
                                                Fully
                                                Furnished</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="optional" name="optional" value="optional">
                                            <label class="text-14 color-b-blue" for="optional">
                                                Optional</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="part_furnished" name="part_furnished"
                                                value="part_furnished">
                                            <label class="text-14 color-b-blue" for="part_furnished">
                                                Part
                                                Furnished</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="not_furnished" name="not_furnished"
                                                value="not_furnished">
                                            <label class="text-14 color-b-blue" for="not_furnished">
                                                Not
                                                Furnished</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteCustomerBtn ">
                                        Add Furniture
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kitchen --}}
                <div class="modal fade checkbox_modal" id="Kitchen" tabindex="-1" role="dialog"
                    aria-labelledby="Kitchen" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="SelectKitchenLabel">Select Kitchen</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="fully_fitted" name="fully_fitted"
                                                value="fully_fitted">
                                            <label class="text-14 color-b-blue" for="fully_fitted">
                                                Fully
                                                Fitted</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="kitchen_lounge" name="kitchen_lounge"
                                                value="kitchen_lounge">
                                            <label class="text-14 color-b-blue" for="kitchen_lounge">
                                                Kitchen-Lounge</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="partially_fitted" name="partially_fitted"
                                                value="partially_fitted">
                                            <label class="text-14 color-b-blue" for="partially_fitted">
                                                Partially
                                                Fitted</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="not_fitted" name="not_fitted" value="not_fitted">
                                            <label class="text-14 color-b-blue" for="not_fitted">
                                                Not
                                                Fitted</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteCustomerBtn ">
                                        Add Kitchen
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Garden --}}
                <div class="modal fade checkbox_modal" id="Garden" tabindex="-1" role="dialog"
                    aria-labelledby="Garden" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="SelectGardenLabel">Select Garden</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="garden" name="garden" value="garden">
                                            <label class="text-14 color-b-blue" for="garden">
                                                Garden</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="easy_maintenance" name="easy_maintenance"
                                                value="easy_maintenance">
                                            <label class="text-14 color-b-blue" for="easy_maintenance">
                                                Easy
                                                Maintenance</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="private" name="private" value="private">
                                            <label class="text-14 color-b-blue" for="private">
                                                Private</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="landscaped" name="landscaped" value="landscaped">
                                            <label class="text-14 color-b-blue" for="landscaped">
                                                Landscaped</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteCustomerBtn ">
                                        Add Garden
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Security --}}
                <div class="modal fade checkbox_modal" id="Security" tabindex="-1" role="dialog"
                    aria-labelledby="Security" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="SelectParkingLabel">Select Parking</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="gated_complex" name="gated_complex"
                                                value="gated_complex">
                                            <label class="text-14 color-b-blue" for="gated_complex">
                                                Gated
                                                Complex</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="alarm_system" name="alarm_system"
                                                value="alarm_system">
                                            <label class="text-14 color-b-blue" for="alarm_system">
                                                Alarm
                                                System</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="electric_blinds" name="electric_blinds"
                                                value="electric_blinds">
                                            <label class="text-14 color-b-blue" for="electric_blinds">
                                                Electric
                                                Blinds</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="hour_security" name="hour_security"
                                                value="hour_security">
                                            <label class="text-14 color-b-blue" for="hour_security">
                                                24 Hour
                                                Security</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="entry_phone" name="entry_phone"
                                                value="entry_phone">
                                            <label class="text-14 color-b-blue" for="entry_phone">
                                                Entry
                                                Phone</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="safe" name="safe" value="safe">
                                            <label class="text-14 color-b-blue" for="safe">
                                                Safe</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteCustomerBtn ">
                                        Add Security
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Parking --}}
                <div class="modal fade checkbox_modal" id="parking" tabindex="-1" role="dialog"
                    aria-labelledby="parking" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="SelectParkingLabel">Select Parking</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="underground" name="underground"
                                                value="underground">
                                            <label class="text-14 color-b-blue" for="underground">
                                                Underground</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="open" name="open" value="open">
                                            <label class="text-14 color-b-blue" for="open">
                                                Open</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="communal" name="communal" value="communal">
                                            <label class="text-14 color-b-blue" for="communal">
                                                Communal</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="garage" name="garage" value="garage">
                                            <label class="text-14 color-b-blue" for="garage">
                                                Garage</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="street" name="street" value="street">
                                            <label class="text-14 color-b-blue" for="street">
                                                Street</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="private" name="private" value="private">
                                            <label class="text-14 color-b-blue" for="private">
                                                Private</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="covered" name="covered" value="covered">
                                            <label class="text-14 color-b-blue" for="covered">
                                                Covered</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="more_than_one" name="more_than_one"
                                                value="more_than_one">
                                            <label class="text-14 color-b-blue" for="more_than_one">
                                                More Than
                                                One</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="ev_charge_point" name="ev_charge_point"
                                                value="ev_charge_point">
                                            <label class="text-14 color-b-blue" for="ev_charge_point">
                                                EV charge
                                                point</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteCustomerBtn ">
                                        Add parking
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Utilities --}}
                <div class="modal fade checkbox_modal" id="Utilities" tabindex="-1" role="dialog"
                    aria-labelledby="Utilities" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="SelectUtilitiesLabel">Select Utilities</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="electricity" name="electricity"
                                                value="electricity">
                                            <label class="text-14 color-b-blue" for="electricity">
                                                Electricity</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="gas" name="gas" value="gas">
                                            <label class="text-14 color-b-blue" for="gas">
                                                Gas</label>
                                        </div>

                                    </div>

                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="drinkable_water" name="drinkable_water"
                                                value="drinkable_water">
                                            <label class="text-14 color-b-blue" for="drinkable_water">
                                                Drinkable
                                                Water</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="photovoltaic_solar_panels"
                                                name="photovoltaic_solar_panels" value="photovoltaic_solar_panels">
                                            <label class="text-14 color-b-blue" for="photovoltaic_solar_panels">
                                                Photovoltaic
                                                solar
                                                panels</label>
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="telephone" name="telephone" value="telephone">
                                            <label class="text-14 color-b-blue" for="telephone">
                                                Telephone</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="solar_water_heating" name="solar_water_heating"
                                                value="solar_water_heating">
                                            <label class="text-14 color-b-blue" for="solar_water_heating">
                                                Solar water
                                                heating</label>
                                        </div>


                                    </div>
                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteCustomerBtn ">
                                        Add Utilities
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Category --}}
                <div class="modal fade checkbox_modal" id="Category" tabindex="-1" role="dialog"
                    aria-labelledby="Category" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="SelectCategoryLabel">Select Category</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="bargain" name="bargain" value="bargain">
                                            <label class="text-14 color-b-blue" for="bargain">
                                                Bargain</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="distressed" name="distressed" value="distressed">
                                            <label class="text-14 color-b-blue" for="distressed">
                                                Distressed</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="investment" name="investment" value="investment">
                                            <label class="text-14 color-b-blue" for="investment">
                                                Investment</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="reduced" name="reduced" value="reduced">
                                            <label class="text-14 color-b-blue" for="reduced">
                                                Reduced</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="with_planning_permission"
                                                name="with_planning_permission" value="with_planning_permission">
                                            <label class="text-14 color-b-blue" for="with_planning_permission">
                                                With Planning
                                                Permission</label>
                                        </div>

                                    </div>

                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="beachfront" name="beachfront" value="beachfront">
                                            <label class="text-14 color-b-blue" for="beachfront">
                                                Beachfront</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="golf" name="golf" value="golf">
                                            <label class="text-14 color-b-blue" for="golf">
                                                Golf</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="luxury" name="luxury" value="luxury">
                                            <label class="text-14 color-b-blue" for="luxury">
                                                Luxury</label>
                                        </div>

                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="repossession" name="repossession"
                                                value="repossession">
                                            <label class="text-14 color-b-blue" for="repossession">
                                                Repossession</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="contemporary" name="contemporary"
                                                value="contemporary">
                                            <label class="text-14 color-b-blue" for="contemporary">
                                                Contemporary</label>
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <input type="checkbox" id="cheap" name="cheap" value="cheap">
                                            <label class="text-14 color-b-blue" for="cheap">
                                                Cheap</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="holiday_homes" name="holiday_homes"
                                                value="holiday_homes">
                                            <label class="text-14 color-b-blue" for="holiday_homes">
                                                Holiday
                                                Homes</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="off_plan" name="off_plan" value="off_plan">
                                            <label class="text-14 color-b-blue" for="off_plan">
                                                Off Plan</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="resale" name="resale" value="resale">
                                            <label class="text-14 color-b-blue" for="resale">
                                                Resale</label>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" id="new_development" name="new_development"
                                                value="new_development">
                                            <label class="text-14 color-b-blue" for="new_development">
                                                New
                                                Development</label>
                                        </div>


                                    </div>
                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteCustomerBtn ">
                                        Add Category
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-30">
                    <button type="button"
                        class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 small-button gardient-button searchFilterBtn"
                        data-toggle="modal" data-target="#add_unit" id="searchFilterBtn">
                        Save as Draft
                    </button>
                </div>

                {{-- add-unit --}}
                <div class="modal fade" id="add_unit" tabindex="-1" role="dialog" aria-labelledby="add_unitLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_three" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="add_unitLabel">Uploaded Properties</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal_developer-padding">
                                <p class="text-14 font-weight-400 lineheight-18 color-black text-center">Number of copies:
                                    <span class="font-weight-700 color-primary ">06</span>
                                </p>
                                <div class="upload_property-table mt-20">
                                    <table id=""
                                        class="display dashboard_table dashboard_edit_one table-bottom-border"
                                        style="width:100%; ">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="checkbox" class="checkbox  fileCheckbox"
                                                        data-id="23"></th>
                                                <th>Refrance Number</th>
                                                <th>Property Type</th>
                                                <th>Property Size</th>
                                                <th>Price</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tableData">
                                            <tr>
                                                <td><input type="checkbox" name="checkbox"
                                                        class="checkbox checkboxone  fileCheckbox" data-id="23"></td>
                                                <td>A-001</td>
                                                <td>
                                                    <div class="common-label-css table_upload_property">
                                                        <x-forms.crm-single-select :fieldData="[
                                                            'name' => 'situation_id_one',
                                                            'id' => 'situation_id_one',
                                                        {{-- 'options' => $situations, --}}
                                                            'attributes' => [],
                                                            'hasHelpText' => false,
                                                            'placeholder' => trans(
                                                                'messages.properties.Property_Situation',
                                                            ),
                                                            'isRequired' => true,
                                                            'selected' => $property->situation_id ?? '',
                                                        ]" />
                                                    </div>
                                                </td>
                                                <td class="position-relative">
                                                    <div class="from-group position-relative">
                                                        <input type="text" class="modal_table_input">
                                                    </div>
                                                    <div class="input-group-append input_modal_meter">
                                                        <span class="input-group-text unit-label">m²</span>
                                                    </div>
                                                </td>
                                                <td class="table_prize position-relative">
                                                        <div class="from-group position-relative">
                                                            <input type="text" class="modal_table_input modal_table_input_one">
                                                        </div>
                                                        <div class="input-group-append input_modal_meter input_modal_meter_one">
                                                            <span class="input-group-text unit-label">€</span>
                                                        </div>
                                                </td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-edit icon-20 color-b-blue "></i></button></td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-Delete icon-20 color-b-blue "></i></button></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="checkbox"
                                                        class="checkbox checkboxone  fileCheckbox" data-id="23"></td>
                                                <td><input type="text" class="modal_table_input"></td>
                                                <td> <div class="common-label-css table_upload_property">
                                                    <x-forms.crm-single-select :fieldData="[
                                                        'name' => 'situation_id_one',
                                                        'id' => 'situation_id_one',
                                                    {{-- 'options' => $situations, --}}
                                                        'attributes' => [],
                                                        'hasHelpText' => false,
                                                        'placeholder' => trans(
                                                            'messages.properties.Property_Situation',
                                                        ),
                                                        'isRequired' => true,
                                                        'selected' => $property->situation_id ?? '',
                                                    ]" />
                                                </div></td>
                                                <td class="position-relative">
                                                    <div class="from-group position-relative">
                                                        <input type="text" class="modal_table_input">
                                                    </div>
                                                    <div class="input-group-append input_modal_meter">
                                                        <span class="input-group-text unit-label">m²</span>
                                                    </div>
                                                </td>
                                                <td class="table_prize position-relative">
                                                    <div class="from-group position-relative">
                                                        <input type="text" class="modal_table_input modal_table_input_one">
                                                    </div>
                                                    <div class="input-group-append input_modal_meter input_modal_meter_one">
                                                        <span class="input-group-text unit-label">€</span>
                                                    </div>
                                                </td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-edit icon-20 color-b-blue "></i></button></td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-Delete icon-20 color-b-blue "></i></button></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="checkbox"
                                                        class="checkbox checkboxone  fileCheckbox" data-id="23"></td>
                                                <td><input type="text" class="modal_table_input"></td>
                                                <td> <div class="common-label-css table_upload_property">
                                                    <x-forms.crm-single-select :fieldData="[
                                                        'name' => 'situation_id_one',
                                                        'id' => 'situation_id_one',
                                                    {{-- 'options' => $situations, --}}
                                                        'attributes' => [],
                                                        'hasHelpText' => false,
                                                        'placeholder' => trans(
                                                            'messages.properties.Property_Situation',
                                                        ),
                                                        'isRequired' => true,
                                                        'selected' => $property->situation_id ?? '',
                                                    ]" />
                                                </div></td>
                                                <td class="position-relative">
                                                    <div class="from-group position-relative">
                                                        <input type="text" class="modal_table_input">
                                                    </div>
                                                    <div class="input-group-append input_modal_meter">
                                                        <span class="input-group-text unit-label">m²</span>
                                                    </div>
                                                </td>
                                                <td class="table_prize position-relative">
                                                    <div class="from-group position-relative">
                                                        <input type="text" class="modal_table_input modal_table_input_one">
                                                    </div>
                                                    <div class="input-group-append input_modal_meter input_modal_meter_one">
                                                        <span class="input-group-text unit-label">€</span>
                                                    </div>
                                                </td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-edit icon-20 color-b-blue "></i></button></td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-Delete icon-20 color-b-blue "></i></button></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="checkbox"
                                                        class="checkbox checkboxone  fileCheckbox" data-id="23"></td>
                                                <td><input type="text" class="modal_table_input"></td>
                                                <td> <div class="common-label-css table_upload_property">
                                                    <x-forms.crm-single-select :fieldData="[
                                                        'name' => 'situation_id_one',
                                                        'id' => 'situation_id_one',
                                                    {{-- 'options' => $situations, --}}
                                                        'attributes' => [],
                                                        'hasHelpText' => false,
                                                        'placeholder' => trans(
                                                            'messages.properties.Property_Situation',
                                                        ),
                                                        'isRequired' => true,
                                                        'selected' => $property->situation_id ?? '',
                                                    ]" />
                                                </div></td>
                                                <td class="position-relative">
                                                    <div class="from-group position-relative">
                                                        <input type="text" class="modal_table_input">
                                                    </div>
                                                    <div class="input-group-append input_modal_meter">
                                                        <span class="input-group-text unit-label">m²</span>
                                                    </div>
                                                </td>
                                                <td class="table_prize position-relative">
                                                    <div class="from-group position-relative">
                                                        <input type="text" class="modal_table_input modal_table_input_one">
                                                    </div>
                                                    <div class="input-group-append input_modal_meter input_modal_meter_one">
                                                        <span class="input-group-text unit-label">€</span>
                                                    </div>
                                                </td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-edit icon-20 color-b-blue "></i></button></td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-Delete icon-20 color-b-blue "></i></button></td>
                                            </tr>
                                            {{-- <tr>
                                                <td><input type="checkbox" name="checkbox"
                                                        class="checkbox checkboxone  fileCheckbox" data-id="23"></td>
                                                <td><span style="border:1px solid red"></span></td>
                                                <td>Apartment</td>
                                                <td>300 m<sup>2</sup></td>
                                                <td class="table_prize">€1000</td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-eye icon-20 color-b-blue "></i></button></td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-eye icon-20 color-b-blue "></i></button></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="checkbox"
                                                        class="checkbox checkboxone  fileCheckbox" data-id="23"></td>
                                                <td><span style="border:1px solid red"></span></td>
                                                <td>Apartment</td>
                                                <td>300 m<sup>2</sup></td>
                                                <td class="table_prize">€1000</td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-eye icon-20 color-b-blue "></i></button></td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-eye icon-20 color-b-blue "></i></button></td>
                                            </tr> --}}
                                            <tr>
                                                <td><input type="checkbox" name="checkbox"
                                                        class="checkbox checkboxone  fileCheckbox" data-id="23"></td>
                                                <td><input type="text" class="modal_table_input"></td>
                                                <td> <div class="common-label-css table_upload_property">
                                                    <x-forms.crm-single-select :fieldData="[
                                                        'name' => 'situation_id_one',
                                                        'id' => 'situation_id_one',
                                                    {{-- 'options' => $situations, --}}
                                                        'attributes' => [],
                                                        'hasHelpText' => false,
                                                        'placeholder' => trans(
                                                            'messages.properties.Property_Situation',
                                                        ),
                                                        'isRequired' => true,
                                                        'selected' => $property->situation_id ?? '',
                                                    ]" />
                                                </div></td>
                                                <td class="position-relative">
                                                    <div class="from-group position-relative">
                                                        <input type="text" class="modal_table_input">
                                                    </div>
                                                    <div class="input-group-append input_modal_meter">
                                                        <span class="input-group-text unit-label">m²</span>
                                                    </div>
                                                </td>
                                                <td class="table_prize position-relative">
                                                    <div class="from-group position-relative">
                                                        <input type="text" class="modal_table_input modal_table_input_one">
                                                    </div>
                                                    <div class="input-group-append input_modal_meter input_modal_meter_one">
                                                        <span class="input-group-text unit-label">€</span>
                                                    </div>
                                                </td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-edit icon-20 color-b-blue "></i></button></td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-Delete icon-20 color-b-blue "></i></button></td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" name="checkbox"
                                                        class="checkbox checkboxone  fileCheckbox" data-id="23"></td>
                                                <td><input type="text" class="modal_table_input"></td>
                                                <td> <div class="common-label-css table_upload_property">
                                                    <x-forms.crm-single-select :fieldData="[
                                                        'name' => 'situation_id_one',
                                                        'id' => 'situation_id_one',
                                                    {{-- 'options' => $situations, --}}
                                                        'attributes' => [],
                                                        'hasHelpText' => false,
                                                        'placeholder' => trans(
                                                            'messages.properties.Property_Situation',
                                                        ),
                                                        'isRequired' => true,
                                                        'selected' => $property->situation_id ?? '',
                                                    ]" />
                                                </div></td>
                                                <td class="position-relative">
                                                    <div class="from-group position-relative">
                                                        <input type="text" class="modal_table_input">
                                                    </div>
                                                    <div class="input-group-append input_modal_meter">
                                                        <span class="input-group-text unit-label">m²</span>
                                                    </div>
                                                </td>
                                                <td class="table_prize position-relative">
                                                    <div class="from-group position-relative">
                                                        <input type="text" class="modal_table_input modal_table_input_one">
                                                    </div>
                                                    <div class="input-group-append input_modal_meter input_modal_meter_one">
                                                        <span class="input-group-text unit-label">€</span>
                                                    </div>
                                                </td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-edit icon-20 color-b-blue "></i></button></td>
                                                <td><button class="b-color-transparent removeCustomerInviteBtn"
                                                        data-id="4" data-name="Gabriel John" data-toggle="modal"
                                                        data-target="#customer_details"> <i
                                                            class="icon-Delete icon-20 color-b-blue "></i></button></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                                <div class="d-flex align-items-center mt-30 justify-content-between">
                                    <p class="text-14 font-weight-400 lineheight-18 red_text d-flex"><span class="me-2"><i
                                                class="icon-eye icon-20 red_text "></i></span> provide unique Reference
                                        Numbers of the units.</p>
                                    <div class=" d-flex justify-content-start align-items-center">
                                        <div class="form-group position-relative gap-12 d-flex align-items-center">
                                            <button type="button"
                                                class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                                data-toggle="modal" data-target="#add_unit">
                                                Save as Draft</button>
                                            <button type="button"
                                                class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  small-button gardient-button searchFilterBtn"
                                                id="searchFilterBtn">
                                                Publish
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @push('scripts')

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('.your-class').slick({
                                dots: false,
                                infinite: true,
                                speed: 300,
                                slidesToShow: 5,

                            });
                        });
                    </script>

                    <script>
                        function scrollToContent(tabId) {
                            document.getElementById(tabId).scrollIntoView({
                                behavior: 'smooth'
                            });
                        }
                    </script>

                @endpush
            @endsection
