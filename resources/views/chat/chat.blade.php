@extends('layouts.app')
@section('css')
@endsection("css")
@section('chat')
    <div class="container-fluid body h-100">
        <div class="row">
            <div class="chat pepole">
                <div class="card mb-sm-3 mb-md-0 contacts_card">
                    <div class="card-header">
                        {{-- <form action="{{ route('search') }}">
                            @csrf
                            <div class="input-group">
                                <input type="text" placeholder="Search..."  id="search" name="search" class="form-control search" />
                                <div class="input-group-prepend">
                                    <label for="search_btn" class="input-group-text search_btn">
                                        <button id="search_btn" type="button"></button>
                                        <i class="fas fa-search"></i></label>
                                    </span>
                                </div>
                            </div>
                        </form> --}}
                        <form id="searchForm">
                            
                            <div class="input-group">
                                <input type="text" placeholder="Search..." id="search" name="search" class="form-control search" />
                                <div class="input-group-prepend">
                                    <label for="search_btn" class="input-group-text search_btn">
                                        <i class="fas fa-search"></i>
                                    </label>
                                </div>
                            </div>
                    </div>
                    <div class="card-body contacts_body">
                        <ul class="contacts_search">
                        </ul>
                        <hr>
                        <ul class="contacts">
                            @include('chat.contacts')
                        </ul>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>

            <div class="chat message">
                {{-- @include("chat.chat_message") --}}
            </div>
        </div>
    </div>
@endsection("chat")
@section('js')
<script>
    var user_id = {{Auth::user()->id}} ;
    var create_ConversationController=" {{ route('create_ConversationController', ['', '']) }}"
    var csrf_token = "{{ csrf_token() }}";
    var conversation_room = `@include("chat.contacts")`;

</script>
    <script src="{{ asset('js/search.js') }}"></script>

@endsection
