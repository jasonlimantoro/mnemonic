<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use \App\Http\Resources\ImageResource;

class CoupleResource extends Resource
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
			'attributes' => [
				'name' => $this->name,
				'father' => $this->father,
				'mother' => $this->mother,
				'role' => $this->role,
			],
			'image' => new ImageResource($this->whenLoaded('image')),
			'links' => [
				'self' => route('api.couple.show', ['couple' => $this->id])
			]
		];
		
    }
}
