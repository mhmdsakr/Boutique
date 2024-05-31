<?php

include "../conn.php";


if($_SERVER['REQUEST_METHOD'] != "POST"){

    header("location:../../products.php");
    exit();

};



$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$category = $_POST['category'];
$brand = $_POST['brand'];
$description = $_POST['description'];

$allow_ext = ["jpg", "png", "jpeg", "bmb", "webp"];

$new = [];

foreach ($_FILES["image"]["name"] as $key => $value) {
    $img_name = $_FILES["image"]["name"][$key];
    $img_size = $_FILES["image"]["size"][$key];
    $img_tmp = $_FILES["image"]["tmp_name"][$key];

    $ext = pathinfo($img_name, PATHINFO_EXTENSION);
    if ($img_size > 3000000 && !in_array($ext, $$allow_ext)) {
        exit();
    }
    $new_img_name = time() . rand(1, 100000) . $img_name;
    move_uploaded_file($img_tmp, "image/$new_img_name");
    $new[] = $new_img_name;
}

$new_img = implode(",", $new);



$update = "UPDATE products SET
    name = '$name',
    price = '$price',
    image = '$new_img',
    count = '$count',
    cat = '$category',
    brand = '$brand',
    description = '$description'
    WHERE id = $id";
$query = $conn -> query($update);

if($query){
    header("location:../../products.php");
}else{
    echo $conn -> error;
};






?>