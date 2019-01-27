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
    <title>Register for free food</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#">FoodDrive</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<div role="main" class="container mt-3 register-main-div">
    <form id="register-form">
        <div class="form-group">
            <span class="text-danger font-weight-bold">* </span><label>Full name</label>
            <input type="text" required class="form-control" name="full_name" id="full_name"
                   placeholder="Enter full name">
            <span class="text-danger font-weight-bold">* </span><label>Household size</label>
            <input type="number" required class="form-control" name="household_size" id="household_size"
                   placeholder="Enter number of adults and children">
        </div>
        <div class="form-group">
            <span class="text-danger font-weight-bold">* </span><label>Select the food centre</label>
            <button type="button" onclick="getLocation()" class="find-me btn btn-info btn-block">Find the nearest food
                bank
            </button>
            <p id="geo_location_not_supported"></p>
        </div>
        <div id="demodiv"></div>
        <input type="submit" class="btn btn-primary btn-sm" value="Register" name="submit_register_form"/>
    </form>
</div>

<!-- Load jQuery from a CDN or your server -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  var x = document.getElementById("demo");
  var x2 = document.getElementById("demodiv");
  function templateAddressDiv(fbname, address, distance) {
    var h = '   <div class="card mb-sm-2">  ' +
        '               <div class="card-body">  ' +
        '                   <div class="input-group mb-1">  ' +
        '                       <div class="input-group-prepend">  ' +
        '                           <div class="input-group-text">  ' +
        '                               <input required type="radio" value="' + address + '" name="fb_selected" aria-label="Radio button for following text input">  ' +
        '                           </div>  ' +
        '                       </div>  ' +
        '                       <input type="text" class="form-control" value="' + fbname + '" aria-label="Text input with radio button">  ' +
        '                   </div>  ' +
        '                   <span>Address:</span>  ' +
        '                   <span> ' + address + ' </span>  ' +
        '                   <p>Distance: ' + distance + ' km(s)</p>  ' +
        '               </div>  ' +
        '          </div>  ';
		console.log(h);
    return h;
  }

  function accountInfo(fullName, accountID, fbAddress) {
    var h = '   <div class="card  jumbotron">  ' +
        '           <div class="card-body">  ' +
        '               <h5 class="card-title">For your visit to your chosen food bank, please take a note of this information.</h5>  ' +
        '               <h6 class="card-subtitle mb-2 text-muted">Full name: ' + fullName + '</h6>  ' +
        '               <h6 class="card-subtitle mb-2 text-muted">Account ID: ' + accountID + '</h6>  ' +
        '               <h6 class="card-subtitle mb-2 text-muted">Nearest food bank:</h6>  ' +
        '               <span class="card-text">' + fbAddress + '</span>  ' +
        '               <p><a href="request.php?rid='+accountID+'">Select your food here.</a></p>  ' +
        '           </div>  ' +
        '      </div>  ';
    return h;
  }

  var data_food_bank = {
    "food_banks": [
      {
        "name": "The McConnell Foundation",
        "address": "1002 Sherbrooke St W, Montreal, QC H3A 3L6",
        "lat": "45.5022794",
        "long": "-73.5748901",
        "id": "2222"
      },
      {
        "name": "Welcome Hall Mission",
        "address": "1490 Saint-Antoine St W, Montreal, QC H3C 1C3",
        "lat": "45.493450",
        "long": "-73.571430",
        "id": "8888"
      },
      {
        "name": "The People's Potato",
        "address": "1455 Boulevard de Maisonneuve O, Montréal, QC H3G 1M8",
        "lat": "45.4970605",
        "long": "-73.5788021",
        "id": "7777"
      },
      {
        "name": "Food Secure",
        "address": "3875 St Urbain St, Montreal, QC H2W 1V1",
        "lat": "45.5150636",
        "long": "-73.5784565",
        "id": "3333"
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

    for (var i = 0; i < data_food_bank.food_banks.length; i++) {
      var food_bank = data_food_bank.food_banks;
      var d = Math.round(calculateDistance(current_lat, current_lng, food_bank[i].lat, food_bank[i].long) * 100) / 100;
      h += templateAddressDiv(food_bank[i].name, food_bank[i].address, d);
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
    var register_main_div = $('.register-main-div');
	//$('input[type=submit]').attr('disabled', true);
	
    $("#register-form").submit(function (e) {
		if($('input[name=fb_selected]').val() != "") {
			var form = $(this);
      $.ajax({
        type: "POST",
        url: 'app/process_registration.php',
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
          var d = JSON.parse(data);
          console.log(d);
          form.hide();
          register_main_div.append(accountInfo(d.data[1], d.data[0], d.data[3]));
        }
      });
      e.preventDefault(); // avoid to execute the actual submit of the form.
		}
      
    });
  });
</script>


</body>
</html>