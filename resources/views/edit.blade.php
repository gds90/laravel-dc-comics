@extends('layout.app')

@section('content')
    <div class="form-container">
        <h2 class="text-center my-3">Modifica dati del fumetto:</h2>
        <form action="{{ route('comics.update', $comic->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3 ">
                <label for="titolo">Titolo</label>
                <input type="text" name="titolo" id="titolo" class="form-control" placeholder="Nome fumetto"
                    value="{{ $comic->titolo }}" required>
            </div>

            <div class="form-group mb-3 ">
                <label for="src">Copertina</label>
                <input type="text" name="src" id="src" class="form-control"
                    placeholder="Link copertina fumetto" value="{{ $comic->src }}">
            </div>
            <div class="form-group mb-3 ">
                <label for="prezzo">Prezzo</label>
                <input type="text" name="prezzo" id="prezzo" class="form-control" placeholder="Prezzo fumetto"
                    value="{{ $comic->prezzo }}" required>
            </div>
            <div class="form-group mb-3 ">
                <label for="serie">Serie</label>
                <input type="text" name="serie" id="serie" class="form-control" placeholder="Serie fumetto"
                    value="{{ $comic->serie }}" required>
            </div>
            <div class="form-group mb-3 ">
                <label for="data_uscita">Data di uscita</label>
                <input type="text" name="data_uscita" id="data_uscita" class="form-control"
                    value="{{ $comic->data_uscita }}" placeholder="Data di uscita del fumetto" required>
            </div>
            <div class="form-group mb-3 ">
                <label for="genere">Genere</label>
                <input type="text" name="genere" id="genere" class="form-control" placeholder="Genere fumetto"
                    value="{{ $comic->genere }}" required>
            </div>
            <div class="form-group mb-3 ">
                <label for="artisti">Artista/i</label>
                <input type="text" name="artisti" id="artisti" class="form-control" placeholder="Artista/i fumetto"
                    value="{{ $comic->artisti }}" required>
            </div>
            <div class="form-group mb-3 ">
                <label for="scrittori">Scrittore/i</label>
                <input type="text" name="scrittori" id="scrittori" class="form-control" placeholder="Scrittore/i fumetto"
                    value="{{ $comic->scrittori }}" required>
            </div>
            <div class="form-group mb-3 ">
                <label for="descrizione">Descrizione</label>
                <textarea name="descrizione" id="descrizione" class="form-control" placeholder="Descrizione" required>{{ $comic->descrizione }}</textarea>
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-sm btn-success">Salva</button>
            </div>
        </form>
    </div>
@endsection
