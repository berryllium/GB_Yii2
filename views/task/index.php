<h2>Список задач</h2>
<ol>
  <?php foreach($list as $key => $task) : ?>
  <li><a href="card?id=<?= $task['id'] ?>&name=<?= $task['name'] ?>"><?= $task['name'] ?></a></li>
  <?php endforeach; ?>
</ol>