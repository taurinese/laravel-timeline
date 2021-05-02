@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-primary" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                <span>{{ $error }}<br></span>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ route('change_name') }}">
                    @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Prénom</span>
                            </div>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" placeholder="Prénom" name="name" id="name">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Modifier</button>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('change_email') }}">
                    @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Adresse mail</span>
                            </div>
                            <input type="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Adresse mail" name="email" id="email">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Modifier</button>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('change_password') }}">
                    @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Mot de passe</span>
                            </div>
                            <input type="password" class="form-control" placeholder="Mot de passe" name="password" id="password">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Modifier</button>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('change_avatar') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="input-group mb-3 custom-file">
                            <input type="file" class="custom-file-input" name="image" id="image">
                            <label class="custom-file-label" for="customFile">Choisissez votre avatar</label>
                            <button class="btn btn-outline-secondary" type="submit">Modifier</button>
                        </div>  
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
