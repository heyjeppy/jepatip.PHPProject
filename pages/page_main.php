<?php 
    session_start();
    include '../includes/DBConnection.php';

    if(isset($_SESSION["username"])) {
        

    $username = $_SESSION["username"];

    function displayPhoto() {
        global $conn, $username;
        $stmt = $conn->prepare("SELECT img_url FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->fetch();
        $stmt->close();
    }

    if(isset($_POST['addnote'])) {
        $note = $_POST['note'];
    function addNotes($note) {
    global $conn;
    if (!empty($note)) {
        $stmt = $conn->prepare("INSERT INTO notes (note) VALUES (?)");
        $stmt->bind_param("s", $note);
        $stmt->execute();
        $stmt->close();
    }
  }
    }

  function deleteNotes() {
    global $conn;
        $stmt = $conn->prepare("DELETE FROM notes WHERE note = ?");
        $stmt->bind_param("s", $note);
        $stmt->execute();
        $stmt->close();
}



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/navbars/navbar-3/assets/css/navbar-3.css">
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

        <header id="header-demo ">
        <nav class="navbar navbar-expand-md bg-white bsb-navbar-3">
            <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item me-3">
                <a class="nav-link" href="#!" data-bs-toggle="offcanvas" data-bs-target="#bsbSidebar1" aria-controls="bsbSidebar1">
                    <i class="bi-filter-left fs-3 lh-1 white"></i>
                </a>
                </li>
            </ul>
            <a class="navbar-brand" href="#!">
                <h4 class="fs-4 text-primary">notedaily.</h4>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#bsbNavbar" aria-controls="bsbNavbar" aria-label="Toggle Navigation">
                <i class="bi bi-three-dots"></i>
            </button>
            <div class="collapse navbar-collapse" id="bsbNavbar">
                <ul class="navbar-nav bsb-dropdown-menu-responsive ms-auto align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle bsb-dropdown-toggle-caret-disable" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="position-relative pt-1">
                        <i class="bi bi-chat-left"></i>
                        <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                        9 -->
                        <span class="visually-hidden">New Chats</span>
                        </span>
                    </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md-end bsb-dropdown-animation bsb-fadeIn">
                    <div>
                        <h6 class="dropdown-header fs-7 text-center">New Messages</h6>
                    </div>
                    <div>
                        <hr class="dropdown-divider mb-0">
                    </div>
                    <div>
                        <hr class="dropdown-divider mt-0">
                    </div>
                    <div>
                        <a class="dropdown-item fs-7 text-center" href="#">No Messages</a>
                    </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle bsb-dropdown-toggle-caret-disable" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="position-relative pt-1">
                        <i class="bi bi-bell"></i>
                        <span class="p-1 bg-danger border border-light rounded-circle position-absolute top-0 start-100 translate-middle">
                        <span class="visually-hidden">New Notifications</span>
                        </span>
                    </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-md-end bsb-dropdown-animation bsb-fadeIn">
                    <li>
                        <h6 class="dropdown-header fs-7 text-center">Notifications</h6>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#!">
                        <span>
                            <i class="bi bi-envelope-fill me-2"></i>
                            <span class="fs-7">New Messages</span>
                        </span>
                        <!-- <span class="fs-7 ms-auto text-secondary">5 mins</span> -->
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#!">
                        <span>
                            <i class="bi bi-person-fill me-2"></i>
                            <span class="fs-7">Friend Requests</span>
                        </span>
                        <!-- <span class="fs-7 ms-auto text-secondary">17 hours</span> -->
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#!">
                        <span>
                            <i class="bi bi-file-earmark-fill me-2"></i>
                            <span class="fs-7">New Reports</span>
                        </span>
                        <!-- <span class="fs-7 ms-auto text-secondary">3 days</span> -->
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item fs-7 text-center" href="#">See All Notifications</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle bsb-dropdown-toggle-caret-disable" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <h6 class="fs-6"><?php echo $_SESSION['username']; ?></h6>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-md-end bsb-dropdown-animation bsb-fadeIn">
                    <li>
                        <h6 class="dropdown-header fs-7 text-center">Welcome, <?php echo $_SESSION['username']; ?></h6>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#!">
                        <span>
                            <i class="bi bi-person-fill me-2"></i>
                            <span class="fs-7">View Profile</span>
                        </span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#!">
                        <span>
                            <i class="bi bi-bell-fill me-2"></i>
                            <span class="fs-7">Notifications</span>
                        </span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="#!">
                        <span>
                            <i class="bi bi-gear-fill me-2"></i>
                            <span class="fs-7">Settings & Privacy</span>
                        </span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#!">
                        <span>
                            <i class="bi bi-question-circle-fill me-2"></i>
                            <span class="fs-7">Help Center</span>
                        </span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item text-center" href="#!">
                        <span>
                            <a class="fs-7" href="../includes/logout.php">Log Out</a>
                        </span>
                        </a>
                    </li>
                    </ul>
                </li>
                </ul>
            </div>
            </div>
        </nav>
        </header>



        <!-- Main -->
        <div id="main-demo">
        <section class="my-3 my-md-4">
            <div class="container">

        <style>
            body{
                background: #ffffff;
                margin-top:20px;
                }
            .card {
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 0 solid transparent;
                border-radius: 0;
            }
            .card {
                margin-bottom: 30px;
            }
            .card-body {
                flex: 1 1 auto;
                padding: 1.57rem;
            }

            .note-has-grid .nav-link {
                padding: .5rem
            }

            .note-has-grid .single-note-item .card {
                border-radius: 10px
            }

        .note-has-grid .single-note-item .favourite-note {
            cursor: pointer
        }

        .note-has-grid .single-note-item .side-stick {
            position: absolute;
            width: 3px;
            height: 35px;
            left: 0;
            background-color: rgba(82, 95, 127, .5)
        }

        .note-has-grid .single-note-item .category-dropdown.dropdown-toggle:after {
            display: none
        }

        .note-has-grid .single-note-item .category [class*=category-] {
            height: 15px;
            width: 15px;
            display: none
        }

        .note-has-grid .single-note-item .category [class*=category-]::after {
            content: "\f0d7";
            font: normal normal normal 14px/1 FontAwesome;
            font-size: 12px;
            color: #fff;
            position: absolute
        }

        .note-has-grid .single-note-item .category .category-business {
            background-color: rgba(44, 208, 126, .5);
            border: 2px solid #2cd07e
        }

        .note-has-grid .single-note-item .category .category-social {
            background-color: rgba(44, 171, 227, .5);
            border: 2px solid #2cabe3
        }

        .note-has-grid .single-note-item .category .category-important {
            background-color: rgba(255, 80, 80, .5);
            border: 2px solid #ff5050
        }

        .note-has-grid .single-note-item.all-category .point {
            color: rgba(82, 95, 127, .5)
        }

        .note-has-grid .single-note-item.note-business .point {
            color: rgba(44, 208, 126, .5)
        }

        .note-has-grid .single-note-item.note-business .side-stick {
            background-color: rgba(44, 208, 126, .5)
        }

        .note-has-grid .single-note-item.note-business .category .category-business {
            display: inline-block
        }

        .note-has-grid .single-note-item.note-favourite .favourite-note {
            color: #ffc107
        }

        .note-has-grid .single-note-item.note-social .point {
            color: rgba(44, 171, 227, .5)
        }

        .note-has-grid .single-note-item.note-social .side-stick {
            background-color: rgba(44, 171, 227, .5)
        }

        .note-has-grid .single-note-item.note-social .category .category-social {
            display: inline-block
        }

        .note-has-grid .single-note-item.note-important .point {
            color: rgba(255, 80, 80, .5)
        }

        .note-has-grid .single-note-item.note-important .side-stick {
            background-color: rgba(255, 80, 80, .5)
        }

        .note-has-grid .single-note-item.note-important .category .category-important {
            display: inline-block
        }

        .note-has-grid .single-note-item.all-category .more-options,
        .note-has-grid .single-note-item.all-category.note-favourite .more-options {
            display: block
        }

        .note-has-grid .single-note-item.all-category.note-business .more-options,
        .note-has-grid .single-note-item.all-category.note-favourite.note-business .more-options,
        .note-has-grid .single-note-item.all-category.note-favourite.note-important .more-options,
        .note-has-grid .single-note-item.all-category.note-favourite.note-social .more-options,
        .note-has-grid .single-note-item.all-category.note-important .more-options,
        .note-has-grid .single-note-item.all-category.note-social .more-options {
            display: none
        }

        @media (max-width:767.98px) {
            .note-has-grid .single-note-item {
                max-width: 100%
            }
        }

        @media (max-width:991.98px) {
            .note-has-grid .single-note-item {
                max-width: 216px
            }
        }

        .modal-content {
    -webkit-border-radius: 0;
    -webkit-background-clip: padding-box;
    -moz-border-radius: 0;
    -moz-background-clip: padding;
    border-radius: 6px;
    background-clip: padding-box;
    -webkit-box-shadow: 0 0 40px rgba(0,0,0,.5);
    -moz-box-shadow: 0 0 40px rgba(0,0,0,.5);
    box-shadow: 0 0 40px rgba(0,0,0,.5);
    color: #000;
    background-color: #fff;
    border: rgba(0,0,0,0);
}
.modal-message .modal-dialog {
    width: 300px;
}
.modal-message .modal-body, .modal-message .modal-footer, .modal-message .modal-header, .modal-message .modal-title {
    background: 0 0;
    border: none;
    margin: 0;
    padding: 0 20px;
    text-align: center!important;
}

.modal-message .modal-title {
    font-size: 17px;
    color: #737373;
    margin-bottom: 3px;
}

.modal-message .modal-body {
    color: #737373;
}

.modal-message .modal-header {
    color: #fff;
    margin-bottom: 10px;
    padding: 15px 0 8px;
}
.modal-message .modal-header .fa, 
.modal-message .modal-header 
.glyphicon, .modal-message 
.modal-header .typcn, .modal-message .modal-header .wi {
    font-size: 30px;
}

.modal-message .modal-footer {
    margin: 25px 0 20px;
    padding-bottom: 10px;
}

.modal-backdrop.in {
    zoom: 1;
    filter: alpha(opacity=75);
    -webkit-opacity: .75;
    -moz-opacity: .75;
    opacity: .75;
}
.modal-backdrop {
    background-color: #fff;
}

.modal-message.modal-info .modal-header {
    color: #57b5e3;
    border-bottom: 3px solid #57b5e3;
}
                </style>
<div class="page-content container note-has-grid">
    <ul class="nav nav-pills p-3 bg-primary mb-3 rounded-pill align-items-center">
        <li class="nav-item">
            <a href="" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2 active" id="all-category">
                <i class="icon-layers mr-1"></i><span class="d-none d-md-block">All Notes</span>
            </a>
        </li>
        
        <li class="nav-item ml-auto">
            <a href="" class="nav-link text-white text-end" data-bs-toggle="modal" data-bs-target="#modal-info" id="add-notes"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
</svg></a>
        </li>
    </ul>
    <div class="tab-content bg-transparent">
        <div id="note-full-container" class="note-has-grid row">

            <div class="col-md-4 single-note-item all-category note-important" style="">
                <div class="card card-body bg-primary-subtle">
                    <span class="side-stick"></span>
                    
                    <div class="note-content">
                        <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">Review</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="mr-1"><i class="bi bi-trash"></i></span>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
        </div>
         <!--Info Modal Templates-->
    <div id="modal-info" class="modal modal-message modal-info fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="modal-title">Add Notes</div>
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <form action="" id="addnotesmodalTitle" method="POST">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="note-description">
                                            <textarea id="note-has-description" name="note" class="form-control" minlength="60" placeholder="Add your notes..." rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" name="addnote" class="btn btn-primary" data-bs-dismiss="modal">Add</button>
                </div>
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
    </div>
    <!--End Info Modal Templates-->
        </section>
        </div>

        <!-- Footer
        <footer class="footer bg-body-tertiary">
        <div class="container">
            <div class="row">
            <div class="col">
                <div class="py-3">
                Built by <a href="https://notedaily.com/" class="link-secondary text-decoration-none">notedaily</a><span class="text-primary">&#9829;</span>
                </div>
            </div>
            </div>
        </div>
        </footer> -->

</body>
</html>