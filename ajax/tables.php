
<?php

include '../fonksiyon/fonksiyon.php';
include '../fonksiyon/connect.php';
include 'ajax/modals.php';


date_default_timezone_set('Europe/Istanbul');
$simdikitarih = date('Y/m/d H:i:s');


if($_GET["islem"]=="CATEGORY-LIST"){ ?>

    <table class="table table-striped  mx-4 my-4" id="kategoriler" >
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">KATEGORİ ADI</th>
            <th scope="col">HAKKINDA</th>
            <th scope="col">İŞLEMLER</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql ="SELECT * FROM category";
        $sorgu1 = $baglan->prepare($sql);
        $sorgu1->execute();
        while($satir1 = $sorgu1->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $satir1['ID']?></td>
                <td class="kategori_baslik" data-id="<?php echo $satir1["NAME"]; ?>"> <?php echo $satir1['NAME']?> </td>
                <td><?php echo $satir1['ABOUT']?></td>
                <td>
                    <div class="button-group">
                        <button type="button" class="btn btn-outline-success product-add-button" data-bs-toggle="modal" data-bs-target="#product_modal" data-id="<?php echo $satir1["ID"]; ?>" >
                            Ürün Ekle
                        </button>
                        <button type="button" class="btn btn-outline-danger kategori_sil" data-bs-dismiss="modal">Sil</button>
                    </div>
                </td>
            </tr>
        <?php }  ?>
        </tbody>
    </table>

    <div class="modal fade" id="product_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal_product">

            </div>

        </div>
    </div>

    <script>

        $(".product-add-button").on('click', function() {
            var category_id = $(this).attr("data-id");
            // var kategori_baslik = $(.kategori_baslik).attr("data-id");

            $.get("../ajax/modals.php?islem=product-add-modal", {category_id:category_id }, function (e) {
                $('.modal_product').html(e);

            });

        });


    </script>

 <?php }


if($_GET["islem"]=="PRODUCT-LIST"){  ?>


    <table class="table table-striped my-4 mx-4" id="urunler"  >
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">KATEGORİ ID</th>
            <th scope="col">ADEDİ</th>
            <th scope="col">MARKASI</th>
            <th scope="col">İŞLEMLER</th>


        </tr>
        </thead>
        <tbody>
        <?php
        $sql2 = "SELECT * FROM product";
        $sorgu2=$baglan->prepare($sql2);
        $sorgu2->execute();
        while($satir2 = $sorgu2->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $satir2['ID']?></td>
                <td><?php echo $satir2['NAME']?></td>
                <td><?php echo $satir2['CATEGORYID']?></td>
                <td><?php echo $satir2['AMOUNT']?></td>
                <td><?php echo $satir2['ABOUT']?></td>
                <td>
                    <button type="button" class="btn btn-outline-danger product-btn-delete" delete-id="<?php echo $satir2["ID"]; ?>" >Sil</button>
                    <button type="button" class="btn btn-outline-warning product-btn-edit" product-edit-id="<?php echo $satir2["ID"]; ?>" data-bs-toggle="modal" data-bs-target="#edit_modal">Düzenle</button>
                </td>

            </tr>
        <?php } ?>
        </tbody>
    </table>



    <script>



        $(".product-btn-edit").on('click', function() {            //

            var  product_id = $(this).attr("product-edit-id");

            // var  = $(.kategori_baslik).attr("data-id");
            //  alert(product_id);

            $.get("../ajax/modals.php?islem=prodact-btn-edit",{product_id:product_id}, function (e){ //
                $('.prodact-edit-modal').html(e);
            })
        });

        $(".product-btn-delete").on('click', function() {            //

            var  product_id = $(this).attr("delete-id");
            // var  = $(.kategori_baslik).attr("data-id");
            //  alert(product_id);

            $.get("../ajax/modals.php?islem=product-btn-delete",{product_id:product_id}, function (e){ //
                $('.modal_prodact').html(e);
            })
        });

    </script>


    <?php
}

?>

