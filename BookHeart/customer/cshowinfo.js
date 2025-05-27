function cshowInformation(bookid, bookname, author, genre, date, price, description) {
    // Display an alert to confirm if the user wants to buy the book
    alert("Do you want to buy this book?");
    
    // Set the book information in the information box
    var bookInfo = "Book ID ------------ " + bookid + "<br>" +
                   "Book Name -------- " + bookname + "<br>" +
                   "Author -------------- " + author + "<br>" +
                   "Genre ---------------- " + genre + "<br>" +
                   "Date ------------------ " + date + "<br>" +
                   "Price ---------------- $" + price + "<br>" +
                   "(Description)<br> " + description;

    // Set the bookid in the hidden input field
    document.getElementById("bookidInput").value = bookid;

    // Set the book information in the bookInfo paragraph with a custom font size
    var bookInfoElement = document.getElementById("bookInfo");
    bookInfoElement.innerHTML = bookInfo;
    bookInfoElement.style.fontSize = "18px"; // You can change the size as needed
    bookInfoElement.style.margin= "20px";

    // Show the information box
    document.getElementById("informationBox").style.display = "block";
}

function chideInformation() {
    // Hide the information box when the close button is clicked
    var informationBox = document.getElementById('informationBox');
    informationBox.style.display = 'none';
}

function comments(){
    // Redirect to signin&signup.php when the user clicks on the send comment button
    window.location.href = '../signin&up/signin&up.php';
}
