<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operator_attedance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operator_id')->constrained('operator')->onDelete('cascade');
            $table->foreignId('shift_report_id')->constrained('shift_report')->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operator_attedance');
    }
};
