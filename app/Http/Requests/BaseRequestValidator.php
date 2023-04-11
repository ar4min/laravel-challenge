<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequestValidator extends FormRequest
{
    public function validatedByRules(): array
    {
        return array_merge($this->validator->validated(),$this->only(array_keys($this->rules())) );
    }
}
