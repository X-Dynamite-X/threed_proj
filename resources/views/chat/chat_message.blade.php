<div class="card">
    <div class="card-header msg_head">
        <div class="d-flex bd-highlight">
            <div class="img_cont">
                @if ($conversation->user1->id != auth()->id())
                    <img src="{{ asset('image/avatars/' . $conversation->user1->user_avatar) }}"
                        class="rounded-circle user_img" />
                @else
                    <img src="{{ asset('image/avatars/' . $conversation->user2->user_avatar) }}"
                        class="rounded-circle user_img" />
                @endif
                <span class="online_icon"></span>
            </div>
            <div class="user_info">

                <span>Chat with
                    @if ($conversation->user1->id != auth()->id())
                        {{ $conversation->user1->name }}
                    @else
                        {{ $conversation->user2->name }}
                    @endif
                </span>


                <p>1767 Messages</p>
            </div>
            <div class="video_cam">
                <span><i class="fas fa-video"></i></span>
                <span><i class="fas fa-phone"></i></span>
            </div>
        </div>
        <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
        <div class="action_menu">
            <ul>
                <li><i class="fas fa-user-circle"></i> View profile</li>
                <li><i class="fas fa-users"></i> Add to close friends</li>
                <li><i class="fas fa-plus"></i> Add to group</li>
                <li><i class="fas fa-ban"></i> Block</li>
            </ul>
        </div>
    </div>
    <div class="card-body msg_card_body ">
        <div class="message_spase">
            @foreach ($messages as $message)
                @php
                    $createdAt = \Carbon\Carbon::parse($message->created_at);
                    $now = \Carbon\Carbon::now();
                @endphp

                @if ($message->sender_user_id != Auth::user()->id)
                    <div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                            <img src="{{ asset('image/avatars/' . $message->sender->user_avatar) }}"
                                class="rounded-circle user_img_msg" />
                        </div>
                        <div class="msg_cotainer">
                            <p class="text_message">{{ $message->message_text }} </p>
                            {{-- <span class="msg_time"> {{$message->created_at->format('H:i')}} | {{$message->created_at->format('M d, Y  ')}}</span> --}}



                            @if ($createdAt->isToday())
                                {{-- إذا كان الإنشاء اليوم --}}
                                <span class="msg_time">{{ $createdAt->format('H:i') }} today </span>
                            @elseif ($createdAt->isYesterday())
                                {{-- إذا كان الإنشاء يوم أمس --}}
                                <span class="msg_time">{{ $createdAt->format('H:i') }} yesterday</span>
                            @else
                                {{-- إذا كان الإنشاء قبل يومين أو أكثر --}}
                                <span class="msg_time">{{ $createdAt->format('H:i M d, Y') }}</span>
                            @endif

                        </div>
                    </div>
                @else
                    <div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            <p class="text_message">{{ $message->message_text }} </p>


                            @if ($createdAt->isToday())
                                {{-- إذا كان الإنشاء اليوم --}}
                                <span class="msg_time_send">{{ $createdAt->format('H:i') }} today </span>
                            @elseif ($createdAt->isYesterday())
                                {{-- إذا كان الإنشاء يوم أمس --}}
                                <span class="msg_time_send">{{ $createdAt->format('H:i') }} yesterday</span>
                            @else
                                {{-- إذا كان الإنشاء قبل يومين أو أكثر --}}
                                <span class="msg_time_send">{{ $createdAt->format('H:i M d, Y') }}</span>
                            @endif
                        </div>
                        <div class="img_cont_msg ">
                            <img src="{{ asset('image/avatars/' . $message->sender->user_avatar) }}"
                                class="rounded-circle user_img_msg" />
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
    <div class="card-footer">
        <form action="{{ route('store_ConversationController', ['conversation_id' => $conversation->id]) }}"
            id="chatForm" method="post">
            @csrf
            <div class="input-group">
                <div class="input-group-append">
                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                </div>

                <input type="text" id="message_text" name="message_text" class="form-control type_msg"
                    placeholder="Type your message..." />

                @if ($conversation->user1->id != auth()->id())
                    <input type="hidden" name="receiver_user_id" value="{{ $conversation->user1->id }}">
                @else
                    <input type="hidden" name="receiver_user_id" value="{{ $conversation->user2->id }}">
                @endif

                </span>
                {{-- <input type="hidden" name="receiver_user_id" value=""> --}}

                <div class="input-group-append">
                    <label class="input-group-text send_btn "for="send_btn_input">
                        <i class="fas fa-location-arrow">
                            <button type="button" id="send_btn_input" class="send_btn_input">
                            </button>
                        </i>
                    </label>
                </div>

            </div>
        </form>
    </div>
</div>
