<div class="navbar">
    <div class="logo">
        <img src="./picture/logo.png" alt="logo">
    </div>

    <!-- menu responsive -->
    <div class="menu-responsive">
        <div class="btn-menu">
            <i class="fas fa-bars"></i>
        </div>
        <ul class="categories-menu-mobile-hide ul-custom">
            <li>
                <i class="fas fa-times close-nav-mobile"></i>
            </li>
            <li>
            <a class="button-dkkh" href="?p=register-customer">Đăng ký khách hàng thân thiết</a>
            </li>
            <li>
            <a class="button-dkkh" href="login.php">Đăng nhập</a>
            </li>
            <li>
                <a href="/adc.php" class="expandable">
                    <span>Cho Nữ</span>
                </a>

            </li>
            <li>
                <a href="" class="expandable">
                    <span>Cho Nam</span>
                </a>
            </li>
            <li>
                <a href="#" class="expandable"><span>Unisex</span></a>
            </li>
            <li><a href="google.com"><span>Mỹ phẩm</span></a></li>
            <li><a href="#"><span>Mỹ phẩm Langé</span></a></li>
            <li><a href="#"><span>Mỹ phẩm M.O.I</span></a></li>
            <li><a href="#"><span>Mỹ Phẩm Lancôme</span></a></li>
            <li><a href="#"><span>SP Khuyến Mãi</span></a></li>
            <li><a href="#"><span>SP Mới</span></a></li>
            <li><a href="#"><span>SP Bán chạy</span></a></li>
        </ul>
    </div>

    <!-- menu desktop -->
    <nav>
        <ul class="menulevel1">
            <li class="menuMobile">
                <div class="menu">
                    <i class="fas fa-bars"></i> <span>danh mục</span> <i class="fas fa-caret-down"></i>


                    <ul class="categories-menu">
                        <!-- mobile -->
                        <li class="menu-mobile-show">
                            <a href="#"><span>DANH MỤC</span></a>
                            <i class="fas fa-times close"></i>
                        </li><!-- /mobile -->

                        <!-- mobile -->
                        <li class="menu-mobile-show">
                            <div class="search-trademark">
                                <div class="search-bar">
                                    <input type="text" placeholder="Tìm nước hoa hoặc nhãn hiệu...">
                                    <button><a href="#"><i class="fas fa-search"></i></a></button>
                                </div>
                            </div>
                        </li><!-- /mobile -->

                        <!-- select type product -->
                        <?php
                            $table = query_select("SELECT MaLoai, TenLoai, Mota FROM loaisp");
                            $count = $table->rowCount();
                            if ($count > 0) {
                                foreach ($table as $row) {
                        ?>

                        <li>
                            <a href="?p=type&&t=<?php echo $row['MaLoai']; ?>" class="expandable">
                                <span><?php echo $row['TenLoai']; ?></span>
                            </a>
                        </li>

                        <?php
                                }
                            }

                        ?>

                        <!-- list mobile -->
                        <li class="menu-mobile-show"><a href="#"><span>SP Khuyến Mãi</span></a></li>
                        <li class="menu-mobile-show"><a href="#"><span>SP Mới</span></a></li>
                        <li class="menu-mobile-show"><a href="#"><span>SP Bán chạy</span></a></li>
                        <!-- /list mobile -->

                    </ul>
                </div>
            </li>

            <li>
                <a href="?p=page&&tt=sale">SP KHUYẾN MÃI</a>
            </li>
            <li>
                <a href="?p=page&&tt=new">SP MỚI</a>
            </li>
            <li>
                <a href="?p=page&&tt=selling">SP BÁN CHẠY</a>
            </li>
            <!-- <li>
                <a href="?p=register-customer">ĐKKH</a>
            </li> -->
            <li>
                <a href="#">BLOG</a>
            </li>
            <li>
                <a href="?p=video">VIDEO</a>
            </li>
        </ul>
    </nav>

    <!-- phone number -->
    <div class="phone">
        <ul class="ul-custom">
            <li>
                <a href="tel:+84907364216">
                    <div class="icon">
                        <div>
                            <i class="fas fa-phone-volume"></i>
                        </div>
                    </div>
                    <div class="phone">
                        <div class="hours">
                            Đặt hàng:(8h30 - 21h30)
                        </div>
                        <div class="telephone">
                            0907.364.216
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="tel:+84939126206">
                    <div class="icon">
                        <div>
                            <i class="fas fa-phone-volume"></i>
                        </div>
                    </div>
                    <div class="phone">
                        <div class="hours">
                            Đặt hàng:(8h30 - 21h30)
                        </div>
                        <div class="telephone">
                            0939.126.206
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>