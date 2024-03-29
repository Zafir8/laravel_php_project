<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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
        return [
            'vehicle_category_id' => 'required|exists:vehicle_categories,id',
            'number' => 'required|string|max:255',
            'engine_number' => 'required|string|max:255',
            'chassis_number' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'owner_nic' => 'required|string|max:255',
            'owner_license' => 'required|string|max:255',
            'owner_address' => 'required|string|max:255',
            'owner_mobile' => 'required|string|max:255',
            'status' => 'nullable|boolean',
        ];
    }
}
