<!-- detail -->
<main id="mainDetail">

    <!-- detail product -->
    <section class="detailProduct">
        <div class="dt-pr-container">
            <!-- chi tiết sản phẩm -->
            <?php include("detail/product.php"); ?>

            <!-- chi tiết liên quan -->
            <div class="col-right related">
                <div class="title-logo">
                    <img src="./assets/img/logo-dt.png" alt="">
                </div>
                <!-- sản phẩm cùng loại -->
                <?php include("detail/related_products.php"); ?>

                <div class="bg-img">
                    <img src="./assets/img/bgdetail.png.pagespeed.ce.p_408CJl_1.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- product information -->
    <section class="productInformation">
        <div class="pr-in-container">
            <!-- thông tin sản phẩm -->
            <div class="col-left information">
                <div class="title">
                    <h3>THÔNG TIN LIÊN QUAN</h3>
                </div>
                <!-- thông tin sản phẩm -->
                <?php include("detail/information_product.php"); ?>

            </div>

            <!-- ý kiến khách hàng -->
            <div class="col-right opinion">
                <!-- ý kiến -->
                <div class="title">
                    <h3>Fanpage</h3>
                </div>
                <div class="content-review" id="fanpage">
                <div class="fb-page" data-href="https://www.facebook.com/370073336765998" data-tabs="timeline" data-width="500" data-height="1000" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/370073336765998" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/370073336765998">Huỳnh Ánh Tuyết</a></blockquote></div>
                </div>
            </div>
        </div>
    </section>

    <!-- trademark -->
    <section class="productTrademark">
        <div class="pr-tr-container">
            <div class="title">
                <h3><span>CÙNG THƯƠNG HIỆU</span></h3>
            </div>

            <!-- sản phẩm cùng thương hiệu -->
            <?php include('detail/trademark_product.php'); ?>

        </div>
    </section>

</main>