<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); //kolom id

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('title'); //Berita Olahraga Terkini

            $table->string('slug')->unique(); //berita-olahraga-terkini-1405

            $table->string('excerpt', 500)->nullable();

            $table->longText('content');

            $table->string('thumbnail')->nullable();

            $table->string('featured_image')->nullable();

            $table->enum('status', [
                'draft',
                'review',
                'published',
                'archived'
            ])->default('draft');

            $table->boolean('is_featured')->default(false);

            $table->boolean('is_breaking_news')->default(false);

            $table->unsignedBigInteger('views')->default(0);

            $table->timestamp('published_at')->nullable();

            $table->timestamp('scheduled_at')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('status');
            $table->index('published_at');
            $table->index('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
