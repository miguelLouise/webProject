function changeImage(imageId, imageUrl) {
    document.getElementById(imageId).src = imageUrl;
}

function showPopup(imageUrl) {
    document.getElementById("popupImage").src = imageUrl;
    document.getElementById("popup").style.display = "block";
}

function closePopup() {
    document.getElementById("popup").style.display = "none";
}

