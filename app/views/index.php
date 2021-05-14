<h1 class="mb-3">
    Danh sách mặt hàng
</h1>
<div class="d-flex justify-content-between mb-3">
    <form action="/index.php?page=search" method="GET">
        <label for="search">Nhập tên hàng</label>
        <input type="text" name="search" id="search">
        <button type="submit" class="btn btn-success">Tìm kiếm</button>
    </form>
    <a class="btn btn-success" href="/index.php?page=add">Thêm mặt hàng</a>
</div>
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên hàng</th>
                <th scope="col">Loại hàng</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['category'] ?></td>
                    <td class="d-flex justify-content-around">
                        <a href="/index.php?page=edit&id=<?= $product['id'] ?>" class="btn btn-primary btn-sm">Chỉnh Sửa</a>
                        <a href="/index.php?page=delete&id=<?= $product['id'] ?>" class="btn btn-warning btn-sm">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>