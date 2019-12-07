var initial = 1000;
var count = initial;
var counter = 10; //10 will  run it every 100th of a second

function timer() {
    if (count <= 0 || isHuman == true) {
        clearInterval(counter);
        if (isHuman == true) {
            location.href="/humanpage";
        }
        else {
            location.href="/alienpage";
        }
        clearInterval(counter);
        return;
    }
    count -= 2;
}

counter = window.setInterval(counter = function() {
    if (isHuman !=null)
        timer();
}, 10);
