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
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('titolo', 50);
            $table->text('descrizione');
            $table->text('src')->nullable();
            $table->string('prezzo', 10);
            $table->string('serie', 50);
            $table->string('data_uscita', 10);
            $table->string('genere', 20);
            $table->text('artisti');
            $table->text('scrittori');
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
        Schema::dropIfExists('comics');
    }
};
