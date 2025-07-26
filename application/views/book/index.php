<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <!-- Header dan Tombol -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <img src="<?= base_url('assets/img/logo.jpg') ?>" alt="Logo BookMaster" height="80" class="me-3">
            <h2 class="fw-bold text-primary m-0">Book<span class="text-dark">Master</span></h2>
        </div>
        <a href="<?= site_url('book/create') ?>" class="btn btn-primary shadow-sm">+ Add New Book</a>
    </div>

    <!-- Search & Filter -->
    <div class="bg-white p-3 rounded shadow-sm mb-4 d-flex justify-content-between align-items-center">
        <input type="text" class="form-control me-3" placeholder="Find a book..." style="max-width: 500px;">
        <select class="form-select" style="max-width: 200px;">
            <option>All Books</option>
            <option>Read</option>
            <option>Unread</option>
        </select>
    </div>

    <!-- Book Cards -->
    <div class="row">
        <?php foreach ($books as $book): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 d-flex flex-column">
                    <?php if ($book->cover): ?>
                        <img src="<?= base_url('uploads/' . $book->cover) ?>" class="card-img-top" alt="<?= $book->title ?>" style="height: 250px; object-fit: cover;">
                    <?php endif; ?>
                    <div class="card-body flex-grow-1">
                        <span class="badge bg-warning text-dark float-end">Unread</span>
                        <h5 class="card-title fw-bold"><?= $book->title ?></h5>
                        <p class="card-text text-muted mb-1">by <?= $book->author ?></p>
                        <small class="text-muted">Kategori: <?= $book->category ?></small>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="d-flex justify-content-between">
                            <a href="<?= site_url('book/edit/' . $book->id) ?>" class="btn btn-sm btn-outline-primary w-100 me-1">Edit</a>
                            <a href="<?= site_url('book/delete/' . $book->id) ?>" class="btn btn-sm btn-outline-danger w-100 me-1" onclick="return confirm('Yakin hapus?')">Delete</a>
                            <a href="<?= site_url('book/buy/' . $book->id) ?>" class="btn btn-sm btn-outline-success w-100">Buy</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
