<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'webservice_id' => $this->webservice_id,
            'amount' => $this->amount,
            'type' => $this->type_name,
            'webservice' => new WebserviseResource($this->webservice),
            'created_at' => $this->created_at
        ];
    }
}
