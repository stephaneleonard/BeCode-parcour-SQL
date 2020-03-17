<?php ob_start(); ?>
<div class="container mx-auto my-20">
    <section>
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
                <?php while ($data = $content->fetch()) { ?>
                    <tr>
                        <td class="border px-4 py-2"><?= $data['lastName'] ?></td>
                        <td class="border px-4 py-2"><?= $data['firstName'] ?></td>
                        <td class="border px-4 py-2"><?= $data['birthDate'] ?></td>
                        <td class="border px-4 py-2"><?= $data['card'] ? 'Yes' : 'No' ?></td>
                        <td class="border px-4 py-2"><?= $data['card'] ? $data['cardNumber'] : '' ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </section>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php');
