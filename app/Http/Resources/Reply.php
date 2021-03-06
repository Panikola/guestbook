<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Reply extends JsonResource
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
          'body' => $this->body,
          'date' => $this->created_at->diffForHumans(),
          'feedback' => [
            'id' => $this->feedback->id,
            'user' => $this->feedback->user->name,
            'body' => $this->feedback->body,
          ],
        ];
    }
}
