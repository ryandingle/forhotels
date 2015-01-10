// This is a javascript file named wysiwyg.js
function iFrameOn(){
	designMode = 'On';
}
function iBold(){
	document.execCommand('bold',false,null); 
}
function iUnderline(){
	document.execCommand('underline',false,null);
}
function iHorizontalRule(){
	document.execCommand('Inserthorizontalrule',false,null);
}
function iUnorderedList(){
	document.execCommand("InsertOrderedList", false,"newOL");
}
function iOrderedList(){
	document.execCommand("InsertUnorderedList", false,"newUL");
}
function iLink(){
	var linkURL = prompt("Enter the URL for this link:", "http://"); 
	document.execCommand("CreateLink", false, linkURL);
}
function iUnLink(){
	document.execCommand("Unlink", false, null);
}
function iImage(){
	var imgSrc = prompt('Enter image location', '');
	//var a = document.getElementById('image-file').value
	//var imgSrc = '<img src="'+a+'" style="width: 150px; height: 300px;" />';
    if(imgSrc != null){
        document.execCommand('Insertimage', false, imgSrc); 
    }
}
function ready()
{
	var post = document.getElementById('richTextField').innerHTML;
	document.getElementById('myTextArea').innerHTML = post;
	
	document.getElementById('show_item').innerHTML = post;
}