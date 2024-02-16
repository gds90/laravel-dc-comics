<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // recupero il contenuto del file config/comics.php
        $comics = config('comics');

        // ciclo l'array per crearmi i record della tabella
        foreach ($comics as $comic) {
            $new_comic = new Comic();
            $new_comic->titolo = $comic['title'];
            $new_comic->descrizione = $comic['description'];
            $new_comic->src = $comic['thumb'];
            $new_comic->prezzo = $comic['price'];
            $new_comic->serie = $comic['series'];
            $new_comic->data_uscita = $comic['sale_date'];
            $new_comic->genere = $comic['type'];
            $new_comic->artisti = implode(', ', $comic['artists']);
            $new_comic->scrittori = implode(', ', $comic['writers']);
            $new_comic->save();
        }
    }
}
