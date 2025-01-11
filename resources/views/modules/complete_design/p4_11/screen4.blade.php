@extends('layouts.app')
@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
        <div class="crm-main-content">

            <!-- ////////////////////////////breadcrum///////////////////////////////////// -->
            <div class="empty-search-header">
                <div class="header-title d-flex align-items-center justify-content-between">
                    <div class="header-left-breadcrumb d-flex align-items-center">
                        <div
                            class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36">
                            Property Search
                        </div>
                    </div>
                </div>
            </div>
            <!-- ////////////////////////////////end-breadcream////////////////////////////////////// -->

            

            <div class="d-flex justify-content-between align-items-center pt-4 pb-4">
                <p>Showing 1–10 of 13 results</p>
            </div>

            {{-- card --}}
            <div class="main-card border-r-8 p-20 mb-20 b-color-white">
                <div class="main-card_flex d-block d-sm-flex align-center gap-2 gap-sm-4">

                    {{-- image --}}
                    <div class="main-card-left">
                        <div class="main-card-img">
                            <img src="http://127.0.0.1:8000/img/default-property.jpg" alt="image">
                        </div>
                    </div>
                    <div class="d-flex flex-column w-100">
                        <div class="row">

                            {{-- text --}}
                            <div class="col-lg-9">
                                <div class="gap-12 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                    <div class="d-flex flex-column gap-2">
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <div
                                                class="property-price text-20 font-weight-700 lineheight-24 color-primary">
                                                € 144,850.00</div>
                                            <div class="form-group position-relative">
                                                <button type="button"
                                                    class="Gradient_button add_property_button border-r-8 b-color-Gradient text-12 font-weight-400 color-white ">New
                                                    Property</button>
                                            </div>
                                        </div>
                                        <div class="main-card-bottom">
                                            <div
                                                class="property-title property-h-responsive text-16 font-weight-700 lineheight-20 text-capitalize color-primary">
                                                Awesome Interior Apartment
                                            </div>
                                        </div>

                                        <div class="d-flex gap-2 align-items-start ">
                                            <i class=" icon-location text-20 color-b-blue"></i>
                                            <div
                                                class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                06600 Antibes, France</div>

                                        </div>
                                        <div class="d-flex gap-2 gap-md-3">
                                            <div class="d-flex gap-2 align-items-start">
                                                <i class="icon-my_profile text-20  color-b-blue "></i>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    Agent7</div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class=" icon-house_id  text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    16989-231042123</div>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 gap-md-3">
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class=" icon-house_scale text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    1,140.00 Sqft</div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-bed text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    2</div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-bathroom text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    2</div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-floor text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    2</div>
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
                                        class="text-14 font-weight-400 lineheight-18 border-r-8 b-color-primary color-white-grey viewPropertyBtn"
                                        id="viewPropertyBtn">
                                        View Property
                                    </button>
                                    <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                        <button type="button"
                                            class=" icon-Delete text-20 b-color-transparent color-b-blue"
                                            id="deleteBtn">
                                        </button>
                                        <button type="button"
                                            class=" icon-Delete text-20 b-color-transparent color-b-blue"
                                            id="deleteBtn">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- bottom-text --}}
                        <div class="border_property-card  mt-3 pt-20">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center gap-12">
                                        <img src="{{ asset('img/real-inmo-sidebar.svg') }}" alt="image"
                                            class="">
                                        <h6 class="text-14 font-weight-700 color-b-blue">Realinmo</h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex justify-content-end">
                                    <button type="button"
                                        class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                        data-toggle="modal" data-target="#initiate_collaboration">
                                        <i class=" icon-Export me-2 icon-20"></i>
                                        Initiate Collaboration</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- add-unit --}}
    <div class="modal fade" id="initiate_collaboration" tabindex="-1" role="dialog"
        aria-labelledby="initiate_collaborationLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_three " role="document">
            <div class="modal-content modal-content-file">
                <div class="modal-header border-0 modal-header_file pb-0">
                    <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="initiate_collaborationLabel">Property Collaboration</h5>
                    <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                    </button>
                </div>
                <div class="modal-body modal-header_file">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                            <h6 class="text-14 font-weight-700 color-primary">Agent Details</h6>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details ">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="d-flex gap-12">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" width="40"
                                            height="40" alt="image" class="border-r-4">
                                        <div class="">
                                            <h6 class="text-14 font-weight-700 color-primary">Name:</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">Mona Lott</h6>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-3">
                                    <div class="modal-details-c">
                                        <h6 class="text-14 font-weight-700 color-primary">Mobile Number:</h6>
                                        <h6 class="text-14 font-weight-400 color-b-blue pt-1">+56 123 567 890</h6>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="modal-details-c">
                                        <h6 class="text-14 font-weight-700 color-primary">Email:</h6>
                                        <h6 class="text-14 font-weight-400 color-b-blue pt-1">monalott@gmail.om</h6>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="modal-details-c">
                                        <h6 class="text-14 font-weight-700 color-primary">City</h6>
                                        <h6 class="text-14 font-weight-400 color-b-blue pt-1">Almería</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                            <h6 class="text-14 font-weight-700 color-primary">A Message From Primary Agent</h6>
                        </div>
                        <div class="col-md-12 common-label-css">
                            <div class="form-group crm-textarea-container position-relative mt-3">
                                <textarea
                                    class="crm-textarea form-control form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue"
                                    name="m_primary_agent" id="m_primary_agent" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center mt-30">
                            <h6 class="text-14 font-weight-700 color-primary">Please share your contact Details</h6>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                            <div class="form-group mt-3 position-relative">
                                <label for="name" class="text-14 font-weight-400 lineheight-18  color-b-blue">Full
                                    Name:<span class="required">*</span>
                                </label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="name" id="name" value="" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                            <div class="form-group mt-3 position-relative">
                                <label for="name"
                                    class="text-14 font-weight-400 lineheight-18  color-b-blue">Email:<span
                                        class="required">*</span>
                                </label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="name" id="name" value="" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                            <div class="form-group mt-3 position-relative">
                                <label for="name" class="text-14 font-weight-400 lineheight-18  color-b-blue">Mobile
                                    Number:<span class="required">*</span>
                                </label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="name" id="name" value="" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                            <div class="form-group mt-3 position-relative">
                                <label for="name" class="text-14 font-weight-400 lineheight-18  color-b-blue">City:
                                    <span class="required">*</span>
                                </label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="name" id="name" value="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12 common-label-css">
                            <div class="form-group crm-textarea-container position-relative mt-3">
                                <label for="message"
                                    class="text-14 font-weight-400 lineheight-18 color-b-blue">Message: </label>
                                <textarea
                                    class="crm-textarea form-control form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue"
                                    name="message" id="message" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex gap-3 align-items-center mt-3">
                            <input type="checkbox" id="checkbox_modal" name="button_reset" value="button_reset">
                            <p class="text-14 color-b-blue font-weight-400">I agree with primary agent's message and give
                                my consent to post this property at my portfolio.</p>
                        </div>
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                            <div class="form-group position-relative">
                                <button type="button"
                                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                                    onclick="openMyModal2()">Initiate Collaboration </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal " id="add_to_do_list" data-bs-backdrop="static" style="display: none;background: #00000040;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_eight" role="document">
            <div class="modal-content  border-r-8 border-0 b-color-white p-30">
                <div class="modal-header border-0 justify-content-end p-0">
                    <button type="button" class="close b-color-transparent cursor-pointer" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path id="Union" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 10.0544L2.05438 16L0 13.9456L5.94561 8L6.64978e-06 2.05438L2.05439 0L8 5.94561L13.9456 0L16 2.05438L10.0544 8L16 13.9456L13.9456 16L8 10.0544Z"
                                    fill="black" fill-opacity="0.5"></path>
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="modal-body p-0 text-center mt10">
                    <div class="modal-body-text">
                        <i class="icon-success-icon modalIcons text60" height="60" width="60"
                            style="display:none;"></i>
                        <i class="icon-error-icon modalIcons text60" height="60" width="60"
                            style="display:none;"></i>
                        <i class="icon-warning-icon modalIcons text60" height="60" width="60"
                            style="display:none;"></i>
                        <i class="icon-error-icon1 modalIcons text60" height="60" width="60"
                            style=""></i>
                        <!-- <svg class="svg-confirm svgIcons" style="display:none;" xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M30 60C46.5685 60 60 46.5685 60 30C60 13.4315 46.5685 0 30 0C13.4315 0 0 13.4315 0 30C0 46.5685 13.4315 60 30 60ZM30 55.0769C16.1504 55.0769 4.92308 43.8496 4.92308 30C4.92308 16.1504 16.1504 4.92308 30 4.92308C43.8496 4.92308 55.0769 16.1504 55.0769 30C55.0769 43.8496 43.8496 55.0769 30 55.0769ZM33.2321 25.7705V10.4587H26.9308V25.7705C26.9308 27.3945 27.0123 28.9917 27.1753 30.5622C27.3382 32.1147 27.5465 33.7655 27.8 35.5144H32.363C32.6165 33.7655 32.8247 32.1147 32.9877 30.5622C33.1506 28.9917 33.2321 27.3945 33.2321 25.7705ZM26.1703 43.9466C25.9711 44.4463 25.8716 44.9727 25.8716 45.5259C25.8716 46.097 25.9711 46.6324 26.1703 47.1321C26.3876 47.6139 26.6774 48.0333 27.0395 48.3902C27.4197 48.7471 27.8633 49.0238 28.3703 49.22C28.8774 49.4342 29.4206 49.5413 30 49.5413C30.5613 49.5413 31.0955 49.4342 31.6025 49.22C32.1095 49.0238 32.5441 48.7471 32.9062 48.3902C33.2864 48.0333 33.5852 47.6139 33.8025 47.1321C34.0198 46.6324 34.1284 46.097 34.1284 45.5259C34.1284 44.9727 34.0198 44.4463 33.8025 43.9466C33.5852 43.4469 33.2864 43.0186 32.9062 42.6617C32.5441 42.3048 32.1095 42.0192 31.6025 41.8051C31.0955 41.5909 30.5613 41.4838 30 41.4838C29.4206 41.4838 28.8774 41.5909 28.3703 41.8051C27.8633 42.0192 27.4197 42.3048 27.0395 42.6617C26.6774 43.0186 26.3876 43.4469 26.1703 43.9466Z" fill="#383192"/>
                                </svg> -->

                        <h4
                            class="text-18 lineheight-22 font-weight-700 letter-s-48 color-b-blue opacity-8 pt-30 modal-message">
                            You are sending property inquiry to James Henry.</h4>
                        <div class="modal-confirm" style="">

                            <h4
                                class="text-18 lineheight-22 font-weight-700 letter-s-48 color-primary pt-10 modal-confirm-message">
                                Are you sure?</h4>
                            <p
                                class="text-12 font-weight-400 lineheight-15 opacity-5 color-black pt-20 modal-confirm-secondary-text">
                                Property ID: RT48</p>
                            <div class="d-flex align-items-center justify-content-center gap-3 mt-10">
                                <button type="button"
                                    class="gardient-button small-button border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white">Yes</button>
                                <button type="button"
                                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center">No</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal-subagent --}}
    <div class="modal fade" id="customer_details" tabindex="-1" role="dialog"
        aria-labelledby="customer_detailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_three" role="document">
            <div class="modal-content_one border-r-8 border-0 b-color-white p-30 ">
                <div class="modal-header border-0 p-0">
                    <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="dataFilterModalLabel">Saving Search by Buying</h4>
                    <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                    </button>
                </div>
                <div class="modal-body p-0 text-center mt-30 ">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css">
                            <div class="form-group position-relative text-start">
                                <label for="name" class="text-14 font-weight-400 lineheight-18  color-b-blue">Saving
                                    Name:<span class="required">*</span>
                                </label>
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="modal_tab-faq_one"></div>
                                    <button type="button"
                                        class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 gardient-button updateBtn">
                                        Save Search
                                    </button>
                                </div>
                                <h6 class="text-14 font-weight-700 color-primary pt-30 text-center mb-2">Filters Applied
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 pt-20">
                            <div class="d-flex gap-1 align-items-center">
                                <h6 class="text-14 color-primary font-weight-700 position-relative modal_save">Location:
                                </h6>
                                <h6 class="color-b-blue text-14 font-weight-400">Spain, Barcelona, Madrid</h6>
                            </div>
                        </div>
                        <div class="col-lg-6 pt-20">
                            <div class="d-flex gap-1 align-items-center">
                                <h6 class="text-14 color-primary font-weight-700 position-relative modal_save">Property
                                    Category:</h6>
                                <h6 class="color-b-blue text-14 font-weight-400">For Sale</h6>
                            </div>
                        </div>
                        <div class="col-lg-6 pt-20">
                            <div class="d-flex gap-1 align-items-center">
                                <h6 class="text-14 color-primary font-weight-700 position-relative modal_save">Reference
                                    ID:</h6>
                                <h6 class="color-b-blue text-14 font-weight-400">RT48</h6>
                            </div>
                        </div>
                        <div class="col-lg-6 pt-20">
                            <div class="d-flex gap-1 align-items-center">
                                <h6 class="text-14 color-primary font-weight-700 position-relative modal_save">Price
                                    Range:</h6>
                                <h6 class="color-b-blue text-14 font-weight-400">€200 - €1000</h6>
                            </div>
                        </div>
                        <div class="col-lg-12 pt-20">
                            <div class="d-flex gap-1 align-items-center">
                                <h6 class="text-14 color-primary font-weight-700 position-relative modal_save">Property
                                    Type:</h6>
                                <h6 class="color-b-blue text-14 font-weight-400">Apartment, House, Plot, Commercial,
                                    Duplex</h6>
                            </div>
                        </div>
                        <div class="col-lg-12 pt-20">
                            <div class="d-flex gap-1 align-items-center">
                                <h6 class="text-14 color-primary font-weight-700 position-relative modal_save">Property
                                    Subtype:</h6>
                                <h6 class="color-b-blue text-14 font-weight-400">Ground Floor Apartment, Middle Floor
                                    Apartment</h6>
                            </div>
                        </div>
                        <div class="col-lg-12 pt-20">
                            <div class="d-flex gap-1 align-items-center">
                                <h6 class="text-14 color-primary font-weight-700 position-relative modal_save">Property
                                    Situation:</h6>
                                <h6 class="color-b-blue text-14 font-weight-400">Golf, Island, Beach</h6>
                            </div>
                        </div>
                        <div class="col-lg-6 pt-20">
                            <div class="d-flex gap-1 align-items-center">
                                <h6 class="text-14 color-primary font-weight-700 position-relative modal_save">Bedrooms:
                                </h6>
                                <h6 class="color-b-blue text-14 font-weight-400">+3</h6>
                            </div>
                        </div>
                        <div class="col-lg-6 pt-20">
                            <div class="d-flex gap-1 align-items-center">
                                <h6 class="text-14 color-primary font-weight-700 position-relative modal_save">Bathrooms:
                                </h6>
                                <h6 class="color-b-blue text-14 font-weight-400">+3</h6>
                            </div>
                        </div>
                        <div class="col-lg-12 pt-20">
                            <div class="d-flex gap-1 align-items-center">
                                <h6 class="text-14 color-primary font-weight-700 position-relative modal_save">Property
                                    Status/Completion:</h6>
                                <h6 class="color-b-blue text-14 font-weight-400">Under Construction</h6>
                            </div>
                        </div>
                        <div class="col-lg-12 pt-20">
                            <div class="d-flex gap-1 align-items-center">
                                <h6 class="text-14 color-primary font-weight-700 position-relative modal_save">Completion
                                    Year & Month:</h6>
                                <h6 class="color-b-blue text-14 font-weight-400">03/2025</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

        {{-- tab-link active --}}
        <script>
            const tabLinks = document.querySelectorAll('.tablink_main .tablinks');

            tabLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    tabLinks.forEach(tablink => tablink.classList.remove('active'));

                    this.classList.add('active');

                    const targetId = this.getAttribute('href').substring(1);

                    const targetElement = document.getElementById(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        </script>

        {{-- more-filter-dropdown --}}
        <script>
            var content = document.getElementById("property_filter_main_content");
            var button = document.getElementById("toggleButton");

            function toggleContent() {
                if (content.style.display === "none" || content.style.display === "") {
                    content.style.display = "block";
                    button.classList.add("active");
                } else {
                    closeContent();
                }
            }

            function closeContent() {
                content.style.display = "none";
                button.classList.remove("active");
            }

            document.addEventListener('click', function(event) {
                var isClickInside = content.contains(event.target) || button.contains(event.target);

                if (!isClickInside) {
                    closeContent();
                }
            });

            content.addEventListener('click', function(event) {
                event.stopPropagation();
            });

            button.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        </script>

        {{-- modal-open --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                var modal = document.getElementById("myModal");

                var btn = document.getElementById("openModalBtn");

                var closeBtn = document.getElementById("closemodalbtn");

                btn.onclick = function() {
                    modal.style.display = "block";

                };

                closeBtn.onclick = function() {
                    modal.style.display = "none";
                };

                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";

                    }
                };
            });
        </script>

        <script>
            function openMyModal2() {
                let myModal = new
                bootstrap.Modal(document.getElementById('add_to_do_list'), {});
                myModal.show();
            }
        </script>
    @endpush
@endsection
