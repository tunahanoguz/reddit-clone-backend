<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class TopicCommentReplyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'body' => 'required|string',
            'parent_comment_id' => 'required|integer',
            'user_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'body.required' => 'Body is required.',
            'body.string' => 'Body must be a string.',
            'parent_comment_id.required' => 'Parent comment id is required.',
            'parent_comment_id.integer' => 'Parent comment id must be a integer.',
            'user_id.required' => 'User id is required.',
            'user_id.integer' => 'User id must be a integer.',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  Validator  $validator
     * @return void
     *
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(['errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
