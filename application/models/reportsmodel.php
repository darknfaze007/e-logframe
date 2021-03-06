<?php
/**
DO NOT REMOVE THIS NOTICE FROM THE CODE
 This code belongs to Joash Gomba (The developer).
The code cannot be reproduced without the express written permission of the developer.
The code can only be changed, enhanced or modified for the sole purpose of adding features or customizing the eLogFrame system.
Contravention of any of the above stated rules will constitute a violation of copyright laws.
**/
class Reportsmodel extends CI_Model {

   private $tbl_roles= 'regions';
	 
   function __construct()
   {
       parent::__construct();
   }
   //get all the roles
   
   function get_project_by_sector($sector_id)
   {
	   $sql = 'SELECT *
		FROM projectsectors
		WHERE sector_id = '.$sector_id;
	   $query = $this->db->query($sql);
        
        return $query->result();
   }
   
   
    function get_by_donor_beneficiary($donor_id,$beneficiary_id,$start,$end)
	{
		$data = array();		
		$sql = 'SELECT projects.*, beneficiarytypes.*,projectbeneficiaries.*,donors.*
			FROM projects,beneficiarytypes,projectbeneficiaries,donors
			WHERE projects.id = projectbeneficiaries.project_id
			AND beneficiarytypes.id = projectbeneficiaries.beneficiary_id
			AND donors.id = projects.donor_id
			AND beneficiarytypes.id = '.$beneficiary_id.'
			AND donors.id = '.$donor_id.'
			AND "'.$end.'" >= projects.project_start_date AND projects.project_end_date >= "'.$start.'"';
			
		$query = $this->db->query($sql);
		
		foreach ($query->result_array() as $row){

		       //$data[] = $row['number'];
			   $data[] =  preg_replace("/,/", "", $row['totalbudget']);

		 }
			   
	   $total_budget= array_sum($data);
	   
	   return $total_budget;
	}
   
   function get_total_funding_by_donor($donor_id,$start,$end)
   {
	   $data = array();		
		$sql = 'SELECT projects.*, sectors.*,projectsectors.*,donors.*
			FROM projects,sectors,projectsectors,donors
			WHERE projects.id = projectsectors.project_id
			AND sectors.id = projectsectors.sector_id
			AND donors.id = projects.donor_id
			AND donors.id = '.$donor_id.'
			AND "'.$end.'" >= projects.project_start_date AND projects.project_end_date >= "'.$start.'"';
			
		$query = $this->db->query($sql);
		
		foreach ($query->result_array() as $row){

		       //$data[] = $row['number'];
			   $data[] =  preg_replace("/,/", "", $row['totalbudget']);

		 }
			   
	   $total_budget= array_sum($data);
	   
	   return $total_budget;
   }
   
   function get_total_funding($start,$end)
   {
	   $data = array();		
		$sql = 'SELECT projects.*, sectors.*,projectsectors.*,donors.*
			FROM projects,sectors,projectsectors,donors
			WHERE projects.id = projectsectors.project_id
			AND sectors.id = projectsectors.sector_id
			AND donors.id = projects.donor_id
			AND "'.$end.'" >= projects.project_start_date AND projects.project_end_date >= "'.$start.'"';
			
		$query = $this->db->query($sql);
		
		foreach ($query->result_array() as $row){

		       //$data[] = $row['number'];
			   $data[] =  preg_replace("/,/", "", $row['totalbudget']);

		 }
			   
	   $total_budget= array_sum($data);
	   
	   return $total_budget;
   }
   
   
   function get_total_funding_by_sector($sector_id,$start,$end)
   {
	   $data = array();		
		$sql = 'SELECT projects.*, sectors.*,projectsectors.*,donors.*
			FROM projects,sectors,projectsectors,donors
			WHERE projects.id = projectsectors.project_id
			AND sectors.id = projectsectors.sector_id
			AND donors.id = projects.donor_id
			AND sectors.id = '.$sector_id.'
			AND "'.$end.'" >= projects.project_start_date AND projects.project_end_date >= "'.$start.'"';
			
		$query = $this->db->query($sql);
		
		foreach ($query->result_array() as $row){

		       //$data[] = $row['number'];
			   $data[] =  preg_replace("/,/", "", $row['totalbudget']);

		 }
			   
	   $total_budget= array_sum($data);
	   
	   return $total_budget;
   }
   
   function get_by_donor_sector_total($donor_id,$sector_id,$start,$end)
	{
		$data = array();		
		$sql = 'SELECT projects.*, sectors.*,projectsectors.*,donors.*
			FROM projects,sectors,projectsectors,donors
			WHERE projects.id = projectsectors.project_id
			AND sectors.id = projectsectors.sector_id
			AND donors.id = projects.donor_id
			AND sectors.id = '.$sector_id.'
			AND donors.id = '.$donor_id.'
			AND "'.$end.'" >= projects.project_start_date AND projects.project_end_date >= "'.$start.'"';
			
		$query = $this->db->query($sql);
        
        return $query->result();
	}
	
	function get_by_donor_total($donor_id,$start,$end)
	{
		$data = array();		
		$sql = 'SELECT projects.*, sectors.*,projectsectors.*,donors.*
			FROM projects,sectors,projectsectors,donors
			WHERE projects.id = projectsectors.project_id
			AND sectors.id = projectsectors.sector_id
			AND donors.id = projects.donor_id
			AND donors.id = '.$donor_id.'
			AND "'.$end.'" >= projects.project_start_date AND projects.project_end_date >= "'.$start.'"';
			
		$query = $this->db->query($sql);
        
        return $query->result();
	}
   
   function get_by_donor_sector($donor_id,$sector_id,$start,$end)
	{
		$data = array();		
		$sql = 'SELECT projects.*, sectors.*,projectsectors.*,donors.*
			FROM projects,sectors,projectsectors,donors
			WHERE projects.id = projectsectors.project_id
			AND sectors.id = projectsectors.sector_id
			AND donors.id = projects.donor_id
			AND sectors.id = '.$sector_id.'
			AND donors.id = '.$donor_id.'
			AND "'.$end.'" >= projects.project_start_date AND projects.project_end_date >= "'.$start.'"';
			
		$query = $this->db->query($sql);
		
		foreach ($query->result_array() as $row){

		       //$data[] = $row['number'];
			   $data[] =  preg_replace("/,/", "", $row['totalbudget']);

		 }
			   
	   $total_budget= array_sum($data);
	   
	   return $total_budget;
	}
	
	
	  
 
 function get_by_sector($sector_id,$start,$end)
	{
		$data = array();		
		$sql = 'SELECT projects.*, sectors.*,projectsectors.*,projectactivitiesbeneficiaries.*,beneficiarytypes.*
			FROM projects,sectors,projectsectors,projectactivitiesbeneficiaries,beneficiarytypes
			WHERE projects.id = projectsectors.project_id
			AND sectors.id = projectsectors.sector_id
			AND projectactivitiesbeneficiaries.project_id = projects.id
			AND beneficiarytypes.id = projectactivitiesbeneficiaries.beneficiary_id
			AND sectors.id = '.$sector_id.'
			AND "'.$end.'" >= projects.project_start_date AND projects.project_end_date >= "'.$start.'"';
			
		$query = $this->db->query($sql);
		
		foreach ($query->result_array() as $row){

		       //$data[] = $row['number'];
			   $data[] =  preg_replace("/,/", "", $row['number_reached']);

		 }
			   
	   $total_diversity = array_sum($data);
	   
	   return $total_diversity;
	}
	
	function get_sector_by_review($sector_id,$start,$end)
	{
		$data = array();
		$sql = 'SELECT projects.id,projects.project_title,projectsectors.*,sectors.*,projectreviews.monthofreport,projectreviews.dateofreview,projectbeneficiariesreview.beneficiary_id,projectbeneficiariesreview.target,projectbeneficiariesreview.reached
		FROM projectbeneficiariesreview,projectreviews,projects,projectsectors,sectors
		WHERE projectreviews.id = projectbeneficiariesreview.projectreview_id
		AND projectsectors.project_id = projects.id
		AND projectsectors.sector_id = sectors.id
		AND projectreviews.project_id = projects.id
		AND sectors.id = '.$sector_id.'
		AND "'.$end.'" >= projects.project_start_date AND projects.project_end_date >= "'.$start.'"';

		$query = $this->db->query($sql);
		
		foreach ($query->result_array() as $row){

		       //$data[] = $row['reached'];
			   $data[] =  preg_replace("/,/", "", $row['reached']);

		 }
		 
	   $total_reached = array_sum($data);
	   
	   return $total_reached;
	}
	
	function get_diversity_by_review($sector_id,$beneficiary_id,$start,$end)
	{
		$data = array();
		$sql = 'SELECT projects.id,projects.project_title,projectsectors.*,sectors.*,projectactivitiesbeneficiaries.*
		FROM projectactivitiesbeneficiaries,projects,projectsectors,sectors
		WHERE projects.id = projectactivitiesbeneficiaries.project_id
		AND projectsectors.project_id = projects.id
		AND projectsectors.sector_id = sectors.id
		AND projectactivitiesbeneficiaries.beneficiary_id = '.$beneficiary_id.'
		AND sectors.id = '.$sector_id.'
		AND projectreviews.dateofreview BETWEEN "'.$start.'" AND "'.$end.'"';

		$query = $this->db->query($sql);
		
		foreach ($query->result_array() as $row){

		       //$data[] = $row['reached'];
			   $data[] =  preg_replace("/,/", "", $row['reached']);

		 }
		 
	   $total_reached = array_sum($data);
	   
	   return $total_reached;
	}
	
	function get_diversity_by_review_month($sector_id,$beneficiary_id,$month,$start,$end)
	{
		$data = array();
		$sql = 'SELECT projects.id,projects.project_title,projectsectors.*,sectors.*,projectactivities.*,projectactivitiesbeneficiaries.*
		FROM projectactivities,projects,projectsectors,sectors,projectactivitiesbeneficiaries
		WHERE projectsectors.project_id = projects.id
		AND projectsectors.sector_id = sectors.id
		AND projectactivities.project_id = projects.id
		AND projectactivitiesbeneficiaries.beneficiary_id = '.$beneficiary_id.'
		AND projectactivities.project_month = '.$month.'
		AND sectors.id = '.$sector_id.'
		AND projectactivitiesbeneficiaries.project_id = projects.id
		AND projectactivitiesbeneficiaries.projectactivity_id = projectactivities.id
		AND projectactivities.date_added BETWEEN "'.$start.'" AND "'.$end.'"';

		$query = $this->db->query($sql);
		
		foreach ($query->result_array() as $row){

		       //$data[] = $row['reached'];
			   $data[] =  preg_replace("/,/", "", $row['number_reached']);

		 }
		 
	   $total_reached = array_sum($data);
	   
	   return $total_reached;
	}
	
	function get_by_sector_beneficiary($sector_id,$beneficiary_id,$start,$end)
	{
		$data = array();		
		$sql = 'SELECT projects.*, sectors.*,projectsectors.*,projectactivitiesbeneficiaries.*,beneficiarytypes.*
			FROM projects,sectors,projectsectors,projectactivitiesbeneficiaries,beneficiarytypes
			WHERE projects.id = projectsectors.project_id
			AND sectors.id = projectsectors.sector_id
			AND projectactivitiesbeneficiaries.project_id = projects.id
			AND beneficiarytypes.id = projectactivitiesbeneficiaries.beneficiary_id
			AND sectors.id = '.$sector_id.'
			AND beneficiarytypes.id = '.$beneficiary_id.'
			AND "'.$end.'" >= projects.project_start_date AND projects.project_end_date >= "'.$start.'"
			';
			
		$query = $this->db->query($sql);
		
		$result = count($query->result_array());
		
			
		foreach ($query->result_array() as $row){

		       //$data[] = $row['number'];
			   $data[] =  preg_replace("/,/", "", $row['number_reached']);

		 }
			   
	   $total_diversity = array_sum($data);
	   
	   return $total_diversity;
	}
	
	function get_by_sector_beneficiary_total($sector_id,$beneficiary_id,$start,$end)
	{
		$data = array();		
		$sql = 'SELECT projects.*, sectors.*,projectsectors.*,projectactivitiesbeneficiaries.*,beneficiarytypes.*
			FROM projects,sectors,projectsectors,projectactivitiesbeneficiaries,beneficiarytypes
			WHERE projects.id = projectsectors.project_id
			AND sectors.id = projectsectors.sector_id
			AND projectactivitiesbeneficiaries.project_id = projects.id
			AND beneficiarytypes.id = projectactivitiesbeneficiaries.beneficiary_id
			AND sectors.id = '.$sector_id.'
			AND beneficiarytypes.id = '.$beneficiary_id.'
			AND "'.$end.'" >= projects.project_start_date AND projects.project_end_date >= "'.$start.'"';
			
		$query = $this->db->query($sql);
        
        return $query->result();
	}
	
	function get_projects_by_sector($start,$end,$sector_id)
	{
		$data = array();		
		$sql = 'SELECT projects.*, sectors.*,projectsectors.*
			FROM projects,sectors,projectsectors
			WHERE projects.id = projectsectors.project_id
			AND sectors.id = projectsectors.sector_id
			AND sectors.id = '.$sector_id.'
			AND "'.$end.'" >= projects.project_start_date AND projects.project_end_date >= "'.$start.'"';
			
		$query = $this->db->query($sql);
        
        return $query->result();
	}
	
	
	function get_projects_by_county($start,$end,$county_id)
	{
		$data = array();		
		$sql = 'SELECT projects.*, counties.*,projectscounties.*
			FROM projects,counties,projectscounties
			WHERE projects.id = projectscounties.project_id
			AND counties.id = projectscounties.county_id
			AND counties.id = '.$county_id.'
			AND "'.$end.'" >= projects.project_start_date AND projects.project_end_date >= "'.$start.'"';
			
		$query = $this->db->query($sql);
        
        return $query->result();
	}
	
	
	function get_projects_by_sector_county($start,$end,$sector_id,$county_id)
	{
		$data = array();		
		$sql = 'SELECT projects.*, sectors.*,projectsectors.*,projectscounties.*,counties.*
			FROM projects,sectors,projectsectors,projectscounties,counties
			WHERE projects.id = projectsectors.project_id
			AND sectors.id = projectsectors.sector_id
			AND counties.id = projectscounties.county_id
			AND projects.id = projectscounties.project_id
			AND counties.id = '.$county_id.'
			AND sectors.id = '.$sector_id.'
			AND "'.$end.'" >= projects.project_start_date AND projects.project_end_date >= "'.$start.'"';
			
		$query = $this->db->query($sql);
        
        return $query->result();
	}
	
	function get_projects_by_donor($start,$end,$donor_id)
	{
		$data = array();		
		$sql = 'SELECT projects.*, donors.*,projectdonors.*
			FROM projects,donors,projectdonors
			WHERE projects.id = projectdonors.project_id
			AND donors.id = projectdonors.donor_id
			AND donors.id = '.$donor_id.'
			AND "'.$end.'" >= projects.project_start_date AND projects.project_end_date >= "'.$start.'"';
			
		$query = $this->db->query($sql);
        
        return $query->result();
	}
	
	
	function get_activities_by_region_beneficiary($county_id,$start_date,$end_date,$beneficiary_id)
	{
		
		$data = array();
		
		$sql = 'SELECT projectactivities.*, projectactivitiesbeneficiaries.*
		FROM projectactivities, projectactivitiesbeneficiaries
		WHERE projectactivities.id = projectactivitiesbeneficiaries.projectactivity_id
		AND projectactivities.county_id = '.$county_id.'
		AND projectactivities.date_added BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND projectactivitiesbeneficiaries.beneficiary_id='.$beneficiary_id;
		
		$query = $this->db->query($sql);
		
		$result = count($query->result_array());
		
			
		foreach ($query->result_array() as $row){
			   $data[] =  preg_replace("/,/", "", $row['total_beneficiaries']);

		 }
			   
	   $total_diversity = array_sum($data);
	   
	   return $total_diversity;
	}
	
	function count_activities_by_region_beneficiary($county_id,$start_date,$end_date,$beneficiary_id)
	{
		
		$data = array();
		
		$sql = 'SELECT projectactivities.*, projectactivitiesbeneficiaries.*
		FROM projectactivities, projectactivitiesbeneficiaries
		WHERE projectactivities.id = projectactivitiesbeneficiaries.projectactivity_id
		AND projectactivities.county_id = '.$county_id.'
		AND projectactivities.date_added BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND projectactivitiesbeneficiaries.beneficiary_id='.$beneficiary_id;
		
		$query = $this->db->query($sql);
		
		$result = count($query->result_array());
		
		$i = 0;
		
			
		foreach ($query->result_array() as $row){
			   $i++;

		 }
			   
	   $total_activities = $i;
	   
	   return $total_activities;
	}
	
	
	function get_activities_by_region_beneficiary_subcategory($county_id,$start_date,$end_date,$beneficiary_id)
	{
		
		$data = array();
		
		$sql = 'SELECT projectactivities.*, projectactivitiesbeneficiarycategories.*
		FROM projectactivities, projectactivitiesbeneficiarycategories
		WHERE projectactivities.id = projectactivitiesbeneficiarycategories.projectactivity_id
		AND projectactivities.county_id = '.$county_id.'
		AND projectactivities.date_added BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND projectactivitiesbeneficiarycategories.beneficiarycategory_id='.$beneficiary_id;
		
		$query = $this->db->query($sql);
		
		$result = count($query->result_array());
		
			
		foreach ($query->result_array() as $row){
			   $data[] =  preg_replace("/,/", "", $row['total_beneficiaries']);

		 }
			   
	   $total_diversity = array_sum($data);
	   
	   return $total_diversity;
	}
	
	function test_get_activities_by_region_beneficiary_subcategory($county_id,$start_date,$end_date,$beneficiary_id)
	{
		
		$data = array();
		
		$sql = 'SELECT projectactivities.*, projectactivitiesbeneficiarycategories.*
		FROM projectactivities, projectactivitiesbeneficiarycategories
		WHERE projectactivities.id = projectactivitiesbeneficiarycategories.projectactivity_id
		AND projectactivities.county_id = '.$county_id.'
		AND projectactivities.date_added BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND projectactivitiesbeneficiarycategories.beneficiarycategory_id='.$beneficiary_id;
		
		return $sql;
	}
	
	
		
	function get_activities_by_district_beneficiary_subcategory($county_id,$start_date,$end_date,$beneficiary_id)
	{
		
		$data = array();
		
		$sql = 'SELECT projectactivities.*, projectactivitiesbeneficiarycategories.*
		FROM projectactivities, projectactivitiesbeneficiarycategories
		WHERE projectactivities.id = projectactivitiesbeneficiarycategories.projectactivity_id
		AND projectactivities.subcounty_id = '.$county_id.'
		AND projectactivities.date_added BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND projectactivitiesbeneficiarycategories.beneficiarycategory_id='.$beneficiary_id;
		
		$query = $this->db->query($sql);
		
		$result = count($query->result_array());
		
			
		foreach ($query->result_array() as $row){
			   $data[] =  preg_replace("/,/", "", $row['number_reached']);

		 }
			   
	   $total_diversity = array_sum($data);
	   
	   return $total_diversity;
	}
	
	
	function count_activities_by_region_beneficiary_subcategory($county_id,$start_date,$end_date,$beneficiary_id)
	{
		
		$data = array();
		
		$sql = 'SELECT projectactivities.*, projectactivitiesbeneficiarycategories.*
		FROM projectactivities, projectactivitiesbeneficiarycategories
		WHERE projectactivities.id = projectactivitiesbeneficiarycategories.projectactivity_id
		AND projectactivities.county_id = '.$county_id.'
		AND projectactivities.date_added BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND projectactivitiesbeneficiarycategories.beneficiarycategory_id='.$beneficiary_id;
		
		$query = $this->db->query($sql);
		
		$result = count($query->result_array());
		
		$i = 0;
		
			
		foreach ($query->result_array() as $row){
			   $i++;

		 }
			   
	   $total_reached = $i;
	   
	   return $total_reached;
	}
	
	
	function get_diversity_by_region_review_month($county_id,$beneficiary_id,$month,$start,$end)
	{
		$data = array();
		
		$sql = 'SELECT projectactivities.*,projectactivitiesbeneficiaries.*
FROM projectactivities,projectactivitiesbeneficiaries
WHERE projectactivities.id = projectactivitiesbeneficiaries.projectactivity_id
AND projectactivities.county_id = '.$county_id.'
AND projectactivities.project_month = '.$month.'
AND projectactivitiesbeneficiaries.beneficiary_id = '.$beneficiary_id.'
AND projectactivities.date_added BETWEEN "'.$start.'" AND "'.$end.'"';
		
		$query = $this->db->query($sql);
		
		foreach ($query->result_array() as $row){

		     $data[] =  preg_replace("/,/", "", $row['total_beneficiaries']);

		 }
		 
	   $total_reached = array_sum($data);
	   
	   return $total_reached;
	}
	
	
	function get_category_by_region_review_month($county_id,$beneficiary_id,$month,$start,$end)
	{
		$data = array();
		
		$sql = 'SELECT projectactivities.*,projectactivitiesbeneficiarycategories.*
FROM projectactivities,projectactivitiesbeneficiarycategories
WHERE projectactivities.id = projectactivitiesbeneficiarycategories.projectactivity_id
AND projectactivities.county_id = '.$county_id.'
AND projectactivities.project_month = '.$month.'
AND projectactivitiesbeneficiarycategories.beneficiarycategory_id = '.$beneficiary_id.'
AND projectactivities.date_added BETWEEN "'.$start.'" AND "'.$end.'"';
		
		$query = $this->db->query($sql);
		
		foreach ($query->result_array() as $row){

		     $data[] =  preg_replace("/,/", "", $row['total_beneficiaries']);

		 }
		 
	   $total_reached = array_sum($data);
	   
	   return $total_reached;
	}
	
	
	function get_activities_by_district_beneficiary($county_id,$start_date,$end_date,$beneficiary_id)
	{
		
		$data = array();
		
		$sql = 'SELECT projectactivities.*, projectactivitiesbeneficiaries.*
		FROM projectactivities, projectactivitiesbeneficiaries
		WHERE projectactivities.id = projectactivitiesbeneficiaries.projectactivity_id
		AND projectactivities.subcounty_id = '.$county_id.'
		AND projectactivities.date_added BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND projectactivitiesbeneficiaries.beneficiary_id='.$beneficiary_id;
		
		$query = $this->db->query($sql);
		
		$result = count($query->result_array());
		
			
		foreach ($query->result_array() as $row){
			   $data[] =  preg_replace("/,/", "", $row['total_beneficiaries']);

		 }
			   
	   $total_diversity = array_sum($data);
	   
	   return $total_diversity;
	}
	
	
	function get_activities_by_beneficiary($country_id,$project_month,$project_year,$beneficiary_id)
	{
		
		$data = array();
		
		$sql = 'SELECT countries.*, counties.*, projectactivities.*, projectactivitiesbeneficiaries.*,beneficiarytypes.*
		FROM countries, counties, projectactivities, projectactivitiesbeneficiaries,beneficiarytypes
		WHERE projectactivities.id = projectactivitiesbeneficiaries.projectactivity_id
		AND countries.id = counties.country_id
		AND counties.id = projectactivities.county_id
		AND beneficiarytypes.id = projectactivitiesbeneficiaries.beneficiary_id
		AND counties.country_id = '.$country_id.'
		AND projectactivities.project_month = "'.$project_month.'" AND projectactivities.project_year = "'.$project_year.'"
		AND beneficiarytypes.id='.$beneficiary_id;
		
		$query = $this->db->query($sql);
		
		$result = count($query->result_array());
		
			
		foreach ($query->result_array() as $row){
			   //$data[] =  preg_replace("/,/", "", $row['total_beneficiaries']); // for projectactivities
			   $data[] =  preg_replace("/,/", "", $row['number_reached']); // for projectactivitiesbeneficiaries

		 }
			   
	   $total_diversity = array_sum($data);
	   
	   return $total_diversity;
	}
	
	
	function get_activities_by_project_beneficiary($project_id,$start_date,$end_date,$beneficiary_id)
	{
		
		$data = array();
		
		$data = array();
		
		$sql = 'SELECT projectactivities.*, projectactivitiesbeneficiaries.*
		FROM projectactivities, projectactivitiesbeneficiaries
		WHERE projectactivities.id = projectactivitiesbeneficiaries.projectactivity_id
		AND projectactivities.project_id = '.$project_id.'
		AND projectactivities.date_added BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND projectactivitiesbeneficiaries.beneficiary_id='.$beneficiary_id;
		
		$query = $this->db->query($sql);
		
		$result = count($query->result_array());
		
			
		foreach ($query->result_array() as $row){
			   $data[] =  preg_replace("/,/", "", $row['total_beneficiaries']);

		 }
			   
	   $total_diversity = array_sum($data);
	   
	   return $total_diversity;
	}
	
	
	
	function get_activities_by_activity_beneficiary($id,$start_date,$end_date,$beneficiary_id)
	{
		
		$data = array();
		
		$sql = 'SELECT projectactivities.*, projectactivitiesbeneficiaries.*
		FROM projectactivities, projectactivitiesbeneficiaries
		WHERE projectactivities.id = projectactivitiesbeneficiaries.projectactivity_id
		AND projectactivities.id = '.$id.'
		AND projectactivities.date_added BETWEEN "'.$start_date.'" AND "'.$end_date.'"
		AND projectactivitiesbeneficiaries.beneficiary_id='.$beneficiary_id;
		
		$query = $this->db->query($sql);
		
		$result = count($query->result_array());
		
			
		foreach ($query->result_array() as $row){
			   $data[] =  preg_replace("/,/", "", $row['number_reached']);

		 }
			   
	   $total_diversity = array_sum($data);
	   
	   return $total_diversity;
	}
	
	
}
