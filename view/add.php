<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .form-control{
            width: 30%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card-header"><h2>Add New Product</h2></div>
    <div>
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product's Name</label>
                <input type="text" class="form-control" name="name">
                <?php if(isset($errors['name'])): ?>
                    <p class="text-danger"><?php echo $errors['name'] ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Price</label>
                <input type="text" class="form-control" name="price">
                <?php if(isset($errors['price'])): ?>
                    <p class="text-danger"><?php echo $errors['price'] ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="text" class="form-control" name="description">
                <?php if(isset($errors['description'])): ?>
                    <p class="text-danger"><?php echo $errors['description'] ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Producer</label>
                <input type="text" class="form-control" name="producer">
                <?php if(isset($errors['producer'])): ?>
                    <p class="text-danger"><?php echo $errors['producer'] ?></p>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            <a type="button" href="index.php" class="btn btn-primary">Back</a>
        </form>
    </div>
</div>
</body>
</html>

