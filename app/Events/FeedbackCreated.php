<?php

namespace App\Events;

use App\Feedback;
use App\Http\Resources\Feedback as FeedbackResource;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FeedbackCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $feedback;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Feedback $feedback)
    {
        $this->feedback = new FeedbackResource($feedback);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('feedback');
    }

    /**
     * Get the tags that should be assigned to the job. for Horizon
     *
     * @return array
     */
    public function tags()
    {
        return ['Feedback-Created', 'id:'.$this->feedback->id];
    }
}
