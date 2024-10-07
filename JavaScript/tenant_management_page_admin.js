document.getElementById('tenant-form').addEventListener('submit', function(e) {
    e.preventDefault();

    // Get form values
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const dob = document.getElementById('dob').value;
    const gender = document.querySelector('input[name="gender"]:checked').value;
    const address = document.getElementById('address').value;
    const unit = document.getElementById('unit').value;
    const contact = document.getElementById('contact').value;

    // Add new row to the table
    const table = document.getElementById('tenant-list');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${name}</td>
        <td>${email}</td>
        <td>${dob}</td>
        <td>${gender}</td>
        <td>${address}</td>
        <td>${unit}</td>
        <td>${contact}</td>
        <td>
            <div class="btn-group">
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button>
            </div>
        </td>
    `;

    table.appendChild(newRow);
    document.getElementById('tenant-form').reset();
});

// Delete button functionality
document.getElementById('tenant-list').addEventListener('click', function(e) {
    if (e.target.classList.contains('delete-btn')) {
        e.target.closest('tr').remove();
    }
});

// Edit button functionality
document.getElementById('tenant-list').addEventListener('click', function(e) {
    if (e.target.classList.contains('edit-btn')) {
        const row = e.target.closest('tr');
        const cells = row.querySelectorAll('td');
        
        // Populate form with row data
        document.getElementById('name').value = cells[0].innerText;
        document.getElementById('email').value = cells[1].innerText;
        document.getElementById('dob').value = cells[2].innerText;
        document.querySelector(`input[name="gender"][value="${cells[3].innerText}"]`).checked = true;
        document.getElementById('address').value = cells[4].innerText;
        document.getElementById('unit').value = cells[5].innerText;
        document.getElementById('contact').value = cells[6].innerText;

        // Remove row on edit to avoid duplicates
        row.remove();
    }
});
