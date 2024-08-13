<?php

namespace App\Http\Controllers;

use App\Events\ContactRequestEvent;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use App\Models\User;
use App\Notifications\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;

class PropertiesController extends Controller
{
    public function index(SearchRequest $request){

        $query = Property::query()->orderBy('created_at','desc');

        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price); 
        }

        if ($surface = $request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface); 
        }

        if ($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $rooms); 
        }

        if ($title = $request->validated('title')) {
            $query = $query->where('title', 'LIKE', "%{$title}%"); 
        }
        return view('index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated(),
        ]);

    }

    public function show(string $slug, Property $property){

        // /** @var User $user */

        // $user = User::first();
        // dd($user->notifications[0]);

        $trueSlug = $property->getSlug();

        if ($slug !== $trueSlug ) {
            return to_route('property.show',[
                'slug' => $trueSlug,
                'property' => $property
            ]);
        }
            return view('show', [
                'property' => $property
            ]);
    }

    public function contact(Property $property, PropertyContactRequest $request){

        event(new ContactRequestEvent($property, $request->validated()));
        Mail::send(new PropertyContactMail($property, $request->validated()));
                /** @var User $user */

        //         $user = User::first();
        // $user->notify(new ContactNotification($property, $request->validated()));
        return back()->with('success', 'votre message a été bien envoyé');
    }
}
