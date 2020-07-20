<a href="index.php?page=add-reader">Add reader</a>
<table>
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Age</th>
        <th>Phone</th>
        <th>Email</th>
        <th colspan="2">Action</th>
    </tr>
    <?php if (empty($readers)) : ?>
        <tr>
            <td>No data</td>
        </tr>
    <?php else : ?>
        <?php foreach ($readers as $key => $reader) : ?>
            <td><?php echo ++$key ?></td>
            <td><?php echo $reader->getName() ?></td>
            <td><?php echo $reader->getAge() ?></td>
            <td><?php echo $reader->getPhone() ?></td>
            <td><?php echo $reader->getEmail() ?></td>
            <td><a href="index.php?page=update-reader&id=<?php echo $reader->getId() ?>">Update</a></td>
            <td><a href="index.php?page=delete-reader&id=<?php echo $reader->getId() ?>">Delete</a></td>
        <?php endforeach; ?>
    <?php endif; ?>
</table>