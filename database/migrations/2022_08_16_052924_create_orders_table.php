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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('name')->nullable();
            $table->json('items')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->decimal('total',6,2)->nullable();
            $table->text('info')->nullable();
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
        Schema::dropIfExists('orders');
    }
};