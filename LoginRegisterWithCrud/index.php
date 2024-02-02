<?php
include('conn.php');
session_start();
if (!isset($_SESSION["user"])){
    header("Location: login.php");
}

    $user_id = $_SESSION["user"];

    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("i", $user_id);

        $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

        $stmt->close();
        $conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="CSSFOLDER/index.css">

</head>
<body>

<div class="header">
  <a href="#default" class="logo">MEIN CRUD</a>
  <div class="header-right">
    <a class="active" href="#home">Home</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
    <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
  </div>
</div>

<div class="container">
    <h1>Hello <?php echo $user["first_name"] . " " . $user["last_name"]; ?></h1>
</div>

<div class="containers">
<header class="d-flex justify-content-between my-4">
        <h1>Book List</h1>
        <div>
            <a href="create.php" class="btn btn-primary">Add new Book</a>
        </div>
    </header>
    <?php
    if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["create"];
            unset($_SESSION["create"]);
            ?>
        </div>
        <?php
    }
    ?>
        <?php
    if (isset($_SESSION["edit"])) {
        ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["edit"];
            unset($_SESSION["edit"]);
            ?>
        </div>
        <?php
    }
    ?>
        <?php
    if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["delete"];
            unset($_SESSION["delete"]);
            ?>
        </div>
        <?php
    }
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        <?php
        include("conn.php");
        $sql = "SELECT * FROM books";
        $result = mysqli_Query($conn,$sql);
    
        while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["book_id"]?></td>
                    <td><?php echo $row["title"]?></td>
                    <td><?php echo $row["author"]?></td>
                    <td><?php echo $row["type"]?></td>
                    
                    <td>
                        <a href="view.php?book_id=<?php echo $row["book_id"]; ?>" class="btn btn-info">Read More</a>
                        <a href="edit.php?book_id=<?php echo $row["book_id"]; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?book_id=<?php echo $row["book_id"]; ?>" class="btn btn-danger">Delete</a>
                    </td>

                </tr>
            <?php
        }
        ?>
        
        </tbody>
    </table>

</div>

    
</body>
</html>