<div class="container mt-4">
    <h3><?= isset($book) ? 'Edit Buku' : 'Tambah Buku' ?></h3>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="<?= isset($book) ? $book->title : '' ?>" required>
        </div>
        <div class="form-group">
            <label>Penulis</label>
            <input type="text" name="author" class="form-control" value="<?= isset($book) ? $book->author : '' ?>" required>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="category" class="form-control" value="<?= isset($book) ? $book->category : '' ?>" required>
        </div>
        <div class="form-group">
            <label>Cover</label><br>
            <?php if (isset($book) && $book->cover): ?>
                <img src="<?= base_url('uploads/' . $book->cover) ?>" width="100"><br>
            <?php endif; ?>
            <input type="file" name="cover" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('book') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
