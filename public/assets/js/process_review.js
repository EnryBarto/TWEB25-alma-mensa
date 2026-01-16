function setVote(val) {
    if (val > 5) val = 5;
    else if (val < 1) val = 1;

    let stars = document.getElementById("stars").children;
    let i;

    for (i = 0; i < parseInt(val); i++) {
        stars[i].innerHTML = "<span class=\"bi bi-star-fill text-warning fs-4\"></span>";

    }

    for ( ; i < 5; i++ ) {
        stars[i].innerHTML = "<span class=\"bi bi-star fs-4\"></span>";
    }

    document.getElementById("vote").value = val;
    return val;
}

document.getElementsByTagName("body")[0].onload = setVote(document.getElementById("vote").value);