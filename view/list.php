<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            <h1>Product's List</h1>
            <form class="d-flex" method="post" action="index.php?page=search">
                <input class="form-control me-2" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <div class="col-12">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price(VND)</th>
                    <th scope="col">Description</th>
                    <th scope="col">Producer</th>
                    <th scope="col"><a class="btn btn-success" href="index.php?page=add">Add New Product</a></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $key => $item): ?>
                    <tr>
                        <td scope="row"><?php echo $key + 1 ?></td>
                        <td scope="row"><?php echo $item->name ?></td>
                        <td scope="row"><?php echo $item->price ?></td>
                        <td scope="row"><?php echo $item->description ?></td>
                        <td scope="row"><?php echo $item->producer ?></td>
                        <td>
                            <a type="button" href="index.php?page=edit&id=<?php echo $item->id ?>"
                               class="btn btn-success">Edit</a>
                            <a type="button" href="index.php?page=delete&id=<?php echo $item->id ?>"
                               class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>