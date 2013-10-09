window.onload = function(){
	var pictures = form.getElementsByTagName("img"); //grab all the pictures in the form
	for(var x = 0; x < pictures.length; x++){
		if (x === 0){
			pictures[x].setAttribute("class", "selected"); //set the first picture as default
		}
		pictures[x].addEventListener('click', addClassName, false); //create a click listener for all the images
	}
	var resetButton = document.getElementById("resetCup"); //grab the personalize button
	resetButton.addEventListener('click', resetCupcake, true); //and a click listener
	var clearTopButton = document.getElementById("clearTop");
	clearTopButton.addEventListener('click', clearToppings, true);
};


function addClassName(){
	var pictures = form.getElementsByTagName("img"); //select the images
	for(var x = 0; x < pictures.length; x++){
		if(pictures[x].getAttribute("class")==="selected"){ //check if any image is selected
			pictures[x].removeAttribute("class"); //unselect it
			break;
		}
	}
	this.setAttribute("class", "selected"); //select new image
}

function resetCupcake(){
	var pictures = form.getElementsByTagName("img");
	for(var x = 0; x < pictures.length; x++){
		if(pictures[x].getAttribute("class")==="selected"){ //check which image is selected
			pictures[x].removeAttribute("class"); 
			break;
		}
	}
}

function clearToppins(){
	
}