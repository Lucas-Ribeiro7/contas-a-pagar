<?php include "cabecalho.php" ?>
    
    <div class="home">
        <div class="base-corpo">
            <h1>Controle Financeiro</h1>
            <h4>Sofware com o objetivo de lhe ajudar no seu controle financeiro</h4>
            <p></a></p>
            <p>Total de contas cadastradas: 
                <b>
                    
                </b>
            </p>
        </div>   
    </div> 

    <div class="teste">
        <?php
            $valor = "112290";
            echo $valor . "<br>";
            $valor = str_replace(array(".",","), array(",", "."), $valor);
            echo $valor . "<br>";
        ?>
    </div>

<?php include "rodape.php" ?>