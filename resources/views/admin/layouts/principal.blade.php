<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Best Imóveis</title>
</head>
<body>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/materialize.min.css') }}">
    {{-- menu topo --}}
<nav>
    <div>
        <div class="container">
            <div class="nav-wrapper">
                <a href="/" class="brand-logo">Best Imóveis</a>
                <ul class="right">
                    <li>
                        <a href="#">Imóveis</a>
                    </li>
                    <li>
                        <a href="{{route('admin.cidades.index')}}">Cidades</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

{{-- --Conteúdo principal-- --}}

<div class="container">
    @yield('conteudo-principal')
</div>
<script src="{{asset ('js/materialize.min.js') }}"></script>
<script>
    @if (session('sucesso'))
        M.toast({html: "{{ session('sucesso') }}"});
    @endif
</script>

</body>
</html>
