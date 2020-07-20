<form method="post">
    <!-- <input type="text" name="id" hidden /> -->
    <input type="text" name="name" value="<?php echo $book['name'] ?>" placeholder="name of book" />
    <input type="text" name="author" value="<?php echo $book['author'] ?>" placeholder="author of book" />
    <input type="text" name="status" value="<?php echo $book['status'] ?>" placeholder="status of book" />
    <button type="submit"> Update book</button>
</form>