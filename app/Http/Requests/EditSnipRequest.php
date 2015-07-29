<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Snip;

class EditSnipRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $snip = Snip::find($request->id);
        if ($snip->user_id == user()->id){
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'content' => 'required'
        ];
    }
}
