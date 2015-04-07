<div class="row">
    <div class="col-md-8">
        <h2><?= __('User'); ?></h2>
        <table class="table table-bordered">
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('email'); ?></th>            
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->id); ?>&nbsp;</td>
            <td><?= h($user->email); ?>&nbsp;</td>            
            <td><?= h($user->created); ?>&nbsp;</td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-sm btn-default']); ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-info']); ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # %s?', $user->id), 'class' => 'btn btn-sm btn-danger']); ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </table>
        <p><?= $this->Paginator->counter(); ?></p>
        <ul class="pagination">
        <?php
            echo $this->Paginator->prev('< ' . __('previous'));
            echo $this->Paginator->numbers();
            echo $this->Paginator->next(__('next') . ' >');
        ?>
        </ul>
    </div>
    <div class="col-md-4">
            <h3><?= __('Actions'); ?></h3>
 
            <?= $this->Html->link(__('New Post'), ['action' => 'add'], ['class' => 'btn btn-default']); ?>
    </div>
</div>
