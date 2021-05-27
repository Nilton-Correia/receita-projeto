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
