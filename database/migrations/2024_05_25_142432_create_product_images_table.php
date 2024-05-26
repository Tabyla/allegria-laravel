<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration
{
    private const string TABLE_NAME = 'product_images';

    public function up(): void
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('categories')->onDelete('set null');
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('main_image_id')->nullable()->constrained('product_images');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(self::TABLE_NAME);

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['main_image_id']);
            $table->dropColumn('main_image_id');
        });
    }
}
