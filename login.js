function initialize() {
    // Get the modal
    var modal = document.getElementById('register');

    // Get the button that opens the modal
    var btn = document.getElementById('registerButton');

    // Get the <close> element that closes the modal
    var close = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <close> (x), close the modal
    close.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
	if (event.target == modal) {
	    modal.style.display = "none";
	}
    }

}

function register() {
    // var username = document.getElementById()
}
