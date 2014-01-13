<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
    <?php echo CHtml::encode($data->username); ?>
    <br />


    <?php
    $gambar = Image::model()->searchByIdUser($data->id);
    if ($gambar->totalItemCount != 0) {
        $this->widget('bootstrap.widgets.TbGridView', array(
            
            'id' => 'image-grid',
            'dataProvider' => $gambar,
            'type' => TbHtml::GRID_TYPE_BORDERED,
            'columns' => array(
                'id',
                'name',
                'image_file',
                array(
                    'name' => 'image_file',
                    'type' => 'raw',
                    'value' => 'TbHtml::imageRounded(Yii::app()->request->baseUrl . "/assets/uploads/" . $data->image_file)',
                ),
                
                array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    
                ),
            ),
        ));
    }
    ?>

</div>