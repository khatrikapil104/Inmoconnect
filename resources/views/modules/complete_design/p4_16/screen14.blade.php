@extends('layouts.app')
@section('content')
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
                        <div class="header-left-team d-flex gap-3">
                            <button
                                class="b-color-transparent header-right-button border-r-8 opacity-5 border-blue  d-flex justify-content-center align-items-center px-3 py-2"
                                data-toggle="modal" data-target="#subagent">
                                <i class=" icon-add_new_development text-20"></i><span class="ms-2 text-14 font-weight-700">Add New
                                    Development</span>
                            </button>
                        </div>
                    </div>

                </div>
                {{-- end-breadcrumb --}}

                {{-- empty-page --}}
                <div class="row propertyListingData tableData">

                    <div class="main-card border-r-8  mb-15">

                        <div
                            class="empty-search border-r-8 b-color-white d-flex align-items-center justify-content-center px-50 py-30 box-shadow-one">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-6  empty-order">
                                    <div class="search-left">
                                        <div class="text-20 lineheight-22 color-primary font-weight-700 letter-s-48">Start
                                            Showcasing Your Real Estate Projects Today!</div>
                                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue pt-10">Why Add Your
                                            Developments on Inmoconnect?</div>

                                        <ul class="search-list">
                                            <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                                    class="font-weight-700">Comprehensive Project Management:</span> Easily
                                                manage all aspects of your real estate projects, from unit listings to pricing
                                                and availability.</li>
                                            <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                                    class="font-weight-700">Maximize Exposure:</span> Showcase your developments
                                                to a wide network of agents and potential buyers.</li>
                                            <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                                    class="font-weight-700">Streamlined Collaboration:</span> Collaborate with
                                                agents, set commission terms, and manage sales agreements seamlessly.</li>
                                            <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                                    class="font-weight-700">Real-Time Updates:</span> Keep your listings current
                                                with automated updates, ensuring potential buyers have the latest information.
                                            </li>
                                        </ul>
                                        <div class="text14 font-weight-400 lineheight-18 color-b-blue pt-15">Start adding your
                                            developments now and take your real estate business to new heights with Inmoconnect.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="search-right">
                                        <div class="search-right-img opacity-8 text-center mb-5 mb-lg-0">
                                                <img src="{{ asset('img/empty_development.svg') }}" alt="image"
                                            class="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-empty-page --}}

            </div>
        </div>


        @push('scripts')

        @endpush
    @endsection
