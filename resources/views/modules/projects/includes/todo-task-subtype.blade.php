@if ($subTypeTask && $subTypeTask->isNotEmpty())
    <div class="table_dashboard  table-dashboard_one" style=" overflow-x: hidden;">
        <table id="example" class="display dashboard_table dashboard_edit_one load_to-dist" style="width:100%;">
            <thead>
                <tr>
                    <th>To-do List</th>
                </tr>
            </thead>
            <tbody class="projectTaskTableData">
                @foreach ($subTypeTask as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endif
