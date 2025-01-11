<tr>
@if($result->upload_status == 'in_progress')
    <td></td>
    <td class="{{$result->upload_status."_row"}}"><a href=""><span>{{$result->file_original_name ?? '-----'}}</span></a>
        
        <div class="task-progress d-flex align-items-center mt-2">
            <span class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">{{$result->upload_progress}}%</span>
            <progress class="progress progress2 mx-2" max="100" value="{{$result->upload_progress}}"></progress>
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                <path opacity="0.8" fill-rule="evenodd" clip-rule="evenodd" d="M5 6.28399L1.28399 10L0 8.71601L3.71601 5L4.15612e-06 1.28399L1.28399 0L5 3.71601L8.71601 0L10 1.28399L6.28399 5L10 8.71601L8.71601 10L5 6.28399Z" fill="#17213A"></path>
            </svg>
        </div>
        
    </td>
    <td><a href="">{{$result->file_type ?? '-----'}}</a></td>
    <td><a href="">{{formatFileSize($result->file_size)}}</a></td>
    <td><a href="">{{date('d/m/Y',strtotime($result->created_at))}}</a></td>
    <td ></td>
    <td ></td>
@else
<td>

    <input type="checkbox" name="checkbox" class="checkbox checkboxone  fileCheckbox" data-id="{{$result->id}}">
    
    </td>
    <td class="{{$result->upload_status."_row"}}"><a href="{{Config('constant.USER_FILE_URL').$result->file_name}}" target="_blank"><span>{{$result->file_original_name ?? '-----'}}</span></a>
    
    </td>
    <td><a href="">{{$result->file_type ?? '-----'}}</a></td>
    <td><a href="">{{formatFileSize($result->file_size)}}</a></td>
    <td><a href="">{{date('d/m/Y',strtotime($result->created_at))}}</a></td>
    <td class="download-button"><a href="{{Config('constant.USER_FILE_URL').$result->file_name}}" download="{{$result->file_name}}"><i
                class="icon-download_black  icon-20 color-b-blue downloadFileBtn" data-id="{{$result->id}}" ></i></a></td>
    <td class="delete-button"><button><i class="icon-Delete  icon-20 color-b-blue deleteFileBtn" data-id="{{$result->id}}" data-name="{{$result->file_original_name ?? ''}}" ></i></button>
    </td>
@endif

    
</tr>