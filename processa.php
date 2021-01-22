    <?php include "cabecalho.php"; ?>

    <?php
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
    ?>

</body>
</html>