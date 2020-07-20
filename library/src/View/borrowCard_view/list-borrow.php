<a href="index.php?page=add-borrow">Add borrow card</a>
<table>
    <tr>
        <th>STT</th>
        <th>Borrow Date</th>
        <th>Return Date</th>
        <th>Reader ID</th>
    </tr>
    <?php if (empty($borrowCards)) : ?>
        <tr>
            <td>No data</td>
        </tr>
    <?php else : ?>
        <?php foreach ($borrowCards as $key => $borrowCard) : ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $borrowCard->getBorrow_date() ?></td>
                <td><?php echo $borrowCard->getReturn_date() ?></td>
                <td><?php echo $borrowCard->getReader_id() ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>