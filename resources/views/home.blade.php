@extends('base')

@section('title','monAgence')
    
@section('content')

<x-alert type="success" class="fw-bold text-center">
    Des tards de biens pour vous !!
</x-alert>

    <div class="bg-light p-5 text-center">
        <div class="container">
            <h1>Mon agence immolier IMO</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, facere sapiente. Delectus quod dolorem quas 
                reprehenderit sint sed voluptates perspiciatis tempora sunt praesentium fugiat velit temporibus rerum, eligendi saepe! Et?
            </p>
        </div>
    </div>

    <div class="container">
        <h2>Nos dernier biens</h2>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            @include('propert.card')
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection