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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('age')->nullable();
            $table->string('contact_no', 11)->nullable();
            $table->rememberToken();
            $table->string('status', 50)->default('active');
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('client_name');
            $table->string('owner_name')->nullable();
            $table->string('website_link')->nullable();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('caption')->nullable();
            $table->text('content');
            $table->string('idea')->nullable();
            $table->json('images')->nullable();
            $table->unsignedBigInteger('category_id')->index('posts_category_id_foreign')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->dateTime('schedule_datetime');
            $table->unsignedBigInteger('creator_id')->index('posts_creator_id_foreign')->nullable();
            $table->foreign('creator_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->unsignedBigInteger('reviewer_id')->index('posts_reviewer_id_foreign')->nullable();
            $table->foreign('reviewer_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->unsignedBigInteger('assignee_id')->index('posts_assignee_id_foreign')->nullable();
            $table->foreign('assignee_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->string('status', 50);
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_id')->index('posts_creator_id_foreign')->nullable();
            $table->foreign('creator_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->unsignedBigInteger('post_id')->index('posts_post_id_foreign')->nullable();
            $table->foreign('post_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->text('comment');
            $table->text('other_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('godesq_pms_db_tables');
    }
};
