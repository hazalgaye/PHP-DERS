<html>
	 <head>
		<title>Giriş Sayfası</title>
		<style>
			body{background:#f0f0f0}
			.loginForm{
				background:white;
				width:250px;
				padding:10px 20px 10px 20px;
				margin: 20px auto;
				border:1px solid #d0d0d0;
				border-radius:10px;
			}
			.logo {
				text-align:center;
				margin-bottom:10px;
			}
			.logo img{
				width:150px;
			} 
			.btn{
				margin-top:20px;
			}
			.error{
				background : #ffd5d5;
				border:1px solid red;
				padding:10px;
				width:90%;
				margin-bottom:20px;
			}
		</style>
	 </head>
	 <body>
		<div class="loginForm">
			<form method="POST" action="kontrol.php" name="login">
				<div class="logo">
					<img src="logo.png" />
				</div>
				<?php
				if(isset($_GET["hata"])){
					if($_GET["hata"]==1){
						echo '
						<div class="error">
							Kullanıcı adı veya parolası hatalı
						</div>
						';
					}elseif($_GET["hata"]==2){
						echo '
						<div class="error">
							Yetkisiz kullanıcı girişi
						</div>
						';
						
					}
				}
				
				?>
				
				<div class="form-area">
					<label>Kullanıcı Adı :</label><br>
					<input type="text" name="username" />
				</div>
				<div class="form-area">
					<label>Parola :</label><br>
					<input type="password" name="pass" />
				</div>
				<input type="submit" class="btn" value="Giriş Yap" />
			</form>
		</div>
	 </body>
</html>