<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
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
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'Locale' => app()->getLocale()
        ];
//        $data = parent::toArray($request);
//        $data['created_at'] = Carbon::parse($this->created_at)->toDateString();
//
//        return $data;
    }
}
