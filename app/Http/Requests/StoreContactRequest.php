<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Psy\Readline\Hoa\Console;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return [];
                }
            case 'POST': {
                    return [
                        'name' => 'required|string',
                        'email' => 'required|email|unique:contacts',
                        'phone' => 'required|unique:contacts|regex:/^[0-9]{4}-[0-9]{4}$/'
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                return [
                    'name' => 'required|string',
                    'email' => 'required|email|unique:contacts,email,'. $this->route('contact')->id,
                    'phone' => 'required|regex:/^[0-9]{4}-[0-9]{4}$/|unique:contacts,phone,'.$this->route('contact')->id
                ];
            }
            default: break;
        }        
    }

    // public function messages(): array
    // {
    //     return [
    //         'name.required' => 'Este campo es obligatorio',
    //         'name.string' => 'Este campo debe de ser tipo texto',
    //         'email.required' => 'Este campo es obligatorio',
    //         'email.email' => 'El correo ingresado no es válido',
    //         'email.unique' => 'El correo ingresado ya esta registrado',
    //         'phone.required' => 'Este campo es obligatorio',
    //         'phone.unique' => 'El teléfono ingresado ya esta registrado',
    //         'phone.regex' => 'Formato requerido 0000-0000'

    //     ];
    // }
}
