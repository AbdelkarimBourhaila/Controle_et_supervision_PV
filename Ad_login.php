<!-- https://www.youtube.com/watch?v=fsQoA7NMhsU&t=2s&ab_channel=MahmudChoudhury -->

<?php include('Ad_Login_server.php') ?>


<!DOCTYPE html>
<html>
<head>
  <title>ISESE</title>

  <style>

  * {
  margin: 0px;
  padding: 0px;
}

body {

  font-size: 100% ;         
  transform: scale(0.88);
  transform-origin: center center;
  background-image: url("PV.png");
  background-size: cover; 
  background-position: center center;
  background-size: 100% 100%;
  background-repeat: no-repeat;



  
  /* background: #F8F8FF; */
  /* background-size: 800px 600px; 
  /* opacity:0.8; */
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #0c6980;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}

.Image_1 {
   position: fixed;
   left: -10px;
   top: -30px;
}

.Image_2 {
   position: fixed;
   right: 0px;
   top: 10px;
}
/* 
.Image_3 {
   position: absolute;
   right: -100px;
   top: -100px;
} */


form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
  
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #0c6980;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}

  h1{
   text-align: center;
   color:#ffffff;
   background-color: #0c6980; 
   border-radius: 10px;
   font-size: 2em;
   width: fit-content;
   height: 50px;
   padding: 10px 28px 10px 28px;
   margin:  0px auto;
   border: 2px solid black;
   margin-top: 40px;
   font-size: 31px;
   text-shadow: 2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, -2px 0 0 black, 2px 2px 0 black, 2px -2px 0 black, -2px 2px 0 black, -2px -2px 0 black;
}

h5{
   text-align: center;
   color:black;
   margin:  0rem -10rem 0rem -10rem;
    padding: 0px 0px 10px 0px;
	font-size: 18px;


}
</style>


  
</head>
<body>
<!-- <img class="Image_3" src="PV.png" width="100" height="200" alt="Image_3" >   -->

<div >
        <center>
            <h5>
			Université Hassan 1er  <br>
				Faculté des Sciences et techniques Settat <br>
				Cycle Ingénieur : Ingénierie des systèmes électriques et systèmes embarqués <br>
				Module : Développement de projets professionnels  
			</h5>
        </center>
    </div>

		<h1 > Plateforme de contrôle d'un PPV </h1>


  <div class="header">
  
  	<h2>Connexion</h2>
  </div>
	 
  <form method="post" action="Ad_login.php">
  	<?php include('Ad_Login_errors.php'); ?>
  	<div class="input-group">
  		<label>Nom d'utilisateur</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Mot de passe</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Connexion</button>
  	</div>
  	<p>
  		Vous n’êtes pas encore membre? <a href="Ad_Login_register.php">Inscrivez-vous</a>
  	</p>
  </form>

  <img class="Image_1" src="Fst Gouche.png" width="170" height="210" alt="Image_1" > 
  <img  class="Image_2"  src="Fst droit.png" width="160" height="130" alt="Image_2">


</body>
</html>
