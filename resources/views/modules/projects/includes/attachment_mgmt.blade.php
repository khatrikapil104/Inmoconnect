@if ($project->project_attachments && $project->project_attachments->isNotEmpty())
    <div class="table_dashboard table-dashboard_two">
        <table id="example" class="display dashboard_table" style="width:100%; ">
            <thead>
                <tr>
                    <th></th>
                    <th>{{ trans('messages.project-show.File_Name') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="projectAttachmentTableData">
                @include('modules.projects.includes.load_attachment_mgmt', [
                    'project_attachments' => $project->project_attachments,
                ])
            </tbody>
        </table>
    </div>
@else
    @if (auth()->user()->role->name == 'customer')
        <div class="table_dashboard empty-dashboard table-empty-dashboard_property">
            <div class="empty-table">
                <div class="empty-image">
                    <i class="icon-house_id icon-30 color-primary"></i>
                </div>
                <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                    {{ trans('messages.No_Attachment_Has_Been_Added') }}
                </h4>
            </div>
        </div>
    @else
        <div class="table_dashboard empty-dashboard table-empty-dashboard_property">
            <div class="empty-table">
                <div class="empty-image">
                    <i class=" icon-zip icon-30 color-primary"></i>
                </div>
                <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                    {{ trans('messages.project-show.Add_all_the_project_related_files') }}
                    <br>
                    {{ trans('messages.project-show.and_attachments_over_here') }}
                </h4>
                <button type="button"
                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white projectAttachmentChooseBtn">
                    {{ trans('messages.project-show.Add_Document') }}
                </button>
            </div>
        </div>
    @endif
@endif
