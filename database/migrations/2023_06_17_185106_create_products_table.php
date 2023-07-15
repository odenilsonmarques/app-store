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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->uuid('uuid'); //esse atributo gera um sequencia de caracteres dinamicos para cada insert. optou-se por usá-lo ao inves de mostrar os id(primary key) de cada registro
            $table->string('name');
            $table->integer('quantity');
            $table->integer('confirm_quantity');
            $table->integer('minimum_quantity');
            $table->double('cost_price', 10,2)->default(0);
            $table->double('sale_price', 10,2)->default(0);
            $table->string('photo');
            $table->string('description');
            $table->string('feature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
