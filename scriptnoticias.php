<?php
include('conectarbd.php');
?>
<h4>Noticias</h4>
<ul>
  <?php
  $sqlnoticias = "SELECT * FROM `tb_noticias` ORDER BY `tb_noticias`.`data_noticia` DESC LIMIT 3";
  $resultado = $conn2->query($sqlnoticias);
  if ($resultado->num_rows > 0) {
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