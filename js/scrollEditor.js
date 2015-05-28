var canvas = document.getElementById('scroll');
var scroll = {
	s : 0.6,
	w : 633,
	h : 1024
};

canvas.width = 633 * scroll.s;
canvas.height = 1024 * scroll.s + 23;
var dragging = false;
var context = canvas.getContext('2d');
var draggDot = document.getElementById("dragg");

var scrollBack = new Image();
scrollBack.src = 'img/scrollEditor/card/'+getBackScroll();

var scrollArt = new Image();
scrollArt.src = "http://scrolldier.com/resources/cardImages/501.png";

var scrollCostBox = new Image();
scrollCostBox.src = "img/scrollEditor/box/costbox.png";

var scrollFactionIcon = new Image();
scrollFactionIcon.src = "img/scrollEditor/icons/growth.png";

var scrollCost = new Image();
scrollCost.src = "img/scrollEditor/numbers/y0.png";

var scrollButton = new Image();
scrollButton.src = "img/scrollEditor/box/clickType.png";

var scrollStatsBox = new Image();
scrollStatsBox.src = "img/scrollEditor/box/statsbox.png";

var scrollAttackStat = new Image();
scrollAttackStat.src = "img/scrollEditor/numbers/"+document.getElementById("attack").value+".png";

var scrollCountdownStat = new Image();
scrollCountdownStat.src = "img/scrollEditor/numbers/"+document.getElementById("countdown").value+".png";

var scrollHealthStat = new Image();
scrollHealthStat.src = "img/scrollEditor/numbers/"+document.getElementById("health").value+".png";

var scrollFoil = new Image();


var artRatio = 0.75;
var lineHight = 22;
var wordSpacing = 5;
var keywordColor = "#38576B";
var textColor = "#351C0C";
var textLightColor = "#f8f8f8";
var rotationDeg = 0;
var costBoxRatio, costNumberRation, statBoxRatio;
var attackRatio, countdownRatio, healthRatio;
var scrollName = "Eager to Battle", flavorText;
var isFlavor = true;
var subtype = document.getElementById("subtype").value, token = false, subsubtype = document.getElementById("subsubtype").value, scrollSubtypeWidth; 
var artX = 50, artY = (scroll.h  * scroll.s) / 5.5;
//Loading in images

var presetArray = [
	"http://scrolldier.com/resources/cardImages/spoilerArt/e.png",
	"http://scrolldier.com/resources/cardImages/spoilerArt/o.png",
	"http://scrolldier.com/resources/cardImages/spoilerArt/g.png",
	"http://scrolldier.com/resources/cardImages/spoilerArt/d.png",
	"http://scrolldier.com/resources/cardImages/spoilerArt/w.png",
	"http://scrolldier.com/resources/cardImages/spoilerArt/s.png",
	"http://scrolldier.com/resources/cardImages/spoilerArt/scholar_1.png",
	"http://scrolldier.com/resources/cardImages/spoilerArt/2.png",
	"http://scrolldier.com/resources/cardImages/spoilerArt/eb.png",
	"http://scrolldier.com/resources/cardImages/spoilerArt/bell.png",
	"http://scrolldier.com/resources/cardImages/spoilerArt/lipbling.png",
	"https://s3.amazonaws.com/f.cl.ly/items/1U3e390d052D2d3t1c0e/Skjermbilde%202015-02-16%20kl.%2022.20.24.png"
	
];
function init() {
	var box = document.getElementById("presetBox");
//<img src="http://scrolldier.com/resources/cardImages/501.png" class="col-3" alt="" />

	for (var i = 0; i < presetArray.length; i++) {
		box.innerHTML = box.innerHTML + "<img src='"+presetArray[i]+"' style='cursor: pointer;' id='preset-"+i+"' class='col-3' height='80' alt='preset image' />";
	}

}
init();

for (var i = 0; i < presetArray.length; i++) {
	document.querySelector('#preset-'+i).addEventListener("click", function() {

		document.getElementById('artUrl').value = this.src;
		updateArtImage();
	});
}



scrollArt.onload = function(){
	artRatio = scrollArt.height / scrollArt.width;
	drawScroll(true);
}; 

scrollBack.onload = function(){
	drawScroll(true);
}; 

scrollFoil.onload = function(){
	drawScroll(true);
};

scrollButton.onload = function(){
	drawScroll(true);
};


var numberWidth = 25;
scrollAttackStat.onload = function(){
	attackRatio = scrollAttackStat.height / scrollAttackStat.width;
	scrollAttackStat.width = numberWidth;
	drawScroll(true);
};

scrollCountdownStat.onload = function(){
	countdownRatio = scrollCountdownStat.height / scrollCountdownStat.width;
	scrollCountdownStat.width = numberWidth;
	drawScroll(true);
};

scrollHealthStat.onload = function(){
	healthRatio = scrollHealthStat.height / scrollHealthStat.width;
	scrollHealthStat.width = numberWidth;
	drawScroll(true);
};
scrollCostBox.onload = function(){
	costBoxRatio = scrollCostBox.height / scrollCostBox.width;
	scrollCostBox.width = 125;
	drawScroll(true);
};

scrollFactionIcon.onload = function(){
	drawScroll(true);
}; 

scrollCost.onload = function(){
	costNumberRation = scrollCost.height / scrollCost.width;
	scrollCost.width = 30;
	drawScroll(true);
}; 

scrollStatsBox.onload = function(){
	statBoxRatio = scrollStatsBox.height / scrollStatsBox.width;
	scrollStatsBox.width = 285;
	drawScroll(true);
}; 


function getBackScroll() {
	return document.getElementById("faction").value + "_" + document.getElementById("rarity").value + ".png";
}

function setBackScroll() {
	scrollBack.src = 'img/scrollEditor/card/'+getBackScroll();
	scrollFactionIcon.src = 'img/scrollEditor/icons/'+document.getElementById("faction").value+".png";
	scrollBack.onload = function() {
		drawScroll(true);
	}
	scrollFactionIcon.onload = function(){
		drawScroll(true);
	}; 
	
}

function getCostNumber() {
	return "y" + document.getElementById("cost").value + ".png";
}
document.getElementById("faction").addEventListener("change", function() {
	setBackScroll();
});

document.getElementById("foil").addEventListener("change", function() {	

	if (this.value != 1) {
		scrollFoil.src = "img/scrollEditor/foil/"+this.value+".png";
		scrollFoil.onload = function(){
			drawScroll(true);
		};
	} else {
		scrollFoil.src = "";
		drawScroll(true);
	}
	
});


document.getElementById("subsubtype").addEventListener("keyup", function() {
	subsubtype = this.value;
	drawScroll(true);
});

document.getElementById("subtype").addEventListener("change", function() {
	subtype = this.value;
	checkStatsBar();
	drawScroll(true);
});

function checkStatsBar() {
	var bar = document.getElementById("stats");
	var subtypeOption = document.getElementById("subtype").value;
	
	if (subtypeOption == "CREATURE" || subtypeOption == "STRUCTURE") {
		bar.style.display = "block";
	} else {
		bar.style.display = "none";
	}
}
document.getElementById("attack").addEventListener("change", function() {
	scrollAttackStat.src = "img/scrollEditor/numbers/"+this.value+".png";
	scrollAttackStat.onload = function(){
		drawScroll(true);
	};
});
document.getElementById("countdown").addEventListener("change", function() {
	scrollCountdownStat.src = "img/scrollEditor/numbers/"+this.value+".png";
	scrollCountdownStat.onload = function(){
		drawScroll(true);
	};
		
});

document.getElementById("button").addEventListener("keyup", function() {
	drawScroll(true);
});

document.getElementById("health").addEventListener("change", function() {
	scrollHealthStat.src = "img/scrollEditor/numbers/"+this.value+".png";
	scrollHealthStat.onload = function(){
		drawScroll(true);
	};
});

document.getElementById("token").addEventListener("click", function() {
	token = !token;
	
	if (token) {
		this.className = "btn success";
	} else {
	 	this.className = "btn";
	}
	
	drawScroll(true);
});

document.getElementById("description").addEventListener("keyup", function() {
	drawScroll(true);
});

document.getElementById("rarity").addEventListener("change", function() {
	setBackScroll();
});

document.getElementById("name").addEventListener("keyup", function() {
	scrollName = this.value;
	drawScroll(true);
});

document.getElementById("flavor").addEventListener("keyup", function() {
	flavorText = this.value;
	drawScroll(true);
});

document.getElementById("cost").addEventListener("change", function() {
	scrollCost.src = 'img/scrollEditor/numbers/' + getCostNumber();
	scrollCost.onload = function(){
		drawScroll(true);
	}; 
});


function drawScroll(art) {
	
	//draw Card Art
	if (art == true) {
		clearCVS();
		context.drawImage(scrollArt, artX, artY, scrollArt.width, scrollArt.height);
		context.clearRect(0 , 0 , 50, canvas.height);
		context.clearRect(350 , 0 , canvas.width, canvas.height);
		
		context.clearRect(0 , 0 , canvas.width, 100);
		context.clearRect(0 , canvas.height-100 , canvas.width, 100);
		updateDraggDot();
		
	}
	//draw cardbase
	context.drawImage(scrollBack, 0, 23, scroll.w * scroll.s, scroll.h * scroll.s - 23);
	
	//draw Foil
	if (document.getElementById("foil").value != 1) {
		context.drawImage(scrollFoil, 0, 23, scroll.w * scroll.s, scroll.h * scroll.s - 23);
	}
	
	
	
	//cost box
	context.drawImage(scrollCostBox, 130, -2, scrollCostBox.width, scrollCostBox.width * costBoxRatio + 10);
	
	//draw faction icon
	context.drawImage(scrollFactionIcon, 150, 9, 48, 48);
	
	//draw cost number
	context.drawImage(scrollCost, 197, 12, scrollCost.width, scrollCost.width * costNumberRation);
	
	// draw name
	context.font = "35px axe";
	context.fillStyle = textColor;
	scrollNameWidth = context.measureText(scrollName);
	context.fillText(scrollName, (canvas.width / 2) - (scrollNameWidth.width/2), 95);
	
	//draw subtype
	context.font = "24px axe";
	var subtext = "";
	if (token) {
		subtext += "TOKEN "
	}
	subtext += subtype;
	
	if (subsubtype.length != 0) {
		subtext += ": " + subsubtype;
	}
	
	
	scrollSubtypeWidth = context.measureText(subtext);
	context.fillText(subtext, (canvas.width / 2) - (scrollSubtypeWidth.width/2), 120);
	
	//draw Stat box if Creature or Structure
	
	if (subtype == "CREATURE" || subtype == "STRUCTURE") {
		
		//draw statbar
		context.drawImage(scrollStatsBox, 50, 307, scrollStatsBox.width, scrollStatsBox.width * statBoxRatio);
		
		
		//draw Attack
		context.drawImage(scrollAttackStat, 105, 328, scrollAttackStat.width, scrollAttackStat.width * attackRatio);
		
		//draw Countdown
		context.drawImage(scrollCountdownStat, 188, 328, scrollCountdownStat.width, scrollCountdownStat.width * countdownRatio);
		
		//draw Health
		context.drawImage(scrollHealthStat, 275, 328, scrollHealthStat.width, scrollHealthStat.width * healthRatio);
	}
	
	//draw flavor text
	if (isFlavor) {
	
		context.font = "21px honeyitalic";	
		flavorTextArray = document.getElementById("flavor").value.split("\n");
		
		for (var i = 0; i < flavorTextArray.length; i++) {
			var flavorWidth = context.measureText(flavorTextArray[i]);
			context.fillText(flavorTextArray[i], (canvas.width / 2) - (flavorWidth.width/2), 520+(lineHight*i));
		}
	
	
	} else {
		//draw Button
		scrollButton.width = 230;
		context.drawImage(scrollButton, 80, 515, scrollButton.width, scrollButton.width / 4);
		scrollButtonText = document.getElementById("button").value;
		scrollButtonTextWisth = context.measureText(scrollButtonText);
		context.fillStyle = textLightColor;
		context.fillText(scrollButtonText, (canvas.width / 2) - (scrollButtonTextWisth.width/2), 550);
		context.fillStyle = textColor;
	}
	//draw Description
	var scrollDescArray = document.getElementById("description").value.split("\n");
	var linewidth = 0;
	for (var i = 0; i < scrollDescArray.length; i++) {
		
		if (scrollDescArray[i].match(/^\[t\]/im)) {
			scrollDescArray[i] = scrollDescArray[i].replace(/\[t\]/gi, "");
			context.font = "21px honeyitalic";
		} else {
			context.font = "21px honey";
		}
		var word = scrollDescArray[i].split(" ");
		for (var j = 0; j < word.length; j++) {
			if (word[j].match(/<.*?>/im)) {
				word[j] = word[j].replace(/[\<\>]/gim, "");
				context.fillStyle = keywordColor;
			} else {
				context.fillStyle = textColor;
			}
			context.fillText(word[j], linewidth+60, 393+(lineHight*i));
			WordW = context.measureText(word[j]);
			linewidth += WordW.width + wordSpacing;
		}
		linewidth = 0;
	}
	
	
	
}

function clearCVS() {
	context.clearRect (0 , 0 , canvas.width, canvas.height);
}

function updateDraggDot() {
	draggDot.style.top = canvas.offsetTop + artY + scrollArt.height - (draggDot.style.height / 2)+"px";
	draggDot.style.left = canvas.offsetLeft + artX + scrollArt.width - (draggDot.style.width / 2)+"px";
}
function updateDraggDotXY(x, y) {
	draggDot.style.top = y+"px";
	draggDot.style.left = x+"px";
}

canvas.addEventListener("mousedown", function(e) {
	dragging = true;
	mouseE = e;
	document.addEventListener("mousemove", function(e) {
		if (dragging) {
			clearCVS();
			artX += (e.pageX - mouseE.pageX);
			artY += (e.pageY - mouseE.pageY);
			updateDraggDot();
			mouseE = e;
			
			
			context.drawImage(scrollArt, artX, artY, scrollArt.width, scrollArt.height);

			context.clearRect(0 , 0 , 50, canvas.height);
			context.clearRect(350 , 0 , canvas.width, canvas.height);
			
			context.clearRect(0 , 0 , canvas.width, 100);
			context.clearRect(0 , canvas.height-100 , canvas.width, 100);
			
			drawScroll();
		}
	});
});
document.addEventListener("mouseup", function() {
	dragging = false;
});


var draggDotDragg = false;


var mouseXE;
var shiftIsDown;
document.addEventListener("keydown", function(e) {
	if (e.keyCode == 16) {
		shiftIsDown = true;
	}
});
document.addEventListener("keyup", function(e) {
	shiftIsDown = false;
});

draggDot.addEventListener("mousedown", function(e) {
	draggDotDragg = true;
	mouseXE = e;
	document.addEventListener("mousemove", function(e) {
		if (draggDotDragg) {
			clearCVS();
			if (shiftIsDown) {
			
				var diff = (e.pageX - mouseXE.pageX);
				

				
				
				scrollArt.width = scrollArt.width+diff;
				scrollArt.height = artRatio * (scrollArt.width);
				
			} else {
				scrollArt.height += (e.pageY - mouseXE.pageY);
				scrollArt.width += (e.pageX - mouseXE.pageX);
			}
			updateDraggDot(e.pageX, e.pageY);
			mouseXE = e;

			
			drawScroll(true);
				
		}
	});
});
document.addEventListener("mouseup", function(e) {
	draggDotDragg = false;

});
draggDot.addEventListener("mouseup", function(e) {
	draggDotDragg = false;

});


//canvas.addEventListener("click", function(e) {
//	dragging = true;
//	drawArt(e);
//	dragging = false;
//});

document.getElementById("artPlus").addEventListener("click", function() {

	scrollArt.width += 20;

	scrollArt.height = scrollArt.width * artRatio;
	clearCVS()
	drawScroll(true);
	updateDraggDot()
});
document.getElementById("artMinus").addEventListener("click", function() {
	

	scrollArt.width -= 20;
	scrollArt.height = scrollArt.width * artRatio;
	clearCVS()
	drawScroll(true);
	updateDraggDot()
});

document.getElementById("updateArt").addEventListener("click", function() {
	updateArtImage();
});

function updateArtImage() {
	scrollArt.src = document.getElementById("artUrl").value;
	scrollArt.onload = function(){
		artRatio = scrollArt.height / scrollArt.width;
		if (scrollArt.width >= 300) {
			scrollArt.width = 300;
			scrollArt.height = artRatio * (scrollArt.width);
		}
		clearCVS();
		drawScroll(true);
	};
}

function changeBtnAndFlavor(isFlavorT) {
	isFlavor = isFlavorT;
	var f = document.getElementById("flavorBtn");
	var b = document.getElementById("buttonBtn");
	var fb = document.getElementById("flavorTextBox");
	var bb = document.getElementById("buttonTextBox");
	if (isFlavorT) {
		f.className = "btn success";
		b.className = "btn";
		
		fb.style.display = "block";
		bb.style.display = "none";
	} else {
		b.className = "btn success";
		f.className = "btn";
		
		bb.style.display = "block";
		fb.style.display = "none";
	}
	drawScroll(true);

}

document.getElementById("flavorBtn").addEventListener("click", function() {
	changeBtnAndFlavor(true);
});

document.getElementById("buttonBtn").addEventListener("click", function() {
	changeBtnAndFlavor(false);
});

document.getElementById("presetBtn").addEventListener("click", function() {
	var box = document.getElementById("presetBox");
	if (box.style.display == "block") {
		box.style.display = "none";
	} else {
		box.style.display = "block";
	}
	
});
