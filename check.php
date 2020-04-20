<?php
if (!empty($_POST["op"]) && !empty($_POST["opa"])) {
    $limit = 2;

    for ($i = 0; $i < $limit; $i++) {
        if ($_POST["anything"][$i] != '' && $_POST["anything2"][$i]!='') {
            ?>
            <p>The value of the <?php echo $i; ?> text field is: <?php echo $_POST["anything"][$i]; ?> and <?php echo $_POST["anything2"][$i]; ?>
                <?php
            } else {
                ?>
            <p><?php echo $i; ?> was not set.</p>
            <?php
        }
    }
}
?>