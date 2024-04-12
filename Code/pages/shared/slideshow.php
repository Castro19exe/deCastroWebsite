<section>
    <div class="slideshow-container">
        <?php
            if(empty($_SESSION['user']['id'])) { ?>
                <div class="mySlides fade">
                    <a href="/DeCastro/pages/products.php"> <img src="/DeCastro/public/img/annouce2.png" class="slideshow-image"> </a>
                    <a href="/DeCastro/pages/products.php"> <img src="/DeCastro/public/img/responsive_announce4.png" class="responsive-slideshow-image"> </a> 
                </div>
                
                <div class="mySlides fade">
                    <a href=""> <img src="/DeCastro/public/img/announce3.png" class="slideshow-image"> </a>
                    <a href=""> <img src="/DeCastro/public/img/responsive_announce2.png" class="responsive-slideshow-image"> </a> 
                </div>
                
                <div class="mySlides fade">
                    <a href="/DeCastro/pages/sales.php"> <img src="/DeCastro/public/img/announce4.png" class="slideshow-image"> </a>
                    <a href="/DeCastro/pages/sales.php"> <img src="/DeCastro/public/img/responsive_announce3.png" class="responsive-slideshow-image"> </a> 
                </div>
            <?php
            }
            else { ?>
                <div class="mySlides fade">
                    <a href="/DeCastro/pages/products-log.php"> <img src="/DeCastro/public/img/annouce2.png" class="slideshow-image"> </a>
                    <a href="/DeCastro/pages/products-log.php"> <img src="/DeCastro/public/img/responsive_announce4.png" class="responsive-slideshow-image"> </a> 
                </div>
                
                <div class="mySlides fade">
                    <a href=""> <img src="/DeCastro/public/img/announce3.png" class="slideshow-image"> </a>
                    <a href=""> <img src="/DeCastro/public/img/responsive_announce2.png" class="responsive-slideshow-image"> </a> 
                </div>
                
                <div class="mySlides fade">
                    <a href="/DeCastro/pages/sales-log.php"> <img src="/DeCastro/public/img/announce4.png" class="slideshow-image"> </a>
                    <a href="/DeCastro/pages/sales-log.php"> <img src="/DeCastro/public/img/responsive_announce3.png" class="responsive-slideshow-image"> </a> 
                </div>
            <?php
            }
        ?>
        
        <a class="prev" onclick="plusSlides(-1)"><i class="fa fa-caret-left"> </i></a>
        <a class="next" onclick="plusSlides(1)"><i class="fa fa-caret-right"> </i></a>
    </div>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
    </div>
</section>