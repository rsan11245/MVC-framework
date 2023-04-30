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
                            <tr>
                                <td>1</td>
                                <td>Имя</td>
                                <td>Почта</td>
                                <td class="edit-user">
                                    <a href="">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td class="delete-user">
                                    <a href="">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>











<?php require 'public/views/layouts/admin-bottom.php' ?>