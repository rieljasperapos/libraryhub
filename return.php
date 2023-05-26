<?php
session_start();

include("./includes/connection.php");
include("./includes/functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="./js/updateBook.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>LibraryHub Books</title>
</head>

<body>
    <!-- Navbar -->
    <?php include './includes/navbar.php'; ?>

    <!-- Showcase -->
    <section class="text-light p-4 text-center d-flex justify-content-center borrow mb-5">
        <div class="container my-3">
            <h1 class="fw-bold">Return</h1>
            <p class="fs-3">See all borrowed books</p>
        </div>
    </section>

   <!-- forms -->
<section class="container-fluid mt-5">
    <!-- To Return -->
    <div class="col-md-8 offset-md-2">
        <div class="container-fluid mt-4 mb-5 border p-4">
            <h3 class="fw-bold">To Return</h3>
            <div class="table-responsive-xxl">
                <?php
                // Create a query to retrieve data from the borrow table
                $sql = "SELECT borrow.borrowId, borrow.bookId, borrow.borrowDate, borrow.accountId, books.bookTitle, accounts.accountId, accounts.firstName, accounts.lastName
                FROM borrow
                INNER JOIN books ON borrow.bookId = books.bookId
                INNER JOIN accounts ON borrow.accountId = accounts.accountId";

                // Execute the query
                $result = mysqli_query($con, $sql);
                // Check if there are any rows returned
                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='table-responsive'>
                        <table class='table table-hover table-bordered table-custom-width'>
                            <thead class='table-primary'>
                                <tr>
                                    <th class='text-center'>Borrow ID</th>
                                    <th class='text-center'>Account ID</th>
                                    <th>Borrower Name</th>
                                    <th class='text-center'>Book ID</th>
                                    <th>Book Title</th>
                                    <th class='text-center'>Borrowed Date</th>
                                </tr>
                            </thead>
                            <tbody>";

                    // Loop through each row and display the data
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td class='text-center'>{$row['borrowId']}</td>
                            <td class='text-center'>{$row['accountId']}</td>
                            <td>{$row['firstName']} {$row['lastName']}</td>
                            <td class='text-center'>{$row['bookId']}</td>
                            <td>{$row['bookTitle']}</td>
                            <td class='text-center'>{$row['borrowDate']}</td>
                        </tr>";
                    }

                    echo "</tbody>
                        </table>
                    </div>";
                } else {
                    echo "<p>No borrow data available.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</section>


    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>

<?php
mysqli_close($con);

?>