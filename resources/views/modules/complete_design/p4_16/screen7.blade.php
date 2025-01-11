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
                    </div>
                </div>
                {{-- end-breadcrumb --}}

                {{-- table --}}
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  p-30">
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
                        <div class="d-flex align-items-center gap-3">
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
                    </div>
                    <div class="table_customer-three pt-10">
                        <table id="example_one" class="display dashboard_edit_one table-bottom-border" style="width:100%; ">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Developers Name</th>
                                    <th>Company Name</th>
                                    <th>Mobile Number</th>
                                    <th>City</th>
                                    <th>Sign up Date</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="tableData">
                                <tr>
                                    <td><a href="#"> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36"
                                                height="36" alt="image" class="border-r-4"></a></td>
                                    <td><a href="#"><span class="ms-2">Gabriel John</span></a></td>
                                    <td><a href="#">Harmony Real Estate</a></td>
                                    <td><a href="#">+56 234 567 891</a></td>
                                    <td><a href="#">Gijon</a></td>
                                    <td><a href="#">18/11/2022</a></td>
                                    <td class="change_active">
                                        <button class="d-flex align-items-center b-color-transparent">
                                            <span class="">
                                                <img src="{{asset('img/table_accept.svg')}}" alt="Default Image">
                                            </span>
                                            <span class=" ">
                                                <img src="{{asset('img/table_reject.svg')}}" alt="Default Image">
                                            </span>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="b-color-transparent removeCustomerInviteBtn"><i
                                                class=" icon-eye icon-18 color-b-blue "></i></button>

                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#"> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36"
                                                height="36" alt="image" class="border-r-4"></a></td>
                                    <td><a href="#"><span class="ms-2">Gabriel John</span></a></td>
                                    <td><a href="#">Harmony Real Estate</a></td>
                                    <td><a href="#">+56 234 567 891</a></td>
                                    <td><a href="#">Gijon</a></td>
                                    <td><a href="#">18/11/2022</a></td>
                                    <td class="change_active">
                                            <span class="span_active span_complate_one">
                                                Accepted
                                            </span>
                                    </td>
                                    <td>
                                        <button class="b-color-transparent removeCustomerInviteBtn"><i
                                                class=" icon-eye icon-18 color-b-blue "></i></button>

                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#"> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36"
                                                height="36" alt="image" class="border-r-4"></a></td>
                                    <td><a href="#"><span class="ms-2">Gabriel John</span></a></td>
                                    <td><a href="#">Harmony Real Estate</a></td>
                                    <td><a href="#">+56 234 567 891</a></td>
                                    <td><a href="#">Gijon</a></td>
                                    <td><a href="#">18/11/2022</a></td>
                                    <td class="change_active">
                                        <a href="#">
                                            <span class="span_active span_complate_one">
                                                Accepted
                                            </span>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="b-color-transparent removeCustomerInviteBtn"><i
                                                class=" icon-eye icon-18 color-b-blue "></i></button>

                                    </td>
                                </tr>
                                <tr class="remaining_account-opacity">
                                    <td><a href="#"> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36"
                                                height="36" alt="image" class="border-r-4"></a></td>
                                    <td><a href="#"><span class="ms-2">Gabriel John</span></a></td>
                                    <td><a href="#">Harmony Real Estate</a></td>
                                    <td><a href="#">+56 234 567 891</a></td>
                                    <td><a href="#">Gijon</a></td>
                                    <td><a href="#">18/11/2022</a></td>
                                    <td class="change_active">
                                        <a href="#">
                                            <span class="span_pending span_complate_one">
                                                Rejected
                                            </span>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="b-color-transparent removeCustomerInviteBtn"><i
                                                class=" icon-eye icon-18 color-b-blue "></i></button>

                                    </td>
                                </tr>
                                <tr class="remaining_account-opacity">
                                    <td><a href="#"> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36"
                                                height="36" alt="image" class="border-r-4"></a></td>
                                    <td><a href="#"><span class="ms-2">Gabriel John</span></a></td>
                                    <td><a href="#">Harmony Real Estate</a></td>
                                    <td><a href="#">+56 234 567 891</a></td>
                                    <td><a href="#">Gijon</a></td>
                                    <td><a href="#">18/11/2022</a></td>
                                    <td class="change_active">
                                        <a href="#">
                                            <span class="span_pending span_complate_one">
                                                Rejected
                                            </span>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="b-color-transparent removeCustomerInviteBtn"><i
                                                class=" icon-eye icon-18 color-b-blue "></i></button>

                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>


            </div>
        </div>


        @push('scripts')

        @endpush
    @endsection
