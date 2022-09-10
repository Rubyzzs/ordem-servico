<?php if(!empty($_GET['msg'])){ ?>
    <div class="alert alert-info alert-dismissible fade show mt-4" role="alert">
        <?= $_GET['msg'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
