<?php

if(!function_exists('ajaxHelper')){
	
	function ajaxHelper($key, $value, $redirect){
		$CI = &get_instance();
		$ajaxGet  = $CI->input->get('ajax');
		$ajaxPost = $CI->input->post('ajax');
		if(empty($ajaxGet) && empty($ajaxPost)){
			if($key == 'redirect'){
				redirect($value,'refresh');
			}else{
				$CI->session->set_flashdata('message',$value);
				redirect($redirect);
			}
		}else{
			echoAjax($key, $value);
		}
	
	}
}

function echoAjax($key, $value){
	header("Content-type: text/json");
   	header("Content-type: application/json");
	$response = array($key => $value);
	echo json_encode($response);
}


if(!function_exists('returnMessages')){
	
	function returnMessages($fields, $messages){
		$CI = &get_instance();
		$messagesToReturn = array();
		$values           = $CI->session->flashdata('values');
		if(!empty($fields) && is_array($fields)){
			foreach ($fields as $key => $field) {
				$field_key = array_search($field, $messages);
				if(!empty($field_key) || $field_key === 0){
					$messagesToReturn[$field] = $messages[($field_key+1)];
				}else{
					$messagesToReturn[$field] = '';
				}
				if(!empty($values)){
					$messagesToReturn[$field.'_value'] = $values[$field];
				}else{
					$messagesToReturn[$field.'_value'] = '';
				}
			}
		}
		return $messagesToReturn ;
	}
}


if(!function_exists('fillErrors')){
	
	function fillErrors($inputs){
		if(!empty($inputs) && is_array($inputs)){
			$errors = array();
			$e =0; //counter e for errors
			for($i = 0; $i < count($inputs); $i++){
				$error = form_error($inputs[$i]);
				$values[$inputs[$i]] = set_value($inputs[$i]);
				if(!empty($error)){
					$errors[$e] = $inputs[$i];
					$errors[$e+1] = '<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.'</div>'; 
					$e+=2;
				}else{
					$errors[$e] = $inputs[$i];
					$errors[$e+1] = ''; 
					$e+=2;
				}
			}

			$key   = 'message';
			$value = $errors;
			return array($key, $value);
		}
	}
}
if(!function_exists('sendMail')){

	function sendMail($toEmail, $message, $subject) {
 		$CI = &get_instance();
 			
	    $config['mailtype'] = 'html';
	    $config['protocol'] = 'smtp';
	    $config['smtp_host'] = 'ssl://smtp.googlemail.com';
	    $config['smtp_port'] = '465';
	    $config['smtp_timeout'] = 30;
	   	$config['smtp_user'] = 'no-reply@betahubs.com'; 
	    $config['smtp_pass'] = 'Bb123456..';
	    $config['charset'] = "utf-8";
	    $config['mailtype'] = "html";
	    $config['newline'] = "\r\n";
	    $config['crlf'] = "\n";
	    $config['wordwrap'] = TRUE;
	    $config['priority'] = 1;
	    $config['validate'] = TRUE;
	    
	    $CI->email->initialize($config);
	    $CI->email->from('no-reply@betahubs.com', 'HRTool');
	    $CI->email->to($toEmail);
	    $CI->email->subject($subject);
	    $CI->email->message($message); 
	    $CI->email->send(); 
	}
}

if(!function_exists('generateRandomString')){
    function generateRandomString($length = 10) {
	    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}

if(!function_exists('load404')){
    function load404(){
    	$CI = &get_instance();
		$data = array('link' => base_url().'/dashboard');
		$CI->parser->parse('dashboard/404_view',$data);
	}
}

if(!function_exists('unlinkImages')){
    function unlinkImages($images){
		if(!empty($images)){
			for($i =0; $i < count($images); $i++){
				@unlink($images[$i]['prescription']);
			}
		}
	}
}