<div class="well">
    <h2> Create <?= Inflector::humanize($model_name) ?> </h2>
    <?= $this->Html->link(
        '< Back',
        array('action' => 'index'),
        array('class' => 'btn btn-small btn-primary')
    ) ?>
</div>

<?= $this->Form->create(); ?>
    <?foreach($fields as $field => $fieldoptions): ?>
        <?= $this->Form->input($field,$fieldoptions);?>
    <? endforeach ?>
    <input type="submit" value="Submit"/>
<?= $this->Form->end() ?>
 