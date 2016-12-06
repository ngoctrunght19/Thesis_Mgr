$("#menu a").click(function(event){
	var menu = $(this).attr("menu");
	console.log(menu);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	   	if (this.readyState == 4 && this.status == 200) {
	    	document.getElementById("content").innerHTML = this.responseText;
	    }
	};
	xhttp.open("GET", "../resources/views/khoa/" + menu + ".blade.php", true);
	xhttp.send();
});