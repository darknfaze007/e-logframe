<?php include(APPPATH . 'views/common/head.php'); ?>
		<body>
			<?php include(APPPATH . 'views/common/navigation.php'); ?>
				<div class="container-fluid" id="content">
				<?php include(APPPATH . 'views/common/left.php'); ?>
				<div id="main">
				<div class="container-fluid">
				<?php include(APPPATH . 'views/common/pageheader.php'); ?>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="<?php echo site_url('home')?>">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="<?php echo base_url() ?>index.php/forms">Forms</a>
						</li>
					</ul>
				<div class="close-bread">
					<a href="#">
						<i class="fa fa-times"></i>
					</a>
				</div>
				</div>
				<div class="row">
				<div class="col-sm-3">
					<p>&nbsp;</p>
					<p>
						<a href="<?php echo base_url() ?>index.php/forms/add" class="btn btn-primary btn--icon"><i class="fa fa-plus"></i>Add</a>
					</p>
				</div>
				</div>
				<div class="row">
				<div class="col-sm-12">
				<div class="box box-color box-bordered">
				<div class="box-title">
					<h3>
						Forms
					</h3>
				</div>
				<div class="box-content nopadding">
<table class="table table-hover table-nomargin table-bordered dataTable dataTable-column_filter" data-column_filter_types="null,select,select,text,null" data-column_filter_dateformat="yy-mm-dd"  data-nosort="0" data-checkall="all">
<thead>
<tr>

<th>Form name</th>
<th>Form type</th>
<th>Status</th>
<th>Project</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach ($rows->result() as $row): ?>
<tr>

<td><?php echo $row->form_name; ?></td>
<td><?php 
$category = $this->formcategoriesmodel->get_by_id($row->form_type)->row();
echo $category->form_category;
?></td>
<td><?php echo $row->status; ?></td>
<td><?php 
$project = $this->projectsmodel->get_by_id($row->project_id)->row();
echo $project->project_title;
?></td>
<td><a href="<?php echo base_url() ?>index.php/forms/edit/<?php echo $row->id; ?>" class="btn" rel="tooltip" title="Edit">

			<i class="fa fa-edit"></i>
</a>
<a href="<?php echo base_url() ?>index.php/forms/builder/<?php echo $row->id; ?>" class="btn" rel="tooltip" title="Form Elements" >

			<i class="fa fa-bars"></i>
</a>
<!--<a href="<?php echo base_url() ?>forms/delete/<?php echo $row->id; ?>" class="btn" rel="tooltip" title="Delete" onClick="return confirm('Are you sure you want to delete? This action is not reversable')">

			<i class="fa fa-times"></i>
</a>-->
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
	</body>
</html>
