  <?php
  session_start();
  ?>
  <?php
  include('conectarbd.php');
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>

    <!-- Fonte da Letra -->
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>

    <!-- jquery -->
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- CSS -->
    <link href="style.css" rel="stylesheet">

    <!-- para temporizador em tempo real-->
    <script type="text/javascript" src="date_time.js"></script>

    <!-- JS jwplayer 7.4 -->
    <script src="//ssl.p.jwpcdn.com/player/v/7.4.3/jwplayer.js"></script>
    <!-- JWplayer Licence - put your licence here -->
    <script type="text/javascript">jwplayer.key="8j8bPnpT04YsUDBz4DeAwM6VWfQmF2oRoyp0Xg==";</script>


    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TV Corporativa EITV">
    <meta name="author" content="Miguel Francisco">

    <title>EITV | TV Corporativa</title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body class="body">
    <table class="table-responsive" id="tabela">
      <tr>

        <!-- inicio logotipo -->
        <td style="width:20%">
          <div id="logotipo">
            <img alt="Logotipo EITV" src="images/logotipo.png">
          </div>
        </td>
        <!-- fim logotipo -->

        <!-- inicio player video -->
        <td colspan="2" rowspan="2" >
          <div id="container">
            <script type="text/javascript" src="jwplayer-7.4.3/jwplayer.js">
            </script>
            <script type="text/javascript">
              var playerInstance = jwplayer("container");
              playerInstance.setup({
                displaytitle: true,
                width: 700,
                height: 350,
                autostart:true,
                controls:true,
                repeat:true,
                skin: {
                 name: "stormtrooper"
               },
               playlist: [
               <?php
               $sql = "SELECT * FROM `tb_videos` WHERE `aceite`=1 ORDER by `data_inserido` desc LIMIT 30";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                 while ($row = $result->fetch_assoc()) {
                  echo "{
                    file: 'videos\\".$row['caminho_video']."',
                    image: 'images\\logotipo.png',
                    title: '".$row['titulo_video']."',
                    mediaid: '".$row['id_video']."'
                  },"
                  ;
                }
              }
              $conn->close();
              ?>]
            });
          </script>
          <!-- inicio script -->
          <script type="text/javascript">
            jwplayer("container").on('playlistComplete'){
              alert("Acabou");
                jwplayer("container").remove();
              }
          </script>
          <!-- fim script -->

          <!-- inicio script -->
          <script type="text/javascript">
            jwplayer("container").on('remove'){
              $('#container').load('videoplayer.php');
              }
          </script>
          <!-- fim script -->
        </div>
      </td>
      <!-- fim player video -->
    </tr>
    <tr>
      <!-- inicio widget tempo -->
      <td style="width:20%">
        <div id="widgetweather">
          <a href="http://www.accuweather.com/pt/pt/torres-vedras/274009/weather-forecast/274009" class="aw-widget-legal">
          <!--
          By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
        -->
      </a><div id="awcc1468226507115" class="aw-widget-current"  data-locationkey="274009" data-unit="c" data-language="pt" data-useip="false" data-uid="awcc1468226507115"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>
    </div> 
  </td>
  <!-- fim widget tempo -->
</tr>
<tr>

  <!-- data -->
  <td style="width:20%">
    <div id="widgetdata">
      <span id="date_time"></span>
      <script type="text/javascript">window.onload = date_time('date_time');</script>
    </div>
  </td>
  <!-- fim data -->

  <!-- noticias -->
  <td colspan="2" style="width:67%">

    <div id="noticiaseitv" class="parent-container">

      <?php
      $sqlnoticias = "SELECT * FROM `tb_noticias` ORDER BY `tb_noticias`.`data_noticia` DESC LIMIT 3";
      $resultado = $conn2->query($sqlnoticias);
      if ($resultado->num_rows > 0) {
        echo "<h4>Noticias</h4><ul>";
       while ($rownoticias = $resultado->fetch_assoc()){
        ?>
        <li>
        <a onclick="window.open('noticiadetalhe.php?id=<?php echo $rownoticias['id_noticia']?>','noticiadetalhe')" href='#' >
        <?php
        echo "<strong>".$rownoticias['titulo_noticia']."</strong> ".$rownoticias['resumo']." ";
        ?>
        </a>
        </li>
        <?php
      }
    }
    $conn2->close();
    ?>

    </ul>
  </div>
</td>
<!-- fim noticias -->
</tr>
</table>


<div class="container">
  <div class="panel panel-primary">
    <div class="panel-body">
      <div id="widgetnoticias">
        <!-- start feedwind code --><script type="text/javascript">document.write('\x3Cscript type="text/javascript" src="' + ('https:' == document.location.protocol ? 'https://' : 'http://') + 'feed.mikle.com/js/rssmikle.js">\x3C/script>');</script><script type="text/javascript">(function() {var params = {rssmikle_url: "http://feeds.feedburner.com/ddUltimas|http://www.cmjornal.xl.pt/rss.aspx|http://feeds.feedburner.com/ddMundo",rssmikle_frame_width: "300",rssmikle_frame_height: "400",frame_height_by_article: "3",rssmikle_target: "_blank",rssmikle_font: "Arial, Helvetica, sans-serif",rssmikle_font_size: "12",rssmikle_border: "off",responsive: "on",rssmikle_css_url: "",text_align: "left",text_align2: "left",corner: "off",scrollbar: "off",autoscroll: "on",scrolldirection: "down",scrollstep: "3",mcspeed: "20",sort: "Old",rssmikle_title: "off",rssmikle_title_sentence: "",rssmikle_title_link: "",rssmikle_title_bgcolor: "#0066FF",rssmikle_title_color: "#FFFFFF",rssmikle_title_bgimage: "",rssmikle_item_bgcolor: "#FFFFFF",rssmikle_item_bgimage: "",rssmikle_item_title_length: "100",rssmikle_item_title_color: "#01376A",rssmikle_item_border_bottom: "off",rssmikle_item_description: "title_only",item_link: "on",rssmikle_item_description_length: "150",rssmikle_item_description_color: "#666666",rssmikle_item_date: "on",rssmikle_timezone: "Europe/Lisbon",datetime_format: "%e.%m.%Y %k:%M",item_description_style: "text+tn",item_thumbnail: "full",item_thumbnail_selection: "auto",article_num: "20",rssmikle_item_podcast: "off",keyword_inc: "",keyword_exc: ""};feedwind_show_widget_iframe(params);})();</script><div style="font-size:10px; text-align:center; width:300px;">
        <!--  end  feedwind code -->
        <a href="http://feed.mikle.com/" target="_blank" style="color:#000000;">RSS Feed Widget</a>
        <!--Please display the above link in your web page according to Terms of Service.--></div>
      </div>
    </div>
  </div>
</div>


</body>
<script type="text/javascript"
    src="http://code.jquery.com/jquery-1.10.1.min.js">
    </script>
<script>
    $(document).ready(
            function() {
                setInterval(function() {
                    $('#noticiaseitv').load('scriptnoticias.php');
                }, 600000);
            });
</script>
<script>
    $(document).ready(
            function() {
                setInterval(function() {
                    $('#widgetweather').load('getstatus.php');
                }, 3600000);
            });
</script>
</html>