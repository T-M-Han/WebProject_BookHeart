// Function to show book information when "BUY" button is clicked
function showInfo(bookid, bookname, author, genre, date, price, description) {
    // Display an alert asking the user if they want to buy the book
    alert("Do you want to buy this book?");
    
    // Construct the book information string
    var bookInfo = "Book ID ------------ " + bookid + "<br>" +
                   "Book Name -------- " + bookname + "<br>" +
                   "Author -------------- " + author + "<br>" +
                   "Genre ---------------- " + genre + "<br>" +
                   "Date ------------------ " + date + "<br>" +
                   "Price ---------------- $" + price + "<br>" +
                   "(Description)<br> " + description;

    // Set the bookid value in the hidden input field
    document.getElementById("bookidInput").value = bookid;

    // Set the book information in the bookInfo paragraph and adjust font size
    var bookInfoElement = document.getElementById("bookInfo");
    bookInfoElement.innerHTML = bookInfo;
    bookInfoElement.style.fontSize = "18px"; // You can adjust the size as needed
    bookInfoElement.style.margin = "20px";

    // Show the information box and registration form container
    document.getElementById("informationBox").style.display = "block";
    document.getElementById("registrationFormContainer").style.display = "block";
}

// Function to hide the information box and registration form container
function hideInformation() {
    document.getElementById('informationBox').style.display = 'none';
    document.getElementById('registrationFormContainer').style.display = 'none';   
}
