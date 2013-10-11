window.onload=function(){
	console.log("meow");

	var request = new XMLHttpRequest();
	var url = "favorite_creation.php";

	request.open("GET", url, true);
	request.send();

	request.onreadystatechange = function(e) {
		if (request.readyState === 4) {
			var jsonData = JSON.parse(request.responseText);
			console.log(jsonData);
			$("#favorites").append("Flavor: ",jsonData['flavor'], "<br>", "Frosting: ", jsonData['frosting'], "<br>", "Filling: ", jsonData['filling'], "<br>", "Toppings: ", jsonData['toppings']); 
			//currently can only take one flavor per cupcake
		}
	}
}