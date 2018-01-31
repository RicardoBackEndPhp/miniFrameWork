<!DOCTYPE html>
<!--
    Show list of title news
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>show news</title>
    </head>
    <body>
        <h1>Template de notícias</h1>
        <hr/>
        <?php
            if(count($data['tableNews']) > 0)
            {
                echo '<ul>';
                foreach ($data['tableNews'] as $value) 
                {
                    echo "
                        <li>
                            <a href='noticia/{$value['id']}'>
                                {$value['titulo']} 
                                (<small>".implode('/',array_reverse(explode('-',$value['data'])))."</small>)
                            </a>
                        </li>
                    ";
                }
                echo '</ul>';
            }
            else
            {
                echo "<h4>Nenhuma notícia encontrada!</h4>";
            }
        ?>
        <hr/>
        <h4>Adicionar notícia</h4>
        <form method="post">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" required="required"/><br/><br/>
            <label for="conteudo">Notícia</label>
            <textarea name="conteudo" id="conteudo" required="required"></textarea><br/><br/>
            <input type="submit" value="ADD NEWS"/>
        </form>
    </body>
</html>
