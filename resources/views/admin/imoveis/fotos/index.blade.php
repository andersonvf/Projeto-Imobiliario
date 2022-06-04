@extends('admin.layouts.principal')

@section('conteudo-principal')
    <h4>{{ $imovel->titulo }}</h4>

    <section class="section">
        <div class="flex-container">
            @forelse ($fotos as $foto)
                <div class="flex-item">
                    <img src="{{ asset("storage/$foto->url") }}" />
                </div>
            @empty
                <div>Não há fotos deste imóvel</div>
            @endforelse
        </div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-ligth"
                href="{{ route('admin.imoveis.fotos.create', $imovel->id) }}">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>
@endsection
