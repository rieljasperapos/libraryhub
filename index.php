<?php

session_start();

include("./includes/connection.php");
include("./includes/functions.php");
include("./includes/header.php");

$user_data = check_login($con);

?>

<body>
    <!-- Navbar -->
    <?php include './includes/navbar.php'; ?>

    <!-- Showcase -->

    <section class="text-light p-5 text-center d-flex justify-content-center welcome">
        <div class="container my-3">
            <h1 class="fw-bold">Hello, <?php echo $user_data['firstName']; ?>!</h1>
            <h1 class="fw-bold">Welcome to Our Library</h1>
            <p class="lead">Explore our vast collection of books and enjoy reading!</p>
            <input href="#bookpage" type="button" class="btn btn-warning btn-lg mt-3" value="View Books" onclick="scrollToBookPage()">
        </div>
    </section>

    <!-- Boxes -->
    <section class="p-5">
        <div class="container d-flex justify-content-center mb-4" id="bookpage">
            <h1>Books</h1>
        </div>
        <div class="container d-flex justify-content-center">
            <div class="card-group text-center justify-content-center">
                <?php
                // Create a query
                $sql = "SELECT bookId, bookTitle, author, publishDate, photo, synopsis FROM books";
                // Execute the query
                $result = mysqli_query($con, $sql);
                // If there is no result, display an error message
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        $bookId = $row['bookId'];
                        $synopsis = $row['synopsis'];
                        echo '<div class="booksize text-center">
                    <div class="book-image" onMouseOver="addShadow(this)" onMouseOut="removeShadow(this)" onClick="openBookPopup(' . $bookId . ', `' . addslashes($synopsis) . '`)">
                    <img src="images/book/' . $row['photo'] . '" class="image-fluid">
                    </div>
                    <p>Book ID:' . $row['bookId'] . '<br>' . $row['bookTitle'] . '</p>
                </div>';
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Bootstrap Modal for Book Details -->
    <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookModalLabel">Book Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bookModalBody">
                    <!-- Book details content will be dynamically updated by JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <?php include 'footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>

<?php
mysqli_close($con);

?>