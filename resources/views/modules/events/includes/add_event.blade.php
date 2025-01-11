<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
        <div class="modal-content border-r-8 border-0 b-color-white ">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-b-blue w-100"
                    id="addEventModalLabel">{{ trans('messages.add-events.Add_New_Events') }}
                </h5>
                <button type="button" class="close b-color-transparent cursor-pointer end-0" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">
                        <i class=" icon-cross text-18 color-b-blue opacity-8"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body modal-body modal-header_file">
                <form action="" method="post" id="addEventForm" enctype="multipart/form-data">
                    <div class="row addEventForm">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css common_css_two">
                            <div class="form-group position-relative">
                                <label for="event_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                    {{ trans('messages.add-events.Event_Name') . ':' }} <span
                                        class="required">*</span></label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="event_name" id="event_name" value="" placeholder="">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>
                        <div class="col-md-12 common-label-css textarea_abc">
                            <x-forms.crm-textarea :fieldData="[
                                'name' => 'event_description',
                                'id' => 'event_description',
                                'attributes' => [],
                                'hasHelpText' => false,
                                //'help' => 'Please enter your name',
                                'isRequired' => true,
                                'useCkEditor' => true,
                                'value' => !empty($event->event_description) ? $event->event_description : '',
                            ]" />
                        </div>

                        @if (auth()->user()->role->name != 'customer')
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                <div class="event-checkbox d-flex align-items-center gap-2">
                                    <span class="text-14 font-weight-700 lineheight-18 color-b-blue">
                                        {{ trans('messages.add-events.Project_Base_Event') }}
                                    </span>
                                    <label class="switch">
                                        <input type="checkbox" name="is_project_base_event" value="1"
                                            class="form-control"
                                            @if (!empty($slug)) checked disabled @endif>
                                        <span class="slider">

                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add_event "
                                @if (!empty($slug)) style="display:show;" @endif style="display:none;">
                                <x-forms.crm-single-select :fieldData="[
                                    'name' => 'project_id',
                                    'hasLabel' => true,
                                    'label' => trans('messages.add-events.Project_Name') . ':',
                                    'id' => 'project_id',
                                    'options' => !empty($slug) ? $projectName : $agentProjectsArray,
                                    'attributes' => !empty($slug) ? ['disabled'] : [],
                                    'hasHelpText' => false,
                                    'placeholder' => trans('messages.add-events.Project_Name'),
                                    'isRequired' => false,
                                    'selected' => !empty($slug) ? $project->id : '',
                                    'value' => !empty($project->id) ? $project->id : '',
                                ]" />
                            </div>
                            @include('modules.events.includes.add_prop_cust_agnt')
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 common-label-css add_event">
                            <x-forms.crm-single-select-with-image :fieldData="[
                                'name' => 'priority',
                                'hasLabel' => true,
                                'label' => trans('messages.add-events.Priority') . ':',
                                'id' => 'priority',
                                'options' => [
                                    'low' => [
                                        'label' => trans('messages.add-events.priority_low'),
                                        'type' => 'html',
                                        'image' => ' icon-p_level_one  me-2',
                                    ],
                                    'medium' => [
                                        'label' => trans('messages.add-events.priority_medium'),
                                        'type' => 'html',
                                        'image' => ' icon-p_level_two me-2',
                                    ],
                                    'high' => [
                                        'label' => trans('messages.add-events.priority_high'),
                                        'type' => 'html',
                                        'image' => ' icon-P_level_three me-2',
                                    ],
                                ],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('messages.add-events.Priority') . ':',
                                'isRequired' => false,
                                'selected' => !empty($result->priority) ? $result->priority : [],
                            ]" />
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 common-label-css add_event">
                            <x-forms.crm-single-select-with-image :fieldData="[
                                'name' => 'action',
                                'hasLabel' => true,
                                'label' => trans('messages.add-events.Action') . ':',
                                'id' => 'action',
                                'options' => [
                                    'call' => [
                                        'label' => trans('messages.add-events.Action_call'),
                                        'type' => 'html',
                                        'image' => 'dashboard-round green-color me-2',
                                    ],
                                    'view_meeting' => [
                                        'label' => trans('messages.add-events.Action_View_Meetings'),
                                        'type' => 'html',
                                        'image' => 'dashboard-round blue-color me-2',
                                    ],
                                    'meeting' => [
                                        'label' => trans('messages.add-events.Action_Meeting'),
                                        'type' => 'html',
                                        'image' => 'dashboard-round red-color me-2',
                                    ],
                                ],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('messages.add-events.Action'),
                                'isRequired' => true,
                                'selected' => !empty($result->action) ? $result->action : [],
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 common-label-css add_event">
                            <x-forms.crm-single-select :fieldData="[
                                'name' => 'reminder',
                                'hasLabel' => true,
                                'label' => trans('messages.add-events.Add_Reminder') . ':',
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
                                'selected' => !empty($result->reminder) ? $result->reminder : '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 common-label-css add-event">
                            <x-forms.crm-datepicker :fieldData="[
                                'name' => 'due_date',
                                'hasLabel' => true,
                                'label' => trans('messages.add-events.Due_Date') . ':',
                                'inputId' => 'due_date',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'isInputMask' => true,
                                'startDate' => date('m-d-Y'),
                                'value' => !empty($user->due_date) ? $user->due_date : '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 common-label-css add_event">
                            <x-forms.crm-single-select :fieldData="[
                                'name' => 'start_from',
                                'hasLabel' => true,
                                'label' => trans('messages.add-events.Start_From') . ':',
                                'id' => 'start_from',
                                'options' => $timeArray ?? [],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('messages.add-events.Start_From'),
                                'isRequired' => true,
                                'selected' => !empty($result->start_from) ? $result->start_from : '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 common-label-css add_event">
                            <x-forms.crm-single-select :fieldData="[
                                'name' => 'end_to',
                                'hasLabel' => true,
                                'label' => trans('messages.add-events.End_To') . ':',
                                'id' => 'end_to',
                                'options' => $timeArray ?? [],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('messages.add-events.End_To'),
                                'isRequired' => true,
                                'selected' => !empty($result->end_to) ? $result->end_to : '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-12  col-lg-12 common-label-css common-attachment">
                            <div class="form-group mt-3 position-relative ">
                                <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                    {{ trans('messages.add-events.Add_Attachments') . ':' }}
                                </label>
                                <div class="form-group_file gap-3">
                                    <input type="file" name="files[]"
                                        class="input-file_choose eventAttachmentChooseBtn">
                                    <div
                                        class="attachment_scroll d-flex align-tems-center gap-3 flex-wrap w-100 eventAttachmentData">


                                    </div>

                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                    <button type="button"
                        class="w100 Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white saveEventBtn">
                        {{ trans('messages.add-events.save') }}
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Event Attachment Modal -->
{{-- @include('modules.files.includes.upload_document_modal') --}}
@include('modules.files.includes.upload_document_modal', [
    'uploadDcoumentsModal' => 'uploadDcoumentsModalSubmitBtn',
])
<script>
    var submitBtnText = "{{ trans('messages.uploads.Upload') }}";
    var importBtnText = "{{ trans('messages.uploads.import') }}";
    var eventAttachmentUrl = "{{ route(routeNamePrefix() . 'events.addAttachments') }}";
</script>
<script>
    $(document).on('click', '#addEventModal input[name=is_project_base_event]', function() {
        if ($(this).is(':checked')) {
            console.log('check');
            $('#addEventModal').find('select[name=project_id]').parents('.common-label-css').show();
        } else {
            let url = "{{ route(routeNamePrefix() . 'events.associationDataLoad') }}";;

            const that = this;
            const attributes = {
                hasButton: false,
                handleSuccess: function() {
                    console.log(datas);
                    $('.addEventForm').find('.agent-propety-data').remove();
                    $('.addEventForm').append(datas['data']);
                    // $('.eventSidebarModalTitle').text('Edit Event Details');
                }
            };
            const ajaxOptions = {
                url: url,
                method: 'get',
                data: {}
            };
            makeAjaxRequest(ajaxOptions, attributes);
            // });

            $('#addEventModal').find('select[name=project_id]').parents('.common-label-css').hide();
        }
    });
    $(document).on('click', '.eventAttachmentChooseBtn', function(event) {
        event.preventDefault();
        $('#uploadDocumentModal').attr('data-current-action', 'event');
        $(".data_file_id").addClass('d-none');
        $(".eventsfolders").prop('disabled', false);
        $('#uploadDocumentModal').find('.justify-content-end').addClass('justify-content-between');
        $('#uploadDocumentModal').find('.justify-content-end').removeClass('justify-content-end');
        $(".custom_width-modal-folder").addClass("d-none");
        $(".uploadDcoumentsModalSubmitBtn").show();
        $('.form_file').hide();
        $('.create_new_folder_btn').show();
        $('#uploadDocumentModal').modal('show');

    });

    $(document).on('click', '.removeEventAttachmentBtn', function() {
        $(this).parents('.attachmentRow').remove();
    });
</script>
