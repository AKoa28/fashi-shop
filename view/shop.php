<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">
                            
                        <?php
                            include_once("controller/cSanPham.php");
                            $p = new clscsanpham();
                            if(isset($_GET["th"])){
                                $con = $p->getallsanphambytype($_GET["th"]);
                            }elseif(isset($_GET["subsearch"])){
                                $con = $p->getallsanphambyname($_GET["txttimkiem"]);
                            }else{
                                $con = $p->getallsanpham();
                            }
                            if(!$con){
                                echo "Không có sản phẩm bạn muốn tìm";
                            }else{
                                
                                while($r = mysqli_fetch_assoc($con)){
                                
                                    echo '
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <img src="img/products/'.$r["hinhanh"].'" alt="">';
                                                if($r["giaban"] == 0){
                                                    echo '';
                                                }else{
                                                    echo '<div class="sale pp-sale">Sale</div>';
                                                }
                                    echo '
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="?chitietsanpham&id='.$r["idsp"].'">+ Xem chi tiết</a></li>
                                               
                                            </ul>
                                        </div>
                                    ';
                                    echo '
                                        <div class="pi-text">
                                            <div class="catagory-name">'.$r["tenth"].'</div>
                                                <a href="?chitietsanpham&id='.$r["idsp"].'">
                                                    <h5>'.$r["tensp"].'</h5>
                                                </a>
                                            <div class="product-price">
                                        ';
                                            if($r["giaban"]==0){
                                                echo number_format($r["giagoc"],0,",",".")." $";
                                            }else{
                                                echo number_format($r["giaban"],0,",",".")." $ <span>".number_format($r["giagoc"],0,",",".")." $<span>";
                                            }
                                    echo '
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    ';
                                }
                            }
                        ?>
                                    
                                
                        </div>
                    </div>       
                    <div class="loading-more">
                        <i class="icon_loading"></i>
                        <a href="#">
                            Loading More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
