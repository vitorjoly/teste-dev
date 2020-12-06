@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form id = "form-captura" method = "POST" action="{{ route('captura') }}">
                        <div class="form-group">
                            <label for="form-captura-input">Criterio</label>
                            <input id = "form-captura-input" name = "form-captura-input" type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Capturar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
