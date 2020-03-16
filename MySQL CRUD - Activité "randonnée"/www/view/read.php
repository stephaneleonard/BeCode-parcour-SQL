<?php ob_start(); ?>
<div class="container">
  <h1>Liste des randonnées</h1>
  <table class="table">
    <caption>Les différentes hike</caption>
    <tr scope="row" class='thead-dark'>
      <th id='name' scope="col">name</th>
      <th id='difficultée' scope="col">difficultée</th>
      <th id='distance' scope="col">distance</th>
      <th id='durée' scope="col">durée</th>
      <th id='Déniv.+' scope="col">Déniv.+</th>
      <th id='Dispo' scope="col">Disponible</th>
      <th id='Delete' scope="col">Supprimer</th>
    </tr>
    <?php
    while ($data = $content->fetch()) {
    ?>
      <tr>
        <td><a href="?Page=maj&id=<?= $data["id"] ?>"><?= $data['name'] ?></a></td>
        <td><?= $data['difficulty'] ?></td>
        <td><?= $data['distance'] ?> km</td>
        <td><?= $data['duration'] ?></td>
        <td><?= $data['height_difference'] ?> m</td>
        <td><?= $data['available'] == 1 ? 'Disponible' : 'Indisponible' ?></td>
        <td>
          <a href="?Page=supprimer&id=<?= $data["id"] ?>" class="btn btn-secondary">X</a>
        </td>
      </tr>
    <?php
    }
    ?>

    <!-- Afficher la liste des randonnées -->
  </table>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php');
