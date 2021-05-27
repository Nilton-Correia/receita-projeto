<?php

if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

function addCart($id, $quantity) {
    if(!isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id] = $quantity;
    }
}

function deleteCart($id) {
    if(isset($_SESSION['cart'][$id])){
        unset($_SESSION['cart'][$id]);
    }
}

function updateCart($id, $quantity) {
    if(isset($_SESSION['cart'][$id])){
        if($quantity > 0) {
            $_SESSION['cart'][$id] = $quantity;
        } else {
            deleteCart($id);
        }
    }
}

function getContentCart($pdo) {

    $results = array();

    if($_SESSION['cart']) {

        $cart = $_SESSION['cart'];
        $products =  getProductsByIds($pdo, implode(',', array_keys($cart)));

        foreach($products as $product) {

            $results[] = array(
                'idreceita' => $product['idreceita'],
                'imagens'=> $product['imagens'],
                'nome' => $product['nome'],
                'preco' => $product['preco'],
                'idcategoria'=> $product['idcategoria'],
                'idPais'=>$product['idPais'],
                'descricao'=>$product['descricao'],
                'video'=>$product['video'],
                'quantity' => $cart[$product['idreceita']],
                'subtotal' => $cart[$product['idreceita']] * $product['preco'],
            );
        }
    }

    return $results;
}

function getTotalCart($pdo) {

    $total = 0;

    foreach(getContentCart($pdo) as $product) {
        $total += $product['subtotal'];
    }
    return $total;
}