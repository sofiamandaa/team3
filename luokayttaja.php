<?php include('./rekisteroidy.html') ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Dining007 | Sign Up</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style>
		.header {
			background: #003366; /*vaihda värit*/
		}
		button[name=register_btn] {
			background: #003366;
		}
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - create user</h2>
	</div>
	
	<form method="post" action="./rekisteroidyajax.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Käyttätunnu</label>
			<input type="text" name="kayttajatunnus" value="<?php echo $kayttajatunnus; ?>">
		</div>
		<div class="input-group">
			<label>Sähköpostiosoite</label>
			<input type="text" name="sposti" value="<?php echo $sposti; ?>">
		</div>
		<div class="input-group">
			<label>Käyttäjätyyppi</label>
			<select name="kayttaja_tyyppi" id="kayttaja_tyyppi" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">Asiakas</option>
			</select>
		</div>
		<div class="input-group">
			<label>salasana</label>
			<input type="password" name="salasana">
		</div>
		<div class="input-group">
			<button type="submit" name="ok"> + Luo käyttäjä</button>
		</div>
	</form>
</body>
</html>