@if($project_customers && $project_customers->isNotEmpty())
@foreach($project_customers as $customer)
<tr>
    <td> <img src="{{ getFileUrl($customer->image,'users') }}" alt="image" width="36" height="36"
        alt="image" class="border-r-4"></td>
    <td><span>{{$customer->name ?? ''}}</span></td>
    <td>{{$customer->added_by_name ?? ''}}</td>
    <td>
    @if(checkUserProjectPermissions($project->id,'Customer Management'))     
        <a href="#"> <i data-id="{{$customer->id}}" data-name="{{$customer->name}}" class="deleteProjectCustomerBtn icon-Delete icon-20 color-b-blue"></i></a>
    @endif
    </td>
</tr>

@endforeach
@else
<tr>
    <td colspan="3" class="text-center">

        <p>No results found</p>
    </td>
</tr>
@endif

