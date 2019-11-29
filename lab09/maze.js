/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */

var loser = null;  // whether the user has hit a wall

window.onload = function() {
  var boundarys = $$(".boundary");
  for (var i = 0; i < boundarys.length; i++) {
    boundarys[i].onmouseover = overBoundary;
  }
  $("end").onclick = overEnd;
  $("start").onclick = startClick;
};


// called when mouse enters the walls;
// signals the end of the game with a loss
function overBoundary(event) {
  var boundarys = $$(".boundary");
  for (var i = 0; i < boundarys.length; i++) {
    boundarys[i].addClassName("youlose");
  }
  alert("you lose!")
  loser = true;
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
  var boundarys = $$(".boundary");
  for (var i = 0; i < boundarys.length; i++) {
    boundarys[i].removeClassName("youlose")
  }
  loser = null;
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
  if (loser === null) {
    alert("you win!")
  }
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {

}
