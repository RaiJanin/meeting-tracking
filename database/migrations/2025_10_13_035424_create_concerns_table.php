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
          // CONCERNS TABLE
    
   Schema::create('concerns', function (Blueprint $table) {
    $table->id('concern_id');
    $table->unsignedBigInteger('agenda_id');
    $table->text('description');
$table->foreignId('responsible_person_id')->constrained('users')->onDelete('cascade');
$table->enum('status', ['pending', 'ongoing', 'resolved', 'closed', 'completed'])->default('pending');
    $table->date('due_date')->nullable();
    $table->text('comments')->nullable();
    $table->string('file_path')->nullable();
    $table->timestamps();
    $table->softDeletes();

    // ✅ explicit foreign key definition
    $table->foreign('agenda_id')
          ->references('agenda_id')
          ->on('agendas')
          ->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concerns');
    }
};
