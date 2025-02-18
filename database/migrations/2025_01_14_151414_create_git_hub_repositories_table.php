<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('github_repositories', function (Blueprint $table) {
            $table->id();
            $table->string('owner'); // Nom du propriétaire du dépôt
            $table->string('name'); // Nom du dépôt
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('github_repositories');
    }
};
