<div class="row">
<?php if(empty($viewmodel)){ ?>
<div class="mt-5"><h3>No data</h3></div>
<?php } else { foreach($viewmodel as $data) : ?>
<div class="card mt-5 mr-5 lib_card" style="width: 16rem;">
    <img class="card-img-top" src="<?= ROOT_URL?>assets/images/img_avatar.png" alt="Card image cap">
        <div class="card-body">
        <div class="dropdown">
            <div class="card-subtitle float-right lib_menu" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></div>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="<?= ROOT_URL ?>librarian/update/<?= $data['idLibrarian'] ?>"><i class="fa fa-edit fa-fw"></i> Edit</a>
                <button class="dropdown-item" id="status" value="<?= $data['idLibrarian'] ?>"><i class="fa fa-times fa-fw"></i> InActive</button>
            </div>
        </div>
        <h5 class="card-title"><?= $data['Lib_name'] ?></h5>
        <p><i class="fa fa-envelope fa-fw"></i> <?= $data['Lib_email'] ?></p>
        <p><i class="fa fa-phone fa-fw"></i> <?= $data['Lib_tel'] ?></p>
    </div>
</div>
<?php endforeach; } ?>
</div>
