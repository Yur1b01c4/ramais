function hideMessageAfterDelay(id, delay) {
    setTimeout(function() {
        var element = document.getElementById(id);
        if (element) {
            element.classList.add('fadeOut');
        setTimeout(function() {
            element.parentNode.removeChild(element);
            }, 1000);
        }
    }, delay);
}

hideMessageAfterDelay("time", 5000);
