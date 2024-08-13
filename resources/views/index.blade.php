@extends('base')

@section('title', 'Tous nos bien')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="d-flex gap-2">
            <input type="number" name="price" value="{{$input['price'] ?? ''}}" class="form-control" placeholder="Budget maximal">
            <input type="number" name="surface" value="{{$input['surface'] ?? ''}}" class="form-control" placeholder="Surface minimale">
            <input type="number" name="rooms" value="{{$input['rooms'] ?? ''}}" class="form-control" placeholder="Nombre de pièces minimale">
            <input type="text" name="title" value="{{$input['title'] ?? ''}}" class="form-control" placeholder="Mot clé">

            <button class="btn btn-primary btn-sm flex-grow-0">
                Rechercher
            </button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            @forelse ($properties as $property)
                <div class="col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            @include('propert.card')
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    Aucun bien ne correspond à votre recherche
                </div>
            @endforelse
        </div>

        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>

@endsection