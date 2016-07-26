<?php
$sql = "SELECT COUNT(*) as total FROM `tb_videos` WHERE aceite = 0";
$result=$conn->query($sql);
$data = $result->fetch_assoc();
?>
<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="index.php">EITV</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="backoffice.php">Backoffice</a>
                </li>
                <li><a href="listarvideos.php">Videos</a>
                </li>
                <?php
                if ($_SESSION['nivel']<=1) {
                    ?>
                    <li><a href="videospendentes.php">Videos Pendentes <span class="label label-primary"><?php echo $data['total']; ?></span></a>
                    </li>
                    <?php
                }?>
                <li><a href="listarutilizadores.php">Utilizadores</a>
                </li>
                <li><a href="listarnoticias.php">Notícias</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><?php echo utf8_decode("Sair de ".$_SESSION['nome']); ?></a>
                </li>
            </ul>
        </div>
    </div>
</div>