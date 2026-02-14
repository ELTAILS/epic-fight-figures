<h3 class="h3 text-center mt-4">O seu lugar é aqui, Vem com a gente?</h2>
<p class="text-muted text-center">Apenas preencha os campos logo abaixo</p>

<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">

            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                class="img-fluid" alt="Phone image">
            </div>

            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <form method="POST" id="form">
                    <!--Nome-->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                            <div class="form-floating">
                                <input type="text" name="nome" id="nome" class="form-control" placeholder="Seu Nome" required>
                                <label for="floatingInputGroup1">Seu Nome</label>
                            </div>
                        </div>
                    </div>
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Seu email" required>
                                <label for="floatingInputGroup1">Seu email</label>
                            </div>
                        </div>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="senha" placeholder="Sua senha" required minlength="6">
                                <label for="floatingInputGroup1">Sua senha</label>
                            </div>
                        </div>
                    </div>
                    <!--Botão de termos de acordo-->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkDefault" required>
                        <label class="form-check-label" for="checkDefault">
                            Li os termos de acordo
                        </label>
                    </div>

                    <div class="text-center mb-4 mt-3">
                        <a href="?url=login">Já é usuário? Entrar</a>
                    </div>

                    <!-- Botão de enviar -->
                    <div class="text-center">
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block w-100 login-submit">Quero fazer parte</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<script src="assets/js/api/enviar.js"></script>