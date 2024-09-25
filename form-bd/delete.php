<?php

if (!empty($_GET['id'])) {
    include_once("config.php");
    $id = $_GET['id'];
    if ($id != 1) {
        $sqlSelect = "SELECT * FROM users WHERE id_user = $id";
        $resultSel = $conexao->query($sqlSelect);
        if ($resultSel->num_rows > 0) {
            $sqlDelete = "DELETE FROM users WHERE id_user = $id";
            echo $sqlDelete;
            $resultDel = $conexao->query($sqlDelete);
        }
    } else {
        echo "<script>alert('Não é possível deletar o admin!')</script>";
        sleep(4);
    }
    ;

}
;

header("Location: sistema.php");

?>