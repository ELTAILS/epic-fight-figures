<h3 class="h3 text-center mt-4">Sentimos sua falta. Vamos entrar?</h2>
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

                    <div class="text-center mb-4">
                        <a href="registro">Ainda não tem cadastro?</a>
                    </div>
                    <!-- Botão de enviar -->
                    <div class="text-center">
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block w-100 login-submit">Bora entrar!</button>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <hr class="hr-ou">
                        <p class="text-center fw-bold mx-3 mb-0 text-muted">OU</p>
                        <hr class="hr-ou">
                    </div>

                    <div class="text-center login-redes">
                        <a data-mdb-ripple-init class="btn btn-primary btn-lg btn-block google" href="#"role="button"><i class="fa-brands fa-google"></i> Continuar com o google</a>

                        <a data-mdb-ripple-init class="btn btn-primary btn-lg btn-block instagram" style="background-color: #55acee" href="#" role="button"><i class="fa-brands fa-instagram"></i> Continue com o instagram</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<script src="assets/js/loginBtn.js"></script>
<script src="assets/js/api/enviarLogin.js"></script>