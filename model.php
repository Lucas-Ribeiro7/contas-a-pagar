<?php

    class Model{
        private $pdo;

        public function __construct($nome_db, $host, $user, $senha){
            $this->pdo = new PDO("mysql:dbname=$nome_db; host=$host", $user, $senha);
        }

        //Inserir
        public function inserirDados($codigo, $descricao, $valor, $vencimento, $situacao){
            $sql = $this->pdo->query("SELECT id FROM contas WHERE codigo = '$codigo'");
            $verificar_descricao = $this->pdo->query("SELECT * FROM contas WHERE descricao = '$descricao'");
            if($verificar_descricao->rowCount() > 0){
                echo "<script>alert('[ERRO] Conta já cadastrada com está Descrição.');";
                echo "location.href='cadastro.php'</script>";
            }
            if($sql->rowCount() > 0){
                echo "<script>alert('[ERRO] Conta já cadastrada com este Código.');";
                echo "location.href='cadastro.php'</script>";
            }else{
                $valor = str_replace(array(".",","), array(",",","), $valor);
                $this->pdo->query("INSERT INTO contas (codigo, descricao, valor, vencimento, situacao) VALUES ('$codigo', '$descricao', '$valor', '$vencimento', '$situacao')");
                $teste = $this->pdo->query("SELECT codigo FROM contas WHERE codigo = '$codigo'");
                if($teste->rowCount() > 0){
                    echo "<script>alert('Cadastramento realizado com Sucesso!');";
                    echo "location.href='cadastro.php'</script>";
                }else{
                    echo "<script>alert('[ERRO] Cadastramento não realizado, está inválido!');";
                    echo "location.href='cadastro.php'</script>";
                }
            }
        }

        //Buscar dados
        public function buscarDados($codigo){
            $verificar = $this->pdo->
        }

    }