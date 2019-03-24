<?php
    function __autoload($class) {
        require_once 'core/' . $class . '.php';
    }

    new Main();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script> window.jQuery || document.write('<script src="http://mysite.com/jquery.min.js"><\/script>') </script>

    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script> $(document).ready( function () { $('#table_id').DataTable(); } ); </script>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <title>Desafio NeoAssist</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
        <h2 style="color: white">Desafio NeoAssist</h2>
    </nav>

    </div>
    <div style="margin-top: 20px; margin-bottom: 20px" class="col">
        <div style="padding-top: 10px;border-top-width: 10px; margin-top: 10px;" class="col-md-auto">
            <?php ?>
                <div class="row">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Assunto</th>
                                <th>Customer name</th>
                                <th>Customer email</th>
                                <th>Created date</th>
                                <th>Updated date</th>
                                <th>Days</th>
                                <th>Sender</th>
                                <th>Priority</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $customers             = JsonGetter::getData('./target/tickets_points.json');
                            
                            foreach($customers as $customer) { 
                              foreach($customer["Interactions"] as $interactions) { 
                            ?>
                              <tr>
                                <td style="width:10%">
                                  <button value="<?php echo $interactions["Message"];?>" class="btn btn-primary" style="width:100%" data-toggle="modal" data-target="#myModal">
                                    <?php echo $interactions["Subject"]; ?>
                                  </button>
                                </td>
                                <td><?php echo $customer["CustomerName"];  ?></td>
                                <td><?php echo $customer["CustomerEmail"]; ?></td>
                                <td><?php echo $customer["DateCreate"];    ?></td>
                                <td><?php echo $customer["DateUpdate"]; ?></td>
                                <td><?php 
                                  $days = floor((strtotime($customer["DateUpdate"]) - strtotime($customer["DateCreate"])) / (60 * 60 * 24));
                                  echo $days;
                                ?></td>
                                <td><?php echo $interactions["Sender"]; ?></td>
                                <td><?php if ($interactions["Points"] > 30) {
                                            $points  = $interactions["Points"];
                                            $points += $days / 5;
                                            $grade   = ($points >= 85) ? 'A' : (($points < 85 && $points >= 65) ? 'B' : 'C');
                                            echo 'Alta (' . $grade . ')';
                                          } else { echo 'Normal'; } 
                                    ?></td>
                              </tr>
                            <?php
                                }   
                            } 
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php ?>
        </div>
    </div>
  </div>


  <script>
  // $('#myModal').on('shown.bs.modal', function (e) {
  //   alert('x');
  // })
  </script>
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">

      <script>
      $('button[class="btn btn-primary"]').on("click", function(e) {
        $('div#modal-header').text(e.target.innerText);
        $('div#modal-body').text(e.target.value);
      });
      </script>   

        <!-- Modal Header -->
        <div class="modal-header" id="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>        
      </div>
    </div>
  </div>



  </body>
</html>
