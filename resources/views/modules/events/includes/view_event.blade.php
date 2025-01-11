<div class="sidebar_one-content viewEditEventSidebar">
    @if ($result->action == 'call')
        <h4 class="text-18 font-weight-700 lineheight-32 color-b-blue">
            {{ trans('messages.add-events.Action_call') }}
        </h4>
    @elseif($result->action == 'view_meeting')
        <h4 class="text-18 font-weight-700 lineheight-32 color-b-blue">
            {{ trans('messages.add-events.Action_View_Meetings') }}
        </h4>
    @elseif($result->action == 'meeting')
        <h4 class="text-18 font-weight-700 lineheight-32 color-b-blue">
            {{ trans('messages.add-events.Action_Meeting') }}
        </h4>
    @endif
    @if (!empty($result->project_id))
        <div class="d-flex align-items-center">

            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M10.7132 2.1948L10.7267 2.20153L11.6613 2.66723C11.7973 2.73507 11.8789 2.78416 11.9061 2.81449C12.0304 2.95303 12.0361 3.17631 11.8943 3.30508C11.86 3.33625 11.8112 3.3676 11.7481 3.39909L6.69113 5.91728C6.55463 5.98528 6.4451 6.03163 6.36261 6.0563C6.0188 6.15907 5.68951 6.1063 5.36871 5.94628C3.68347 5.10581 1.96143 4.24808 0.202522 3.37309C-0.0715253 3.23657 -0.0637738 2.86851 0.203529 2.73548C1.91309 1.88534 3.62348 1.03345 5.33472 0.179807C5.47089 0.111798 5.58884 0.0651975 5.68851 0.0400356C5.99603 -0.0379829 6.30075 -0.00197201 6.60263 0.148053C7.97354 0.829666 9.34478 1.51296 10.7132 2.1948ZM5.09485 8.7432C4.362 8.38056 3.63101 8.01728 2.89859 7.65329C2.0329 7.22308 1.16523 6.79188 0.29023 6.3596C0.179207 6.30458 0.109047 6.25776 0.0797196 6.2192C-0.0715558 6.02119 0.00244921 5.77729 0.217476 5.6713C0.508613 5.5277 0.791572 5.38764 1.06641 5.25113C1.28956 5.14031 1.50736 5.0318 1.71976 4.92565C1.72208 4.92452 1.72455 4.92368 1.72706 4.92318C1.72822 4.92295 1.72941 4.92278 1.7306 4.92267L1.73301 4.92258C1.73762 4.92258 1.74213 4.92363 1.74625 4.92565L2.98426 5.54069C3.63532 5.86417 4.28076 6.18495 4.92059 6.50299C5.12344 6.60391 5.2757 6.67083 5.37735 6.70375C5.90204 6.87449 6.42245 6.83143 6.93866 6.57457C8.06268 6.01528 9.1708 5.4649 10.263 4.9234C10.2688 4.92041 10.2747 4.92041 10.2805 4.9234C10.752 5.15966 11.2463 5.40522 11.7633 5.66009C11.9345 5.74438 12.0323 5.88328 11.9903 6.0763C11.9676 6.18022 11.9048 6.25785 11.8018 6.30923C10.2527 7.08165 8.55536 7.92613 6.70965 8.8427C6.53714 8.92832 6.4014 8.98277 6.30237 9.00605C6.04355 9.06672 5.79105 9.05143 5.54486 8.96015C5.51419 8.94884 5.3642 8.87653 5.09485 8.7432ZM6.89483 9.53774C6.44162 9.76466 5.96237 9.8089 5.45715 9.67044C5.32913 9.63531 5.18301 9.57662 5.01883 9.49435C3.92169 8.94501 2.83011 8.39954 1.74415 7.85791C1.7363 7.85407 1.72855 7.85407 1.72089 7.85791L0.823524 8.30639L0.202949 8.61643C-0.0663373 8.75112 -0.0683515 9.1216 0.201179 9.25555C1.86057 10.0816 3.53031 10.9161 5.21036 11.7589C5.38437 11.8462 5.5145 11.9045 5.60065 11.934C5.84103 12.0164 6.0914 12.0217 6.35174 11.9497C6.44009 11.9253 6.56772 11.8713 6.73456 11.7877C8.40945 10.9478 10.0843 10.1109 11.759 9.27712C11.9205 9.19686 12.021 9.0732 11.9963 8.88381C11.98 8.75866 11.8972 8.66408 11.784 8.60766C11.2992 8.36652 10.798 8.11628 10.2803 7.85691C10.277 7.8553 10.2737 7.85451 10.2704 7.85453C10.2672 7.85454 10.264 7.85533 10.2608 7.85691C8.82226 8.57445 7.70028 9.13473 6.89483 9.53774Z"
                    fill="#17213A" />
            </svg>

            <h6 class="text-14 lineheight-18 font-weight-700 color-b-blue ms-2 text-capitalize font-style-italic">
                {{ $result->project_name ?? '' }}</h6>
        </div>
    @endif
    <div class="d-block justify-content-between d-sm-flex">
        <div class="d-block order-responsive">
            <h6 class="text-14 lineheight-18 font-weight-700 color-b-blue  text-capitalize"><span
                    class=" icon-my_profile icon-14 me-2"></span>
                {{ trans('messages.view-event.Event_Owner') }}
                <span
                    class="color-light-grey-five text-decoration-underline text-14 lineheight-18 font-weight-400">{{ $result->owner_name ?? '' }}</span>
            </h6>
        </div>
        <div class="d-block">
            <h6 class="text-14 color-light-grey font-weight-400 lineheight-18">
                {{ date('l, d/m/Y', strtotime($result->due_date)) }}</h6>
            <h6 class="text-14 color-light-grey font-weight-400 lineheight-18">
                {{ date('H:i', strtotime($result->start_from)) }}
                - {{ date('H:i', strtotime($result->end_to)) }}</h6>
        </div>

    </div>
</div>
<div class="sidebar_one-content-card ">
    <div class="d-flex justify-content-between">
        <!--////////////////////////////use-select /////////////////////////// -->
        <div class="search-select action-search col-10 col-sm-6 col-md-6 col-lg-6 common-label-css">
            <x-forms.crm-single-select-with-image :fieldData="[
                'name' => 'action',
                'hasLabel' => true,
                'label' => trans('Action') . ':',
                'id' => 'action',
                'options' => [
                    'call' => [
                        'label' => trans('messages.add-events.Action_call'),
                        'type' => 'html',
                        'image' => 'dashboard-round_one green-color me-2',
                    ],
                    'view_meeting' => [
                        'label' => trans('messages.add-events.Action_View_Meetings'),
                        'type' => 'html',
                        'image' => 'dashboard-round_one blue-color me-2',
                    ],
                    'meeting' => [
                        'label' => trans('messages.add-events.Action_Meeting'),
                        'type' => 'html',
                        'image' => 'dashboard-round_one red-color me-2',
                    ],
                ],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('Action'),
                'attributes' => $request->type == 'view' ? ['disabled'] : [],
                'isRequired' => true,
                'onFilterPage' => true,
                'selected' => !empty($result->action) ? $result->action : [],
            ]" />
        </div>
        <!-- /////////////////////////////end-use-select////////////////////////// -->
        <div class="form-group crm-single-select-container position-relative mt-3">
            <div class="invalid-feedback fw-bold"></div>
        </div>
        @if ($result->owner_id == auth()->user()->id)
            <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                @if ($request->type == 'view')
                    <button type="button" class=" icon-edit text-18 b-color-transparent color-primary editEventBtn"
                        data-id="{{ !empty($result->id) ? $result->id : '' }}">
                    </button>
                    <button type="button"
                        class="icon-Delete  text-18 color-primary b-color-transparent deleteEventBtn color-primary"
                        data-id="{{ !empty($result->id) ? $result->id : '' }}"
                        data-name="{{ !empty($result->event_name) ? $result->event_name : '' }}">
                    </button>
                @endif
                @if ($request->type == 'edit')
                    <button type="button"
                        class="icon-cross text-18 color-b-blue opacity-8 closeEditViewButton b-color-transparent"
                        data-id="{{ !empty($result->id) ? $result->id : '' }}"
                        data-name="{{ !empty($result->event_name) ? $result->event_name : '' }}">
                    </button>
                @endif
            </div>

        @endif
    </div>
    <div class="row pt-15">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css common_css_two">
            <div class="form-group position-relative">
                <label for="event_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">
                    {{ trans('messages.add-events.Event_Name') }}
                    <span class="required">*</span></label>
                <input type="text"
                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                    name="event_name" id="event_name"
                    value="{{ !empty($result->event_name) ? $result->event_name : '' }}" placeholder=""
                    {{ $request->type == 'view' ? 'disabled' : '' }}>
                <div class="invalid-feedback fw-bold"></div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css common_css_two normal_textarea">
            <!-- <div class="col-md-12 common-label-css textarea_abc"> -->
            <x-forms.crm-textarea :fieldData="[
                'name' => 'event_description',
                'id' => 'event_description',
                'attributes' => [],
                'hasHelpText' => false,
                //'help' => 'Please enter your name',
                'isRequired' => true,
                'useCkEditor' => true,
                'attributes' => $request->type == 'view' ? ['disabled'] : [],
                'value' => !empty($result->event_description) ? $result->event_description : '',
            ]" />
        </div>


        @if (auth()->user()->role->name != 'customer')
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-3">
                <div class="event-checkbox d-flex align-items-center gap-2">
                    <span class="text-14 font-weight-700 lineheight-18 color-b-blue">
                        {{ trans('messages.add-events.Project_Base_Event') }}
                    </span>
                    <label class="switch">
                        <input type="checkbox" name="is_project_base_event" id="is_project_base_eventz" value="1" class="form-control"
                            {{ !empty($result->project_id) ? 'checked' : '' }}
                            {{ $request->type == 'view' ? 'disabled' : '' }}
                            {{ !empty($result->project_id) ? 'disabled' : '' }}
                            >
                        <span class="slider">

                        </span>
                    </label>
                </div>
                <!-- <input type="checkbox" name="is_project_base_event" value="1" class="form-control " {{ !empty($result->project_id) ? 'checked' : '' }}>Project Base Event -->
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css multiselect-select add-select project_base_event"
                style="{{ !empty($result->project_id) ? 'display:block;' : 'display:none' }};">
                <x-forms.crm-single-select :fieldData="[
                    'name' => 'project_id',
                    'hasLabel' => true,
                    'label' => trans('messages.add-events.Project_Name'),
                    'id' => 'project_id',
                    'class' => 'event_project_id',
                    'options' => $agentProjectsArray ?? [],
                    'attributes' => [],
                    'hasHelpText' => false,
                    'placeholder' => trans('messages.add-events.Project_Name'),
                    'isRequired' => false,
                    'attributes' => ($request->type == 'view' || $result->project_id)  ? ['disabled'] : [],
                    'selected' => !empty($result->project_id) ? $result->project_id : '',
                    'value' => !empty($result->project_id) ? $result->project_id : '',
                ]" />
            </div>
        @endif
        @include('modules.events.includes.add_prop_cust_agnt')
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add_event my_project_base_event">
            <x-forms.crm-single-select-with-image :fieldData="[
                'name' => 'priority',
                'hasLabel' => true,
                'label' => trans('messages.add-events.Priority'),
                'id' => 'priority',
                'options' => [
                    'low' => [
                        'label' => trans('messages.add-events.priority_low'),
                        'type' => 'html',
                        'image' => 'dashboard-round green-color me-2',
                    ],
                    'medium' => [
                        'label' => trans('messages.add-events.priority_medium'),
                        'type' => 'html',
                        'image' => 'dashboard-round green-color me-2',
                    ],
                    'high' => [
                        'label' => trans('messages.add-events.priority_high'),
                        'type' => 'html',
                        'image' => 'dashboard-round green-color me-2',
                    ],
                ],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.add-events.Priority'),
                'isRequired' => false,
                'attributes' => $request->type == 'view' ? ['disabled'] : [],
                'selected' => !empty($result->priority) ? $result->priority : [],
            ]" />
        </div>


        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add_event">
            <x-forms.crm-single-select :fieldData="[
                'name' => 'reminder',
                'hasLabel' => true,
                'label' => trans('messages.add-events.Add_Reminder'),
                'id' => 'reminder',
                'options' => [
                    '15' => trans('messages.add-events.Reminder_fifteen_min'),
                    '30' => trans('messages.add-events.Reminder_half_an_hour'),
                    '60' => trans('messages.add-events.Reminder_hour'),
                ],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.add-events.Add_Reminder'),
                'isRequired' => false,
                'attributes' => $request->type == 'view' ? ['disabled'] : [],
                'selected' => !empty($result->reminder) ? $result->reminder : '',
            ]" />
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add-event">
            <x-forms.crm-datepicker :fieldData="[
                'name' => 'due_date',
                'hasLabel' => true,
                'label' => trans('messages.add-events.Due_Date'),
                'inputId' => 'due_date',
                'attributes' => [],
                'hasHelpText' => false,
                'help' => 'Please enter your name',
                'isRequired' => true,
                'isInputMask' => true,
                'attributes' => $request->type == 'view' ? ['disabled'] : [],
                'startDate' => date('m-d-Y'),
                'value' => !empty($result->due_date) ? date('m-d-Y', strtotime($result->due_date)) : '',
            ]" />
        </div>

        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add_event">
            <x-forms.crm-single-select :fieldData="[
                'name' => 'start_from',
                'hasLabel' => true,
                'label' => trans('messages.add-events.Start_From'),
                'id' => 'start_from',
                'options' => $timeArray ?? [],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.add-events.Start_From'),
                'isRequired' => true,
                'attributes' => $request->type == 'view' ? ['disabled'] : [],
                'selected' => !empty($result->start_from) ? $result->start_from : '',
            ]" />
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add_event">
            <x-forms.crm-single-select :fieldData="[
                'name' => 'end_to',
                'hasLabel' => true,
                'label' => trans('messages.add-events.End_To'),
                'id' => 'end_to',
                'options' => $timeArray ?? [],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.add-events.End_To'),
                'isRequired' => true,
                'attributes' => $request->type == 'view' ? ['disabled'] : [],
                'selected' => !empty($result->end_to) ? $result->end_to : '',
            ]" />
        </div>
        <div class="col-12 col-sm-12 col-md-12  col-lg-12 common-label-css common-attachment">
            <div class="form-group mt-3 position-relative ">
                <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">
                    {{ trans('messages.add-events.Add_Attachments') }}
                </label>
                <div class="form-group_file gap-3">
                    @if ($request->type == 'view')
                    <input type="file" name="files[]" class="input-file_choose" disabled>
                    @endif
                    @if ($request->type == 'edit')
                    <input type="file" name="files[]" class="input-file_choose eventAttachmentChooseBtn" >
                    @endif
                    <div
                        class="attachment_scroll d-flex align-tems-center gap-3 flex-wrap w-100 editEventAttachmentData">
                        @if (!empty($eventAttachemntData) && $eventAttachemntData->isNotEmpty())
                            @include('modules.events.includes.event_attachments_data')
                        @endif

                    </div>
                    {{-- <div class="attachment_scroll d-flex align-tems-center gap-3 flex-wrap w-100 propertyDocumentsData"> --}}

                    {{-- </div> --}}
                    <div class="invalid-feedback fw-bold"></div>
                </div>
            </div>
        </div>


    </div>

    <!-- /////////////////////////modal-button/////////////////////////// -->
    <!-- <div class="row">
        <div class="col-lg-12 common-label-css mt-2 mt-sm-3">
            <label>Add Attachments</label>
            <button class="input-file_choose" data-toggle="modal" data-target="#exampleModal"> <span>Choose
                    File</span>
            </button>
        </div>
    </div> -->
    <!-- ///////////////////////////////end-modal-button//////////////////////// -->


    <!-- ////////////////////////////////////svae-button//////////////////////////////////// -->
    @if ($request->type == 'edit')
        <div class="row">
            <div class="col-lg-12">
                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                    <button type="button"
                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white updateEventBtn"
                        data-id="{{ !empty($result->id) ? $result->id : '' }}">
                        {{ trans('messages.view-event.save') }}
                    </button>
                </div>
            </div>
        </div>
    @endif
    <!-- //////////////////////////////////////////end-save-button///////////////////////////////// -->

    <!-- //////////////////////////////////////////done-button/////////////////////////////////////// -->
    @if ($request->type == 'view')
        <button type="button"
            class="mt-3 border-button text-align-start d-flex align-items-center b-color-transparent h-42 border-r-8 border-primary_one text-14 font-weight-400 lineheight-18 text-capitalize w100 dashboard_sidebar-button justify-content-center color-primary"
            onclick="closeSidebar()"><span class=" me-2 icon-done"></span>
            {{ trans('messages.view-event.Done') }}
        </button>
    @endif


</div>
