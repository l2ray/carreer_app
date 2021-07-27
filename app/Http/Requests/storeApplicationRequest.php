<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeApplicationRequest extends FormRequest
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

        return [

                'first_name' => 'required|max:60',
                'last_name' => 'required|max:60',
                'email' => 'required|email',
                'date_of_birth' => 'required|date',
                'mobile_number' => ['required','numeric','regex:/^[2,3,6,7,9]\d{6}$/'],
                'highest_qualification' => 'required',
                'field_of_work' => 'required',
                'area_of_interest' => 'required',
                'cv_resume' => 'required',
                'address' => 'required',


        ];
    }
}
