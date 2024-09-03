<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('status')->nullable();
            $table->text('extras')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key to categories table
            $table->foreignId('sub_category_id')->constrained()->onDelete('cascade'); // Foreign key to sub_categories table
            $table->unsignedBigInteger('added_by')->nullable(); // ID of the user who added the product
            $table->unsignedBigInteger('updated_by')->nullable(); // ID of the user who last updated the product
            $table->timestamps();

            // Foreign keys for users table
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
