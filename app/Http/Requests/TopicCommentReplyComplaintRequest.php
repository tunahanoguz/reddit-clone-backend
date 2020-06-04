<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class TopicCommentReplyComplaintRequest extends FormRequest
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
            'email' => 'required|email',
            'complaint_category_id' => 'required|integer',
            'body' => 'required|string',
            'topic_comment_reply_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a email.',
            'complaint_category_id.required' => 'Complaint category id is required.',
            'complaint_category_id.integer' => 'Complaint category id must be a integer.',
            'body.required' => 'Body is required.',
            'body.string' => 'Body must be a string.',
            'topic_comment_reply_id.required' => 'Topic comment reply id is required.',
            'topic_comment_reply_id.integer' => 'Topic comment reply id must be a integer.',
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
