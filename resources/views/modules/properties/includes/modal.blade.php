<!-- Collaboration -->
<div class="modal fade" id="property_collaboration_all" tabindex="-1" role="dialog"
            aria-labelledby="property_collaboration_allLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_three " role="document">
        <div class="modal-content modal-content-file">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="property_collaboration_allLabel">Property Collaboration 123</h5>
                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                </button>
            </div>
            <div class="modal-body modal-header_file">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details mb-2 mt-0">
                        <div class="row"></div>
                    </div>
                    <div
                        class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                        <div class="form-group position-relative">
                            <button type="button"
                                class="collaborationNow Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Open
                                Collaboration</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="book_appointment" tabindex="-1" role="dialog" aria-labelledby="book_appointmentLabel"
            aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content modal-content-file">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="book_appointmentLabel">Book Appointment</h5>
                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                </button>
            </div>
            <div class="modal-body modal-header_file">
                <div class="row">

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details m-0">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="d-flex gap-12">
                                    <img src="http://127.0.0.1:8000/img/default-user.jpg" width="40"
                                        height="40" alt="image" class="border-r-4" id="agentImage">


                                    <div class="">
                                        <h6 class="text-14 font-weight-700 color-primary">Name:</h6>
                                        <h6 class="text-14 font-weight-400 color-b-blue pt-1" id="agentName"></h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="modal-details-c">
                                    <h6 class="text-14 font-weight-700 color-primary">Mobile Number:</h6>
                                    <h6 class="text-14 font-weight-400 color-b-blue pt-1" id="agentPhone"></h6>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="modal-details-c">
                                    <h6 class="text-14 font-weight-700 color-primary">Email:</h6>
                                    <h6 class="text-14 font-weight-400 color-b-blue pt-1" id="agentEmail"></h6>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="modal-details-c">
                                    <h6 class="text-14 font-weight-700 color-primary">City</h6>
                                    <h6 class="text-14 font-weight-400 color-b-blue pt-1" id="agentCity"></h6>
                                </div>
                            </div>
                            <input type="hidden" name="agentid" id="agentid" value="" />
                            <div id="propertyDetails" data-propertyDetails="" data-customerId="{{ auth()->user()->id }}" data-customer="{{ auth()->user()->name }}"></div>
                        </div>

                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details mb-0 mt-20">
                        <div class="  modal_margin-detail">
                            <div class="cat_box-small-i">
                                <h6 class="text-16 font-weight-700 color-primary text-center">Property Details</h6>
                            </div>
                            <div class="d-flex align-items-start justify-content-between pt-20">
                                <img src="http://127.0.0.1:8000/img/default-user.jpg" width="60" height="60" alt="image" class="border-r-8 propertyImage">
                                <button type="button"
                                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white viewProperty" data-reference="">View
                                    Property</button>
                            </div>
                            <div class="row text-start">
                                <div class="col-lg-12 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Property Name</p>
                                        <p class="text-14 color-b-blue font-weight-400 propertyName"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Property ID:</p>
                                        <p class="text-14 color-b-blue font-weight-400 propertyId"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Property Listed As:</p>
                                        <p class="text-14 color-b-blue font-weight-400 propertyListed"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Property Price:</p>
                                        <p class="text-14 color-b-blue font-weight-400 propertyprice"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Property Type:</p>
                                        <p class="text-14 color-b-blue font-weight-400 propertyType"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Property Subtype:</p>
                                        <p class="text-14 color-b-blue font-weight-400 propertySubtype"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Total Size:</p>
                                        <p class="text-14 color-b-blue font-weight-400 propertySize"> </p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Bedroom:</p>
                                        <p class="text-14 color-b-blue font-weight-400 propertybedroom"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Bathroom:</p>
                                        <p class="text-14 color-b-blue font-weight-400 propertybathroom"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Property Status/Completion:
                                        </p>
                                        <p class="text-14 color-b-blue font-weight-400 propertyStatus"> </p>
                                    </div>
                                </div>
                                <div class="col-lg-12 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Commission:</p>
                                        <p class="text-14 color-b-blue font-weight-400 propertycommission"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Listing Agent(%):</p>
                                        <p class="text-14 color-b-blue font-weight-400  propertylist_agent_per"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Listing Agent(€):</p>
                                        <p class="text-14 color-b-blue font-weight-400 propertylist_agent_com"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Selling Agent(%):</p>
                                        <p class="text-14 color-b-blue font-weight-400 propertysell_agent_per"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Selling Agent(€):</p>
                                        <p class="text-14 color-b-blue font-weight-400 propertysell_agent_com"></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                </div>
                                <div class="col-lg-12 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Address:</p>
                                        <p class="text-14 color-b-blue font-weight-400 propertyaddress"></p>
                                    </div>
                                </div>
                                <div class="col-lg-12 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Description:</p>
                                        <p class="text-14 color-b-blue font-weight-400 propertydescription"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 common-label-css mt-2 p-0">
                        <x-forms.crm-textarea :fieldData="[
                            'name' => 'propertydescription',
                            'hasLabel' => false,
                            'label' => trans('messages.properties.Description'),
                            'id' => 'propertydescription',
                            'attributes' => ['disabled' => 'disabled'],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'useCkEditor' => true,
                            'value' => $property->description ?? '',
                        ]" />
                    </div>
                    <div
                        class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css multiselect-select add-select agent-propety-data">
                        <x-forms.crm-multi-select-with-image :fieldData="[
                            'name' => 'customer_id',
                            'hasLabel' => true,
                            'label' => trans('messages.add-events.Customer_Association'),
                            'class' => 'select-icon',
                            'id' => 'customer_id',

                            'hasHelpText' => false,
                            'placeholder' => trans('messages.add-events.Customer_Association'),
                            'isRequired' => false,
                            'attributes' =>
                                !empty($request->type) && $request->type == 'view' ? ['disabled'] : [],

                        ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6  col-lg-6 common-label-css common-attachment">
                        <div class="form-group mt-3 position-relative ">
                            <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                {{ trans('messages.add-events.Add_Attachments') . ':' }}
                                <span class="required">*</span>
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
                            'value' => date('m-d-Y'),

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
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                        <div class="form-group position-relative">
                            <button type="button" onclick="saveEvent()"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Send Message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
        .select_commission_main {
            background-color: #3831921A;
        }

        .select_commission_logo {
            height: 30px;
            border-right: 2px solid var(--b_primary);
        }

        .select_commission_logo img {
            height: 100%;
            object-fit: contain;
        }

        .select_commission_breadcrumb {
            background-color: #e3e2f478;
        }

        .signature_button {
            color: #17213A4D;
            border: 1px solid #17213A4D;
        }

        .select_commission_main span {
            display: block;
            height: 6px;
            width: 100%;
            background-color: #383192;
            border-radius: 0px 0px 30px 30px;
        }
</style>
<div class="modal fade" id="agreement" tabindex="-1" role="dialog" aria-labelledby="agreementLabel"
        aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_one" role="document">
        <div class="modal-content modal-content-file">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="dataFilterModalLabel"></h5>
                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                </button>
            </div>
            <div class="modal-body modal-header_file">
                <div class="modal_body_text">
                    <div class="modal-body_card justify-content-between">
                        <div class="modal-body-card-left-progress d-flex align-items-center gap-4">
                            <div class="min-vh-100 bg-white">
                                <div class="select_commission">
                                    <div class="select_commission_main h-85">
                                        <span></span>
                                        <div class="row d-flex justify-content-between h-100 align-items-center">
                                            <div
                                                class="col-md-6 select_commission_logo h-85 d-flex align-items-center ps-4">
                                                <img src="{{ asset('img/login-logo.png') }}"alt="image"
                                                    class="">
                                            </div>
                                            <div class="col-md-6 pe-4">
                                                <h5 class="modal-title text-end text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                    id="dataFilterModalLabel">Percentage Split Commission Agreement
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="select_commission_scroll px-4">
                                            <div class="row">
                                                <div class="col-6 mt-3 pt-2 d-flex">
                                                    <div class="company-image">
                                                        <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                            alt="Default Image" class="pdfagentImage border-r-12" width="80"
                                                            height="80">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ps-2">
                                                        <p
                                                            class="pdfagentName text-20 font-weight-700 lineheight-18" id="pdfagentName">

                                                        </p>
                                                        <p
                                                        class="text-16 font-weight-400 lineheight-18 pt-2">
                                                        Agent
                                                    </p>
                                                        <p
                                                            class="text-14 color-primary font-weight-400 lineheight-18 pt-2">
                                                            Realinmo
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-6 mt-3 pt-2 d-flex justify-content-end ">
                                                    <div class="d-flex flex-column justify-content-center pe-2">
                                                        <p
                                                            class="pdfsecondayagentName text-20 font-weight-700 lineheight-18" id="pdfsecondayagentName">

                                                        </p>
                                                        <p
                                                        class="text-16 font-weight-400 lineheight-18 pt-2">
                                                        Agent
                                                    </p>
                                                        <p
                                                            class="text-14 color-primary font-weight-400 lineheight-18 pt-2">
                                                            Realinmo
                                                        </p>
                                                    </div>
                                                    <div class="company-image">
                                                        <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                            alt="Default Image" class="pdfsecondayagentImage border-r-12" width="80"
                                                            height="80" id="pdfsecondayagentImage">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-3 select_commission_breadcrumb d-flex">
                                                    <h5 class="py-2 modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                        id="dataFilterModalLabel">Primary Agent’s Details</h5>
                                                </div>
                                                <div class="col-12 mt-3 pt-2 d-flex">
                                                    <div class="company-image">
                                                        <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                            alt="Default Image" class=" pdfagentImage border-r-12" width="80"
                                                            height="80">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ps-2">
                                                        <p
                                                            class="pdfagentName text-20 color-primary font-weight-700 lineheight-18">

                                                        </p>
                                                        <p
                                                            class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            Agent
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Email
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfagentEmail">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Mobile Number:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfagentPhone">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Date of Birth:
                                                        </p>
                                                        <p
                                                            class="pdfagentDOB text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            21/07/1994</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Gender
                                                        </p>
                                                        <p
                                                            class="pdfagentGender text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            Male</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Languages Spoken:
                                                        </p>
                                                        <p
                                                            class="pdfagentLanguage text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            Spanish</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Qualification Type:
                                                        </p>
                                                        <p
                                                            class="pdfagentQualification text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            Engineer</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Professional Certifications:
                                                        </p>
                                                        <p
                                                            class="pdfagentGovernmentCertification text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            Cer_henry_realestate
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Government ID:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            Upload_Goverment_Approved_ID.Pdf</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Address
                                                        </p>
                                                        <p
                                                            class="pdfagentAddress text-14 color-b-blue font-weight-400 lineheight-18 pt-2">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            A Message to Collaborator Agents:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            Lorem ipsum dolor sit amet consectetur. Sed malesuada
                                                            sem ullamcorper tincidunt
                                                            netus dignissim consequat aliquet libero. Diam a libero
                                                            dui at vitae. At
                                                            pulvinar eros semper lectus vestibulum. Lacus molestie
                                                            phasellus urna ut id.
                                                            Lorem ipsum dolor sit amet consectetur. Sed malesuada
                                                            sem ullamcorper tincidunt
                                                            netus dignissim consequat aliquet libero. Diam a libero
                                                            dui at vitae. At
                                                            pulvinar eros semper lectus vestibulum. Lacus molestie
                                                            phasellus urna ut id.
                                                            Lorem ipsum dolor sit amet consectetur. Sed malesuada
                                                            sem ullamcorper tincidunt
                                                            netus dignissim consequat aliquet libero. Diam a libero
                                                            dui at vitae. At
                                                            pulvinar eros semper lectus vestibulum. Lacus molestie
                                                            phasellus urna ut id.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-3 select_commission_breadcrumb d-flex">
                                                    <h5 class="py-2 modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                        id="dataFilterModalLabel">Primary Agent’s Company Details
                                                    </h5>
                                                </div>

                                                <div class="col-12 mt-3 pt-2 d-flex">
                                                    <div class="company-image">
                                                        <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                            alt="Default Image" class="pdfcompanyImage border-r-12"
                                                            width="80" height="80">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ps-2">
                                                        <p
                                                            class="text-20 color-primary font-weight-700 lineheight-18">
                                                            Realinnmo
                                                        </p>
                                                        <p
                                                            class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            Agent
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Email
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfcompanyEmail">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Company Mobile Number:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfcompanyPhone">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Tax Number:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfcompanyTax">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Company Website:
                                                        </p>
                                                        <p
                                                            class="pdfcompanyWebsite text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Primary Service Area:
                                                        </p>
                                                        <p
                                                            class="pdfcompanyservicearea text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Professional Title/Role:
                                                        </p>
                                                        <p
                                                            class="pdfcompanyProfessional text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Number of Current Customers:
                                                        </p>
                                                        <p
                                                            class="pdfcompanycustomer text-14 color-b-blue font-weight-400 lineheight-18 pt-2">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Numbers of sub-agents:
                                                        </p>
                                                        <p
                                                            class="pdfcompanynumagent text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Property Types Specialized In:
                                                        </p>
                                                        <p
                                                            class="pdfcompanypropetytypes text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Properties in Portfolio:
                                                        </p>
                                                        <p
                                                            class="pdfcompanypropertyportfolio text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                             </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Years of Experience in Real Estate:
                                                        </p>
                                                        <p
                                                            class="pdfcompanyyearofexp text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Average Number of Properties Managed/Listed:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            3000+ Properties
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-3 select_commission_breadcrumb d-flex">
                                                    <h5 class="py-2 modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                        id="dataFilterModalLabel">Secondary Agent’s Details</h5>
                                                </div>
                                                <div class="col-12 mt-3 pt-2 d-flex">
                                                    <div class="company-image">
                                                        <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                            alt="Default Image" class="pdfsecondayagentImage border-r-12"
                                                            width="80" height="80">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ps-2">
                                                        <p
                                                            class="pdfsecondayagentName text-20 color-primary font-weight-700 lineheight-18">

                                                        </p>
                                                        <p
                                                            class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            Agent
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Email
                                                        </p>
                                                        <p
                                                            class="pdfsecondayagentEmail text-14 color-b-blue font-weight-400 lineheight-18 pt-2">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Company Mobile Number:
                                                        </p>
                                                        <p
                                                            class="pdfsecondayagentPhone text-14 color-b-blue font-weight-400 lineheight-18 pt-2">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Date of Birth:
                                                        </p>
                                                        <p
                                                            class="pdfsecondayagentDOB text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Gender:
                                                        </p>
                                                        <p
                                                            class="pdfsecondayagentGender text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Languages Spoken:
                                                        </p>
                                                        <p
                                                            class="pdfsecondayagentLanguage text-14 color-b-blue font-weight-400 lineheight-18 pt-2">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Qualification Type:
                                                        </p>
                                                        <p
                                                            class="pdfsecondayagentQualification text-14 color-b-blue font-weight-400 lineheight-18 pt-2">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Professional Certifications:
                                                        </p>
                                                        <p
                                                            class="pdfsecondayagentGovernmentCertification text-14 color-b-blue font-weight-400 lineheight-18 pt-2">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Government ID:
                                                        </p>
                                                        <p
                                                            class="pdfsecondayagentGovernmentCertification text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Property Types Specialized In:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            Apartment, Apartment Duplex</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Address:
                                                        </p>
                                                        <p
                                                            class="pdfsecondayagentAddress text-14 color-b-blue font-weight-400 lineheight-18 pt-2">

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-3 select_commission_breadcrumb d-flex">
                                                    <h5 class="py-2 modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                        id="dataFilterModalLabel">Secondary Agent’s Company Details
                                                    </h5>
                                                </div>

                                                <div class="col-12 mt-3 pt-2 d-flex">
                                                    <div class="company-image">
                                                        <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                            alt="Default Image" class="pdfsecondarycompanyImage border-r-12"
                                                            width="80" height="80">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ps-2">
                                                        <p
                                                            class="text-20 color-primary font-weight-700 lineheight-18">
                                                            Realinnmo
                                                        </p>
                                                        <p
                                                            class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            Agent
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Email
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfsecondarycompanyEmail">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Company Mobile Number:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfsecondarycompanyPhone">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Tax Number:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 pdfsecondarycompanyTax">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Company Website:
                                                        </p>
                                                        <p
                                                            class="pdfsecondarycompanyWebsite text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Primary Service Area:
                                                        </p>
                                                        <p
                                                            class="pdfsecondarycompanyservicearea text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Professional Title/Role:
                                                        </p>
                                                        <p
                                                            class="pdfsecondarycompanyProfessional text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Number of Current Customers:
                                                        </p>
                                                        <p
                                                            class="pdfsecondarycompanycustomer text-14 color-b-blue font-weight-400 lineheight-18 pt-2">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Numbers of sub-agents:
                                                        </p>
                                                        <p
                                                            class="pdfsecondarycompanynumagent text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Property Types Specialized In:
                                                        </p>
                                                        <p
                                                            class="pdfsecondarycompanypropetytypes text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Properties in Portfolio:
                                                        </p>
                                                        <p
                                                            class="pdfsecondarycompanypropertyportfolio text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                             </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Years of Experience in Real Estate:
                                                        </p>
                                                        <p
                                                            class="pdfsecondarycompanyyearofexp text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Average Number of Properties Managed/Listed:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                                            3000+ Properties
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="row">
                                                <div class="col-12 mt-3 select_commission_breadcrumb d-flex">
                                                    <h5 class="py-2 modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                        id="dataFilterModalLabel">Property Details</h5>
                                                </div>
                                                <div class="col-12 mt-3 pt-2 d-flex">
                                                    <div class="company-image">
                                                        <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                            alt="Default Image" class="border-r-12 propertyImage"
                                                            width="80" height="80">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center ps-2">
                                                        <p
                                                            class="text-20 color-primary font-weight-700 lineheight-18 propertyName">

                                                        </p>
                                                        <p
                                                            class="text-16 color-b-blue font-weight-400 lineheight-18 pt-2 propertyType">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Property Listed As:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertyListed">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Property Price:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertyprice">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Property Type:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2        propertyType">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Property Subtype:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertySubtype">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Total Size:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertySize">
                                                            </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Bedroom:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertybedroom">
                                                            3</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Bathroom:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertybathroom">
                                                            3
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Property Status/Completion:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertyStatus">
                                                            Completed Construction </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Commission:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertycommission">
                                                            1%
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Listing Agent:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertylist_agent_per">
                                                            50%
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Listing Agent:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertylist_agent_com">
                                                            Є2,290.00
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2"></div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Selling Agent:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertysell_agent_per">
                                                            50%
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Selling Agent:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertysell_agent_com">
                                                            Є2,290.00
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Address:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertyaddress">
                                                            C09t5, Santibáñez De Vidriales, Madrid, Málaga, Spain,
                                                            49610
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Description:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertydescription">
                                                            This 3-bed with a loft, 2-bath home in the gated
                                                            community of The Hideout has it
                                                            all. From the open floor plan to the abundance of light
                                                            from the windows, this home
                                                            is perfect for entertaining. The living room and dining
                                                            room have vaulted ceilings
                                                            and a beautiful fireplace. You will love spending time
                                                            on the deck taking in the
                                                            beautiful views. In the kitchen, you'll find stainless
                                                            steel appliances and a tile
                                                            backsplash, as well as a breakfast bar.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-3 select_commission_breadcrumb d-flex">
                                                    <h5 class="py-2 modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                        id="dataFilterModalLabel">Proposed commission terms</h5>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Templet Type:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 commisionType">
                                                            Percentage Split
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Percentage:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 commisionPer">
                                                            5%
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Commission:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 commissionTotal">
                                                            €22,900.00</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Agreement Start Date:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 agreementStartdate">
                                                            30/07/2024</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Agreement End Date:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 agreementEnddate">
                                                            15/08/2024</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3 pt-2 pb-4">
                                                    <div>
                                                        <p
                                                            class="text-14 color-primary font-weight-700 lineheight-18">
                                                            Additional Terms/Notes:
                                                        </p>
                                                        <p
                                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 additionalNote">
                                                            Lorem ipsum dolor sit amet consectetur. Quis proin
                                                            egestas adipiscing nisi maecenas
                                                            fusce malesuada urna. Aenean nibh dolor ac mattis ut
                                                            lectus. Pharetra luctus
                                                            scelerisque viverra egestas fermentum fringilla id.
                                                            Massa ornare sociis faucibus
                                                            tellus ut iaculis scelerisque ultricies. Lorem ipsum
                                                            dolor sit amet consectetur.
                                                            Quis proin egestas adipiscing nisi maecenas fusce
                                                            malesuada urna. Aenean nibh dolor
                                                            ac mattis ut lectus. Pharetra luctus scelerisque viverra
                                                            egestas fermentum fringilla
                                                            id. Massa ornare sociis faucibus tellus ut iaculis
                                                            scelerisque ultricies.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row border-top primarySection" style="display: none;">
                                                <div class="col-12 mt-3 ">
                                                    <h5 class="pt-1 text-end text-16 font-weight-700 lineheight-22 color-primary w-100 PrimaryAgentNameSignature"
                                                        id="dataFilterModalLabelPrimary"></h5>
                                                </div>
                                            </div>
                                            <div class="text-end pt-2 primarySection" style="display: none;">
                                                <div  id="mySavedSignaturePrimary"></div>
                                                <button type="button" id="addYourSignatureprimary"
                                                    class="w-auto border-r-8 text-16 font-weight-400 p-4 bg-white signature_button" onclick="uploadSignature()">Add Your Signature</button>
                                            </div>
                                            <div class="row border-top ">
                                                <div class="col-12 mt-3 ">
                                                    <h5 class="pt-1 text-end text-16 font-weight-700 lineheight-22 color-primary w-100 secondaryAgentNameSignature"
                                                        id="dataFilterModalLabel"></h5>
                                                </div>
                                            </div>

                                            <div class="text-end pt-2">
                                                <div  id="mySavedSignature"></div>
                                                <button type="button" id="addYourSignature"
                                                    class="secondarySection w-auto border-r-8 text-16 font-weight-400 p-4 bg-white signature_button" onclick="uploadSignature()">Add Your Signature</button>
                                            </div>

                                            <div class="text-end pt-4">
                                                <button type="button" onclick="generatePdf()"
                                                    class="w-auto border-r-8 b-color-Gradient color-white text-16 font-weight-400 line-height-24 small-button gardient-button">
                                                    Send Agreement
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="signature" tabindex="-1" role="dialog" aria-labelledby="signatureLabel"
        aria-hidden="true">
    <div class="modal-dialog modal-width-change_five modal-dialog-centered" role="document">
        <div class="modal-content modal-content-file">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="dataFilterModalLabel">Select Your Signature</h5>
                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                </button>
            </div>
            <div class="modal-body modal-header_file">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="sign_img">
                            <div class="d-flex gap-2">
                                <label class="customcb ms-2">
                                    <input type="checkbox" name="mysigncheck"
                                        value="1" >
                                    <span class="checkmark checkbox_sign"></span>
                                </label>
                                <img src="/img/sign.png" alt="" id="mysign">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group position-relative">
                            <button type="button"
                                class="border-button small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#newsignature">Add New Signature</button>
                        </div>
                    </div>
                    <div
                        class="col-6 col-sm-6 col-md-6 col-lg-6 common-label-css d-flex justify-content-end align-items-end">
                        <div class="form-group position-relative">
                            <button type="button" onclick="addSelectedSign()"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                                >Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="newsignature" tabindex="-1" role="dialog" aria-labelledby="newsignatureLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_four" role="document">
        <div class="modal-content modal-content-file">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="dataFilterModalLabel">Draw Digital Signature</h5>
                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                </button>
            </div>
            <div class="modal-body modal-header_file">
                <div class="row">
                    <div class="col-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 p-0" style="width: 100%;">
                                    <canvas class="border sign_degital" id="efb-canvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-6 col-sm-6 col-md-6 col-lg-6 common-label-css d-flex justify-content-start align-items-end">
                        <div class="form-group position-relative">
                            <button type="button" id="clear"
                                class="border-button small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center">Clear</button>
                        </div>
                    </div>
                    <div
                        class="col-6 col-sm-6 col-md-6 col-lg-6 common-label-css d-flex justify-content-end align-items-end">
                        <div class="form-group position-relative">
                            <button type="button" onclick="savesignature()"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                                >Add Signature</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="selectcommission" tabindex="-1" role="dialog"
        aria-labelledby="selectcommissionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_three justify-content-center"
        role="document">
        <div class="modal-content modal-content-file">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="dataFilterModalLabel">Select Commission Template</h5>
                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                </button>
            </div>
            <div class="modal-body modal-header_file">
                <div class="row selectcommission_row border-primary rounded">
                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                        <div>
                            <p class="text-14 color-primary font-weight-700 lineheight-18">
                                Property Price:
                            </p>
                            <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertyprice">

                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                        <div>
                            <p class="text-14 color-primary font-weight-700 lineheight-18">
                                Commission(%):
                            </p>
                            <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertycommissionper">
                                1%
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                        <div>
                            <p class="text-14 color-primary font-weight-700 lineheight-18">
                                Commission(€):
                            </p>
                            <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertycommission">

                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                        <div>
                            <p class="text-14 color-primary font-weight-700 lineheight-18">
                                Listing Agent Commission(%):
                            </p>
                            <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertylistagentper">

                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                        <div>
                            <p class="text-14 color-primary font-weight-700 lineheight-18">
                                Listing Agent Commission(€):
                            </p>
                            <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertylistagentcom">

                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2"></div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2">
                        <div>
                            <p class="text-14 color-primary font-weight-700 lineheight-18">
                                Selling Agent Commission(%):
                            </p>
                            <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertysellagentper">

                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mt-3 pt-2 pb-2 mb-3">
                        <div>
                            <p class="text-14 color-primary font-weight-700 lineheight-18">
                                Selling Agent Commission(€):
                            </p>
                            <p class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2 propertysellagentcom">

                            </p>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 mt-3 common-label-css position-relative">
                        <label for="" class="text-14 font-weight-400 lineheight-18 color-b-blue">
                            Profit-Sharing Terms:</label>
                        <div class="d-flex flex-column flex-sm-row">
                            <label class="customcb mt-1 font-weight-400">Percentage Split
                                <input type="radio" name="checkbox" value="percentage" id="percentage-radio" checked>
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcb mt-1 font-weight-400 ms-0 ms-sm-4">Fixed Amount
                                <input type="radio" name="checkbox" value="fixed" id="fixed-radio">
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcb mt-1 font-weight-400 ms-0 ms-sm-4">Tiered Commission
                                <input type="radio" name="checkbox" value="tiered" id="tiered-radio">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div id="firstsection">
                        <div class="col-md-6 common-label-css position-relative">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'Percentage',
                                'hasLabel' => true,
                                'label' => 'Percentage' . ':',
                                'id' => 'Percentage',
                                'attributes' => [],
                                'hasHelpText' => false,
                                //'help' => 'Please enter your name',
                                'value' => '0',
                            ]" />
                            <div class="input-group-append property_per">
                                <span class="input-group-text">%</span>
                            </div>
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                        <div class="col-md-6 common-label-css position-relative">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'Commission',
                                'hasLabel' => true,
                                'label' => 'Commission' . ':',
                                'id' => 'Commission',
                                'attributes' => ['readonly' => 'readonly'],
                                'hasHelpText' => false,
                                //'help' => 'Please enter your name',
                                'value' => '',
                            ]" />
                            <div class="input-group-append property_per">
                                <span class="input-group-text">€</span>
                            </div>
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <div id="secondsection" style="display: none;">
                        <div class="col-md-6 common-label-css position-relative">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'fixedamount',
                                'hasLabel' => true,
                                'label' => 'Fixed Amount' . ':',
                                'id' => 'fixedamount',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'value' => '',
                            ]" />
                            <div class="input-group-append property_per">
                                <span class="input-group-text">€</span>
                            </div>
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <div id="thirdsection" style="display: none;">
                        <div class="col-md-12 mt-3 common-label-css position-relative">
                            <label class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                Enter Selling Price Terms <span class="required">*</span>
                            </label>

                            <!-- 5% Commission -->
                            <div class="col-md-12 common-label-css position-relative">
                                <x-forms.crm-text-field :fieldData="[
                                    'name' => 'uptoone',
                                    'hasLabel' => true,
                                    'label' => '5% of the sale price up to:',
                                    'id' => 'uptoone',
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    'value' => '',
                                ]" />
                                <div class="input-group-append property_per">
                                    <span class="input-group-text">€</span>
                                </div>
                            </div>

                            <!-- 7% Commission -->
                            <div class="col-md-12 common-label-css position-relative">
                                <div class="col-md-6">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'sevenFrom',
                                        'hasLabel' => true,
                                        'label' => '7% for sales between from:',
                                        'id' => 'sevenFrom',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'value' => '',
                                    ]" />
                                </div>
                                <div class="col-md-6">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'sevenTo',
                                        'hasLabel' => true,
                                        'label' => 'to:',
                                        'id' => 'sevenTo',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'value' => '',
                                    ]" />
                                </div>
                            </div>

                            <!-- 10% Commission -->
                            <div class="col-md-12 common-label-css position-relative">
                                <div class="col-md-6">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'tenFrom',
                                        'hasLabel' => true,
                                        'label' => '10% for sales between from:',
                                        'id' => 'tenFrom',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'value' => '',
                                    ]" />
                                </div>
                                <div class="col-md-6">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'tenTo',
                                        'hasLabel' => true,
                                        'label' => 'to:',
                                        'id' => 'tenTo',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'value' => '',
                                    ]" />
                                </div>
                            </div>

                            <!-- 15% Commission -->
                            <div class="col-md-12 common-label-css position-relative">
                                <div class="col-md-6">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'fifteenFrom',
                                        'hasLabel' => true,
                                        'label' => '15% for sales between from:',
                                        'id' => 'fifteenFrom',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'value' => '',
                                    ]" />
                                </div>
                                <div class="col-md-6">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'fifteenTo',
                                        'hasLabel' => true,
                                        'label' => 'to:',
                                        'id' => 'fifteenTo',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'value' => '',
                                    ]" />
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add-event">
                        <x-forms.crm-datepicker :fieldData="[
                            'name' => 'start_date',
                            'hasLabel' => true,
                            'label' => 'Agreement Start Date:*' . ':',
                            'inputId' => 'start_date',
                            'attributes' => [],
                            'hasHelpText' => false,
                            'help' => 'Please enter your name',
                            'isRequired' => true,
                            'isInputMask' => true,
                            'startDate' => date('m-d-Y'),
                            'value' => date('m-d-Y'),
                        ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add-event">
                        <x-forms.crm-datepicker :fieldData="[
                            'name' => 'end_date',
                            'hasLabel' => true,
                            'label' => 'Agreement End Date' . ':',
                            'inputId' => 'end_date',
                            'attributes' => [],
                            'hasHelpText' => false,
                            'help' => 'Please enter your name',
                            'isRequired' => true,
                            'isInputMask' => true,
                            'startDate' => date('m-d-Y'),
                            'value' => !empty($user->due_date) ? $user->due_date : '',
                        ]" />
                    </div>

                    <div class="col-md-12 common-label-css">
                        <div class="form-group crm-textarea-container position-relative mt-3">
                            <label class="text-14 font-weight-400 lineheight-18 color-b-blue">Additional
                                Terms/Notes:</label>
                            <textarea
                                class="crm-textarea form-control form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue"
                                name="additional_notes" id="additional_notes" style="height: 80px;"  rows="1"></textarea>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button type="button" id="saveCommission"
                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white mt-4">Confirm</button>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="rejectaction" tabindex="-1" role="dialog" aria-labelledby="reject_actinLabel"
        aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_two justify-content-center"
        role="document">
        <div class="modal-content modal-content-file row d-flex flex-row">
            <div
                class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 reject_reason p-0 d-flex align-items-center justify-content-center">
                <img src="/img/reject_reason.png" alt="">
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-3">
                <div class="modal-header border-0 modal-header_file pb-0 pt-3">
                    <span></span>
                    <div class="text-center">
                        <img src="/img/login-logo.png" alt="image" class="company-login-logo h-auto">
                    </div>
                    <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true"> <i
                                class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                    </button>
                </div>
                <div class="modal-body modal-header_file ps-md-2">
                    <form onsubmit="return rejectModal(this)" method="POST" name="rejectionForm" id="rejectionForm">
                        <div class="common-label-css position-relative">
                            <p class="text-18 color-primary font-weight-700 lineheight-18">
                                Please
                                mention the reason for this action?
                            </p>
                            <label class="customcb mt-3">
                                <span class="font-weight-400">Proposed commission price is to High.</span>
                                <input type="radio" name="checkbox" value="Proposed commission price is to High.">
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcb mt-3 font-weight-400">
                                <span class="font-weight-400">Property is sold out just recently.</span>
                                <input type="radio" name="checkbox" value="Property is sold out just recently.">
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcb mt-3 font-weight-400">
                                <span class="font-weight-400">Not available for a viewing on selected date.</span>
                                <input type="radio" name="checkbox" value="Not available for a viewing on selected date.">
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcb mt-3 font-weight-400">
                                <span class="font-weight-400">Have a better offer than proposed one.</span>
                                <input type="radio" name="checkbox" value="Have a better offer than proposed one.">
                                <span class="checkmark"></span>
                            </label>
                            <label class="customcb mt-3 font-weight-400">
                                <span class="font-weight-400">Other</span>
                                <input type="radio" name="checkbox" value="other">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-12 common-label-css">
                            <div class="form-group crm-textarea-container position-relative mt-3">
                                <textarea
                                    class="crm-textarea form-control form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue"
                                    name="other_reason" style="height: 80px;" id="other_reason" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white mt-4">Reject</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>