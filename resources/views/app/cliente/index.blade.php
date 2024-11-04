@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right: auto; ">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <th>{{ $cliente->nome }}</th>
                                <th><a href="{{ route('cliente.show', ['cliente' => $cliente->id ]) }}">Vizualizar</a></th>
                                <th>
                                    <form id="form_{{ $cliente->id }}" method="POST" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button type="submit">Excluir</button> --}}
                                        <a href="#" onclick="document.getElementById('form_{{ $cliente->id }}').submit()">Excluir</a>
                                    </form>
                                </th>
                                <th><a href="{{ route('cliente.edit', ['cliente' => $cliente->id ]) }}">Editar</a></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
               
            </div>
            
            {{ $clientes->appends($request)->links() }}
            
            {{ $clientes->appends($request)->links() }}
            <br>
            {{ $clientes->count() }} - Total de registros por página.
            <br>
            {{ $clientes->total() }} - Total de registros por página.
            <br>
            {{ $clientes->firstItem() }} - Número do primeiro registro da página.
            <br>
            {{ $clientes->lastItem() }} - Número do último registro da página.
            
            <br>
            Exibindo {{ $clientes->count() }} clientes de  {{ $clientes->total() }} (de {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
        </div>
    </div>
@endsection