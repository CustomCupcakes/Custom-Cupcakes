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
			//currently can only take one topping per cupcake
		}
	}
	
		document.getElementById('favorites_button').onclick = function() {
			console.log('clicked favorites button');
			var fname=window.prompt("New Favorite","Please enter a title for your favorite");
			console.log(fname);
	}


		document.getElementById('update').onclick = function() {
			console.log('clicked update order');
			$('#order_button').before("Flavor ", "Quantity");
	}

}