<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <style>
        body {
            text-align: center;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            border: 1px solid #ddd;
            background-color: #fff;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            text-transform: uppercase;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
        .tarefa-add input{
            width: 80%;
            height: 50px;
        }

        .tarefa-add input[type="text"]{
            font-size: 22px;
            font-family: Arial, Helvetica, sans-serif;
            color: rgb(102, 101, 101);
            border-radius: 3px;
            border: 2px gray solid;
        }

        .tarefa-add input[type="submit"]{
            font-size: 30px;
            font-family: Arial, Helvetica, sans-serif;
            color: white;
            border-radius: 3px;
            background-color: rgb(29, 145, 25);
            margin-top: 20px;
            margin-bottom: 50px;
            border: none;

        }

        .tarefa-add input[type="submit"]:hover{
            cursor: pointer;
            background-color: rgb(27, 125, 24);

        }
        .botao_nao_feito{
            background-color: rgb(214, 211, 11);
            width: 100px;
            border: none;
            border-radius: 3px;
            padding: 10px;
        }

        .botao_nao_feito:hover{
            cursor: pointer;
            background-color: rgb(176, 173, 4);
         }

        .botao_feito{
            background-color: rgb(37, 145, 25);
            width: 100px;
            border: none;
            border-radius: 3px;
            padding: 10px;
        }

        .botao_feito:hover{
            background-color: rgb(10, 94, 12);
            cursor: pointer;
         }

         .excluir{
            background-color: rgb(222, 35, 75); 
            width: 100px;
            border: none;
            border-radius: 3px;
            padding: 10px;
         }

         .excluir:hover{
            background-color: rgb(153, 17, 44);
            cursor: pointer;
         }
    </style>
</head>

<body>

<h1>INSERIR UMA NOVA TAREFA</h1>

<div class="tarefa-add" >
    <form action="index.php?action=add" method="post">
        <input type="text" maxlength="66" name="tarefa"> <br>
        <input type="submit">
    </form>
</div>


    <h1>TAREFAS</h1>

    <table>
        <th>TAREFAS</th>
        <th>STATUS</th>
        <th>EXCLUIR</th>

        <?php
        foreach ($tasks as $task) {
            ?>
            <tr>
                <td class="tarefa">
                    <?php echo $task["description"] ?>
                </td>

                <td>
                    <form action="index.php?action=status" method="post">
                        <button name="status" class="<?php if ($task["completed"] == NULL) {
                                echo "botao_nao_feito";
                            } else {
                                echo "botao_feito";} ?>" type="submit" value="<?php echo $task["id"] ?>">
                            <?php if ($task["completed"] == NULL) {
                                echo "NÃO FEITO";
                            } else {
                                echo $task["completed"];
                            } ?>
                        </button>
                    </form>
                </td>

                <td>
                    <form action="index.php?action=destroy" method="post">
                    <button name="excluir" type="submit" class="excluir" value="<?php echo $task["id"] ?>">Excluir</button></form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>


</body>
</html>