<?php $sistema = info_header_footer(); ?>
<!-- Begin Footer Area -->
<div class="footer">
    <!-- Begin Footer Static Top Area -->
    <div class="footer-static-top">
        <div class="container">
            <!-- Begin Footer Shipping Area -->
            <div class="footer-shipping pt-60 pb-55 pb-xs-25">
                <div class="row">
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="<?php echo base_url('public/web/images/shipping-icon/1.png') ?>" alt="">
                            </div>
                            <div class="shipping-text">
                                <h2>Entrega Segura</h2>
                                <p>Entrega fornecida e gerenciada por <?php echo $sistema->sistema_nome_fantasia ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="<?php echo base_url('public/web/images/shipping-icon/2.png') ?>" alt="">
                            </div>
                            <div class="shipping-text">
                                <h2>Pagamento Seguro</h2>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="<?php echo base_url('public/web/images/shipping-icon/3.png') ?>" alt="">
                            </div>
                            <div class="shipping-text">
                                <h2>Compre com Segurança</h2>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                    <!-- Begin Li's Shipping Inner Box Area -->
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                        <div class="li-shipping-inner-box">
                            <div class="shipping-icon">
                                <img src="<?php echo base_url('public/web/images/shipping-icon/4.png') ?>" alt="">
                            </div>
                            <div class="shipping-text">
                                <h2>Dúvidas</h2>
                                <p>Tem alguma dúvida? Fale conosco.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Shipping Inner Box Area End Here -->
                </div>
            </div>
            <!-- Footer Shipping Area End Here -->
        </div>
    </div>
    <!-- Footer Static Top Area End Here -->
    <!-- Begin Footer Static Middle Area -->
    <div class="footer-static-middle">
        <div class="container">
            <div class="footer-logo-wrap pt-50 pb-35">
                <div class="row">
                    <!-- Begin Footer Logo Area -->
                    <div class="col-lg-5 col-md-6">
                        <div class="footer-logo">
                            <img src="images/menu/logo/1.jpg" alt="Footer Logo">
                            <p class="info">
                                Loja Virtual desenvolvida por Thiago Moura.
                            </p>
                        </div>
                        <ul class="des">
                            <li>
                                <span>Endereço: </span>
                                <?php echo 'CEP&nbsp' . $sistema->sistema_cep . ' ' . $sistema->sistema_endereco . ', ' . $sistema->sistema_numero ?>
                                <?php echo $sistema->sistema_cidade . ' - ' . $sistema->sistema_estado ?>
                            </li>
                            <li>
                                <span>Nossos Telefones: </span>
                                <?php echo $sistema->sistema_telefone_fixo . ' - ' . $sistema->sistema_telefone_movel ?>
                            </li>
                            <li>
                                <span>Email: </span>
                                <a href="mailto://<?php echo $sistema->sistema_email ?>"><?php echo $sistema->sistema_email ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Footer Logo Area End Here -->
                    <!-- Begin Footer Block Area -->
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="footer-block">
                            <h3 class="footer-block-title">Produtos</h3>
                            <ul>
                                <li><a href="#">Nossos Produtos</a></li>
                                <li><a href="#">Marcas</a></li>
                                <li><a href="#">Contate-nos</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Block Area End Here -->
                    <!-- Begin Footer Block Area -->
                    <!-- <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="footer-block">
                            <h3 class="footer-block-title">Nossa Empresa</h3>
                            <ul>
                                <li><a href="#">Delivery</a></li>
                                <li><a href="#">Legal Notice</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <!-- Footer Block Area End Here -->
                    <!-- Begin Footer Block Area -->
                    <div class="col-lg-4">
                        <div class="footer-block">
                            <h3 class="footer-block-title">Acompanhe-nos</h3>
                            <ul class="social-link">
                                <li class="facebook">
                                    <a href="<?php echo 'https://www.facebook.com/' . $sistema->sistema_facebook_url ?>" data-toggle="tooltip" target="_blank" title="Facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="instagram">
                                    <a href="<?php echo 'https://www.instagram.com/' . $sistema->sistema_instagram_url ?>" data-toggle="tooltip" target="_blank" title="Instagram">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Block Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Static Middle Area End Here -->
    <!-- Begin Footer Static Bottom Area -->
    <div class="footer-static-bottom pt-55 pb-55">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Footer Links Area -->
                    <div class="copyright text-center">
                        Preços e condições de pagamento exclusivos para compras pelo nosso site. Caso os produtos apresentem divergências de valores, o preço válido é o do carrinho de compras.<br>
                        Vendas sujeitas à análise e confirmação de dados através de e-mail ou telefone, dados incorretos serão cancelados automaticamente.<br>
                        Copyright © <?php $year = (new DateTime)->format("Y"); ?> - <?php echo $sistema->sistema_nome_fantasia ?> - Todos os direitos reservados.
                    </div>
                    <!-- Footer Links Area End Here -->
                    <!-- Begin Footer Payment Area -->
                    <div class="copyright text-center">
                        <a href="#">
                            <img src="images/payment/1.png" alt="">
                        </a>
                    </div>
                    <!-- Footer Payment Area End Here -->
                    <!-- Begin Copyright Area -->
                    <div class="copyright text-center pt-25">
                        <span><a target="_blank" href="#"><?php echo $sistema->sistema_nome_fantasia ?></a></span>
                    </div>
                    <!-- Copyright Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Static Bottom Area End Here -->
</div>
<!-- Footer Area End Here -->
<!-- Begin Quick View | Modal Area -->
<div class="modal fade modal-wrapper" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-inner-area row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-1">
                                <div class="lg-image">
                                    <img src="images/product/large-size/1.jpg" alt="product image">
                                </div>
                                <div class="lg-image">
                                    <img src="images/product/large-size/2.jpg" alt="product image">
                                </div>
                                <div class="lg-image">
                                    <img src="images/product/large-size/3.jpg" alt="product image">
                                </div>
                                <div class="lg-image">
                                    <img src="images/product/large-size/4.jpg" alt="product image">
                                </div>
                                <div class="lg-image">
                                    <img src="images/product/large-size/5.jpg" alt="product image">
                                </div>
                                <div class="lg-image">
                                    <img src="images/product/large-size/6.jpg" alt="product image">
                                </div>
                            </div>
                            <div class="product-details-thumbs slider-thumbs-1">
                                <div class="sm-image"><img src="images/product/small-size/1.jpg" alt="product image thumb"></div>
                                <div class="sm-image"><img src="images/product/small-size/2.jpg" alt="product image thumb"></div>
                                <div class="sm-image"><img src="images/product/small-size/3.jpg" alt="product image thumb"></div>
                                <div class="sm-image"><img src="images/product/small-size/4.jpg" alt="product image thumb"></div>
                                <div class="sm-image"><img src="images/product/small-size/5.jpg" alt="product image thumb"></div>
                                <div class="sm-image"><img src="images/product/small-size/6.jpg" alt="product image thumb"></div>
                            </div>
                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6 col-sm-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">
                                <h2>Today is a good day Framed poster</h2>
                                <span class="product-details-ref">Reference: demo_15</span>
                                <div class="rating-box pt-20">
                                    <ul class="rating rating-with-review-item">
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        <li class="review-item"><a href="#">Read Review</a></li>
                                        <li class="review-item"><a href="#">Write Review</a></li>
                                    </ul>
                                </div>
                                <div class="price-box pt-20">
                                    <span class="new-price new-price-2">$57.98</span>
                                </div>
                                <div class="product-desc">
                                    <p>
                                        <span>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum accusamus similique eveniet quia pariatur.
                                        </span>
                                    </p>
                                </div>
                                <div class="product-variants">
                                    <div class="produt-variants-size">
                                        <label>Dimension</label>
                                        <select class="nice-select">
                                            <option value="1" title="S" selected="selected">40x60cm</option>
                                            <option value="2" title="M">60x90cm</option>
                                            <option value="3" title="L">80x120cm</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="single-add-to-cart">
                                    <form action="#" class="cart-quantity">
                                        <div class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </div>
                                        <button class="add-to-cart" type="submit">Add to cart</button>
                                    </form>
                                </div>
                                <div class="product-additional-info pt-25">
                                    <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                    <div class="product-social-sharing pt-25">
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                            <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                        </ul>
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
<!-- Quick View | Modal Area End Here -->
</div>
<!-- Body Wrapper End Here -->
<!-- jQuery-V1.12.4 -->
<script src="<?php echo base_url('public/web/js/vendor/jquery-1.12.4.min.js') ?>"></script>
<!-- Popper js -->
<script src="<?php echo base_url('public/web/js/vendor/popper.min.js') ?>"></script>
<!-- Bootstrap V4.1.3 Fremwork js -->
<script src="<?php echo base_url('public/web/js/bootstrap.min.js') ?>"></script>
<!-- Ajax Mail js -->
<script src="<?php echo base_url('public/web/js/ajax-mail.js') ?>"></script>
<!-- Meanmenu js -->
<script src="<?php echo base_url('public/web/js/jquery.meanmenu.min.js') ?>"></script>
<!-- Wow.min js -->
<script src="<?php echo base_url('public/web/js/wow.min.js') ?>"></script>
<!-- Slick Carousel js -->
<script src="<?php echo base_url('public/web/js/slick.min.js') ?>"></script>
<!-- Owl Carousel-2 js -->
<script src="<?php echo base_url('public/web/js/owl.carousel.min.js') ?>"></script>
<!-- Magnific popup js -->
<script src="<?php echo base_url('public/web/js/jquery.magnific-popup.min.js') ?>"></script>
<!-- Isotope js -->
<script src="<?php echo base_url('public/web/js/isotope.pkgd.min.js') ?>"></script>
<!-- Imagesloaded js -->
<script src="<?php echo base_url('public/web/js/imagesloaded.pkgd.min.js') ?>"></script>
<!-- Mixitup js -->
<script src="<?php echo base_url('public/web/js/jquery.mixitup.min.js') ?>"></script>
<!-- Countdown -->
<script src="<?php echo base_url('public/web/js/jquery.countdown.min.js') ?>"></script>
<!-- Counterup -->
<script src="<?php echo base_url('public/web/js/jquery.counterup.min.js') ?>"></script>
<!-- Waypoints -->
<script src="<?php echo base_url('public/web/js/waypoints.min.js') ?>"></script>
<!-- Barrating -->
<script src="<?php echo base_url('public/web/js/jquery.barrating.min.js') ?>"></script>
<!-- Jquery-ui -->
<script src="<?php echo base_url('public/web/js/jquery-ui.min.js') ?>"></script>
<!-- Venobox -->
<script src="<?php echo base_url('public/web/js/venobox.min.js') ?>"></script>
<!-- Nice Select js -->
<script src="<?php echo base_url('public/web/js/jquery.nice-select.min.js') ?>"></script>
<!-- ScrollUp js -->
<script src="<?php echo base_url('public/web/js/scrollUp.min.js') ?>"></script>
<!-- Main/Activator js -->
<script src="<?php echo base_url('public/web/js/main.js') ?>"></script>

<?php if (isset($scripts)) : ?>
        <?php foreach ($scripts as $script) : ?>
            <script src="<?PHP echo base_url("public/assets/{$script}"); ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>