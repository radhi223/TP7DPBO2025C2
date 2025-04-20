<?php
require_once 'class/Book.php';
require_once 'class/Member.php';
require_once 'class/Loan.php';

$book = new Book();
$member = new Member();
$loan = new Loan();

if (isset($_POST['borrow'])) {
    $loan->borrowBook($_POST['book_id'], $_POST['member_id']);
}
if (isset($_GET['return'])) {
    $loan->returnBook($_GET['return']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'view/header.php'; ?>
    <main>
        <h2>Welcome to Library System</h2>
        <nav>
            <a href="?page=books">Books</a> |
            <a href="?page=members">Members</a> |
            <a href="?page=loans">Loans</a> | 
            <a href="?page=daftar_member" class="btn btn-primary">Daftar Member</a>
        </nav>

        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'books') include 'view/books.php';
            elseif ($page == 'members') 
            {
                if (isset($_GET['daftar'])) {
                    if (isset($_POST['nama'])) $nama = $_POST['nama'];
                    if (isset($_POST['email'])) $email = $_POST['email'];
                    if (isset($_POST['notelp'])) $notelp = $_POST['notelp'];
                    $member->InputMember($nama, $email, $notelp);
                }
                include 'view/members.php';
            }
            elseif ($page == 'loans') include 'view/loans.php';
            elseif ($page == 'daftar_member') include 'view/insert.php';
        }
        ?>
    </main>
    <?php include 'view/footer.php'; ?>
</body>
</html>