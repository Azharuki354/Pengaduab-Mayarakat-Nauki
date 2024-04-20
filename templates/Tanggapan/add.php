<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tanggapan $tanggapan
 */
use Cake\I18n\FrozenTime;
$time = FrozenTime::now();
?>

<?php
$this->assign('title', __('Add Tanggapan'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Tanggapan'), 'url' => ['action' => 'index']],
    ['title' => __('Add')],
]);
?>
 
<div class="card card-primary card-outline">
    <?= $this->Form->create($tanggapan, ['valueSources' => ['query', 'context']]) ?>
    <div class="card-body">
                <?= $this->Form->control('tgl_tanggapan',['value'=>$time->i18nFormat('yyyy-MM-dd HH:mm:ss'),'type'=>'hidden']) ?>
                <?= $this->Form->control('pengaduan_id', ['options' => $pengaduan, 'class' => 'form-control']) ?>
                <?= $this->Form->control('isi_tanggapan',['type'=>'textarea']) ?>
                <?= $this->Form->control('petugas_id', [ 'type'=>'hidden', 'value'=>$this->Identity->get('id'), 'class' => 'form-control']) ?>
                
            </div>
            <div class="card-footer d-flex">
                <div class="ml-auto">
                    <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
                </div>
            </div>
    <?= $this->Form->end() ?>
</div>