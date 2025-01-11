<div class="modal fade importCustomersModal" id="customerlist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_one" role="document">
        <div class="modal-content modal-content-file">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="dataFilterModalLabel">
                    {{trans('messages.project-cust.Customers')}}
                </h4>
                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                </button>
            </div>
            <h6 class="pt-10 text-center text-14 color-black font-weight-400 text-capitalize lineheight-18">
                {{trans('messages.project-cust.import_your_cust_list')}}
            </h6>
            <div class="modal-body modal-header_file">
                <form action="{{ route(routeNamePrefix().'projects.submitImportCustomers',$project->slug) }}" class="importCustomersData" method="post">
                </form>
                
            </div>
        </div>
    </div>
</div>