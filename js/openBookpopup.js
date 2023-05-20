function openBookPopup(bookId) {
  // Retrieve book details using AJAX or perform any necessary actions
  // For example, you can make an AJAX request to fetch book details from the server

  // Once you have the book details, you can display a pop-up with the information
  // You can use JavaScript libraries like Bootstrap modal or create a custom pop-up

  // Here's an example using JavaScript's built-in `alert()` function:
    alert("Book ID: " + bookId);
}

function addShadow(element) {
    element.classList.add("shadow");
    element.style.transform = "scale(1.1)";
    element.style.transition = "transform 0.3s ease";
}

function removeShadow(element) {
    element.classList.remove("shadow");
    element.style.transform = "";
    element.style.transition = "";
}

