<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD/CREATE NEW BOOK</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="CSSFOLDER/createbook.css">

</head>
<body>

<div class="container">
    <header class="d-flex justify-content-between my-4">
        <h1>Edit Book</h1>
        <div>
            <a href="index.php" class="btn btn-primary">Back</a>
        </div>
    </header>

    <?php
    if (isset($_GET["book_id"])){
        $book_id = $_GET["book_id"];
        include("conn.php");
        $sql = "SELECT * FROM books WHERE book_id=$book_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        

        ?>

<form action="process.php" method="post">

<div class="form-element my-4">
    <input type="text" class="form-control" name="title" value="<?php echo $row["title"]; ?>" placeholder="Book Title">
</div>

<div class="form-element my-4">
    <input type="text" class="form-control"  name="author" value="<?php echo $row["author"]; ?>" placeholder="Author">
</div>

<div class="form-element my-4"  class="form-control" >
<select name="type">
    <option value="">Select Book Type</option>
    <option value="Adventure" <?php if($row['type']=="Adventure"){echo "selected";}?>>Adventure</option>
    <option value="Fantasy"<?php if($row['type']=="Fantasy"){echo "selected";}?>>Fantasy</option>
    <option value="SciFi"<?php if($row['type']=="SciFi"){echo "selected";}?>>SciFi</option>
    <option value="Horror"<?php if($row['type']=="Horror"){echo "selected";}?>>Horror</option>
</select>    
</div>

<div class="form-element my-4">
    <input type="text" class="form-control" name="description"  value="<?php echo $row["description"]; ?>" placeholder="Book Description">
</div>

<input type="hidden" name="book_id" value='<?php echo $row['book_id']; ?>'>
<div class="form-element">
    <input type="submit" class="btn btn-success" name="edit" value="Edit Book">
</div>

</form>

    <?php
    }

    ?>



</div>
    
</body>
</html>