    <?php include "cabecalho.php"; ?>

    <div class="cadastro">
        <form action="processa.php" method="POST">
            <p>Código para identificação:<input type="number" name="codigo" required></p>
            <?php 
                $codigo = $p->ultimoCodigo();
                if($codigo["MAX(codigo)"] == 0){
                    echo "<b>Não foi cadastrado nenhuma conta!</b>";
                }else{
                    echo "<b>Ultimo Código Cadastrado: " . $codigo["MAX(codigo)"] . "</b>";
                }
                
            ?>
            <p>Descrição da Conta:<input type="text" name="descricao" required></p>
            <p>Valor: <input type="text" name="valor" size="8px" required></p> 
            <p>Data de Vencimento: <input type="date" name="vencimento" required></p>
            
            <p>Situação</p>
            <input type="radio" name="situacao" value="aberto" required>
            <label for="aberto">Em Aberto</label>
            <input type="radio" name="situacao" value="pago">
            <label for="pago">Pago</label>
            <br>
            <br>
            <input type="submit" value="Salvar">
        </form>
    </div> 
</body>
</html>