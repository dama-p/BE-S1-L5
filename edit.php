<?php 
include __DIR__ . '/includes/db.php';

// SELECT DI TUTTE LE RIGHE A PARTIRE DALL'ID DELL'URL (che abbiamo passato con link dalla pagina searchbar)
$stmt = $pdo->prepare('SELECT * FROM libri WHERE id = ?');
$stmt->execute([$_GET["id"]]);

$row = $stmt->fetch();


include __DIR__ . '/includes/initial.php'; ?>

<h1 class="text-center">Edit</h1>

<form action="/FSD%20IFOA/BE-S1-L5/edit-logic.php" method="POST" novalidate>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <div class="mb-3">
        <label for="titolo" class="form-label">Titolo</label>
        <input type="text" class="form-control" id="titolo" name="titolo" value="<?= $row['titolo'] ?>">
    </div>
    <div class="mb-3">
        <label for="autore" class="form-label">autore</label>
        <input type="text" class="form-control" id="autore" name="autore" value="<?= $row['autore'] ?>">
    </div>
    <div class="mb-3">
        <label for="anno_pubblicazione" class="form-label">anno_pubblicazione</label>
        <input type="number" class="form-control" id="anno_pubblicazione" name="anno_pubblicazione" value="<?= $row['anno_pubblicazione'] ?>">
    </div>
    <div class="mb-3">
        <label for="cover" class="form-label">cover</label>
        <input type="text" class="form-control" id="cover" name="cover" value="<?= $row['cover'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Modifica</button>
</form>


<?php include __DIR__ . '/includes/end.php';