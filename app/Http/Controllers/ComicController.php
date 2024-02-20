<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comic', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // recupero i dati inseriti dall'utente nella form
        $form_data = $this->validation($request->all());

        // salvo i dati creando una nuova istanza del model Comic
        $comic = new Comic();
        $comic->titolo = $form_data['titolo'];
        $comic->serie = $form_data['serie'];
        $comic->descrizione = $form_data['descrizione'];
        $comic->src = $form_data['src'];
        $comic->genere = $form_data['genere'];
        $comic->prezzo = $form_data['prezzo'];
        $comic->data_uscita = $form_data['data_uscita'];
        $comic->artisti = $form_data['artisti'];
        $comic->scrittori = $form_data['scrittori'];

        // salvo la nuova istanza nel db
        $comic->save();

        // effettuo il redirect alla route index
        return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // recupero il fumetto con l'id passato come parametro
        $comic = Comic::find($id);

        return view('edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // recupero dati della form
        $form_data = $this->validation($request->all());

        // recupero i record nel database tramite l'id passato come parametro
        $comic = Comic::find($id);

        // salvo i dati creando una nuova istanza del model Comic
        $comic->titolo = $form_data['titolo'];
        $comic->serie = $form_data['serie'];
        $comic->descrizione = $form_data['descrizione'];
        $comic->src = $form_data['src'];
        $comic->genere = $form_data['genere'];
        $comic->prezzo = $form_data['prezzo'];
        $comic->data_uscita = $form_data['data_uscita'];
        $comic->artisti = $form_data['artisti'];
        $comic->scrittori = $form_data['scrittori'];

        // salvo le modifiche
        $comic->update();

        // effettuo il redirect alla route show
        return redirect()->route('comics.show', ['comic' => $comic]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validation($data)
    {
        $validator = Validator::Make(
            $data,
            [
                'titolo' => 'required|max:50|min:3',
                'serie' => 'required|max:50|min:3',
                'descrizione' => 'required',
                'src' => 'max:255',
                'genere' => 'required|max:20',
                'prezzo' => 'required|max:10',
                'data_uscita' => 'required|max:10|min:8',
                'artisti' => 'required',
                'scrittori' => 'required'
            ],
            [
                'titolo.required' => 'Il titolo del fumetto è obbligatorio',
                'titolo.max' => 'Il titolo del fumetto deve essere al massimo di 50 caratteri.',
                'titolo.min' => 'Il titolo del fumetto deve essere lungo almeno 3 caratteri.',
                'serie.required' => 'La serie a cui appartiene il fumetto è obbligatoria.',
                'serie.max' => 'La serie a cui appartiene il fumetto deve essere al massimo di 50 caratteri.',
                'serie.min' => 'La serie a cui appartiene il fumetto deve essere lunga almeno 3 caratteri.',
                'descrizione.required' => 'La descrizione del fumetto è obbligatoria.',
                'src.max' => 'Il link della copertina del fumetto deve essere al massimo di 255 caratteri.',
                'genere.required' => 'Il genere del fumetto è obbligatorio.',
                'genere.max' => 'Il genere del fumetto deve essere al massimo di 50 caratteri.',
                'prezzo.required' => 'Il prezzo del fumetto è obbligatorio',
                'prezzo.max' => 'Il prezzo del fumetto deve essere al massimo di 10 caratteri.',
                'data_uscita.required' => 'La data di uscita del fumetto è obbligatoria.',
                'data_uscita.max' => 'La data di uscita del fumetto deve essere al massimo di 10 caratteri.',
                'data_uscita.min' => 'La data di uscita del fumetto deve essere almeno di 8 caratteri.',
                'artisti.required' => 'Inserisci almeno un artista.',
                'scrittori.required' => 'Inserisci almeno uno scrittore.'
            ]
        )->validate();

        return $validator;
    }
}
