@extends('admin.admin')

@section('title','Modifier une option')

@section('content')
    <form action="{{route('admin.option.update', $option)}}" method="POST" class="vstack gap-2">
        @csrf
        <div class="row">
            <div class="form-group">
                <label for="nom" class="ucfirst">Nom :</label>
                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" value="{{old($option->name)}}">
    
                @error('nom')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        <div>
            <button class="btn btn-primary">Modifier</button>
        </div>
    </form>
@endsection