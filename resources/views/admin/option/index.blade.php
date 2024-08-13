@extends('admin.admin')

@section('title','Toutes les options')
    
@section('content')
    <table class="table table-striped">
        <div class="d-flex justify-content-between align-items-center">
            <h1>@yield('title')</h1>
            <a href="{{route('admin.option.create')}}" class="btn btn-primary">Ajouter une option</a>
        </div>
        <thead>
            <tr>
                <th>Nom</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>

        <tbody> 
            @foreach ($options as $option)     
            <tr>
                <td>{{$option->name}}</td>

                    <td>
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{route('admin.option.edit', $option)}}" class="btn btn-warning">Editer</a>
                            <form action="{{route('admin.option.destroy', $option)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
            </tr>
        </tbody>
        @endforeach  
    </table>
    {{$options->links()}}
@endsection