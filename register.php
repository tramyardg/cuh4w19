<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
    <title>Hello, world!</title>
</head>
<body>
<div class="container mt-3">
    <form>
        <div class="form-group">
            <label for="full_name">Full name</label>
            <input type="text" class="form-control" id="full_name" aria-describedby="fullNameHelp"
                   placeholder="Enter full name">
            <label for="full_name">Household size</label>
            <input type="text" class="form-control" id="household_size" aria-describedby="fullNameHelp"
                   placeholder="Enter number of adults and children">
        </div>
        <div class="form-group">
            <label>Select the food centre</label>
            <button type="button" onclick="getLocation()" class="find-me btn btn-info btn-block">Find the nearest food
                bank
            </button>
            <p id="geo_location_not_supported"></p>
        </div>

        <div id="demodiv"></div>


        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<!-- Load jQuery from a CDN or your server -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  var x = document.getElementById("demo");
  var x2 = document.getElementById("demodiv");
  function templateAddressDiv(id, name, address, distance) {
    var h = '   <div class="card mb-sm-2">  '  +
    '               <div class="card-body">  '  +
    '                   <div class="input-group">  '  +
    '                       <div class="input-group-prepend">  '  +
    '                           <div class="input-group-text">  '  +
    '                               <input type="radio" value="' + id + '" name="radio1" aria-label="Radio button for following text input">  '  +
    '                           </div>  '  +
    '                       </div>  '  +
    '                       <input type="text" class="form-control" value="'+name+'" aria-label="Text input with radio button">  '  +
    '                   </div>  '  +
    '                   <span>Address:</span>  '  +
    '                   <span> ' + address + ' </span>  '  +
    '                   <p>Distance (km): ' + distance + '</p>  ' +
    '               </div>  '  +
    '          </div>  ';
    return h;

  }

  var data_food_bank = {
    "food_banks": [
      {
        "name": "The McConnell Foundation",
        "address": "1002 Sherbrooke St W, Montreal, QC H3A 3L6",
        "lat": "45.5022794",
        "long": "-73.5748901"
      },
      {
        "name": "Welcome Hall Mission",
        "address": "1490 Saint-Antoine St W, Montreal, QC H3C 1C3",
        "lat": "45.493450",
        "long": "-73.571430"
      },
      {
        "name": "The People's Potato",
        "address": "1455 Boulevard de Maisonneuve O, Montréal, QC H3G 1M8",
        "lat": "45.4970605",
        "long": "-73.5788021"
      },
      {
        "name": "Food Secure",
        "address": "3875 St Urbain St, Montreal, QC H2W 1V1",
        "lat": "45.5150636",
        "long": "-73.5784565"
      }
    ]
  };


  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);

    } else {
      x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }

  function showPosition(position) {
    var current_lat = position.coords.latitude;
    var current_lng = position.coords.longitude;
    var h = "";

    console.log("Latitude: " + position.coords.latitude +
        "<br>Longitude: " + position.coords.longitude);
    for (var i = 0; i < data_food_bank.food_banks.length; i++) {
      var food_bank = data_food_bank.food_banks;

      var d = calculateDistance(current_lat, current_lng, food_bank[i].lat, food_bank[i].long);
      console.log(templateAddressDiv(i, food_bank[i].name, food_bank[i].address, d));



      h += templateAddressDiv(i, food_bank[i].name, food_bank[i].address, d);
    }
    x2.innerHTML = h;

  }

  // lat 1: current lat
  // lng 1: current longitude
  function calculateDistance(lat1, lng1, lat2, lng2) {
    var R = 6371; // Radius of the earth in km
    var dLat = deg2rad(lat2 - lat1);  // deg2rad below
    var dLon = deg2rad(lng2 - lng1);
    var a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    return R * c;
  }

  function deg2rad(deg) {
    return deg * (Math.PI / 180)
  }

  $(document).ready(function () {

  });
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
</html>