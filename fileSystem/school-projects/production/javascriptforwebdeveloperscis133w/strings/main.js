/*jsl:option explicit*/
/*jsl:declare $*//*jsl:declare isDigits*//*jsl:declare addEventListener*//*jsl:declare alert*//*jsl:declare blur*//*jsl:declare clearInterval*//*jsl:declare clearTimeout*//*jsl:declare close*//*jsl:declare closed*//*jsl:declare confirm*//*jsl:declare console*//*jsl:declare Debug*//*jsl:declare defaultStatus*//*jsl:declare document*//*jsl:declare event*//*jsl:declare focus*//*jsl:declare frames*//*jsl:declare getComputedStyle*//*jsl:declare history*//*jsl:declare Image*//*jsl:declare length*//*jsl:declare location*//*jsl:declare moveBy*//*jsl:declare moveTo*//*jsl:declare navigator*//*jsl:declare open*//*jsl:declare opener*//*jsl:declare opera*//*jsl:declare Option*//*jsl:declare parent*//*jsl:declare Number*//*jsl:declare parseInt*//*jsl:declare print*//*jsl:declare prompt*//*jsl:declare resizeBy*//*jsl:declare resizeTo*//*jsl:declare screen*//*jsl:declare scroll*//*jsl:declare scrollBy*//*jsl:declare scrollTo*//*jsl:declare setInterval*//*jsl:declare setTimeout*//*jsl:declare status*//*jsl:declare top*//*jsl:declare window*//*jsl:declare XMLHttpRequest*/


/*
JavaScript has some very useful properties and methods for working with strings.  You should know about them.
All of the properties and methods below are a part of the string object and can be used with any string.  They are all fully explained in the Course Notes (Working with Strings).

Play with them.
*/

window.onload = Init;

function Init() {

	"use strict";

	var txtString = document.getElementById("txtString");
	var txtResult = document.getElementById("txtResult");
	var txtStartPos = document.getElementById("txtStartPos");
	var txtFind = document.getElementById("txtFind");

	txtString.value = "Mary had a little lamb.  Its fleece was white as snow.";

	// The *length* property is used to obtain the numbers of characters in a string. Click the *length* button.

	document.getElementById("btnLength").onclick = function() {
		var iLength = txtString.value.length;

		txtResult.value = iLength;
	};


	document.getElementById("btnIndexOf").onclick = function() {

		var s = txtFind.value;
		var i;
		var iStart = txtStartPos.value;

		if (iStart !== "") {
			iStart = Number(iStart);
			i = txtString.value.indexOf(s, iStart);
		}
		else {
			i = txtString.value.indexOf(s);
		}

		txtResult.value = i;

	};


	document.getElementById("btnLastIndexOf").onclick = function() {

		var s = txtFind.value;
		var i;
		var iStart = txtStartPos.value;

		if (iStart !== "") {
			iStart = Number(iStart);
			i = txtString.value.lastIndexOf(s, iStart);
		}
		else {
			i = txtString.value.lastIndexOf(s);
		}

		txtResult.value = i;

	};


	document.getElementById("btnSubstr").onclick = function() {

		var s;
		var iStart = Number(txtStartPos.value);
		var iChars = document.getElementById("txtChars").value;


		if (iChars === "") {
			s = txtString.value.substr(iStart);
		}
		else {
			s = txtString.value.substr(iStart, Number(iChars));
		}

		txtResult.value = s;
	};


	document.getElementById("btnCharAt").onclick = function() {

		var iStart = Number(txtStartPos.value);

		txtResult.value = txtString.value.charAt(iStart);

	};


	document.getElementById("btnToLowerCase").onclick = function() {

		var s;

		s = txtString.value.toLowerCase();
		txtResult.value = s;

	};


	document.getElementById("btnToUpperCase").onclick = function() {

		var s;

		s = txtString.value.toUpperCase();
		txtResult.value = s;

	};


	document.getElementById("btnSplit").onclick = function() {

		var sOutput = "";
		var sDelim = document.getElementById("txtDelimiter").value;
		var a_sPieces = txtString.value.split(sDelim);

		for (var i=0; i < a_sPieces.length; i++) {
			sOutput += "<p class='split'>"  + a_sPieces[i] + "</p>";
		}

		document.getElementById("divPieces").innerHTML = sOutput;

	};

} // function Init