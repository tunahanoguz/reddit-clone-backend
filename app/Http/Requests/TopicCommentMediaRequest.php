<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class TopicCommentMediaRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',
            'type' => 'required|string',
            'topic_comment_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a string.',
            'name.max' => 'Name length is max 255.',
            'description.required' => 'Description is required.',
            'description.string' => 'Description must be a string.',
            'order.required' => 'Description is required.',
            'order.integer' => 'Description must be a integer.',
            'type.required' => 'Description is required.',
            'type.string' => 'Description must be a string.',
            'topic_comment_id.required' => 'topic_comment_id is required.',
            'topic_comment_id.integer' => 'topic_comment_id must be a integer.',
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
