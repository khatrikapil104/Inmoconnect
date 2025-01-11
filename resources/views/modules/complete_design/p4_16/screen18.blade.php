@extends('layouts.app')
@section('content')
    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.css" />
    @push('styles')

        @section('title')
            {{ trans('messages.sidebar.Property_Search') }} Inmoconnect
        @endsection

        <div class="overlay" id="overlay"></div>
        <div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                {{-- breadcrumb --}}
                <div class="empty-search-header">
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700">
                                Development
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-breadcrumb --}}

                {{-- prize --}}
                <div class="row mb-30">
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <!-- property-name -->
                        <div class="property-header-details d-flex align-items-center justify-content-between">
                            <div class="property-details property-name">
                                <h3 class="text-18 font-weight-700 lineheight-22 color-b-blue letter-s-48">Awesome Interior
                                    Apartment
                                </h3>
                            </div>
                        </div>

                        <div class="property-detail-share d-flex justify-content-between align-items-center pt-12">
                            <div class="property-details d-grid d-sm-flex flex-column gap-12 main-card-two-small">
                                <!-- address -->
                                <div
                                    class="property-address main-card-two-small-one d-flex align-items-start gap-1 position-relative">

                                    <i class="icon-location text-14 d-flex align-items-center gap-1"></i>
                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18">TechAlmas LLP, Old High
                                        Court Road, near Loha Bhavan, Shreyas Colony, Navrangpura, Ahmedabad, Gujarat, India
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="pt-12">
                            <p class="text-14 font-weight-400 lineheight-18 color-black">By <span class="color-primary">Harmony
                                    Real Estate</span></p>
                        </div>
                    </div>

                    <div
                        class="gap-3 col-sm-4 col-md-4 col-lg-4 d-flex flex-column justify-content-between align-items-start align-items-sm-end mt-4 pt-4 mt-sm-0 pt-sm-0">
                        <!-- property-price -->
                        <div class="property-details">
                            <p class="text-32 font-weight-700 line-height-40 etter-s-64 color-b-blue position-relative">
                                <span class="propert-price-blurs">€100,000 - €350,000</span>
                            </p>
                        </div>

                        <!-- buttons -->
                        <div class="row">
                            <div class="col-md-12 d-flex gap-2 gap-md-3">
                                <button type="button" class=" icon-share text-24 b-color-transparent color-primary"
                                    id="editBtn">
                                </button>
                                <button type="button" class=" icon-edit text-24 b-color-transparent color-primary"
                                    id="editBtn">
                                </button>
                                <button type="button" class=" icon-Delete text-24 b-color-transparent color-primary"
                                    id="editBtn">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-prize --}}

                {{-- images --}}
                <div class="row">
                    <div class="col-lg-8">
                        <div class="slider-for fancybox_slider">
                            <div><a data-fancybox="gallery" href="{{ asset('img/home_fancy_img.svg') }}"><img
                                        src="{{ asset('img/home_fancy_img.svg') }}" alt="Image 1"></a>
                            </div>
                            <div><a data-fancybox="gallery" href="{{ asset('img/home_fancy_img.svg') }}"><img
                                        src="{{ asset('img/home_fancy_img.svg') }}" alt="Image 2"></a>
                            </div>
                            <div><a data-fancybox="gallery" href="{{ asset('img/home_fancy_img.svg') }}"><img
                                        src="{{ asset('img/home_fancy_img.svg') }}" alt="Image 3"></a>
                            </div>
                            <div><a data-fancybox="gallery" href="{{ asset('img/home_fancy_img.svg') }}"><img
                                        src="{{ asset('img/home_fancy_img.svg') }}" alt="Image 4"></a>
                            </div>
                        </div>

                        <!-- Navigation Slider -->
                        <div class="slider-nav mt-2 pt-1 slider_nav_bottom">
                            <div><img src="{{ asset('img/home_fancy_img.svg') }}" alt="Image 1 Thumbnail"></div>
                            <div><img src="{{ asset('img/home_fancy_img.svg') }}" alt="Image 2 Thumbnail"></div>
                            <div><img src="{{ asset('img/home_fancy_img.svg') }}" alt="Image 3 Thumbnail"></div>
                            <div><img src="{{ asset('img/home_fancy_img.svg') }}" alt="Image 4 Thumbnail"></div>
                            <div><img src="{{ asset('img/home_fancy_img.svg') }}" alt="Image 3 Thumbnail"></div>
                            <div><img src="{{ asset('img/home_fancy_img.svg') }}" alt="Image 4 Thumbnail"></div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="dashboard-card_one box-shadow-one b-color-white border-r-8  p-20">
                            <div class="card-text-header text-18 font-weight-700 lineheight-22 color-primary " id="">
                                Overview:
                            </div>
                            <div class="mt-3 d-flex align-items-center pt-2">
                                <div
                                    class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                    <i class=" icon-icon_home text-24 color-b-blue"></i>
                                </div>
                                <div class="card-text-right ps-0 ps-md-2">
                                    <div class="text-14 font-weight-700 line-height-18 color-b-blue">Number of Units</div>
                                    <div class="text-14 font-weight-400 line-height-18 color-b-blue">120</div>
                                </div>
                            </div>
                            <div class="mt-3 d-flex align-items-center pt-2">
                                <div
                                    class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                    <i class="icon-unit_sold text-24 color-b-blue"></i>
                                </div>
                                <div class="card-text-right ps-0 ps-md-2">
                                    <div class="text-14 font-weight-700 line-height-18 color-b-blue">Unit Sold</div>
                                    <div class="text-14 font-weight-400 line-height-18 color-b-blue">20</div>
                                </div>
                            </div>
                            <div class="mt-3 d-flex align-items-center pt-2">
                                <div
                                    class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                    <i class=" icon-house_id text-24 color-b-blue"></i>
                                </div>
                                <div class="card-text-right ps-0 ps-md-2">
                                    <div class="text-14 font-weight-700 line-height-18 color-b-blue">Building License:</div>
                                    <div class="text-14 font-weight-400 line-height-18 color-b-blue">marcroldán12345679</div>
                                </div>
                            </div>
                            <div class="mt-3 d-flex align-items-center pt-2">
                                <div
                                    class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                    <i class=" icon-terms_of_payment text-24 color-b-blue"></i>
                                </div>
                                <div class="card-text-right ps-0 ps-md-2">
                                    <div class="text-14 font-weight-700 line-height-18 color-b-blue">Terms of payment:</div>
                                    <div class="text-14 font-weight-400 line-height-18 color-b-blue">Default Agent's
                                        Commission:
                                        1%</div>
                                </div>
                            </div>
                            <div class="mt-3 d-flex align-items-center pt-2">
                                <div
                                    class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                    <img src="{{ asset('img/category.svg') }}" alt="image">
                                </div>
                                <div class="card-text-right ps-0 ps-md-2">
                                    <div class="text-14 font-weight-700 line-height-18 color-b-blue">Cadastral Reference:</div>
                                    <div class="text-14 font-weight-400 line-height-18 color-b-blue">A2423546</div>
                                </div>
                            </div>
                            <div class="mt-3 d-flex align-items-center pt-2">
                                <div
                                    class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                    <i class=" icon-construction_start_date text-24 color-b-blue"></i>
                                </div>
                                <div class="card-text-right ps-0 ps-md-2">
                                    <div class="text-14 font-weight-700 line-height-18 color-b-blue">Construction Start Date:
                                    </div>
                                    <div class="text-14 font-weight-400 line-height-18 color-b-blue">03/2024</div>
                                </div>
                            </div>
                            <div class="mt-3 d-flex align-items-center pt-2">
                                <div
                                    class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                    <i class=" icon-estimated_possession_date text-24 color-b-blue"></i>
                                </div>
                                <div class="card-text-right ps-0 ps-md-2">
                                    <div class="text-14 font-weight-700 line-height-18 color-b-blue">Estimated Possession Date:
                                    </div>
                                    <div class="text-14 font-weight-400 line-height-18 color-b-blue">12/2024</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- end-images --}}


                {{-- Property Description --}}
                <div class="dashboard-card_one box-shadow-one b-color-white border-r-8  p-20 mt-20">
                    <div class="card-text-header text-18 font-weight-700 lineheight-22 color-primary " id="">Property
                        Description:
                    </div>
                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue pt-3">
                        This 3-bed with a loft, 2-bath home in the gated community of The Hideout has it all. From the open
                        floor plan to the abundance of light from the windows, this home is perfect for entertaining. The living
                        room and dining room have vaulted ceilings and a beautiful fireplace. You will love spending time on the
                        deck taking in the beautiful views. In the kitchen, you'll find stainless steel appliances and a tile
                        backsplash, as well as a breakfast bar.
                    </div>
                </div>
                {{-- end Property Description --}}

                {{-- Manage Unit --}}
                <div class="dashboard-card_one box-shadow-one b-color-white border-r-8  p-20 mt-20">
                    <div class="card-text-header text-18 font-weight-700 lineheight-22 color-primary " id="">Manage
                        Unit:
                    </div>
                    <div class="d-flex align-items-center flex-column justify-content-center manage_padding">
                        <img src="{{ asset('img/manage_unit.svg') }}" alt="image" class="#">
                        <h3 class="text-20 font-weight-700 lineheight-24 color-primary pt-20">Welcome to NextGen Development
                            Management CRM.</h3>
                        <p class="text-14 font-weight-400 lineheight-18 color-primary pt-12">You have no units added into the
                            development yet, please choose the desired option from the below and start listing.</p>
                        <div class=" d-flex justify-content-start align-items-center pt-30">
                            <div class="form-group position-relative gap-12 d-flex align-items-center">
                                <button type="button"
                                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                    data-toggle="modal" data-target="#add_unit">
                                    Add Unit</button>
                                <button type="button"
                                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                    data-toggle="modal" data-target="#bulk_import">
                                    Bulk Import</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-Manage Unit: --}}


                {{-- Project Floor Plans --}}
                <div class="dashboard-card_one box-shadow-one b-color-white border-r-8  p-20 mt-20">
                    <div class="card-text-header text-18 font-weight-700 lineheight-22 color-primary " id="">Project
                        Floor Plans:
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-6">
                            <div class="project_floor">
                                <img src="{{ asset('img/project_floor_plan.svg') }}" alt="image" class="#">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="project_floor">
                                <img src="{{ asset('img/project_floor_plan.svg') }}" alt="image" class="#">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End-Project Floor Plans  --}}
            </div>
        </div>

        {{-- add-unit --}}
        <div class="modal fade" id="add_unit" tabindex="-1" role="dialog" aria-labelledby="add_unitLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_six" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="add_unitLabel">Add Unit</h5>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <div class="modal-body modal-header_file">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-n3">
                                <x-forms.crm-single-select :fieldData="[
                                    'name' => 'type_id',
                                    'hasLabel' => true,
                                    'label' => trans('messages.properties.Property_Type') . ':',
                                    'id' => 'type_id',
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    'placeholder' => trans('messages.properties.Property_Type'),
                                    'isRequired' => true,
                                    'minimumResultsForSearch' => 0,
                                ]" />
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css">
                                <x-forms.crm-single-select :fieldData="[
                                    'name' => 'type_id',
                                    'hasLabel' => true,
                                    'label' => trans('messages.properties.Property_Type') . ':',
                                    'id' => 'type_id_one',
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    'placeholder' => trans('messages.properties.Property_Type'),
                                    'isRequired' => true,
                                    'minimumResultsForSearch' => 0,
                                ]" />
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css">
                                <x-forms.crm-single-select :fieldData="[
                                    'name' => 'type_id',
                                    'hasLabel' => true,
                                    'label' => trans('messages.properties.Property_Type') . ':',
                                    'id' => 'type_id_two',
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    'placeholder' => trans('messages.properties.Property_Type'),
                                    'isRequired' => true,
                                    'minimumResultsForSearch' => 0,
                                ]" />
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-3">
                                <p class='text-14 font-weight-400 color-primary'>Number of Copies: ></p>
                            </div>
                            <div class="col-md-12 mt-30 d-flex justify-content-end flex-wrap gap-2">
                                <button type="button"
                                    class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 small-button gardient-button searchFilterBtn"
                                    id="searchFilterBtn">
                                    Add New Unit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="download_brochure  small-button border-r-8  text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center">
            <img src="{{asset('img/toolbar_download.svg')}}" alt="image" class="me-2">
            Download Brochure</button>

        @push('scripts')

            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.umd.js"></script>
            <script>
                $(document).ready(function() {
                    // Initialize slider-for
                    $('.slider-for').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true,
                        fade: true,
                        infinite: true,
                        asNavFor: '.slider-nav'
                    });

                    // Initialize slider-nav
                    $('.slider-nav').slick({
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        asNavFor: '.slider-for',
                        infinite: true,
                        dots: false,
                        arrows: false,
                        // centerMode: true,
                        // focusOnSelect: true
                    });

                    // Fancybox is automatically initialized using the `data-fancybox` attribute
                    // Add this attribute to the anchor tag inside the slider-for to work with Fancybox v4
                });
            </script>
        @endpush
    @endsection
