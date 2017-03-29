<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo isset($page_header) ? $page_header : ''; ?>
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
<?php 
if ($this->session->flashdata('success')) {
    echo notifications('success', $this->session->flashdata('success'));
}
if ($this->session->flashdata('error')) {
    echo notifications('error', $this->session->flashdata('error'));
}
if (validation_errors()) {
    echo notifications('warning', validation_errors('<p>', '</p>'));
}
?>
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo isset($panel_heading) ? $panel_heading : ''; ?> </h3>
                </div><!-- /.box-header -->
<?php
$page = !empty($this->uri->segment(3)) ? $this->uri->segment(3) : '';

switch ($page) {
    case 'view':
        echo '<div class="row"><div class="col-md-8">' .
        form_open('', array('role' => 'form', 'class'=>'form-horizontal')) .
        '<div class="box-body">' .
        static_text_h('Title', !empty($title) ? set_value('title', $title) : '') .
        static_text_h('Description', !empty($description) ? set_value('description', $description) : '') .
        static_text_h('Status', !empty($status) ? $status : '') .
        static_text_h('Created At', !empty($created_at) ? $created_at : '') .
        static_text_h('Update At', !empty($updated_at) ? $updated_at : '') .
        '</div>
	    <div class="box-footer">' .
        button(array('name' => 'Back', 'onClick' => 'history.back();', 'value' => 'Back Button')) .
        '</div>' .
        form_close() .
        '</div></div>';
        break;

    case 'add':
    case 'update':
        echo '<div class="row"><div class="col-md-8">'.
        form_open(isset($action) ? $action : '', array('role' => 'form', 'methode' => 'POST')) .
        '<div class="box-body">' .
        form_hidden('id', !empty($id) ? $id : '').
        input_text('Title', array('name' => 'title', 'id' => 'title', 'value' => !empty($title) ? $title : '')) .
        text_area('Description', array('name' => 'description', 'value' => !empty($description) ? $description : '')) .
        drop_down('Status', 'status', $statuses, !empty($status) ? $status : '') .
        '</div>
	    <div class="box-footer">' .
        button_submit(array('name' => 'submit', 'value' => 'Submit Button'), array('name' => 'reset', 'value' => 'Reset Button')) .
        '</div>' .
        form_close();
        echo '</div></div>';
        break;

    default:
        echo '<div class="box-body"><div class="table-responsive" id="table-responsive">';
        echo isset($table) ? $table : '';
        echo '</div></div>';
        break;
}
?>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

