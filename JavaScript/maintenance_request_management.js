// Sample data for maintenance requests
let requests = [
    {
        name: 'John Doe',
        email: 'john.doe@example.com',
        unit: 'A101',
        date: '2024-10-01',
        category: 'Plumbing',
        urgency: 'High',
        description: 'Leaking sink in the kitchen.',
        status: 'Pending'
    },
    {
        name: 'Jane Smith',
        email: 'jane.smith@example.com',
        unit: 'B202',
        date: '2024-10-02',
        category: 'Electrical',
        urgency: 'Medium',
        description: 'Light in the bedroom flickers occasionally.',
        status: 'Ongoing'
    }
];

// Function to display dynamic date and time
function displayDateTime() {
    const dateTimeElement = document.getElementById('dateTime');
    const now = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
    dateTimeElement.innerHTML = now.toLocaleDateString('en-US', options);
}

// Function to delete a request by index
function deleteRequest(index) {
    requests.splice(index, 1);
    loadRequests();
}

// Function to display requests in the table
function loadRequests() {
    const tbody = document.getElementById('maintenance-requests');
    tbody.innerHTML = '';

    requests.forEach((request, index) => {
        const row = document.createElement('tr');

        row.innerHTML = `
            <td data-label="Name">${request.name}</td>
            <td data-label="Email">${request.email}</td>
            <td data-label="Unit Number">${request.unit}</td>
            <td data-label="Date">${request.date}</td>
            <td data-label="Issue Category">${request.category}</td>
            <td data-label="Issue Urgency">${request.urgency}</td>
            <td data-label="Description">${request.description}</td>
            <td data-label="Status">
                <select class="status-select">
                    <option value="Pending" ${request.status === 'Pending' ? 'selected' : ''}>Pending</option>
                    <option value="Ongoing" ${request.status === 'Ongoing' ? 'selected' : ''}>Ongoing</option>
                    <option value="Done" ${request.status === 'Done' ? 'selected' : ''}>Done</option>
                </select>
            </td>
            <td data-label="Action">
                <button class="delete-btn" onclick="deleteRequest(${index})">Delete</button>
            </td>
        `;

        tbody.appendChild(row);
    });
}

// Load requests when the page loads
window.onload = function () {
    loadRequests();
    displayDateTime();
    setInterval(displayDateTime, 1000); // Update the time every second
};
