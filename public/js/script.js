
// disables right click
function disableContextMenu() {
    window.oncontextmenu = function(event) {
        event.preventDefault();
        event.stopPropagation();
        return false;
    };
}


// run

// disableContextMenu();

