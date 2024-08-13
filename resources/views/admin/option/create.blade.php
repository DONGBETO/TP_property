@extends('admin.admin')

@section('title','Créer une option')

@section('content')
    <form action="{{route('admin.option.store')}}" method="POST" class="vstack gap-2">
        @csrf
        <div class="row">
            <div class="form-group">
                <label for="name" class="ucfirst">Nom :</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}">
    
                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
           </div>
        <div>
            <button class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
@endsection