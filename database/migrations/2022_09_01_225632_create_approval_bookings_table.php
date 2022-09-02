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
        Schema::create('approval_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_booking')->constrained('bookings')->onDelete('cascade');
            $table->string('signed_by')->index()->nullable();
            $table->foreign('signed_by')->references('id')->on('users')->nullOnDelete();
            $table->enum('status', ['approve', 'deny']);
            $table->dateTime('signed_at')->nullable();
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
        Schema::dropIfExists('detail_bookings');
    }
};
