// Show and hide different sections of the messaging page
function showInbox() {
    hideAllSections();
    document.getElementById('inbox').classList.add('active');
}

function showNewMessageForm() {
    hideAllSections();
    document.getElementById('new-message-form').classList.add('active');
}

function showSentMessages() {
    hideAllSections();
    document.getElementById('sent-messages').classList.add('active');
}

function showDrafts() {
    hideAllSections();
    document.getElementById('drafts').classList.add('active');
}

function hideAllSections() {
    const sections = document.querySelectorAll('.message-section');
    sections.forEach(section => section.classList.remove('active'));
}
