@if (session()->has('message'))
    <p class="alert alert-success">{{ session('message') }}</p>
@elseif (session()->has('error'))
    <p class="alert alert-danger">{{ session('error') }}</p>
@elseif ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
@else

@endif
