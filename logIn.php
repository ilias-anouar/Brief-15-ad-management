<?php
session_start();
include 'connect.php';
?>
<!-- Modal Log in -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Log in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <section class="h-100 gradient-form" style="background-color: #eee">
          <div class="container h-100">
            <div class="row g-0">
              <div class="card-body">
                <div class="text-center">
                  <h4 class="">Enter in Your Account</h4>
                </div>
                <form method="POST" action="index.php">
                  <p>Please login to your account</p>
                  <div class="form-outline mb-2">
                    <label class="form-label" for="emailLogIn">Email :</label>
                    <input type="email" name="inpEmail" id="emailLogIn" class="form-control"
                      placeholder="Enter your Email" />
                    <p id="resEmail"></p>
                  </div>
                  <div class="form-outline mb-2">
                    <label class="form-label" for="passLogIn">Password :</label>
                    <input type="password" name="inpPassword" id="passLogIn" class="form-control"
                      placeholder="Enter your password" />
                    <p id="resPass"></p>
                  </div>
                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn w-100 btn-log-in" id="logIn" name="btnLogIn" type="submit">
                      Log in
                    </button>
                    <br />
                    <a class="text-muted" href="#!">Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button type="button" class="btn btn-outline-danger">
                      Create new
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
<?php



// $_SESSION['client_id'] = $row['client_id'];
// if ($_SERVER["REQUEST_METHOD"] === "GET") {

  if (isset($_POST['btnLogIn'])) {
    $pass = $_POST['inpPassword'];
    $email = $_POST['inpEmail'];
    if (empty($email) && empty($pass)) {
      // echo '<span style = color:red;>champ Obligatoire</span>';
      echo '<script>swal({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "warning",
                button: "Aww yiss!",
              });</script>';
    } else {
      $select = $conn->query("SELECT * FROM client WHERE email = '$email'");
      $row = $select->fetch();
      print_r($row);
      if (is_array($row)) {
        if (password_verify($_POST['inpPassword'], $row['password'])){
  
          header("Location: clients.php");
  
  
          $_SESSION['first_name'] = $row['first_name'];
          $_SESSION['last_name'] = $row['last_name'];
          $_SESSION['pass'] = $row['password'];
          $_SESSION['client_id'] = $row['client_id'];
          echo $_SESSION['client_id'];
  
        }       echo '<script>swal({
          title: "password not coreect",
          text: "You clicked the button!",
          icon: "warning",
          button: "Aww yiss!",
        });</script>';
      } else {
              echo '<script>swal({
        title: "emailnot correct",
        text: "You clicked the button!",
        icon: "warning",
        button: "Aww yiss!",
      });</script>';
      }       

    }
    // if (isset($_SESSION['first_name'])) {
    //   header("location: clients.php");
    // }
  }
//    else {
//   header('location: index.php');
// }
?>

































<!-- ================================================== -->
<?php
// if (isset($_POST['inpEmail']) || isset($_POST['inpPassword'])) {
//   function validate(data) {
//     $data = trim(data);
//     $data = stripcslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
//   }
//     $email = validate($_POST['inpEmail']);
//     $pass = validate($_POST['inpPassword']);

//   if (empty($email)) {
//     header('location: index.php?erore=User Name is requerd');
//   } elseif ($pass) {
//     header('location: index.php');
//   }

// } else {
//   header('location: index.php');
//   exit();
// }

?>