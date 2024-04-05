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
            text-align: center;
            font-size: 48px;
            font-weight: normal;
            margin-left: 160px;
            padding: 0 30px;
            line-height: 80px;
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
    /*background-color: green;*/
    margin-left: 152px; /* Same as the width of the sidebar */
    position: center;
}
        
        
        
#block{
font-size: 20px;
/*width: max-content;*/
background-color: white;
height: 100%;
margin: 15px 15px 15px 15px;
}

#container1{
position: relative;
}

        
.button {
  background: #0074fc;
  color: #fff;
  padding: 12px;
  border: none;
  border-radius: 3px;
  text-decoration: none;
  font-family: Tahoma;
  font-size: 18px;
  line-height: 1;
  font-weight: 100;
  cursor: pointer;
}
        
        
    </style>
</head>
<body>
    <div id="header">
        <h1>Система управления вашим проектом</h1>
    </div>
    <!-- Side navigation -->
    <div class="sidenav">
	<a href="#">Главная</a>
	<a href="#">Создать</a>
	<a href="#">Справка</a>
	<a href="#">Аккаунт</a>
	</div>
    <!-- Page content -->
    <div class="main">
        <div id="block">
            <h3>Название задачи</h3>
            <textarea name="comment" readonly>Текст задачи</textarea>
            
            <!--    <textarea> <?php/* echo $text */?> </textarea>   Присвоение значения в текстовый блок  -->
            
            <p></p>
            <div>
                <button class="button">Удалить задачу</button>
            </div>
            
        </div>
    </div>
</body>
</html>