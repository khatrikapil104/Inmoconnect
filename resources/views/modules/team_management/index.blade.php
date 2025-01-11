@extends('layouts.app')
@section('content')
@section('title')
    Team Management Inmoconnect
@endsection

@php
    $totalActiveTeamMembers = $teamMembersWithPermissionsData->count();
@endphp
<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">
        <div class="empty-search-header">
            <div class="header-title empty-search-header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700">
                        Team Management
                    </div>
                </div>
                <div class="header-left-team d-flex gap-3">
                    <button class="button_green_team green_button_account">Total Active Accounts <span
                            class="button_green-span green_border-team">{{ $totalActiveTeamMembers }}</span></button>
                    <button class="button_green_team pink_button_account">Remaining Accounts <span
                            class="button_green-span pink_border-team">{{ $activeMembersLimit - $totalActiveTeamMembers }}</span></button>
                    <button
                        class="header-right-button border-r-8 opacity-5 border-blue  d-flex justify-content-center align-items-center px-3"
                        data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                        <i class=" icon-add_sub_agents"></i><span class="ms-2 d_none_mob">Add Sub
                            {{ auth()->user()->role->name == 'agent' ? 'Agent' : 'Developer' }}</span>
                    </button>
                </div>
            </div>

        </div>


        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  p-30">
            <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
                <div class="search_button">
                    <div class="form-group position-relative">
                        <div class="input-group input-group-sm dashboard_input-search">
                            <span
                                class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                            <input type="text" name="table_search_input"
                                class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                placeholder="{{ trans('messages.agent-dashboard.search_here') }}" value="">
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    @if ($teamMembersWithPermissionsData && $teamMembersWithPermissionsData->isNotEmpty())
                        <button
                            class="text-decoration-underline text-14 color-primary font-weight-400 b-color-transparent"
                            data-bs-toggle="modal" data-bs-target="#managePermissionModal">Manage Privileges</button>
                    @endif
                    <div class="search-select common-label-css without_checkbox mt-n3">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'table_sort_by',
                            'hasLabel' => false,
                            'label' => trans('messages.search_filter.Sort_By'),
                            'id' => 'table_sort_by',
                            'options' => [
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
                <table id="example_one" class="display  dashboard_edit_one table-bottom-border" style="width:100%; ">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ auth()->user()->role->name == 'agent' ? 'Agent' : 'Developer' }} Name</th>
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
                        @include('components.tables.custom-table', ['results' => $results])
                    </tbody>

                </table>
            </div>
        </div>

        <div class="paginationData mt-10">
            <!-- Custom Pagination File -->
            @include('components.tables.pagination')
        </div>

    </div>
</div>

<!-- /////////////////////////////////////////////Add-new team-member-modal ///////////////////////////////////////////// -->
<div class="modal fade" id="dataFilterModal" tabindex="-1" aria-labelledby="dataFilterModalLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
        <div class="modal-content border-r-8 border-0 b-color-white">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-b-blue w-100"
                    id="dataFilterModalLabel">
                    Add Sub-{{ auth()->user()->role->name == 'agent' ? 'Agent' : 'Developer' }}
                </h4>
                <button type="button" class="close b-color-transparent cursor-pointer end-0" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">
                        <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body modal-body modal-header_file">
                <div class="row">
                    <div class="header-left-team d-flex gap-3 justify-content-center">
                        <button class="button_green_team green_button_account">Total Active Accounts <span
                                class="button_green-span green_border-team">{{ $teamMembersWithPermissionsData->count() }}</span></button>
                        <button class="button_green_team pink_button_account">Remaining Accounts <span
                                class="button_green-span pink_border-team">{{ $activeMembersLimit - $totalActiveTeamMembers }}</span></button>
                    </div>
                </div>
                <form id="inviteTeamMemberForm" class="row">

                    @include('modules.team_management.includes.create_edit_team_member')
                </form>
                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                    <button type="button"
                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteTeamMemberBtn ">
                        Invite {{ auth()->user()->role->name == 'agent' ? 'Agent' : 'Developer' }}
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ///////////////////////////////////end-add-new -team-membe_modal ///////////////////////////////////////// -->

<!-- /////////////////////////////////////////////Edit team-membe-modal ///////////////////////////////////////////// -->
<div class="modal fade" id="editTeamMemberModal" tabindex="-1" aria-labelledby="editTeamMemberModalLabel"
    style="display: none; z-index:1999" aria-hidden="true">
    <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
        <div class="modal-content border-r-8 border-0 b-color-white">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-b-blue w-100"
                    id="editTeamMemberModalLabel">
                    Edit Invited Sub-{{ auth()->user()->role->name == 'agent' ? 'Agent' : 'Developer' }}
                </h5>
                <button type="button" class="close b-color-transparent cursor-pointer end-0" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">
                        <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body modal-body modal-header_file">
                <div class="row">

                    <div class="header-left-team d-flex gap-3 justify-content-center">
                        <button class="button_green_team green_button_account">Total Active Accounts <span
                                class="button_green-span green_border-team">{{ $teamMembersWithPermissionsData->count() }}</span></button>
                        <button class="button_green_team pink_button_account">Remaining Accounts <span
                                class="button_green-span pink_border-team">{{ $activeMembersLimit - $totalActiveTeamMembers }}</span></button>
                    </div>
                </div>
                <form id="updateTeamMemberForm" class="row">

                </form>
                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                    <button type="button" data-id="" data-name=""
                        class="delete_project small-button border-r-8 text-14 font-weight-700 lineheight-18 d-flex align-items-center justify-content-center cancelInvitationBtn"
                        style="margin-right: 10px;">
                        {{ trans('messages.my-customers.Cancel_Invitation') }}
                    </button>
                    <button type="button" data-id=""
                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white updateTeamMemberBtn">
                        {{ trans('messages.my-customers.save') }}
                    </button>
                </div>


            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="managePermissionModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_one" role="document">
        <div class="modal-content modal-content-file">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="dataFilterModalLabel">
                    Sub-{{ auth()->user()->role->name == 'agent' ? 'Agent' : 'Developer' }} Access</h4>
                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                </button>
            </div>
            <h6 class="pt-10 text-center text-14 color-black font-weight-400 text-capitalize lineheight-18">
                Please Select The Access For Your
                Sub-{{ auth()->user()->role->name == 'agent' ? 'Agent' : 'Developer' }}s
            </h6>
            <div class="modal-body modal-header_file">
                <form action="{{ route(routeNamePrefix() . 'team_management.submitTeamMemberAccessData') }}"
                    method="post">
                    <div class="modal-body_select-agent">
                        <table id="example" class="display dashboard_table dashboard_table_edit_two">
                            <thead>
                                <tr>
                                    <th class="col-3">
                                        {{ auth()->user()->role->name == 'agent' ? 'Agent' : 'Developer' }}</th>
                                    @if ($userPermissions->isNotEmpty())
                                        @foreach ($userPermissions as $permission)
                                            <th class="table-extra-width">{{ $permission->permission_name ?? '' }}
                                            </th>
                                        @endforeach
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @if ($teamMembersWithPermissionsData && $teamMembersWithPermissionsData->isNotEmpty())
                                    @foreach ($teamMembersWithPermissionsData as $memberKey => $member)
                                        <tr>
                                            <td> <img
                                                    src="{{ !empty($member->image) ? $member->image : asset('img/default-user.jpg') }}"
                                                    alt="image"><span
                                                    class="table-agent_name">{{ $member->name ?? '' }}</span>
                                            </td>
                                            @if ($userPermissions->isNotEmpty())
                                                @foreach ($userPermissions as $permission)
                                                    <td>

                                                        <input type="checkbox"
                                                            name="dataArr[{{ $memberKey }}][permissions][{{ $permission->permission_name }}]"
                                                            class="checkbox" value="1"
                                                            @if (!empty($member->user_permissions) && in_array($permission->permission_name, $member->user_permissions)) checked @endif />

                                                    </td>
                                                @endforeach
                                            @endif


                                        </tr>
                                        <input type="hidden" name="dataArr[{{ $memberKey }}][user_id]"
                                            value="{{ $member->id }}">
                                    @endforeach
                                @else
                                    <div class="col-md-12 text-center">
                                        <p>No Members Found</p>
                                    </div>
                                @endif

                            </tbody>
                        </table>
                    </div>

                    @if ($teamMembersWithPermissionsData && $teamMembersWithPermissionsData->isNotEmpty())
                        <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                            <button type="submit"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">
                                {{ trans('messages.dashboard.Save') }}
                            </button>
                        </div>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>


<!-- ///////////////////////////////////end-Edit -team-member_modal ///////////////////////////////////////// -->


@push('scripts')
    <script>
        var routeUrlInviteTeamMember = "{{ route(routeNamePrefix() . 'team_management.inviteTeamMember') }}";
        var routeUrlUpdateTeamMember = "{{ route(routeNamePrefix() . 'team_management.updateTeamMember', ':id') }}";
        var routeUrlLoadEditView = "{{ route(routeNamePrefix() . 'team_management.loadEditView', ':id') }}";
        var routeUrlRemoveInvite = "{{ route(routeNamePrefix() . 'team_management.destroy', ':id') }}";
        var routeUrlCancelInvite = "{{ route(routeNamePrefix() . 'team_management.cancelInvite', ':id') }}";
        var areYouSureTextConfirmPopup = "{{ trans('messages.confirm_popup.Are_you_sure') }}";
        var cancelInvitationTextConfirmPopup = "{{ trans('messages.confirm_popup.Cancel_Invitation') }}";
        var cancelInviteConfirmText = "{{ trans('messages.confirm_popup.You_are_attempting_to_cancel_invite') }}";
    </script>
    <script src="{{ asset('assets/js/modules/team_management/index.js') }}"></script>
@endpush
@endsection
