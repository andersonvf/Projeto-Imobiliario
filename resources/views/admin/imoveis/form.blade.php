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
                            class="with-gap" value="{{$finalidade->id}}"/>
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
                    <input type="number" name="dormitorios" id="dormitorios">
                    <label for="dormitorios">Dormitórios</label>
                </div>
                <div class="input-field col s4">
                    <input type="number" name="salas" id="salas">
                    <label for="salas">Salas</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s4">
                    <input type="number" name="terreno" id="terreno">
                    <label for="terreno">Terreno em m²</label>
                </div>
                <div class="input-field col s4">
                    <input type="number" name="banheiros" id="banheiros">
                    <label for="banheiros">Quantidade de banheiros</label>
                </div>
                <div class="input-field col s4">
                    <input type="number" name="garagens" id="garagens">
                    <label for="garagens">Vagas de garagem</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <textarea name="descricao" id="descricao" class="materialize-textarea"></textarea>
                    <label for="descricao">Descrição</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s5">
                    <input type="text" name="rua" id="rua" />
                    <label for="rua">Rua</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="numero" id="numro" />
                    <label for="numro">Número</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="complemento" id="complemento" />
                    <label for="complemento">Complemento</label>
                </div>
                <div class="input-field col s3">
                    <input type="text" name="bairro" id="bairro" />
                    <label for="bairro">Bairro</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <select name="proximidades[]" id="proximidades" multiple>
                        <option value="" disabled>Selecione os pontos de interesse nas proximidades</option>
                        @foreach ($proximidades as $proximidade)
                            <option value="{{$proximidade->id}}">{{$proximidade->nome}}</option>
                        @endforeach
                    </select>
                    <label for="proximidades">Pontos de interesse nas proximidades</label>
                </div>
            </div>

            <div class="right-align">
                <a class="btn-flat waves-effect" href="{{ route('admin.imoveis.index') }}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                 Salvar
                </button>
            </div>

        </form>

    </section>

@endsection
