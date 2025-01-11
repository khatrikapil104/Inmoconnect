@extends('layouts.app')
@section('content')
    @push('styles')

        @section('title')
            {{ trans('messages.dashboard.Edit_Profile') }} Inmoconnect
        @endsection

        <div class="overlay" id="overlay"></div>
        <div id="page-content-wrapper" class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                {{-- breadcrumb  --}}
                <div class="empty-search-header">
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700">
                                Team Management
                            </div>
                        </div>
                        <div class="header-left-team d-flex gap-3">
                            <button
                                class="header-right-button border-r-8 opacity-5 border-blue  d-flex justify-content-center align-items-center px-3 py-2"
                                data-toggle="modal" data-target="#subagent">
                                <i class=" icon-property_search"></i><span class="ms-2">Invite customer</span>
                            </button>
                        </div>
                    </div>

                </div>
                {{-- end-breadcrumb --}}

                <div class="b-color-white box-shadow-one border-r-8  p-30">
                    <!-- /////tabs///////// -->
                    <ul class="tabs">
                        <li class="tab-link current text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                            data-tab="tab-1">My Customers </li>
                        <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                            data-tab="tab-2">Company Customers</li>
                    </ul>

                    {{-- My Customers --}}
                    <div id="tab-1" class="tab-content_one current">
                        <div class="dashboard-card_three b-color-white border-r-8 pt-30">
                            <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2 flex-wrap">
                                <div class="search_button">
                                    <div class="form-group position-relative">
                                        <div class="input-group input-group-sm dashboard_input-search">
                                            <span
                                                class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                            <input type="text" name="search_input_property"
                                                class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                                placeholder="{{ trans('messages.agent-dashboard.search_here') }}"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="search-select common-label-css without_checkbox mt-n3">
                                    <x-forms.crm-single-select :fieldData="[
                                        'name' => 'sort_by_property',
                                        'hasLabel' => true,
                                        'label' => trans('messages.search_filter.Sort_By'),
                                        'id' => 'sort_by_property',
                                        'options' => [
                                            'high_low' => trans('messages.agent-dashboard.sort_high_to_low'),
                                            'low_high' => trans('messages.agent-dashboard.sort_low_to_high'),
                                            'newest' => trans('messages.agent-dashboard.sort_newest'),
                                            'oldest' => trans('messages.agent-dashboard.sort_oldest'),
                                        ],
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => trans('messages.search_filter.Sort_By'),
                                        'isRequired' => false,
                                    ]" />
                                </div>
                            </div>
                            <div class="table_customer-three pt-20">
                                <table id="example_one" class="display  dashboard_edit_one" style="width:100%; ">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>{{ trans('messages.beta-agents.Full_name') }}</th>
                                            <th>{{ trans('messages.beta-agents.email') }}</th>
                                            <th>{{ trans('messages.beta-agents.Mobile_Number') }}</th>
                                            <th>{{ trans('messages.beta-agents.Company_Name') }}</th>
                                            <th>{{ trans('messages.beta-agents.Role_Position') }}</th>
                                            <th>{{ trans('messages.beta-agents.Date_added') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody class="tableData">
                                        {{-- @if ($results->isNotEmpty())
                                        @include('components.tables.custom-table',['results' =>$results ])
                                        @else
                                        <tr>
                                            <td colspan="6" class="text-center">
                
                                                <p>{{trans('messages.beta-agents.no_beta_agents_found')}}</p>
                                            </td>
                                        </tr>
                                        @endif --}}
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>

                    {{-- Company Customers --}}
                    <div id="tab-2" class="tab-content_one">
                        <div class="dashboard-card_three b-color-white border-r-8 pt-30">
                            <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2 flex-wrap">
                                <div class="search_button">
                                    <div class="form-group position-relative">
                                        <div class="input-group input-group-sm dashboard_input-search">
                                            <span
                                                class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                            <input type="text" name="search_input_property"
                                                class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                                placeholder="{{ trans('messages.agent-dashboard.search_here') }}"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="search-select common-label-css without_checkbox mt-n3">
                                    <x-forms.crm-single-select :fieldData="[
                                        'name' => 'sort_by_property',
                                        'hasLabel' => true,
                                        'label' => trans('messages.search_filter.Sort_By'),
                                        'id' => 'sort_by_property_two',
                                        'options' => [
                                            'high_low' => trans('messages.agent-dashboard.sort_high_to_low'),
                                            'low_high' => trans('messages.agent-dashboard.sort_low_to_high'),
                                            'newest' => trans('messages.agent-dashboard.sort_newest'),
                                            'oldest' => trans('messages.agent-dashboard.sort_oldest'),
                                        ],
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => trans('messages.search_filter.Sort_By'),
                                        'isRequired' => false,
                                    ]" />
                                </div>
                            </div>
                            <div class="table_customer-three pt-20">
                                <table id="example_one" class="display  dashboard_edit_one table-bottom-border"
                                    style="width:100%; ">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Added By</th>
                                            <th>Add Date</th>
                                            <th>City</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableData">
                                        <tr>
                                            <td> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36"
                                                    height="36" alt="image" class="border-r-4"></td>
                                            <td><span class="ms-2">Gabriel John</span></td>
                                            <td>monalott@gmail.om</td>
                                            <td>+56 123 567 890</td>
                                            <td>James Henry</td>
                                            <td>18/11/2022</td>
                                            <td>Almería</td>
                                            <td> <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                                    data-name="Gabriel John" data-toggle="modal"
                                                    data-target="#customer_details"> <i
                                                        class="icon-eye icon-20 color-b-blue "></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36"
                                                    height="36" alt="image" class="border-r-4"></td>
                                            <td><span class="ms-2">Gabriel John</span></td>
                                            <td>monalott@gmail.om</td>
                                            <td>+56 123 567 890</td>
                                            <td>James Henry</td>
                                            <td>18/11/2022</td>
                                            <td>Almería</td>
                                            <td> <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                                    data-name="Gabriel John" data-toggle="modal"
                                                    data-target="#customer_details"> <i
                                                        class="icon-eye icon-20 color-b-blue "></i></button>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>

        {{-- modal-subagent --}}
        <div class="modal fade" id="customer_details" tabindex="-1" role="dialog" aria-labelledby="customer_detailsLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="customer_detailsLabel">Customer Details</h5>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <div class="modal-body modal-header_file">

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                                <h6 class="text-14 font-weight-700 color-primary">Personal Details</h6>
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
                                {{-- <div class="d-flex">
                                  
                                    <div class="">
                                        <h6>Mobile Number:</h6>
                                        <h6>+56 123 567 890</h6>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                                <h6 class="text-14 font-weight-700 color-primary">Property Preference</h6>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
                                <h6 class="text-14 font-weight-700 color-primary">Property Category: <span
                                        class="font-weight-400 color-b-blue"> Rent, Sale, Invest</span></h6>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
                                <h6 class="text-14 font-weight-700 color-primary">Property Type: <span
                                        class="font-weight-400 color-b-blue">Apartment, Building</span></h6>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
                                <h6 class="text-14 font-weight-700 color-primary">Property Situation: <span
                                        class="font-weight-400 color-b-blue"> Golf, Beach, Coast</span></h6>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
                                <h6 class="text-14 font-weight-700 color-primary">Preferred Location: <span
                                        class="font-weight-400 color-b-blue">Málaga</span></h6>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
                                <h6 class="text-14 font-weight-700 color-primary">Feature Option: <span
                                        class="font-weight-400 color-b-blue"> Parking, Balcony, Internet</span></h6>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
                                <h6 class="text-14 font-weight-700 color-primary">Sq m: <span
                                        class="font-weight-400 color-b-blue"> 10 m<sup>2</sup> -1000 m<sup>2</sup></span></h6>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
                                <h6 class="text-14 font-weight-700 color-primary">Budget Range: <span
                                        class="font-weight-400 color-b-blue"> €3000- €5000</span></h6>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
                                <h6 class="text-14 font-weight-700 color-primary">Government ID: <span><img
                                            src="http://127.0.0.1:8000/img/default-user.jpg" width="40" height="40"
                                            alt="image" class="border-r-4"></span>
                                </h6>
                            </div>
                            <div
                                class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                                <div class="form-group position-relative">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Send
                                        Message</button>
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

        @endpush
    @endsection
