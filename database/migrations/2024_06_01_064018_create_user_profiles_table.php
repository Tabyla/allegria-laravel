<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    private const string TABLE_NAME = 'user_profiles';

    public function up(): void
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('surname');
            $table->string('firstname');
            $table->string('phone');
            $table->string('address')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
