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
        $receitas =  getReceitasByIds($pdo, implode(',', array_keys($cart)));

        foreach($receitas as $receit) {

            $results[] = array(
                'idreceita' => $receit['idreceita'],
                'imagens'=> $receit['imagens'],
                'nome' => $receit['nome'],
                'preco' => $receit['preco'],
                'idcategoria'=> $receit['idcategoria'],
                'idPais'=>$receit['idPais'],
                'descricao'=>$receit['descricao'],
                'video'=>$receit['video'],
                'quantity' => $cart[$receit['idreceita']],
                'subtotal' => $cart[$receit['idreceita']] * $receit['preco'],
            );
        }
    }

    return $results;
}

function getTotalCart($pdo) {

    $total = 0;

    foreach(getContentCart($pdo) as $receit) {
        $total += $receit['subtotal'];
    }
    return $total;
}