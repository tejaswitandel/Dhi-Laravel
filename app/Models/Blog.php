<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Blog extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'blogs';

    /**
     * @var string[]
     */
    protected $fillable = [
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
     * @var string[]
     */
    protected $casts = [
        'title' => 'string',
        'alternative_head_line' => 'string',
        'image' => 'string',
        'publish_date' => 'string',
        'author_name' => 'string',
        'author_image' => 'string',
        'author_email' => 'string',
        'publisher_name' => 'string',
        'publisher_url' => 'string',
        'publisher_logo' => 'string',
        'keywords' => 'string',
        'article_section' => 'string',
        'article_body' => 'string',
        'description' => 'string',
        'slug' => 'string',
        'url' => 'string',
        'is_draft' => 'boolean',
        'is_deleted' => 'boolean',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];
}
