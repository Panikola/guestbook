<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Feedback extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'user' => $this->user->name,
          'email' => $this->email,
          'body' => $this->body,
          'date' => $this->created_at->diffForHumans(),
          'replies' => $this->replies,
        ];
    }
}
