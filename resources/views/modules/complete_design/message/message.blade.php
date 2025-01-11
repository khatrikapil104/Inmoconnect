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
                        <div class="pt-2 text-14 font-weight-400 lineheight-18 color-b-blue text-start">
                            {{ $history['message'] ?? '' }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 pt-30 text-end group_chat_history">
                    <div class="chat_box_inquiry_card">
                        <div class="d-flex justify-content-end">
                            <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                {{ $history['message_time'] ?? '' }}
                            </div>
                        </div>
                        <div class="cat_box-small-i">
                            <h6 class="text-16 font-weight-700 color-primary text-center">Inquiry Details</h6>
                        </div>
                        <div class="d-flex gap-1 pt-2">
                            <p class="text-14 color-primary font-weight-700">Customer Name: </p>
                            <p class="color-b-blue font-weight-400 flex-grow-1 flex-shrink-1 text-start "> Brain Baker
                            </p>
                        </div>
                        <div class="d-flex gap-1 pt-2">
                            <p class="text-14 color-primary font-weight-700">Property Name: <span
                                    class="color-b-blue font-weight-400 flex-grow-1 flex-shrink-1 text-start"> Awesome
                                    Interior Apartment</span></p>
                        </div>
                        <div class="d-flex gap-1 pt-2">
                            <p class="text-14 color-primary font-weight-700">Property ID: <span
                                    class="color-b-blue font-weight-400 flex-grow-1 flex-shrink-1 text-start">
                                    RT48</span></p>
                        </div>
                        <div class="d-flex gap-1 pt-2">
                            <p class="text-14 color-primary font-weight-700">Property Price: <span
                                    class="color-b-blue font-weight-400 flex-grow-1 flex-shrink-1 text-start">
                                    Є458,000.00</span></p>
                        </div>
                        <div class="d-flex gap-1 pt-2">
                            <p class="text-14 color-primary font-weight-700">Location:</p><a href=""
                                class="color-b-blue font-weight-400 text-decoration-underline text-start flex-grow-1 flex-shrink-1">
                                C09t5, Santibáñez De Vidriales, Madrid, Málaga, Spain, 49610</a>
                        </div>
                        <div class="d-flex justify-content-center pt-20">
                            <button type="button"
                                class="message-card-button border-r-8 b-color-transparent text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                data-toggle="modal" data-target="#cancelbutton">
                                View Property</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 pt-30 text-end group_chat_history">
                    <div class="chat_box_inquiry_card">
                        <div class="d-flex justify-content-end">
                            <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                {{ $history['message_time'] ?? '' }}
                            </div>
                        </div>
                        <div class="cat_box-small-i">
                            <h6 class="text-16 font-weight-700 color-primary text-center">Inquiry Details</h6>
                        </div>
                        <div class="d-flex gap-1 pt-2">
                            <p class="text-14 color-primary font-weight-700">Customer Name: </p>
                            <p class="color-b-blue font-weight-400 flex-grow-1 flex-shrink-1 text-start "> Brain Baker
                            </p>
                        </div>
                        <div class="d-flex gap-1 pt-2">
                            <p class="text-14 color-primary font-weight-700">Property Name: <span
                                    class="color-b-blue font-weight-400 flex-grow-1 flex-shrink-1 text-start"> Awesome
                                    Interior Apartment</span></p>
                        </div>
                        <div class="d-flex gap-1 pt-2">
                            <p class="text-14 color-primary font-weight-700">Property ID: <span
                                    class="color-b-blue font-weight-400 flex-grow-1 flex-shrink-1 text-start">
                                    RT48</span></p>
                        </div>
                        <div class="d-flex gap-1 pt-2">
                            <p class="text-14 color-primary font-weight-700">Property Price: <span
                                    class="color-b-blue font-weight-400 flex-grow-1 flex-shrink-1 text-start">
                                    Є458,000.00</span></p>
                        </div>
                        <div class="d-flex gap-1 pt-2">
                            <p class="text-14 color-primary font-weight-700">Location:</p><a href=""
                                class="color-b-blue font-weight-400 text-decoration-underline text-start flex-grow-1 flex-shrink-1">
                                C09t5, Santibáñez De Vidriales, Madrid, Málaga, Spain, 49610</a>
                        </div>
                        <div class="d-flex justify-content-center pt-20 gap-3">
                            <button type="button"
                                class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  small-button gardient-button searchFilterBtn"
                                id="searchFilterBtn">
                                View Property
                            </button>
                            <button type="button"
                                class="small-button border-r-8 b-color-transparent text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                data-toggle="modal" data-target="#cancelbutton">
                                View Lead</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 pt-30 text-end group_chat_history">
                    <div class="chat_box_inquiry_card chat_box-event-detail">
                        <div class="d-flex justify-content-end">
                            <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                {{ $history['message_time'] ?? '' }}
                            </div>
                        </div>
                        <div class="cat_box-small-i">
                            <h6 class="text-16 font-weight-700 color-primary text-center">Event Details</h6>
                        </div>
                        <div class=" modal_customer-details modal_margin-detail">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="d-flex gap-12">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" width="40"
                                            height="40" alt="image" class="border-r-4">
                                        <div class="text-start">
                                            <h6 class="text-14 font-weight-700 color-primary">Name:</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">Mona Lott</h6>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-3">
                                    <div class="modal-details-c text-start">
                                        <h6 class="text-14 font-weight-700 color-primary">Mobile Number:</h6>
                                        <h6 class="text-14 font-weight-400 color-b-blue pt-1">+56 123 567 890</h6>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="modal-details-c text-start">
                                        <h6 class="text-14 font-weight-700 color-primary">Email:</h6>
                                        <h6 class="text-14 font-weight-400 color-b-blue pt-1">monalott@gmail.om</h6>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="modal-details-c text-start">
                                        <h6 class="text-14 font-weight-700 color-primary">City</h6>
                                        <h6 class="text-14 font-weight-400 color-b-blue pt-1">Almería</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class=" modal_customer-details modal_margin-detail">
                            <div class="cat_box-small-i">
                                <h6 class="text-16 font-weight-700 color-primary text-center">Property Details</h6>
                            </div>
                            <div class="d-flex align-items-start justify-content-between pt-20">
                                <img src="http://127.0.0.1:8000/img/default-user.jpg" width="60" height="60"
                                    alt="image" class="border-r-8">
                                <button type="button"
                                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">View
                                    Property</button>
                            </div>
                            <div class="row text-start">
                                <div class="col-lg-12 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Property Name</p>
                                        <p class="text-14 color-b-blue font-weight-400">Randeep Apartments</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Property ID:</p>
                                        <p class="text-14 color-b-blue font-weight-400">DA12</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Property Listed As:</p>
                                        <p class="text-14 color-b-blue font-weight-400">For Sale</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Property Price:</p>
                                        <p class="text-14 color-b-blue font-weight-400">€1,000.00</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Property Type:</p>
                                        <p class="text-14 color-b-blue font-weight-400">Apartment</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Property Subtype:</p>
                                        <p class="text-14 color-b-blue font-weight-400">Ground Floor Apartment</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Total Size:</p>
                                        <p class="text-14 color-b-blue font-weight-400">300 m<sup>2</sup></p>
                                    </div>
                                </div>
                                <div class="col-lg-12 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Address:</p>
                                        <p class="text-14 color-b-blue font-weight-400">Comandante Izarduy 57, Vilanova
                                            Del Camí, La Guardia De Jaén, Barcelona, Biscay, 08788</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" modal_customer-details modal_margin-detail">
                            <div class="cat_box-small-i">
                                <h6 class="text-16 font-weight-700 color-primary text-center">Event Details</h6>
                            </div>
                            <div class="row text-start">
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Customer Association:</p>
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" width="24"
                                            height="24" alt="image" class="border-r-4">
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Property Listed As:</p>
                                        <p class="text-14 color-b-blue font-weight-400">For Sale</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12 text-end">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">View
                                        Event</button>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Action:</p>
                                        <p class="text-14 color-b-blue font-weight-400">View Meeting</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Priority Level:</p>
                                        <p class="text-14 color-b-blue font-weight-400">High</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Add Reminder:</p>
                                        <p class="text-14 color-b-blue font-weight-400">Before 30min</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Due Date:</p>
                                        <p class="text-14 color-b-blue font-weight-400">24/09/2024</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Start From:</p>
                                        <p class="text-14 color-b-blue font-weight-400">14:30</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 pt-12">
                                    <div class="d-flex flex-column">
                                        <p class="text-14 color-primary font-weight-700">Add Reminder:</p>
                                        <p class="text-14 color-b-blue font-weight-400">16:00</p>
                                    </div>
                                </div>
                            </div>
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
                            {{ $history['message'] ?? '' }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 pt-30">
                    <div class="chat_m-box">
                        <p class="text-14 font-weight-400 color-white">You have received a new collaboration from <span
                                class="font-weight-700">Ivana Tinkle.</span></p>
                    </div>
                </div>
                <div class="col-lg-12 pt-30">
                    <div class="chat_box_inquiry_card_blue">
                        <div class="d-flex justify-content-between">
                            <p class="color-white text-14 ">Brain Baker</p>
                            <div class="text-14 font-weight-400 lineheight-18 color-white">
                                {{ $history['message_time'] ?? '' }}
                            </div>
                        </div>
                        <div class="cat_box-small-i chat-box-blue">
                            <h6 class="text-16 font-weight-700 color-white text-center">Inquiry Details</h6>
                        </div>
                        <div class="d-flex gap-1 pt-2">
                            <p class="text-14 color-white font-weight-700">Customer Name: </p>
                            <p class="color-white font-weight-400 flex-grow-1 flex-shrink-1 text-start "> Brain Baker
                            </p>
                        </div>
                        <div class="d-flex gap-1 pt-2">
                            <p class="text-14 color-white font-weight-700">Property Name: <span
                                    class="color-white font-weight-400 flex-grow-1 flex-shrink-1 text-start"> Awesome
                                    Interior Apartment</span></p>
                        </div>
                        <div class="d-flex gap-1 pt-2">
                            <p class="text-14 color-white font-weight-700">Property ID: <span
                                    class="color-white font-weight-400 flex-grow-1 flex-shrink-1 text-start">
                                    RT48</span></p>
                        </div>
                        <div class="d-flex gap-1 pt-2">
                            <p class="text-14 color-white font-weight-700">Property Price: <span
                                    class="color-white font-weight-400 flex-grow-1 flex-shrink-1 text-start">
                                    Є458,000.00</span></p>
                        </div>
                        <div class="d-flex gap-1 pt-2">
                            <p class="text-14 color-white font-weight-700">Location:</p><a href=""
                                class="color-white font-weight-400 text-decoration-underline text-start flex-grow-1 flex-shrink-1">
                                C09t5, Santibáñez De Vidriales, Madrid, Málaga, Spain, 49610</a>
                        </div>
                        <div class="d-flex justify-content-center pt-20 gap-3">
                            <button type="button"
                                class="border-r-8 b-color-transparent color-white text-14 font-weight-700 lineheight-18  small-button border-white searchFilterBtn"
                                id="searchFilterBtn">
                                View Property
                            </button>
                            <button type="button"
                                class="small-button border-white border-r-8 b-color-transparent text-14 font-weight-700 lineheight-18 color-white d-flex align-items-center"
                                data-toggle="modal" data-target="#cancelbutton">
                                View Lead</button>
                        </div>
                        <div class=" customer_message-icon">
                            <i class="icon-agnet-request icon-20 color-white"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 pt-30">
                    <div class="chat-event-details-small">
                        <div class="d-flex justify-content-end">
                            <div class="text-14 font-weight-400 lineheight-18 color-primary">
                                {{ $history['message_time'] ?? '' }}
                            </div>
                        </div>
                        <div class="cat_box-small-i">
                            <h6 class="text-16 font-weight-700 color-primary text-center">Event Details</h6>
                        </div>
                        <p class="text-14 color-b-blue font-weight-400 pt-12 text-center">Accept Agreement and Confirm
                            Event <br />with Ivana Tinkle?</p>
                        <div class="d-flex justify-content-center pt-20 gap-3">
                            <button type="button"
                                class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  small-button gardient-button searchFilterBtn"
                                id="searchFilterBtn">
                                Accept
                            </button>
                            <button type="button"
                                class="small-button border-r-8 b-color-transparent text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                data-toggle="modal" data-target="#cancelbutton">
                                Reject</button>
                        </div>
                    </div>
                </div>
            @endif
        @endif
        @php $tempCreatedAt = $history['created_at']; @endphp
    @endforeach
@endif
