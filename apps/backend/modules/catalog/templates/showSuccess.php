<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $TestCatalog->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $TestCatalog->getName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('catalog/edit?id='.$TestCatalog->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('catalog/index') ?>">List</a>
