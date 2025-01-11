@php $counter =1; @endphp
@if (is_array($project_tasks->all()))
    @foreach ($project_tasks as $projectTask)
        @php
            $selectedTaskAssingUsers = [];

            if (!empty($projectTask->projectTaskAssign)) {
                foreach ($projectTask->projectTaskAssign as $assignTo) {
                    $selectedTaskAssingUsers[] = $assignTo->assign_to;
                }
            }
        @endphp
        @if (auth()->user()->role->name == 'agent')
            @if (!empty($assignToTask) && isset($assignToTask))
                <div class="modal fade" id="assign_to_{{ $projectTask->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_eight" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="dataFilterModalLabel">Assign</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <form action="" id="addAssignToDoList" method="post"
                                    enctype="multipart/form-data">
                                    <div class="row addAssignToDoListFormData">
                                        <input type="hidden" class="project_task_id" name="project_task_id">
                                        <div
                                            class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css multiselect-select add-select mt-n3">
                                            <x-forms.crm-multi-select-with-image :fieldData="[
                                                'name' => 'assign_to' . $projectTask->id,
                                                'hasLabel' => true,
                                                'label' => 'Assign To:',
                                                'id' => 'assign_to' . $projectTask->id,
                                                'options' => $projectUserData ?? [],
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'placeholder' => 'Assign To',
                                                'class' => 'assign_to' . $projectTask->id,
                                                'isRequired' => true,
                                                'selected' => $projectTask->projectTaskAssign->isNotEmpty()
                                                    ? $selectedTaskAssingUsers
                                                    : [],
                                            ]" />
                                        </div>
                                        <div class="invalid-feedback fw-bold assign_task_id"></div>
                                        <div class="col-lg-12 mt-30 d-flex justify-content-end">
                                            <button type="button"
                                                class="Gradient_button small-button  border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white saveAssignTodoList"
                                                data-project-task-id="{{ $projectTask->id }}">
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
        @endif

        @if (auth()->user()->role->name == 'customer')
            @foreach ($projectTask->project_tasks as $task)
                @php
                    $taskStatus = trans(
                        'messages.' . getModalSpecificData('ProjectTask', 'STATUS', trans($task->status)),
                    );

                @endphp
                @if (!empty($task->projectTaskAssign))
                    @foreach ($task->projectTaskAssign as $assign)
                        @if (auth()->user()->id == $assign->assignTo->id)
                            <tr>
                                <td>

                                    @if ($task->status == 'completed')
                                        <del
                                            class="change_decoration">{{ $task->taskSubType->name ?? $projectTask->task_name }}</del>
                                    @else
                                        <span
                                            class="change_decoration">{{ $task->taskSubType->name ?? $projectTask->task_name }}</span>
                                    @endif
                                </td>
                                <td>
                                    <span>{{ $projectTask->project_name ?? '' }}</span>
                                </td>

                                <td>
                                    <span class="d-flex align-items-center">
                                        {{-- @dd($assign->assignBy) --}}
                                        <span>{{ $assign->assignBy->name ?? '' }}</span>
                                    </span>

                                </td>

                                <td>
                                    @if ($task->status == 'active')
                                        <span class="span_active">{{ $taskStatus ?? '' }}</span>
                                    @elseif($task->status == 'completed')
                                        <span class="span_complete">{{ $taskStatus ?? '' }}</span>
                                    @else
                                        <span class="span_pending">{{ $taskStatus ?? '' }}</span>
                                    @endif

                                </td>
                                <td class="change_decoration">
                                    @if ($projectTask->status == 'completed')
                                        <del>{{ date('d/m/Y', strtotime($projectTask->end_date)) }}</del>@else{{ date('d/m/Y', strtotime($projectTask->end_date)) }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route(routeNamePrefix() . 'projects.show', ['slug' => $projectTask->slug, 'id' => $projectTask->id]) }}"
                                        class="" ><img src="{{ asset('img/eye.svg') }}"
                                            alt="image" style="max-width: max-content"></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @else
            @php
                $taskStatus = trans(
                    'messages.' . getModalSpecificData('ProjectTask', 'STATUS', trans($projectTask->status)),
                );

            @endphp
            <tr>

                <td class="d-flex align-items-center gap-12">
                    @if (checkUserProjectPermissions($project->id, 'To-Do List'))
                        <input type="checkbox" id="vehicle_one" name="vehicle1" class="projectTaskCheckbox"
                            value="1" data-id="{{ $projectTask->id }}"
                            {{ $projectTask->status == 'completed' ? 'checked' : '' }}>
                    @endif

                    @if ($projectTask->status == 'completed')
                        <del
                            class="change_decoration">{{ $projectTask->taskSubType->name ?? $projectTask->task_name }}</del>
                    @else
                        <span
                            class="change_decoration">{{ $projectTask->taskSubType->name ?? $projectTask->task_name }}</span>
                    @endif
                </td>
                <td>
                    <span class="d-flex align-items-center">
                        @if (!empty($projectTask->projectTaskAssign))
                            @foreach ($projectTask->projectTaskAssign as $assignTo)
                                @if (isset($assignTo->assignTo))
                                    <img src= "{{ !empty($assignTo->assignTo->image) ? $assignTo->assignTo->image ?? '' : asset('img/default-user.jpg') }}"
                                        class="border-r-5v"
                                        style="border: 1px solid #FFFFFF;box-shadow: 0px 0px 3px 1px #38319226;">
                                @endif
                            @endforeach
                        @endif
                        @if (checkUserProjectPermissions($project->id, 'To-Do List'))
                            <button type="button" class="to-do-modal_button project_task_id" data-bs-toggle="modal"
                                data-bs-target="#assign_to_{{ $projectTask->id }}" data-id="{{ $projectTask->id }}"
                                @if ($projectTask->status == 'completed') disabled @endif>
                                <span><img src= "{{ asset('img/plus_modal.svg') }}" /></span>
                            </button>
                        @endif
                    </span>

                </td>

                <td>
                    @if ($projectTask->status == 'active')
                        <span class="span_active">{{ $taskStatus ?? '' }}</span>
                    @elseif($projectTask->status == 'completed')
                        <span class="span_complete">{{ $taskStatus ?? '' }}</span>
                    @else
                        <span class="span_pending">{{ $taskStatus ?? '' }}</span>
                    @endif

                </td>
                <td class="change_decoration">
                    @if ($projectTask->status == 'completed')
                        <del>{{ date('d/m/Y', strtotime($projectTask->end_date)) }}</del>@else{{ date('d/m/Y', strtotime($projectTask->end_date)) }}
                    @endif
                </td>
                <td>
                    @if (checkUserProjectPermissions($project->id, 'To-Do List'))
                        <a href="javascript:void(0)"> <i data-id="{{ $projectTask->id }}"
                                data-name="{{ $projectTask->taskSubType->name ?? $projectTask->task_name }}"
                                task-status={{ $projectTask->status }}
                                class="icon-Delete icon-20 color-b-blue @if ($projectTask->status != 'completed') deleteProjectTaskBtn @endif"></i></a>
                    @endif
                </td>
            </tr>
        @endif

        @php
            $counter++;
        @endphp
    @endforeach
@else
    @foreach ($project_tasks->project_tasks as $task)
        @php
            $taskStatus = trans('messages.' . getModalSpecificData('ProjectTask', 'STATUS', trans($task->status)));

        @endphp

        @if (!empty($task->projectTaskAssign))
            @foreach ($task->projectTaskAssign as $assign)
                @if (auth()->user()->id == $assign->assignTo->id)
                    <tr>
                        <td>
                            @if ($task->status == 'completed')
                                <del
                                    class="change_decoration">{{ $task->taskSubType->name ?? $projectTask->task_name }}</del>
                            @else
                                <span
                                    class="change_decoration">{{ $task->taskSubType->name ?? $projectTask->task_name }}</span>
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
                            @if ($task->status == 'active')
                                <span class="span_active">{{ $taskStatus ?? '' }}</span>
                            @elseif($task->status == 'completed')
                                <span class="span_complete">{{ $taskStatus ?? '' }}</span>
                            @else
                                <span class="span_pending">{{ $taskStatus ?? '' }}</span>
                            @endif

                        </td>
                        <td class="change_decoration">
                            @if ($task->status == 'completed')
                                <del>{{ date('d/m/Y', strtotime($task->end_date)) }}</del>@else{{ date('d/m/Y', strtotime($task->end_date)) }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route(routeNamePrefix() . 'projects.show', ['slug' => $project_tasks->slug, 'id' => $project_tasks->id]) }}"
                                class="" target="_blank"><img src="{{ asset('img/eye.svg') }}" alt="image"
                                    style="max-width: max-content"></a>
                        </td>
                    </tr>
                @endif
            @endforeach
        @endif
    @endforeach
@endif
