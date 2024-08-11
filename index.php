<?php 
session_start();
include './includes/DBConnection.php';

        if(isset($_POST['submit'])) {
          if(empty($_POST['username']) || empty($_POST['password'])) {
            echo 'empty';
          } else {
            $sql = "SELECT * FROM users WHERE username =:username AND password =:password";
            $stmt = $conn->prepare($sql);
            $stmt->execute(

                array(
                  'username' => $_POST['username'],
                  'password' => $_POST['password']
                )
            );
            $count = $stmt->rowCount();

            if($count > 0) {
              $_SESSION['username'] = $_POST['username'];
              $_SESSION['password'] = $_POST['password'];

              header("Location: ./pages/page_main.php");
            } else {
              echo '<script>alert("Wrong inputs.")</script>';
            }
          }
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>notedaily</title>
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <style>
  @import 'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap';
* {
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
}
</style>


  <!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(0,100%, 0%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(0, 100%, 1%) 15%,
          hsl(0, 100%, 1%) 35%,
          hsl(0, 100%, 1%) 75%,
          hsl(0, 100%, 1%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(0, 100%, 1%) 15%,
          hsl(0, 100%, 1%) 35%,
          hsl(0, 100%, 1%) 75%,
          hsl(0, 100%, 1%) 80%,
          transparent 100%);
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 1) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(55, 81%, 95%)">
          Do it with 
          <span style="color: hsl(218, 100%, 55%)">notedaily.</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
        “Productivity is never an accident. It is always the result of a commitment to excellence, intelligent planning, and focused effort.” – Paul J. Meyer
        </p>
      </div>

      <div class="col-lg-5 ms-5 mb-5 mb-lg-0 position-relative">

        <div class="card bg-glass">
          <div class="card-body px-6 py-5 px-md-5">
            
          <h2 class="fw-bold mb-2 text-center text-uppercase">Login</h2>
          <p class="text-black text-center fs-6 mb-2">Please enter username and password!</p>

            <form method="post">
              <div data-mdb-input-init class="form-outline mb-3">
                <label class="form-label invisible" for="username" >Username</label>
                <input type="username" name="username" id="username" class="form-control w-100" placeholder="Username" required />
              </div>

              <div data-mdb-input-init class="form-outline mb-1">
                <input type="password" name="password" id="password" class="form-control w-100" placeholder="Password" required />
                <label class="form-label invisible" for="password">Password</label>
              </div>

              <div class="text-center">
                <button type="submit" name="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary w-100 btn-block mb-4">
                  Log in
                </button>
              </div>

              <div class="text-center">
                <p class="mb-0">Don't have an account? <a href="./pages/page_signup.php" class="text-black fw-bold">Sign Up</a></p>
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