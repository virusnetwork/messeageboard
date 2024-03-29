<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Models\User;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'comment_content' => $this->comment_content,
            'author_id' => $this->author_id,
            'post_id' => $this->post_id,
            'created_at' => $this->created_at,
            'author_username' => (User::where('id', '=', $this->author_id)->first()->username),
        ];
    }
}
