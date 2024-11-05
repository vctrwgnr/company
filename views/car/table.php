<?php include 'views/beginHtml.php'; ?>
<table>
    <tr>
        <th>Kennzeichen</th>
        <th>Hersteller</th>
        <th>Typ</th>
        <th>Löschen</th>
        <th>Ändern</th>
    </tr>

    <?php
    foreach ($cars as $c) :
        ?>
        <tr>
            <td><?php echo $c->getNumberPlate(); ?></td>
            <td><?php echo $c->getMaker(); ?></td>
            <td><?php echo $c->getType(); ?></td>
            <td><a href="index.php?action=delete&area=car&id=<?php echo $c->getId(); ?>">
                    <button class="waves-effect waves-light btn-small #e53935 red darken-1" onclick="return confirm('Sind Sie sicher, dass Sie dies löschen möchten?');">Löschen</button>
                </a></td>
            <td><a href="index.php?action=showEdit&area=car&id=<?php echo $c->getId(); ?>">
                    <button class="waves-effect waves-light btn-small #ffd600 yellow accent-4">Ändern</button>
                </a></td>
        </tr>
    <?php
    endforeach;
    ?>
</table>
<?php include 'views/endHtml.php'; ?>