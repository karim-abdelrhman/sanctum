<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'UserName' => $this->name,
            'email' => $this->email,
            'created_at' => Carbon::translateTimeString($this->created_at),
            'updated_at' => $this->updated_at,
//            'posts' => $this->whenLoaded('posts')
            'posts' => PostResource::collection($this->whenLoaded('posts')),
        ];

//        $data = parent::toArray($request);
//        $data['fullName'] = $this->name . 'Full_Name';
//        dd($data) ;
//        return parent::toArray($request);
    }
}
