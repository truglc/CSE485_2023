<?php
require './view/includes/header.php';
?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <a href="index.php?controller=author&action=add" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên tác giả</th>
                        <th scope="col">Hình tác giả</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($authors as $key => $item) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $item->getMaTgia() ?></th>
                            <td><?php echo $item->getTenTgia() ?></td>
                            <td>
                                <img src="./asset/images/songs/<?php echo $item->getHinhTgia() ?>" class="rounded-3" style="width: 150px;" alt="...">
                            </td>
                            <td>
                                <a href="index.php?controller=author&action=edit&ma_tgia=<?php echo $item->getMaTgia() ?>"><i class="fa-solid fa-pen-to-square">
                                    </i></a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="showConfirmationDialog(<?php echo $item->getMaTgia() ?>)"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<script>
    function showConfirmationDialog(id) {
    if (confirm("Xóa tác giả sẽ xóa toàn bộ bài viết của tác giả. Bạn có muốn xóa không?")) {
        window.location.href = "index.php?controller=author&action=delete&ma_tgia=" + id;
    }
}
</script>
<?php
require './view/includes/footer.php';
?>