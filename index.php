
<?php 
    require_once "User.php";
    require_once "pdo.php";
    $dbEventTech = new dataBaseModel();
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['telephone'])) {
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['telephone'])) {
            $name = $_POST['name'];
            $email= $_POST['email'];
            $telephone = $_POST['telephone'];
            $inscrito = new User($name, $email, $telephone);
            $dbEventTech->insertPDO($inscrito);
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Nuday</title>
</head>
<body>
    <main class="main_container">
        <div class="inscritos">
            <h1>Nuday</h1>
            <h2>Inscritos</h2>
            <?php 
                foreach($dbEventTech->getInscritos() as $row)
                {
                    echo "<h5>{$row['id']}</h5>";
                    echo "<h5>{$row['name']}</h5>";
                    echo "<h5>{$row['email']}</h5>";
                    echo "<h5>{$row['telephone']}</h5>";
                }
            ?>
        </div>  
        <section class="formSection">
            <h2>Oportunidade incrível de fazer networking</h2>
            <p>Venha participar, se inscrevendo abaixo</p>
            
            <form class="forms" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="form-inputs_container">
                    <input type="text" name="name" id="name" placeholder="Nome:">
                    <input type="email" name="email" id="email" placeholder="Email:">
                    <input type="tel" name="telephone" id="telephone" placeholder="Telefone">
                </div>
                <input type="submit" value="Inscrever-se" class="submitBtn">
            </form>
        </section>
    </main>
</body>
</html>