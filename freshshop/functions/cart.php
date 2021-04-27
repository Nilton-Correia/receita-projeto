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
        $receita =  getProductsByIds($pdo, implode(',', array_keys($cart)));

        foreach($receita as $receita) {

            $results[] = array(
                'idreceita' => $receita['idreceita'],
                'imagens'=> $receita['imagens'],
                'nome' => $receita['nome'],
                'preco' => $receita['preco'],
                'quantity' => $cart[$receita['idreceita']],
                'subtotal' => $cart[$receita['receita']] * $receita['preco'],
            );
        }
    }

    return $results;
}

function getTotalCart($pdo) {

    $total = 0;

    foreach(getContentCart($pdo) as $receita) {
        $total += $receita['subtotal'];
    }
    return $total;
}