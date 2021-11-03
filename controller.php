<?php
    include "cabecalho.php";

    if(isset($_POST['codigo'])){
        $codigo = $_POST['codigo'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $dt_vencimento = $_POST['vencimento'];
        $situacao = $_POST['situacao'];
        if($situacao == "aberto"){
            $situacao = 1;
        }else{
            $situacao = 0;
        }
        $p->inserirDados($codigo, $descricao, $valor, $dt_vencimento, $situacao);
    }

    include "rodape.php";

