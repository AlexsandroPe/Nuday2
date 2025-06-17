<?php 
    require_once "autoload.php";
    $dbEventTech = new Database();

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['telephone'])) {
            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['telephone'])) {
                $name = $_POST['name'];
                $email= $_POST['email'];
                $telephone = $_POST['telephone'];
                $user = new User($name, $email, $telephone);
                $dbEventTech->insertUser($user);
                header("location: index.php");
            }
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
        <div class="users">
            <div class="users_header">
                <h1>Nuday</h1>
            </div>
            <div class="users_container">
                <h2 style="color: #fff;">Inscritos</h2>
                <?php 
                  
                        foreach ($dbEventTech->getUsers() as $row)
                        {   echo "<div class='user_card'>
                            <p>{$row['name']}</p>
                            <p>{$row['email']}</p>
                            <p>{$row['telephone']}</p>
                            </div>";
                        }

                ?>
            </div>
        </div>  
        <section class="form_section">
            <h2 style="font-size: 40px; justify-self: flex-start; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Oportunidade incrível de fazer networking</h2>
            <p style="font-size: 22px;">Venha participar, se inscrevendo abaixo</p>
            <form class="form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="form_inputs_container">
                    <input type="text" name="name" id="name" placeholder="Nome:">
                    <input type="email" name="email" id="email" placeholder="Email:">
                    <input type="tel" name="telephone" id="telephone" placeholder="Telefone">
                </div>
                <input type="submit" value="Inscrever-se" class="submit_button">
            </form>
        </section>
    </main>
</body>
</html>
