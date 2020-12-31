<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class SmsRequest extends FormRequest
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
    public function rules()
    {
        $params = [
            'phone'=>'required|min:11',
            'type'=>'required',
        ];

        $arr = explode('@', $this->route()->getActionName());
        $method = $arr[1];

        switch ($method) {
            case 'check':
                $params['code'] = 'min:4|max:4';
                break;
        }

        return $params;
    }

    public function messages()
    {
        return [
            'phone.required'=>'Телефон обязательное поле',
            'phone.min'=>'Телефон некорректный',
            'code.min'=>'Длина кода должна быть 4 символа',
            'code.max'=>'Длина кода должна быть 4 символа',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new JsonResponse(['errors' => $validator->errors()], 422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
