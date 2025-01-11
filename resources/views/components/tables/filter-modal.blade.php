<div class="modal fade" id="dataFilterModal" tabindex="-1" role="dialog" aria-labelledby="dataFilterModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-width-change_three" role="document">
        <div class="modal-content border-r-8 border-0 b-color-white p-30 ">
            <div class="modal-header border-0 text-center p-0 position-relative mb-3"> 
                <h4 class="modal-title text-18 font-weight-700 lineheight-22 color-b-blue w-100" id="dataFilterModalLabel">{{trans('messages.filter_modal.Advance_Search')}}</h4>
                <button type="button" class="close b-color-transparent cursor-pointer position-absolute end-0" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">
                        <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body p-0 text-center mt10">
                {{$slot}}
            </div>
        </div>
    </div>
</div>





