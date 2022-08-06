<?php

namespace App\Repositories;

use App\Models\Blog;

class BlogRepository extends BaseRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = [
        'id',
        'title',
        'alternative_head_line',
        'image',
        'publish_date',
        'author_name',
        'author_image',
        'author_email',
        'publisher_name',
        'publisher_url',
        'publisher_logo',
        'keywords',
        'article_section',
        'article_body',
        'description',
        'slug',
        'url',
        'is_draft',
        'is_deleted',
        'is_active',
        'created_at',
        'updated_at',
        'updated_by',
        'added_by',
    ];

    /**
     * @return string[]
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * @return string
     */
    public function model(): string
    {
        return Blog::class;
    }

    /**
     * @return string[]
     */
    public function getAvailableRelations(): array
    {
        return ['addedByUser', 'updatedByUser'];
    }
}
