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
                            <button class="button_green_team green_button_account">total Active Accounts <span
                                    class="button_green-span green_border-team">3</span></button>
                            <button class="button_green_team pink_button_account">Remaining Accounts <span
                                    class="button_green-span pink_border-team">2</span></button>
                            <button
                                class="header-right-button border-r-8 opacity-5 border-blue  d-flex justify-content-center align-items-center px-3"
                                data-toggle="modal" data-target="#subagent">
                                <i class=" icon-property_search"></i><span class="ms-2">Add Sub Agent</span>
                            </button>
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
                            <button class="text-decoration-underline text-14 color-primary font-weight-400 b-color-transparent"
                                data-toggle="modal" data-target="#manageAgent">Manage Privileges</button>
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
                                    <th>Agent Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Add Date</th>
                                    <th>City</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="tableData">
                                <tr>
                                    <td><a href="#"> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36"
                                                height="36" alt="image" class="border-r-4"></a></td>
                                    <td><a href="#"><span class="ms-2">Gabriel John</span></a></td>
                                    <td><a href="#">gabriel100@yopmail.com</a></td>
                                    <td><a href="#">+56 234 567 891</a></td>
                                    <td><a href="#">18/11/2022</a></td>
                                    <td><a href="#">Almería</a></td>
                                    <td><a href="#">Agent</a></td>
                                    <td>
                                        <a href="#">
                                            <div class="event-checkbox">
                                                <label class="switch">
                                                    <input type="checkbox" name="is_project_base_event" value="1"
                                                        class="form-control ">
                                                    <span class="slider">

                                                    </span>
                                                </label>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John"> <i class=" icon-eye icon-18 color-b-blue "></i></button>

                                    </td>

                                </tr>
                                <tr>
                                    <td> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36" height="36"
                                            alt="image" class="border-r-4"></td>
                                    <td><span class="ms-2">Gabriel John</span></td>
                                    <td>gabriel100@yopmail.com</td>
                                    <td>+56 234 567 891</td>
                                    <td>18/11/2022</td>
                                    <td>Almería</td>
                                    <td>Agent</td>
                                    <td>
                                        <div class="event-checkbox">
                                            <label class="switch">
                                                <input type="checkbox" name="is_project_base_event" value="1"
                                                    class="form-control ">
                                                <span class="slider">

                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John"> <i
                                                class=" icon-Delete icon-18 color-b-blue "></i></button>

                                    </td>
                                </tr>
                                <tr>
                                    <td> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36" height="36"
                                            alt="image" class="border-r-4"></td>
                                    <td><span class="ms-2">Gabriel John</span></td>
                                    <td>gabriel100@yopmail.com</td>
                                    <td>+56 234 567 891</td>
                                    <td>18/11/2022</td>
                                    <td>Almería</td>
                                    <td>Agent</td>
                                    <td>
                                        <div class="event-checkbox">
                                            <label class="switch">
                                                <input type="checkbox" name="is_project_base_event" value="1"
                                                    class="form-control ">
                                                <span class="slider">

                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John"> <i
                                                class=" icon-Delete icon-18 color-b-blue "></i></button>

                                    </td>
                                </tr>
                                <tr class="remaining_account-opacity">
                                    <td> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36" height="36"
                                            alt="image" class="border-r-4"></td>
                                    <td><span class="ms-2">Gabriel John</span></td>
                                    <td>gabriel100@yopmail.com</td>
                                    <td>+56 234 567 891</td>
                                    <td>18/11/2022</td>
                                    <td>Almería</td>
                                    <td>Agent</td>
                                    <td>
                                        <div class="event-checkbox">
                                            <label class="switch">
                                                <input type="checkbox" name="is_project_base_event" value="1"
                                                    class="form-control ">
                                                <span class="slider">

                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#editsubagent"> <i
                                                class=" icon-edit icon-18 color-b-blue "></i></button>

                                    </td>
                                </tr>
                                <tr class="remaining_account-opacity">
                                    <td> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36" height="36"
                                            alt="image" class="border-r-4"></td>
                                    <td><span class="ms-2">Gabriel John</span></td>
                                    <td>gabriel100@yopmail.com</td>
                                    <td>+56 234 567 891</td>
                                    <td>18/11/2022</td>
                                    <td>Almería</td>
                                    <td>Agent</td>
                                    <td>
                                        <div class="event-checkbox">
                                            <label class="switch">
                                                <input type="checkbox" name="is_project_base_event" value="1"
                                                    class="form-control ">
                                                <span class="slider">

                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#editsubagent"> <i
                                                class=" icon-edit icon-18 color-b-blue "></i></button>

                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>


                {{-- modal-subagent --}}
                <div class="modal fade" id="subagent" tabindex="-1" role="dialog" aria-labelledby="subagentLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="subagentLabel">Add Sub-Agent</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="header-left-team d-flex gap-3 justify-content-center">
                                        <button class="button_green_team green_button_account">total Active Accounts <span
                                                class="button_green-span green_border-team">3</span></button>
                                        <button class="button_green_team pink_button_account">Remaining Accounts <span
                                                class="button_green-span pink_border-team">2</span></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="reference"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">First Name:<span
                                                    class="required">*</span></label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="reference" id="reference" value="" placeholder="">
                                            <div class="invalid-feedback fw-bold"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="reference"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Last Name:<span
                                                    class="required">*</span></label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="reference" id="reference" value="" placeholder="">
                                            <div class="invalid-feedback fw-bold"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="reference"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">email:<span
                                                    class="required">*</span></label>
                                            <input type="email"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="reference" id="reference" value="" placeholder="">
                                            <div class="invalid-feedback fw-bold"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="reference"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number:<span class="required">*</span></label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="reference" id="reference" value="" placeholder="">
                                            <div class="invalid-feedback fw-bold"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="reference"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Manage
                                                Access:<span class="required">*</span></label>
                                            <div class="d-flex gap-4">
                                                <label class="customcb">managing projects
                                                    <input type="checkbox" name="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="customcb">accessing clientele
                                                    <input type="checkbox" name="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="customcb">property posting
                                                    <input type="checkbox" name="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                                        <div class="form-group position-relative">
                                            <button type="button"
                                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Invit
                                                Agent</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- edit subagent --}}
                <div class="modal fade" id="editsubagent" tabindex="-1" role="dialog" aria-labelledby="editsubagentLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="editsubagentLabel">Edit Invited Sub-Agent</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="reference"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">First Name:<span
                                                    class="required">*</span></label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="reference" id="reference" value="" placeholder="">
                                            <div class="invalid-feedback fw-bold"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="reference"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Last Name:<span
                                                    class="required">*</span></label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="reference" id="reference" value="" placeholder="">
                                            <div class="invalid-feedback fw-bold"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="reference"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">email:<span
                                                    class="required">*</span></label>
                                            <input type="email"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="reference" id="reference" value="" placeholder="">
                                            <div class="invalid-feedback fw-bold"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="reference"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                                Number:</label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="reference" id="reference" value="" placeholder="">
                                            <div class="invalid-feedback fw-bold"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="reference"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Manage
                                                Access:<span class="required">*</span></label>
                                            <div class="d-flex gap-4">
                                                <label class="customcb">managing projects
                                                    <input type="checkbox" name="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="customcb">accessing clientele
                                                    <input type="checkbox" name="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="customcb">property posting
                                                    <input type="checkbox" name="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                                        <div class="form-group position-relative gap-12 d-flex align-items-center">

                                            <button type="button"
                                                class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary"
                                                data-toggle="modal" data-target="#cancelbutton">Cancel Invitation</button>
                                            <button type="button"
                                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="manageAgent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_one" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Manage Agents</h4>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <p class="pt-10 text-center text-14 color-black font-weight-400 text-capitalize lineheight-18">
                        Import your
                        existing listed properties to your project.</p>
                    <div class="modal-body modal-header_file">
                        <div class="modal-body_select-agent">
                            <table id="example"
                                class="display dashboard_table dashboard_table_edit_two dashboard_edit-table">
                                <thead>
                                    <tr>
                                        <th>Agent</th>
                                        <th class="table-extra-width">Manage Projects</th>
                                        <th class="table-extra-width">Manage Customers</th>
                                        <th class="table-extra-width">Manage Listings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                            <button type="button"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')


            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

        @endpush
    @endsection
