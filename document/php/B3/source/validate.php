<!DOCTYPE html>

<head>
</head>

<body>
    <?php
    // Initialize variables during creation to empty values
    $name = $email = $gender = $comment = $website = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = sanitize_data($_POST["name"]);
        $password = sanitize_data($_POST["password"]);
        $company = sanitize_data($_POST["company"]);
        $comment = sanitize_data($_POST["comment"]);
        $gender = sanitize_data($_POST["gender"]);
        echo "Data is sanitized in appropriate format <br>";
    }
    function sanitize_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        return $data;
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name">
        <br><br>
        Password: <input type="password" name="password">
        <br><br>
        Company: <input type="text" name="company">
        <br><br>
        Comment: <textarea name="comment" rows="5" cols="40"></textarea>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    error_reporting(0);
    echo $name;
    echo "<br>";
    echo $password;
    echo "<br>";
    echo $company;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
    ?>
</body>

</html>