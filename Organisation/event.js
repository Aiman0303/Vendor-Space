function openEditModal(eventID) {
    document.getElementById('editModal').style.display = 'block';

    // Fetch event data using Event_ID
    fetch('event_data.php?id=' + eventID)
        .then(response => response.json())
        .then(eventData => {
            document.getElementById('ID').value = eventData.ID;
            document.getElementById('event_name').value = eventData.event_name;
            document.getElementById('event_location').value = eventData.event_location;
            document.getElementById('date').value = eventData.date;
            document.getElementById('date_end').value = eventData.date_end;
            document.getElementById('event_start').value = eventData.event_start;
            document.getElementById('event_end').value = eventData.event_end;
            document.getElementById('price').value = eventData.price;
            document.getElementById('contact').value = eventData.contact;
            document.getElementById('category').value = eventData.category;
            document.getElementById('Social_media').value = eventData.Social_media;
        });
}

function openDeleteModal(eventID) {
    const confirmation = confirm("Are you sure you want to delete this event?");
    if (confirmation) {
        deleteEvent(eventID);
    }
}

function deleteEvent(eventID) {
    fetch('delete_event.php?id=' + eventID, { method: 'DELETE' })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Event deleted successfully');
                window.location.reload();
            } else {
                alert('Failed to delete event');
            }
        });
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}

window.onclick = function(event) {
    const modal = document.getElementById('editModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};
