<div class="modal fade" id="save-seach-modal" tabindex="-1" aria-labelledby="newGroupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
        <div class="modal-content border-r-8 border-0 b-color-white p-30">
            <div class="modal-header border-0 p-0 position-relative">
                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="newGroupModalLabel">
                    Saved Search
                </h5>
                <button type="button" class="close b-color-transparent cursor-pointer position-absolute end-0"
                    data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body p-0 text-center mt-30">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css">
                        <div class="form-group position-relative text-start">
                            <label for="name" class="text-14 font-weight-400 lineheight-18  color-b-blue">Saving
                                Name:<span class="required">*</span>
                            </label>
                            <div class="d-flex gap-3 align-items-center">
                                {{-- <div class="modal_tab-faq_one"></div> --}}
                                <input type="text" name="search_name" class="modal_tab-faq_one">

                                <button type="button"
                                    class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 gardient-button updateBtn saveSearchBtn">
                                    Save Search
                                </button>
                            </div>
                            <div class="invalid-feedback fw-bold"></div>
                            <h6 class="text-14 font-weight-700 color-primary pt-30 text-center mb-2">Filters Applied
                            </h6>
                        </div>
                    </div>
                </div>

                <!-- Filters Applied Data -->
                <div class="modal-tab-accordian mt-0">
                    <div class="row  mt-0 filtersAppliedData">
                        @include('modules.properties.includes.filters_applied_data')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
