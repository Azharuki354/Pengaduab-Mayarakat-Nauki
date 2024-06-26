<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tanggapan $tanggapan
 */
?>

<?php
$this->assign('title', __('Tanggapan'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Tanggapan'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">

    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($tanggapan->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Isi Tanggapan') ?></th>
                <td><?= h($tanggapan->isi_tanggapan) ?></td>
            </tr>
            <tr>
                <th><?= __('Petuga') ?></th>
                <td><?= $tanggapan->has('petuga') ? $this->Html->link($tanggapan->petuga->nama, ['controller' => 'Petugas', 'action' => 'view', $tanggapan->petuga->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Pengaduan') ?></th>
                <td><?= $tanggapan->has('pengaduan') ? $this->Html->link($tanggapan->pengaduan->isi_laporan, ['controller' => 'Pengaduan', 'action' => 'view', $tanggapan->pengaduan->id]) : '' ?></td>
            </tr>

            <tr>
                <th><?= __('Tgl Tanggapan') ?></th>
                <td><?= h($tanggapan->tgl_tanggapan) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tanggapan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tanggapan->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tanggapan->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['controller'=>'pengaduan', 'action' => 'view', $tanggapan->pengaduan_id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>
