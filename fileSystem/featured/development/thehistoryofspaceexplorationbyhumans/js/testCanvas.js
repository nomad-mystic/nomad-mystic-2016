 // var canvas = document.getElementById('canvas'),
 //        ctx = canva.getContext('2d');

 //    var Point = function (x, y) {
 //        this.startX = x;
 //        this.startY = y;
 //    };
 //    var points = [new Point(1, 2), 
 //                  new Point(10, 20), 
 //                  new Point(30, 30), 
 //                  new Point(40, 80), 
 //                  new Point(100, 100), 
 //                  new Point(120, 100)];

 //    //goto first point
 //    ctx.strokeStyle = "black";
 //    ctx.moveTo(points[0].startX, points[0].startY);

 //    var counter = 1,
 //    inter = setInterval(function() {
 //        //create interval, it will
 //        //iterate over pointes and when counter > length
 //        //will destroy itself
 //        var point = points[counter++];
 //        ctx.lineTo(point.startX, point.startY); 
 //        ctx.stroke();
 //        if (counter >= points.length) {
 //           clearInterval(inter);
 //        }
 //        console.log(counter);
 //    }, 500);
 //    ctx.stroke();

var drawCirlces = function() {
	var canvas = document.getElementById('canvas'),
        ctx = canvas.getContext('2d');

	ctx.strokeStyle = 'white';
	for(var j=0; j < 100; j++) {
		ctx.beginPath();

		var x = Math.floor(400 ); 
	    var y = Math.floor(400); 
	    var radius = 7;
	    var startAngle = 0; // Starting point on circle
	    var endAngle = Math.PI * 2;
	    console.log(x);
	    console.log(y);
	    if (x % 2 === 0) {
	    	console.log('Thank You 1')
		    var translateX = x + 50 * Math.random();
		    var translateY = y + 5 * Math.random();
		    ctx.translate(x,y);
		    ctx.arc(x, y, radius, startAngle, endAngle, false);
		    	
		    ctx.fill();
		    ctx.stroke();
		} else if (x % 3 === 0) {
	    	console.log('Thank You 2');
	    	var translateX = x - 10 * Math.random();
	    	var translateY = y + 4 * Math.random();
	    	ctx.translate(x,y);
	    	ctx.arc(x, y, radius, startAngle, endAngle, false);
	    	
	    	ctx.fill();
	        ctx.stroke();


	    } else if (x % 5 === 0) {
	    	console.log('Thank You 3');
	    	var translateX = x + 10 * Math.random();
	    	var translateY = y + 9 * Math.random();
	    	ctx.translate(x,y);
	    	ctx.arc(x, y, radius, startAngle, endAngle, false);
	    	
	    	ctx.fill();
	        ctx.stroke();

		} else { 
	    	console.log('Thank You 4');
	    	var translateX = x + 7 * Math.random();
	    	var translateY = y - 5 * Math.random();
	    	ctx.translate(x,y);
	    	ctx.arc(x, y, radius, startAngle, endAngle, false);
	    	
	    	ctx.fill();
	        ctx.stroke();

	    }
	} // End First For loop 
/////////////////////////////////////////////////////////////////////
// THis is going to be the second line plot 
	for(var i=0; i < 100; i++) {
		ctx.beginPath();

		var x = 200 + i;                                                                                                                                                                              * Math.random()); 
	    var y = 200 * i; 
	    var radius = 7;
	    var startAngle = 0; // Starting point on circle
	    var endAngle = Math.PI * 2;
	    console.log(x);
	    console.log(y);
	    if (i < 20) {
	    	if (x % 2 === 0) {
	    	console.log('Thank2 You 1')
		    var translateX = x + 20 * Math.random();
		    var translateY = y + 40 * Math.random();
		    ctx.translate(x,y);
		    ctx.arc(x, y, radius, startAngle, endAngle, false);
		    	
		    ctx.fill();
		    ctx.stroke();
			} else if (x % 3 === 0) {
		    	console.log('Thank2 You 2');
		    	var translateX = x - 10 * Math.random();
		    	var translateY = y + 5 * Math.random();
		    	ctx.translate(x,y);
		    	ctx.arc(x, y, radius, startAngle, endAngle, false);
		    	
		    	ctx.fill();
		        ctx.stroke();


		    } else if (x % 5 === 0) {
		    	console.log('Thank2 You 3');
		    	var translateX = x + 10 * Math.random();
		    	var translateY = y + 11 * Math.random();
		    	ctx.translate(x,y);
		    	ctx.arc(x, y, radius, startAngle, endAngle, false);
		    	
		    	ctx.fill();
		        ctx.stroke();

			} else { 
		    	console.log('Thank2 You 4');
		    	var translateX = x + 7 * Math.random();
		    	var translateY = y + 5 * Math.random();
		    	ctx.translate(x,y);
		    	ctx.arc(x, y, radius, startAngle, endAngle, false);
		    	
		    	ctx.fill();
		        ctx.stroke();

		    }
		} else {
			if (x % 2 === 0) {
		    	console.log('Thank2 You 1-2')
			    var translateX = x + 2 * Math.random();
			    var translateY = y + 1 * Math.random();
			    ctx.translate(x,y);
			    ctx.arc(x, y, radius, startAngle, endAngle, false);
			    	
			    ctx.fill();
			    ctx.stroke();
			} else if (x % 3 === 0) {
		    	console.log('Thank2 You 2-2');
		    	var translateX = x - 2 * Math.random();
		    	var translateY = y + 5 * Math.random();
		    	ctx.translate(x,y);
		    	ctx.arc(x, y, radius, startAngle, endAngle, false);
		    	
		    	ctx.fill();
		        ctx.stroke();


		    } else if (x % 5 === 0) {
		    	console.log('Thank2 You 3-2');
		    	var translateX = x + 6 * Math.random();
		    	var translateY = y + 9 * Math.random();
		    	ctx.translate(x,y);
		    	ctx.arc(x, y, radius, startAngle, endAngle, false);
		    	
		    	ctx.fill();
		        ctx.stroke();

			} else { 
		    	console.log('Thank2 You 4-2');
		    	var translateX = x + 7 * Math.random();
		    	var translateY = y + 5 * Math.random();
		    	ctx.translate(x,y);
		    	ctx.arc(x, y, radius, startAngle, endAngle, false);
		    	
		    	ctx.fill();
		        ctx.stroke();

		    }
		}// End if i < 20
	} // End First For loop 
} // End drawCircles 
drawCirlces();