<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Option;
use App\Models\Picture;
use App\Models\Property;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{

    // public function __construct()
    // {
    //     $this->authorizeResource(Property::class, 'property');
    // }

    public function index(){

        return view('admin.property.index', [
            'properties' => Property::orderBy('created_at','desc')->paginate(5)
        ]);
    }

    public function create(){
        $property = new Property();
        // $property->fill([
        //     'surface' => 40,
        //     'rooms' => 2,
        //     'bedrooms' => 1,
        //     'floor' => 0,
        //     'city' => 'Abomey-Calavi',
        //     'postal_code' => 4200,
        //     'sold' => false,
        // ]);

        return view('admin.property.create', [
            'property' => $property,
            'options' => Option::pluck('name','id'),
        ]);
    }

    public function store(PropertyRequest $request){
            $property = Property::create($request->validated());
            $property->options()->sync($request->validated('options'));
            // $property->attachFiles($request->validated('pictures'));
            return to_route('admin.property.index')->with('success','Bravo, le bien a été bien ajouté');
    }


    public function edit(Property $property){

        // $this->authorize('delete', $property);

        return view('admin.property.edit', [
            'property' => $property,
            'options' => Option::pluck('name','id'),
        ]);
    }
 

    public function update(Property $property, PropertyRequest $request){
        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
        // $property->attachFiles($request->validated('pictures'));
        return to_route('admin.property.index')->with('success','Bravo, le bien a été bien modifié');
    }

    public function destroy(Property $property){
        // Picture::destroy($property->pictures()->pluck('id'));
        $property->delete();
        return to_route('admin.property.index')->with('success','Le bien a été bien supprimé');
    }

}
