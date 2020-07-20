<?php include_once('src/View/Menu/menu.php'); ?>
<br /><a href="index.php?page=add-book">Add book</a><br />
<form action="index.php?page=search-book" method="post">
    <input type="text" name="keyword" placeholder="keyword" />
    <button type="submit">Search</button>
</form>
<table>
    <tr>
        <th>STT</th>
        <th>Name of book</th>
        <th>Author</th>
        <th>Status</th>
        <th colspan="2">Action</th>
    </tr>
    <?php if (empty($books)) : ?>
        <tr>
            <td>No data</td>
        </tr>
    <?php else : ?>
        <?php foreach ($books as $key => $book) : ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $book->getName() ?></td>
                <td><?php echo $book->getAuthor() ?></td>
                <td><?php echo $book->getStatus() ?></td>
                <td><a href="index.php?page=update-book&id=<?php echo $book->getId() ?>">Update</a> </td>
                <td><a href="index.php?page=delete-book&id=<?php echo $book->getId() ?>">Delete</a> </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>