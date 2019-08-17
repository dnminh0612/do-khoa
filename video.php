<!-- main -->
<main id="main">
    <!-- main 1 -->
    <div class="main-1 m-container">
        <!-- banner advertisement -->
        <div class="bannerAdvertisement">
            <section class="advertisement">
                <div class="ba-qc">
                    <img src="./assets/img/banner-qc.jpg" alt="">
                </div>
                <div class="ba-qc">
                    <img src="./assets/img/banner-qc-2.jpg" alt="">
                </div>
                <div class="ba-qc">
                    <img src="./assets/img/banner-qc-3.jpg" alt="">
                </div>
            </section>
        </div>

        <!-- product -->
        <div class="boxProduct">

            <!-- combo -->
            <section class="product-1 product-combo">

                <div class="pr-container">

                    <div class="row-1 title">
                        <div class="bg-tt-1">
                            <h2>VIDEO</h2>
                        </div>
                    </div>

                    <div class="row-2 box-product video">
                    <?php
                        $table = query_select("SELECT * FROM video");
                        $count = $table->rowCount();
                        if ($count > 0) {
                            foreach ($table as $row) {
                    ?>
                        <div class="box">
                            <div>
                                <div class="card">
                                    <!-- VIDEO -->
                                    <iframe width="100%" height="250" src="<?php echo $row['URLVideo'] ?>"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                    <!-- TITLE VIDEO -->
                                    <!-- <div class="card-body">
                                        <p class="card-text" style="font-size: 16px;font-weight: 300;color: #333;margin: 10px 5px;color:white">Some content</p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    
                                <?php
                            }
                        }

                        else{
                            echo "<h4>Hiện tại chưa có video giới thiệu nào...</h4>";
                        }

                    ?>

                    </div>

                </div>

            </section>
        </div>
    </div>
</main>