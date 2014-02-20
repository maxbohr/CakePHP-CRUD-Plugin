<div class="well">
    <h2> View <?= Inflector::humanize($model_name) ?> </h2>
    <?= $this->Html->link(
        '< Back',
        array('action' => 'index'),
        array('class' => 'btn btn-small btn-primary')
    ) ?>
    <?= $this->Html->link(
        'Edit',
        array('action' => 'edit', $id),
        array('class' => 'btn btn-small btn-primary')
    ) ?>
    <?= $this->Html->link(
        'Delete',
        array('action' => 'delete', $id),
        array('class' => 'btn btn-small btn-danger')
    ) ?>
</div>

<table class="table table-bordered">
    <?foreach($fields as $field => $fieldoptions): ?>
        <tr>
            <th> <?= Inflector::humanize($field) ?> </th>
            <td> <?= @$item[$model_name][$field] ?> </td>
        </tr>
    <? endforeach ?>
</table>
