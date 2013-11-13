<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>new</title>
		<link rel="stylesheet" type="text/css" href="../css/reset.css">
		<link rel="stylesheet" href="../css/new.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		
	</head>
	<body>
		<div id="header">
			<h1>Hello!!</h1>
		</div>
		<?php 
			class Cat{
				public $isAlive = true;
				public $numLegs = 4;
				public function __construct($name){
					$this->name = $name;
				}
				public function meow(){
					return "Meow meow";
				}
			}

			$cat1 = new Cat("Vodevat");
			echo $cat1->meow();

		 ?>
	</body>
</html>