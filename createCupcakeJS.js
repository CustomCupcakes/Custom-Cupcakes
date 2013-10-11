window.onload = function(){

	var request3 = new XMLHttpRequest();
	var url3 = "get_session.php";
	var string = '';
	var session_id = 0;

	request3.open("GET", url3, false);
	request3.send();

if (request3.status === 200) { //200 is an HTTP status code.
  session_id = parseInt(request3.responseText); //print resp txt to console
}



		var request2 = new XMLHttpRequest();
		var url2 = "call_favorites.php?user=" + session_id;
		var array;
		console.log(url2);
		request2.open("GET", url2, true);
		request2.send();

		request2.onreadystatechange = function(e) {

			if (request2.readyState === 4) {
				console.log(request2.responseText);
				var array = JSON.parse(request2.responseText);
				for (var x = 0; x < array.length; x++){
							var div = document.createElement('div');
							var title = document.createTextNode(array[x].title);
							var img = document.createElement('img');
							img.src = 'add2.jpg';
							img.width= 25;
							img.height = 15;
							div.appendChild(title);
							div.appendChild(img);
							$('#favorites').append(div);
					}
				
			}
		}
			

		//var box = document.getElementById('favorites');
		//var imgs = box.getElementsByTagName('img');
		//imgs.addEventListener('click', addFavoritesToOrder, false);


		document.getElementById('favorites_button').onclick = function() {
			console.log('clicked favorites button');
		    var favorite_object = new Favorite();
			favorite_object.title=window.prompt("New Favorite","Please enter a title for your favorite");
			favorite_object.userID = session_id;
				var flavor = document.getElementById("flavor");
				var pictures = flavor.getElementsByTagName("div"); //select the images
				for(var x = 0; x < pictures.length; x++){
					if(pictures[x].getAttribute("class")==="selected"){ 
						//console.log("FOUND");
						favorite_object.flavor = pictures[x].getElementsByTagName("p")[0].innerHTML;
					}
				}
			var filling = document.getElementById("filling");
			var pictures2 = filling.getElementsByTagName("div");
			for(var y = 0; y < pictures2.length; y++){
					if(pictures2[y].getAttribute("class")==="selected"){ 
						//console.log("FOUND");
						favorite_object.filling = pictures2[y].getElementsByTagName("p")[0].innerHTML;
					}
				}

			var frosting = document.getElementById("frosting");
			var pictures3 = frosting.getElementsByTagName("div");
			for(var z = 0; z < pictures3.length; z++){
					if(pictures3[z].getAttribute("class")==="selected"){ 
						//console.log("FOUND");
						favorite_object.frosting = pictures3[z].getElementsByTagName("p")[0].innerHTML;
					}
				}

			favorite_object.toppings = new Array();
			var toppings = document.getElementById("toppings");
			var buttons =  toppings.getElementsByTagName("input");
			for(var b = 0; b < buttons.length; b++){
				if(buttons[b].checked === true){
					favorite_object.toppings.push(buttons[b].value);
					}
				}
				
		    console.log(favorite_object); 
		    string = (JSON.stringify(favorite_object));
		    	
		    	var request4 = new XMLHttpRequest();
				var url4 = "insert_favorites.php?string=" + string;
				console.log(url4);
				request4.open("GET", url4, true);
				request4.setRequestHeader("Content-type","application/json",true);
				request4.send(string);

				request4.onreadystatechange = function(e) {

		if (request4.readyState === 4) {
			console.log(request4.responseText);
		}

	}
	}

			function Favorite() {
			var userID;
			var title;
			var flavor;
			var filling;
			var frosting;
			var toppings;
		}




	//start carter code
	var flavor = document.getElementById("flavor");
	var frosting = document.getElementById("frosting");
	var filling = document.getElementById("filling");
	var flavorPictures = flavor.getElementsByTagName("div"); //grab all the pictures in the form
	var frostingPictures = frosting.getElementsByTagName("div");
	var fillingPictures = filling.getElementsByTagName("div");

	for(var x = 0; x < flavorPictures.length; x++){
		flavorPictures[x].addEventListener('click', addClassNameFlavor, false); //create a click listener for all the images
	}

	for(var x = 0; x < frostingPictures.length; x++){
		frostingPictures[x].addEventListener('click', addClassNameFrosting, false); //create a click listener for all the images
	}

		for(var x = 0; x < fillingPictures.length; x++){
		fillingPictures[x].addEventListener('click', addClassNameCanvas, false); //create a click listener for all the images
	}

	var resetButton = document.getElementById("resetCup"); //grab the personalize button
	resetButton.addEventListener('click', resetCupcake, true); //and a click listener
	var clearTopButton = document.getElementById("clearTop");
	clearTopButton.addEventListener('click', clearToppings, false);
	var order_button = document.getElementById('update');
	order_button.addEventListener('click', addCupcake, false);
	drawCircles();
	var orderedCupcakes = [];
};


function addClassNameFlavor(){
	var flavor = document.getElementById("flavor");
	var pictures = flavor .getElementsByTagName("div"); //select the images
	for(var x = 0; x < pictures.length; x++){
		if(pictures[x].getAttribute("class")==="selected"){ //check if any image is selected
			pictures[x].removeAttribute("class"); //unselect it
			break;
		}
	}
	this.setAttribute("class", "selected"); //select new image
}

function addClassNameFrosting(){
	var frosting = document.getElementById("frosting");
	var pictures = frosting .getElementsByTagName("div"); //select the images
	for(var x = 0; x < pictures.length; x++){
		if(pictures[x].getAttribute("class")==="selected"){ //check if any image is selected
			pictures[x].removeAttribute("class"); //unselect it
			break;
		}
	}
	this.setAttribute("class", "selected"); //select new image
}


function addClassNameCanvas(){
	var filling = document.getElementById("filling");
	var fillingPictures = filling.getElementsByTagName("div");
	for(var x = 0; x < fillingPictures.length; x++){
		if(fillingPictures[x].getAttribute("class")==="selected"){ //check if any image is selected
			fillingPictures[x].removeAttribute("class"); //unselect it
			break;
		}
	}
	this.setAttribute("class", "selected"); //select new image
}



function resetCupcake(){
	var flavor = document.getElementById("flavor");
	var frosting = document.getElementById("frosting");
	var filling = document.getElementById("filling");
	var flavorPictures = flavor.getElementsByTagName("div"); //grab all the pictures in the form
	var frostingPictures = frosting.getElementsByTagName("div");
	var fillingPictures = filling.getElementsByTagName("div");

	for(var x = 0; x < flavorPictures.length; x++){
		if(flavorPictures[x].getAttribute("class")==="selected"){ //check if any image is selected
			flavorPictures[x].removeAttribute("class"); //unselect it
			break;
		} 
	}

	for(var x = 0; x < frostingPictures.length; x++){
		if(frostingPictures[x].getAttribute("class")==="selected"){ //check if any image is selected
			frostingPictures[x].removeAttribute("class"); //unselect it
			break;
		} 		
	}

		for(var x = 0; x < fillingPictures.length; x++){
			if(fillingPictures[x].getAttribute("class")==="selected"){ //check if any image is selected
				fillingPictures[x].removeAttribute("class"); //unselect it
				break;
			} //create a click listener for all the images
	}

	clearToppings();
}

function clearToppings(){
	var toppings = document.getElementById("toppings");
	var buttons =  toppings.getElementsByTagName("input");
	for(var x = 0; x < buttons.length; x++){
		if(buttons[x].checked === true){
			buttons[x].checked = false;
		}
	}
}
function orderedCupcake(){
	var flavor;
	var filling;
	var frosting;
	var toppings;
}
function addCupcake(){
	var flavor = document.getElementById("flavor");
	var frosting = document.getElementById("frosting");
	var filling = document.getElementById("filling");
	var flavorPictures = flavor.getElementsByTagName("div"); //grab all the pictures in the form
	var frostingPictures = frosting.getElementsByTagName("div");
	var fillingPictures = filling.getElementsByTagName("div");
	var toppings = document.getElementById("toppings");
	var buttons =  toppings.getElementsByTagName("input");

	var flavorName;
	var frostingName;
	var fillingName;
	var toppingNames = [];

	for(var x = 0; x < flavorPictures.length; x++){
		if(flavorPictures[x].getAttribute("class")==="selected"){ 
			flavorName = flavorPictures[x].getElementsByTagName("p")[0].innerHTML;
			break;
		} 
	}

	for(var x = 0; x < frostingPictures.length; x++){
		if(frostingPictures[x].getAttribute("class")==="selected"){ 
			frostingName = frostingPictures[x].getElementsByTagName("p")[0].innerHTML;
			break;
		} 
	}

	for(var x = 0; x < fillingPictures.length; x++){
		if(fillingPictures[x].getAttribute("class")==="selected"){ 
			fillingName = fillingPictures[x].getElementsByTagName("p")[0].innerHTML;
			break;
		} 
	}

	for(var x = 0; x < buttons.length; x++){
		if(buttons[x].checked === true){
			toppingNames.push(buttons[x].innerHTML);
		}
	}

	var cake = new orderedCupcake;
	cake.flavor = flavorName;
	cake.filling = fillingName;
	cake.frosting = frostingName;
	cake.toppings = toppingNames;



	var quantity = document.getElementById("stepper").value;
	var div = document.createElement("div");
	var img = document.createElement("img");
	img.src = 'order_thumbnail.png';
	img.width = 25;
	img.height = 25;
	div.appendChild(img);
	var node=document.createTextNode(flavorName);
	var node2=document.createTextNode("       X       ");
	var node3=document.createTextNode(quantity);
	div.appendChild(node);
	div.appendChild(node2);
	div.appendChild(node3);
	var del = document.createElement('img');
	del.src = 'delete.png';
	del.width = 25;
	del.height = 25;
	div.appendChild(del);
	del.addEventListener('click', removeOrderedCupcake, false);
	div.addEventListener('click', selectOptions, false);
	$('#order_button').before(div);
	orderedCupcakes.push(cake);
	var len = orderedCupcakes.length;
	div.id = len;
}

function removeOrderedCupcake(){
	div = this.parentNode;
	orderedCupcakes.splice(div.id,1);
	div.setAttribute("style","display:none;")

}
function selectOptions(){
	var cake = orderedCupcakes[this.id];

	var flavor = document.getElementById("flavor");
	var frosting = document.getElementById("frosting");
	var filling = document.getElementById("filling");
	var flavorPictures = flavor.getElementsByTagName("div"); //grab all the pictures in the form
	var frostingPictures = frosting.getElementsByTagName("div");
	var fillingPictures = filling.getElementsByTagName("div");
	var toppings = document.getElementById("toppings");
	var buttons =  toppings.getElementsByTagName("input");

	for(var x = 0; x < flavorPictures.length; x++){
		if(flavorPictures[x].getElementsByTagName("p")[0].innerHTML===cake.flavor){ //check if any image is selected
			for(var y = 0; y < flavorPictures.length; y++){
				if(pictures[y].getAttribute("class")==="selected"){ //check if any image is selected
					pictures[y].removeAttribute("class"); //unselect it
					break;
				}
			}
			flavorPictures[x].setAttribute("class", "selected");
		} 
	}

	for(var x = 0; x < frostingPictures.length; x++){
		if(frostingPictures[x].getElementsByTagName("p")[0].innerHTML===cake.frosting){ //check if any image is selected
			for(var y = 0; y < frostingPictures.length; y++){
				if(frostingPictures[y].getAttribute("class")==="selected"){ //check if any image is selected
					frostingPictures[y].removeAttribute("class"); //unselect it
					break;
				}
			}
			frostingPictures[x].setAttribute("class", "selected");
		} 
	}

	for(var x = 0; x < fillingPictures.length; x++){
		if(fillingPictures[x].getElementsByTagName("p")[0].innerHTML===cake.filling){ //check if any image is selected
			for(var y = 0; y < fillingPictures.length; y++){
				if(fillingPictures[y].getAttribute("class")==="selected"){ //check if any image is selected
					fillingPictures[y].removeAttribute("class"); //unselect it
					break;
				}
			}
			fillingPictures[x].setAttribute("class", "selected");
		} 
	}

	for(var x = 0; x < buttons.length; x++){
		for(var y = 0; y < cake.toppings.length; y++){
			if(buttons[x].value === cake.toppings[y]){
				buttons[x].checked = true;
				break;
			}
		}
	}

}

function drawCircles(){
	var fillings = document.getElementsByTagName("canvas");
	for(var x = 0; x < fillings.length; x++){
		var color = fillings[x].id;
		var ctx=fillings[x].getContext("2d");
		ctx.fillStyle = color;
		ctx.beginPath();
		ctx.arc(145,60,60,0,2*Math.PI);
		ctx.closePath();
		ctx.fill();
	}

		function addFavoritesToOrder()	{
			console.log("clicked");
		}

}