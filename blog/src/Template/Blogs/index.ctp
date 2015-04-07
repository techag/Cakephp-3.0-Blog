<script type="text/javascript">
    $('.my_blogs').addClass("my_blogs active");
</script>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xs-12 col-md-6"><h4>Bootstrap Snipp for Datatable</h4></div>
            <div class="col-xs-12 col-md-2 create_blog"><a href="/blogs/create" class="btn btn-success btn-block btn-lg">Create </a>
            </div>
        </div>
        <hr class="colorgraph">
        <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped">
                <thead>                    
                <th>Title</th>
                <th>Topic</th>
                <th><?= $this->Paginator->sort('Date'); ?></th>
                <th>Total Comments</th>
                <th>Comments</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>

                </tr></thead>
                <tbody>
                    <?php foreach ($blogs as $blog): ?>
                        <tr>                        
                            <td><?= $blog->title; ?></td>
                            <td><?= $blog->topic->name; ?></td>
                            <td><?= $blog->created; ?></td>                        
                            <td><?= count($blog->comments); ?></td>                        
                            <td><?= (($blog->active_comments) == 1 ? 'Enabled' : 'Disabled') ?></td>
                            <td>    
                                <p data-placement="top" data-toggle="tooltip" title="" data-original-title="Delete">                                   
                                    <a href="/blogs/view/<?= $blog->id; ?>" class="btn btn-primary btn-xs" data-title="View">
                                        <span class="glyphicon glyphicon-eye-open"></span></a>
                                </p>
                            </td>
                            <td>
                                <p data-placement="top" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <a href="/blogs/create/<?= $blog->id; ?>" class="btn btn-primary btn-xs" data-title="Edit">
                                        <span class="glyphicon glyphicon-pencil"></span></a>
                                </p>
                            </td>
                            <td>    
                                <p data-placement="top" data-toggle="tooltip" title="" data-original-title="Delete">                                   
                                    <a href="/blogs/delete/<?= $blog->id; ?>" class="btn btn-danger btn-xs" data-title="Delete" onclick="return confirm('Are you sure?')">
                                        <span class="glyphicon glyphicon-trash"></span></a>
                                </p>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

            <div class="clearfix"></div>
            <div class="text-center">
                <ul class="pagination">
                    <?php
                    echo $this->Paginator->prev('<span class="glyphicon glyphicon-chevron-left"></span>');
                    echo $this->Paginator->numbers();
                    echo $this->Paginator->next('<span class="glyphicon glyphicon-chevron-right">');
                    ?>
                </ul>

            </div>
        </div>

    </div>
</div>