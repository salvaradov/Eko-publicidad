<?php
    session_start();
    include("header.html");
    require 'conexionDB.php';
    $db = new Database();
    $con = $db->conectar();
    $sql = $con->prepare("SELECT idProducto, nombre, descripcion, precio, imagen FROM producto");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
    
    <main>
        <div class="container">
            <div class="row row-cols-2 g-3">

                <?php foreach($resultado as $row){?>
                    <div class="col">
                        <div class="card">
                            <?php
                                $id = $row["idProducto"];
                                $imagen = $row["imagen"];
                       
                            ?>
                            <img src="<?php echo $imagen?>" class="imagen_producto">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row["nombre"]?></h5>
                                <p class = "card-text">$ <?php echo $row["precio"]?></p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="#" class="btn btn-success"> Cotizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>

            </div>
        </div>
    </main>

</body>
</html>
    
