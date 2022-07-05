<?php

include 'ajax/islem.php';
include  '../fonksiyon/connect.php';

// İD İLE MODALIN İÇERİĞİNİ ÇEKME
if($_GET["islem"]=="product-add-modal"){
    $category_id=$_GET["category_id"];
//    var_dump($category_id);
    // MODAL IN HEADER YAZISI NI CEKME
    $kategori="SELECT * FROM category  WHERE ID=$category_id";
    $categoryList=$baglan->prepare($kategori);
    $categoryList->execute();
    $ctg=$categoryList->fetch(PDO::FETCH_ASSOC);


    ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $ctg["NAME"] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="PRODUCTFORM">
                    <div class="mb-3" >
                        <label for="product_name" class="form-label">Ürün Adı :</label>
                        <input type="text" class="form-control" name="product_name" id="product_name" aria-describedby="product_NAME_help">
                        <div id="product_NAME_help" class="form-text">Açıklama</div>
                    </div>
                    <div class="mb-3">
                        <label for="product_about" class="form-label">Ürün Markası :</label>
                        <input type="text" class="form-control" name="product_about" id="product_about" aria-describedby="category_ABOUT_help">
                        <div id="product_ABOUT_help" class="form-text">Açıklama</div>
                    </div>
                    <div class="mb-3">
                        <label for="product_amount" class="form-label">Ürün Adedi :</label>
                        <input type="text" class="form-control" name="product_amount" id="product_amount" aria-describedby="product_AMOUNT_help">
                        <div id="product_AMOUNT_help" class="form-text">Açıklama</div>
                    </div>
                    <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>
                <button type="submit" data-bs-dismiss="modal" class="btn btn-dark product-btn-kaydet">Kaydet</button>
            </div>
        </div>
    </div>


    <script>

        $(".product-btn-kaydet").on('click', function() {
            var URUNEKLEFORM = $("#PRODUCTFORM").serialize();
            // alert(URUNEKLEFORM);
            // alert("İŞLEM BAŞARI İLE KAYDEDİLDİ");
            $.ajax({
                type:'POST',
                url:'../ajax/islem.php?islem=product-islem-kayit',
                data:URUNEKLEFORM,
                success:function (data)
                {
                    $('.urunyaz').html(data);
                    $('#product_modal.close').click();
                    $('.modal-backdrop').remove();

                    $.get( "../ajax/tables.php?islem=PRODUCT-LIST", function(e) {
                        $('#urunler').html(e);
                    });
                }
            });


        });
    </script>

<?php } if($_GET["islem"]=="prodact-btn-edit"){
    $product_id=$_GET["product_id"];
//    var_dump($category_id);
    // MODAL IN HEADER YAZISI NI CEKME
    $product="SELECT * FROM product  WHERE ID=$product_id";
    $productList=$baglan->prepare($product);
    $productList->execute();
    $ctg=$productList->fetch(PDO::FETCH_ASSOC);
    $ctg_name = $ctg["NAME"];
    $ctg_about = $ctg["ABOUT"];
    $ctg_amount = $ctg["AMOUNT"];


    ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php  echo $ctg["NAME"]; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="PRODUCTeditFORM">
                    <div class="mb-3" >
                        <label for="product_name" class="form-label">Ürün Adı :</label>
                        <input type="text" class="form-control" name="NAME" id="product_name" aria-describedby="product_NAME_help" value="<?php echo $ctg_name; ?>">
                        <div id="product_NAME_help" class="form-text">Açıklama</div>
                    </div>
                    <div class="mb-3">
                        <label for="product_about" class="form-label">Ürün Markası :</label>
                        <input type="text" class="form-control" name="ABOUT" id="product_about" aria-describedby="category_ABOUT_help" value="<?php echo $ctg_about; ?>">
                        <div id="product_ABOUT_help" class="form-text">Açıklama</div>
                    </div>
                    <div class="mb-3">
                        <label for="product_amount" class="form-label">Ürün Adedi :</label>
                        <input type="text" class="form-control" name="AMOUNT" id="product_amount" aria-describedby="product_AMOUNT_help" value="<?php echo $ctg_amount; ?>">
                        <div id="product_AMOUNT_help" class="form-text">Açıklama</div>
                    </div>
                    <input type="hidden" name="ID" value="<?php  echo $product_id; ?>">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kapat</button>
                <button type="submit" data-bs-dismiss="modal" class="btn btn-dark product-btn-guncelle">Kaydet</button>
            </div>

        </div>
    </div>


    <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="prodact-edit-modal">

            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>



    <script>






         $(".product-btn-edit").on('click', function() {
             var DUZENLEFORM = $("#PRODUCTeditFORM").serialize();
             // alert(URUNEKLEFORM);
             alert("İŞLEM BAŞARI İLE KAYDEDİLDİ");
             $.ajax({
                 type:'POST',
               url:'../fonksiyon/funksiyon.php?islem=UPDATE_DATA',
                 data:DUZENLEFORM,
                 succes:function (data)
                 {
                     $('.urunyaz').html(data);


                 }
             });

    </script>


<?php }  ?>







