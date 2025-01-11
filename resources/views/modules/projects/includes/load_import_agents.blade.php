@if ($connectedAgentsData && $connectedAgentsData->isNotEmpty())
    <div class="mb-15 modal-body-selectall d-flex justify-content-between">
        <span class="d-flex align-items-center text-14 font-weight-700 lineheight-18 text-capitalize color-black"><input
                type="checkbox" id="vehicle1" name="vehicle1" value="Bike"
                class="me-3 selectAllManageAgentCheckbox">
                {{trans('messages.project-agent_mgmt.select_all_agent')}}
            </span>
        <h6 class="text-14 font-weight-400 lineheight-18 color-light-grey-five">
            {{trans('messages.proejct-agent_mgmt.Number_of_Selected_Agents')}}
            <span
                class="selectedManageAgentsCount">{{ count($project_agents) ?? 0 }}</span>/<span
                class="color-b-blue font-weight-700 totalManageAgentsCount">{{ $connectedAgentsData->count() }}</span>
        </h6>
    </div>
@endif
<div class="modal-body_select-agent">
    <div class="row importAgentsContainer">
        @if ($connectedAgentsData && $connectedAgentsData->isNotEmpty())
            @foreach ($connectedAgentsData as $agentKey => $agent)
                <div class="col-lg-6">
                    <div class="modal-body_card">
                        <input type="checkbox" name="dataArr[{{ $agentKey }}][agent_id]" value="{{ $agent->id }}"
                            class="manageAgentCheckbox" {{ in_array($agent->id, $project_agents) ? 'checked' : '' }}>
                        <div class="modal-body_left gap-4">
                            <div class="modal_img">
                                <img src="{{ !empty($agent->image) ? $agent->image : asset('img/default-user.jpg') }}"
                                    alt="Default Image" class="border-r-8" height="78" width="78">
                            </div>
                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">

                                <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                    {{ $agent->name ?? '' }}</div>
                                <div class="d-flex gap-2 align-items-center  ">
                                    <i class=" icon-location icon-20"></i>
                                    <div
                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                        {{ $agent->address ?? '' }}</div>

                                </div>
                                <div class="d-flex gap-2 align-items-center  ">
                                    <i class=" icon-home_protection icon-18"></i>
                                    <div class="text-12 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                        {{ !empty($agent->total_properties) ? $agent->total_properties : 0 }}
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12 text-center">
                <p>
                    {{trans('messages.project-agent_mgmt.No_agent_found')}}
                </p>
            </div>
        @endif

    </div>
</div>
@if ($connectedAgentsData && $connectedAgentsData->isNotEmpty())
    <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
        <button type="submit"
            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">
            {{trans('messages.project-property.import')}}
        </button>
    </div>
@endif
