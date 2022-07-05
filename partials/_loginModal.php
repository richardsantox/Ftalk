<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Fazer login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/Ftalk/partials/_handleLogin.php" method="POST">
        <div class="modal-body">
        
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="nomeUser"aria-describedby="emailHelp">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="senhaUser">
                <div id="emailHelp" class="form-text">Nunca divulgue sua senha com ninguém!</div>
            </div>
            <!--captcha, caso tudo der certo e a gente acabar antes do tempo!
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Fechar</button>
              <button type="submit" class="btn cor-botoes ">Fazer Login</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>

