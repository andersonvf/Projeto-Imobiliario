@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section class="section">

        <form action="{{$action}}" method="POST">
            @csrf
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="titulo" id="titulo" />
                <label for="titulo">Título</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="cidade_id" id="cidade_id">
                    <option value="" disabled selected>Selecione a cidade</option>
                    @foreach ($cidades as $cidade)

                    <option value="{{$cidade->id}}">{{$cidade->nome}}</option>

                    @endforeach
                </select>
                <label for="cidade_id">Cidade</label>

            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="tipo_id" id="tipo_id">
                    <option value="" disabled selected>Selecione o tipo de imóvel</option>
                    @foreach ($tipos as $tipo)

                    <option value="{{$tipo->id}}">{{$tipo->nome}}</option>

                    @endforeach
                </select>
                <label for="tipo_id">Tipo de imóvel</label>

            </div>
        </div>

            <div class="row">
                @foreach ($finalidades as $finalidade)
                <span class="col s2">
                    <label style="margin-right: 30px">
                        <input type="radio" name="finalidade_id" id="finalidade_id"
                            class="with-gap" value="{{$finalidade->nome}}"/>
                            <span>{{$finalidade->nome}}</span>
                    </label>
                </span>

                @endforeach
            </div>

            <div class="row">

                <div class="input-field col s4">
                    <input type="number" name="preco" id="preco">
                    <label for="preco">Preço</label>
                </div>
                <div class="input-field col s4">
                    <input type="number" name="dormitorio" id="dormitorio">
                    <label for="dormitorio">Dormitórios</label>
                </div>
                <div class="input-field col s4">
                    <input type="number" name="salas" id="salas">
                    <label for="salas">Salas</label>
                </div>

            </div>

        </form>

    </section>

@endsection
