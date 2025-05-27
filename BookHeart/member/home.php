<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Link to external stylesheet -->
    <title>BOOK HEART - HOME</title>
</head>

<body>
    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li>
                <div class="header">
                    <p>BOOK HEART</p> <!-- Site header -->
                </div>
            </li>
            <li><a href="home.php" class="active">HOME</a></li> <!-- Active link to home -->
            <li><a href="books.php">BOOKS</a></li> <!-- Link to books page -->
            <li><a href="about.php">ABOUT</a></li> <!-- Link to about page -->
            <li><a href="review.php">COMMENT</a></li> <!-- Link to review/comment page -->
            <li style="float:right"><a href="profile.php">PROFILE</a></li> <!-- Link to profile page (right-aligned) -->
        </ul>
    </nav>

    <!-- Promotions Section -->
    <div class="promotions-section">
        <h2>Special Promotions</h2>
        <!-- Promotion 1 -->
        <div class="promotion">
            <img src="/BookHeart/Images/promotion1.jpg" alt="Promotion 1"> <!-- Promotion image -->
            <p><a href="books.php"style="color: #ffffff;">Get 20% off on all fiction books. Limited time offer!</a></p> <!-- Promotion text -->
        </div>
        <!-- Promotion 2 -->
        <div class="promotion">
            <img src="/BookHeart/Images/promotion2.png" alt="Promotion 2"> <!-- Promotion image -->
            <p><a href="books.php"style="color: #ffffff;">Buy one, get one free on selected non-fiction titles.</a></p> <!-- Promotion text -->
        </div>
    </div>

    <!-- Best Sellers Section -->
    <div class="best-sellers-section">
        <h2>Best Sellers</h2>
        <div class="best-sellers-list">
            <!-- Best Seller 1 -->
            <div class="best-seller">
                <img src="/BookHeart/Images/best_seller1.png" alt="Best Seller 1"> <!-- Best seller image -->
                <center><p>RICH DAD POOR DAD</p> <!-- Book title -->
                <p>Robert T.Kiyosaki</p><center> <!-- Author -->
            </div>
            <!-- Best Seller 2 -->
            <div class="best-seller">
                <img src="/BookHeart/Images/best_seller2.png" alt="Best Seller 2"> <!-- Best seller image -->
                <center><p>BECOMING</p> <!-- Book title -->
                <p>Michelle Obama</p><center> <!-- Author -->
            </div>
            <!-- Best Seller 3 -->
            <div class="best-seller">
                <img src="/BookHeart/Images/best_seller3.png" alt="Best Seller 3"> <!-- Best seller image -->
                <center><p>THE RIVER OF LOST FOOTSTEPS</p> <!-- Book title -->
                <p>Thant Myint-U</p><center> <!-- Author -->
            </div>
        </div>
        <!-- Read More Link -->
        <p><center><a href="books.php" style="color: #ffffff;">READ MORE!</a><center></p>
    </div>

    <!-- Mission & Vision Section -->
    <div class="mv-section">
        <h2>MISSON & VISION</h2>
        <!-- Mission Statement -->
        <h4>Mission Statement:</h4>
        <p>
            At Book Heart, our mission is to foster a love for literature, inspire imagination,
            and create a vibrant community of readers. We are dedicated to providing a diverse and
            curated selection of books, fostering an inclusive and welcoming environment, and
            promoting literacy and a lifelong passion for learning.
        </p>
        <!-- Vision Statement -->
        <h4>Vision Statement:</h4>
        <p>
            Book Heart envisions a world where everyone has access to the transformative power of literature.
            We aspire to be a cultural hub that transcends generations, connecting people through
            the joy of reading. Our vision is to cultivate a community where diverse voices are celebrated,
            ideas are exchanged, and the magic of storytelling is embraced as a universal language.
        </p>
        <!-- Learn More Link -->
        <p><a href="about.php" style="color: #ffffff;">LEARN MORE!</a></p>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Book Heart. All rights reserved.</p> <!-- Copyright information -->
    </footer>
</body>

</html>
