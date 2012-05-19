<h1>TestCatalogs List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($TestCatalogs as $TestCatalog): ?>
    <tr>
      <td><a href="<?php echo url_for('catalog/show?id='.$TestCatalog->getId()) ?>"><?php echo $TestCatalog->getId() ?></a></td>
      <td><?php echo $TestCatalog->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('catalog/new') ?>">New</a>
