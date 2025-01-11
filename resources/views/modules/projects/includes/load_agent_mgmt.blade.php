@if($project_agents && $project_agents->isNotEmpty())
@foreach($project_agents as $agent)
<tr>
    <td> <img src="{{ getFileUrl($agent->image,'users') }}" alt="image" width="36" height="36"
        alt="image" class="border-r-4"></td>
    <td><span>{{$agent->name ?? ''}}</span></td>
    <td>
        <span class="d-flex align-items-center gap-12">
        
        @if(!empty($agent->agent_permissions))
            @if(in_array('Project Information',$agent->agent_permissions)) 
                <i class=" icon-my_project icon-18"></i> 
            @endif
            @if(in_array('Property Management',$agent->agent_permissions)) 
                <i  class=" icon-setting_managment  icon-18"></i>  
            @endif
            @if(in_array('Agent Management',$agent->agent_permissions)) 
            <i
            class=" icon-Agent_Management  icon-18"></i> 
            @endif
            @if(in_array('Customer Management',$agent->agent_permissions)) 
            <i
            class="  icon-Customer_Management  icon-18"></i>
            @endif
            @if(in_array('To-Do List',$agent->agent_permissions)) 
            <i
            class=" icon-Task_Management-Icon  icon-18"></i> 
            @endif
            @if(in_array('Event',$agent->agent_permissions)) 
            <i
            class=" icon-my_calender  icon-18"></i>
            @endif

        @endif
         
        </span>
    </td>

    <td>{{($agent->is_project_owner == 1) ? 'Owner' : '' }}</td>
    <td>
        @if(checkUserProjectPermissions($project->id,'Agent Management'))     
            @if($agent->is_project_owner != 1)
            <a href="#"> <i data-id="{{$agent->id}}" data-name="{{$agent->name}}" class="deleteProjectAgentBtn icon-Delete icon-20 color-b-blue"></i></a>
            @endif
        @endif
    </td>
</tr>
@endforeach
@else
{{-- <tr>
    <td colspan="5" class="text-center">

        <p>No results found</p>
    </td>
</tr> --}}
@endif