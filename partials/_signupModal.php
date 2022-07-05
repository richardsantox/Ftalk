

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Registrar-se</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/Ftalk/partials/_handlesignup.php" method="POST">
        <div class="modal-body">
        
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome de usuário</label>
                <input type="text" class="form-control" id="nomeUser" name="nomeUser" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha</label>
                <input type="password" class="form-control" id="signupPass" name="signupPass">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Repita sua senha</label>
                <input type="password" class="form-control" id="signupConfirm" name="signupConfirm">
                <div id="emailHelp" class="form-text">Não divulgue esta senha para ninguém.</div>
            </div>
            <!--Futuro, caso der tempo de botar captcha nessa caceta
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            -->    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" class="btn cor-botoes px-3">Registrar</button>
        </div>
      </form>
    </div>
  </div>
</div>
