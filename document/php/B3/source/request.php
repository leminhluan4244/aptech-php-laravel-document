<?php
error_reporting(0);
if ($_REQUEST["name"] || $_REQUEST["weight"]) {
    echo "Welcome " . $_REQUEST['name'] . "<br />";
    echo "You are " . $_REQUEST['weight'] . " kgs .";
    exit();
}
?>
<html>

<body>
    <form action="<?php $_PHP_SELF ?>" method="POST">
        Name: <input type="text" name="name" />
        Weight: <input type="text" name="weight" />
        <input type="submit" />
    </form>
</body>

</html>