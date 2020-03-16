<?php 
define('DIFFICULTY' , 'difficulty');
define('SELECTED' , 'selected');
ob_start(); 

?>
<div class="container">
	<h1>Modifier</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?= $content['name'] ?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="Très facile" <?= $content[DIFFICULTY] == 'Très facile' ? SELECTED : '' ?>>Très facile</option>
				<option value="Facile" <?= $content[DIFFICULTY] == 'Facile' ? SELECTED : '' ?>>Facile</option>
				<option value="Moyen" <?= $content[DIFFICULTY] == 'Moyen' ? SELECTED : '' ?>>Moyen</option>
				<option value="Difficile" <?= $content[DIFFICULTY] == 'Difficile' ? SELECTED : '' ?>>Difficile</option>
				<option value="Très difficile" <?= $content[DIFFICULTY] == 'Très difficile' ? SELECTED : '' ?>>Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?= $content['distance'] ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?= $content['duration'] ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?= $content['height_difference'] ?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</div>
<?php $content = ob_get_clean();
require('template.php');
