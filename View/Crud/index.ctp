<div class="well">
    <h2> <?= Inflector::humanize(Inflector::pluralize($model_name)) ?> </h2>
    <?= $this->Html->link(
        'Create',
        array('action' => 'add'),
        array('class' => 'btn btn-success')
    ) ?>
</div>

<div>
    <?= $this->element(
        'data_table',
        array('model' => $model_name),
        array('plugin' => 'DataTable')
    ) ?>
</div>
