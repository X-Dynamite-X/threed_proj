<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\User;
use App\Events\ChatUserOneToOneEvent;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function store(Request $request, $conversation_id)
    {
        $request->validate([
            'message_text' => 'required',
        ]);
        $message = Message::create([
            "conversation_id"  => $conversation_id,
            "sender_user_id"   => Auth::user()->id,
            "receiver_user_id" =>  $request->input('receiver_user_id'),
            "message_text" => $request->input("message_text"),
        ]);

        broadcast(new ChatUserOneToOneEvent($message->conversation_id, $message->sender_user_id, $message->receiver_user_id, $message->message_text))->toOthers();
        return view('chat.action_chat.broadcast', ['message' => $message]);
    }


    public function receiveMessages(Request $request, $conversation_id)
    {
        $conversation = Conversation::find($conversation_id);
        if ($conversation->user1->id == Auth::user()->id) {
            # code...
            $receive_user = $conversation->user2;
        } else {
            $receive_user = $conversation->user1;
        }
        $message = Message::where("conversation_id",$request->conversation_id)->get()->last();
        // dd($message->message_text);
        return view('chat.action_chat.receive', ['message' => $message, 'receive_user' => $receive_user]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $conversation_id)
    {
        //
        // $conversation =Conversation::where("id",$conversation_id);
        $conversations = Conversation::all();
        $conversation = Conversation::find($conversation_id);
        $messages = Message::where("conversation_id", $conversation_id)
            ->orderBy('created_at', 'asc')
            ->get();
        $users = User::all();
        return view("chat.chat_room", ['conversations' => $conversations, 'users' => $users, 'conversation' => $conversation, "messages" => $messages]);
        // return view("chat.chat_room");

    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
