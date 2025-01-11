@if($project->status != 'completed' && checkUserProjectPermissions($project->id,'Project Information'))
    @if (!empty($totalTasks) && !empty($completedTasks) && ($totalTasks == $completedTasks))
    <button type="button" onclick="window.open('{{route(routeNamePrefix().'projects.completeProject',$project->slug)}}','_self')"
            class="complete_project Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white">
            {{ trans('messages.project-show.Complete_Project') }}</button>
    
    @else
    
    <button type="button"
            class="complete_project w-150 h-42 border-r-8 w-150 h-42 border-r-8  text-14 font-weight-400 lineheight-18 color-white text-14 font-weight-400 lineheight-18 color-white">
            {{ trans('messages.project-show.Complete_Project') }}</button>
        
    @endif
@endif
