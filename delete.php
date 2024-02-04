<?php
if (isset($_GET['book_id'])){
    $book_id = $_GET['book_id'];
    include("conn.php");
    $sql = "DELETE FROM books WHERE book_id = $book_id";
    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION["delete"] = "Book Deleted Successfully";
        header("Location: index.php");
    }
}
?>