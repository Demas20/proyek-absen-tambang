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
        Schema::create('awb', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('shift_report_id')->constrained('shift_report')->onDelete('cascade');
            $table->string('awb_type', 50);
            $table->integer('populasi');
            $table->integer('running');
            $table->integer('breakdown');
            $table->text('detail_bd')->nullable();
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
        Schema::dropIfExists('awb');
    }
};
