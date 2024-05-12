@foreach ($users as $user)
    @if ($user->id != Auth::user()->id)
        <label for="send_req{{ $user->id }}" style="width: 100%;">
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
                    <button type="submit"id="send_req{{ $user->id }}" class="send_req"></button>
                </form>
            </li>
        </label>
    @endif
    <hr>
@endforeach
