var initial = 3000;
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
    displayCount(count);
}

function displayCount(count) {
    var res = count / 100;
    document.getElementById("timer").innerHTML = res.toPrecision(count.toString().length) + " secs";
}

counter = window.setInterval(counter = function() {
    if (isHuman !=null)
        timer();
}, 10);

displayCount(initial);