<?php

include 'fonksiyon/connect.php';


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index sayfası</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        #kategori_button{
            left: 400px;

        }
        #kategori_table{

            width: 1000px;
            height: 100px;
            left: 50px;
            top: 165px;

        }
        #product_table{

            width: 1000px;
            height: 100px;
            left: 1200px;
            top: 50px;


        }
    </style>

</head>
<body>
<!-- SAYFA BAŞI -->
<div id="baslik" class="text-center my-4">
    <h1 >ABİ BAŞLIK İŞTE</h1>
    <button type="button" id="kategori_button" class="btn btn-outline-dark my-4 " data-bs-toggle="modal" data-bs-target="#Kategori_Modal">
        Kategori Ekle
    </button>
</div>

<div class="urunyaz"></div>









<!-- KATEGORİ Modal-->
<div class="modal fade" id="Kategori_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kategori Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="Kategori_adi" class="form-label">Kategori Adı :</label>
                        <input type="text" class="form-control" id="Kategori_adi" aria-describedby="textHelp">
                        <div id="textHelp" class="form-text">AÇIKLAMA</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-dark">Kaydet</button>
            </div>
        </div>


    </div>
</div>



<!------------------------------------------------------------------------------------------------->




<!-- PRODUCT ekle Modal -------------------------------------------------------------------------------------------------->



<!--------------------------------------------------------------------------------------------------------->


<!---   PRODUCT edit MODAL--->

<!----------------------------------------------------------------------------------------------------------------------------->








<!----------------KATEGORİ TABLOSU-------------------------------------------------->

<div class="row">
    <div class="col-lg-5" id="kategoriler">

    </div>
    <div class="col-lg-2"></div>



    <!----------------------PRODUCT TABLOSU-------------------------------------------->



    <div class="col-lg-5" id="urunler">


    </div>

</div>


<!--------------------------------------------------------------------------------->




</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<script>
    $.get("../ajax/tables.php?islem=CATEGORY-LIST", function (getVeri) {
        $('#kategoriler').html(getVeri);
    });

    $.get( "../ajax/tables.php?islem=PRODUCT-LIST", function(e) {
        $('#urunler').html(e);
    });

</script>

