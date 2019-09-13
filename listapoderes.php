<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>lista de poderes</title>
</head>
<body>
<?php
include 'pdo.php';
?>
<div class="container">

    <h1>Lista de Personagens</h1>


<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">Anime</th>
        <th scope="col">Origem</th>
        <th scope="col">Sexo</th>
        <th scope="col">Ranking</th>
    </tr>

    </thead>
    <tbody>
    <tr>
        <?php
        $dados = _buscapoderes();
        if (count($dados) > 0) {
            for ($i = 0; $i < count($dados); $i++) {
                echo "<tr>";
                foreach ($dados[$i] as $key => $value) {
                    if ($key != "id") {
                        echo "<td>" . $value . "</td>";
                    }
                }
                ?>
                <td>

                    <a href="updatepersonagem.html">
                        <button class="btn btn-dark">Editar</button>
                    </a>
                    <a href="infoPersona.php">
                        <button class="btn btn-dark">Habilidades</button>
                    </a>
                    <a href="index.php?id=<?php echo $dados[$i] ['id']; ?> "><button class="btn btn-dark">Excluir</button></a>
                    <?php
                    if(isset($_GET['id'])){
                        $idperssona = $_GET['id'];
                        $p = _deletepessona($idperssona);
                        header('location:index.php');

                    }
                    ?>
                </td>
                <?php
                echo "</tr>";
            }

        }
        ?>
    </tr>
    </tbody>
</table>
<div>
    <a href="cadastropersonagem.html">
        <button class="btn btn-primary">Cadastrar Novo Heroi</button>
    </a>
</div>
</div>
<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</body>
</html>