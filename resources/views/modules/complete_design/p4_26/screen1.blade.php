@extends('layouts.app')
@section('content')
    @push('styles')

        @section('title')
            {{ trans('messages.dashboard.Edit_Profile') }} Inmoconnect
        @endsection

        <div class="overlay" id="overlay"></div>
        <div id="page-content-wrapper" class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                {{-- breadcrumb  --}}
                <div class="empty-search-header">
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700">
                                Property Leads
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-breadcrumb --}}


                {{-- empty-do-list --}}
                <div class="row">
                    <div class="col-lg-12 taskMangementRow">
                        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                            <div class="dashboard_card-title d-flex align-items-center justify-content-between">
                                <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                                    To-Do List:
                                </h4>
                        </div>

                        <div class="table_dashboard empty-dashboard table-empty-dashboard_property">
                            <div class="empty-table">
                                <div class="empty-image">
                                    <i class=" icon-to_do_list_empty  icon-30 color-primary"></i>
                                </div>
                                <div class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                    Add your tasks checklist and manage
                                    <br>
                                    them with timely manner
                                </div>
                                <button type="button"
                                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                                    data-bs-toggle="modal" data-bs-target="#todolist">
                                    Load To-do List
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end-empty-do-list --}}

            {{-- Load To-do List-modal --}}
            <div class="modal fade" id="todolist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_six" role="document">
                    <div class="modal-content modal-content-file">
                        <div class="modal-header border-0 modal-header_file pb-0">
                            <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                id="dataFilterModalLabel">Load To-do List</h4>
                            <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                            </button>
                        </div>
                        <div class="modal-body modal-header_file">
                            <div class="row">

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-n3">
                                    <x-forms.crm-single-select :fieldData="[
                                        'name' => 'category_id',
                                        'hasLabel' => false,
                                        'label' => trans('messages.properties.Property_Category') . ':',
                                        'id' => 'category_id',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => 'Select Model Type',
                                        'isRequired' => true,
                                    ]" />
                                </div>
                                <div class="col-lg-12 mt-30">
                                    <div class="empty-table d-flex flex-column align-items-center">
                                        <div class="empty-image">
                                            <i class=" icon-to_do_list_empty  icon-30 color-primary"></i>
                                        </div>
                                        <div
                                            class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                            You have not to-do list here.
                                        </div>
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white">
                                            Add New To-Do List
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end-load tp do list modal --}}


            @push('scripts')

                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
                <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>

            @endpush
        @endsection
