<div class="well">
    <h2> Edit <?= Inflector::humanize($model_name) ?> </h2>
    <?= $this->Html->link(
        '< Back',
        array('action' => 'view', $id),
        array('class' => 'btn btn-small btn-primary')
    ) ?>
</div>

<?= $this->Form->create(); ?>
    <?
        foreach($fields as $field => $fieldoptions) {
            if(is_array($fieldoptions)) {
                echo $this->Form->input($field, $fieldoptions);
            }
            else {
                echo $this->Form->input($field, array('label' => $fieldoptions));
            }
        } 
    ?>
    <?= $this->Form->submit('Save') ?>
<?= $this->Form->end() ?>
 