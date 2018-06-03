@if(count($errors))
    <div class="form-group">
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>

        </div>
    </div>
@endif

@if(session()->has('success'))
    <div class="form-group">
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div class="form-group">
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    </div>
@endif