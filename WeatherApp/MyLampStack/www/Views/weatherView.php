<?php ob_start(); ?>
<h2>Weather Data</h2>
<table class="table">
    <caption>Weather in Belgium</caption>
    <tr scope="row" class='thead-dark'>
        <th id='city' scope="col">City</th>
        <th id='high' scope="col">High</th>
        <th id='low' scope="col">Low</th>
        <th id='del' scope="col">Delete</th>
    </tr>
    <?php
    while ($data = $weatherData->fetch()) {
    ?>
        <tr>
            <td><?= $data['ville'] ?></td>
            <td><?= $data['haut'] ?></td>
            <td><?= $data['bas'] ?></td>
            <td>
                <form action="index.php" method="post">
                    <button type="submit" name="submit" value=<?= $data['ville'] ?> class="btn btn-secondary">X</button>
                </form>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<h2>Insert Temp</h2>
<form action="index.php" method="POST">
    <div class="form-group">
        <label for="city">City: </label>
        <input type="text" id="city" name="city" aria-describedby="city">
    </div>
    <div class="form-group">
        <label for="high">High: </label>
        <input type="text" id="high" name="high" aria-describedby="high">
    </div>
    <div class="form-group">
        <label for="low">Low: </label>
        <input type="text" id="low" name="low" aria-describedby="low">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php');
