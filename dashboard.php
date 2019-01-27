<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <link rel="stylesheet" href="css/dashboard.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
    <title>Dashboard</title>
    <?php
    require 'DB.php';

    $select_inv = 'SELECT * FROM `foodinventory`';
    $inv = DB::getInstance()->prepare($select_inv);
    $inv->execute();

    $select_visitor = 'SELECT * FROM `visitor`';
    $visitor = DB::getInstance()->prepare($select_visitor);
    $visitor->execute();

    $select_request = 'SELECT * FROM `foodrequest`';
    $request = DB::getInstance()->prepare($select_request);
    $request->execute();


    ?>
</head>
<body>
<body data-gr-c-s-loaded="true">
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#inventory" onclick="showHide(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-shopping-cart">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            Inventory
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#request" onclick="showHide(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            Order Requests
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#visitor" onclick="showHide(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            Customers
                        </a>
                    </li>
                </ul>


            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-2">
            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                </div>
                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                </div>
            </div>

            <div class="inventory-div  fb_table">
                <h2>Inventory</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="inventory-table">
                        <thead>
                        <tr>
                            <th>Item ID</th>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  while($row = $inv->fetch())  { ?>
                        <tr>
                            <td><?php echo $row['foodid'];?></td>
                            <td><?php echo $row['foodname']; ?></td>
                            <td><?php echo $row['categoryid']; ?></td>
                            <td><?php echo $row['actualQty']; ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="request-div d-none fb_table">
                <h2>Order Requests</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="request-table">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Visitor ID</th>
                            <th>Request Date</th>
                            <th>Pick Up Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  while($row = $request->fetch())  { ?>
                        <tr>
                            <td><?php echo $row['requestid'];?></td>
                            <td><?php echo $row['userid'];?></td>
                            <td><?php echo $row['requestdate'];?></td>
                            <td><?php echo $row['pickupdate'];?></td>
                            <td><?php echo $row['delivered'];?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="visitor-div d-none  fb_table">
                <h2>Customer</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="visitor-table">
                        <thead>
                        <tr>
                            <th>Visitor ID</th>
                            <th>Full name</th>
                            <th>Household Size</th>
                            <th>Visitor's Food bank</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  while($row = $visitor->fetch())  { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['household_size']; ?></td>
                            <td><?php echo $row['fb_selected']; ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>


        </main>

    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


<script>

    function showHide(ele) {
      $('main').find('fb_table').addClass('d-none');
      console.log($($(ele)[0]).attr('href'));

      if($($(ele)[0]).attr('href') === "#request") {
        $($('.inventory-div')[0]).addClass('d-none');
        $($('.visitor-div')[0]).addClass('d-none');
        $($('.request-div')[0]).removeClass('d-none');
      }
      if ($($(ele)[0]).attr('href') === "#visitor") {
        $($('.inventory-div')[0]).addClass('d-none');
        $($('.request-div')[0]).addClass('d-none');
        $($('.visitor-div')[0]).removeClass('d-none');
      }
      if ($($(ele)[0]).attr('href') === "#inventory") {
        $($('.visitor-div')[0]).addClass('d-none');
        $($('.request-div')[0]).addClass('d-none');
        $($('.inventory-div')[0]).removeClass('d-none');
      }

    }
</script>

<script>
  $(document).ready(function () {
    console.log($("#order-request a"));
    $("#order-request a").click(function(){
      console.log('adas');
      $(".order-request-div").show();
    });
    $('#inventory-table').DataTable();
    $('#request-table').DataTable();
    $('#visitor-table').DataTable();
  });
</script>
</body>
</html>