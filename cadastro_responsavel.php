<?php
// Essa tela exibe um formulário para inserir os dados do responsável e envia as informações para o arquivo "salvar_responsavel.php" quando o botão "Salvar" é clicado.
?>

<!DOCTYPE html>
<html lang="pt-BR">

<?php include_once 'dependencias.php'; ?>
<title>Cadastro de Responsável</title>

<body>
  <?php include_once 'menu.php'; ?>

  <div class="container mt-4">
    <h1>Cadastro de Responsável</h1>
    <form action="salvar_responsavel.php" method="post">
      <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
            type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Dados Pessoais</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
            type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Contato</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
            type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Endereço</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane"
            type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false">Outros</button>
        </li>
      </ul>
      <div class="tab-content mt-4" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
          tabindex="0">
          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome">
          </div>
          <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" required>
          </div>
          <div class="form-group">
            <label for="cnpj">CNPJ:</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj">
          </div>
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
          <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
          </div>
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
        </div>
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
          <div class="form-group">
            <label for="cep">CEP:</label>
            <input type="text" class="form-control" id="cep" name="cep">
            <small class="form-text text-muted">Informe o CEP e clique fora do campo para preencher automaticamente o
              endereço.</small>
          </div>
          <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco">
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <label for="numero" class="form-label">Número:</label>
              <input type="text" class="form-control" id="numero" name="numero">
            </div>
            <div class="col-md-6">
              <label for="complemento" class="form-label">Complemento:</label>
              <input type="text" class="form-control" id="complemento" name="complemento">
            </div>
          </div>
          <div class="row g-3">
            <div class="form-group col-md-5">
              <label for="bairro">Bairro:</label>
              <input type="text" class="form-control" id="bairro" name="bairro">
            </div>
            <div class="form-group col-md-5">
              <label for="cidade">Cidade:</label>
              <input type="text" class="form-control" id="cidade" name="cidade">
            </div>
            <div class="form-group col-md-2">
              <label for="estado">Estado:</label>
              <input type="text" class="form-control" id="estado" name="estado">
            </div>
          </div>
          <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
            ...</div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary mt-4">Salvar</button>
    </form>
  </div>

  <?php include_once 'footer.php'; ?>

  <script src="utils/masks.js"></script>
  <script src="utils/cep.js"></script>
</body>

</html>