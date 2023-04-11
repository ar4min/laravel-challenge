<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransactionRequest extends BaseRequestValidator
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'amount' => 'required|numeric',
            'webservice_id' => 'required|exists:App\Models\Webservice,id',
            'type' => ['required', Rule::in(array_keys(Transaction::TYPES))],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'type' => $this->route()->parameter('type'),
        ]);
    }

    protected function passedValidation()
    {
        if ($this->has('type')) {
            $this->merge([
                'type' => Transaction::TYPES[$this->type],
            ]);
        }
    }
}
