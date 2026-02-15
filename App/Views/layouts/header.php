<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creator: Wagner Junior | Programer junior of PHP">
    <title>Epic Fight Figures</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Favicon-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <!--Css interno-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/media.css">
</head>
<body>
    <!--Cabeçalho-->
    <header>
        <div class="d-flex p-2">
            <!--Img Logo-->
            <div class="imgLogo">
                <a href="?url=/"><img src="assets/img/logo.png" alt="Logo do site"></a>
            </div>
            
            <div class="container text-center teste">
                <div class="row">
                    <!--Barra de pesquisa-->
                    <div class="col-8">
                        <form method="get" class="search-bar">
                            <input type="hidden" name="url" value="buscar">
                            <input type="search" name="busca" id="busca" placeholder="O que procura?">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <!--Login e carrinho-->
                    <div class="col-4">
                        <nav class="nav">
                        <?php if(isset($_SESSION['usuario_id'])): ?>
                            <!-- Usuário logado -->
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center gap-1" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user"></i>
                                <strong><?= substr(htmlspecialchars ($_SESSION['usuario_nome']), 0 , 10) ?></strong>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="?url=deslogar">Deslogar</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Carrinho logado -->
                            <a class="nav-link d-flex align-items-center gap-1" href="?url=carrinho">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <strong>Carrinho</strong>
                            </a>
                        <?php else: ?>
                            <!-- Visitante -->
                            <a class="nav-link d-flex align-items-center gap-1" href="?url=login">
                                <i class="fa-solid fa-circle-user"></i>
                                <strong>Visitante</strong>
                            </a>
                            <!-- Carrinho visitante -->
                            <a class="nav-link d-flex align-items-center gap-1" href="?url=login">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <strong>Carrinho</strong>
                            </a>
                        <?php endif; ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--NavBar--> 
        <hr>
        <nav>
            <ul class="nav justify-content-center flex-wrap gap-2">

                <li class="nav-item">
                    <a class="nav-link" href="?url=mangas">
                        <i class="fa-solid fa-book-open"></i> Todos os Mangás
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?url=buscar&genero=Ação">
                        <i class="fa-solid fa-bolt"></i> Ação
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?url=buscar&genero=Aventura">
                        <i class="fa-solid fa-compass"></i> Aventura
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?url=buscar&genero=Fantasia">
                        <i class="fa-solid fa-dragon"></i> Fantasia
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?url=buscar&genero=Suspense">
                        <i class="fa-solid fa-user-secret"></i> Suspense
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?url=buscar&genero=Terror">
                        <i class="fa-solid fa-ghost"></i> Terror
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?url=actionFigures">
                        <i class="fa-solid fa-puzzle-piece"></i> Action Figures
                    </a>
                </li>

            </ul>
        </nav>
    </header>
    <main>