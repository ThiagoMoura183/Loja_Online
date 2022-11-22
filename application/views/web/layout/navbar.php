<?php $sistema = info_header_footer(); ?>
<?php $marcas = getMarcas(); ?>
<?php $categoriasPai = getCategoriasPaiNavbar(); ?>

<!-- Begin Header Area -->
<header>
    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-4 col-md-4">
                    <div class="header-top-left">
                        <ul class="phone-wrap">
                            <li><span>Nossos telefones:</span> <?php echo $sistema->sistema_telefone_fixo . ' - ' . $sistema->sistema_telefone_movel ?></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-8 col-md-8">
                    <div class="header-top-right">
                        <ul class="ht-menu">
                            <!-- Begin Setting Area -->
                            <li>
                                <div class="ht-setting-trigger"><span>Marcas</span></div>
                                <div class="setting ht-setting">
                                    <ul class="ht-setting-list">
                                        <?php foreach ($marcas as $marca) : ?>
                                            <li><a href="<?php echo base_url('marca/' . $marca->marca_meta_link) ?>"><?php echo $marca->marca_nome ?></a></li>
                                        <?php endforeach; ?>
                                        <li><a href="login-register.html">My Account</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Setting Area End Here -->
                        </ul>
                    </div>
                </div>
                <!-- Header Top Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="index.html">
                            <img src="<?php echo base_url('public/web/images/menu/logo/1.jpg') ?>" alt="">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                    <?php
                    $atributos = ['class' => 'hm-searchbox'];
                    ?>
                    <!-- <form action="#" class="hm-searchbox"> -->
                    <?php echo form_open('busca', $atributos) ?>
                        <input type="text" name="busca" placeholder="Qual produto você está procurando?">
                        <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                    <?php echo form_close() ?>
                    </form>
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Mini Cart Area -->
                            <li class="hm-minicart">
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    <span class="item-text">£80.00
                                        <span class="cart-item-count">2</span>
                                    </span>
                                </div>
                                <span></span>
                                <div class="minicart">
                                    <ul class="minicart-product-list">
                                        <li>
                                            <a href="single-product.html" class="minicart-product-image">
                                                <img src="images/product/small-size/5.jpg" alt="cart products">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a href="single-product.html">Aenean eu tristique</a></h6>
                                                <span>£40 x 1</span>
                                            </div>
                                            <button class="close" title="Remove">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <a href="single-product.html" class="minicart-product-image">
                                                <img src="images/product/small-size/6.jpg" alt="cart products">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a href="single-product.html">Aenean eu tristique</a></h6>
                                                <span>£40 x 1</span>
                                            </div>
                                            <button class="close" title="Remove">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </li>
                                    </ul>
                                    <p class="minicart-total">SUBTOTAL: <span>£80.00</span></p>
                                    <div class="minicart-button">
                                        <a href="shopping-cart.html" class="li-button li-button-fullwidth li-button-dark">
                                            <span>View Full Cart</span>
                                        </a>
                                        <a href="checkout.html" class="li-button li-button-fullwidth">
                                            <span>Checkout</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                    <div class="hb-menu">
                        <nav>
                            <ul>
                                <li class="dropdown-holder"><a href="<?php echo base_url('/') ?>">Home</a>

                                </li>
                                <?php foreach ($categoriasPai as $catPai) : ?>
                                    <?php $categoriasFilha = getCategoriasFilhaNavbar($catPai->categoria_pai_id); ?>

                                    <li class="dropdown-holder mx-1"><a href="<?php echo base_url('master/' . $catPai->categoria_pai_meta_link) ?>"><?php echo $catPai->categoria_pai_nome ?></a>
                                        <ul class="hb-dropdown">
                                            <?php foreach ($categoriasFilha as $catFilha) : ?>
                                                <li class="active"><a href="<?php echo base_url('categoria/' . $catFilha->categoria_meta_link) ?>"><?php echo $catFilha->categoria_nome ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>

                                <?php endforeach; ?>

                            </ul>
                        </nav>
                    </div>
                    <!-- Header Bottom Menu Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End Here -->
</header>
<!-- Header Area End Here -->