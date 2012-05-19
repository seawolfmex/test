<h1>TestProducts List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Catalog</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($TestProducts as $TestProduct): ?>
    <tr>
      <td><a href="<?php echo url_for('product/show?id='.$TestProduct->getId()) ?>"><?php echo $TestProduct->getId() ?></a></td>
      <td><?php echo $TestProduct->getCatalogId() ?></td>
      <td><?php echo $TestProduct->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('product/new') ?>">New</a>
