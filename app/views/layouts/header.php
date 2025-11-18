<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sysco</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">Gallery</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>

            </ul>



            <form class="d-flex" role="search">
                <input class="form-control-sm me-2 " type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success me-5 btn-sm " type="submit">Find</button>
            </form>

            <?php
            if (!isset($_SESSION['user'])) { ?>

                <a href="/register">
                    <button class="btn btn-outline-dark me-2 btn-sm " type="submit">Regisetr</button>
                </a>
                <a href="/logIn">
                    <button class="btn btn-outline-primary  btn-sm " type="submit">LogIn</button>
                </a>


            <?php  } else {


                $firstLet =   $_SESSION['user']['firstName'];
                $lastLet = $_SESSION['user']['lastName'];
                $name =  strtoupper($firstLet[0] . $lastLet[0]); ?>

                <h5 class="me-2"> <?php echo $name ?></h5>
                <a href="/userProfile" class="me-2">Profile</a>

                <a href="/logout" class="me-2">Logout</a>
                <form action="/delectAccount" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');">
                    <button type="submit" class="me-2 btn btn-outline-dark">Delect Account</button>
                </form>

            <?php
            }

            ?>

        </div>

    </div>

</nav>