<table>
    <tr>
        <th>STT</th>
        <th>Student Name</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>
    <?php if (empty($listStudent)) : ?>
        <tr>
            <td>No data</td>
        </tr>
    <?php else : ?>
        <?php foreach ($listStudent as $key => $student) : ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $student->getName() ?></td>
                <td><?php echo $student->getClass() ?></td>
                <td><?php echo $student->getPhone() ?></td>
                <td><?php echo $student->getEmail() ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>