<?php 
include __DIR__ . '/includes/db.php';
include __DIR__ . '/includes/initial.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $anno_pubblicazione = $_POST['anno_pubblicazione'];
    $genere = $_POST['genere'];
    $cover = $_POST['cover'];
    

    $errors = [];

    // VALIDAZIONE DEI DATI

    if (empty($titolo)) {
        $errors['titolo'][] = 'Not a valid title';
    }

    if (empty($autore)) {
        $errors['autore'][] = 'Not a valid author';
    } 
    
    if (empty($anno_pubblicazione)) {
        $errors['anno_pubblicazione'][] = 'Year not valid';
    }

    if (empty($genere)) {
      $errors['genere'][] = 'Not a valid genre';
  } 

  if (strlen($cover) > 1000) {
    $errors['cover'][] = 'Not a valid image';
} 

/*     echo '<pre>' . print_r($errors, true) . '</pre>'; */
    
  if (empty($errors)) {

    $stmt = $pdo -> prepare("INSERT INTO libri (titolo, autore, anno_pubblicazione, genere, cover) VALUES (:titolo, :autore, :anno_pubblicazione, :genere, :cover)");
$stmt->execute([
    "titolo" =>  $titolo,
    "autore" =>  $autore,
    "anno_pubblicazione" => $anno_pubblicazione,
    "genere" => $genere,
    "cover" => $cover,
]);

header("Location: /FSD%20IFOA/BE-S1-L5/index.php/");

};

}

?>

    <div class="d-flex justify-content-center mx-auto mt-4">
      <form style="width: 500px" action="" method="post" novalidate>   
        <div class="mb-3">
          <label for="titolo" class="form-label">Titolo libro</label>
          <input type="text" class="form-control" name="titolo" id="titolo" />
          <div style="color:red"><?= $erros["titolo"] ?? "" ?> </div>

        </div>
        <div class="mb-3">
          <label for="autore" class="form-label">Autore del libro</label>
          <input type="text" class="form-control" name="autore" id="autore" />
          <div style="color:red"><?= $erros["autore"] ?? "" ?> </div>
        </div>
        <div class="mb-3">
          <label for="anno_pubblicazione" class="form-label">Anno di uscita</label>
          <input type="number" class="form-control" name="anno_pubblicazione" id="anno_pubblicazione" />
          <div style="color:red"><?= $erros["anno_pubblicazione"] ?? "" ?> </div>
        </div>
        <div class="mb-3">
          <label for="genere" class="form-label">Genere del libro</label>
          <input type="text" class="form-control" name="genere" id="genere" />
          <div style="color:red"><?= $erros["genere"] ?? "" ?> </div>
        </div>
        <div class="mb-3">
          <label for="genere" class="form-label">URL immagine di copertina</label>
          <input type="text" class="form-control" name="cover" id="cover" />
          <div style="color:red"><?= $erros["cover"] ?? "" ?> </div>
        </div>
 

        <button type="submit" class="btn btn-primary">Submit</button>



      </form>
    </div>
    <?php

include __DIR__ . '/includes/end.php';