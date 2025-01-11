@php
    $nameArr = !empty($result->name) ? explode(' ', $result->name) : [];
@endphp
<div class="modal-header border-0 modal-header_file pb-0">
    <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-b-blue w-100" id="newGroupModalLabel">
        {{ !empty($type) && $type == 'edit' ? 'Edit Group' : trans('messages.message.Create_new_group') }}
    </h5>
    <button type="button" class="close b-color-transparent cursor-pointer end-0" data-bs-dismiss="modal"
        aria-label="Close">
        <span aria-hidden="true">
            <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
        </span>
    </button>
</div>
<div class="modal-body modal-body modal-header_file">
    <form id="{{ !empty($type) && $type == 'edit' ? 'updateGroupForm' : 'createNewGroupForm' }}" class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
            <x-forms.crm-text-field :fieldData="[
                'name' => 'name',
                'hasLabel' => true,
                'label' => trans('messages.messages.group_name') . ':',
                'id' => 'name',
                'attributes' => [],
                'hasHelpText' => false,
                'help' => 'Please enter your name',
                'isRequired' => true,
                'value' => !empty($groupData->name) ? $groupData->name : '',
            ]" />
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css multiselect-select add-select">
            <x-forms.crm-multi-select-with-image :fieldData="[
                'name' => 'group_customers',
                'hasLabel' => true,
                'label' => trans('messages.messages.Add_customers') . ':',
                'class' => 'select-icon',
                'id' => 'group_customers',
                'options' => $connectedCustomersArray ?? [],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.messages.Add_customers'),
                'isRequired' => false,
                'selected' => !empty($selectedGroupCustomers) ? $selectedGroupCustomers : [],
            ]" />
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css multiselect-select add-select">
            <x-forms.crm-multi-select-with-image :fieldData="[
                'name' => 'group_agents',
                'hasLabel' => true,
                'label' => trans('messages.messages.Add_Agents') . ':',
                'class' => 'select-icon',
                'id' => 'group_agents',
                'options' => $connectedAgentsArray ?? [],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.messages.Add_Agents'),
                'isRequired' => false,
                'selected' => !empty($selectedGroupAgents) ? $selectedGroupAgents : [],
            ]" />
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css multiselect-select add-select">
            <x-forms.crm-multi-select-with-image :fieldData="[
                'name' => 'group_admins',
                'hasLabel' => true,
                'label' => trans('messages.messages.select_your_group_admin') . ':',
                'class' => 'select-icon',
                'id' => 'group_admins',
                'options' => $connectedAgentsArray ?? [],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.messages.select_your_group_admin'),
                'isRequired' => false,
                'selected' => !empty($selectedGroupAdmins) ? $selectedGroupAdmins : [],
            ]" />
        </div>
    </form>
    <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
        <button type="button"
            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white {{ !empty($type) && $type == 'edit' ? 'updateGroupBtn' : 'createGroupBtn' }} "
            data-id="{{ !empty($groupData->id) ? $groupData->id : '' }}">
            {{ !empty($type) && $type == 'edit' ? 'Update' : trans('messages.messages.Create') }}
        </button>
    </div>
</div>
