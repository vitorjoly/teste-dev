@extends ('layouts.app')

@section('content')
    <div class="container">
        <main>
            <div class="container-fluid">
                <div class="row">
                @if(session('msg'))
                    <p class="msg">{{ session('msg') }}</p>
                @endif
                @yield('content')
                </div>
            </div>
        </main>
        <div class="row">
            <div class="col">
                <table class = "table table-responsive table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id Usuario</th>
                            <th>Nome do Veiculo</th>
                            <th>Link</th>
                            <th>Ano</th>
                            <th>Combustivel</th>
                            <th>Portas</th>
                            <th>Quilometragem</th>
                            <th>Cambio</th>
                            <th>Cor</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artigos as $artigo)
                            <tr>
                                <td>{{ $artigo->user_id }}</td>
                                <td>{{ $artigo->nome_veiculo }}</td>
                                <td><a target = "_blank" href="{{ $artigo->link }}">{{ $artigo->link }}</a></td>
                                <td>{{ $artigo->ano }}</td>
                                <td>{{ $artigo->combustivel }}</td>
                                <td>{{ $artigo->portas }}</td>
                                <td>{{ $artigo->quilometragem }}</td>
                                <td>{{ $artigo->cambio }}</td>
                                <td>{{ $artigo->cor }}</td>
                                <td><a class="btn btn-danger" href="{{ route('deletar', $artigo->id) }}">Excluir</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class = "col-2 m-auto">
                {{ $artigos->links() }}
                </div>
            </div>
        </div>
    </div> 
@endsection