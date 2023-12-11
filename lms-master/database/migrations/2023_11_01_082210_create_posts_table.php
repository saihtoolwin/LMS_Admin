<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('media_category_id'); // Make sure it's unsigned
            $table->string('title');
            $table->text('description');
            $table->binary('featured_image');
            // $table->unsignedBigInteger('post_images_id');
            $table->string('status');
            $table->timestamps();

            // Add foreign key constraint only if the media_categories table exists
            if (Schema::hasTable('media_categories')) {
                $table->foreign('media_category_id')
                    ->references('id')
                    ->on('media_categories')
                    ->onDelete('cascade');

                // $table->foreign('post_images_id')
                //     ->references('id')
                //     ->on('post_images')
                //     ->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
