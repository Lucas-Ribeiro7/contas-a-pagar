<?php include "cabecalho.php" ?>

        <div class="home">
            <div class="base-borda">
                <form action="controller.php" method="POST">
                    <label for="codigo"> <strong>Codigo:</strong> </label>
                    <input type="number" name="codigo" required>
                    <br><br>
                    <label for="descricao"> <strong>Descrição da Conta:</strong> </label>
                    <input type="text" name="descricao" size="25px" required>
                    <br><br>
                    <label for="valor"> <strong>Valor:</strong> </label>
                    <input type="text" name="valor" size="8px" required>
                    <br><br>
                    <label for="vencimento"> <strong>Data de Vencimento:</strong> </label>
                    <input type="date" name="vencimento" required>
                    <br><br>
                    <label> <strong>Situação:</strong> </label>
                    <input type="radio" name="situacao" value="aberto" required>
                    <label for="aberto">Em Aberto</label>
                    <input type="radio" name="situacao" value="pago">
                    <label for="pago">Pago</label>
                    <br>
                    <br>
                    <input type="submit" value="Salvar" class="botao">
                </form>
            </div>
        </div>

<?php include "rodape.php" ?>
