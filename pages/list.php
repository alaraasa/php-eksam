<?php
if (!isset($mysqli)) {
    header("Location: index.php");
}
/**
 * @author Alar Aasa <alar@alaraasa.ee>
 * @description List of monitors
 */
?>

<h1>List of monitors</h1>

<?php
$monitorList = $Monitor->get();

$html = "<table>";
$html .= "<th>id</th> <th>Size</th> <th>Type</th> <th>Maker</th>";
foreach ($monitorList as $list) {
    $html .= "<tr>";
    $html .= "<td>" . $list->id . "</td>";
    $html .= "<td>" . $list->size . "</td>";
    $html .= "<td>" . $list->make . "</td>";
    $html .= "<td>" . $list->maker . "</td>";
    $html .= "</tr>";
    $html .= "</table>";
}
echo $html;
$types = $Monitor->getTypes();

$form = "
    <form method='post'>
        <input type='number' placeholder='Size'>
        <select name='type'>";

    foreach($types as $t){
            $form .= "<option value='" . $t->type . "'>" . $t->type . "<option>";
    }
     $form .= "</select>
            <input type='text' placeholder='Maker' name='maker'>
            <button type='submit'>Add new monitor</button>
    </form>
    ";

if(isset($_SESSION["username"])){
    echo $form;
}
?>