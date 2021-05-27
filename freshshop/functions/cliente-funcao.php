<?php
function getUtilizador($pdo){
    $sql = "SELECT *  FROM utilizador ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUtilizadorByIds($pdo, $ids) {
    $sql = "SELECT utilizador.*, tipo_utilizador.* FROM utilizador INNER JOIN tipo_utilizador ON utilizador.id_tipo=tipo_utilizador.id_tipo WHERE  id IN (".$ids.")";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}