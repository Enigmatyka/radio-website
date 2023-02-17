<?php
include "modules/widgets.php";
$baseUrl = "https://radiornr.panelradiowy.pl";
$crewData = json_decode(getCrewData(), true);
?>

<!doctype html>
<script src="https://kit.fontawesome.com/29e0f941e0.js" crossorigin="anonymous"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/sz_PL/sdk.js#xfbml=1&version=v14.0" nonce="nEg7d6IQ"></script>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/tables.css">
    <link rel="stylesheet" href="/css/widgets.css">
    <link rel="icon" type="image/png" href="/images/favicon.ico">
    <title>Radio Nowy Rozdział</title>
  </head>

  <body>
    <div class="row" id="topBannerRow">
        <div class="col-sm-3"></div>
        <div class="col-sm-6" id="topBannerColumn">
            <div class="logo">
                <img class="img-fluid" id="logo" src="images/logo.jpg" alt="Logo radia">
            </div>    
        </div>
        <div class="col-sm-3"></div>
    </div>

    <div>
        <nav id="navigation">
            <ul id="topnav">
                <li onclick="window.location.reload()" id="target-start"><a href="">Start</a></li>
                <li onclick="window.open('https://radiornr.panelradiowy.pl/radio', '_blank')"><a href="#">Odtwarzacz</a></li>
                <li id="target-crew"><a href="#widgetColumn">Prezenterzy</a></li>
                <li id="target-schedule"><a href="#widgetColumn">Ramówka</a></li>
                <li id="target-greetings"><a href="#widgetColumn">Pozdrowienia</a></li>
                <li id="target-orderSong"><a href="#widgetColumn">Zamów utwór</a></li>
                <li id="infoHoverMenu"><a id="button" aria-describedby="tooltip" data-placement="bottom" data-toggle="popover">Info</a></li>
            </ul>
        </nav>
    </div>

    <div id="tooltip" role="tooltip">
        Facebook: <a href="https://www.facebook.com/radionowyrozdzial/">Fanpage</a><br>
        Youtube: <a href="https://www.youtube.com/channel/UCO-ZbyrtZlOT9R9k0oY4e6Q/">Kanał radia</a><br>
    </div>
    

    <div class="container-fluid" id="main-page">
        <div class="container-fluid" id="content">    
            <div class="row" id="middleRow">
                
                <div class="col-sm-3" id="globeWidget">
                    <script type="text/javascript" src="https://rf.revolvermaps.com/0/0/6.js?i=5zy4mopjz6k&amp;m=7&amp;c=e63100&amp;cr1=ffffff&amp;f=arial&amp;l=0&amp;bv=90&amp;lx=-420&amp;ly=420&amp;hi=20&amp;he=7&amp;hc=a8ddff&amp;rs=80" async="async"></script>
                </div>
        
                <div class="col-sm-6 col-centered">
                    <iframe id="radioPlayer" src="https://staty.portalradiowy.pl/statystyki/player-online/player1.php?na=RADIO+NOWY+ROZDZIA%C5%81&sl=MUZYKA+I+DOBRA+ZABAWA&ip=s1.slotex.pl&po=7148&kp=6D7DDA&ks=FFFFFF&kc=FFFFFF&tl=32&li=0&au=1&time=10" frameborder="0" scrolling="no" width="470" height="250"></iframe>
                </div>
        
                <div class="col-sm-3"></div>                    
            
            </div>
        </div>

        <div class="row" id="sideWidgets">
            <div class="col-sm-3">
                <div style="margin-left: 70px; margin-top: 30px; width: 220px; height: 115px; border: 1px solid black; padding: 5px; font-family: arial; font-size: 12px; color: black; background-color: white; border-radius: 7px;">
                    <center><span style=" font-weight: bold; font-size: 14px;">Słuchaj nas na Androidzie!</span><br>
                    Aby nas słuchać pobierz aplikację na swój telefon a następnie wyszukaj identyfikator naszej stacji: <b>71882</b><br><a target="_blank" href="https://play.google.com/store/apps/details?id=com.panelradiowy"><img style="border: none; margin-top: 3px;" src="/images/googleplay.png"></a></center></div>
            </div>
            <div class="col-sm-6 col-centered" id="discordColumn">
                <iframe class="discord" id="discord" style="margin: 5%; margin-bottom: 0px;" src="https://discordapp.com/widget?id=587966970138460162&theme=dark"></iframe>
                <div id="discordButtons">
                    <button onclick="window.open('https://discord.gg/RKTWBe3', '_blank')" class="btn navbar-btn btn-danger" id="enterChatButton" style="margin: 0%;">Wejdź na czat</button>
                </div>  
                
            </div>
            <div class="col-sm-3"></div>
        </div>

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 col-centered" id="widgetColumn"></div>
                
            <div class="col-sm-3">

            </div>                
        </div>
        
        <div id="widgetStash" style="display: none; margin-top: 10%;">
            <div id="orderSong">
                <iframe src="https://radiornr.panelradiowy.pl/embed.php?script=utwor" scrolling="no" border="0" marginwidth="0" marginheight="0" frameborder="no" width="300" height="220"></iframe>
            </div>

            <div id="crew">
                <?php
                    foreach ($crewData as $crewMember => $memberInfo) {
                        echo '<div class="crew-member">' . "\n";
                        echo '<span class="crew-member-name">' . $crewMember . '</span>' . "\n";
                        echo '<table class="crew-member-table" cellspacing="0" cellpadding="0">' . "\n";
                        echo '<tr><td class="image header">Zdjęcie:</td>' . "\n" . '<td class="header">Dane:</td></tr>' . "\n";
                        echo '<tr>' . "\n";
                        $avatarUrl = $baseUrl . $memberInfo['avatarURL'];
                        echo '<td class="image field"> <img class="avatar" src="' . $avatarUrl . '"></td>' . "\n";
                        echo '<td class="field">' . "\n";
                        $filteredData = array_filter($memberInfo);
                        echo '<span class="crew-member-data">' . "\n";


                        foreach ($filteredData as $key => $value) {
                            if ($key == 'avatarURL') {
                                echo '';      
                            } else {
                                echo $key . ": " . $value . '<br><hr>';
                            }
                        }
                        echo '</span>' . "\n";
                        echo '</td>' . "\n" . '</tr>' . "\n";
                        echo '</table>' . "\n" . '</div>' . "\n";
                    }
                ?>
            </div>

            <div id="greetings">
                <iframe src="https://radiornr.panelradiowy.pl/embed.php?script=pozdrowienia" scrolling="no" border="0" marginwidth="0" marginheight="0" frameborder="no" width="300" height="250"></iframe>
            </div>

            <div id="schedule">
                
            </div>

        </div>
    </div>    
	<div class="z0">

		<input name="z0-inputs" id="z0-tab-1" class="z0-inputs" type="radio" checked="checked">
		
		<div class="z0-icons-container">
			<ul class="z0-icons">
				<li><label for="z0-tab-1" class="z0-tab-1"><i class="fa fa-facebook"></i></label></li>
			</ul>
		</div>
	
		<div class="z0-tabs-container">
		    <div class="z0-tab z0-tab-1">
            <div class="fb-page" 
                data-href="https://www.facebook.com/radionowyrozdzial/"
                data-width="380" 
                data-hide-cover="false"
                data-show-facepile="true">
                </div>
            </div>
        </div>
</div>

    

    <div id="saleTextWidget" class="saleTextWidget" style="display: none"></div>
    <!-- <div id="facebook_slider_widget"><script type="text/javascript" src="http://webfrik.pl/widget/facebook_slider.html?fb_url=https://www.facebook.com/radionowyrozdzial&amp;fb_width=290&amp;fb_height=590&amp;fb_faces=true&amp;fb_stream=true&amp;fb_header=true&amp;fb_border=true&amp;fb_theme=light&amp;chx=787&amp;speed=FAST&amp;fb_pic=sign&amp;position=RIGHT"></script></div> -->

    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src='/scripts/widgets.js'></script>
    <script src='/scripts/hoverMenu.js'></script>
    <script src='/scripts/movingText.js'></script>
    
    <a
        href="https://widget.gg.pl/widget/aaa0bc06a47abb11c72f4da6129d54f9e1ca0ce836a17bf27e9ef3efa502db83#uin%3D69805304%7Cmsg_online%3DWitam%2C%20w%20czym%20mog%C4%99%20pom%C3%B3c%7Cmsg_offline%3DZostaw%20wiadomo%C5%9B%C4%87%20i%20informacje%20kontaktowe%2C%20a%20odpowiemy%20na%20Twoje%20pytanie.%7Chash%3Daaa0bc06a47abb11c72f4da6129d54f9e1ca0ce836a17bf27e9ef3efa502db83"
        style="background: linear-gradient(#2389c9 0%, #084972 100%); color: #fff; font-family: Arial, sans-serif; font-size: 14px; font-weight:normal; text-decoration: none; text-align: left; box-shadow: 0px 2px 8px 0px rgba(50, 50, 50, 0.6); -webkit-box-shadow: 0px 2px 8px 0px rgba(50, 50, 50, 0.6); -moz-box-shadow: 0px 2px 8px 0px rgba(50, 50, 50, 0.6); border-radius: 2px; -webkit-border-radius: 2px; display:block; padding: 2px; width:300px; margin-bottom: 26px;" rel="nofollow" data-gg-widget="snapped-bottom"
        target="_blank">
        
        <span style="display: block; padding:10px 8px; line-height:18px">
        <img alt="" style="float:left;padding-right:8px" src="https://status.gadu-gadu.pl/users/status.asp?id=69805304&amp;styl=1&amp;source=widget"/>POZDROWIENIA I KONTAKT</span>
        <span style="background: #fff; color: #888; display: block; line-height: 40px; padding-left: 12px; box-shadow: 0px 1px 1px 0px #bbb inset; -webkit-box-shadow: 0px 1px 1px 0px #bbb inset; -moz-box-shadow: 0px 1px 1px 0px #bbb inset;">Napisz do nas...
        <span style="background: #66c321; background: -webkit-linear-gradient(#66c321 0%, #4ba508 100%); background: -o-linear-gradient(#66c321 0%, #4ba508 100%); background: -moz-linear-gradient(#66c321 0%, #4ba508 100%); background: linear-gradient(#66c321 0%, #4ca70a 100%); border-radius: 3px; border-top: 1px solid #86e923; border-bottom: 1px solid #397b08; -webkit-border-radius: 3px; color: #fff; display:block; float:right; font-size: 12px; line-height: 22px; margin:9px; padding: 0 10px;
        text-align: center;">Wyślij</span>
        </span>
    </a>
    <script type="text/javascript">
        (function() {
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.id = 'gg-widget-script';
            s.src = 'https://widget.gg.pl/resources/js/widget.js';
            var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);
        })();
    </script>
  </body>
</html>