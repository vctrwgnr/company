<?php include 'views/beginHtml.php'; ?>
<table class="highlight">
    <tr>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Geschlecht</th>
        <th>Monatslohn</th>
        <th>Löschen</th>
        <th>Ändern</th>
    </tr>

    <?php
    foreach ($employees as $m ) :
        ?>
        <tr>
            <td><?php echo $m->getFirstName(); ?></td>
            <td><?php echo $m->getLastName(); ?></td>
            <td><?php echo $m->getGender(); ?></td>
            <td><?php echo number_format($m->getSalary(),2, ',',''); ?></td>
            <td><a href="index.php?action=delete&area=employee&id=<?php echo $m->getId(); ?>"><button class="waves-effect waves-light btn-small #e53935 red darken-1" onclick="return confirm('Sind Sie sicher, dass Sie dies löschen möchten?');">Löschen</button></a></td>
            <td><a href="index.php?action=showEdit&area=employee&id=<?php echo $m->getId(); ?>"><button class="waves-effect waves-light btn-small #ffd600 yellow accent-4">Ändern</button></a></td>
        </tr>
        <?php
    endforeach;
    ?>
</table>
<?php include 'views/endHtml.php'; ?>