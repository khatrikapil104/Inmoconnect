@if (!empty($chat_histories))
    @php $tempCreatedAt = "";  @endphp
    @foreach ($chat_histories as $history)
        @if (empty($request->record_id))
            @if (date('Y-m-d', strtotime($history['created_at'])) != date('Y-m-d', strtotime($tempCreatedAt)))
                @if (date('Y-m-d', strtotime($history['created_at'])) == date('Y-m-d'))
                    <div class="col-lg-12 pt-30">
                        <div class="day_chat text-14 font-weight-400 color-b-blue lineheight-18 text-center">
                            <span>{{ trans('messages.today_message') }}</span>
                        </div>
                    </div>
                @elseif(date('Y-m-d', strtotime($history['created_at'])) == date('Y-m-d', strtotime('-1 day')))
                    <div class="col-lg-12 pt-30">
                        <div class="day_chat text-14 font-weight-400 color-b-blue lineheight-18 text-center">
                            <span>{{ trans('messages.Yesterday_messagae') }}</span>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12 pt-30">
                        <div class="day_chat text-14 font-weight-400 color-b-blue lineheight-18 text-center">
                            <span>{{ date('d/m/Y', strtotime($history['created_at'])) }}</span>
                        </div>
                    </div>
                @endif
            @endif
        @endif

        @if (!empty($history['is_upload']))
            @if ($history['sender_id'] == auth()->user()->id)
                <div class="col-lg-12 pt-30 d-flex justify-content-end align-items-center">
                    <a href="{{ getFileUrl(!empty($history['filename']) ? $history['filename'] : '', 'files') }}"
                        download="{{ !empty($history['filename']) ? $history['filename'] : '' }}" class="download-icon">
                        <i class=" icon-Download"></i>
                    </a>
                    <div class="chat_box-two">

                        <div class="d-flex justify-content-end">
                            <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                {{ $history['message_time'] ?? '' }}
                            </div>
                        </div>

                        <div class="chat_box-download mt-1">
                            <div class="d-flex gap-2 align-items-baseline pt-2 justify-content-between p-2">
                                <i class=" icon-property-listing text-16 color-b-blue"></i>
                                <div class="chat_file-text text-start">
                                    <div class="text-14 font-weight-700 lineheight-18 color-primary">
                                        {{ !empty($history['filename']) ? $history['filename'] : '' }}</div>
                                    <div class="text-12 font-weight-400 lineheight-18 color-b-blue">
                                        {{ !empty($history['filesize']) ? formatFileSize($history['filesize']) : '' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @else
                <div class="col-lg-12 pt-30 d-flex justify-content-start align-items-center gap-4">
                    <a href="{{ getFileUrl(!empty($history['filename']) ? $history['filename'] : '', 'files') }}"
                        download="{{ !empty($history['filename']) ? $history['filename'] : '' }}" class="download-icon">
                        <i class=" icon-Download"></i>
                    </a>
                    <div class="chat_m-box">
                        <div class="text-14 font-weight-400 lineheight-18 color-white">{{ $receiverData->name ?? '' }}
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="text-14 font-weight-400 lineheight-18 color-white">
                                {{ $history['message_time'] ?? '' }}
                            </div>
                        </div>
                        <div class="chat_box-download mt-1">
                            <div class="d-flex gap-2 align-items-baseline pt-2 justify-content-between p-2">
                                <i class=" icon-property-listing text-16 color-white"></i>
                                <div class="chat_file-text text-start">
                                    <div class="text-14 font-weight-700 lineheight-18 color-primary">
                                        {{ !empty($history['filename']) ? $history['filename'] : '' }}</div>
                                    <div class="text-12 font-weight-400 lineheight-18 color-b-blue">
                                        {{ !empty($history['filesize']) ? formatFileSize($history['filesize']) : '' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endif
        @else
            @if ($history['sender_id'] == auth()->user()->id)
                <div class="col-lg-12 pt-30 text-end group_chat_history">
                    <div class="chat_box-two">

                        <div class="d-flex justify-content-end">
                            <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                {{ $history['message_time'] ?? '' }}
                            </div>
                        </div>
                        <div class="pt-2 text-14 font-weight-400 lineheight-18 color-b-blue">
                           {!! $history['message'] ?? '' !!}
                        </div>
                    </div>

                </div>
            @else
                <div class="col-lg-12 pt-30">
                    <div class="chat_m-box">
                        <div class="d-flex gap-5 align-items-center justify-content-between">
                            <div class="text-14 font-weight-400 lineheight-18 color-white">
                                {{ $receiverData->name ?? '' }}
                            </div>
                            <div class="text-14 font-weight-400 lineheight-18 color-white">
                                {{ $history['message_time'] ?? '' }}
                            </div>
                        </div>
                        <div class="pt-2 text-14 font-weight-400 lineheight-18 color-white">
                            {!! $history['message'] ?? '' !!}
                        </div>
                    </div>
                </div>
            @endif
        @endif
        @php $tempCreatedAt = $history['created_at']; @endphp
    @endforeach
@endif
