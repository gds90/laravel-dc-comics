<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'titolo' => 'required|max:50|min:3',
            'serie' => 'required|max:50|min:3',
            'descrizione' => 'required',
            'src' => 'max:255',
            'genere' => 'required|max:20',
            'prezzo' => 'required|max:10',
            'data_uscita' => 'required|max:10|min:8',
            'artisti' => 'required',
            'scrittori' => 'required'
        ];
    }

    public function messages()
    {
        return [
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
        ];
    }
}
