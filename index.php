<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <form>
            <label for="categoryOne">Category 1:</label>
            <input type="text" name="categoryOne" id="categoryOne">
            <br><br>
            <label for="categoryTwo">Category 2: </label>
            <select id="categoryTwoSelect"></select>
            <br><br>
            <button type="button" onclick="addCat()">Add</button>
        </form>
    </div>
<p id="successNote" class="text-success"></p>
<p id="errorNote" class="text-danger"></p>
<script>
        document.addEventListener('DOMContentLoaded', function() {
        viewCat();
    });
    </script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="validate.js"></script>
</body>

    
</html>