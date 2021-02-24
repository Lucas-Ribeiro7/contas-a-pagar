    <?php include "cabecalho.php"; ?>
    
    <div class="home">
        <div class="base-corpo">
            <?php
            if(isset($_POST["codigo"])){
                $codigo = $_POST['codigo'];
                $descricao = $_POST['descricao'];
                $valor = $_POST['valor'];
                $dt_vencimento = $_POST['vencimento'];
                $situacao = $_POST['situacao'];
                if($situacao == "aberto"){
                    $situacao = 1;
                }else if($situacao == "pago"){
                    $situacao = 0;
                }
                $p->inserirDados($codigo, $descricao, $valor, $dt_vencimento, $situacao);
            }else if(isset($_GET['codigo'])){
                $codigo = $_GET['codigo'];
                $descricao = $_GET['descricao'];
                $valor = $_GET['valor'];
                $dt_vencimento = $_GET['vencimento'];
                $situacao = $_GET['situacao'];
                if($situacao == "aberto"){
                    $situacao = 1;
                }else if($situacao == "pago"){
                    $situacao = 0;
                }
                $p->editarConta($codigo, $descricao, $valor, $dt_vencimento, $situacao);
            }
            if(isset($_GET['descricao'])){
                $descricao = $descricao = $_GET['descricao'];
                $p->paguei($descricao);
                header('location: pagas.php');
            }
            ?>
        </div>
    </div>

</body>
</html>