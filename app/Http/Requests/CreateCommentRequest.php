<?php

namespace App\Http\Requests;

use App\Comment;
use App\Http\Requests\Request;

class CreateCommentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
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
            'content' => 'required',
            'snip_id' => 'exists:snip,id'
        ];
    }
}
