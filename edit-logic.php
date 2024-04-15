<?php
include __DIR__ . '/includes/db.php';

$id = $_POST['id'];
$titolo = $_POST['titolo'];
$autore = $_POST['autore'];
$anno_pubblicazione = $_POST['anno_pubblicazione'];
$genere = $_POST['genere'];
$cover = $_POST['cover'];


$stmt = $pdo->prepare("UPDATE libri SET titolo = :titolo, autore = :autore, anno_pubblicazione = :anno_pubblicazione, cover = :cover, genere = :genere WHERE id = :id");
$stmt->execute([
    'id' => $id,
    'titolo' => $titolo,
    'autore' => $autore,
    'anno_pubblicazione' => $anno_pubblicazione,
    'cover' => $cover,
    'genere' => $genere,
]);

header("Location: /FSD%20IFOA/BE-S1-L5/index.php/");