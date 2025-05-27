function selectRow(row) {
    // Remove the 'selected' class from all rows
    var rows = document.querySelectorAll('#bookTable tr');
    rows.forEach(function (row) {
        row.classList.remove('selected');
    });

    // Add the 'selected' class to the clicked row
    row.classList.add('selected');

    // Update the form fields with the selected row data
    document.getElementById('selectedBookId').value = row.cells[0].innerText;
    // Display the selected book ID
    document.getElementById('selectedBookIdDisplay').innerText = row.cells[0].innerText;
    document.getElementById('selectedBookName').value = row.cells[2].innerText;
    // Clear the image input field
    document.getElementById("image").value = "";
    document.getElementById('selectedAuthor').value = row.cells[3].innerText;
    document.getElementById('selectedGenre').value = row.cells[4].innerText;
    document.getElementById('selectedPublicationDate').value = row.cells[5].innerText;

    // Remove the dollar sign from the price before setting the value
    var price = row.cells[6].innerText.replace('$', '');
    document.getElementById('selectedPrice').value = price;
}
