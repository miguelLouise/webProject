const form = document.getElementById('paymentForm');
const tableBody = document.getElementById('tableBody');

// Function to add a new record to the table
function addRecord(tenantName, unitNumber, billAmount, email, dueDate, paymentStatus) {
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
}

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

// edit button 
tableBody.addEventListener('click', (e) => {
  if (e.target.classList.contains('edit-btn')) {
    const row = e.target.parentNode.parentNode;
    const tenantName = row.cells[0].textContent;
    const unitNumber = row.cells[1].textContent;
    const billAmount = row.cells[2].textContent.replace('$', '');
    const email = row.cells[3].textContent;
    const dueDate = row.cells[4].textContent;
    const paymentStatus = row.cells[5].textContent;
    // TO DO: implement edit functionality
  } else if (e.target.classList.contains('delete-btn')) {
    const row = e.target.parentNode.parentNode;
    row.remove();
  }
});