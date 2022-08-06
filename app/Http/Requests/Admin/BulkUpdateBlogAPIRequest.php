<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BulkUpdateBlogAPIRequest extends FormRequest
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
            'data.*.title' => ['nullable', 'string'],
            'data.*.alternative_head_line' => ['nullable', 'string'],
            'data.*.image' => ['nullable', 'string'],
            'data.*.publish_date' => ['nullable', 'string'],
            'data.*.author_name' => ['nullable', 'string'],
            'data.*.author_image' => ['nullable', 'string'],
            'data.*.author_email' => ['nullable', 'string'],
            'data.*.publisher_name' => ['nullable', 'string'],
            'data.*.publisher_url' => ['nullable', 'string'],
            'data.*.publisher_logo' => ['nullable', 'string'],
            'data.*.keywords' => ['nullable', 'string'],
            'data.*.article_section' => ['nullable', 'string'],
            'data.*.article_body' => ['nullable', 'string'],
            'data.*.description' => ['nullable', 'string'],
            'data.*.slug' => ['nullable', 'string'],
            'data.*.url' => ['nullable', 'string'],
            'data.*.is_draft' => ['nullable', 'boolean'],
            'data.*.is_deleted' => ['nullable', 'boolean'],
            'data.*.is_active' => ['nullable', 'boolean'],
        ];
    }
}
