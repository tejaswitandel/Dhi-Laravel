<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('alternative_head_line')->nullable();
            $table->string('image')->nullable();
            $table->string('publish_date')->nullable();
            $table->string('author_name')->nullable();
            $table->string('author_image')->nullable();
            $table->string('author_email')->nullable();
            $table->string('publisher_name')->nullable();
            $table->string('publisher_url')->nullable();
            $table->string('publisher_logo')->nullable();
            $table->string('keywords')->nullable();
            $table->string('article_section')->nullable();
            $table->string('article_body')->nullable();
            $table->string('description')->nullable();
            $table->string('slug')->nullable();
            $table->string('url')->nullable();
            $table->boolean('is_draft')->nullable();
            $table->boolean('is_deleted')->nullable();
            $table->boolean('is_active')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
        });

        try {
            \DB::statement('create index index_title using BTREE on blogs (title (10) ASC)');
            \DB::statement('create index index_publishdate using BTREE on blogs (publish_date (10) DESC)');
        } catch (\Exception $e) {
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
