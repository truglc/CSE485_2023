<?php
            require './view/includes/header.php';  
    ?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="index.php?controller=category&action=create" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên thể loại</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            foreach($categorys as $key => $item){
                        ?>
                            <tr>
                                <th scope="row"><?php echo $item->getMa_tloai() ?></th>
                                <td><?php echo $item->getTen_tloai() ?></td>
                                <td>
                                    <a href="index.php?id=<?php echo $item->getMa_tloai() ?>&controller=category&action=edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" onclick="showConfirmationDialog(<?php echo $item->getMa_tloai() ?>)"><i class="fa-solid fa-trash"></i></a>
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
        function showConfirmationDialog(id){
            if(confirm("Các bài viết thuộc thể loại sẽ bị xóa. Bạn có muốn xóa không?")){
                window.location.href = "index.php?controller=category&action=delete&id=" + id;
            }
        }
    </script>
    <?php
        require './view/includes/footer.php';  
    ?>