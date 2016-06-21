<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PostIsSaved extends Event
{
    use SerializesModels;

    public $post, $input;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($post, $input)
    {
        $this->post = $post;
        $this->input = $input;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
