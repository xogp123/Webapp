function bigger () {
  if ($("text").style.fontSize) {
    $("text").style.fontSize = parseInt($("text").style.fontSize) + 2 + "pt";
  }
  else {
    $("text").style.fontSize = "12pt";
  }
}
function bigger_time () {
  setInterval(function (){bigger();}, 300);
}


function b () {
   var style_text = $("text").style;
  if($("b").checked) {
    $("text").style.fontWeight = "bold";
    $("text").style.textDecoration = "underline";
    $("text").style.color = "green";
  }
  else {
    $("text").style = style_text;
    // $("text").style.fontWeight = "normal";
    // $("text").style.textDecoration = "none";
    // $("text").style.color = "black";
  }
}
function snoop () {
  $("text").value = $("text").value.toUpperCase();
  var text_s = $("text").value.split(".");
  var text_j = text_s.join("-izzle.");
  $("text").value = text_j;
}

window.onload = function() {
  $("pimp").onclick = bigger_time;
  $("b").onchange = b;
  $("snoop").onclick = snoop;
}
