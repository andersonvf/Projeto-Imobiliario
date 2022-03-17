@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class="section">
    <table class="highlight">
        <thead>
            <tr>
                <th>Cidade</th>
                <th class="right-align">Opções</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($cidades as $cidade)
                <tr>
                    <td>{{ $cidade->nome }}</td>
                    <td class="right-align">Excluir - Remover</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Não existem cidades cadastradas.</td>
                </tr>
            @endforelse
        </tbody>

    </table>
        <!--div class="d-flex justify-content-center"-->
        <div class="row text-center">
            {{ $cidades->links()}}
        </div>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-ligth" href="{{route('admin.cidades.form')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>

</section>

@endsection
