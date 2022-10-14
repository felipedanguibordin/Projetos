<?php

session_start();

if ( !isset($_SESSION['tasks']) ) {
    $_SESSION['tasks'] = array();
}

var_dump($_SESSION['tasks']);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Gerenciador de Tarefas</title>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Gerenciador e Tarefas</h1>
        </div>
        <div class="form">
            <form action="task.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="insert" value="insert">
                <label for="task_name">Tarefa: </label>
                <input type="text" name="task_name" placeholder="Nome da tarefa" autocomplete="off">
                <label for="task_description" autocomplete="off">Descrição:</label>
                <input type="text" name="task_description" placeholder="Descrição da Tarefa" autocomplete="off">
                <label for="task_date">Data</label>
                <input type="date" name="task_date">
                <label for="task_image">Imagem:</label>
                <input type="file" name="task_image">
                <button type="submit">Cadastrar</button>
            </form>
            <?php
                if ( isset($_SESSION['message']) ) {
                    echo "<p style='color: #ef5350';>" . $_SESSION['message'] . "</p>";
                    unset( $_SESSION['message'] );
                }
            ?>
        </div>
        <div class="separator">

        </div>
        <div class="list-tasks">

        <?php
            if ( isset($_SESSION['tasks']) ) {
                echo "<ul>";
                    foreach ( $_SESSION['tasks'] as $key => $task) {
                        echo "<li>
                            <span>" . $task['task_name'] . "</span>
                            <button type='button' class='limpa-tarefa' onclick='deletar$key()'>Remover</button>
                            <script>
                                function deletar$key(){
                                    if ( confirm('Confirmar') ) {
                                        window.location = 'http://localhost:8100/task.php?key=$key';
                                    }
                                    return false;
                                }
                            </script>
                        </li>";
                    }

                echo "</ul>";
            }

        ?>

        </div>
        <div class="footer">
            <p>Desenvolvido por @felipe_dangui_</p>
        </div>
    </div> 

</body>
</html>