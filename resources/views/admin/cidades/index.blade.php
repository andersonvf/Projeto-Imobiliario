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
                    <td class="right-align">
                        <a href="{{route('admin.cidades.edit', $cidade->id)}}">
                            <span>
                                <i class="material-icons blue-text text-accent-2">edit</i>
                            </span>
                        </a>
                            <form action="{{route('admin.cidades.destroy', $cidade->id)}}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                    <button style="border:0;background:transparent;" type="submit">
                                        <span style="cursor:pointer">
                                            <i class="material-icons red-text text-accent-3">delete_forever</i>
                                        </span>
                                    </button>
                            </form>
                    </td>
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
        <a class="btn-floating btn-large waves-effect waves-ligth" href="{{route('admin.cidades.create')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>

</section>

@endsection
