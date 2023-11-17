<?php
include './db/conn.php';
$id = $_POST["id"];
$teamQuery = "SELECT * FROM equipe WHERE idEqp = " . $id;
$teamResult = mysqli_query($connection, $teamQuery);

while ($teamRow = mysqli_fetch_assoc($teamResult)) { ?>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><?php echo $teamRow['nomEqp']; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" src="<?php echo $teamRow['flag'] ?>" alt="flag">
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="<?php echo $teamRow['cle_joueur'] ?>" alt="flag">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <p><strong>Number of Players:</strong> <?php echo $teamRow['nbrJoueur'] ?></p>
                    <p><strong>Population:</strong> <?php echo $teamRow['population'] ?></p>
                    <p><strong>Capital:</strong> <?php echo $teamRow['capital'] ?></p>
                    <!-- Include other attributes as needed -->
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
<?php } ?>
