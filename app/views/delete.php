<h1 class="mb-3">
    Bạn có thực sự muốn xóa mặt hàng này không
</h1>
<form class="w-50 mx-auto mb-3" action="/index.php?page=delete" method="POST">
    <a class="btn btn-primary" href="/index.php">Thoát</a>
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <button type="submit" class="btn btn-danger">Xóa mặt hàng</button>
</form>