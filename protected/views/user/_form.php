<?php
/* @var $this UserController */
/* @var $model User */
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
        'focus' => array($model, 'username'),
        'enableAjaxValidation' => true,
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => true,
        ),
    ));
    ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo CHtml::errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model, 'username', array('span' => 5, 'maxlength' => 45)); ?>

    <?php
    echo CHtml::dropDownList('country_id', 'w', array(1 => 'USA', 2 => 'France', 3 => 'Japan'), array(
        'prompt' => '',
        'ajax' => array(
            'type' => 'POST', //request type
            'url' => CController::createUrl('user/dynamiccities'), //url to call.
//Style: CController::createUrl('currentController/methodToCall')
            'update' => '#city_id', //selector to update
//'data'=>'js:javascript statement' 
//leave out the data key to pass all form values through
    )));

//empty since it will be filled by the other dropdown
    echo CHtml::dropDownList('city_id', '', array());

    $this->widget('CMultiFileUpload', array(
        'model' => $model,
        'attribute' => 'images',
        'name' => 'imagess',
        'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
        'duplicate' => 'Duplicate file!', // useful, i think
        'denied' => 'Invalid file type', // useful, i think
    ));
    ?>

    <div class="form-actions">
<?php
echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
    'color' => TbHtml::BUTTON_COLOR_PRIMARY,
    'size' => TbHtml::BUTTON_SIZE_LARGE,
));
?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->