<div class="empty-search-header">
    <div class="header-title d-flex align-items-center justify-content-between">

    <!-- /////////////////////////header-left///////////////////// -->
        <div class="header-left-breadcrumb d-flex align-items-center">
            @foreach($values as $key => $breadcrumb)
            @if(!empty($breadcrumb['label']))
                @if($key == 0)
                <a><h3 class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36"
                    onclick="window.open('{{ $breadcrumb['url'] }}','_self')">{{ $breadcrumb['label'] }}</h3></a>
                @else
                <h3 class="small-breadcrum text-20 lineheight-24 color-primary d-inline-block font-weight-400 letter-s-36 breadcrumb-top ps-4"
                    onclick="window.open('{{ $breadcrumb['url'] }}','_self')">{{ $breadcrumb['label'] }}</h3>

                @endif
            @endif

            @endforeach

        </div>

        <!-- ////////////////////header-right/////////////////////////////// -->
        <div class="header-right-button_one d-flex align-items-center gap-3">
            @if(!empty($additionalData['hasFilterButton']) )
            <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                <i class="{{$additionalData['filterButtonClass'] ?? ''}}"></i>
            </div>
            @endif
            @if(!empty($additionalData['hasAddButton']) && empty($additionalData['isModalOpen']))
            <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                onclick="window.open('{{$additionalData['url'] ?? ''}}','_self')">
                <i class="{{$additionalData['addButtonClass'] ?? ''}}"></i>
            </div>
            @endif
            @if(!empty($additionalData['isModalOpen']) && !empty($additionalData['hasAddButton']))
            <div class="header-right-button_one d-flex align-items-center gap-3">
                <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                    data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                    <i class="{{$additionalData['addButtonClass'] ?? ''}}"></i>
                </div>
            </div>
            @endif
            @if(!empty($additionalData['hasCopiesField']) )
            <div class="copiesSelector" style="display: flex; align-items: center;">
                <span>Number of Copies:</span>
                <button type="button" class="decreaseCopiesBtn">-</button>
                <input type="number" name="copies" value="{{$additionalData['value'] ?? 1}}" min="1" style="text-align: center; width: 50px;" readonly>
                <button type="button" class="increaseCopiesBtn">+</button>
            </div>
            @endif
        </div>

    </div>
</div>