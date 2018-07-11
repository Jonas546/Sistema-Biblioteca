<?php

    if(Auth::check()){
            $permission = Auth::user()->permission;
    }

?>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>        

        <a class="navbar-brand" href="{{ url('/') }}">Biblioteca Online</a>

            <div class="collapse navbar-collapse justify-content-between" id="navbar2">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/Gerenciar_clientes">Gerenciar Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Gerenciar_livros">Gerenciar Livros</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Locações</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/Gerenciar_locacoes">Gerenciar Locações</a>
                        </div> 
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Financeiro</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/Gerenciar_Receitas">Receitas</a>
                            <a class="dropdown-item" href="/Gerenciar_Despesas">Despesas</a>
                        </div> 
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuário</a>
                        <div class="dropdown-menu">
                            @if($permission == 2)
                            <a class="dropdown-item" href="/novo_usuario">Novo Usuário</a>
                            @endif
                            <a class="dropdown-item" href="/change">Mudar Senha</a>
                        </div> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Sair</a>
                </li>
            </ul>
            <div id="search"></div>
        </div>    
</nav>  