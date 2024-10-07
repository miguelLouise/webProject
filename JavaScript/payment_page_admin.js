const form = document.getElementById('paymentForm');
const tableBody = document.getElementById('tableBody');

// Function to add a new record to the table
function addRecord(tenantName, unitNumber, billAmount, email, dueDate, paymentStatus) {
  if (tenantName && unitNumber && billAmount && email && dueDate && paymentStatus) {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${tenantName}</td>
      <td>${unitNumber}</td>
      <td>$${billAmount}</td>
      <td>${email}</td>
      <td>${dueDate}</td>
      <td>${paymentStatus}</td>
      <td>
        <button class="edit-btn">Edit</button>
        <button class="delete-btn">Delete</button>
      </td>
    `;
    tableBody.appendChild(row);
  } else {
    console.error('All fields must be filled before adding a record');
  }
}

// Delete button functionality
document.getElementById('tableBody').addEventListener('click', function(e) {
  if (e.target.classList.contains('delete-btn')) {
      e.target.closest('tr').remove();
  }
});

// handle form submission
form.addEventListener('submit', (e) => {
  e.preventDefault();
  const tenantName = document.getElementById('tenantName').value;
  const unitNumber = document.getElementById('unitNumber').value;
  const billAmount = document.getElementById('billAmount').value;
  const email = document.getElementById('email').value;
  const dueDate = document.getElementById('dueDate').value;
  const paymentStatus = document.getElementById('paymentStatus').value;
  addRecord(tenantName, unitNumber, billAmount, email, dueDate, paymentStatus);
  form.reset();
});

document.getElementById('tableBody').addEventListener('click', function(e) {
  if (e.target.classList.contains('edit-btn')) {
    const row = e.target.closest('tr');
    const cells = row.querySelectorAll('td');

    document.getElementById('tenantName').value = cells[0].textContent;
    document.getElementById('unitNumber').value = cells[1].textContent;
    document.getElementById('billAmount').value = cells[2].textContent.replace('$', '');
    document.getElementById('email').value = cells[3].textContent;
    document.getElementById('dueDate').value = cells[4].textContent;
    document.getElementById('paymentStatus').value = cells[5].textContent;

    // Add a hidden field to track the row being edited
    form.dataset.editingRow = row.rowIndex;
  }
});

// handle form submission (edit or add)
form.addEventListener('submit', (e) => {
  e.preventDefault(); // Prevent default form submission
  const tenantName = document.getElementById('tenantName').value;
  const unitNumber = document.getElementById('unitNumber').value;
  const billAmount = document.getElementById('billAmount').value;
  const email = document.getElementById('email').value;
  const dueDate = document.getElementById('dueDate').value;
  const paymentStatus = document.getElementById('paymentStatus').value;

  // Check if editing
  if (form.dataset.editingRow) {
    const row = tableBody.rows[form.dataset.editingRow - 1]; 
    row.cells[0].textContent = tenantName;
    row.cells[1].textContent = unitNumber;
    row.cells[2].textContent = `$${billAmount}`;
    row.cells[3].textContent = email;
    row.cells[4].textContent = dueDate;
    row.cells[5].textContent = paymentStatus;
    
    delete form.dataset.editingRow; // Clear the editing state
  } else {
    // Only add a new record if we're not in editing mode
    addRecord(tenantName, unitNumber, billAmount, email, dueDate, paymentStatus);
  }

  form.reset(); // Clear the form
});
