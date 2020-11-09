<?php
    class conexao{
        private $pdo;

        public function __construct($nome_db, $host, $user, $senha){
            $this->pdo = new PDO("mysql:dbname=$nome_db; host=$host", $user, $senha);
        }

        public function salvarDados($descricao, $valor, $vencimento){
            try{
                $cmd = $this->pdo->prepare("INSERT INTO contas (descricao, valor, dt_vencimento) VALUES (:d, :v, :ve)");
                $cmd->bindValue(":d", $descricao);
                $cmd->bindValue(":v", $valor);
                $cmd->bindValue(":ve", $vencimento);
                $cmd->execute(); 
            }catch(PDOException $e){
                echo "<p>[ERRO] Falha ao salvar Dados!</p>";
            }
            
        }
    }