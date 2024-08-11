<?php 
session_start();
include '../includes/DBConnection.php';

      if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        try {
          $stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
          $stmt->execute([$username]);

            if($stmt->rowCount() > 0) {
              echo '<script>alert("Username exist, please use another!")</script>';
            } else {
                try {
                    $insert = $conn->prepare("INSERT INTO users (name, username, password) VALUE ( ?, ?, ?)");
                      if($insert->execute([$name, $username, $password])) {
                        echo '<script>alert("You are added! Welcome!")</script>';
                      } 
                    }
                catch(PDOException $e) { 
                  echo $e->getMessage();
                }
              }
            }
          catch(PDOException) {
            echo $e->getMessage();
          }
        }
           

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
  @import 'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap';
* {
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
}
</style> 

<section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
                <h3 class="fw-bolder">Sign up!</h3>
            </div>
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Enter your details to register</h2>
            <form method="post">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required>
                    <label for="name" class="form-label">Full Name</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                    <label for="username" class="form-label">Username</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password" class="form-label">Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="iAgree" id="iAgree" required>
                    <label class="form-check-label text-secondary" for="iAgree">
                      I agree to the <a href="#!" class="link-primary text-decoration-none">terms and conditions</a>
                    </label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button name="submit" class="btn btn-primary btn-lg" type="submit">Sign up</button>
                  </div>
                </div>
                <div class="col-12">
                  <p class="m-0 text-secondary text-center">Already have an account? <a href="../index.php" class="link-primary text-decoration-none fw-semibold">Log in</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>