<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>teste</title>
    </head>
    <body>
        <h4>Template HTML</h4>
        <?php
            echo "I want see a news specific... <b>{$data['id']}</b><br/>{$data['nome']}";
            
            if(is_array($data['tableNews']))
            {
                echo '<hr/><pre>';
                print_r($data['tableNews']);
                echo '</pre>';
            }
        ?>
        <ul>
            <?php
                foreach ($data['tableNews'] as $key => $value)
                {
                    echo "<li>$key: {$value['titulo']}</li>";
                }
            ?>
        </ul>
    </body>
</html>
