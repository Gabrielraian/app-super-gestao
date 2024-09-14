@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>FListagem de produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right: auto; ">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <th>{{ $produto->nome }}</th>
                                <th>{{ $produto->descricao }}</th>
                                <th>{{ $produto->peso }}</th>
                                <th>{{ $produto->unidade_id }}</th>
                                <th><a href="">Excluir</a></th>
                                <th><a href="">Editar</a></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
               
            </div>
            
            {{ $produtos->appends($request)->links() }}
            <!--
            {{ $produtos->appends($request)->links() }}
            <br>
            {{ $produtos->count() }} - Total de registros por página.
            <br>
            {{ $produtos->total() }} - Total de registros por página.
            <br>
            {{ $produtos->firstItem() }} - Número do primeiro registro da página.
            <br>
            {{ $produtos->lastItem() }} - Número do último registro da página.
            -->
            <br>
            Exibindo {{ $produtos->count() }} produtos de  {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
        </div>
    </div>
@endsection