<?php require_once 'db.php';

			$table_name = $_POST['tbl_name'];


?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
	<title> GENERATED CODES  </title>
</head>
<body>

<style type="text/css">
	
	.controller{
		background-color: black;
		color:limegreen;
		
		font-size: 16px;
	}

	.view{
		background-color: black;
		color:violet;
		
		font-size: 16px;
	}

	.model{
		background-color: black;
		color:pink;
		
		font-size: 16px;
	}
</style>

<div class="container" style="margin-top: 70px;">

<h1> Output </h1>
<h3 style="color:red;">Note: You can modify the codes according to your needs. </h3>
	<div class="row">
	<h1>CONTROLLERS</h1>
		<div class="col-md-12">
		<span>Controller Code (application/controllers/<?php echo ucwords($table_name);?>.php)</span>
		<div class="">

			<?php

			//$fields		= $_POST['field_type'];

			unset($_POST['tbl_name']);
			unset($_POST['field_type']);

			if(sizeof($_POST)>=1){


				echo "<pre class='controller'>  <<span>?</span>php <br><br>";
				echo "  defined('BASEPATH') OR exit('Error'); <br><br>";
				echo "  class ".ucwords($table_name)." extends CI_Controller{ <br><br>";
				echo "  public function __construct(){<br>    parent::__construct();<br>    $"."this->load->library('form_validation');  <br>    $"."this->load->model('".strtolower($table_name)."_model');<br>    $"."this->load->library('session');  <br>    $"."this->load->helper('url');	 <br>}<br><br><br>";


				echo "  public function index(){<br><br>";

				echo "  $"."data['content'] =$"."this->".strtolower($table_name)."_model->get_all_".strtolower($table_name)."();";

				echo "<br>";

				echo "  $"."this->load->view('".strtolower($table_name)."_view',$"."data);";

				echo "<br>";

				echo "<br>  } <br><br>";



				echo "  public function create(){<br><br>";

				echo "<br>";

				echo "  $"."this->load->view('".strtolower($table_name)."_add');";

				echo "<br>";

				echo "<br>  } <br><br>";

				echo "  public function add(){<br><br>";

				foreach(array_keys($_POST) as $data){

					echo "  $"."this->form_validation->set_rules('".$data."','".$data."','".implode($_POST[$data], "|")."');"."<BR>";
				}

				echo "<br><br>   if($"."this->form_validation->run()==="."FALSE){";

				echo "<br><br> 	$"."this->session->set_flashdata('form_errors',validation_errors());";

				echo "<br> 	redirect(base_url('".strtolower($table_name)."/create'),'refresh');";

				echo "<br><br>   } else { <br>";

				echo "<br>";

				echo "      $"."data = array(";

				echo "<br>";

				foreach($db->query("SHOW COLUMNS FROM ".strtolower($table_name))->fetchAll(PDO::FETCH_ASSOC) as $data){

					
					echo "<br>";

					if($data['Key']=="PRI"){


					echo "     '".$data['Field']."'=>NULL,<br>";


						
					}else{

					echo "     '".$data['Field']."'=> $"."this->input->post('".$data['Field']."',TRUE),<br>";

					}

				}
				echo "<br>";

				echo "     );";

				echo "<br>";

				echo "<br>";


				echo "     $"."status = $"."this->".strtolower($table_name)."_model->save_".strtolower($table_name)."_data($"."data);";

				echo "<br>";	
				echo "<br>";

				echo htmlentities("     if($"."status===TRUE){ ");

				echo "<br>";
				echo "<br>";

				echo htmlentities("        $"."this->session->set_flashdata('message','Record successfully added');");

				echo "<br>";

				echo "        redirect(base_url('".strtolower($table_name)."'),'refresh');";

				echo "<br>";

				echo htmlentities("     } ");

				/* END ADD */

				echo "<br>";
				echo "<br>";

				echo "<br>   }<br>";
				echo "<br>  } <br>";

				echo "<br>";

				echo "  public function delete($"."id){<br>";


				echo "   $"."status = $"."this->".strtolower($table_name)."_model->delete_".strtolower($table_name)."($"."id);";

				echo "<br>";
				
				echo "<br>";

				echo htmlentities("     if($"."status===TRUE){ ");

				echo "<br>";
				echo "<br>";

				echo htmlentities("        $"."this->session->set_flashdata('message','Record successfully deleted');");

				echo "<br>";

				echo "        redirect(base_url('".strtolower($table_name)."'),'refresh');";

				echo "<br>";

				echo htmlentities("     } ");

				echo "<br>";

				echo "<br>  } <br><br>";


				echo " public function edit($"."id){<br>";

				echo "<br>";

				echo "    $"."data['record'] =  $"."this->".strtolower($table_name)."_model->get_".strtolower($table_name)."byId($"."id);";

				echo "<br>";

				echo "    $"."this->load->view('".strtolower($table_name)."_edit',$"."data);";

				echo "<br>";

				echo "<br>  } <br><br>";

				


				echo "  public function update(){<br><br>";

				foreach(array_keys($_POST) as $data){

					echo "  $"."this->form_validation->set_rules('".$data."','".$data."','".implode($_POST[$data], "|")."');"."<BR>";
				}

				echo "<br><br>   if($"."this->form_validation->run()==="."FALSE){";

				echo "<br><br> 	$"."this->session->set_flashdata('form_errors',validation_errors());";


				foreach($db->query("SHOW COLUMNS FROM ".strtolower($table_name))->fetchAll(PDO::FETCH_ASSOC) as $data){

					
					

					if($data['Key']=="PRI"){


					echo "<br> 	redirect(base_url('".strtolower($table_name)."/edit/'."."$"."this->input->post('".$data['Field']."',TRUE)),'refresh');";

						
					
					}

				}


				

				echo "<br><br>   } else { <br>";

				echo "<br>";

				echo "      $"."data = array(";

				echo "<br>";

				foreach($db->query("SHOW COLUMNS FROM ".strtolower($table_name))->fetchAll(PDO::FETCH_ASSOC) as $data){

					
					

					if($data['Key']=="PRI"){


					echo "     '".$data['Field']."'=> $"."this->input->post('".$data['Field']."',TRUE),<br>";

						
					}else{

					echo "     '".$data['Field']."'=> $"."this->input->post('".$data['Field']."',TRUE),<br>";

					}

				}

				echo "<br>";

				echo "     );";

				echo "<br>";

				echo "<br>";

				echo "<br>";

				foreach($db->query("SHOW COLUMNS FROM ".strtolower($table_name))->fetchAll(PDO::FETCH_ASSOC) as $data){

					
					

					if($data['Key']=="PRI"){


					echo "     $"."status = $"."this->".strtolower($table_name)."_model->update_".strtolower($table_name)."_data($"."data,$"."this->input->post('".$data['Field']."'));";
						
					}

				}

				

				echo "<br>";

				echo htmlentities("    	 if($"."status===TRUE){ ");

				echo "<br>";
				echo "<br>";

				echo htmlentities("        $"."this->session->set_flashdata('message','Record successfully updated');");

				echo "<br>";

				echo "        redirect(base_url('".strtolower($table_name)."'),'refresh');";

				echo "<br>";

				echo htmlentities("     } ");

				echo "<br>";

				echo "<br>";

				echo htmlentities("         } ");

				echo "<br>";	

				echo htmlentities("     } ");

				echo "<br> }//end class <br>";

				echo "</pre>";

			}else{


				header('location:index.php');
		
			}

			?>
			</div>
		</div>
	</div>

<h1>VIEWS</h1>

	<div class="row">
		<div class="col-md-12">
			<span>View Code (application/views/<?php echo strtolower($table_name); ?>_add.php) </span>
			<pre class='view'><?php 

					echo htmlentities("<html>");

					echo "<br>";

					echo htmlentities("<head>");

					echo "<br>";

					echo htmlentities("<body>");

					echo "<br>";

					echo htmlentities("<title> ".ucwords($table_name)." Add Record </title>");

					echo "<br>";

					echo "<br>";

					echo htmlentities("<?php echo $"."this->session->flashdata('form_errors');?>");

					echo "<br>";

					echo  htmlentities("<form accept-charset=\"utf8\" action=\"<?php echo base_url('".strtolower($table_name)."/add'); ?>\" method=\"POST\">");
					echo "<br><br>";

				foreach($db->query("SHOW COLUMNS FROM ".strtolower($table_name))->fetchAll(PDO::FETCH_ASSOC) as $data){

					echo htmlentities("<label for=\"".strtolower($data['Field'])."\">".ucwords($data['Field'])."</label>");
					echo "<br>";
					echo htmlentities("<input type=\"text\" id=\"".$data['Field']."\" name=\"".$data['Field']."\" value=\"\"/>");

					
					echo "<br><br>";

				}
					echo htmlentities("<button type=\"submit\" name=\"btn_add\"> Submit </button>");
					
					echo htmlentities("</form>");
					echo "<br>";
					echo "<br>";
					echo htmlentities(" </body>");
					echo "<br>";
					echo htmlentities("</html>");



			?></pre>


			<span>View Code (<?php echo strtolower($table_name); ?>_view.php) </span>
			<pre class='view'><?php 

					echo htmlentities("<html>");

					echo "<br>";

					echo htmlentities("<head>");

					echo "<br>";

					echo htmlentities("<title> ".ucwords($table_name)." View </title>");

					echo "<br>";

					echo htmlentities("<body>");

					echo "<br>";

					echo "<br>";

					echo htmlentities("<?php echo $"."this->session->flashdata('message');?>");

					echo "<br>";

					echo "<br>";


					echo htmlentities("<a href=\"<?php echo base_url('".strtolower($table_name)."/create');?>\"> Add Record </a>");


					echo htmlentities("<table border='1'>");

					echo "<br>";

					echo htmlentities("<tr>");


					echo "<br>";

					foreach($db->query("SHOW COLUMNS FROM ".strtolower($table_name))->fetchAll(PDO::FETCH_ASSOC) as $data){

					
					echo htmlentities(" <td> ".ucwords($data['Field'])." </td>");
					

					echo "<br>";

					}
					echo htmlentities(" <td> Actions </td>");
			
					echo "<br>";

					echo htmlentities("</tr>");

					echo "<br>";

					echo "<br>";

					echo htmlentities("<?php ");

					echo "<br>";

					echo htmlentities("foreach($"."content as $"."data){");

					echo htmlentities("?>");

					echo "<br>";



					echo htmlentities("<tr>");

					echo "<br>";

					foreach($db->query("SHOW COLUMNS FROM ".strtolower($table_name))->fetchAll(PDO::FETCH_ASSOC) as $data){

						//echo $data['Field'];
					
					

											//echo $data['Field'];
					if($data['Key']!=="PRI"){

						echo htmlentities(" <td><?php echo $"."data['".$data['Field']."']; ?></td>");

						
					}else{

						echo htmlentities(" <td><?php echo $"."data['".$data['Field']."']; ?></td>");
							
					}
					

					echo "<br>";



					}

					foreach($db->query("SHOW COLUMNS FROM ".strtolower($table_name))->fetchAll(PDO::FETCH_ASSOC) as $data){


						if($data['Key']=="PRI"){

							echo htmlentities(" <td>");

							echo "<br>";

							echo htmlentities(" <a href=\"<?php echo base_url('".strtolower($table_name)."/edit').'/'.$"."data['".$data['Field']."']; ?>\"> Edit </a>");


							echo "<br>";

							echo htmlentities(" <a href=\"<?php echo base_url('".strtolower($table_name)."/delete').'/'.$"."data['".$data['Field']."']; ?>\"> Delete </a>");

							echo "<br>";

							echo htmlentities(" </td>");

							
						}
					


					}



					echo "<br>";
					echo htmlentities("</tr>");
					
					echo "<br>";
					echo htmlentities("<?php }?>");
					echo "<br>";
					echo htmlentities("</table>");
					echo "<br>";
					echo "<br>";
					echo htmlentities(" </body>");
					echo "<br>";
					echo htmlentities("</html>");



			?></pre>



			<span>View Code (application/views/<?php echo strtolower($table_name); ?>_edit.php) </span>
			<pre class='view'><?php 

					echo htmlentities("<?php");
						
					echo " <br> foreach($"."record as $"."rec):";

					echo "<br>";

					echo " extract($"."rec);";

					echo "<br>";

					echo " endforeach;";

					echo "<br>";

					echo htmlentities("?>");

					echo "<br>";

					echo "<br>";

					echo htmlentities("<html>");

					echo "<br>";

					echo htmlentities("<head>");

					echo "<br>";

					echo htmlentities("<body>");

					echo "<br>";

					echo htmlentities("<title> ".ucwords($table_name)." Edit Record </title>");

					echo "<br>";

					echo "<br>";

					echo htmlentities("<?php echo $"."this->session->flashdata('form_errors');?>");

					echo "<br>";

					echo  htmlentities("<form accept-charset=\"utf8\" action=\"<?php echo base_url('".strtolower($table_name)."/update'); ?>\" method=\"POST\">");
					echo "<br><br>";



					foreach($db->query("SHOW COLUMNS FROM ".strtolower($table_name))->fetchAll(PDO::FETCH_ASSOC) as $data){


						if($data['Key']=="PRI"){


							echo htmlentities("<input type=\"hidden\" id=\"".$data['Field']."\" name=\"".$data['Field']."\" value=\""."<?php echo $"."rec['".$data['Field']."'];?>\">");


							
						}
					}


				foreach($db->query("SHOW COLUMNS FROM ".strtolower($table_name))->fetchAll(PDO::FETCH_ASSOC) as $data){
					if($data['Key']=="PRI"){
					echo htmlentities("<label for=\"".strtolower($data['Field'])."\">".ucwords($data['Field'])."</label>");
					echo htmlentities("<input disabled type=\"text\" id=\"".$data['Field']."\" name=\"".$data['Field']."\" value=\""."<?php echo $"."rec['".$data['Field']."'];?>\">");
					}else{
					echo "<br>";
					echo htmlentities("<label for=\"".strtolower($data['Field'])."\">".ucwords($data['Field'])."</label>");
					echo htmlentities("<input type=\"text\" id=\"".$data['Field']."\" name=\"".$data['Field']."\" value=\""."<?php echo $"."rec['".$data['Field']."'];?>\">");

					
					echo "<br><br>";
					}

				}
					echo htmlentities("<button type=\"submit\" name=\"btn_add\"> Submit </button>");
					
					echo htmlentities("</form>");
					echo "<br>";
					echo "<br>";
					echo htmlentities(" </body>");
					echo "<br>";
					echo htmlentities("</html>");



			?></pre>

		</div>
	</div>

<h1>MODELS</h1>
		<div class="row">
		<div class="col-md-12">
			<span>Model Code (application/models/<?php echo ucwords($table_name); ?>.php) </span>
	 

	<?php 

		 echo "<pre class='model'>  <<span>?</span>php <br><br>"; 

	 	 echo "defined('BASEPATH') OR exit('Error'); <br><br>";

		 echo " class ".ucwords($table_name)."_model extends CI_Model{ <br><br>";

		 echo "  public function __construct(){<br>    parent::__construct();<br>    $"."this->load->database();  <br><br>  }<br><br>";

		 echo "  public function get_all_".strtolower($table_name)."(){";

		 echo "<br>";

		 echo "   return $"."this->db->get('".strtolower($table_name)."')->result_array();";

		 echo " <br>  }";

		 echo "<br>";
		
		 echo "<br>";

		 echo "  public function save_".strtolower($table_name)."_data($"."data){";

		 echo "<br>";

		 echo "   return $"."this->db->insert('".strtolower($table_name)."',$"."data);";

		 echo " <br>  }";

		 echo "<br>";

		 echo "<br>";


		 echo "<br>";
		
		 echo "<br>";

		 echo "  public function delete_".strtolower($table_name)."($"."id){";

		 echo "<br>";

		 echo "<br>";


		foreach($db->query("SHOW COLUMNS FROM ".strtolower($table_name))->fetchAll(PDO::FETCH_ASSOC) as $data){


			if($data['Key']=="PRI"){


					echo "   $"."this->db->where('$table_name.".$data['Field']."',$"."id);";
				
			}
			

	
			}

		echo "<br>";


		 echo "   return $"."this->db->delete('".strtolower($table_name)."');";

		 echo "<br>";


		 echo " <br>  }";

		 echo "<br>";

		 echo "<br>";






		  echo "  public function get_".strtolower($table_name)."byId($"."id){";

		 echo "<br>";

		 echo "<br>";


		foreach($db->query("SHOW COLUMNS FROM ".strtolower($table_name))->fetchAll(PDO::FETCH_ASSOC) as $data){


			if($data['Key']=="PRI"){


					echo "   $"."this->db->where('$table_name.".$data['Field']."',$"."id);";
				
			}
			

	
			}

		echo "<br>";


		 echo "   return $"."this->db->get('".strtolower($table_name)."')->result_array();";

		 echo "<br>";


		 echo " <br>  }";

 		echo "<br>";

  		echo "<br>";

		 echo "  public function update_".strtolower($table_name)."_data($"."data,"."$"."id){";

		 echo "<br>";

		 echo "<br>";


		foreach($db->query("SHOW COLUMNS FROM ".strtolower($table_name))->fetchAll(PDO::FETCH_ASSOC) as $data){


			if($data['Key']=="PRI"){


					echo "   $"."this->db->where('$table_name.".$data['Field']."',$"."id);";
				
			}
			

	
			}

		echo "<br>";


		 echo "   return $"."this->db->update('".strtolower($table_name)."',$"."data);";

		 echo "<br>";


		 echo " <br>  }";

		 echo "<br>";

		 echo "<br>";





		 echo "<br> }//end class <br>";

		 echo "</pre>";

	?>



			

		</div>
		</div>
		</div>
</div>


<script type="text/javascript" src="assets/jquery.min.js"></script>
<script type="text/javascript" src="assets/bootstrap.min.js"></script>
</body>
</html>