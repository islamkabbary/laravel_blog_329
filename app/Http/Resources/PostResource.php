<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "user" => $this->user->name,
            "image" => $this->whenNotNull($this->image),
            "status" => $this->when($this->role == "author",$this->status),
            "UserAuth" => Auth::user()->email,
        ];
    }
}
