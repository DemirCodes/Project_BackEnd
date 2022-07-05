<?php

//include '../fonksiyon/fonksiyon.php';
include '../fonksiyon/connect.php';
//PRODUCT WKLWMW İŞLWMLWEİ****************************************************************************************
if($_GET["islem"]=="product-islem-kayit")
{
//    echo "islemin içinde";


    $p_name = $_POST["product_name"];
    $p_about = $_POST["product_about"];
    $p_amount = $_POST["product_amount"];
    $category_id = $_POST["category_id"];

    $sql = "INSERT INTO product (NAME, CATEGORYID, AMOUNT, ABOUT) VALUES ('$p_name','$category_id','$p_amount','$p_about')";
    $sssql = $baglan->prepare($sql); // prapare komutu $sql  olarak tanımlanan sorguyu hazır edıyor işleme sokmak ıcın baglanın ıcıne atıyor  , bağlan komutunun sırtına yüklüyor yükü
    $sssql->execute(); // post ile alınan verileri execute ile kullanılabilir hale gıtrıdk

    if ($sssql->rowCount()) {
//        echo "iŞLEM BAŞARILI";
    }

}
?>


