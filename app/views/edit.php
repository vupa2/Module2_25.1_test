<h1 class="mb-3">
    Thêm mặt hàng
</h1>

<form class="w-50 mx-auto text-start mb-3" action="/index.php?page=edit" method="POST">
    <?php if (isset($errors['unknown'])) : ?>
        <div class="alert alert-warning" role="alert">
            <?= $errors['unknown'] ?>
        </div>
    <?php endif; ?>
    <input type="hidden" name="id" value="<?= $product['id']; ?>"/>
    <div class="mb-3 form-group">
        <label for="name">Tên Hàng</label>
        <input type="text" value="<?= $product['name'] ?>" id="name" name="name" class="form-control" required />
    </div>
    <div class="mb-3 or=" teaser">
        <label for="category">Loại Hàng</label>
        <select name="category" id="category" class="form-select" aria-label="Default select example">
            <option value="Điện thoại" selected>Điện thoại</option>
            <option value="Laptop">Laptop</option>
            <option value="Phụ kiện">Phụ kiện</option>
        </select>
    </div>
    <div class="mb-3 form-group">
        <label for="price">Giá</label>
        <input type="number" value="<?= $product['price'] ?>" min="0" id="price" name="price" class="form-control" required />
    </div>
    <div class="form-group">
        <label for="quantity">Số lượng</label>
        <input type="number" value="<?= $product['quantity'] ?>" min="0" id="quantity" name="quantity" class="form-control" required />
    </div>
    <div class="mb-3 form-group">
        <label for="description">Mô tả</label>
        <textarea name="description" id="description" class="form-control" required><?= $product['description'] ?></textarea>
    </div>
    <div class="mb-3 form-group">
        <input type="submit" value="Sửa mặt hàng" class="btn btn-primary" required />
        <a href="/index.php" class="btn btn-danger">Thoát</a>
    </div>
</form>