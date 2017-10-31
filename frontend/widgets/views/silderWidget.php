  <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                
                                <div class="col-sm-6">
                                    <h2 align="center"><span>Nuestros Productos</span></h2>
                                    <p align="center">Excelente Diseño</p>
                                    <p align="center">Buena Calidad</p>
                                    <p align="center">Buenos Precios</p>
                                    <p align="center">Facilidad de Pagos</p>
                                    <h1 align="center"><span>PE&CO</span></h1>
                                </div>
                                <div class="col-sm-6">
                                    <img src="/peyco/backend/web/img/stand.jpg" class="girl img-responsive" alt="mesa" />
                                </div>
                            </div>

                                              <?php
                                                           
                                                foreach ($data as $col=>$value) {
                                                    ?>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h2 align="center"><span>Nuestros Productos</span></h2>
                                    <p align="center">Excelente Diseño</p>
                                    <p align="center">Buena Calidad</p>
                                    <p align="center">Buenos Precios</p>
                                    <p align="center">Facilidad de Pagos</p>
                                    <h1 align="center"><span>PE&CO</span></h1>
                                </div>
                                <div class="col-sm-6">
                                    <img src="<?= '/peyco/backend/web/img/'.$value['imag_adju']  ?>" alt="" class="img-rounded" height="300" width="300">
                                </div>                                
                            </div>

                            <?php } ?>

                                                        
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->