<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $TestProduct->getId() ?></td>
    </tr>
    <tr>
      <th>Catalog:</th>
      <td><?php echo $TestProduct->getCatalogId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $TestProduct->getName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('product/edit?id='.$TestProduct->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('product/index') ?>">List</a>
