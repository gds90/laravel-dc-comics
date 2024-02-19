@extends('layout.app')

@section('content')
    <div class="main-content position-relative ">
        <div class="container">
            <div class="row py-4">
                <div id="currentSeries">
                    <button id="currentSeriesBtn">CURRENT SERIES</button>
                </div>
                {{-- Ciclo l'array comics --}}
                @foreach ($comics as $comic)
                    <a href="{{ route('comics.show', ['comic' => $comic['id']]) }}">
                        <div class="comic-card">
                            @if ($comic->src == null)
                                <img src="{{ Vite::asset('resources/img/dc_comics_placeholder.jpg') }}"
                                    alt="{{ $comic['titolo'] }}">
                            @else
                                <img src="{{ $comic['src'] }}" alt="{{ $comic['titolo'] }}">
                            @endif
                            <span class="comic-titolo">{{ $comic['titolo'] }}</span>
                        </div>
                    </a>
                @endforeach
                <div class="loadMoreContainer">
                    <button class="loadMoreBtn">LOAD MORE</button>
                    <a class="loadMoreBtn" href="{{ route('comics.create') }}">AGGIUNGI FUMETTO</a>
                </div>

            </div>
        </div>
    </div>
@endsection
