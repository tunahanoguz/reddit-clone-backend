<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class TopicCommentVoteRequest extends FormRequest
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
            'vote' => 'required|integer',
            'user_id' => 'required|integer',
            'topic_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'vote.required' => 'Vote is required.',
            'vote.integer' => 'Vote is integer.',
            'user_id.required' => 'User id is required.',
            'user_id.integer' => 'User id is integer.',
            'topic_id.required' => 'topic_id is required.',
            'topic_id.integer' => 'topic_id is integer.',
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
