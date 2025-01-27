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
        Schema::create('operator_report', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('shift_report_id')->constrained('shift_report')->onDelete('cascade');
            $table->integer('total_unit');
            $table->integer('siap_mancal');
            $table->integer('dfit')->nullable();
            $table->integer('sakit')->nullable();
            $table->integer('stb')->nullable();
            $table->integer('mp_exp')->nullable();
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
        Schema::dropIfExists('operator_report');
    }
};
