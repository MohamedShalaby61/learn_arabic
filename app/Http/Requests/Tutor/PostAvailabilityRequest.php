<?php

namespace App\Http\Requests\Tutor;

use Illuminate\Foundation\Http\FormRequest;

class PostAvailabilityRequest extends FormRequest
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
        $rules = [];
        foreach ($this->request->get('from') as $key => $value) {
            $rules['from.'.$key] = 'required|date_format:H:i';
        }
        foreach ($this->request->get('to') as $key => $value) {
            $rules['to.'.$key] = 'required|date_format:H:i|after:from.'.$key;
        }
        return $rules;
    }

    public function messages()
    {
        $messages = [];
        foreach($this->request->get('to') as $key => $val)
        {
            $messages['to.'.$key.'.after'] = 'The field labeled "To" must be greater than "FROM" label.';
        }
        return $messages;
    }
}
