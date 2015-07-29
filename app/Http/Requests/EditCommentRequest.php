<?php

namespace App\Http\Requests;

use App\Comment;
use App\Http\Requests\Request;

class EditCommentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $comment = Comment::find($request->id);
        if ($comment->user_id == user()->id){
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
            'content' => 'required',
            'snip_id' => 'exists:snip,id'
        ];
    }
}
