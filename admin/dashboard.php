<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="single_element">
                    <div class="quick_activity">
                        <div class="row">
                            <div class="col-12">
                                <div class="quick_activity_wrap">
                                    <div class="single_quick_activity">
                                        <div class="count_content">
                                            <p>Total Barang</p>
                                            <h3><span class="counter"><?php echo mysqli_num_rows($qbarang); ?></span></h3>
                                        </div>
                                        <a href="#" class="notification_btn">Unit</a>
                                    </div>

                                    <div class="single_quick_activity">
                                        <div class="count_content">
                                            <p>Barang Masuk</p>
                                            <h3><span class="counter"><?php echo mysqli_num_rows($qmasuk); ?></span></h3>
                                        </div>
                                        <a href="#" class="notification_btn yellow_btn">Bulan Ini</a>
                                    </div>

                                    <div class="single_quick_activity">
                                        <div class="count_content">
                                            <p>Barang Keluar</p>
                                            <h3><span class="counter"><?php echo mysqli_num_rows($qkeluar); ?></span></h3>
                                        </div>
                                        <a href="#" class="notification_btn green_btn">Bulan Ini</a>
                                    </div>

                                    <div class="single_quick_activity">
                                        <div class="count_content">
                                            <p>Total Transaksi</p>
                                            <h3><span class="counter"><?php echo mysqli_num_rows($qtransaksi); ?></span></h3>
                                        </div>
                                        <a href="#" class="notification_btn violate_btn">Bulan Ini</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>