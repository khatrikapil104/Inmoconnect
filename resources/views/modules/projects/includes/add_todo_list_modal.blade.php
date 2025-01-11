{{-- load-to-do-list --}}
<div class="modal fade" id="todolist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_six" role="document">
        <div class="modal-content modal-content-file">
            {{-- modal-header --}}
            <div class="modal-header border-0 modal-header_file pb-0">
                <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="dataFilterModalLabel">
                    Load To-do List
                </h4>
                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                </button>
            </div>
            {{-- modal-body --}}
            <div class="modal-body modal-header_file">
                <form action="" method="post" id="addProjectTaskForm" enctype="multipart/form-data">
                    <input type="hidden" id="addSubTaskType">
                    <div class="row">
                        {{-- select-modal-type --}}
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-n3 add_event">
                            <x-forms.crm-single-select :fieldData="[
                                'name' => 'task_id',
                                'hasLabel' => false,
                                'label' => trans('messages.properties.Property_Category') . ':',
                                'id' => 'task_type',
                                'class' => 'task_type',
                                'options' => $taskType,
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => 'Select Model Type',
                                'isRequired' => true,
                            ]" />
                        </div>
                        {{-- image-text --}}
                        <div class="col-lg-12 mt-30 task_type_data">
                            <div class="empty-table d-flex flex-column align-items-center">
                                <div class="empty-imagea">
                                    <i class="icon-error-icon1   icon-60 color-primary"></i>
                                </div>
                                <h4
                                    class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                    You have not to-do list here.
                                </h4>
                                {{-- button --}}
                                <button type="button" disabled
                                    class="pe-none opacity-4 small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white saveTaskBtn">
                                    {{ trans('messages.project-show.Load To-do List') }}
                                </button>

                            </div>
                        </div>
                        {{-- button --}}
                        <div class="col-lg-12 mt-30 d-flex justify-content-end">
                            <button type="button" style="display: none"
                                class="Gradient_button small-button  border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white Add-New-To-DoList"
                                onclick="openMyModal2()">
                                {{ trans('messages.project-show.Load To-do List') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- add-to-do-list only date --}}
<div class="modal " id="add_to_do_list" data-bs-backdrop="static" style="display: none;background: #00000040;"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_eight" role="document">
        <div class="modal-content modal-content-file">
            {{-- modal-header --}}
            <div class="modal-header border-0 modal-header_file pb-0">
                <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="dataFilterModalLabel">Add To-Do List </h4>
                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                </button>

            </div>
            {{-- modal-body --}}
            <div class="modal-body modal-header_file">
                <div class="row">
                    {{-- end-date --}}
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-n3">
                        <x-forms.crm-datepicker :fieldData="[
                            'name' => 'end_date',
                            'hasLabel' => true,
                            'label' => 'End Date:',
                            'inputId' => 'end_date',
                            'id' => 'end_date',
                            'attributes' => [],
                            'hasHelpText' => false,
                            'help' => 'Please enter your name',
                            'isRequired' => true,
                            'isInputMask' => true,
                            'startDate' => date('m-d-Y'),
                        ]" />
                    </div>
                    {{-- button --}}
                    <div class="col-lg-12 mt-30 d-flex justify-content-end">
                        <button type="button"
                            class="Gradient_button small-button  border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white saveTaskBtn">
                            Add To-do List
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Add-to-do-list --}}
<div class="modal fade" id="single_todolist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
        <div class="modal-content modal-content-file">
            {{-- modal-header --}}
            <div class="modal-header border-0 modal-header_file pb-0">
                <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="dataFilterModalLabel">
                    {{ trans('messages.add_to_do_list') }}
                </h4>
                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                </button>
            </div>
            {{-- modal-body --}}
            <div class="modal-body modal-header_file">
                <form action="" method="post" id="addSingleTaskForm" enctype="multipart/form-data">
                    <div class="row">
                        {{-- task-name --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add_event">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'task_name',
                                'hasLabel' => true,
                                'label' => trans('messages.Task_name') . ':',
                                'id' => 'task_name',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                            ]" />
                        </div>

                        {{-- end-date --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add-event">
                            <x-forms.crm-datepicker :fieldData="[
                                'name' => 'end_date',
                                'hasLabel' => true,
                                'label' => 'End Date:',
                                'inputId' => 'end_date',
                                'id' => 'end_date',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'isInputMask' => true,
                                'end_date' => date('m-d-Y'),
                            ]" />
                        </div>

                        <!-- save-button -->
                        <div class="col-12 mt-3">
                            <div class="d-flex justify-content-end">
                                <button type="button"
                                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white saveSingleTaskBtn">
                                    {{ trans('messages.dashboard.Save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    function openMyModal2() {
        let myModal = new
        bootstrap.Modal(document.getElementById('add_to_do_list'), {});
        myModal.show();
    }
</script>
<!-- ////////////////////////////////////////////////end- add to do list modal ////////////////////////////////// -->
