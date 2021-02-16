    <?php include "cabecalho.php"; ?>
    
    <?php
        if(isset($_GET['codigo'])){
        $codigo_enviado = $_GET['codigo'];
        $dados = $p->buscarDados($codigo_enviado);
        if(count($dados) == 0){
            //Usando JavaScript
            echo "<script>alert('Está conta não existe!');";
            echo "window.location='/contas%20a%20Pagar/procedimentos.php'</script>"; //Volta para a pagina que você colocar entre ' '
        }else{
            if(count($dados)>0){
                for($i = 0; $i < count($dados);$i++){
                    foreach($dados[$i] as $key => $value){
                        
                    }
                }
            }
            $codigo = $dados['0']['codigo'];
            $descricao = $dados['0']["descricao"];
            $valor = $dados['0']["valor"];
            $vencimento = $dados['0']["dt_vencimento"];        
            $situacao = $dados['0']['situacao'];
        }
    }
             
    ?>
    <div class="home">
        <div class="base-corpo">
            <form action="processa.php" method="GET">
                    <p>Código para identificação:<input type="number" name="codigo" value="<?php echo $codigo ?>" required></p>
                    <p>Descrição da Conta:<input type="text" name="descricao" value="<?php echo $descricao ?>" required></p>
                    <p>Valor:<input type="text" name="valor" value="<?php echo $valor ?>" required></p> 
                    <p>Data de Vencimento: <input type="date" name="vencimento" value="<?php echo $vencimento ?>" required></p>
                    
                    <p>Situação</p>
                    <input type="radio" name="situacao" value="aberto" required>
                    <label for="aberto">Em Aberto</label>
                    <input type="radio" name="situacao" value="pago">
                    <label for="pago">Pago</label>
                    <br>
                    <br>
                    <input type="submit" value="Atualizar">
            </form>
        </div>
    </div>
    
</body>
</html>