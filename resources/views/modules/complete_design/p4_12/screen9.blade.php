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
                                Property Leads
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-breadcrumb --}}

                {{-- table --}}

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
                                        <th>Property Reference</th>
                                        <th>Property Title</th>
                                        <th>Lead Date</th>
                                        <th>Lead Name</th>
                                        <th>Account Type</th>
                                        <th>City</th>
                                        <th>Price</th>
                                        <th></th>
                                        <th>
                                        <th>
                                    </tr>
                                </thead>
                                <tbody class="tableData">
                                    <tr>
                                        <td> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36" height="36"
                                                alt="image" class="border-r-4"></td>
                                        <td><span class="ms-2">0001234</span></td>
                                        <td class="title_wrap title_dashboard-wrap"><span>TY35 Avenue GGLondon Center TY35 Avenue
                                                GGLondon
                                                Center </span></td>
                                        <td>17/8/2023 <br />12:24 AM</td>
                                        <td>Brain Baker</td>
                                        <td>Customer</td>
                                        <td>Barcelona</td>
                                        <td class="table_prize">Є100,000</td>
                                        <td> <a href="#" class="read_message position-relative"> <i class=" icon-message icon-20 color-b-blue "></i></a>
                                        </td>
                                        <td> <a href="#"> <i class=" icon-eye icon-20 color-b-blue "></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36" height="36"
                                                alt="image" class="border-r-4"></td>
                                        <td><span class="ms-2">0001234</span></td>
                                        <td class="title_wrap title_dashboard-wrap"><span>TY35 Avenue GGLondon Center TY35 Avenue
                                                GGLondon
                                                Center </span></td>
                                        <td>17/8/2023 <br />12:24 AM</td>
                                        <td>Brain Baker</td>
                                        <td>Customer</td>
                                        <td>Barcelona</td>
                                        <td class="table_prize">Є100,000</td>
                                        <td> <a href="#" onclick="openSidebar()"> <i
                                                    class=" icon-message icon-20 color-b-blue "></i></a>
                                        </td>
                                        <td> <a href="#"> <i class=" icon-eye icon-20 color-b-blue "></i></a>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="sidebar_one " id="mySidebar_one">
        </div>

        @push('scripts')

            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
            <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>

        @endpush
    @endsection
