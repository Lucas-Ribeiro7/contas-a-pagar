<?php
    class conexao{
        private $pdo;

        public function __construct($nome_db, $host, $user, $senha){
            $this->pdo = new PDO("mysql:dbname=$nome_db; host=$host", $user, $senha);
        }

        //-----------------------------Inserir-----------------------
        public function inserirDados($codigo, $descricao, $valor, $vencimento, $situacao){
            $sql = $this->pdo->query("SELECT id FROM contas WHERE codigo = '$codigo'");
            $verificar_descricao = $this->pdo->query("SELECT * FROM contas WHERE descricao = '$descricao'");
            if($verificar_descricao->rowCount() > 0){
                echo "<h3>Já existe uma conta com está Descrição.</h3>";
                exit;
            }
            if($sql->rowCount() > 0){
                echo "<h3>Conta já cadastrada com este Código!</h3>";
            }else{
                $valor = str_replace(array(".",","),array(",","."),$valor);
                $this->pdo->query("INSERT INTO contas (codigo, descricao, valor, dt_vencimento, situacao) VALUES ('$codigo','$descricao', $valor, '$vencimento', '$situacao')");
                $teste = $this->pdo->query("SELECT codigo FROM contas WHERE codigo = '$codigo'");
                if($teste->rowCount() == 0){
                    echo "<h3>Cadastramento não realizado, está inválido!</h3>";
                }else{
                    echo "<h3>Cadastramento realizado com Sucesso!</h3>";
                }
            }
             
             
        }

        //------------------------Busca------------------------------
        public function buscarDados($codigo){
            $verificar = $this->pdo->query("SELECT * FROM contas WHERE codigo = '$codigo'");
            if($verificar->rowCount()==0){
                echo "<h3>[ERRO] Essa conta não existe!!</h3>";
            }else{
                $cmd = $this->pdo->query("SELECT * FROM contas WHERE codigo = '$codigo'");
                $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            }            
        }
        public function buscarDadosAbertos(){
            $res = array();
            $cmd = $this->pdo->query("SELECT codigo, descricao, format(valor, 2, 'de_DE'), date_format(dt_vencimento, '%d/%m/%Y') FROM contas WHERE situacao = true ORDER BY dt_vencimento");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        public function buscarDadosPagos(){
            $res = array();
            $cmd = $this->pdo->query("SELECT codigo, descricao, format(valor, 2, 'de_DE'), date_format(dt_vencimento, '%d/%m/%Y') FROM contas WHERE situacao = false ORDER BY dt_vencimento");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        public function buscarQtd(){
            $cmd = $this->pdo->query("SELECT COUNT(id) FROM contas");
            return $cmd->fetch(PDO::FETCH_ASSOC);
        }

        //--------------------------------Soma----------------------------
        public function somaAbertos(){
            $cmd = $this->pdo->query('SELECT sum(valor)  AS tot_valor FROM contas WHERE situacao = 1');
            $soma = $cmd->fetch(PDO::FETCH_ASSOC);
            return $soma['tot_valor'];
        }
        public function somaPago(){
            $cmd = $this->pdo->query('SELECT sum(valor) AS tot_valor FROM contas WHERE situacao = 0');
            $soma = $cmd->fetch(PDO::FETCH_ASSOC);
            return $soma['tot_valor'];
        }
        public function somaTotal(){
            $verificar = $this->pdo->query('SELECT * FROM contas');
            if($verificar->rowCount() == 0){
                return 0;
            }else{
                $cmd = $this->pdo->query('SELECT SUM(valor) as tot_valor FROM `contas`');
                $soma = $cmd->fetchAll(PDO::FETCH_ASSOC);
                return $soma[0]['tot_valor'];
            }
        }

        //---------------------------Excluir e Editar-------------------
        function excluirConta($codigo){
            $verificar = $this->pdo->query("SELECT * FROM contas WHERE codigo = '$codigo'");
            if($verificar->rowCount()==0){
                echo "<h3>[ERRO] Essa conta não existe!!</h3>";
            }else{
               $cmd = $this->pdo->prepare('DELETE FROM contas WHERE codigo = :c');
                $cmd->bindValue(":c", $codigo);
                $cmd->execute();
                $sql = $this->pdo->query("SELECT * FROM contas WHERE codigo = '$codigo'");

                if($sql->rowCount()==0){
                    echo "<h3>Conta cadastrada com o Codigo: <strong>$codigo</strong>, foi excluído com SUCESSO!</h3>";
                }else{
                    echo "<h3>[ERRO] Erro na conexão com o Banco</h3>";
                } 
            }      
        }
        public function editarConta($codigo, $descricao, $valor, $vencimento, $situacao){
                $verificar = $this->pdo->query("SELECT * FROM contas WHERE codigo = '$codigo'");
                if($verificar->rowCount()==0){
                    echo "<h3>[ERRO] Essa conta não existe!!</h3>";
                }else{
                    $cmd = $this->pdo->query("UPDATE contas SET codigo = '$codigo', descricao = '$descricao', valor = '$valor', dt_vencimento = '$vencimento', situacao = '$situacao' WHERE codigo = '$codigo'");
                    echo "<h3>Edição realizada com sucesso!</h3>";
                }
                            
        }

        //-------------------------------Delete------------------------
        public function deleteApagar(){
            $verificar = $this->pdo->query('SELECT * FROM contas WHERE situacao = 1');
            if($verificar->rowCount() != 0){
                $cmd = $this->pdo->query('DELETE FROM contas WHERE situacao = 1');
                echo "<h3>[ATENÇÃO] Todas as contas que estão A contas foram excluídas!!</h3>";
            }else{
                echo "<h3>[ATENÇÃO] Não existe nenhuma conta A contas!!</h3>";
            }
            
        }
        public function deletePagas(){
            $verificar = $this->pdo->query('SELECT * FROM contas WHERE situacao = 0');
            if($verificar->rowCount() != 0){
                $cmd = $this->pdo->query('DELETE FROM contas WHERE situacao = 0');
                echo "<h3>[ATENÇÃO] Todas as contas que estão PAGAS foram excluídas!!</h3>";
            }else{
                echo "<h3>[ATENÇÃO] Não existe nenhuma conta PAGAS!!</h3>"; 
            }   
        }
        public function deleteTotal(){
            $verificar = $this->pdo->query('SELECT * FROM contas');
            if($verificar->rowCount() == 0){
                echo "<h3>[ATENÇÃO] Não existe nenhuma conta!</h3>"; 
            }else{
                $cmd = $this->pdo->query('DELETE FROM contas');
                echo "<h3>[ATENÇÃO] TODAS AS CONTAS FORAM EXCLUÍDAS!!</h3>";
            }  
        }

        /*---------------------Ultimo Código---------------------*/
        public function ultimoCodigo(){
            $sql = $this->pdo->query("SELECT MAX(codigo) FROM `contas`");
            return $sql->fetch(\PDO::FETCH_ASSOC);
        }

        /*--------------------------Pesquisas---------------------*/
        public function pesquisarCodigo($pesquisa){
            $verificar = $this->pdo->query("SELECT * FROM contas WHERE codigo = '$pesquisa'");
            if($verificar->rowCount() > 0){
                $sql = $this->pdo->query("SELECT codigo, descricao, format(valor, 2, 'de_DE'), date_format(dt_vencimento, '%d/%m/%Y'), situacao FROM contas WHERE codigo = '$pesquisa'");
                $res = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            }else{
                return $res = 0;
            }
        }
        public function pesquisarDescricao($pesquisa){
            $verificar = $this->pdo->query("SELECT * FROM contas WHERE descricao = '$pesquisa'");
            if($verificar->rowCount() > 0){
                $sql = $this->pdo->query("SELECT codigo, descricao, format(valor, 2, 'de_DE'), date_format(dt_vencimento, '%d/%m/%Y'), situacao FROM contas WHERE descricao = '$pesquisa'");
                $res = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            }else{
                return $res = 0;
            }
        }
        
    }