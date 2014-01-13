<?php
/* @var $this UserController */
/* @var $user User */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'user-form',
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($user); ?>

    <?php echo $form->textFieldControlGroup($user, 'username', array('span' => 5, 'maxlength' => 45)); ?>

    <?php
    $this->widget('CMultiFileUpload', array(
        'model' => $user,
        'attribute' => 'images',
        'name' => 'imagess',
        'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
        'duplicate' => 'Duplicate file!', // useful, i think
        'denied' => 'Invalid file type', // useful, i think
    ));
    ?>

    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'image-grid',
        'dataProvider' => $image,
        'columns' => array(
            'id',
            'username',
            'name',
            'image_file',
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{update}  {delete}',
                'buttons' => array(
                    'update' => array(
                        'label' => 'wahahaha',
                        'url' => 'Yii::app()->createUrl("image/update", array("id"=>$data->id))',
                        'option' => array(
                            'class' => 'btn btn-small btn-success'
                        )
                    ),
                     'delete' => array(
                        'label' => 'wahahaha',
                        'url' => 'Yii::app()->createUrl("image/delete", array("id"=>$data->id))',
                        'option' => array(
                            'class' => 'btn btn-small btn-success'
                        )
                    )
                )
            ),
        ),
    ));
    ?>

    <div class="form-actions">
        <?php
        echo TbHtml::submitButton($user->isNewRecord ? 'Create' : 'Save', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_LARGE,
        ));
        ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->