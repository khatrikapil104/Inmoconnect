@if ($results->isNotEmpty())
    <div class="row mt-3">
        @if (empty($type) || (!empty($type) && $type == 'only_text'))
            <div class="col-12 col-sm-6 col-md-6">
                <div class="dataTables_info justify-content-center justify-content-sm-start d-flex h-100 align-items-center">
                    {{ trans('messages.pagination.Showing') }} {{ $results->firstItem() }} - {{ $results->lastItem() }}
                    {{ trans('messages.pagination.of') }} {{ $results->total() }}
                    {{ trans('messages.pagination.results') }}
                </div>
            </div>
        @endif
        {{-- @if (empty($type) || (!empty($type) && $type == 'only_pagination'))
            <div class="col-12 col-sm-6 col-md-6">
                <div class="d-flex justify-content-center justify-content-sm-end align-items-center">

                    <?php
                    $link_limit = 6;
                    ?>
                    @if ($results->lastPage() > 1)
                        <div class="dataTables_paginate paging_full_numbers">
                            <ul class="pagination">

                                @for ($i = 1; $i <= $results->lastPage(); $i++)
                                    <?php
                                    $half_total_links = floor($link_limit / 2);
                                    $from = $results->currentPage() - $half_total_links;
                                    $to = $results->currentPage() + $half_total_links;
                                    if ($results->currentPage() < $half_total_links) {
                                        $to += $half_total_links - $results->currentPage();
                                    }
                                    if ($results->lastPage() - $results->currentPage() < $half_total_links) {
                                        $from -= $half_total_links - ($results->lastPage() - $results->currentPage()) - 1;
                                    }
                                    ?>
                                    @if ($from < $i && $i < $to)
                                        <li
                                            class="paginate_button page-item{{ $results->currentPage() == $i ? ' active' : '' }}">
                                            <a href='javascript:void(0)' data-current-page="{{ $i }}"
                                                class="page-link">{{ $i }}</a>
                                        </li>
                                    @endif
                                @endfor
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        @endif --}}
        @if (empty($type) || (!empty($type) && $type == 'only_pagination'))
            <div class="col-12 col-sm-6 col-md-6">
                <div class="d-flex justify-content-center justify-content-sm-end align-items-center">
                    <?php
                    $link_limit = 6;
                    ?>
                    @if ($results->lastPage() > 1)
                        <div class="dataTables_paginate paging_full_numbers">
                            <ul class="pagination">
                                <!-- Previous Button -->
                                <li
                                    class="paginate_button page-item {{ $results->currentPage() == 1 ? ' disabled' : '' }}">
                                    <a href='javascript:void(0)' data-current-page="{{ $results->currentPage() - 1 }}"
                                        class="page-link">Pre</a>
                                </li>
                                <?php
                                $half_total_links = floor($link_limit / 2);
                                $from = $results->currentPage() - $half_total_links;
                                $to = $results->currentPage() + $half_total_links;
                                if ($results->currentPage() < $half_total_links) {
                                    $to += $half_total_links - $results->currentPage();
                                }
                                if ($results->lastPage() - $results->currentPage() < $half_total_links) {
                                    $from -= $half_total_links - ($results->lastPage() - $results->currentPage()) - 1;
                                }
                                ?>
                                @for ($i = 1; $i <= $results->lastPage(); $i++)
                                    @if ($from < $i && $i < $to)
                                        <li
                                            class="paginate_button page-item{{ $results->currentPage() == $i ? ' active' : '' }}">
                                            <a href='javascript:void(0)' data-current-page="{{ $i }}"
                                                class="page-link">{{ $i }}</a>
                                        </li>
                                    @endif
                                @endfor
                                <!-- Next Button -->
                                <li
                                    class="paginate_button page-item {{ $results->currentPage() == $results->lastPage() ? ' disabled' : '' }}">
                                    <a href='javascript:void(0)' data-current-page="{{ $results->currentPage() + 1 }}"
                                        class="page-link text-14 color-b-blue">Next</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        @endif

    </div>
@endif
