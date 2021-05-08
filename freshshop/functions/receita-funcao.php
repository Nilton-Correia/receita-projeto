<?php 

function getProducts($pdo){
	$sql = "SELECT *  FROM receita ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductsByIds($pdo, $ids) {
	$sql = "SELECT * FROM receita WHERE idreceita IN (".$ids.")";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCatReceita1($pdo){
    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE categoria.nome_categoria='Receita Carne' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getCatReceita2($pdo){
    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE categoria.nome_categoria='Receita Peixe' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCatReceita3($pdo){
    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE categoria.nome_categoria='Receita Peixe' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCatReceita4($pdo){
    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE categoria.nome_categoria='Sopas' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCatReceita5($pdo){
    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE categoria.nome_categoria='Sobremesa e Doces' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCatReceita6($pdo){
    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE categoria.nome_categoria='Massa' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCatReceita7($pdo){
    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE categoria.nome_categoria='Marisco' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCatReceita8($pdo){
    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE categoria.nome_categoria='Sumo e Bebidas' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCatReceita9($pdo){
    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE categoria.nome_categoria='Salada' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}