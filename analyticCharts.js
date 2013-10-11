window.onload = function(){
var Frostings = [
	{
		value: 30,
		color:"#ffffff"
	},
	{
		value : 50,
		color : "#8599ce"
	},
	{
		value : 100,
		color : "#56107b"
	},
	{
		value : 35,
		color : "#f8ef6e"
	},
	{
		value : 50,
		color : "#ec2c3a"
	},
	{
		value : 50,
		color : "#ce87a9"
	},
	{
		value : 60,
		color : "#ec7696"
	},	
	{
		value : 50,
		color : "#f8f8f8"
	},	
	{
		
		value : 50,
		color : "#694628"
	},
	{
		value : 50,
		color : "#4747D1"

	},
	{
		value : 50,
		color : "#FF0066"
	},
	{
		value : 50,
		color : "#33CC33"
	},	
	{
		value : 50,
		color : "#990000"
	},	
	{
		
		value : 90,
		color : "#003399"
	},
	{
		value : 50,
		color : "#339966"
	},
	{
		value : 60,
		color : "#993366"
	},	
	{
		value : 50,
		color : "#666699"
	},	
	{
		
		value : 50,
		color : "#CC99FF"
	},
	{
		value : 50,
		color : "#FFFF66"

	},
	{
		value : 50,
		color : "#3366CC"
	},
	{
		value : 50,
		color : "#669900"
	},	
	{
		value : 50,
		color : "#FF0066"
	},	
	{
		
		value : 90,
		color : "#6600CC"
	}
			
]


var Flavors = [
	{
		value: 30,
		color:"#ffffff"
	},
	{
		value : 50,
		color : "#8599ce"
	},
	{
		value : 100,
		color : "#56107b"
	},
	{
		value : 35,
		color : "#f8ef6e"
	},
	{
		value : 50,
		color : "#ec2c3a"
	},
	{
		value : 50,
		color : "#ce87a9"
	},
	{
		value : 60,
		color : "#ec7696"
	},	
	{
		value : 50,
		color : "#f8f8f8"
	},	
	{
		
		value : 50,
		color : "#694628"
	},
	{
		value : 50,
		color : "#4747D1"

	},
	{
		value : 50,
		color : "#FF0066"
	},
	{
		value : 50,
		color : "#33CC33"
	},	
	{
		value : 50,
		color : "#990000"
	},	
	{
		
		value : 90,
		color : "#003399"
	}
			
]

var Fillings = [
	{
		value: 30,
		color:"#ffffff"
	},
	{
		value : 50,
		color : "#8599ce"
	},
	{
		value : 100,
		color : "#56107b"
	},
	{
		value : 50,
		color : "#f8ef6e"
	},
	{
		value : 50,
		color : "#ec2c3a"
	},
	{
		value : 50,
		color : "#ce87a9"
	},
	{
		value : 50,
		color : "#ec7696"
	},	
	{
		value : 50,
		color : "#f8f8f8"
	},	
	{
		
		value : 50,
		color : "#694628"
	}
			
]

var data2 = {
	labels : ["Sprinkles","Mini Chocolate Chips","Mini Marshmellows","Bacon",
		   "Oreo Bits","Twix Bits","Butterfiner Bits", "Snicker Bits", "Skittles", "Craisins",
		    "Marascchino Cherries", "Gummy Bears", "Pop Rocks"],
	datasets : [
		{
			fillColor :  "#f8ef6e",
			data : [65,59,90,81,56,55,40,5,34,99,105,23,69]
		}
	]
}


var canvas = document.getElementsByTagName("canvas");
for(var x = 0; x < canvas.length; x++){
	var ctx = canvas[x].getContext("2d");
	if(x==0){
		new Chart(ctx).Pie(Flavors);
	}
	if(x==1){
		new Chart(ctx).Pie(Fillings);
	}
	if(x==2){
		new Chart(ctx).Pie(Frostings);
	}
	if(x===3){
		new Chart(ctx).Bar(data2);
	}
	
}
};