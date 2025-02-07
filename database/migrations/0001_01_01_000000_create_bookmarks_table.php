<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id();
            $table->string('color')->default(fake()->hexColor());
            $table->string('title')->nullable()->default('');
            $table->string('link')->default(fake()->url())->nullable();
            $table->string('bookmark_group')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();



        });

        Schema::create('bookmark_groups', function (Blueprint $table) {
            $table->string('name')->default(fake()->streetName())->primary()->unique();
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
        Schema::dropIfExists('bookmark_groups');
    }
};
