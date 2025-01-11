@if (
    (auth()->user()->role->name == 'customer' && auth()->user()->id != $result->owner_id) ||
        (auth()->user()->role->name == 'agent' && isset($request->type)))
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css multiselect-select add-select agent-propety-data">
        <x-forms.crm-multi-select-with-image :fieldData="[
            'name' => 'property_id',
            'hasLabel' => true,
            'label' => trans('messages.add-events.Property_Association'),
            'class' => 'select-icon',
            'id' => 'property_id',
            'options' => $agentPropertiesArray ?? [],
            'attributes' => [],
            'hasHelpText' => false,
            'placeholder' => trans('messages.add-events.Property_Association'),
            'isRequired' => false,
            'attributes' => !empty($request->type) && $request->type == 'view' ? ['disabled'] : [],
            'selected' => $result->selectedAgentProperties ?? [],
        ]" />
    </div>
@else
    @if (!empty($agentPropertiesArray) && isset($agentPropertiesArray))
        {{-- @dd($agentPropertiesArray) --}}
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css multiselect-select add-select agent-propety-data">
            <x-forms.crm-multi-select-with-image :fieldData="[
                'name' => 'property_id',
                'hasLabel' => true,
                'label' => trans('messages.add-events.Property_Association') . ':',
                'class' => 'select-icon agent-propety',
                'id' => 'property_id',
                'options' => $agentPropertiesArray ?? [],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.add-events.Property_Association'),
                'isRequired' => false,
            ]" />

        </div>
    @else
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css multiselect-select add-select agent-propety-data">
            <x-forms.crm-multi-select-with-image :fieldData="[
                'name' => 'property_id',
                'hasLabel' => true,
                'label' => trans('messages.add-events.Property_Association') . ':',
                'class' => 'select-icon agent-propety',
                'id' => 'property_id',
                'options' => [],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.add-events.Property_Association'),
                'isRequired' => false,
            ]" />

        </div>
    @endif
@endif


@if (auth()->user()->role->name != 'customer' && isset($request->type))
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css multiselect-select add-select agent-propety-data">
        <x-forms.crm-multi-select-with-image :fieldData="[
            'name' => 'agent_id',
            'hasLabel' => true,
            'label' => trans('messages.add-events.Agent_Association'),
            'class' => 'select-icon',
            'id' => 'agent_id',
            'options' => $connectedAgentsArray ?? [],
            'attributes' => [],
            'hasHelpText' => false,
            'placeholder' => trans('messages.add-events.Agent_Association'),
            'isRequired' => false,
            'attributes' => !empty($request->type) && $request->type == 'view' ? ['disabled'] : [],
            'selected' => $result->selectedConnectedAgents ?? [],
        ]" />
    </div>
@else
    @if (!empty($connectedAgentsArray) && isset($connectedAgentsArray))
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css multiselect-select add-select agent-propety-data">
            <x-forms.crm-multi-select-with-image :fieldData="[
                'name' => 'agent_id',
                'hasLabel' => true,
                'label' => trans('messages.add-events.Agent_Association') . ':',
                'class' => 'select-icon',
                'id' => 'agent_id',
                'options' => $connectedAgentsArray ?? [],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.add-events.Agent_Association'),
                'isRequired' => false,
            ]" />
        </div>
    @else
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css multiselect-select add-select agent-propety-data">
            <x-forms.crm-multi-select-with-image :fieldData="[
                'name' => 'agent_id',
                'hasLabel' => true,
                'label' => trans('messages.add-events.Agent_Association') . ':',
                'class' => 'select-icon',
                'id' => 'agent_id',
                'options' => [],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.add-events.Agent_Association'),
                'isRequired' => false,
            ]" />
        </div>
    @endif
@endif

@if (auth()->user()->role->name != 'customer' && isset($request->type))
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css multiselect-select add-select agent-propety-data">
        <x-forms.crm-multi-select-with-image :fieldData="[
            'name' => 'customer_id',
            'hasLabel' => true,
            'label' => trans('messages.add-events.Customer_Association'),
            'class' => 'select-icon',
            'id' => 'customer_id',
            'options' => $connectedCustomersArray ?? [],
            'attributes' => [],
            'hasHelpText' => false,
            'placeholder' => trans('messages.add-events.Customer_Association'),
            'isRequired' => false,
            'attributes' => !empty($request->type) && $request->type == 'view' ? ['disabled'] : [],
            'selected' => $result->selectedConnectedCustomers ?? [],
        ]" />
    </div>
@else
    @if (!empty($connectedCustomersArray) && isset($connectedCustomersArray))
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css multiselect-select add-select agent-propety-data">
            <x-forms.crm-multi-select-with-image :fieldData="[
                'name' => 'customer_id',
                'hasLabel' => true,
                'label' => trans('messages.add-events.Customer_Association') . ':',
                'class' => 'select-icon',
                'id' => 'customer_id',
                'options' => $connectedCustomersArray ?? [],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.add-events.Customer_Association'),
                'isRequired' => false,
            ]" />
        </div>
    @else
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css multiselect-select add-select agent-propety-data">
            <x-forms.crm-multi-select-with-image :fieldData="[
                'name' => 'customer_id',
                'hasLabel' => true,
                'label' => trans('messages.add-events.Customer_Association') . ':',
                'class' => 'select-icon',
                'id' => 'customer_id',
                'options' => [],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.add-events.Customer_Association'),
                'isRequired' => false,
            ]" />
        </div>
    @endif
@endif
