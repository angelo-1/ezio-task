<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ezio_task";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $categoryOne = isset($_POST['categoryOne']) ? $_POST['categoryOne'] : '';
        $categoryTwo = isset($_POST['categoryTwo']) ? $_POST['categoryTwo'] : '';

        if (!empty($categoryTwo)) {
            $sqlInsert = "INSERT INTO catogory (category1, category2) VALUES ('$categoryOne', '$categoryTwo')";

            if ($conn->query($sqlInsert) === TRUE) {
                echo "Categories added successfully.";
            } else {
                echo "Error: " . $sqlInsert . "<br>" . $conn->error;
            }
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="categoryOne">Category 1:</label>
        <input type="text" name="categoryOne" id="categoryOne">
        <br><br>
        <label for="categoryTwo">Category 2: </label>
        <select name="categoryTwo" id="categoryTwo">
            <?php
            $sqlRetrieveCategoryTwo = "SELECT DISTINCT category2 FROM catogory";
            $resultCategoryTwo = $conn->query($sqlRetrieveCategoryTwo);

            if ($resultCategoryTwo->num_rows > 0) {
                while ($rowCategoryTwo = $resultCategoryTwo->fetch_assoc()) {
                    echo '<option value="' . $rowCategoryTwo["category2"] . '">' . $rowCategoryTwo["category2"] . '</option>';
                }
            }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Add"> 
    </form>
    <a href="task.php">Task</a>

    <?php
    $conn->close();
    ?>
</body>
</html>
