@if($errors)
    @foreach($errors as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>

    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
@endif