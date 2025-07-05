document.addEventListener("DOMContentLoaded", function() {
    const list = document.getElementById('license-list');
    const overlay = document.getElementById('loading-overlay');
    
    // Show the overlay to disable clicks and show loading state
    overlay.style.visibility = 'visible';

    fetch('../_api/settings/license/list')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Data fetched:', data);

        list.innerHTML = ''; // Clear previous content
        overlay.style.visibility = 'hidden'; // Hide the overlay after data is loaded

        // Check if 'data' exists and contains items
        if (data && data.data && data.data.length) {
            data.data.forEach(item => {
                const li = document.createElement('li');
                li.textContent = `${item.full_name} (Short Name: ${item.short_name}, License ID: ${item.license_id})`;
                list.appendChild(li);
            });
        } else {
            list.innerHTML = '<li>No licenses available.</li>';
        }
    })
    .catch(error => {
        console.error('Error fetching data:', error);
        overlay.style.visibility = 'hidden'; // Hide the overlay even in case of error
        list.innerHTML = '<li>Error loading data.</li>';
    });
});
