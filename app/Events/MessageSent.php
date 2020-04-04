<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

//TAMBAHKAN USE STATEMENT INI
use App\User;
use App\Message;

//PASTIKAN ShouldBroadcast DI IMPLEMENTASIKAN
class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
  
    //CLASS INI MEMINTA DATA BERUPA USER DAN MESSAGE YANG AKAN DIBROADCAST
    public function __construct(User $user, Message $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    //KEMUDIAN BROADCASTNYA MENGGUNAKAN PRIVATECHANNEL DENGAN NAMA CHAT
    public function broadcastOn()
    {
        return new PrivateChannel('chat');
    }
}
