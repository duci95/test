<?php
include 'php/functions.php';
include 'views/partials/head.php';
include 'views/partials/header.php';
?>
    <p class="h4 p-2 bg-info text-white text-center">Comments waiting to be approved</p>
    <div class="container ">
    <div class="row justify-content-center">
        <?php foreach (getCommentsForApproval() as $comment) : ?> 
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

                        <p class="h6 text-muted badge p-0 "><?= $comment->title?></p>

                    </div>
                    <div class="card-footer text-center p-2">
					
                        <form action="php/approve.php" method="POST" >
                        
                            <input type="hidden" name="id" value="<?= $comment->id ?>">

                            <input type="submit" name="btn" class="btn btn-info p-1" value="Approve">
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>