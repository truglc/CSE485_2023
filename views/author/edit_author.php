<?php
require './view/includes/header.php'; 

?>
<main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
            <form action="index.php?controller=author&action=edit" method="post" enctype="multipart/form-data">
            <input type="hidden" name="path" value="../images/songs/">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAutId">Mã tác giả</span>
                    <input type="text" class="form-control" name="txtAutId" readonly value="<?php echo $author->getMaTgia(); ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAutName">Tên tác giả</span>
                    <input type="text" class="form-control" name="txtAutName" value="<?php echo $author->getTenTgia() ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblAutImg">Hình tác giả</span>
                    <input type="file" class="form-control" name="img">
                </div>
                <div class="form-group  float-end">
                    <input type="submit" value="Lưu lại" class="btn btn-success">
                    <a href="author.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
require './view/includes/footer.php';
?>

<script>
        const form = document.querySelector('form');
        form.addEventListener('submit',(event)=>{
            event.preventDefault();
            var tenTheLoai = document.querySelector('input[name="txtAutName"]');
            if (tenTheLoai.value.trim() === '') {
                    alert('Bạn chưa nhập Tên tác giả');
                    tenTheLoai.style.border = '1px solid red';
                }
                else{
                    form.submit();
                }
        });
</script>