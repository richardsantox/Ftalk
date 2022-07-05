<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Envie sua sugestão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="_sendEmail.php" method="POST">
          <div class="mb-3">
            <label for="InputName" class="form-label">Nome</label>
            <input type="text" name="nome"class="form-control" id="InputNome" placeholder="Nickname">
   
          </div>
          <div class="mb-3">
            <label for="InputEmail" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="InputeEmail">

          </div>
          <div class="mb-3">
            <label for="textMesagem" class="form-label">Mensagem</label>
            <textarea class="form-control" name="mensagem" id="textAreaMensagem" rows="3" cols="50"></textarea>
          
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>