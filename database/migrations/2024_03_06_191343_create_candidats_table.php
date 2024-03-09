<?php

use App\Concers\GenderEnum;
use App\Models\Commune;
use App\Models\User;
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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('prenon');
            $table->date('date_naissance');
            $table->string('id_carte_electeur')->unique()->nullable();
            $table->string('photos')->nullable();
            $table->enum('gender', [
                GenderEnum::Homme->value,
                GenderEnum::Femme->value]
            )->default(GenderEnum::Homme->value);
            $table->foreignIdFor(Commune::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
