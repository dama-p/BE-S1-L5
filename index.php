<?php 
include __DIR__ . '/includes/db.php';

$search = $_GET['search'] ?? '';

$page = $_GET["page"] ?? 1; // numero di pagina
$per_page = $_GET["per_page"] ?? 10; // elementi per pagina
$per_page = $per_page > 10 ? 10 : $per_page; // limito gli elementi per pagina
$offset = ($page-1) * $per_page;

/* print_r($_GET); */

/* $stmt = $pdo->prepare("SELECT * FROM Users WHERE Name LIKE ?"); */
/* $stmt = $pdo->prepare("SELECT * FROM Users WHERE Name LIKE ? OR Surname LIKE ?"); */
$stmt = $pdo->prepare("SELECT * FROM libri WHERE CONCAT(titolo, autore) LIKE :search LIMIT :per_page OFFSET :offset ") ;
$stmt->execute([
   "search" => "%$search%",
   "offset" => $offset,
   "per_page" => $per_page,
]);

$books = $stmt->fetchAll(); 
$stmt = $pdo->prepare("SELECT COUNT(*) AS num_of_books FROM libri WHERE CONCAT(titolo, autore) LIKE :search");
$stmt->execute([
    'search' => "%$search%",
]);
$num_of_books = $stmt->fetch()['num_of_books'];
$tot_pages = ceil($num_of_books / $per_page);


include __DIR__ . '/includes/initial.php';


?>

    <h2 class="text-center text-white">Welcome!</h2>
    <h4 class="text-center title mb-3">Look for your favourite book in our archives!</h4>

    <form class="row gap-3">
        <div class="col">
            <input type="text" name="search" class="form-control" placeholder="Type your title here">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Search</button>
        </div>
    </form>



<!-- INIZIO FOREACH PER LE CARD  -->

    <div class="row justify-content-center"><?php
        foreach ($books as $row) { ?>

<div class="card col-5 col-md-3 col-lg-2 m-3 d-flex flex-column pt-2">

<img  src="<?= $row['cover'] ?>" class="card-img-top img-fluid" alt="cover" style="height:270px">

<div class="card-body d-flex flex-column">

<h5 class="card-title"><?=  "$row[titolo]" ?></h5>
    <p class="card-text"><?=  "$row[autore] " ?></p>
    <p class="card-text"><?=  "$row[genere] - $row[anno_pubblicazione] " ?></p>

<div class="row gap-2 mt-auto"> <div class="col d-flex justify-content-around">

<a href="/FSD%20IFOA/BE-S1-L5/dettagli.php?id=<?= $row['id'] ?>" class="btn btn-primary">Details</a>
    <a href="/FSD%20IFOA/BE-S1-L5/edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>

        </div>

        <div class="col-12 d-flex justify-content-center">

        <a href="/FSD%20IFOA/BE-S1-L5/elimina.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
    
        </div>

    </div>

  </div>

</div>
            
            <?php
        } ?>
    </div>


    <nav>
    <ul class="pagination justify-content-center mt-4">
            <li class="page-item<?= $page == 1 ? ' disabled' : '' ?>">
                <a
                    class="page-link"
                    href="/FSD%20IFOA/BE-S1-L5/index.php/?page=<?= $page - 1 ?><?= $search ? "&search=$search" : '' ?>"
                >Previous</a>
            </li><?php

                for ($i=1; $i <= $tot_pages; $i++) { ?>
                    <li class="page-item<?= $page == $i ? ' active': '' ?>">
                        <a
                            class="page-link"
                            href="/FSD%20IFOA/BE-S1-L5/index.php/?page=<?= $i ?><?= $search ? "&search=$search" : '' ?>"
                        ><?= $i ?></a>
                    </li><?php
                } ?>
            
            <li class="page-item<?= $page == $tot_pages ? ' disabled' : '' ?>">
                <a
                    class="page-link"
                    href="/FSD%20IFOA/BE-S1-L5/index.php/?page=<?= $page + 1 ?><?= $search ? "&search=$search" : '' ?>"
                >Next</a>
            </li>
        </ul>
    </nav>
</div><?php

include __DIR__ . '/includes/end.php';