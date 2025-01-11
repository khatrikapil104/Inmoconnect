@php $counter =1; @endphp
@foreach ($user_company_tasks as $userTask)
    @php
        $selectedTaskAssingUsers = [];

        if (!empty($userTask->userCompanyTaskAssign)) {
            foreach ($userTask->userCompanyTaskAssign as $assignTo) {
                $selectedTaskAssingUsers[] = $assignTo->assign_to;
            }
        }
    @endphp
    @if (!empty($assignToTask) && isset($assignToTask))
        <div class="modal fade" id="assign_to_{{ $userTask->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_eight" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Assign</h5>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <div class="modal-body modal-header_file">
                        <form action="" id="addAssignToDoList" method="post" enctype="multipart/form-data">
                            <div class="row addAssignToDoListFormData">
                                <input type="hidden" class="user_task_id" name="user_task_id">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css multiselect-select add-select mt-n3">
                                    <x-forms.crm-multi-select-with-image :fieldData="[
                                        'name' => 'assign_to' . $userTask->id,
                                        'hasLabel' => true,
                                        'label' => 'Assign To:',
                                        'id' => 'assign_to' . $userTask->id,
                                        'options' => $taskUserData ?? [],
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => 'Assign To',
                                        'class' => 'assign_to' . $userTask->id,
                                        'isRequired' => true,
                                        'selected' => $userTask->userCompanyTaskAssign->isNotEmpty()
                                            ? $selectedTaskAssingUsers
                                            : [],
                                    ]" />
                                </div>
                                <div class="invalid-feedback fw-bold assign_task_id"></div>
                                <div class="col-lg-12 mt-30 d-flex justify-content-end">
                                    <button type="button"
                                        class="Gradient_button small-button  border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white saveAssignTodoList"
                                        
                                        data-user-task-id="{{ $userTask->id }}">
                                        Save
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @php
        $taskStatus = trans('messages.' . getModalSpecificData('UserCompanyTask', 'STATUS', trans($userTask->status)));

    @endphp
    @if (auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'sub-developer')
        @if ($userTask->userCompanyTaskAssign->isNotEmpty())
            @foreach ($userTask->userCompanyTaskAssign as $assign)
                @if (auth()->user()->id == $assign->assignTo->id)
                    <tr>
                        <td class="d-flex align-items-center gap-12">

                            @if ($userTask->status == 'completed')
                                <del
                                    class="change_decoration">{{ $userTask->taskSubType->name ?? $userTask->task_name }}</del>
                            @else
                                <span
                                    class="change_decoration">{{ $userTask->taskSubType->name ?? $userTask->task_name }}</span>
                            @endif
                        </td>
                        <td>
                            <span class="d-flex align-items-center">
                                {{-- @dd($assign->assignBy) --}}
                                @if (!empty($assign->assignBy->name))
                                    {{-- @dd($assign->assignBy->name) --}}
                                    @if (isset($assign->assignBy->name))
                                        <span class="name_img">{{ getShortName($assign->assignBy->name) }}</span>
                                    @endif
                                @endif

                            </span>

                        </td>

                        <td>
                            @if ($userTask->status == 'active')
                                <span class="span_active">{{ $taskStatus ?? '' }}</span>
                            @elseif($userTask->status == 'completed')
                                <span class="span_complete">{{ $taskStatus ?? '' }}</span>
                            @else
                                <span class="span_pending">{{ $taskStatus ?? '' }}</span>
                            @endif

                        </td>
                        <td class="change_decoration">
                            @if ($userTask->status == 'completed')
                                <del>{{ date('d/m/Y', strtotime($userTask->end_date)) }}</del>@else{{ date('d/m/Y', strtotime($userTask->end_date)) }}
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
        @endif
    @else
        <tr>
           
            <td class="d-flex align-items-center gap-12">
               
                    <input type="checkbox" id="vehicle_one" name="vehicle1" class="userCompanyTaskCheckbox" value="1"
                        data-id="{{ $userTask->id }}" {{ $userTask->status == 'completed' ? 'checked' : '' }}>
               

                @if ($userTask->status == 'completed')
                    <del
                        class="change_decoration">{{ $userTask->taskSubType->name ?? $userTask->task_name }}</del>
                @else
                    <span
                        class="change_decoration">{{ $userTask->taskSubType->name ?? $userTask->task_name }}</span>
                @endif
            </td>
            <td>
                <span class="d-flex align-items-center">
                    @if (!empty($userTask->userCompanyTaskAssign))
                        @foreach ($userTask->userCompanyTaskAssign as $assignTo)
                            @if (isset($assignTo->assignTo))
                                <img src= "{{ !empty($assignTo->assignTo->image) ? $assignTo->assignTo->image ?? '' : asset('img/default-user.jpg') }}"
                                    class="border-r-5v"
                                    style="border: 1px solid #FFFFFF;box-shadow: 0px 0px 3px 1px #38319226;">
                            @endif
                        @endforeach
                    @endif
                    
                        <button type="button" class="to-do-modal_button user_task_id" data-bs-toggle="modal"
                            data-bs-target="#assign_to_{{ $userTask->id }}" data-id="{{ $userTask->id }}"
                            @if ($userTask->status == 'completed') disabled @endif>
                            <span><img src= "{{ asset('img/plus_modal.svg') }}" /></span>
                        </button>
                    
                </span>

            </td>

            <td>
                @if ($userTask->status == 'active')
                    <span class="span_active">{{ $taskStatus ?? '' }}</span>
                @elseif($userTask->status == 'completed')
                    <span class="span_complete">{{ $taskStatus ?? '' }}</span>
                @else
                    <span class="span_pending">{{ $taskStatus ?? '' }}</span>
                @endif

            </td>
            <td class="change_decoration">
                @if ($userTask->status == 'completed')
                    <del>{{ date('d/m/Y', strtotime($userTask->end_date)) }}</del>@else{{ date('d/m/Y', strtotime($userTask->end_date)) }}
                @endif
            </td>
            <td>
                
                    <a href="javascript:void(0)"> <i data-id="{{ $userTask->id }}"
                            data-name="{{ $userTask->taskSubType->name ?? $userTask->task_name }}"
                            task-status={{ $userTask->status }}
                            class="icon-Delete icon-20 color-b-blue @if ($userTask->status != 'completed') deleteUserCompanyTaskBtn @endif"></i></a>
                
            </td>
        </tr>
    @endif

    @php
        $counter++;
    @endphp
@endforeach
