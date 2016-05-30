
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