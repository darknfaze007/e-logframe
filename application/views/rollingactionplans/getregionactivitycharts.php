<?php include(APPPATH . 'views/common/head.php'); ?>
<script>
		
   function trim(str){
	return str.replace(/^\s\s*/, '').replace(/\s\s*$/, '');}
	function totalEncode(str){
	var s=escape(trim(str));
	s=s.replace(/\+/g,"+");
	s=s.replace(/@/g,"@");
	s=s.replace(/\//g,"/");
	s=s.replace(/\*/g,"*");
	return(s);
	}
	function connect(url,params)
	{
	var connection;  // The variable that makes Ajax possible!
	try{// Opera 8.0+, Firefox, Safari
	connection = new XMLHttpRequest();}
	catch (e){// Internet Explorer Browsers
	try{
	connection = new ActiveXObject("Msxml2.XMLHTTP");}
	catch (e){
	try{
	connection = new ActiveXObject("Microsoft.XMLHTTP");}
	catch (e){// Something went wrong
	return false;}}}
	connection.open("POST", url, true);
	connection.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	connection.setRequestHeader("Content-length", params.length);
	connection.setRequestHeader("connection", "close");
	connection.send(params);
	return(connection);
	}
	
	function validateForm(frm){
	var errors='';
		
	if (errors){
	alert('The following error(s) occurred:\n'+errors);
	return false; }
	return true;
	}
	
	function Getactivities(frm){
	if(validateForm(frm)){
	document.getElementById('activities').innerHTML='';
	var url = "<?php echo base_url(); ?>index.php/projectactivities/getplannedactivities";
	
	var params = "project_id=" + totalEncode(document.frm.project_id.value );
	var connection=connect(url,params);
	
	connection.onreadystatechange = function(){
	if(connection.readyState == 4){
		document.getElementById('activities').innerHTML=connection.responseText;
		
		
	}
	if((connection.readyState == 2)||(connection.readyState == 3)){document.getElementById('activities').innerHTML = '<span style="color:green;">Sending request....</span>';}}}
	}
	
		
	function GetProjects(frm){
	if(validateForm(frm)){
	document.getElementById('projects').innerHTML='';
	var url = "<?php echo base_url(); ?>index.php/outcomeindicatortracking/getprojects";
	
	var params = "organization_id=" + totalEncode(document.frm.organization_id.value );
	var connection=connect(url,params);
	
	connection.onreadystatechange = function(){
	if(connection.readyState == 4){
		document.getElementById('projects').innerHTML=connection.responseText;
		
		
	}
	if((connection.readyState == 2)||(connection.readyState == 3)){document.getElementById('projects').innerHTML = '<span style="color:green;">Sending request....</span>';}}}
	}
	
	function regionList(frm){
	if(validateForm(frm)){
	document.getElementById('regions').innerHTML='';
	var url = "<?php echo base_url(); ?>index.php/rollingactionplans/getregions";
	
	var params =  "project_id="+totalEncode(document.frm.project_id.value );
	var connection=connect(url,params);
	
	connection.onreadystatechange = function(){
	if(connection.readyState == 4){
		document.getElementById('regions').innerHTML=connection.responseText;
		
		
	}
	if((connection.readyState == 2)||(connection.readyState == 3)){document.getElementById('regions').innerHTML = '<span style="color:green;">Sending request....</span>';}}}
	}
	
	
		
		
	</script>
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>

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
							<a href="<?php echo base_url() ?>index.php/ganttchart/getcharts">Projects Gantt Charts</a>
						</li>
					</ul>
				<div class="close-bread">
					<a href="#">
						<i class="fa fa-times"></i>
					</a>
				</div>
				</div>
				<div class="row">
				<div class="col-sm-12">
				<div class="box box-bordered">
				<div class="box-title">
					<h3>
						<i class="fa fa-th-list"></i>Project Gantt Chart Form
					</h3>
				</div>
				<div class="box-content nopadding">
					<?php if(validation_errors()){?>
						<p><div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Note!</strong><?php echo validation_errors(); ?>
							</div>
						</p>
					<?php } ?>
					<?php $attributes = array('name' => 'frm', 'id'=>'frm','enctype' => 'multipart/form-data', 'class'=>'form-horizontal form-striped form-validate');?>
					<?php echo form_open('ganttchart/regionactivityganttchart',$attributes); ?>
                    <table class="table table-nomargin" width="100%">
                                                                <thead>
                                                                	<tr>
                                                                	  <th colspan="2">REGIONAL ACTIVITY GANTT CHARTS</th></tr>
                                                                </thead>
                                                                <tbody>
              <tr><td>
              <!--<div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Organization</label>
                                            <div class="col-sm-10">
                                            <select name="organization_id" id="organization_id" onChange="GetProjects(this)" required="required" class='chosen-select form-control'>
                                            <option value="">Select Organization</option>
                                           <?php foreach ($organizations->result() as $organization): ?>
                                           <option value="<?php echo $organization->id;?>"><?php echo $organization->organization_name;?> </option>
                                           <?php endforeach; ?>
                                            </select>
                                                
                                            </div>
                                        </div>-->
			<div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Project</label>
				<div class="col-sm-10">
                
                <div id="projects">
					  <select name="project_id" id="project_id" onChange="Getactivities(this)" required="required" class='chosen-select form-control'>
                                            <option value="">Select Project</option>
                                           <?php foreach ($projects->result() as $project): ?>
                                           <option value="<?php echo $project->id;?>"><?php echo $project->project_no;?> / <?php echo $project->project_title;?></option>
                                           <?php endforeach; ?>
                                            </select>
                                       </div>     
                                            
                                            
				</div>
			</div>
            
            <div class="form-group">
                                            <label for="textfield" class="control-label col-sm-2">Region</label>
                                            <div class="col-sm-10">
                                            <div id="regions">
                                            <select name="county_id" id="county_id" required="required" class='chosen-select form-control'>
                                            <option value="">Select Region</option>
                                          
                                            </select>
                                            </div>
                                               <a href="javascript:void(0)" title="" class="btn btn-success" style="margin: 5px;" onclick='regionList(this)'>List Project Regions <i class="fa fa-refresh"></i></a>
                                                
                                            </div>
                                        </div>
            
            <div class="form-group">
				<label for="textfield" class="control-label col-sm-2">Planned activity</label>
				<div class="col-sm-10">
					 <div id="activities">
                                            <select name="plannedactivity_id" id="plannedactivity_id" class='chosen-select form-control' required="required">
                                            <option value="">Select Activity</option>
                                            </select>
                                            </div>
				</div>
			</div>

			
            
            
            

			

					<div class="form-actions col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">VIEW CHART</button>
					</div>
                    </td>
                    
                    </tr>
                   
                    </tbody>
                    </table>
                     
				<?php echo form_close(); ?>
 			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>

</body>
</html>
