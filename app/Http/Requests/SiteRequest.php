<?php

namespace AgenciaS3\Http\Requests;

use AgenciaS3\Entities\Configuration;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SiteRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        if (!$request->session()->has('configuration')) {
            $config = Configuration::orderBy('order', 'asc')->get();
            $arrayConfig = [];
            foreach ($config as $row) {
                $arrayConfig[$row->id] = [
                    'id' => $row->id,
                    'name' => $row->name,
                    'description' => $row->description
                ];
            }
            $request->session()->put('configuration', $arrayConfig);
        }

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
            //
        ];
    }
}
