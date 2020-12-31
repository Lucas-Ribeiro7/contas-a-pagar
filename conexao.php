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
                $valor = str_replace(array(".",","),array(",","."),$valor);
                $this->pdo->query("INSERT INTO pagar (codigo, descricao, valor, dt_vencimento, situacao) VALUES ('$codigo','$descricao', $valor, '$vencimento', '$situacao')");
                $teste = $this->pdo->query("SELECT codigo FROM pagar WHERE codigo = '$codigo'");
                if($teste->rowCount() == 0){
                    echo "<h2>Cadastramento não realizado, está inválido!</h2>";
                }else{
                    echo "<h2>Cadastramento realizado com Sucesso!</h2>";
                }
            }
             
        }
        public function buscarDadosAbertos(){
            $res = array();
            $cmd = $this->pdo->query("SELECT codigo, descricao, format(valor, 2, 'de_DE'), dt_vencimento FROM pagar WHERE situacao = true ORDER BY dt_vencimento;");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        public function buscarDadosPagos(){
            $res = array();
            $cmd = $this->pdo->query("SELECT codigo, descricao, format(valor, 2, 'de_DE'), dt_vencimento FROM pagar WHERE situacao = false ORDER BY codigo");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        public function somaAbertos(){
            $cmd = $this->pdo->query('SELECT sum(valor)  AS tot_valor FROM pagar WHERE situacao = 1');
            $soma = $cmd->fetch(PDO::FETCH_ASSOC);
            return $soma['tot_valor'];
        }
        public function somaPago(){
            $cmd = $this->pdo->query('SELECT sum(valor) AS tot_valor FROM pagar WHERE situacao = 0');
            $soma = $cmd->fetch(PDO::FETCH_ASSOC);
            return $soma['tot_valor'];
        }
        function excluirConta($codigo){
            $verificar = $this->pdo->query("SELECT * FROM pagar WHERE codigo = '$codigo'");
            if($verificar->rowCount()==0){
                echo "<h2>[ERRO] Essa conta não existe!!</h2>";
            }else{
               $cmd = $this->pdo->prepare('DELETE FROM pagar WHERE codigo = :c');
                $cmd->bindValue(":c", $codigo);
                $cmd->execute();
                $sql = $this->pdo->query("SELECT * FROM pagar WHERE codigo = '$codigo'");

                if($sql->rowCount()==0){
                    echo "<h2>Conta cadastrada com o Codigo: <strong>$codigo</strong>, foi excluído com SUCESSO!</h2>";
                }else{
                    echo "<h2>[ERRO] Erro na conexão com o Banco</h2>";
                } 
            }      
        }
        public function buscarDados($codigo){
            $verificar = $this->pdo->query("SELECT * FROM pagar WHERE codigo = '$codigo'");
            if($verificar->rowCount()==0){
                echo "<h2>[ERRO] Essa conta não existe!!</h2>";
            }else{
                $cmd = $this->pdo->query("SELECT * FROM pagar WHERE codigo = '$codigo'");
                $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            }

            
        }
        public function editarConta($codigo, $descricao, $valor, $vencimento, $situacao){
            $cmd = $this->pdo->query("UPDATE pagar SET codigo = '$codigo', descricao = '$descricao', valor = '$valor', dt_vencimento = '$vencimento', situacao = '$situacao' WHERE codigo = '$codigo'");
            echo "<h2>Edição realizada com sucesso!</h2>";
        }

    }