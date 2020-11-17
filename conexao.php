<?php
    class conexao{
        private $pdo;

        public function __construct($nome_db, $host, $user, $senha){
            $this->pdo = new PDO("mysql:dbname=$nome_db; host=$host", $user, $senha);
        }
        public function inserirDados($codigo, $descricao, $valor, $vencimento, $situacao){
            $sql = $this->pdo->query("SELECT id FROM pagar WHERE codigo = '$codigo'");
            if($sql->rowCount() > 0){
                echo "<h2>Conta já cadastrada com este Código!</h2>";
            }else{
                $this->pdo->query("INSERT INTO pagar (codigo, descricao, valor, dt_vencimento, situacao) VALUES ('$codigo','$descricao', $valor, '$vencimento', '$situacao')");
                echo "<h2>Cadastramento realizado com Sucesso!</h2>";
            }
             
        }
        public function buscarDadosAbertos(){
            $res = array();
            $cmd = $this->pdo->query('SELECT codigo, descricao, valor, dt_vencimento FROM pagar WHERE situacao = true ORDER BY dt_vencimento;');
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        public function buscarDadosPagos(){
            $res = array();
            $cmd = $this->pdo->query('SELECT codigo, descricao, valor, dt_vencimento FROM pagar WHERE situacao = false ORDER BY codigo');
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        

    }