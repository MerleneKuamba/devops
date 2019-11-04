var images = new Array();
images.push("pictures/1.jpg");
images.push("pictures/2.jpg");
images.push("pictures/3.jpg");
images.push("pictures/4.jpg");
images.push("pictures/5.jpg");

var pointeur=0;

function changerImage(){
	document.getElementById("ichange").src=images[pointeur];

	if(pointeur < images.length-1){
		pointeur++;
	}
	else
		pointeur=0;

	setTimeout("changerImage()",5000);

}

function move() {
    var elem = document.getElementById("myBar"); 
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
        if (width >= 100) {
            clearInterval(id);
        } else {
            width++; 
            elem.style.width = width + '%'; 
        }
    }
    alert("yes");
}

window.onload= function(){
		changerImage();
		move();

}

function reduce(nb){
	nb--;
	document.getElementById("quant").innerHTML = nb;
}