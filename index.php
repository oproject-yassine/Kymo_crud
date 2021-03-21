

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"> -->
    <title>Kymo  Users</title>
</head>
<body>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.css"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.css"></script> --> 

<?php require_once 'codigo.php'; ?>

<div class="container">

<?php   $sql = new mysqli("localhost", "root", "", "kymo_users") or die(mysqli_error($sql));
        $resultado =  $sql->query("SELECT * FROM users") or die($sql->error); 

        function mostra($lista){
            echo'<pre>';
            print_r($resultado);
            echo'</pre>';
        }

?>
<!--    make the table here -->    

    <div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th colspan="2"></th>
            </tr>
        </thead>

<!-- put the info here -->        

    <?php while($conteudo=$resultado->fetch_assoc()): ?>

        <tr>
            <td><?php echo $conteudo['name']  ?></td>
            <td><?php echo $conteudo['email']  ?></td>
            <td>
                <a href="index.php?edit=<?php echo $conteudo['id']; ?>" class="btn btn-info">Modificar</a>
                <a href="index.php?delete=<?php echo $conteudo['id']; ?>" class="btn btn-danger">Apagar</a>
            </td>
        </tr>
    <?php endwhile;?>
    </table>
    </div>

<!--  make the form here -->    

    <div class="justify-content-center">
    <form action="codigo.php" method="POST">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Seu Nome">
        </div >

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Seu Email">
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>"placeholder="Sua Senha">
        </div>

        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <?php if($clickEdit == true): ?>
                <button type="submit" class="btn btn-primary"name="update" >Atualizar</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary"name="save" >Salvar</button>
            <?php endif?>
        </div>
    </form>
</div>  

</body>
</html>  