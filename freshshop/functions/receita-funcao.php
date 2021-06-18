<?php

function getProducts($pdo){
	$sql = "SELECT *  FROM receita ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getProductos($pdo){
$sql = "SELECT receita.*,categoria.*,pais.*  FROM receita INNER JOIN pais ON receita.idPais=pais.idPais INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function pesquisar($pdo,$pesquisar)
{
    $sql = "SELECT *  FROM receita where nome LIKE '%$pesquisar' ";
    $result = $sql->query($sql);
    $result->num_rows;
    if ($result != null) {
        while ($row = $result->fetch_assoc()) {

        }
    }
}

function getProductsByIds($pdo, $ids) {
	$sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE  idreceita IN (".$ids.")";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getCatReceita1($pdo){
    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE categoria.nome_categoria='Receita_Carne' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getCatReceita2($pdo){
    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE categoria.nome_categoria='Receita_Peixe' ";
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
    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE categoria.nome_categoria='Sobremesa_Doces' ";
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
    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE categoria.nome_categoria='Sumo_Bebidas' ";
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

function getCategoria($pdo){

    $sql = "SELECT * FROM categoria";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getPortugal($pdo){
    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE pais.Pais='Portugal' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getSao_tome($pdo){

    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE pais.Pais='São Tomé e Principe' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getBrasil($pdo){

    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE pais.Pais='Brazil' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getCabo_verde($pdo){

    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE pais.Pais='Cabo Verde' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getGuine($pdo){

    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE pais.Pais='Guiné Bissau' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getMocambique($pdo){

    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE pais.Pais='Moçambique' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getTimor($pdo){

    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE pais.Pais='Timor-Leste' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getAngola($pdo){

    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE pais.Pais='Angola' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getGuine_equatorial($pdo){

    $sql = "SELECT receita.*, categoria.*, pais.* FROM receita INNER JOIN categoria ON receita.idcategoria=categoria.idcategoria INNER JOIN pais ON receita.idPais= pais.idPais WHERE pais.Pais='Guiné Equatorial' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


