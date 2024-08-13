
{{-- @if (session()->has('message'))
<div class="notfication ">
    {{ session('message') }}
</div>
<script>
    setTimeout(function() {
        document.getElementById("myDiv").remove();
    }, 2500); // 2 second
</script>
@endif
@if (session()->has('erreur'))
<div class="text-red" style="color: red;">
    {{ session('erreur') }}
</div>
<script>
    setTimeout(function() {
        document.getElementById("myDiv").remove();
    }, 2500); // 2 second
</script>
@endif --}}

@if (session('success'))
<div class="alert alert-success">
     {{session('success')}}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
 <ul class="my-0">
     @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
     @endforeach
 </ul>
</div>
@endif