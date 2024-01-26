<!DOCTYPE html>
<html>
<head>
<style>
#regform {
    border: 7px outset black;
    background-color: wheat;
    text-align: center;
    width: 600px; 
    height: 650px; 
    margin: auto;
}
table {
    border-collapse: collapse;
    width: 50%;
    margin: 20px 0;
}
table, th, td {
    border: 1px solid black;
}
th, td {
    padding: 10px;
    text-align: left;
}
.center {
    margin-left: auto;
    margin-right: auto;
}
</style>
</head>
<body background="https://assets.teenvogue.com/photos/5e6bffbbdee1770008c6d9bd/16:9/w_2560%2Cc_limit/GettyImages-577674005.jpg">
    <div id="regform">
        <h2>BOOK REGISTRATION</h2>
        <table class="center">
            <tr>
                <td>
                    <form name="bookForm" action="form.php" method="post">
                        <label for="id">Book ID:</label>
                        <input type="text" id="id" name="id" required><br><br>
                        <label for="name">Book Name:</label>
                        <input type="text" id="name" name="name" required><br><br>
                        <label for="author">Book Author:</label>
                        <input type="text" id="author" name="author" required><br><br>
                        <label for="price">Book Price:</label>
                        <input type="text" id="price" name="price" required><br><br>
                        <input type="submit" name="register" value="Register"><br><br>
                    </form>
                </td>
            </tr>
        </table>

        <h4>SEARCH BY AUTHOR</h4>
        <table class="center">
            <tr>
                <td>
                    <form name="searchForm" action="form.php" method="post">
                        <label for="author">AUTHOR NAME:</label>
                        <input type="text" name="author" id="author">
                        <input type="submit" name="search" value="Search"><br><br>
                    </form>
                </td>
            </tr>
        </table>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "books");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully<br>";

        if (isset($_POST['register'])) {
            $book_id = $_POST['id'];
            $book_name = $_POST['name'];
            $book_author = $_POST['author'];
            $book_price = $_POST['price'];

            $sql1 = "INSERT INTO `tb_books` (`book_id`, `book_name`, `book_author`, `book_price`) VALUES ('$book_id', '$book_name', '$book_author', '$book_price')";
            if (mysqli_query($conn, $sql1)) {
                echo "<br>New record created successfully";
            } else {
                echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
            }
        }

        if (isset($_POST['search'])) {
            $book_author2 = $_POST['author'];  
            echo "book_author: " . $book_author2 . '<br>';
            $sql = "SELECT * FROM tb_books WHERE book_author='$book_author2' ";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                echo $row["book_id"] . '<br>';
                echo $row["book_name"] . '<br>';
                echo $row["book_author"] . '<br>';
                echo $row["book_price"] . '<br>';
            }
        }
        ?>
    </div>
</body>
</html>
