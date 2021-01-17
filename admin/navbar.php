<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="./index.php">HAMRO VOTE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if($page=='home'){echo 'active';}?>">
                <a class="nav-link" href="..\index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($page=='voterlist'){echo 'active';}?>">
            <a   class="nav-link" href="..\voters_list.php" >Voter List</a>
            </li>
            <li class="nav-item <?php if($page=='registervoter'){echo 'active';}?>">
            <a class="nav-link" href="..\register.php">register voter</a>
            </li>
            <li class="nav-item <?php if($page=='about'){echo 'active';}?>">
            <a class="nav-link" href="..\about.php">About</a>
            </li>
                 <li class="nav-item <?php if($page=='result'){echo 'active';}?>">
                <a class="nav-link" href="..\resultpage.php">Election Result</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                result
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../testing/mayor_result.php">Mayor and Deputy Mayor</a>
                <a class="dropdown-item" href="../testing/ward1_result.php">WARD 1</a>
                <a class="dropdown-item" href="../testing/ward2_result.php">WARD 2</a>
                <a class="dropdown-item" href="../testing/ward3_result.php">WARD 3</a>
                <a class="dropdown-item" href="../testing/ward4_result.php">WARD 4</a>>



                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item <?php if($page=='voter'){echo 'active';}?>">
                <a href="..\voter-login.php" class="nav-link "><i class="fas fa-user" ></i>  Voter</a>

                </li>
                <li class='nav-item <?php if($page=='admin'){echo 'active';}?>'>
                <a href="index.php" class="nav-link"><i class="fas fa-user" ></i> Admin</a>
                </li>
            </ul>

        </div>
</nav>    