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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("image");
            $table->longText("description");
            $table->string("views")->default(0);
            $table->longText("meta_keywords")->nullable();
            $table->longText("meta_description")->nullable();
            $table->string("status")->default("pending");
            // $table->enum("status",["pending", "approved", "rejected"])->default("pending");
            // enum not supported in filament
            $table->timestamps();
        });
        Schema::create('article_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId("article_id")->constrained()->cascadeOnDelete();
            $table->foreignId("category_id")->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_category');
        Schema::dropIfExists('articles');
    }
};
