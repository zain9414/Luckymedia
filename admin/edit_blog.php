<?php
require_once 'auth.php';
require_once '../db.php';

$id = (int)$_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM blogs WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-100">
<?php include 'sidebar.php'; ?>

<div class="flex-1 p-10">

<h2 class="text-2xl font-bold mb-6">Edit Blog</h2>

<form method="POST" enctype="multipart/form-data"
      class="bg-white p-6 rounded shadow max-w-lg">

    <input type="text" name="title"
           value="<?= $row['title']; ?>"
           class="w-full border p-2 mb-4" required>

    <textarea name="content" rows="6"
              class="w-full border p-2 mb-4" required><?= $row['content']; ?></textarea>

    <!-- CATEGORY -->
    <select name="category_id" class="w-full border p-2 mb-4" required>
        <?php
        $cats = mysqli_query($conn, "SELECT * FROM categories");
        while ($c = mysqli_fetch_assoc($cats)) {
            $selected = ($c['id'] == $row['category_id']) ? 'selected' : '';
            echo "<option value='{$c['id']}' $selected>{$c['name']}</option>";
        }
        ?>
    </select>

    <?php if ($row['image']) { ?>
        <img src="../assets/uploads/<?= $row['image']; ?>"
             class="h-32 mb-4 rounded">
    <?php } ?>

    <input type="file" name="image" class="mb-4">

    <button name="update"
            class="bg-red-600 text-white px-6 py-2 rounded">
        Update Blog
    </button>

</form>

<?php
if (isset($_POST['update'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $category_id = (int)$_POST['category_id'];

    if (!empty($_FILES['image']['name'])) {
        $img = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp, "../assets/uploads/$img");

        mysqli_query($conn,
            "UPDATE blogs SET
             title='$title',
             content='$content',
             category_id=$category_id,
             image='$img'
             WHERE id=$id");
    } else {
        mysqli_query($conn,
            "UPDATE blogs SET
             title='$title',
             content='$content',
             category_id=$category_id
             WHERE id=$id");
    }

    header("Location: blog_list.php");
    exit;
}
?>

</div>
</body>
</html>
