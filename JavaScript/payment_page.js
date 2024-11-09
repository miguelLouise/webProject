document.getElementById('paymentForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const name = document.getElementById('name').value.trim();
    const mobile = document.getElementById('mobile').value.trim();
    const reference = document.getElementById('reference').value.trim();
    const screenshot = document.getElementById('screenshot').files.length;

    // Check if all fields are filled
    if (name && mobile && reference && screenshot > 0) {
        // Show the popup modal
        const modal = document.getElementById('popupModal');
        modal.style.display = 'flex';

        // Close the modal when the close button is clicked
        document.querySelector('.close-btn').addEventListener('click', () => {
            modal.style.display = 'none';
        });

        // Close the modal when clicking outside the content
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    } else {
        alert('Please fill in all fields and upload the payment screenshot.');
    }
});
