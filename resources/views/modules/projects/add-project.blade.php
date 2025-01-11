
<div class="modal fade" id="dataFilterModal" tabindex="-1" aria-labelledby="dataFilterModalLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
        <div class="modal-content border-r-8 border-0 b-color-white ">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-b-blue w-100"
                    id="dataFilterModalLabel">
                    {{ !empty($project->id)
                        ? trans('messages.my-project.Edit_Project')
                        : trans('messages.my-project.Add_New_Project') }}
                </h4>
                <button type="button" class="close b-color-transparent cursor-pointer end-0" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">
                        <i class=" icon-cross text-18 color-b-blue opacity-8"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body modal-body modal-header_file">
                <form action="" method="post" id="addProjectForm" enctype="multipart/form-data">
                    <div class="row">
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css common_css_two common_css_three">
                            <div class="form-group position-relative">
                                <label for="project_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                    {{ trans('messages.my-project.Project_Name') }}
                                    <span class="required">*</span></label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="project_name" id="project_name"
                                    value="{{ !empty($project->project_name) ? $project->project_name : '' }}"
                                    placeholder="">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>
                        <div class="col-md-12 common-label-css textarea_abc">
                            <x-forms.crm-textarea :fieldData="[
                                'name' => 'project_description',
                                'id' => 'project_description',
                                'attributes' => [],
                                'hasHelpText' => false,
                                //'help' => 'Please enter your name',
                                'isRequired' => true,
                                'useCkEditor' => true,
                                'value' => !empty($project->project_description) ? $project->project_description : '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add_event">
                            <x-forms.crm-single-select :fieldData="[
                                'name' => 'project_type',
                                'hasLabel' => true,
                                'label' => trans('messages.my-project.Project_Type') . ':',
                                'id' => 'project_type',
                                'options' => getModalSpecificData('Project', 'PROJECT_TYPE', ''),
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('messages.my-project.Project_Type'),
                                'isRequired' => true,
                                'selected' => !empty($project->project_type) ? $project->project_type : '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add_event">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'project_budget',
                                'hasLabel' => true,
                                'label' => trans('messages.my-project.Project_Budget') . ':',
                                'id' => 'project_budget',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'value' => !empty($project->project_budget) ? $project->project_budget : '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add-event">
                            <x-forms.crm-datepicker :fieldData="[
                                'name' => 'start_date',
                                'hasLabel' => true,
                                'label' => trans('messages.my-project.Start_date') . ':',
                                'inputId' => 'start_date',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'isRequired' => true,
                                'isInputMask' => true,
                                'startDate' => date('m-d-Y'),
                                'value' => !empty($project->start_date)
                                    ? date('m-d-Y', strtotime($project->start_date))
                                    : '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add-event">
                            <x-forms.crm-datepicker :fieldData="[
                                'name' => 'end_date',
                                'hasLabel' => true,
                                'label' => trans('messages.my-project.End_date') . ':',
                                'inputId' => 'end_date',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'isRequired' => true,
                                'isInputMask' => true,
                                'startDate' => date('m-d-Y'),
                                'value' => !empty($project->end_date)
                                    ? date('m-d-Y', strtotime($project->end_date))
                                    : '',
                            ]" />
                        </div>
                        

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css add-event">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'project_location',
                                'hasLabel' => true,
                                'label' => trans('messages.my-project.Location'),
                                'id' => 'project_location',
                                'attributes' => [],
                                'hasHelpText' => false,
                                //'help' => 'Please enter your name',
                                'isRequired' => true,
                                'value' => !empty($project->project_location) ? $project->project_location : '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css add-event">
                            <div id="projectLocationMapAddForm" class="mt-10" style="height: 260px;border-radius:8px;">
                            </div>
                            <input type="hidden" name="latitude" class="form-control small latitude_v"
                                value="{{ !empty($project->latitude) ? $project->latitude : old('latitude') }}"
                                id="latitude_v" />
                            <input type="hidden" name="longitude" class="form-control small longitude_v"
                                value="{{ !empty($project->longitude) ? $project->longitude : old('longitude') }}"
                                id="longitude_v" />
                        </div>
                    </div>
                </form>
                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                    <button type="button"
                        class=" Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white saveProjectBtn">
                        {{ trans('messages.my-project.Save') }}
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<script>
    var submitBtnText = "{{ trans('messages.uploads.Upload') }}";
    var importBtnText = "{{ trans('messages.uploads.import') }}";
</script>

