let allLinks = document.querySelectorAll('.text-white');

for (let link of allLinks) {
    link.onclick = function(event) {
        // Loop over all links and reset their background color and text color
        for (let li of allLinks) {
            li.style.backgroundColor = ''; // Reset background color to default
            li.style.color = ''; // Reset text color to default
        }

        // Set the background color and text color of the clicked link
        event.target.style.backgroundColor = 'blue';

    }
}
a
