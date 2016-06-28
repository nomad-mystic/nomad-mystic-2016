/*  Prgrammer = Keith Murphy 
	File = scripts.js
	Date Created = 4-2-2015
	Last Mod = 5-4-2015
*/
$(document).ready(function() {
//////////////////////////////////////////////////////////////////////
/* Code from Codepen 
http://codepen.io/jackrugile/pen/ohFbx
Jack Rugile
http://codepen.io/jackrugile/
*/
/* Smooth Trail */

	var smoothTrail = function(c, cw, ch){
		/* Initialize */
		this.init = function(){
			this.loop();
		};		
		// Variables
		var _this = this;
		this.c = c;
		this.ctx = c.getContext('2d');
		this.cw = cw;
		this.ch = ch;
		this.mx = 0;
		this.my = 0;
		//trail
		this.trail = [];
		this.maxTrail = 200;
		this.mouseDown = false;
		this.ctx.lineWidth = .1;
		this.ctx.lineJoin = 'round';
		this.radius = 1;
		this.speed = 0.4;
		this.angle = 0;
		this.arcx = 0;
		this.arcy = 0;
		this.growRadius = true;
		this.seconds = 0;
		this.milliseconds = 0;
		// Utility Functions
		this.rand = function(rMi, rMa){return ~~((Math.random()*(rMa-rMi+1))+rMi);};
		this.hitTest = function(x1, y1, w1, h1, x2, y2, w2, h2){return !(x1 + w1 < x2 || x2 + w2 < x1 || y1 + h1 < y2 || y2 + h2 < y1);};
		// Create Point
		this.createPoint = function(x, y){					
			this.trail.push({
		  		x: x,
		  		y: y						
			});	
		}
		// Update Trail
		this.updateTrail = function(){					
			if(this.trail.length < this.maxTrail){
		  		this.createPoint(this.arcx, this.arcy);
			}					
		    
			if(this.trail.length >= this.maxTrail){
		  		this.trail.splice(0, 1);
			}					
		};
		// Update Arc
		this.updateArc = function(){
			this.arcx = (this.cw/2) + Math.sin(this.angle) * this.radius;
			this.arcy = (this.ch/2) + Math.cos(this.angle) * this.radius;					
			var d = new Date();
			this.seconds = d.getSeconds();
			this.milliseconds = d.getMilliseconds();
			this.angle += this.speed*(this.seconds+1+(this.milliseconds/10000));
		    
			if(this.radius <= 1){
		  		this.growRadius = true;
			} 
			if(this.radius >= 200){
		  		this.growRadius = false;
			}
		    
			if(this.growRadius){
		  		this.radius += 1;	
			} else {
		  		this.radius -= 1;	
		 	}
		};
		// Render Trail
		this.renderTrail = function(){
			var i = this.trail.length;					
		    this.ctx.beginPath();
			while(i--){
		  		var point = this.trail[i];
		  		var nextPoint = (i == this.trail.length) ? this.trail[i+1] : this.trail[i];
		      
		  		var c = (point.x + nextPoint.x) / 2;
		  		var d = (point.y + nextPoint.y) / 2;						
		  		this.ctx.quadraticCurveTo(Math.round(this.arcx), Math.round(this.arcy), c, d);
		      
			}
			this.ctx.strokeStyle = 'hsla('+this.rand(170,200)+', 100%, '+this.rand(50, 75)+'%, 1)';	
			this.ctx.stroke();
			this.ctx.closePath();
		};			
		// Clear Canvas
		this.clearCanvas = function(){
		  //this.ctx.globalCompositeOperation = 'source-over';
		  //this.ctx.clearRect(0,0,this.cw,this.ch);
		    
		 	this.ctx.globalCompositeOperation = 'destination-out';
		 	this.ctx.fillStyle = 'rgba(0,0,0,.1)';
		 	this.ctx.fillRect(0,0,this.cw,this.ch);					
		 	this.ctx.globalCompositeOperation = 'lighter';
		};
		// Animation Loop
		this.loop = function(){
			var loopIt = function(){
		 		requestAnimationFrame(loopIt, _this.c);
		 		_this.clearCanvas();
		 		_this.updateArc();
		 		_this.updateTrail();
			 	_this.renderTrail();							
			};
			loopIt();				
		};
	};
	// Check Canvas Support
	var isCanvasSupported = function(){
		var elem = document.createElement('canvas');
		return !!(elem.getContext && elem.getContext('2d'));
	};
	// Setup requestAnimationFrame
	var setupRAF = function(){
		var lastTime = 0;
		var vendors = ['ms', 'moz', 'webkit', 'o'];
		for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x){
	  		window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
	  		window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame'] || window[vendors[x]+'CancelRequestAnimationFrame'];
		}
	  	if(!window.requestAnimationFrame){
	  		window.requestAnimationFrame = function(callback, element){
	   			var currTime = new Date().getTime();
	   			var timeToCall = Math.max(0, 16 - (currTime - lastTime));
	   			var id = window.setTimeout(function() { callback(currTime + timeToCall); }, timeToCall);
	   			lastTime = currTime + timeToCall;
	   			return id;
	  		};
	 	}
	  	if (!window.cancelAnimationFrame){
	  		window.cancelAnimationFrame = function(id){
	    		clearTimeout(id);
	  		};
		}
	};			
// Define Canvas and Initialize
	if(isCanvasSupported){
		var c = document.createElement('canvas');
		c.width = 400;
		c.height = 400;			
		var cw = c.width;
		var ch = c.height;	
		document.body.childNodes[6].childNodes[4].childNodes[9].appendChild(c);
		var cl = new smoothTrail(c, cw, ch);				
	    
		setupRAF();
		cl.init();
	}
////////////////////////////////Start Click events 
///////////////////////////////////////////////////////////////////////////////////
// Create opening click event that starts up the video 

	$('#openingClick').on('click', function(evnt) {
		evnt.preventDefault();
		
		// Fade out Spash page 
		$('#openSplash').fadeOut(2000);
		
		// Start up the video 
		var openVideo = document.getElementById('openVideo');
		playVideo();
		
		// Start Up the Music 
		music();
		
		// Changoing the CSS of the video to fixed after click 
		fixedVideo();

	});// End video click
// THis is going to start the animations 
	$('#openingClick').on('click', function(evnt) {
		starTime();
		lineTime();
	}); // End openClick 

// Create Click event to stop and start the audio 
	$('.soundControl').on('click', function(evnt) { 
		var soundCheckImage = $('.soundControlSpan');
        // grabs the audio#musicPlayer tag
		var music = evnt.view.document.body.childNodes[21];
		
		if (soundCheckImage.hasClass('glyphicon-volume-up')) {
			music.pause();
			soundCheckImage.removeClass('glyphicon-volume-up');
			soundCheckImage.addClass('glyphicon-volume-off');
					
		} else {
			music.play();
			soundCheckImage.removeClass('glyphicon-volume-off');
			soundCheckImage.addClass('glyphicon-volume-up');
		} // End if 
	}); // End on click for soundControl

// This is going to be the function that starts and stops audio and video 
	$('.videoAudioControl').on('click', function(evnt) {
		console.log(evnt);
		var videoAudioImage = $('.videoAudioControlSpan');
        // grabs the audio#musicPlayer tag
		var music = evnt.view.document.body.childNodes[21];
		var video = evnt.view.document.body.childNodes[6].childNodes[4].childNodes[9].childNodes[1];
		
		if (videoAudioImage.hasClass('glyphicon-play')) {
			video.pause();
			music.pause();
			videoAudioImage.removeClass('glyphicon-play');
			videoAudioImage.addClass('glyphicon-pause');
		} else {
			video.play();
			music.play();
			videoAudioImage.removeClass('glyphicon-pause');
			videoAudioImage.addClass('glyphicon-play');
		} // End if 
	}); // End videoAudioControl Click Event 
// This starts and stops the music when the Nav its toggled 
	// THis for the off-canvas menu 
	$(function() {
		$('.toggle-nav').on('click', function(evnt) {
			toggleNav(evnt);
		}); // End toggle-nav
	}); // End IIFE 
	
	var toggleNav = function(evnt) {
        console.log(evnt);
        // grabs the audio#musicPlayer tag
		var music = evnt.view.document.body.childNodes[21];
		var video = evnt.view.document.body.childNodes[6].childNodes[4].childNodes[9].childNodes[1];
		
		if ($('#site-wrapper').hasClass('show-nav')) {
			// Do things on Nav Close
			$('#site-wrapper').removeClass('show-nav');
			video.play();
			music.play();
		} else {
			// Do things on Nav Open
			$('#site-wrapper').addClass('show-nav');
			video.pause();
			music.pause(); 
		} // End if 
	}; // End toggleNav 
	
	// JSON Click Events 
	$('#history').on('click', function() {
		$(".current").removeClass("current");
  		$(this).addClass("current");
  		historyJSON();
	
	}); // End History JSON 
	
	// UnmannedSpacecraft 
	$('#unmanned').on('click', function(evnt) {
		$(".current").removeClass("current");
  		$(this).addClass("current");
  		unmannedSpacecraft();

	}); // End unmanned 
	
	// spaceStations 
	$('#spaceStations').on('click', function() {
		$(".current").removeClass("current");
  		$(this).addClass("current");
		spaceStations();
	
	}); // End spaceStations JSON 
	
	// Telescopes
	$('#telescopes').on('click', function() {
		$(".current").removeClass("current");
  		$(this).addClass("current");
  		telescopes();
	
	}); // End Telescopes 

	// Credits
	$('#credits').on('click', function(evnt) {
		$(".current").removeClass("current");
  		$(this).addClass("current");
		credits();
	
	}); // End contact form click
	
	// Contact
	$('#contact').on('click', function() {
		$(".current").removeClass("current");
  		$(this).addClass("current");
		contact();
	
	}); // End contact form click 
/////////////////////////// End Click events 
//////////////////////////////////////////////////////////////////////////////
// THis is going to set the timeing for the video to fade in the position fixed 
	var fixedVideo = function() {
		setTimeout(function() {
			$('video').addClass('addFixed');
		}, 2000); // setTimeout
	};// End fixedTime

// Start the loading time button 
	var startButton = function() {
		setTimeout(function() {
			// $('#openingClick').fadeOut('slow').html();
			$('#openingClick').fadeIn(2000).html('<a>' + 'Enter' + '</a>');
		}, 3000);// setTimeout
	};// End startButton 
/// This starts up the loading button animation
	startButton();

// Create play video stop start 
	var playVideo = function() {
		if (openVideo.paused) {
	    	openVideo.play(); 
		}
	    else {
	        openVideo.pause(); 
	    }
	}; // End Play Video 

// THis is going to be the audio on start up 
	var music = function() {
		var music = document.createElement('audio');
		
		document.body.appendChild(music);
		music.id = 'musicplayer';
		music.src = '_/audio/music.mp3';
		music.play();
		
		return music.currentTime;
	}; // End music Method 
/////////////////////////////////////////////////////////////////
// THis going to be the get JSON data from external files for populating the DOM 
// This is going to be the hisotry JSON File GET
	var historyJSON = function() {
		var fillSpace = document.getElementById('fillSpace');
		
		$.getJSON('_/json/history.json', function(data) {
			var output = '';
			
			for (var key in data) {
				if (data.hasOwnProperty(key)) {
					output += '<h1 class="historyH1">' + data[0].historyTitle + '</h1>';
					output += '<div class="flexhistoryImg">' + '<img src="'+ data[0].historyPicture + '">';
					output += '<p class="historyPara">' + data[0].infoHistory1 + '</p>' + '</div>';
					output += '<h2 class="historyH2">' + data[0].infoHistory2TitleH2 + '</h2>';
					output += '<p class="historyPara">' + data[0].infoHistory2 + '</p>';
					output += '<h2 class="historyH2">' + data[0].infoHistory3TitleH2 + '</h2>';
					output += '<p class="historyPara">' + data[0].infoHistory3 + '</p>';
					output += '<h2 class="historyH2">' + data[0].infoHistory4TitleH2 + '</h2>';
					output += '<p class="historyPara">' + data[0].infoHistory4 + '</p>';
					output += '<h2 class="historyH2">' + data[0].infoHistory5TitleH2 + '</h2>';
					output += '<p class="historyPara">' + data[0].infoHistory5 + '</p>';
					output += '<h2 class="historyH2">' + data[0].infoHistory6TitleH2 + '</h2>';
					output += '<p class="historyPara">' + data[0].infoHistory6 + '</p>';
					
					fillSpace.innerHTML = output;
				} // End if 
			} // End for 
		}); // end history GET JSON
	};// End history JSON Method  

// This is going to be the unmanned Carft JSON file GET
	var unmannedSpacecraft = function() {
		var fillSpace = document.getElementById('fillSpace');

		$.getJSON('_/json/unmannedSpacecraft.json', function(data) {
			var output = '';
			
			for (var key in data) {
				if (data.hasOwnProperty(key)) {
					output += '<div class="spaceStationFlex">';
					output += '<img src="'+ data[key].picutre + '">';
					output += '<div class="spaceStationFlexColumn">';
					output += '<h2 class="spaceStationsH2">' + data[key].unmannedTitle + '</h2>';
					output += '<p class="spaceStationsP">' + data[key].info1 + '</p>';
					output += '<p class="spaceStationsP">' + data[key].info2 + '</p>';
					output += '<p class="spaceStationsP">' + data[key].info3 + '</p>';
					output += '</div>'; // End FlexColumn 
					output += '</div>'; // End spaceStationFlex

					fillSpace.innerHTML = '<div id="spaceStations">' + '<h1>Unmanned Spacecraft</h1>' + output + '</div>';
				} // End if hasOwn
			} // End for 
		}); // end unmanned JSON
	}// End unmannedSpacecraft 
	
// This is going to be the Space Stations JSON file GET
	var spaceStations = function() {
		var fillSpace = document.getElementById('fillSpace');
	
		$.getJSON('_/json/spaceStations.json', function(data) {
			var output = '';
			
			for (var key in data) {
				if (data.hasOwnProperty(key)) {
					output += '<div class="spaceStationFlex">';
					output += '<img src="'+ data[key].picutre + '">';
					output += '<div class="spaceStationFlexColumn">';
					output += '<h2 class="spaceStationsH2">' + data[key].spaceStationTitle + '</h2>';
					output += '<p class="spaceStationsP">' + data[key].info1 + '</p>';
					output += '<p class="spaceStationsP">' + data[key].info2 + '</p>';
					output += '<p class="spaceStationsP">' + data[key].info3 + '</p>';
					output += '</div>'; // End FlexColumn 
					output += '</div>'; // End spaceStationFlex
					
					fillSpace.innerHTML = '<div id="spaceStations">' + '<h1>Space Stations</h1>' + output + '</div>';
				} // End if hasOwn
			} // End for 
		}); // end Space Stations JSON
	}; // end Space Stations method 

// This is going to be the Telescopes JSON file GET 
	var telescopes = function() {
		var fillSpace = document.getElementById('fillSpace');

		$.getJSON('_/json/telescopes.json', function(data) {
			var output = '';
			
			for (var key in data) {
				if (data.hasOwnProperty(key)) {
					output += '<div class="spaceStationFlex">';
					output += '<img src="'+ data[key].picutre + '">';
					output += '<div class="spaceStationFlexColumn">';
					output += '<h2 class="spaceStationsH2">' + data[key].telescopesTitle + '</h2>';
					output += '<p class="spaceStationsP">' + data[key].info1 + '</p>';
					output += '<p class="spaceStationsP">' + data[key].info2 + '</p>';
					output += '<p class="spaceStationsP">' + data[key].info3 + '</p>';
					output += '</div>'; // End FlexColumn 
					output += '</div>'; // End spaceStationFlex
					
					fillSpace.innerHTML = '<div id="spaceStations">' + '<h1>Space Telescopes</h1>' + output + '</div>';
				} // End if hasOwn
			} // End for 
		}); // end Telescopes  JSON
	} // End telescopes Method 
	
// This is going to be the credit JSON file GET 
	var credits = function() {
		$.getJSON('_/json/credits.json', function(data) {
			var output = '';
			
			for (var key in data) {
				if (data.hasOwnProperty(key)) {
					output += '<div class="creditsFlex">';
					output += '<a href="http://kurokawawonderland.jp/" target="_blank">' + '<img src="'+ data[0].inspirePicture + '">' + '</a>'; 
					output += '<p class="creditsPara">' + data[0].inspire + '</p>';
					output += '</div>'; // End creditsFlex

					output += '<div class="creditsFlex">';
					output += '<a href="http://www.discovery.com/" target="_blank">' + '<img src="'+ data[0].videoPicture + '">' + '</a>'; 
					output += '<p class="creditsPara">' + data[0].video + '</p>';
					output += '</div>'; // End creditsFlex			
					
					output += '<div class="creditsFlex">';
					output += '<a href="http://locirecords.com/news/d-v-s-comfort-zone-ep-119" target="_blank">' + '<img src="'+ data[0].musicPicture + '">' + '</a>'; 
					output += '<p class="creditsPara">' + data[0].music + '</p>';
					output += '</div>'; // End creditsFlex

					output += '<div class="creditsFlex">';
					output += '<a href="http://codepen.io/jackrugile/" target="_blank">' + '<img src="'+ data[0].codePenPicture + '">' + '</a>'; 
					output += '<p class="creditsPara">' + data[0].codePen + '</p>';
					output += '</div>'; // End creditsFlex

					output += '<div class="creditsFlex">';
					output += '<a href="http://www.wikipedia.org/" target="_blank">' + '<img src="'+ data[0].wikiPicture + '">' + '</a>'; 
					output += '<p class="creditsPara">' + data[0].wiki + '</p>';
					output += '</div>'; // End creditsFlex
					
					fillSpace.innerHTML = '<div id="creditsDiv">' + '<h1 class="creditsH1">Credits</h1>' + output + '</div>';
				} // End if hasOwn
			} // End for 
		}); // end credit JSON
	}; // End credits Method 
	
// THis is going to be the Contact AJAX 
	var contact = function() {
		// $("#contactForm").validate();
		var fillSpace = document.getElementById('fillSpace');
		var output = '';
		
		output += '<form id="contactForm">';
		output += '<h2>Contact Us here at Nomad Mystic\'s Study of Space</h2>'  + '<br>';
		output += '<p>First Name (required)</p>'  + '<br>';
		output += '<input type="text" name="firstName" required>'  + '<p>&nbsp;</p>';
		output += '<p>Last Name (required)</p>'  + '<br>';
		output += '<input type="text" name="lastName" required>'  + '<p>&nbsp;</p>';
		output += '<p>' + '<label for="email">E-Mail (required)</label>' + '</p>' + '<br>';
		output += '<input id="email" type="email" name="email" required>' + '<br>';
		output += '<p>Please let us know how you feel about space exporation</p>' + '<br>';
		output += '<textarea rows="4" cols="50" name="comment">' +'</textarea>' + '<br>';
		output += '<input type="submit" value="Submit">';
		output += '</form>';
		fillSpace.innerHTML = output;
	}; // End contact 
////////////////////////////////////////////////////////
// Start SVG anitmations 
	// Setting up timing var 
	var fast = 50000,
		mid = 60000,
		slow = 80000,
		slower = 90000;
	var lineSlow = 90000;
		
	// Create Context for Snap 
	var s = Snap('#starSVG');
	// Animation Machine
	var animation = {
		starAni1: function(star, speed) {
			setTimeout(function() {
				star.animate({
					opacity: 1
				}, speed, mina.easein);
			}, 50000);// setTimeout
		}, // End starAni1 
		starAni2: function(star, speed) {
			setTimeout(function() {
				star.animate({
					opacity: 1
				}, speed, mina.easein);
			}, 100000);// setTimeout
		}, // End starAni2
		starAni3: function(star, speed) {
			setTimeout(function() {
				star.animate({
					opacity: 1
				}, speed, mina.easein);
			}, 120000);// setTimeout
		}, // End starAni3
		starAni4: function(star, speed) {
			setTimeout(function() {
				star.animate({
					opacity: 1
				}, speed, mina.easein);
			}, 150000);// setTimeout
		}, // End starAni4
		lineAni1: function(line, speed) {
			setTimeout(function() {
				line.animate({
					opacity: 1
				}, speed, mina.easein);
			}, 200000);// setTimeout
		}, // End lineAni1
		lineAni2: function(line, speed) {
			setTimeout(function() {
				line.animate({
					opacity: 1
				}, speed, mina.easein);
			}, 220000);// setTimeout
		}, // End lineAni2
		lineAni3: function(line, speed) {
			setTimeout(function() {
				line.animate({
					opacity: 1
				}, speed, mina.easein);
			}, 250000);// setTimeout
		}, // End lineAni3
		lineAni4: function(line, speed) {
			setTimeout(function() {
				line.animate({
					opacity: 1
				}, speed, mina.easein);
			}, 300000);// setTimeout
		} // End lineAni4
	};// End animations 
	// Seting up the timing functions for onClick 
	var starTime = function() {
		// rightStar Ani
		animation.starAni3(rightStar1, slow);
		animation.starAni2(rightStar2, slow);
		animation.starAni1(rightStar3, fast);
		animation.starAni2(rightStar4, mid);
		animation.starAni1(rightStar5, slow);
		animation.starAni2(rightStar6, slow);
		animation.starAni1(rightStar7, mid);
		animation.starAni3(rightStar8, slow);
		animation.starAni1(rightStar9, slower);
		animation.starAni1(rightStar10, slower);
		animation.starAni3(rightStar11, mid);
		animation.starAni1(rightStar12, fast);
		animation.starAni2(rightStar13, mid);
		animation.starAni3(rightStar14, fast);
		animation.starAni1(rightStar15, mid);
		animation.starAni4(rightStar16, slow);
		animation.starAni3(rightStar17, mid);
		animation.starAni2(rightStar18, fast);
		animation.starAni3(rightStar19, mid);
		animation.starAni2(rightStar20, slow);
		animation.starAni3(rightStar21, mid);
		animation.starAni4(rightStar22, fast);
		animation.starAni3(rightStar23, mid);
		animation.starAni2(rightStar24, slow);
		animation.starAni3(rightStar25, slow);
		animation.starAni1(rightStar26, slow);
		animation.starAni2(rightStar27, mid);
		animation.starAni1(rightStar28, slower);
		animation.starAni3(rightStar29, slow);
		animation.starAni1(rightStar30, mid);
		animation.starAni2(rightStar31, slow);
		animation.starAni3(rightStar32, mid);
		animation.starAni4(rightStar33, slower);
		animation.starAni1(rightStar34, slow);
		animation.starAni3(rightStar35, mid);
		animation.starAni1(rightStar36, slow);
		animation.starAni1(rightStar37, slow);
		animation.starAni1(rightStar38, slow);
		animation.starAni3(rightStar39, fast);
		animation.starAni4(rightStar40, mid);
		animation.starAni1(rightStar41, slow);
		animation.starAni4(rightStar42, fast);
		animation.starAni3(rightStar43, mid);
		animation.starAni1(rightStar44, slower);
		animation.starAni2(rightStar45, slow);
		animation.starAni3(rightStar46, slower);
		animation.starAni1(rightStar47, fast);
		animation.starAni4(rightStar48, mid);
		animation.starAni3(rightStar49, slow);
		animation.starAni2(rightStar50, mid);
		animation.starAni4(rightStar51, slow);
		animation.starAni2(rightStar52, slow);
		animation.starAni4(rightStar53, slow);
		animation.starAni1(rightStar54, slow);
		animation.starAni1(rightStar55, slow);
		// leftStar Ani
		animation.starAni3(leftStar1, slow);
		animation.starAni2(leftStar2, slow);
		animation.starAni1(leftStar3, fast);
		animation.starAni2(leftStar4, mid);
		animation.starAni1(leftStar5, slow);
		animation.starAni2(leftStar6, slow);
		animation.starAni1(leftStar7, mid);
		animation.starAni3(leftStar8, slow);
		animation.starAni1(leftStar9, slower);
		animation.starAni1(leftStar10, slower);
		animation.starAni3(leftStar11, mid);
		animation.starAni1(leftStar12, fast);
		animation.starAni2(leftStar13, mid);
		animation.starAni3(leftStar14, fast);
		animation.starAni1(leftStar15, mid);
		animation.starAni4(leftStar16, slow);
		animation.starAni3(leftStar17, mid);
		animation.starAni2(leftStar18, fast);
		animation.starAni3(leftStar19, mid);
		animation.starAni2(leftStar20, slow);
		animation.starAni3(leftStar21, mid);
		animation.starAni4(leftStar22, fast);
		animation.starAni3(leftStar23, mid);
		animation.starAni2(leftStar24, slow);
		animation.starAni3(leftStar25, slow);
		animation.starAni1(leftStar26, slow);
		animation.starAni2(leftStar27, mid);
		animation.starAni1(leftStar28, slower);
		animation.starAni3(leftStar29, slow);
		animation.starAni1(leftStar30, mid);
		animation.starAni2(leftStar31, slow);
		animation.starAni3(leftStar32, mid);
		animation.starAni4(leftStar33, slower);
		animation.starAni1(leftStar34, slow);
		animation.starAni3(leftStar35, mid);
		animation.starAni1(leftStar36, slow);
		animation.starAni1(leftStar37, slow);
		animation.starAni1(leftStar38, slow);
		animation.starAni3(leftStar39, fast);
		animation.starAni4(leftStar40, mid);
		animation.starAni1(leftStar41, slow);
		animation.starAni4(leftStar42, fast);
		animation.starAni3(leftStar43, mid);
		animation.starAni1(leftStar44, slower);
		animation.starAni2(leftStar45, slow);
		animation.starAni3(leftStar46, slower);
		animation.starAni1(leftStar47, fast);
		animation.starAni4(leftStar48, mid);
		animation.starAni3(leftStar49, slow);
		animation.starAni2(leftStar50, mid);
		animation.starAni4(leftStar51, slow);
		animation.starAni2(leftStar52, slow);
		animation.starAni4(leftStar53, slow);
		animation.starAni1(leftStar54, slow);
	}; // End starTime 
	var lineTime = function() {
		animation.lineAni3(leftLine1, slow);
		animation.lineAni1(leftLine2, slow);
		animation.lineAni3(leftLine3, lineSlow);
		animation.lineAni2(leftLine4, slow);
		animation.lineAni1(leftLine5, slow);
		animation.lineAni4(leftLine6, slow);
		animation.lineAni1(leftLine7, slow);
		animation.lineAni4(leftLine8, slow);
		animation.lineAni2(leftLine9, slow);
		animation.lineAni3(leftLine10, lineSlow);
		animation.lineAni1(leftLine11, slow);
		animation.lineAni2(leftLine12, slow);
		animation.lineAni1(leftLine13, slow);
		animation.lineAni3(leftLine14, lineSlow);
		animation.lineAni4(leftLine15, slow);
		animation.lineAni3(leftLine16, slow);
		animation.lineAni1(leftLine17, lineSlow);
		animation.lineAni1(leftLine18, slow);
		animation.lineAni4(leftLine19, slow);
		animation.lineAni3(leftLine20, slow);
		animation.lineAni1(leftLine21, lineSlow);
		animation.lineAni3(leftLine22, slow);
		animation.lineAni1(leftLine23, slow);
		animation.lineAni3(leftLine24, lineSlow);
		animation.lineAni4(leftLine25, slow);
		animation.lineAni1(leftLine26, slow);
		animation.lineAni4(leftLine27, slow);
		animation.lineAni1(leftLine28, slow);
		animation.lineAni3(leftLine29, lineSlow);
		animation.lineAni1(leftLine30, slow);
		animation.lineAni4(leftLine31, slow);
		animation.lineAni1(leftLine32, lineSlow);
		animation.lineAni3(leftLine33, slow);
		animation.lineAni1(leftLine34, slow);
		animation.lineAni1(leftLine35, lineSlow);
		animation.lineAni3(leftLine36, slow);
		animation.lineAni4(leftLine37, slow);
		animation.lineAni3(leftLine38, slow);
		animation.lineAni2(leftLine39, lineSlow);
		animation.lineAni1(leftLine40, slow);
		animation.lineAni1(leftLine41, lineSlow);
		animation.lineAni1(leftLine42, slower);
		animation.lineAni2(leftLine43, slow);
		animation.lineAni3(leftLine44, slower);
		animation.lineAni2(leftLine45, slow);
		animation.lineAni3(leftLine46, slow);
		animation.lineAni4(leftLine47, lineSlow);
		animation.lineAni1(leftLine48, slower);
		animation.lineAni2(leftLine49, slow);
		animation.lineAni1(leftLine50, lineSlow);
		animation.lineAni3(leftLine51, slow);
		animation.lineAni4(leftLine52, slow);
		animation.lineAni1(leftLine53, lineSlow);
		animation.lineAni4(leftLine54, slow);
		animation.lineAni1(leftLine55, slower);
		animation.lineAni2(leftLine56, lineSlow);
		animation.lineAni1(leftLine57, slow);
		animation.lineAni1(leftLine58, lineSlow);
		animation.lineAni3(leftLine59, slow);
		animation.lineAni4(leftLine60, slow);
		animation.lineAni3(leftLine61, slow);
		animation.lineAni2(leftLine62, lineSlow);
		animation.lineAni1(leftLine63, slower);
		animation.lineAni1(leftLine64, slow);
		animation.lineAni2(leftLine65, slow);
		animation.lineAni4(leftLine66, slow);
		animation.lineAni4(leftLine67, lineSlow);
		animation.lineAni2(leftLine68, slow);
		animation.lineAni1(leftLine69, slow);
		animation.lineAni1(leftLine70, slow);
		animation.lineAni1(leftLine71, lineSlow);
		animation.lineAni3(leftLine72, slow);
		animation.lineAni1(leftLine73, slow);
		animation.lineAni1(leftLine74, lineSlow);
		animation.lineAni2(leftLine75, slow);
		animation.lineAni3(leftLine76, slow);
		animation.lineAni2(leftLine77, lineSlow);
		animation.lineAni1(leftLine78, slow);
		animation.lineAni4(leftLine79, slow);
		animation.lineAni3(leftLine80, slower);
		animation.lineAni4(leftLine81, lineSlow);
		animation.lineAni3(leftLine82, slow);
		animation.lineAni1(leftLine83, slow);
		animation.lineAni2(leftLine84, lineSlow);
		animation.lineAni1(leftLine85, slow);
		animation.lineAni3(leftLine86, slow);
		animation.lineAni2(leftLine87, slow);
		animation.lineAni4(leftLine88, lineSlow);
		animation.lineAni3(leftLine89, slow);
		animation.lineAni2(leftLine90, slow);
		animation.lineAni1(leftLine91, lineSlow);
		animation.lineAni3(leftLine92, slow);
		animation.lineAni2(leftLine93, lineSlow);
		animation.lineAni1(leftLine94, slow);
		animation.lineAni1(leftLine95, lineSlow);
		animation.lineAni3(leftLine96, slow);
		animation.lineAni1(leftLine97, slow);
		animation.lineAni3(leftLine98, lineSlow);
		animation.lineAni2(leftLine99, slow);
		animation.lineAni1(leftLine100, slow);
		animation.lineAni3(leftLine101, slow);
		animation.lineAni2(leftLine102, slow);
		animation.lineAni1(leftLine103, lineSlow);
		animation.lineAni2(leftLine104, slow);
		animation.lineAni3(leftLine105, slower);
		animation.lineAni2(leftLine106, slow);
		animation.lineAni1(leftLine107, lineSlow);
		animation.lineAni3(leftLine108, slow);
		animation.lineAni4(leftLine109, slow);
		animation.lineAni1(leftLine100, slow);
		animation.lineAni3(leftLine111, slow);
		animation.lineAni1(leftLine112, lineSlow);
		animation.lineAni3(leftLine113, slow);
		animation.lineAni2(leftLine114, slow);
		animation.lineAni1(leftLine115, slow);
		animation.lineAni3(leftLine116, lineSlow);
		animation.lineAni2(leftLine117, slow);
		animation.lineAni3(leftLine118, slow);
		animation.lineAni4(leftLine119, slow);
		animation.lineAni3(leftLine120, lineSlow);
		animation.lineAni2(leftLine121, slow);
		animation.lineAni3(leftLine122, slow);
		animation.lineAni4(leftLine123, slow);
		// rightLines 
		animation.lineAni1(rightLine1, slow);
		animation.lineAni1(rightLine2, slow);
		animation.lineAni3(rightLine3, lineSlow);
		animation.lineAni2(rightLine4, slow);
		animation.lineAni1(rightLine5, slow);
		animation.lineAni4(rightLine6, slow);
		animation.lineAni1(rightLine7, slow);
		animation.lineAni4(rightLine8, slow);
		animation.lineAni2(rightLine9, slow);
		animation.lineAni3(rightLine10, lineSlow);
		animation.lineAni1(rightLine11, slow);
		animation.lineAni2(rightLine12, slow);
		animation.lineAni1(rightLine13, slow);
		animation.lineAni3(rightLine14, lineSlow);
		animation.lineAni4(rightLine15, slow);
		animation.lineAni3(rightLine16, slow);
		animation.lineAni1(rightLine17, lineSlow);
		// animation.lineAni1(rightLine18, slow);
		animation.lineAni4(rightLine19, slow);
		animation.lineAni3(rightLine20, slow);
		animation.lineAni1(rightLine21, lineSlow);
		animation.lineAni3(rightLine22, slow);
		animation.lineAni1(rightLine23, slow);
		animation.lineAni3(rightLine24, lineSlow);
		animation.lineAni4(rightLine25, slow);
		animation.lineAni1(rightLine26, slow);
		animation.lineAni4(rightLine27, slow);
		animation.lineAni1(rightLine28, slow);
		animation.lineAni3(rightLine29, lineSlow);
		animation.lineAni1(rightLine30, slow);
		animation.lineAni4(rightLine31, slow);
		animation.lineAni1(rightLine32, lineSlow);
		animation.lineAni3(rightLine33, slow);
		animation.lineAni1(rightLine34, slow);
		animation.lineAni1(rightLine35, lineSlow);
		animation.lineAni3(rightLine36, slow);
		animation.lineAni4(rightLine37, slow);
		animation.lineAni3(rightLine38, slow);
		animation.lineAni2(rightLine39, lineSlow);
		animation.lineAni1(rightLine40, slow);
		animation.lineAni1(rightLine41, lineSlow);
		animation.lineAni1(rightLine42, slower);
		animation.lineAni2(rightLine43, slow);
		animation.lineAni3(rightLine44, slower);
		animation.lineAni2(rightLine45, slow);
		// animation.lineAni3(rightLine46, slow);
		// animation.lineAni4(rightLine47, lineSlow);
		animation.lineAni1(rightLine48, slower);
		animation.lineAni2(rightLine49, slow);
		animation.lineAni1(rightLine50, lineSlow);
		animation.lineAni3(rightLine51, slow);
		animation.lineAni4(rightLine52, slow);
		animation.lineAni1(rightLine53, lineSlow);
		animation.lineAni4(rightLine54, slow);
		animation.lineAni1(rightLine55, slower);
		animation.lineAni2(rightLine56, lineSlow);
		animation.lineAni1(rightLine57, slow);
		animation.lineAni1(rightLine58, lineSlow);
		animation.lineAni3(rightLine59, slow);
		animation.lineAni4(rightLine60, slow);
		animation.lineAni3(rightLine61, slow);
		animation.lineAni2(rightLine62, lineSlow);
		animation.lineAni1(rightLine63, slower);
		animation.lineAni1(rightLine64, slow);
		animation.lineAni2(rightLine65, slow);
		animation.lineAni4(rightLine66, slow);
		animation.lineAni4(rightLine67, lineSlow);
		animation.lineAni2(rightLine68, slow);
		animation.lineAni1(rightLine69, slow);
		animation.lineAni1(rightLine70, slow);
		animation.lineAni1(rightLine71, lineSlow);
		animation.lineAni3(rightLine72, slow);
		animation.lineAni1(rightLine73, slow);
		animation.lineAni1(rightLine74, lineSlow);
		animation.lineAni2(rightLine75, slow);
		animation.lineAni3(rightLine76, slow);
		animation.lineAni2(rightLine77, lineSlow);
		animation.lineAni1(rightLine78, slow);
		animation.lineAni4(rightLine79, slow);
		animation.lineAni3(rightLine80, slower);
		animation.lineAni4(rightLine81, lineSlow);
		animation.lineAni3(rightLine82, slow);
		animation.lineAni1(rightLine83, slow);
		animation.lineAni2(rightLine84, lineSlow);
		animation.lineAni1(rightLine85, slow);
		animation.lineAni3(rightLine86, slow);
		animation.lineAni2(rightLine87, slow);
		animation.lineAni4(rightLine88, lineSlow);
		animation.lineAni3(rightLine89, slow);
		animation.lineAni2(rightLine90, slow);
		animation.lineAni1(rightLine91, lineSlow);
		animation.lineAni3(rightLine92, slow);
		animation.lineAni2(rightLine93, lineSlow);
		animation.lineAni1(rightLine94, slow);
		animation.lineAni1(rightLine95, lineSlow);
		animation.lineAni3(rightLine96, slow);
		animation.lineAni1(rightLine97, slow);
		animation.lineAni3(rightLine98, lineSlow);
		animation.lineAni2(rightLine99, slow);
		animation.lineAni1(rightLine100, slow);
		animation.lineAni3(rightLine101, slow);
		animation.lineAni2(rightLine102, slow);
		animation.lineAni1(rightLine103, lineSlow);
		animation.lineAni2(rightLine104, slow);
		animation.lineAni3(rightLine105, slower);
		animation.lineAni2(rightLine106, slow);
		animation.lineAni1(rightLine107, lineSlow);
		animation.lineAni3(rightLine108, slow);
		animation.lineAni4(rightLine109, slow);
		animation.lineAni1(rightLine100, slow);
		animation.lineAni3(rightLine111, slow);
		animation.lineAni1(rightLine112, lineSlow);
		animation.lineAni3(rightLine113, slow);
		animation.lineAni2(rightLine114, slow);
		animation.lineAni1(rightLine115, slow);
		animation.lineAni3(rightLine116, lineSlow);
		animation.lineAni2(rightLine117, slow);
		animation.lineAni3(rightLine118, slow);
		animation.lineAni4(rightLine119, slow);
		animation.lineAni3(rightLine120, lineSlow);
		animation.lineAni2(rightLine121, slow);
		animation.lineAni3(rightLine122, slow);
		animation.lineAni4(rightLine123, slow);
	}; // lineTime
	
	// Creating the Variables 
	// Groups 
	var leftLines = $('#leftLines'),
		rightLines = $('#rightLines'),
		rightStars = $('#rightStars'),
		leftStars = $('#leftStars');
	
	// THis is the handlers for the rightStar Shapes 
	var rightStar1 = s.select('#rightStar1'),
		rightStar2 = s.select('#rightStar2'),
		rightStar3 = s.select('#rightStar3'),
		rightStar4 = s.select('#rightStar4'),
		rightStar5 = s.select('#rightStar5'),
		rightStar6 = s.select('#rightStar6'),
		rightStar7 = s.select('#rightStar7'),
		rightStar8 = s.select('#rightStar8'),
		rightStar9 = s.select('#rightStar9'),
		rightStar10 = s.select('#rightStar10'),
		rightStar11 = s.select('#rightStar11'),
		rightStar12 = s.select('#rightStar12'),
		rightStar13 = s.select('#rightStar13'),
		rightStar14 = s.select('#rightStar14'),
		rightStar15 = s.select('#rightStar15'),
		rightStar16 = s.select('#rightStar16'),
		rightStar17 = s.select('#rightStar17'),
		rightStar18 = s.select('#rightStar18'),
		rightStar19 = s.select('#rightStar19'),
		rightStar20 = s.select('#rightStar20'),
		rightStar21 = s.select('#rightStar21'),
		rightStar22 = s.select('#rightStar22'),
		rightStar23 = s.select('#rightStar23'),
		rightStar24 = s.select('#rightStar24'),
		rightStar25 = s.select('#rightStar25'),
		rightStar26 = s.select('#rightStar26'),
		rightStar27 = s.select('#rightStar27'),
		rightStar28 = s.select('#rightStar28'),
		rightStar29 = s.select('#rightStar29'),
		rightStar30 = s.select('#rightStar30'),
		rightStar31 = s.select('#rightStar31'),
		rightStar32 = s.select('#rightStar32'),
		rightStar33 = s.select('#rightStar33'),
		rightStar34 = s.select('#rightStar34'),
		rightStar35 = s.select('#rightStar35'),
		rightStar36 = s.select('#rightStar36'),
		rightStar37 = s.select('#rightStar37'),
		rightStar38 = s.select('#rightStar38'),
		rightStar39 = s.select('#rightStar39'),
		rightStar40 = s.select('#rightStar40'),
		rightStar41 = s.select('#rightStar41'),
		rightStar42 = s.select('#rightStar42'),
		rightStar43 = s.select('#rightStar43'),
		rightStar44 = s.select('#rightStar44'),
		rightStar45 = s.select('#rightStar45'),
		rightStar46 = s.select('#rightStar46'),
		rightStar47 = s.select('#rightStar47'),
		rightStar48 = s.select('#rightStar48'),
		rightStar49 = s.select('#rightStar49'),
		rightStar50 = s.select('#rightStar50'),
		rightStar51 = s.select('#rightStar51'),
		rightStar52 = s.select('#rightStar52'),
		rightStar53 = s.select('#rightStar53'),
		rightStar54 = s.select('#rightStar54'),
		rightStar55 = s.select('#rightStar55');
	// THis is going to be for the leftLines 
	var leftStar1 = s.select('#leftStar1'),
		leftStar2 = s.select('#leftStar2'),
		leftStar3 = s.select('#leftStar3'),
		leftStar4 = s.select('#leftStar4'),
		leftStar5 = s.select('#leftStar5'),
		leftStar6 = s.select('#leftStar6'),
		leftStar7 = s.select('#leftStar7'),
		leftStar8 = s.select('#leftStar8'),
		leftStar9 = s.select('#leftStar9'),
		leftStar10 = s.select('#leftStar10'),
		leftStar11 = s.select('#leftStar11'),
		leftStar12 = s.select('#leftStar12'),
		leftStar13 = s.select('#leftStar13'),
		leftStar14 = s.select('#leftStar14'),
		leftStar15 = s.select('#leftStar15'),
		leftStar16 = s.select('#leftStar16'),
		leftStar17 = s.select('#leftStar17'),
		leftStar18 = s.select('#leftStar18'),
		leftStar19 = s.select('#leftStar19'),
		leftStar20 = s.select('#leftStar20'),
		leftStar21 = s.select('#leftStar21'),
		leftStar22 = s.select('#leftStar22'),
		leftStar23 = s.select('#leftStar23'),
		leftStar24 = s.select('#leftStar24'),
		leftStar25 = s.select('#leftStar25'),
		leftStar26 = s.select('#leftStar26'),
		leftStar27 = s.select('#leftStar27'),
		leftStar28 = s.select('#leftStar28'),
		leftStar29 = s.select('#leftStar29'),
		leftStar30 = s.select('#leftStar30'),
		leftStar31 = s.select('#leftStar31'),
		leftStar32 = s.select('#leftStar32'),
		leftStar33 = s.select('#leftStar33'),
		leftStar34 = s.select('#leftStar34'),
		leftStar35 = s.select('#leftStar35'),
		leftStar36 = s.select('#leftStar36'),
		leftStar37 = s.select('#leftStar37'),
		leftStar38 = s.select('#leftStar38'),
		leftStar39 = s.select('#leftStar39'),
		leftStar40 = s.select('#leftStar40'),
		leftStar41 = s.select('#leftStar41'),
		leftStar42 = s.select('#leftStar42'),
		leftStar43 = s.select('#leftStar43'),
		leftStar44 = s.select('#leftStar44'),
		leftStar45 = s.select('#leftStar45'),
		leftStar46 = s.select('#leftStar46'),
		leftStar47 = s.select('#leftStar47'),
		leftStar48 = s.select('#leftStar48'),
		leftStar49 = s.select('#leftStar49'),
		leftStar50 = s.select('#leftStar50'),
		leftStar51 = s.select('#leftStar51'),
		leftStar52 = s.select('#leftStar52'),
		leftStar53 = s.select('#leftStar53'),
		leftStar54 = s.select('#leftStar54');
	// THis is going to be the handlers for the leftLines 
	var leftLine1 = s.select('#leftLine1'),
		leftLine2 = s.select('#leftLine2'),
		leftLine3 = s.select('#leftLine3'),
		leftLine4 = s.select('#leftLine4'),
		leftLine5 = s.select('#leftLine5'),
		leftLine6 = s.select('#leftLine6'),
		leftLine7 = s.select('#leftLine7'),
		leftLine8 = s.select('#leftLine8'),
		leftLine9 = s.select('#leftLine9'),
		leftLine10 = s.select('#leftLine10'),
		leftLine11 = s.select('#leftLine11'),
		leftLine12 = s.select('#leftLine12'),
		leftLine13 = s.select('#leftLine13'),
		leftLine14 = s.select('#leftLine14'),
		leftLine15 = s.select('#leftLine15'),
		leftLine16 = s.select('#leftLine16'),
		leftLine17 = s.select('#leftLine17'),
		leftLine18 = s.select('#leftLine18'),
		leftLine19 = s.select('#leftLine19'),
		leftLine20 = s.select('#leftLine20'),
		leftLine21 = s.select('#leftLine21'),
		leftLine22 = s.select('#leftLine22'),
		leftLine23 = s.select('#leftLine23'),
		leftLine24 = s.select('#leftLine24'),
		leftLine25 = s.select('#leftLine25'),
		leftLine26 = s.select('#leftLine26'),
		leftLine27 = s.select('#leftLine27'),
		leftLine28 = s.select('#leftLine28'),
		leftLine29 = s.select('#leftLine29'),
		leftLine30 = s.select('#leftLine30'),
		leftLine31 = s.select('#leftLine31'),
		
		leftLine32 = s.select('#leftLine32'),
		
		leftLine33 = s.select('#leftLine33'),
		leftLine34 = s.select('#leftLine34'),
		leftLine35 = s.select('#leftLine35'),
		leftLine36 = s.select('#leftLine36'),
		leftLine37 = s.select('#leftLine37'),
		leftLine38 = s.select('#leftLine38'),
		leftLine39 = s.select('#leftLine39'),
		leftLine40 = s.select('#leftLine40'),
		leftLine41 = s.select('#leftLine41'),
		leftLine42 = s.select('#leftLine42'),
		leftLine43 = s.select('#leftLine43'),
		leftLine44 = s.select('#leftLine44'),
		leftLine45 = s.select('#leftLine45'),
		leftLine46 = s.select('#leftLine46'),
		leftLine47 = s.select('#leftLine47'),
		leftLine48 = s.select('#leftLine48'),
		leftLine49 = s.select('#leftLine49'),
		leftLine50 = s.select('#leftLine50'),
		leftLine51 = s.select('#leftLine51'),
		leftLine52 = s.select('#leftLine52'),
		leftLine53 = s.select('#leftLine53'),
		leftLine54 = s.select('#leftLine54'),
		
		leftLine55 = s.select('#leftLine55'),
		leftLine56 = s.select('#leftLine56'),
		leftLine57 = s.select('#leftLine57'),
		leftLine58 = s.select('#leftLine58'),
		leftLine59 = s.select('#leftLine59'),
		leftLine60 = s.select('#leftLine60'),
		
		
		leftLine61 = s.select('#leftLine61'),
		leftLine62 = s.select('#leftLine62'),
		leftLine63 = s.select('#leftLine63'),
		leftLine64 = s.select('#leftLine64'),
		leftLine65 = s.select('#leftLine65'),
		leftLine66 = s.select('#leftLine66'),
		leftLine67 = s.select('#leftLine67'),
		leftLine68 = s.select('#leftLine68'),
		leftLine69 = s.select('#leftLine69'),
		leftLine70 = s.select('#leftLine70'),
		leftLine71 = s.select('#leftLine71'),
		leftLine72 = s.select('#leftLine72'),
		leftLine73 = s.select('#leftLine73'),
		leftLine74 = s.select('#leftLine74'),
		leftLine75 = s.select('#leftLine75'),
		leftLine76 = s.select('#leftLine76'),
		leftLine77 = s.select('#leftLine77'),
		leftLine78 = s.select('#leftLine78'),
		leftLine79 = s.select('#leftLine79'),
		leftLine80 = s.select('#leftLine80'),
		leftLine81 = s.select('#leftLine81'),
		leftLine82 = s.select('#leftLine82'),
		leftLine83 = s.select('#leftLine83'),
		leftLine84 = s.select('#leftLine84'),
		leftLine85 = s.select('#leftLine85'),
		leftLine86 = s.select('#leftLine86'),
		leftLine87 = s.select('#leftLine87'),
		leftLine88 = s.select('#leftLine88'),
		leftLine89 = s.select('#leftLine89'),
		leftLine90 = s.select('#leftLine90'),
		leftLine91 = s.select('#leftLine91'),
		leftLine92 = s.select('#leftLine92'),
		leftLine93 = s.select('#leftLine93'),
		leftLine94 = s.select('#leftLine94'),
		leftLine95 = s.select('#leftLine95'),
		leftLine96 = s.select('#leftLine96'),
		leftLine97 = s.select('#leftLine97'),
		leftLine98 = s.select('#leftLine98'),
		leftLine99 = s.select('#leftLine99'),
		leftLine100 = s.select('#leftLine100'),
		leftLine101 = s.select('#leftLine101'),
		leftLine102 = s.select('#leftLine102'),
		leftLine103 = s.select('#leftLine103'),
		leftLine104 = s.select('#leftLine104'),
		leftLine105 = s.select('#leftLine105'),
		leftLine106 = s.select('#leftLine106'),
		leftLine107 = s.select('#leftLine107'),
		leftLine108 = s.select('#leftLine108'),
		leftLine109 = s.select('#leftLine109'),
		leftLine110 = s.select('#leftLine110'),
		leftLine111 = s.select('#leftLine111'),
		leftLine112 = s.select('#leftLine112'),
		leftLine113 = s.select('#leftLine113'),
		leftLine114 = s.select('#leftLine114'),
		leftLine115 = s.select('#leftLine115'),
		leftLine116 = s.select('#leftLine116'),
		leftLine117 = s.select('#leftLine117'),
		leftLine118 = s.select('#leftLine118'),
		leftLine119 = s.select('#leftLine119'),
		leftLine120 = s.select('#leftLine120'),
		leftLine121 = s.select('#leftLine121'),
		leftLine122 = s.select('#leftLine122'),
		leftLine123 = s.select('#leftLine123'),
		leftLine124 = s.select('#leftLine124');
	// THis is going to be the handlers for the rightLines 
	var rightLine1 = s.select('#rightLine1'),
		rightLine2 = s.select('#rightLine2'),
		rightLine3 = s.select('#rightLine3'),
		rightLine4 = s.select('#rightLine4'),
		rightLine5 = s.select('#rightLine5'),
		rightLine6 = s.select('#rightLine6'),
		rightLine7 = s.select('#rightLine7'),
		rightLine8 = s.select('#rightLine8'),
		rightLine9 = s.select('#rightLine9'),
		rightLine10 = s.select('#rightLine10'),
		rightLine11 = s.select('#rightLine11'),
		rightLine12 = s.select('#rightLine12'),
		rightLine13 = s.select('#rightLine13'),
		rightLine14 = s.select('#rightLine14'),
		rightLine15 = s.select('#rightLine15'),
		rightLine16 = s.select('#rightLine16'),
		rightLine17 = s.select('#rightLine17'),
		rightLine18 = s.select('#rightLine18'),
		rightLine19 = s.select('#rightLine19'),
		rightLine20 = s.select('#rightLine20'),
		rightLine21 = s.select('#rightLine21'),
		rightLine22 = s.select('#rightLine22'),
		rightLine23 = s.select('#rightLine23'),
		rightLine24 = s.select('#rightLine24'),
		rightLine25 = s.select('#rightLine25'),
		rightLine26 = s.select('#rightLine26'),
		rightLine27 = s.select('#rightLine27'),
		rightLine28 = s.select('#rightLine28'),
		rightLine29 = s.select('#rightLine29'),
		rightLine30 = s.select('#rightLine30'),
		rightLine31 = s.select('#rightLine31'),
		rightLine32 = s.select('#rightLine32'),
		rightLine33 = s.select('#rightLine33'),
		rightLine34 = s.select('#rightLine34'),
		rightLine35 = s.select('#rightLine35'),
		rightLine36 = s.select('#rightLine36'),
		rightLine37 = s.select('#rightLine37'),
		rightLine38 = s.select('#rightLine38'),
		rightLine39 = s.select('#rightLine39'),
		rightLine40 = s.select('#rightLine40'),
		rightLine41 = s.select('#rightLine41'),
		rightLine42 = s.select('#rightLine42'),
		rightLine43 = s.select('#rightLine43'),
		rightLine44 = s.select('#rightLine44'),
		rightLine45 = s.select('#rightLine45'),
		rightLine46 = s.select('#rightLine46'),
		rightLine47 = s.select('#rightLine47'),
		rightLine48 = s.select('#rightLine48'),
		rightLine49 = s.select('#rightLine49'),
		rightLine50 = s.select('#rightLine50'),
		rightLine51 = s.select('#rightLine51'),
		rightLine52 = s.select('#rightLine52'),
		rightLine53 = s.select('#rightLine53'),
		rightLine54 = s.select('#rightLine54'),
		rightLine55 = s.select('#rightLine55'),
		rightLine56 = s.select('#rightLine56'),
		rightLine57 = s.select('#rightLine57'),
		rightLine58 = s.select('#rightLine58'),
		rightLine59 = s.select('#rightLine59'),
		rightLine60 = s.select('#rightLine60'),
		rightLine61 = s.select('#rightLine61'),
		rightLine62 = s.select('#rightLine62'),
		rightLine63 = s.select('#rightLine63'),
		rightLine64 = s.select('#rightLine64'),
		rightLine65 = s.select('#rightLine65'),
		rightLine66 = s.select('#rightLine66'),
		rightLine67 = s.select('#rightLine67'),
		rightLine68 = s.select('#rightLine68'),
		rightLine69 = s.select('#rightLine69'),
		rightLine70 = s.select('#rightLine70'),
		rightLine71 = s.select('#rightLine71'),
		rightLine72 = s.select('#rightLine72'),
		rightLine73 = s.select('#rightLine73'),
		rightLine74 = s.select('#rightLine74'),
		rightLine75 = s.select('#rightLine75'),
		rightLine76 = s.select('#rightLine76'),
		rightLine77 = s.select('#rightLine77'),
		rightLine78 = s.select('#rightLine78'),
		rightLine79 = s.select('#rightLine79'),
		rightLine80 = s.select('#rightLine80'),
		rightLine81 = s.select('#rightLine81'),
		rightLine82 = s.select('#rightLine82'),
		rightLine83 = s.select('#rightLine83'),
		rightLine84 = s.select('#rightLine84'),
		rightLine85 = s.select('#rightLine85'),
		rightLine86 = s.select('#rightLine86'),
		rightLine87 = s.select('#rightLine87'),
		rightLine88 = s.select('#rightLine88'),
		rightLine89 = s.select('#rightLine89'),
		rightLine90 = s.select('#rightLine90'),
		rightLine91 = s.select('#rightLine91'),
		rightLine92 = s.select('#rightLine92'),
		rightLine93 = s.select('#rightLine93'),
		rightLine94 = s.select('#rightLine94'),
		rightLine95 = s.select('#rightLine95'),
		rightLine96 = s.select('#rightLine96'),
		rightLine97 = s.select('#rightLine97'),
		rightLine98 = s.select('#rightLine98'),
		rightLine99 = s.select('#rightLine99'),
		rightLine100 = s.select('#rightLine100'),
		rightLine101 = s.select('#rightLine101'),
		rightLine102 = s.select('#rightLine102'),
		rightLine103 = s.select('#rightLine103'),
		rightLine104 = s.select('#rightLine104'),
		rightLine105 = s.select('#rightLine105'),
		rightLine106 = s.select('#rightLine106'),
		rightLine107 = s.select('#rightLine107'),
		rightLine108 = s.select('#rightLine108'),
		rightLine109 = s.select('#rightLine109'),
		rightLine110 = s.select('#rightLine110'),
		rightLine111 = s.select('#rightLine111'),
		rightLine112 = s.select('#rightLine112'),
		rightLine113 = s.select('#rightLine113'),
		rightLine114 = s.select('#rightLine114'),
		rightLine115 = s.select('#rightLine115'),
		rightLine116 = s.select('#rightLine116'),
		rightLine117 = s.select('#rightLine117'),
		rightLine118 = s.select('#rightLine118'),
		rightLine119 = s.select('#rightLine119'),
		rightLine120 = s.select('#rightLine120'),
		rightLine121 = s.select('#rightLine121'),
		rightLine122 = s.select('#rightLine122'),
		rightLine123 = s.select('#rightLine123'),
		rightLine124 = s.select('#rightLine124');
}); /////////////////// End Ready 