<?php
if($_SERVER["REQUEST_METHOD"] == 'POST')
{
    include './lib/guidv4.php';
    $name=$_POST['name'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $dir_save = 'images/';
    $image_name=guidv4().'.jpeg';
    $uploadfile = $dir_save . $image_name;
    echo $uploadfile;
    if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile))
    {
        include 'connection_database.php';
        $sql = 'INSERT INTO tbl_products (name, image, price, date_create, description) VALUES(:name, :image, :price, NOW(), :description);';
        echo $sql;
        //exit;
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':image',$image_name);
        $stmt->bindParam(':price',$price);
        $stmt->bindParam(':description',$description);
        $stmt->execute();
        header("Location: index.php");
        exit;
    }
    else {
        echo "Error upload file";
        exit();
    }



}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Головна сторінка</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include "_header.php"; ?>
<div class="container">
    <h1 class="text-center">Додати продукт</h1>
    <form enctype="multipart/form-data" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Назва</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Ціна</label>
            <input type="text" class="form-control" id="price" name="price">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Фото</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Опис</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>

        <button type="submit" class="btn btn-primary">Додати</button>
    </form>

</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
