window.onload = function(){
var data = [
	{
		value:30, color:"#FF0000"
	},
	{
		value:30, color:"#00FF00"
	},
	{
		value:40, color:"#0000FF"
	}

]

var data2 = {
	labels : ["January","February","March","April","May","June","July"],
	datasets : [
		{
			fillColor : "rgba(220,220,220,0.5)",
			strokeColor : "rgba(220,220,220,1)",
			data : [65,59,90,81,56,55,40]
		},
		{
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			data : [28,48,40,19,96,27,100]
		}
	]
}
var canvas = document.getElementsByTagName("canvas");
for(var x = 0; x < canvas.length; x++){
	var ctx = canvas[x].getContext("2d");
	if(x===3){
		new Chart(ctx).Bar(data2);
		break;
	}
	new Chart(ctx).Pie(data);
}
};