// JQuery starting function
$(document).ready(function(){
	//applying codemirror
	var code = $(".codemirror-textarea")[0];
	var editor = CodeMirror.fromTextArea(code, {
		lineNumbers : true
	});

	//when form submitted    maybe get rid or it???
	$("#text-editor").submit(function(e){
		var value = editor.getValue();
		if(value.length == 0) {
			alert("File is empty!");
		}
	});
	/*var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
		lineNumbers: true
    });*/
});

// Sidebar functions
function toggleSideNav() {
	var e = document.getElementById("side-nav-id");
	if (e.style.width == '250px') {
		e.style.width = '0px';
		document.getElementById("main").style.marginLeft = '0px';
	} else {
		e.style.width = '250px';
		document.getElementById("main").style.marginLeft = '250px';
	}
}

// Resizing functions
function displayWindowSize() {
	var w = document.documentElement.clientWidth;
	var h = document.documentElement.clientHeight;
	document.getElementById("debugging").innerHTML = "Width: " + w + ", " + "Height: " + h;

	var leftheight = document.getElementById("leftDiv");
	var rightheight = document.getElementById("rightDiv");
	var newHeight = document.documentElement.clientHeight - document.getElementById("navbar-id");

	leftheight.style.height = newHeight + "px";
	leftheight.style.minHeight = newHeight + "px";
	rightheight.style.height = newHeight + "px";
	rightheight.style.minHeight = newHeight + "px";
}