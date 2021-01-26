    <?php
        include "cabecalho.php";
    ?>

    <div class="home">
        <div class="base-corpo">
            <?php
                echo "<h2>Teste!</h2>";

                $dados = $p->buscarDadosAbertos();
                echo "<pre>";
                    var_dump($dados["0"]["dt_vencimento"]);
                echo "</pre>";
            ?>
        </div>
    </div>