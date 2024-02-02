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
        <h1>Add New Book</h1>
        <div>
            <a href="index.php" class="btn btn-primary">Back</a>
        </div>
    </header>

<form action="process.php" method="post">

<div class="form-element my-4">
    <input type="text" class="form-control" name="title" placeholder="Book Title">
</div>

<div class="form-element my-4">
    <input type="text" class="form-control"  name="author" placeholder="Author">
</div>

<div class="form-element my-4"  class="form-control" >
<select name="type">
    <option value="">Select Book Type</option>
    <option value="Adventure">Adventure</option>
    <option value="Fantasy">Fantasy</option>
    <option value="SciFi">SciFi</option>
    <option value="Horror">Horror</option>
</select>    
</div>

<div class="form-element my-4">
    <input type="text" class="form-control" name="description" placeholder="Book Description">
</div>
<div class="form-element">
    <input type="submit" class="btn btn-success" name="create" value="Add Book">
</div>

</form>

</div>
    
</body>
</html>