<?php

namespace App\Events;

use App\Reply;
use App\Http\Resources\Reply as ReplyResource;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ReplyCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reply;


    public function __construct(Reply $reply)
    {
        $this->reply = new ReplyResource($reply);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $userId = $this->reply->feedback->user->id;

        return new PrivateChannel('reply.'.$this->reply->feedback->user->id);
    }
}
