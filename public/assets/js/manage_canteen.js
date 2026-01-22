document.getElementById("removeImg").onclick  = function () {
    // Enable / disable the image uploading based on the remove image checkbox
    document.getElementById("image").disabled = document.getElementById("removeImg").checked;
    // Remove the uploaded image if the user wants to delete the profile image
    if (document.getElementById("removeImg").checked) {
        document.getElementById("image").value = null;
    }
};

// When resetting, reset also the image uploading
document.getElementById("resBtn").onclick = function () {
    document.getElementById("image").disabled = false;
    document.getElementById("image").value = null;
}