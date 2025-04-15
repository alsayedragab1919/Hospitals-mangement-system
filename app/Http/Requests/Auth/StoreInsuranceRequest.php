<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreInsuranceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'insurance_code' => 'required',
            'discount_percentage' =>'required|numeric',
            'Company_rate' =>'required|numeric',
            'name' => 'required|unique:insurance_translations,name,'.$this->id,
        ];
    }
    public function messages()
    {
        return [
            'insurance_code.required' => trans('Dashboard/validation.required'),
            'discount_percentage.required' => trans('Dashboard/validation.required'),
            'discount_percentage.numeric' => trans('Dashboard/validation.numeric'),
            'Company_rate.required' => trans('Dashboard/validation.required'),
            'Company_rate.numeric' => trans('Dashboard/validation.numeric'),
            'name.required' => trans('Dashboard/validation.required'),
            'name.unique' => trans('Dashboard/validation.unique'),
        ];
    }
}
