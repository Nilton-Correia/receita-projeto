<?php 

function getProducts($pdo){
	$sql = "SELECT receita.*, categoria.*, pais.*, tipo_receita.* FROM receita INNER JOIN categoria ON receita.idcategoria=idcategoria INNER JOIN tipo_receita ON receita.idtipo_receita=tipo_receita.idtipo_receita WHERE id";
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