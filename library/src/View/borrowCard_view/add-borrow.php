<form method="post">
    <p1>Borrow Date: </p1>
    <input type="date" name="borrow_date" />
    <p1>Return Date: </p1>
    <input type="date" name="return_date" />
    <select name="status">
        <option value="Borrow book">Borrow book</option>
        <option value="Return book">Return book</option>
    </select>
    <select name="reader_id">
        <?php foreach ($readers as $reader) : ?>
            <option value="<?php echo $reader->getName() ?>"></option>
        <?php endforeach; ?>
    </select>
    <button type="submit"> Add borrow card</button>
</form>