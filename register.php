<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <form>
        <div class="form-group">
            <label for="full_name">Full name</label>
            <input type="text" class="form-control" id="full_name" aria-describedby="fullNameHelp" placeholder="Enter full name">
            <label for="full_name">Household size</label>
            <input type="text" class="form-control" id="household_size" aria-describedby="fullNameHelp" placeholder="Enter number of adults and children">
        </div>
        <div class="form-group">
            <label>Select the food centre</label>
            <button type="button" class="find-me btn btn-info btn-block">Find the nearest food bank</button>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<!-- Load jQuery from a CDN or your server -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  function geocode(query){
    $.ajax({
      url: 'https://api.opencagedata.com/geocode/v1/json',
      method: 'GET',
      data: {
        'key': '0a6e8f8c3b084455afc1078568083766',
        'q': query
        // see other optional params:
        // https://opencagedata.com/api#forward-opt
      },
      dataType: 'json',
      statusCode: {
        200: function(response){  // success
          console.log(response.results[0].formatted);
          console.log(response.results[0].annotations.DMS.lat);
          console.log(response.results[0].annotations.DMS.lng);
        },
        402: function(){
          console.log('hit free-trial daily limit');
          console.log('become a customer: https://opencagedata.com/pricing');
        }
        // other possible response codes:
        // https://opencagedata.com/api#codes
      }
    });
  }



  $(document).ready(function(){
    // default location
    geocode('Montreal, Quebec');
    // console should now show:
    // 'Goethe-Nationalmuseum, Frauenplan 1, 99423 Weimar, Germany'
  });
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
</html>