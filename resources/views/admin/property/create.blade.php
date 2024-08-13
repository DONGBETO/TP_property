@extends('admin.admin')

@section('title','Créer un bien')

@section('content')
    <form action="{{route('admin.property.store')}}" method="POST" class="vstack gap-2">
        @csrf
        <div class="row">
            <div class="form-group">
                <label for="title" class="ucfirst">Titre :</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{old('title')}}">
    
                @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
    
            <div class="col-row">
                <div class="form-group">
                    <label for="surface">Surface :</label>
                    <input type="text" name="surface" class="form-control @error('surface') is-invalid @enderror col" id="surface" value="{{old('surface')}}">
        
                    @error('surface')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-row">
                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror col" id="surface" value="{{old('price')}}">
            
                        @error('price')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
        </div>

            <div class="form-group">
                <label for="description">Description :</label>
                <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description">{{old('description')}}</textarea>
    
                @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

        <div class="row">
            <div class="form-group">
                <label for="rooms">Nombre de pièces :</label>
                <input type="text" name="rooms" class="form-control @error('rooms') is-invalid @enderror" id="rooms" value="{{old('rooms')}}">
    
                @error('rooms')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
    
            <div class="col-row">
                <div class="form-group">
                    <label for="bedrooms">Nombre de chambres :</label>
                    <input type="text" name="bedrooms" class="form-control @error('bedrooms') is-invalid @enderror" id="bedrooms" value="{{old('bedrooms')}}">
        
                    @error('bedrooms')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-row">
                    <div class="form-group">
                        <label for="floor">Nombre d'étage :</label>
                        <input type="text" name="floor" class="form-control @error('floor') is-invalid @enderror" id="floor" value="{{old('floor')}}">
            
                        @error('floor')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" name="adresse" class="form-control @error('adresse') is-invalid @enderror" id="adresse" value="{{old('adresse')}}">
    
                @error('adresse')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
    
            <div class="col-row">
                <div class="form-group">
                    <label for="city">Ville :</label>
                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" id="city" value="{{old('city')}}">
        
                    @error('city')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="col-row">
                    <div class="form-group">
                        <label for="postal_code">Code Postal :</label>
                        <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" value="{{old('postal_code')}}">
            
                        @error('postal_code')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
               </div>
               
                <div class="col-row">
                    <div class="form-group">
                        <label for="options">Options :</label>
                        <select name="options[]" id="optons" multiple class="form-control @error('postal_code') is-invalid @enderror" [options => $options]>
                            @foreach ($options as $k => $v)
                                {{-- <option value="{{$property->options()->name}}">{{$property->options()->name}}</option> --}}
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                        </select>
                        @error('options')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
               </div>

                <div class="form-check form-switch">
                    <input type="hidden" value="0" name="sold">
                    {{-- <input @checked(old('sold', $property->sold) ?? false ) type="checkbox" name="sold" class="form-check-input @error('sold') is-invalid @enderror"  --}}
                    <input @checked(old('sold') ?? false ) type="checkbox" name="sold" class="form-check-input @error('sold') is-invalid @enderror" 
                    role="switch" value="1" id="sold">
                    <label for="sold">Vendu :</label>
                    @error('sold')
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