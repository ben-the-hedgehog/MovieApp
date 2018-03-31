<?php require 'partials/header.php' ?>

<h1>All Users</h1>


<ul>
    <?php foreach ($users as $user): ?>
        <li> <?= $user->name ?> </li>
    <?php endforeach; ?>
</ul>

<form role="form" action="/users" method="post">
    <input name="name"></input>

    <button type="submit">Submit</button>
</form>

<form role="form" action="/users/delete-name" method="post">
    <input name="name"></input>

    <button type="submit">Submit</button>
</form>

<?php require 'partials/footer.php' ?>
