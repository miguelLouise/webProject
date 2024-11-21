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
// prevent back button
// window.onload = function() {
//     window.history.pushState(null, null, window.location.href);
// };

// window.addEventListener('popstate', function() {
//     window.history.pushState(null, null, window.location.href);  

// });



