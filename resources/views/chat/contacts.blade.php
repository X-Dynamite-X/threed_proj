{{-- @foreach ($users as $user)
    @if ($user->id != Auth::user()->id)
        <label for="send_req{{$user->id}}" style="width: 100%;">
            <li>
                <div class="d-flex bd-highlight" style="width: 100%">
                    <div class="img_cont">
                        <img src='{{ asset('image/avatars/' . $user->user_avatar) }}' class="rounded-circle user_img" />
                        <span class="online_icon"></span>
                    </div>
                    <div class="user_info">
                        <span>{{ $user->name }}</span>
                        <p>{{ $user->name }} is online</p>
                    </div>
                </div>
                <form
                    action="{{ route('create_ConversationController', ['user1_id' => Auth::user()->id, 'user2_id' => $user->id]) }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="user1_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="user2_id" value="{{ $user->id }}">
                    <button type="submit"id="send_req{{$user->id}}" class="send_req"></button>
                </form>
            </li>
        </label>
    @endif
    <hr>
@endforeach --}}



@foreach ($conversations as $conversation)
    @if ($conversation->user1->id == Auth::user()->id || $conversation->user2->id == Auth::user()->id)
        <a href="{{ route('show_ConversationController', ['conversation_id' => $conversation->id]) }}">
            <li>
                @if ($conversation->user1->id == Auth::user()->id)
                    <div class="d-flex bd-highlight" style="width: 100%">
                        <div class="img_cont">
                            <img src='{{ asset('image/avatars/' . $conversation->user2->user_avatar) }}'
                                class="rounded-circle user_img" />
                            <span class="online_icon"></span>
                        </div>
                        <div class="user_info">
                            <span>{{ $conversation->user2->name }}</span>
                            <p>{{ $conversation->user2->name }} is online</p>
                        </div>
                    </div>
                @else
                    <div class="d-flex bd-highlight" style="width: 100%">
                        <div class="img_cont">
                            <img src='{{ asset('image/avatars/' . $conversation->user1->user_avatar) }}'
                                class="rounded-circle user_img" />
                            <span class="online_icon"></span>
                        </div>
                        <div class="user_info">
                            <span>{{ $conversation->user1->name }}</span>
                            <p>{{ $conversation->user1->name }} is online</p>
                        </div>
                    </div>
                @endif
            </li>
        </a>
    @endif
@endforeach
