<?php

namespace App\Http\Controllers;
use App\Events\MessageSent;
use App\Message;
use Auth;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }
    public function getMessages()
{
    //MENGAMBIL SEMUA LOG PESAN BESERTA USER YANG MENJADI PEMILIKNYA MENGGUNAKAN EAGER LOADING
    //PEMBAHASAN MENGENAI EAGER LOADING BISA DI CARI DI DAENGWEB.ID
    return Message::with('user')->get();
}

//FUNGSI UNTUK BROADCAST SERTA MENYIMPAN KE DATABASE
public function broadcastMessage(Request $request)
{
    $user = Auth::user(); //AMBIL USER YANG SEDANG LOGIN
    //SIMPAN DATA KE TABLE MESSAGES MELALUI USER
    $message = $user->messages()->create([
        'message' => $request->message
    ]);

    //BROADCAST EVENTNYA 
    broadcast(new MessageSent($user, $message))->toOthers();
    return response()->json(['status' => 'Message Sent!']);
}
}
