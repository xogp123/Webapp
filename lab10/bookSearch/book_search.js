window.onload = function() {
    $("b_xml").onclick=function(){
    	    //construct a Prototype Ajax.request object
          new Ajax.Request("books.php", {
            method : "GET",
            parameters : {category : getCheckedRadio($$("input"))},
            onSuccess : showBooks_XML,
            onFailure : ajaxFailed,
            onException : ajaxFailed
          });
    }
    $("b_json").onclick=function(){
    	    //construct a Prototype Ajax.request object
          new Ajax.Request("books_json.php", {
            method : "GET",
            parameters : {category : getCheckedRadio($$("input"))},
            onSuccess : showBooks_JSON,
            onFailure : ajaxFailed,
            onException : ajaxFailed
          });
    }
};

function getCheckedRadio(radio_button){
	for (var i = 0; i < radio_button.length; i++) {
		if(radio_button[i].checked){
			return radio_button[i].value;
		}
	}
	return undefined;
}

function showBooks_XML(ajax) {
	//alert(ajax.responseText);
  var book = ajax.responseXML.getElementsByTagName("book");
  var ul = $("books");
  ul.innerHTML = "";

  for (var i=0; i<book.length; i++) {
    var title = book[i].getElementsByTagName("title")[0].firstChild.nodeValue;
    var author = book[i].getElementsByTagName("author")[0].firstChild.nodeValue;
    var year = book[i].getElementsByTagName("year")[0].firstChild.nodeValue;

    var list = document.createElement("li");
    list.innerHTML = `${title}, by ${author} (${year})`;
    ul.appendChild(list);
  }
}

function showBooks_JSON(ajax) {
	//alert(ajax.responseText);
  var bookdata = JSON.parse(ajax.responseText).books;
	var output = "<ul>";
	for(var i = 0 ; i < bookdata.length ; i++){
		output += "<li>" + bookdata[i].title
				+ ", by " + bookdata[i].author
				+ " (" + bookdata[i].year + ")</li>";
	}
	output += "</ul>";
	$('books').innerHTML = output;
}

function ajaxFailed(ajax, exception) {
	var errorMessage = "Error making Ajax request:\n\n";
	if (exception) {
		errorMessage += "Exception: " + exception.message;
	} else {
		errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText +
		                "\n\nServer response text:\n" + ajax.responseText;
	}
	alert(errorMessage);
}
