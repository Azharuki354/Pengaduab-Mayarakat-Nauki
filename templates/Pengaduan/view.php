<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pengaduan $pengaduan
 */
use Cake\I18n\FrozenTime;
$time = FrozenTime::now();
?>

<?php
$this->assign('title', __('Pengaduan'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Pengaduan'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
$status=['0'=>'Baru','proses'=>'Proses','selesai'=>'Selesai'];
?>

<div class="view card card-primary card-outline">

    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
        <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($pengaduan->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Foto') ?></th>
                <td><?= $this->Html->image($pengaduan->foto, ['alt' => 'CakePHP' , 'width' => '100px' ]) ?></td>
            </tr>
            <tr>
                <th><?= __('Isi Laporan') ?></th>
                <td><?= h($pengaduan->isi_laporan) ?></td>
            </tr>
            <tr>
                <th><?= __('Petuga') ?></th>
                <td><?= $pengaduan->has('petuga') ? $this->Html->link($pengaduan->petuga->nama, ['controller' => 'Petugas', 'action' => 'view', $pengaduan->petuga->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Status') ?></th>
                <td><?= h($status[$pengaduan->status]) ?></td>
            </tr>
            <tr>
                <th><?= __('Tgl Pengaduan') ?></th>
                <td><?= h($pengaduan->tgl_pengaduan) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pengaduan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pengaduan->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pengaduan->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="related related-tanggapan view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Tanggapan') ?></h3>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Nama') ?></th>
                <th><?= __('Isi Tanggapan') ?></th>
                <th><?= __('Tgl Tanggapan') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($pengaduan->tanggapan)) : ?>
                <tr>
                    <td colspan="6" class="text-muted">
                        <?= __('Tanggapan record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($pengaduan->tanggapan as $tanggapan) : ?>
                    <tr>
                        <td><?= h($petugas[$tanggapan->petugas_id]) ?></td>
                        <td><?= h($tanggapan->isi_tanggapan) ?></td> 
                        <td><?= h($tanggapan->tgl_tanggapan) ?></td>
                        <td class="actions">
                        
                            <?= $this->Html->link(__('View'), ['controller' => 'Tanggapan', 'action' => 'view', $tanggapan->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?php if($this->Identity->get('level')==='admin'||$this->Identity->get('level')==='petugas'): ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Tanggapan', 'action' => 'edit', $tanggapan->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tanggapan', 'action' => 'delete', $tanggapan->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $tanggapan->id)]) ?>
                            <?php endif;?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <?php if($this->Identity->get('level')==='admin'||$this->Identity->get('level')==='petugas'): ?>
        <div class="card card-primary card-outline">
            <?= $this->Form->create(null, ['url' => ['controller'=>'tanggapan', 'action'=>'add'],'role'=>'form']) ?>
            
            <div class="card-body">
                <?= $this->Form->control('tgl_tanggapan',['value'=>$time->i18nFormat('yyyy-MM-dd HH:mm:ss'),'type'=>'hidden']) ?>
                <?= $this->Form->control('isi_tanggapan',['type'=>'textarea']) ?>
                <?= $this->Form->control('petugas_id', [ 'type'=>'hidden', 'value'=>$this->Identity->get('id'), 'class' => 'form-control']) ?>
                <?= $this->Form->control('pengaduan_id', [ 'type'=>'hidden', 'value'=>$pengaduan->id, 'class' => 'form-control']) ?>
            </div>
            <div class="card-footer d-flex">
                <div class="ml-auto">
                    <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
                </div>
            </div>
            
            <?= $this->Form->end() ?>
        </div>
        <?php endif;?>
    </div>
</div>
