<?php include_once("admin/model/Config.cls.php");
$base=new Connection();
$connect=$base->connect();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" type="text/css">
<title>Home</title>
</head>

<body>
<div id="container">
<header>
<nav id="Menutop">
<ul>
<a href="index.php"><li>HOME</li></a>
<a href="Restaurant.php"><li>PRESENTATION</li></a>
<a href="Galeries.php"><li>GALERIES</li></a>
<a href="Menu.php"><li>MENU</li></a>
<a href="Contact.php"><li>CONTACT</li></a>
</ul>
</nav>
</header>
<div id="slider">
<!-------------------------------------------------->

  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>
    <!-- use jssor.slider.debug.js instead for debug -->
    <script>
        jQuery(document).ready(function ($) {
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>

    <style>
        
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('image/img/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 22 css */
        /*
        .jssora22l                  (normal)
        .jssora22r                  (normal)
        .jssora22l:hover            (normal mouseover)
        .jssora22r:hover            (normal mouseover)
        .jssora22l.jssora22ldn      (mousedown)
        .jssora22r.jssora22rdn      (mousedown)
        */
        .jssora22l, .jssora22r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 58px;
            cursor: pointer;
            background: url('image/img/a22.png') center center no-repeat;
            overflow: hidden;
        }
        .jssora22l { background-position: -10px -31px; }
        .jssora22r { background-position: -70px -31px; }
        .jssora22l:hover { background-position: -130px -31px; }
        .jssora22r:hover { background-position: -190px -31px; }
        .jssora22l.jssora22ldn { background-position: -250px -31px; }
        .jssora22r.jssora22rdn { background-position: -310px -31px; }
    </style>


    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('image/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
           <?php
           $qry = 'select * from photos where typep="slider"';
           $res=$connect->query($qry);
           while($ligne=$res->fetch()){
           ?>
            <div data-p="225.00" style="display: none;">
                <img data-u="image" src="admin/image/sld_img/<?php echo $ligne["nomp"];?>" />
            </div>
            <?php }?>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
    </div>

  

<!------------*****************-------------------->
</div>
<section id="sectionaccueil">
<div id="artdiv">
<article> <div><img src="image/food1.jpg"> <p>Vous pouvez ??galement commander McDonald's en ligne avec un menu best of ou tout ce qui vous fait plaisir dans un McDonald's ?? Casablanca. Vous b??n??ficierez des m??mes menus ??nonc??s sur ceux de Rabat. Ainsi, ?? Casablanca, vous n'aurez que l'embarras du choix pour commander un McDonald's en ligne car tous les menus cit??s plus haut sont disponibles en ligne.</p></div><h2>azerty</h2></article>
<article> <div><img src="image/food2.jpg"> <p>Vous pouvez ??galement commander McDonald's en ligne avec un menu best of ou tout ce qui vous fait plaisir dans un McDonald's ?? Casablanca. Vous b??n??ficierez des m??mes menus ??nonc??s sur ceux de Rabat. Ainsi, ?? Casablanca, vous n'aurez que l'embarras du choix pour commander un McDonald's en ligne car tous les menus cit??s plus haut sont disponibles en ligne.</p></div><h2>azerty</h2></article>
<article><div><img src="image/food3.jpg"> <p>Vous pouvez ??galement commander McDonald's en ligne avec un menu best of ou tout ce qui vous fait plaisir dans un McDonald's ?? Casablanca. Vous b??n??ficierez des m??mes menus ??nonc??s sur ceux de Rabat. Ainsi, ?? Casablanca, vous n'aurez que l'embarras du choix pour commander un McDonald's en ligne car tous les menus cit??s plus haut sont disponibles en ligne.</p></div><h2>azerty</h2> </article>
</div>
</section>
<footer>
<nav id="Menubuttom">
<ul>
    <a href="index.php"><li>Home</li></a>
    <a href="Restaurant.php"><li>Presentation</li></a>
    <a href="Galeries.php"><li>Galeries</li></a>
    <a href="Menu.php"><li>Menu</li></a>
    <a href="Contact.php"><li>Contact</li></a>
</ul>
</nav>
</footer>

</div></body>
</html>
