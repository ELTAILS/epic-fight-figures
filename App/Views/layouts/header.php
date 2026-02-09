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
                            <a class="nav-link" href="#"><i class="fa-solid fa-circle-user"></i><strong><!--Mostrar o nome da conta-->User</strong></a>
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><strong>Carrinho</strong></a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--NavBar--> 
        <hr>
        <nav>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="?url=mangas">Todas as categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shonen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Isekai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Romance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Comédia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Fantasia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mecha</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Slice of Life</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?url=actionFigures">action figures</a>
                </li>
            </ul>
        </nav>

    </header>

    <main>