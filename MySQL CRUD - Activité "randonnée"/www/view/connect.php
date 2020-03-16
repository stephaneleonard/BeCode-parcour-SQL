<?php
ob_start();
?>
<div class="container">
    <h1>Se Connecter</h1>
    <form action="index.php?Page=ajouter" method="post">

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" value="">
        </div>


        <button type="submit" name="button">Envoyer</button>
    </form>
</div>
<?php
$content = ob_get_clean(); ?>
<?php require('template.php');
