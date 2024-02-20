@extends('layout.app')

@section('content')
    <div class="container-fluid  p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="splitter">
                    <div class="thumb">
                        @if ($comic->src == null)
                            <img src="{{ Vite::asset('resources/img/dc_comics_placeholder.jpg') }}"
                                alt="{{ $comic['titolo'] }}">
                        @else
                            <img src="{{ $comic['src'] }}" alt="{{ $comic['titolo'] }}" class="border border-light">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 py-5 details ">
                <div class="row">
                    <div class="col-9">
                        <h4 class="text-uppercase ">{{ $comic['titolo'] }}</h4>
                        <div class="green-banner bg-success text-white my-3">
                            <div class="row">
                                <div class="col-9 px-5 py-2">
                                    <span class="opacity-75 ">U.S. Price:</span><span> {{ $comic['prezzo'] }}</span>
                                    <span class="float-end opacity-75">AVAILABLE</span>
                                </div>
                                <div class="col-3 px-3 py-2">
                                    <span>Check Availability</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-secondary py-1">
                            {{ $comic['descrizione'] }}
                        </p>
                    </div>
                    <div class="col-3 adv">
                        <span class="float-end text-secondary py-1">ADVERTISMENT</span>
                        <img src="{{ Vite::asset('resources/img/adv.jpg') }}" alt="/">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center py-3">
        <div>
            <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-sm btn-warning">Modifica</a>
        </div>
        <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST" class="ms-2">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Cancella</button>
        </form>
    </div>
    <div class="container-fluid p-0 bg-body-secondary border border-secondary-subtle sub-details">
        <div class="row sub-details-content">
            <div class="col-6 p-4">
                <strong>Talent</strong>
                <div class="row mt-3 fs_10">
                    <div class="col-12 border-top border-bottom py-1 d-flex">
                        <div class="col-4">
                            <span>Art by:</span>
                        </div>
                        <div class="col-8">
                            <p>{{ $comic['artisti'] }}</p>

                        </div>
                    </div>
                    <div class="col-12 border-bottom py-1 d-flex">
                        <div class="col-4">
                            <span>Written by:</span>
                        </div>
                        <div class="col-8">

                            <p>{{ $comic['scrittori'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 p-4">
                <strong>Specs</strong>
                <div class="row mt-3 fs_10">
                    <div class="col-12 border-top border-bottom py-1 d-flex">
                        <div class="col-4">
                            <span>Series:</span>
                        </div>
                        <div class="col-8">
                            <span class="text-uppercase text-primary">{{ $comic['serie'] }}</span>
                        </div>
                    </div>
                    <div class="col-12 border-bottom py-1 d-flex">
                        <div class="col-4">
                            <span>U.S. Price:</span>
                        </div>
                        <div class="col-8">
                            <span>{{ $comic['prezzo'] }}</span>
                        </div>
                    </div>
                    <div class="col-12 border-bottom py-1 d-flex">
                        <div class="col-4">
                            <span>On sale date:</span>
                        </div>
                        <div class="col-8">
                            <span>{{ date('M d Y', strtotime($comic['data_uscita'])) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
