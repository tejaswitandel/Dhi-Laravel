<?php

namespace App\Http\Requests\Device;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogAPIRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string'],
            'alternative_head_line' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'publish_date' => ['nullable', 'string'],
            'author_name' => ['nullable', 'string'],
            'author_image' => ['nullable', 'string'],
            'author_email' => ['nullable', 'string'],
            'publisher_name' => ['nullable', 'string'],
            'publisher_url' => ['nullable', 'string'],
            'publisher_logo' => ['nullable', 'string'],
            'keywords' => ['nullable', 'string'],
            'article_section' => ['nullable', 'string'],
            'article_body' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'slug' => ['nullable', 'string'],
            'url' => ['nullable', 'string'],
            'is_draft' => ['nullable', 'boolean'],
            'is_deleted' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
