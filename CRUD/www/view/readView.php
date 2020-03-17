<?php ob_start();
define('LASTNAME', 'lastName');
define('FIRSTNAME', 'firstName');
define('BIRTHDATE', 'birthDate');
define('CARDNUM', 'cardNumber');

?>
<div class="container mx-auto">
    <section class="my-20">
        <h2 class="text-xl">Exercice 1</h2>
        <table class="table-fixed">
            <caption>Afficher tous les clients.</caption>
            <thead>
                <tr>
                    <th id='lastname' class="w-1/2 px-4 py-2">Lastname</th>
                    <th id='firstname' class="w-1/4 px-4 py-2">Firstname</th>
                    <th id='birthdate' class="w-1/4 px-4 py-2">Birth Date</th>
                    <th id='card' class="w-1/4 px-4 py-2">Has Card?</th>
                    <th id='cardnum' class="w-1/4 px-4 py-2">Card number</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = $clients->fetch()) { ?>
                    <tr>
                        <td class="border px-4 py-2"><?= $data[LASTNAME] ?></td>
                        <td class="border px-4 py-2"><?= $data[FIRSTNAME] ?></td>
                        <td class="border px-4 py-2"><?= $data[BIRTHDATE] ?></td>
                        <td class="border px-4 py-2"><?= $data['card'] ? 'Yes' : 'No' ?></td>
                        <td class="border px-4 py-2"><?= $data['card'] ? $data[CARDNUM] : '' ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </section>
    <section class="my-20">
        <h2 class="text-xl">Exercice 2</h2>
        <table class="table-fixed">
            <caption>Afficher tous les types de show.</caption>
            <thead>
                <tr>
                    <th id='lastname' class="w-1/2 px-4 py-2">Types</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = $showTypes->fetch()) { ?>
                    <tr>
                        <td class="border px-4 py-2"><?= $data['type'] ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </section>
    <section class="my-20">
        <h2 class="text-xl">Exercice 3</h2>
        <table class="table-fixed">
            <caption>Afficher les 20 premiers.</caption>
            <thead>
                <tr>
                    <th id='lastname' class="w-1/2 px-4 py-2">Lastname</th>
                    <th id='firstname' class="w-1/4 px-4 py-2">Firstname</th>
                    <th id='birthdate' class="w-1/4 px-4 py-2">Birth Date</th>
                    <th id='card' class="w-1/4 px-4 py-2">Has Card?</th>
                    <th id='cardnum' class="w-1/4 px-4 py-2">Card number</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = $firstClients->fetch()) { ?>
                    <tr>
                        <td class="border px-4 py-2"><?= $data[LASTNAME] ?></td>
                        <td class="border px-4 py-2"><?= $data[FIRSTNAME] ?></td>
                        <td class="border px-4 py-2"><?= $data[BIRTHDATE] ?></td>
                        <td class="border px-4 py-2"><?= $data['card'] ? 'Yes' : 'No' ?></td>
                        <td class="border px-4 py-2"><?= $data['card'] ? $data[CARDNUM] : '' ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </section>
    <section class="my-20">
        <h2 class="text-xl">Exercice 4</h2>
        <table class="table-fixed">
            <caption>Afficher les clients avec une carte.</caption>
            <thead>
                <tr>
                    <th id='lastname' class="w-1/2 px-4 py-2">Lastname</th>
                    <th id='firstname' class="w-1/4 px-4 py-2">Firstname</th>
                    <th id='birthdate' class="w-1/4 px-4 py-2">Birth Date</th>
                    <th id='card' class="w-1/4 px-4 py-2">Has Card?</th>
                    <th id='cardnum' class="w-1/4 px-4 py-2">Card number</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = $clientsWithCards->fetch()) { ?>
                    <tr>
                        <td class="border px-4 py-2"><?= $data[LASTNAME] ?></td>
                        <td class="border px-4 py-2"><?= $data[FIRSTNAME] ?></td>
                        <td class="border px-4 py-2"><?= $data[BIRTHDATE] ?></td>
                        <td class="border px-4 py-2"><?= $data['card'] ? 'Yes' : 'No' ?></td>
                        <td class="border px-4 py-2"><?= $data['card'] ? $data[CARDNUM] : '' ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </section>
    <section class="my-20">
        <h2 class="text-xl">Exercice 5</h2>
        <table class="table-fixed">
            <caption>Afficher les clients avec un nom en M.</caption>
            <thead>
                <tr>
                    <th id='lastname' class="w-1/2 px-4 py-2">Lastname</th>
                    <th id='firstname' class="w-1/4 px-4 py-2">Firstname</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = $clientsStartWithM->fetch()) { ?>
                    <tr>
                        <td class="border px-4 py-2"><?= $data[LASTNAME] ?></td>
                        <td class="border px-4 py-2"><?= $data[FIRSTNAME] ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </section>
    <section class="my-20">
        <h2 class="text-xl">Exercice 6</h2>

        <?php while ($data = $sortedShow->fetch()) { ?>
            <p><?= $data['title'] ?> par <?= $data['performer'] ?> , le <?= $data['date'] ?> à <?= $data['startTime'] ?></p>

        <?php } ?>
    </section>
    <section class="my-20">
        <h2 class="text-xl">Exercice 7</h2>
        <div class="flex flex-wrap">
            <?php while ($data = $clientsA->fetch()) { ?>
                <div class="w-1/3 mb-4 border-solid border-2 border-gray-600">
                    <p>Nom : <?= $data[LASTNAME] ?></p>
                    <p>Prénom : <?= $data[FIRSTNAME] ?></p>
                    <p>Date de naissance : <?= $data[BIRTHDATE] ?></p>
                    <p>Carte de fidélité : <?= $data['card'] ? 'Yes' : 'No' ?></p>
                    <p>Numéro de carte : <?= $data['card'] ? $data[CARDNUM] : '' ?></p>
                </div>
            <?php } ?>
        </div>
    </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php');
