<div class="well">
    <h2> Create <?= Inflector::humanize($model_name) ?> </h2>
    <?= $this->Html->link(
        '< Back',
        array('action' => 'index'),
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
    <input type="submit" value="Submit"/>
<?= $this->Form->end() ?>
 