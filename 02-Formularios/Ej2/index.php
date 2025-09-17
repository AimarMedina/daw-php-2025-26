<?php
if (!empty($_POST)) {
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $op = $_POST['op'];

    $resultado = 0;

    switch ($op) {
        case 'suma':
            $resultado = $n1 + $n2;
            break;
        case 'resta':
            $resultado = $n1 - $n2;
            break;
        case 'mult':
            $resultado = $n1 * $n2;
            break;
        case 'div':
            if ($n2 == 0) {
                $resultado = "Error. No se puede divir por 0";
            } else {
                $resultado = $n1 / $n2;
            }

            break;
    }
}

include "index.view.php";
