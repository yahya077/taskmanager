<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string title
 * @property string description
 * @property UserResource assignedTo
 * @property ProjectResource project
 */
class TaskResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'description' =>  $this->description,
            'assigned_to' => new UserResource($this->assignedTo),
            'project' => new ProjectResource($this->project),
        ];
    }
}
