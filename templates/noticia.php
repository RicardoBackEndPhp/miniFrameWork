<!DOCTYPE html>
<!--
    Show news
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>show news</title>
    </head>
    <body>
        <h1>Template de notícias</h1>
        <a href="<?php echo BASE; ?>/noticia">Home</a>
        <hr/>
        <?php
            if(count($data['tableNews']) > 0)
            {
                foreach ($data['tableNews'] as $value) 
                {
                    echo "
                        <h2>{$value['titulo']}</h2>
                        <h3>{$value['conteudo']}</h3>
                        <h4>".implode('/',array_reverse(explode('-',$value['data'])))."</h4>
                        <hr/>
                    ";
                }
            }
            else
            {
                echo "<h4>Nenhuma notícia encontrada!</h4>";
            }
        ?>
    </body>
</html>
