<?php

namespace App\Http\Resources\Device;

use App\Http\Resources\BaseAPIResource;
use Illuminate\Http\Request;

class BlogResource extends BaseAPIResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $fieldsFilter = $request->get('fields');
        if (!empty($fieldsFilter) || $request->get('include')) {
            return $this->resource->toArray();
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'alternative_head_line' => $this->alternative_head_line,
            'image' => $this->image,
            'publish_date' => $this->publish_date,
            'author_name' => $this->author_name,
            'author_image' => $this->author_image,
            'author_email' => $this->author_email,
            'publisher_name' => $this->publisher_name,
            'publisher_url' => $this->publisher_url,
            'publisher_logo' => $this->publisher_logo,
            'keywords' => $this->keywords,
            'article_section' => $this->article_section,
            'article_body' => $this->article_body,
            'description' => $this->description,
            'slug' => $this->slug,
            'url' => $this->url,
            'is_draft' => $this->is_draft,
            'is_deleted' => $this->is_deleted,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'added_by' => $this->added_by,
        ];
    }
}
