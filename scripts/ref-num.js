function tetrix(){
    var tetrixclick = document.getElementById("tetrix-button");
    tetrixclick.onsubmit = sendTetrix;
}

function ally(){
    var allyclick = document.getElementById("ally-button");
    allyclick.onsubmit = sendAlly;
}

function sendTetrix(){
    localStorage.jobrefnum = "7D1EG";
    window.location = "apply.php"
    return false;
}

function sendAlly(){
    localStorage.jobrefnum = "3U1EN";
    window.location = "apply.php"
    return false;
}

function init (){
    tetrix();
    ally();
}

window.onload = init;