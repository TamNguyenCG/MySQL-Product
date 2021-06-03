<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .form-control {
            width: 30%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card-header"><h2>Edit Product's Information</h2></div>
    <div>
        <form method="post">
            <?php foreach ($products as $item): ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Product's Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $item->name?>">
                    <?php if (isset($errors['name'])): ?>
                        <p class="text-danger"><?php echo $errors['name'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" value="<?php echo $item->price?>">
                    <?php if (isset($errors['price'])): ?>
                        <p class="text-danger"><?php echo $errors['price'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" value="<?php echo $item->description?>">
                    <?php if (isset($errors['description'])): ?>
                        <p class="text-danger"><?php echo $errors['description'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Producer</label>
                    <input type="text" class="form-control" name="producer" value="<?php echo $item->producer?>">
                    <?php if (isset($errors['producer'])): ?>
                        <p class="text-danger"><?php echo $errors['producer'] ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a type="button" href="index.php" class="btn btn-primary">Back</a>
        </form>
    </div>
</div>
</body>
</html>

