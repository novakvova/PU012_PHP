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
    <link rel="stylesheet" href="css/drag_and_drop.css">
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
            <input type="file" class="form-control d-none" id="image" name="image">
            <div class="drop_container">
                <div class="drop-targets" id="container_drop">
<!--                    <div class="box">-->
<!--                        <img src="images/keybord.jpg" id="item" class="item" draggable="true"/>-->
<!--                    </div>-->
                    <div class="box"></div>
                    <div class="box"></div>
                    <div class="box"></div>

                </div>
                <label for="image" class="form-label">Фото</label>
            </div>


        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Опис</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>

        <button type="submit" class="btn btn-primary">Додати</button>
    </form>

</div>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/drag_and_drop.js"></script>

<script>
    let image = document.getElementById("image");
    const container_drop = document.getElementById("container_drop");
    image.onchange = function (e) {
        console.log("Select file");
        let file = e.target.files[0];
        if (file) {
            const url = URL.createObjectURL(file);
            const box = document.createElement('div');
            box.className="box";
            const img = document.createElement('img');
            img.src=url;
            img.className="item";
            img.id="item";
            img.draggable=true;
            img.addEventListener('dragstart', dragStart);
            box.appendChild(img);
            container_drop.prepend(box);
        }
        image.value = "";
    }
</script>
</body>
</html>
