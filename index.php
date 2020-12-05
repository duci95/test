<?php
    include 'php/functions.php';
    include 'views/partials/head.php';
    include 'views/partials/header.php';
?>
<div class="container">
    <div class="row p-5 justify-content-center"> 
        <?php
        foreach(getProducts() as $product):?>
        <div class="col-3 m-2 border">
            <p class="text-center h5"><?=$product->title?></p>

            <img src="<?=$product->image_name?>" alt="<?=$product->title?>" width="150" height="150">

            <p><?=$product->description?></p>

        </div>
        <?php endforeach;?>
    </div>
</div>
<h4 class="text-center ">Comments</h4>

<div class="container m-3 border m-auto">
    <div class="row justify-content-center">

        <?php foreach (getComments() as $comment) : ?>
        <div class="col-auto m-2">
            <div class="card">
                <div class="card-header p-1">
                    <span class="text-muted badge  p-0"><?= $comment->name ?></span>
                    <span class="text-muted  badge p-0"><?= $comment->email ?></span>
                </div>
                <div class="card-body p-1 ">

                    <p class="h6 badge"><?= $comment->text ?></p>
                    
                </div>
                <div class="card-footer p-0 text-center">
                    <p class="h6 text-muted badge p-0"><?= $comment->title?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<h4 class="text-center m-3">Add Comment</h4>

<div class="container m-auto border p-3">
    <form action="php/comments.php" method="POST">

        <div class="row justify-content-center m-1">
            <div class="col-6 ">
                <label for="products" class="col-form-label text-muted">Product</label>
                <select name="product" id="products" class="form-control">
                    <option value="0">Choose...</option>
                    <?php foreach(getProducts() as $product) : ?>
                    <option value="<?=$product->id?>"><?= $product->title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row justify-content-center m-1">
            <div class="col-6 ">
                <label for="name" class="col-form-label text-muted">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
        </div>

        <div class="row justify-content-center m-1">
            <div class="col-6">
                <label for="email" class="col-form-label text-muted">Email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
        </div>

        <div class="row justify-content-center m-1">
            <div class="col-6">
                <label for="comment" class="col-form-label text-muted">Comment</label>
                <textarea name="comment" id="comment" class="form-control"></textarea>
            </div>
        </div>

        <div class="row justify-content-center m-2">
            <div class="col-6">
                <input type="submit" class="w-100 p-1 btn btn-success" name="btn" value="Send" id="btn">
            </div>
        </div>

    </form>
</div>
</body>
</html>