<?php
$rentalDataExists = (isset($r) && $r->getId() !== null) ? true : false;
$r = (!$rentalDataExists) ? new Rental() : $r;

?>
<?php include 'views/beginHtml.php'; ?>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="<?php echo $action; ?>">
    <input type="hidden" name="area" value="<?php echo $area; ?>">
    <input type="hidden" name="id" value="<?php echo ($r instanceof Rental && $rentalDataExists === true) ? $r->getId() : ''; ?>">
    <table>
        <tr><td><label>Mitarbeiter </td><td><?php echo $r->getEmployeePulldown(); ?></label></td></tr>
        <tr><td><label>Kennzeichen: </td><td><?php echo $r->getCarPulldown(); ?></label></td></tr>
        <tr><td><label>von: </td><td><input name="startDate" type="datetime-local"  value="<?php echo ($r instanceof Rental && $rentalDataExists === true) ? $r->getStartDate() : ''; ?>"></label></td></tr>
        <tr><td><label>bis: </td><td><input name="endDate" type="datetime-local"  value="<?php echo ($r instanceof Rental && $rentalDataExists === true) ? $r->getEndDate() : ''; ?>"></label></td></tr>
        <tr><td></td><td><input type="reset" class="waves-effect waves-light btn-small #ec407a pink lighten-1"> <input type="submit" value="OK" class="waves-effect waves-light btn-small #00c853 green accent-4"></td></tr>
    </table>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, {
            // specify options here
        });
    });
</script>
<?php include 'views/endHtml.php'; ?>
