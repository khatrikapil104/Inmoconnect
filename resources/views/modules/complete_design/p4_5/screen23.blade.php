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

                    </div>

                </div>
                {{-- end-breadcrumb --}}


                <!-- /////tabs///////// -->
                <ul class="tabs" style="margin-bottom:20px;">
                    <li class="tab-link current text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                        data-tab="tab-1">My Properties </li>
                    <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                        data-tab="tab-2">Company Properties</li>
                    <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                        data-tab="tab-3">Collaborated Properties</li>
                </ul>


                <!-- ///////////personal-information/////////// -->
                <div id="tab-1" class="tab-content_one current">
                    <div class="b-color-white box-shadow-one border-r-8  p-30 ">
                        <div class="dashboard-card_three b-color-white border-r-8">
                            <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
                                <div class="search_button">
                                    <div class="form-group position-relative">
                                        <div class="input-group input-group-sm dashboard_input-search">
                                            <span
                                                class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                            <input type="text" name="table_search_input"
                                                class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                                placeholder="{{ trans('messages.agent-dashboard.search_here') }}"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <button type="button"
                                    onclick="window.open('{{ route(routeNamePrefix() . 'customers.exportCustomers') }}','_self')"
                                    class="delete_project small-button border-r-8 text-14 font-weight-700 lineheight-18 d-flex align-items-center justify-content-center">
                                    <i class=" icon-Export me-2 icon-20"></i>
                                    {{ trans('messages.my-customer.Export') }}
                                </button>
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
                </div>

                <!-- ///////////professional-information////////// -->
                <div id="tab-2" class="tab-content_one">
                    <div class="b-color-white box-shadow-one border-r-8  p-30 ">
                        <div class="dashboard-card_three b-color-white border-r-8">
                            <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2 flex-wrap">
                                <div class="search_button">
                                    <div class="form-group position-relative">
                                        <div class="input-group input-group-sm dashboard_input-search">
                                            <span
                                                class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                            <input type="text" name="search_input_property"
                                                class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                                placeholder="{{ trans('messages.agent-dashboard.search_here') }}" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="search-select common-label-css without_checkbox mt-n3">
                                    <x-forms.crm-single-select :fieldData="[
                                        'name' => 'sort_by_property',
                                        'hasLabel' => false,
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
                                <table id="example_one" class="display  dashboard_edit_one table-bottom-border"
                                    style="width:100%; ">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Property ID</th>
                                            <th>Property Title</th>
                                            <th>Add Date</th>
                                            <th>Added By</th>
                                            <th>City</th>
                                            <th>Price</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableData">
                                        <tr>
                                            <td> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36"
                                                    height="36" alt="image" class="border-r-4"></td>
                                            <td><span class="ms-2">0001234</span></td>
                                            <td class="title_wrap table-text-overflow"><span>TY35 Avenue GGLondon Center TY35 Avenue GGLondon
                                                Center </span></td>
                                            <td>17/8/2023 <br />12:24 AM</td>
                                            <td>Ivana Tinkle</td>
                                            <td>Álava</td>
                                            <td class="table_prize">Є100,000</td>
                                            <td> <a href="#"> <i class=" icon-eye icon-20 color-b-blue "></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36"
                                                    height="36" alt="image" class="border-r-4"></td>
                                            <td><span class="ms-2">0001234</span></td>
                                            <td class="title_wrap table-text-overflow"><span>TY35 Avenue GGLondon Center TY35 Avenue GGLondon
                                                Center </span></td>
                                            <td>17/8/2023 <br />12:24 AM</td>
                                            <td>Ivana Tinkle</td>
                                            <td>Álava</td>
                                            <td class="table_prize">Є100,000</td>
                                            <td> <a href="#"> <i class=" icon-eye icon-20 color-b-blue "></i></a>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tab-3" class="tab-content_one">
                </div>

            </div>

            @push('scripts')

                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
                <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>

            @endpush
        @endsection
