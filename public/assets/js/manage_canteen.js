document.getElementById("removeImg").onclick  = function () {
    document.getElementById("image").disabled = document.getElementById("removeImg").checked;
    if (document.getElementById("removeImg").checked) {
        document.getElementById("image").value = null;
    }
};

document.getElementById("resBtn").onclick = function () {
    document.getElementById("image").disabled = false;
    document.getElementById("image").value = null;
}