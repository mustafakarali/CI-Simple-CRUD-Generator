
	

	setInterval(function(){

	$('.validator-selector').multiselect({
    columns: 1,
    placeholder: 'Select Rule',
    search: true
});


	},100);

	$('#create-validation').click(function(){
		

		var i;
		$.ajax({
			url: 'get_tbl_fields.php',
			method: 'GET',
			data: {
				table_sel: $("select[name='tables']").val()
			},
			success:function(resp){
				var tpl='';



				var result = JSON.parse(resp);
				tpl+="";
				tpl+="<br><form action='generate-code.php' method='POST'>";
				tpl+="<input type='hidden' name='tbl_name' value='"+$("select[name='tables']").val()+"'/>";
				tpl+="<table class='table table-bordered table-hover table-stripped'>";
				tpl+="<tr>";

				tpl+="<td>Column Name</td>";

				tpl+="<td>Form Validation Rule For This Field</td>";

				
				tpl+="</tr>";
				
				for(i=0; i<result.cols.length; i++){

					tpl+="<tr>";
					tpl+= result.cols[i]['Key']=="PRI" ? "<td>"+result.cols[i]['Field']+" (PrimaryKey) </td>" :  "<td>"+result.cols[i]['Field']+" </td>";
					tpl+="<td><select id='validator-selector' class='validator-selector form-control' multiple name='"+result.cols[i]['Field']+"[]'>";

					tpl+="<option value='trim'>trim</option>";

					tpl+="<option value='required'>required</option>";

					tpl+="<option value='min_length[number]'>min_length[your_min_length]</option>";

					tpl+="<option value='max_length[number]'>max_length[your_max_length]</option>";

					tpl+="<option value='is_unique[table_name.table_column]'>is_unique[table_name.table_column]</option>";

					tpl+="<option value='matches[field_to_match]'>matches[field_to_match]</option>";

					tpl+="<option value='valid_email'>valid_email</option>";

					tpl+="<option value='valid_emails'>valid_emails</option>";

					tpl+="<option value='integer'>integer</option>";

					tpl+="<option value='alpha'>alpha</option>";

					tpl+="<option value='valid_ip'>valid_ip</option>";

					tpl+="<option value='valid_url'>valid_url</option>";

					tpl+="<option value='valid_base64'>valid_base64</option>";

					tpl+="<option value='is_natural_no_zero'>is_natural_no_zero</option>";

					tpl+="<option value='is_natural'>is_natural</option>";

					tpl+="<option value='decimal'>decimal</option>";

					tpl+="<option value='numeric'>numeric</option>";

					tpl+="<option value='alpha_dash'>alpha_dash</option>";

					tpl+="<option value='alpha_numeric_spaces'>alpha_numeric_spaces</option>";

					tpl+="<option value='alpha_numeric'>alpha_numeric</option>";

					tpl+="<option value='in_list[val1,val2,val3]'>in_list[val1,val2,val3]</option>";

					tpl+="<option value='less_than_equal_to[number]'>less_than_equal_to[number]</option>";

					tpl+="<option value='less_than[number]'>less_than[number]</option>";

					tpl+="<option value='greater_than_equal_to[number]'>greater_than_equal_to[number]</option>";

					tpl+="<option value='greater_than[number]'>greater_than[number]</option>";

					tpl+="<option value='exact_length[number]'>exact_length[number]</option>";

					tpl+="<option value='differs[form_item]'>differs[form_item]</option>";

					tpl+="<option value='regex_match[/regex/]'>regex_match[/regex/]</option>";

					tpl+="<option value='callback_yourcallbackfunction'>callback_yourcallbackfunction</option>";
					

					tpl+="</select></td>";

					

					tpl+="</tr>";
					
				}

				

				tpl+="</table><button class='btn btn-success' type='submit'> Generate CRUD </button></form>";

				$('.cols_res').html(tpl);

				
			}

		})



	});


