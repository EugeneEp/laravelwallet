<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class UserRequest extends FormRequest
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
            'password'=>'required|min:5',
        ];

        $arr = explode('@', $this->route()->getActionName());
        $method = $arr[1];

        switch ($method) {
            case 'registration':
                $params['confirm'] = 'min:5';
                break;
            case 'identity':
                $params = [
                    'fullname' => 'required',
                    'passport' => 'required',
                    'passportIssuedAt' => 'required',
                ];
                break;
            case 'picture':
                $params = [
                    'img' => 'required|mimes:jpeg,jpg,png|max:10000',
                ];
                break;
        }

        return $params;

    }

    public function messages()
    {
        return [
            'img'=>'Вы не выбрали файл',
            'img.mimes'=>'Доступные типы файла png jpg jpeg',
            'img.max'=>'Максимальный размер файла 10мб',
            'fullname.required'=>'ФИО обязательное поле',
            'passport.required'=>'Серия пасспорта обязательное поле',
            'passportIssuedAt.required'=>'Дата выдачи обязательное поле',
            'phone.required'=>'Телефон обязательное поле',
            'phone.min'=>'Минимальная длина телефона 11 символов',
            'password.required'=>'Пароль обязательное поле',
            'password.min'=>'Минимальная длина пароля 5 символов',
            'confirm.min'=>'Минимальная длина пароля 5 символов',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new JsonResponse(['errors' => $validator->errors()], 422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
