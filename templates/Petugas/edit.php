<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Petuga $petuga
 */
?>

<?php
$this->assign('title', __('Edit Petuga'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Petugas'), 'url' => ['action' => 'index']],
    ['title' => __('View'), 'url' => ['action' => 'view', $petuga->id]],
    ['title' => __('Edit')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($petuga) ?>
    <?php
        echo $this->Form->control('nik');
        echo $this->Form->control('nama') ;
        echo $this->Form->control('username');
        echo $this->Form->control('password') ;
        echo $this->Form->control('telp') ;
        $level = $this->Identity->get('level');
        if($level == 'admin'){
            $option = ['masyarakat'=>'Masyarakat','petugas'=>'Petugas','admin'=>'Admin'];
        }else if($level == 'petugas'){
            $option = ['masyarakat'=>'Masyarakat','petugas'=>'Petugas'];
        }else{
             $option = ['masyarakat'=>'Masyarakat'];
        }
        echo $this->Form->label('level') ;
        echo $this->Form->select('level',$option,['class' => 'form-control' ]);
        ?>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $petuga->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $petuga->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'view', $petuga->id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>