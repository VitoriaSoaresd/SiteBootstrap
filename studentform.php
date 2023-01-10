<?php
require_once 'header.php';
?>

<div class="container-fluid texto">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Preencha todos os campos abaixo para cadastro de alunos da <strong>BeBody Gym</strong>.</h2>
        </div>
    </div>
</div>



<form>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="form=group">
                    <label for="Name">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form=group">
                    <label for="inputEmail">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Seu e-mail">
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <p><input type="radio" name="optradio" checked> Feminino
                        <input type="radio" name="optradio"> Masculino
                    </p>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="CPF" onkeypress="$(this).mask('000.000.000-00');"
                                placeholder="000.000.000-00">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="formGroupExampleInput2">RG</label>
                            <input type="text" class="form-control" id="rg" name="RG" placeholder="RG">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Data de Nascimento</label>
                            <input type="date" class="form-control" id="datadenascimento" name="data de nascimento">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" onkeypress="$(this).mask('(00)00000-0000')"
                                placeholder="(00) 00000-0000">
                        </div>
                    </div>


                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cep">CEP</label>
                                    <input type="text" class="form-control" id="cep" name="cep"
                                        onblur="pesquisacep(this.value);" placeholder="00.000-000">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputAddress">Endereço</label>
                                    <input type="text" class="form-control" id="rua" name="rua"
                                        placeholder="Rua/Estrada/Avenida">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="numero">Número</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="inputAddress2">Complemento</label>
                                    <input type="text" class="form-control" id="inputAddress2"
                                        placeholder="Apto, casa, etc.">
                                </div>
                            </div>



                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputCity">Bairro</label>
                                            <input type="text" class="form-control" id="bairro" name="bairro">
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputCity">Cidade</label>
                                            <input type="text" class="form-control" id="cidade" name="cidade">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="uf">Estado</label>
                                            <p>
                                                <input type="text" class="form-control" id="uf" name="uf">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Tudo certo!
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>



<hr>

<?php
    require_once 'footer.php';
?>