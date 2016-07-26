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
                skin: {
                 name: "stormtrooper"
               },
               playlist: [
               <?php
               $sql = "SELECT * FROM `tb_videos` WHERE `aceite`=1 ORDER by `data_inserido` desc LIMIT 20";
               $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                 while ($row = $result->fetch_assoc()) {
                  echo "{
                    file: 'videos\".$row['caminho_video']."',
                    image: 'images\logotipo.png',
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
            }
          </script>
          <!-- fim script -->

          <!-- inicio script -->
          <script type="text/javascript">
            jwplayer("container").on('remove'){
              $('#container').load('videoplayer.php');
              }
            }
          </script>
          <!-- fim script -->