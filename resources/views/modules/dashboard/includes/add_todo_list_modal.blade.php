
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
                                'startDate' => date('m-d-Y'),
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
