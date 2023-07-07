<?php require 'public/views/layouts/admin.php' ?>


    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="card-header">Пользователи</div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary">Добавить</button>
                    <div class="col-sm-10">


                        <table class="table users-table">
                            <thead class="thead-dark">
                            <th>#</th>
                            <th>Имя</th>
                            <th>Почта</th>
                            <th>Редактировать</th>
                            <th>Удалить</th>
                            </thead>
                            <?php foreach ($users as $user) { ?>
                                <tr>
                                    <td><?php echo $user['id'] ?></td>
                                    <td><?php echo $user['first_name'] . " " . $user['last_name'] ?></td>
                                    <td><?php echo $user['email'] ?></td>
                                    <td class="edit-user">
                                        <a href="">
                                            <i class="fa-solid fa-pen-to-square user-edit-button"
                                               data-userid="<?php echo $user['id']?>"></i>
                                        </a>
                                    </td>
                                    <td class="delete-user">
                                        <a href="">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal-->
    <dialog id="user-edit-modal">
        <i class="fa-solid fa-xmark close-modal"></i>
        <p>asfomasfpmspfmpsfmpsifmpsf</p>
        <button>Close</button>
    </dialog>


<?php require 'public/views/layouts/admin-bottom.php' ?>