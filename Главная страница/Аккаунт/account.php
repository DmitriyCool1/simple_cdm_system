<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <title>Управление проектом</title>
    <style>
        body {
            background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url(01.jpg);
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
            color: #505050;
            font: 14px 'Segoe UI', tahoma, arial, helvetica, sans-serif;
        page-break-inside: avoid
       }


        #header {
            position: sticky;
            overflow-x: hidden;
            background: #efefef;
            padding: 0;

        }


        h1 {
            position: sticky;
            text-align: left;
            font-size: 48px;
            margin-left: 160px;
            padding: 0 30px;
            line-height: 80px;

            font-family: 'Comfortaa';
            letter-spacing: 4px;
            word-spacing: 0px;
            color: #787878;
            font-weight: bold;
            text-decoration: none;
            font-style: normal;
            font-variant: normal;
            text-transform: capitalize;



        }


        p {
            font-size: 20px;
            /*color: #fff;
            background: #969696;*/
            padding: 0 30px;
            line-height: 50px;
        }


/* The sidebar menu */
.sidenav {
    height: 100%; /* Full-height: remove this if you want "auto" height */
    width: 160px; /* Set the width of the sidebar */
    position: fixed; /* Fixed Sidebar (stay in place on scroll) */
    z-index: 1; /* Stay on top */
    top: 0; /* Stay at the top */
    left: 0;
    background-color: #111; /* Black */
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 20px;
}

/* The navigation menu links */
.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
    color: #f1f1f1;
}

/* Style page content */
/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
        
#author{
display: flex;  
align-items: flex-end;
position:absolute; bottom:0px;
}
        
.main {
    height: 100%;
    top: 224px;
    background-color: #DCDCDC;
    margin-left: 152px; /* Same as the width of the sidebar */
    position: center;
}
        
        
        
#block{
font-size: 20px;
/*width: max-content;*/
position: relative;
background-color: white;
height: 100%;
padding: 0 10px;
margin: 15px 15px 15px 15px;
}

#container1{
position: relative;
}

</style>
</head>
<body>
    <div id="header">
        <h1>PROЕКТ</h1>
    </div>
    <!-- Side navigation -->
    <div class="sidenav">
        <a href="../index.php">Главная</a>
        <a href="../Создать/create.php">Создать</a>
        <a href="../Справка/spravka.html">Справка</a>
        <a href="account.php">Аккаунт</a>
        <a href="../../get_news_for_the_user.php">Новости</a>
        <a href="../../view_created_tasks.php">Мои задания</a>
    </div>
    <!-- Page content -->
    <div class="main">
        <div id="block">
            <p>Логин: <?php echo $_SESSION['username']; ?></p>
            <p>Электронная почта: <?php echo $_SESSION['email']; ?></p>
        </div>
    </div>
</body>
</html>
