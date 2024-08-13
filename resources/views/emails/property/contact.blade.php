<x-mail::message>
# Un nouveau message de prise de contact

Je suis interessé par ce bien <a href="{{route('property.show',['slug'=>$property->getSlug(),$property])}}">{{$property->title}}</a>
<br>
<br>
- Prénoms : {{$data['firstname']}}
- Nom : {{$data['lastname']}}
- Téléphone : {{$data['phone']}}
- Email : {{$data['email']}}

**Message** <br>

{{$data['message']}}

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

{{-- Thanks,<br>
{{ config('app.name') }} --}}
</x-mail::message>
