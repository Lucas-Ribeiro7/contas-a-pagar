<?php

    $numero = "98,32";
    $result = str_replace(array(".",","),array(",","."),$numero);
    echo $result;