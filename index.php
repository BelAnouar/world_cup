<?php

require_once("./db/conn.php");
require_once('./db/featchdata.php');

$result = getData();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
  <div style="background-color: #0d4d3a;">
    <header class="container border-bottom lh-1 py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <a class="link-secondary" href="#">Subscribe</a>
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">
            <img class="w-50" src="./images/logo.png" alt="log">
          </a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="link-secondary" href="#" aria-label="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24">
              <title>Search</title>
              <circle cx="10.5" cy="10.5" r="7.5" />
              <path d="M21 21l-5.2-5.2" />
            </svg>
          </a>

        </div>
      </div>
    </header>



  </div>



  <div class="card card-filter bg-light mt-3 m-4">
    <h4 class="mb-1">Filter by Group</h4>
    <div class="custom-checkbox">
      <input type="checkbox" class="group-filter" value="A" id="defaultInline1">
      <label class="-label" for="defaultInline1">A</label>
    </div>
    <div class="custom-checkbox">
      <input type="checkbox" class="group-filter" value="B" id="defaultInline2">
      <label class="-label" for="defaultInline2">B</label>
    </div>
    <div class="custom-checkbox">
      <input type="checkbox" class="group-filter" value="C" id="defaultInline3">
      <label class="-label" for="defaultInline3">C</label>
    </div>
    <div class="custom-checkbox">
      <input type="checkbox" class="group-filter" value="C" id="defaultInline3">
      <label class="-label" for="defaultInline3">C</label>
    </div>
    <div class="custom-checkbox">
      <input type="checkbox" class="group-filter" value="D" id="defaultInline3">
      <label class="-label" for="defaultInline3">D</label>
    </div>
    <div class="custom-checkbox">
      <input type="checkbox" class="group-filter" value="E" id="defaultInline3">
      <label class="-label" for="defaultInline3">E</label>
    </div>
    <div class="custom-checkbox">
      <input type="checkbox" class="group-filter" value="F" id="defaultInline3">
      <label class="-label" for="defaultInline3">F</label>
    </div>
    <div class="custom-checkbox">
      <input type="checkbox" class="group-filter" value="G" id="defaultInline3">
      <label class="-label" for="defaultInline3">G</label>
    </div>
    <div class="custom-checkbox">
      <input type="checkbox" class="group-filter" value="H" id="defaultInline3">
      <label class="-label" for="defaultInline3">H</label>
    </div>

  </div>
  <section class="row row-cols-2 row-cols-lg-3 g-3 p-3">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="card col mx-auto group-card justify-content-center" data-group="<?php echo $row['nameGrp']; ?>" style="width: 18rem;">
        <h3 class="text-center"><?php echo $row['nameGrp'] ?></h3>


        <?php
        $stade = "SELECT * FROM stade WHERE idStd = " . $row['idStd'];
        $stadeResult = mysqli_query($connection, $stade);

        while ($StadeRow = mysqli_fetch_assoc($stadeResult)) { ?>
              <div class="d-flex justify-content-between">
            <p> <span>stade:</span>  <?php echo $StadeRow['nameStd'] ?></p>
            <p> <span> city:</span>  <?php echo $StadeRow['city'] ?></p>
</div>
        <?php } ?>

        <ul class="list-group list-group-flush   ">
          <?php
          $teamQuery = "SELECT * FROM equipe WHERE idGrp = " . $row['idGrp'];
          $teamResult = mysqli_query($connection, $teamQuery);

          while ($teamRow = mysqli_fetch_assoc($teamResult)) { ?>
            <div class="click my-3" data-id="<?= $teamRow['idEqp'] ?>">
              <li class='list-group-item'> <img class="w-25 " src="<?php echo $teamRow['flag'] ?>" alt="flag">
                <?php echo $teamRow['nomEqp'] ?></li> <button hidden data-id="<?= $teamRow['idEqp'] ?>"> </button>
            </div> <?php } ?>
        </ul>
      </div>
    <?php } ?>
  </section>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">

        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.group-filter').change(function() {
        var selectedGroups = [];
        $('.group-filter:checked').each(function() {
          selectedGroups.push($(this).val());
        });

        $('.group-card').hide();

        if (selectedGroups.length === 0) {
          $('.group-card').show();
        } else {
          selectedGroups.forEach(function(group) {
            $('.group-card[data-group="' + group + '"]').show();
          });
        }
      });
    });

    $(document).ready(function() {
      $('.click').click(function() {
        let id = $(this).data('id');
        $.ajax({
          url: "ajax.php",
          type: "post",
          data: {
            id: id
          },
          success: function(responce) {
            $(".modal-body").html(responce);
            $(".modal").modal('show');
          }
        })

      })
    })
  </script>
</body>

</html>