<?php 

    if(isset($_POST['nome']) && isset($_POST['email'])) {
        if(!empty($_POST['nome']) && !empty($_POST['email'])) {
            $nome = $_POST['nome'];
            $email= $_POST['email'];
        }else { 
            $nome = "nenhum nome definido ainda!";
            $email = "nenhum email definido ainda!";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <div class="form">
    <form action="index.php" method="post" style="border: 1px solid black; width: 30%; border-radius: 8px; padding: 10px">
        <fieldset style="width: 200px; margin: 10px">
            <legend>Dados pessoais</legend>
            <label for="nome">Nome</label>
            <input style="outline: none; border-radius: 6px; border: 1px solid black; padding: 8px" type="text" name="nome" id="nome">            
            <label for="email">Email</label>
            <input style="outline: none; border-radius: 6px; border: 1px solid black; padding: 8px" type="email" name="email" id="email">            
        </fieldset>
        <input type="submit" value="Save">
    </form>
  </div>

  <div>
    <div class="usuarios">
        <ul>
            <li><p><?= $nome ?></p></li>
            <li><p><?= $email ?></p></li>
        </ul>
    </div>
  </div>
</body>
</html>


