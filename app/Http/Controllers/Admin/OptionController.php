<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{

    public function index(){
        return view('admin.option.index', [
            'options' => Option::paginate(5)
        ]);
    }

    public function create(){
        $option = new Option();

        return view('admin.option.create', [
            'option' => $option,
        ]);
    }

    public function edit(Option $option){

        return view('admin.option.edit', [
            'option' => $option,
        ]);
    }

    public function store(OptionRequest $request){
            Option::create($request->validated());
            return to_route('admin.option.index')->with('success','Bravo, l\'option a été bien ajouté');
    }

 

    public function update(Option $option, OptionRequest $request){
        $option->update($request->validated());
        return to_route('admin.option.index')->with('success','Bravo, l\'option a été bien modifié');
    }

    public function destroy(Option $option){
        $option->delete();
        return to_route('admin.option.index')->with('success','L\'option a été bien supprimé');
    }
}
