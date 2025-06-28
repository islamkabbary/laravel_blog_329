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
            // id (PK) - title (varchar(255)) - content text  
            $table->id();
            $table->string('title', 255)->unique();
            $table->text("content");
            $table->integer("views")->nullable();



            
            
            
            // 
            $table->date('publish_data')->nullable();
            $table->datetime('publish_at')->nullable();
            $table->decimal("price",8,2)->nullable();
            $table->enum("status",["draft",'published'])->default('draft');
            $table->timestamps();
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
