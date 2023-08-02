<!DOCTYPE html>
<html lang="pt-BR">

<?php include_once 'dependencias.php'; ?>
<title>Cadastro de Terapeuta</title>

<body>
  <?php include_once 'menu.php'; ?>

  <div class="container mt-4">
    <h1>Cadastro de Terapeuta</h1>
    <form action="salvar_terapeuta.php" method="post">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pessoais-tab" data-bs-toggle="tab" data-bs-target="#pessoais-tab-pane"
            type="button" role="tab" aria-controls="pessoais-tab-pane" aria-selected="true">Dados Pessoais</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contato-tab" data-bs-toggle="tab" data-bs-target="#contato-tab-pane"
            type="button" role="tab" aria-controls="contato-tab-pane" aria-selected="false">Contato</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="endereco-tab" data-bs-toggle="tab" data-bs-target="#endereco-tab-pane"
            type="button" role="tab" aria-controls="endereco-tab-pane" aria-selected="false">Endereço</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="outros-tab" data-bs-toggle="tab" data-bs-target="#outros-tab-pane" type="button"
            role="tab" aria-controls="outros-tab-pane" aria-selected="false">Outros</button>
        </li>
      </ul>

      <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="pessoais-tab-pane" role="tabpanel" aria-labelledby="pessoais-tab"
          tabindex="0">
          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
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

        <div class="tab-pane fade" id="contato-tab-pane" role="tabpanel" aria-labelledby="contato-tab" tabindex="0">
          <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
          </div>
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
        </div>

        <div class="tab-pane fade" id="endereco-tab-pane" role="tabpanel" aria-labelledby="endereco-tab" tabindex="0">
          <div class="form-group">
            <label for="cep">CEP:</label>
            <input type="text" class="form-control" id="cep" name="cep" required>
            <small class="form-text text-muted">Informe o CEP e clique fora do campo para preencher automaticamente o
              endereço.</small>
          </div>
          <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" required>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <label for="numero" class="form-label">Número:</label>
              <input type="text" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="col-md-6">
              <label for="complemento" class="form-label">Complemento:</label>
              <input type="text" class="form-control" id="complemento" name="complemento">
            </div>
          </div>
          <div class="form-group">
            <label for="bairro">Bairro:</label>
            <input type="text" class="form-control" id="bairro" name="bairro" required>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="cidade">Cidade:</label>
              <input type="text" class="form-control" id="cidade" name="cidade" required>
            </div>
            <div class="form-group col-md-6">
              <label for="estado">Estado:</label>
              <input type="text" class="form-control" id="estado" name="estado" required>
            </div>
          </div>

        </div>

        <div class="tab-pane fade" id="outros-tab-pane" role="tabpanel" aria-labelledby="outros-tab" tabindex="0">
          <div class="row g-3">
            <div class="form-group col-md-6">
              <label for="banco">Banco:</label>
              <input type="text" class="form-control" id="banco" name="banco">
            </div>
            <div class="form-group col-md-6">
              <label for="agencia">Agência:</label>
              <input type="text" class="form-control" id="agencia" name="agencia">
            </div>
          </div>
          <div class="row g-3">
            <div class="form-group col-md-6">
              <label for="tipo_conta">Tipo de Conta:</label>
              <select class="form-control" id="tipo_conta" name="tipo_conta">
                <option value="corrente">Corrente</option>
                <option value="poupanca">Poupança</option>
                <option value="outra">Outra</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="conta">Conta:</label>
              <input type="text" class="form-control" id="conta" name="conta">
            </div>
          </div>
          <div class="row g-3">
            <div class="form-group col-md-6">
              <label for="descricao-pix-1">Descrição:</label>
              <input type="text" class="form-control" id="descricao-pix-1" name="descricao-pix-1">
            </div>
            <div class="form-group col-md-6">
              <label for="chavepix1">Chave Pix 1:</label>
              <input type="text" class="form-control" id="chavepix1" name="chavepix1">
            </div>
          </div>
          <div class="row g-3">
            <div class="form-group col-md-6">
              <label for="descricao-pix-2">Descrição:</label>
              <input type="text" class="form-control" id="descricao-pix-2" name="descricao-pix-2">
            </div>
            <div class="form-group col-md-6">
              <label for="chavepix2">Chave Pix 2:</label>
              <input type="text" class="form-control" id="chavepix2" name="chavepix2">
            </div>
          </div>
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