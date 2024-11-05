<?php
// Vorbelegen der radio-buttons
$genderW = ' checked';
$genderM = '';
$genderD = '';

if (isset($e)){
    if ($e->getGender() === 'weiblich') {
        $genderW = ' checked';
    }
    if ($e->getGender() === 'männlich') {
        $genderM = ' checked';
        $genderW = '';
    }
    if ($e->getGender() === 'divers') {
        $genderD = ' checked';
        $genderW = '';
    }
}

?>
<?php include 'views/beginHtml.php'; ?>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="<?php echo $action; ?>">
    <input type="hidden" name="area" value="<?php echo $area; ?>">

    <input type="hidden" name="id" value="<?php echo (isset($e) && ($e instanceof Employee)) ? $e->getId() : ''; ?>">
    <table>
        <tr>
            <td><label>Vorname:</td>
            <td><input name="firstName" value="<?php echo (isset($e) && ($e instanceof Employee)) ? $e->getFirstName() : ''; ?>"></label></td>
        </tr>
        <tr>
            <td><label>Nachname:</td>
            <td><input name="lastName" value="<?php echo (isset($e) && ($e instanceof Employee)) ? $e->getLastName() : ''; ?>"></label></td>
        </tr>
        <tr>
            <td><label>Geschlecht:</td>
            <td>
                <label><input type="radio" name="gender" value="weiblich" <?php echo $genderW; ?>><span>weiblich</span></label>
                <label><input type="radio" name="gender" value="männlich" <?php echo $genderM; ?>><span>männlich</span></label>
                <label><input type="radio" name="gender" value="divers" <?php echo $genderD; ?>><span>divers</span></label>
            </td>
        </tr>
        <tr>
            <td><label>Monatslohn:</td>
            <td><input name="salary" type="number" step="0.01" value="<?php echo (isset($e) && ($e instanceof Employee)) ? $e->getSalary() : ''; ?>"></label></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="reset" class="waves-effect waves-light btn-small #ec407a pink lighten-1"> <input type="submit" value="OK" class="waves-effect waves-light btn-small #00c853 green accent-4"></td>
        </tr>
    </table>
</form>
<?php include 'views/endHtml.php'; ?>