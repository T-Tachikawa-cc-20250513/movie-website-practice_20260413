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
        Schema::create('cast_work', function (Blueprint $table) {
            $table->id();

            // 作品ID
            $table->foreignId('work_id')->constrained()->onDelete('cascade');

            // キャストID
            $table->foreignId('cast_id')->constrained()->onDelete('cascade');

            // 役名
            $table->string('role_name')->nullable();
            
            $table->string('job_type')->default('actor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cast_work');
    }
};
