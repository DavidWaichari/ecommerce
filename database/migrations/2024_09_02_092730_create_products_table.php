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
            $table->string('part_number')->nullable();
            $table->string('series')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('featured_image')->nullable();
            $table->text('images')->nullable();
            $table->decimal('selling_price', 10, 2)->default(0);
            $table->decimal('discount_price', 10, 2)->default(0);
            $table->decimal('in_stock', 10, 2)->default(0);
            $table->decimal('instock', 10, 2)->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_sold')->default(false);
            $table->text('link')->nullable();
            $table->string('condition')->nullable();
            $table->string('status')->nullable();
            $table->text('extras')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('processor_id')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable(); // ID of the user who last updated the product
            $table->timestamps();

            // Foreign keys for users table
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
