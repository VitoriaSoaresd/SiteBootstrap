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



<form method="POST" action="controlform.php">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                 <div class="form=group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Seu nome">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form=group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Seu e-mail">
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label for="sex">Sexo</label>
                    <p><input type="radio" name="sex" checked value="F"> Feminino
                        <input type="radio" name="sex" value="M"> Masculino
                    </p>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" onkeypress="$(this).mask('000.000.000-00');"
                                placeholder="000.000.000-00">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rg">RG</label>
                            <input type="text" class="form-control" id="rg" name="rg" placeholder="RG">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="birth">Data de Nascimento</label>
                            <input type="date" class="form-control" id="birth" name="birth">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cellphone">Telefone</label>
                            <input type="text" class="form-control" id="cellphone" name="cellphone" onkeypress="$(this).mask('(00)00000-0000')"
                                placeholder="(00) 00000-0000">
                        </div>
                    </div>


                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="zipcode">CEP</label>
                                    <input type="text "class="form-control" id="zipcode" name="zipcode" value=""
                                        onblur="pesquisacep(this.value);" placeholder="00.000-000">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationDefault03">Endereço</label>
                                    <input type="text" class="form-control" id="street" name="street"
                                        placeholder="Rua/Estrada/Avenida" required>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="housenumber">Número</label>
                                    <input type="text" class="form-control" name="housenumber">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="complement">Complemento</label>
                                    <input type="text" class="form-control" id="complement" name="complement"
                                        placeholder="Apto, casa, etc.">
                                </div>
                            </div>



                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="district">Bairro</label>
                                            <input type="text" class="form-control" id="district" name="district">
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">Cidade</label>
                                            <input type="text" class="form-control" id="city" name="city">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="state">Estado</label>
                                            <p>
                                                <input type="text" class="form-control" id="state" name="state">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="password">Informe uma senha</label>
                                            <input type="text" class="form-control" name="password">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="photo">Foto</label>
                                            <input type="text" class="form-control" name="photo">
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
                        <button type="submit" class="btn btn-primary" value="enviar" name="btncad">Cadastrar</button>

</form>



<hr>

<?php
    require_once 'footer.php';
?>