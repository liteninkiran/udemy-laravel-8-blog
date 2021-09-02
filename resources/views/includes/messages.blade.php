@if (session()->has('message'))
    <p class="alert alert-success">{{ session('message') }}</p>
@elseif (session()->has('error'))
    <p class="alert alert-danger">{{ session('error') }}</p>
@else

@endif



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
