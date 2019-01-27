<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Food Choice</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>

    <?php
    if (isset($_GET['rid'])) {
        $request_id = $_GET['rid'];
    }
    ?>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#">FoodDrive</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<main role="main" class="container mt-3">
    <div class="mt-3">
        <h4>* <span class="badge badge-info">Choose exactly 5 food options:</span></h4>
        <div class="alert alert-info d-none alert-redirect-home mt-3" role="alert">
            <p class="success">Form submitted successfully! Redirecting you to main page in 3 seconds.</p>
        </div>
        <form id="request-form" class="col-12">
            <div class="row">
                <div class="col">
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Apple Sauce"> Apple
                    Sauce<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Beans"> Beans<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Beef Stew"> Beef Stew<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Boxed Milk"> Boxed
                    Milk<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Canned Fruit"> Canned
                    Fruit<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Cereal"> Cereal<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Chicken"> Chicken<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Coffee"> Coffee<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Condiments">
                    Condiments<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Crackers">
                    Crackers/Cookies<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Evaporated Milk">
                    Evaporated Milk<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Mac and Cheese"> Mac and
                    Cheese<br>
                </div>
                <div class="col">
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Manwich"> Manwich<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Muffin Mix"> Muffin
                    Mix<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Oatmeal"> Oatmeal<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Pancake Mix"> Pancake
                    Mix<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Pancake Syrup"> Pancake
                    Syrup<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Pasta"> Pasta<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Peanut Butter"> Peanut
                    Butter<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Rice"> Rice<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Soup"> Soup<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Spaghetti Sauce">
                    Spaghetti Sauce<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Spam"> Spam<br>
                    <input class="single-checkbox" type="checkbox" name="item_name[]" value="Tuna"> Tuna<br>
                </div>
            </div>
            Your ID number:
            <input type="number" name="visitor_id" id="visitor_id" readonly class="form-control"
                   style="width: 40% !important;" value="<?php echo $request_id; ?>">
            <?php if (isset($_GET['rid'])) { ?>
                <?php if (strlen($_GET['rid']) > 2) { ?>
                    <div class="input-group-append mt-3">
                        <input class="btn btn-primary btn-sm" type="submit" value="Submit" name="request_submit">
                    </div>
                <?php } ?>
            <?php } ?>
        </form>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    var limit = 0;
    $('input.single-checkbox').on('change', function (evt) {
      limit++;
      if (limit >= 5) {
        $('input.single-checkbox').prop('disabled', true);
      }
    });

    $("#request-form").submit(function (e) {
      var form = $(this);
      console.log(form.serialize());
      if ($("input.single-checkbox:checked").length < 1) {
        alert('Please select food items.');
      } else if ($("input.single-checkbox:checked").length < 5) {
        alert('Please select five food items.');
      } else {
        $("input.single-checkbox").removeAttr("disabled");
        var submit = $('input[name=request_submit]');
        $.ajax({
          type: "POST",
          url: 'app/process_request.php',
          data: form.serialize(), // serializes the form's elements.
          success: function (data) {
            submit.attr('disabled', true);
            var pickUpDate  = data.replace(/:\s*/g, "/");
            alert('You can pick up your order on this day: ' + pickUpDate);
            $('.alert-redirect-home').removeClass('d-none');
            window.setTimeout(function(){
              window.location.href = "index.php";
            }, 2000);
          }
        });
      }
      e.preventDefault(); // avoid to execute the actual submit of the form.
      return false;
    });
  });
</script>
</body>
</html>
