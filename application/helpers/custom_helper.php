<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 	
	//check admin
	if (!function_exists('is_admin')) 
	{
	    function is_admin()
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        return $ci->auth_model->is_admin();
	    }
	}

	//check editor
	if (!function_exists('is_user')) 
	{
	    function is_user()
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        return $ci->auth_model->is_user();
	    }
	}

	//check editor
	if (!function_exists('is_pro_user')) 
	{
	    function is_pro_user()
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        return $ci->auth_model->is_pro_user();
	    }
	}



	//get logged user
	if (!function_exists('user')) 
	{
	    function user()
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        $user = $ci->auth_model->get_logged_user();
	        if (empty($user)) 
			{
	            $ci->auth_model->logout();
	        } else {
	            return $user;
	        }

	    }
	}



	if (!function_exists('hash_password')) {
	    function hash_password($password)
	    {	
	    	$ci =& get_instance();
	        return password_hash($password, PASSWORD_BCRYPT);
	    }
	}

	

	// current date time function
	if(!function_exists('my_date_now')){
	    function my_date_now(){        
	        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
	        $date_time = $dt->format('Y-m-d H:i:s');      
	        return $date_time;
	    }
	}

	// show current date & time with custom format
	if(!function_exists('my_date_show_time')){
	    function my_date_show_time($date){       
	        if($date != ''){
	            $date2 = date_create($date);
	            $date_new = date_format($date2,"d M Y h:i A");
	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}

	// show current date with custom format
	if(!function_exists('my_date_show')){
	    function my_date_show($date){       
	        
	        if($date != ''){
	            $date2 = date_create($date);
	            $date_new = date_format($date2,"d M Y");
	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}

	

	//get category
	if (!function_exists('get_days')) {
	    function get_days()
	    {
	        $days = array(
	        	'1'=>'Satarday',
	        	'2'=>'Sunday',
	        	'3'=>'Monday',
	        	'4'=>'Tuesday',
	        	'5'=>'Wednesday',
	        	'6'=>'Thursday',
	        	'7'=>'Friday'
	        );
	        return $days;
	    }
	}

	//get category
	if (!function_exists('helper_get_category')) {
	    function helper_get_category($category_id)
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        return $ci->admin_model->get_category($category_id);
	    }
	}

	//get category
	if (!function_exists('helper_get_category_option')) {
	    function helper_get_category_option($category_id, $table)
	    {
	        // Get a reference to the controller object
	        $ci =& get_instance();
	        return $ci->admin_model->get_category_option($category_id, $table);
	    }
	}

	//delete image from server
	if (!function_exists('delete_image_from_server')) {
	    function delete_image_from_server($path)
	    {
	        $full_path = FCPATH . $path;
	        if (strlen($path) > 15 && file_exists($full_path)) {
	            unlink($full_path);
	        }
	    }
	}


	// get settings
  	if(!function_exists('get_settings')){
	    function get_settings(){        
	        $ci = get_instance();
	        
	        $ci->load->model('admin_model');
	        $option = $ci->admin_model->get_settings();        
	        
	        return $option;
	    }
    } 


    // get pages
  	if(!function_exists('get_pages')){
	    function get_pages(){        
	        $ci = get_instance();
	        $option = $ci->common_model->select_asc('pages');
	        return $option;
	    }
    } 


    // get author info
	if(!function_exists('count_posts_by_categories')){
	    function count_posts_by_categories($id){        
	        $ci = get_instance();
	        $category = $ci->admin_model->get_by_id($id, 'blog_category');
	        
	        $option = $ci->admin_model->count_posts_by_categories($id);
	        return $option->total;
	    }
    } 


    // get author info
	if(!function_exists('get_logged_user')){
	    function get_logged_user($id){        
	        $ci = get_instance();
	        
	        $ci->load->model('admin_model');
	        $option = $ci->admin_model->get_by_id($id, 'users');
	        return $option;
	    }
    } 



    if(!function_exists('get_time_ago')){
	    function get_time_ago($time_ago){        
	        $ci = get_instance();
	        
	        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
	        $date_time = strtotime($dt->format('Y-m-d H:i:s')); 

	        $time_ago = strtotime($time_ago);
	        $cur_time   = $date_time;
	        $time_elapsed   = $cur_time - $time_ago;
	        $seconds    = $time_elapsed ;
	        $minutes    = round($time_elapsed / 60 );
	        $hours      = round($time_elapsed / 3600);
	        $days       = round($time_elapsed / 86400 );
	        $weeks      = round($time_elapsed / 604800);
	        $months     = round($time_elapsed / 2600640 );
	        $years      = round($time_elapsed / 31207680 );
	        // Seconds

	        //return $seconds;

	        if($seconds <= 60){
	            return "just now";
	        }
	        //Minutes
	        else if($minutes <=60){
	            if($minutes==1){
	                return "one minute ago";
	            }
	            else{
	                return "$minutes minutes ago";
	            }
	        }
	        //Hours
	        else if($hours <=24){
	            if($hours==1){
	                return "an hour ago";
	            }else{
	                return "$hours hrs ago";
	            }
	        }
	        //Days
	        else if($days <= 7){
	            if($days==1){
	                return "yesterday";
	            }else{
	                return "$days days ago";
	            }
	        }
	        //Weeks
	        else if($weeks <= 4.3){
	            if($weeks==1){
	                return "a week ago";
	            }else{
	                return "$weeks weeks ago";
	            }
	        }
	        //Months
	        else if($months <=12){
	            if($months==1){
	                return "a month ago";
	            }else{
	                return "$months months ago";
	            }
	        }
	        //Years
	        else{
	            if($years==1){
	                return "one year ago";
	            }else{
	                return "$years years ago";
	            }
	        }


	        
	    }
	}


	//slug generator
	if (!function_exists('str_slug')) {
	    function str_slug($str, $separator = 'dash', $lowercase = TRUE)
	    {
	        $str = trim($str);
	        $CI =& get_instance();
	        $foreign_characters = array(
	            '/ä|æ|ǽ/' => 'ae',
	            '/ö|œ/' => 'o',
	            '/ü/' => 'u',
	            '/Ä/' => 'Ae',
	            '/Ü/' => 'u',
	            '/Ö/' => 'o',
	            '/À|Á|Â|Ã|Ä|Å|Ǻ|Ā|Ă|Ą|Ǎ|Α|Ά|Ả|Ạ|Ầ|Ẫ|Ẩ|Ậ|Ằ|Ắ|Ẵ|Ẳ|Ặ|А/' => 'A',
	            '/à|á|â|ã|å|ǻ|ā|ă|ą|ǎ|ª|α|ά|ả|ạ|ầ|ấ|ẫ|ẩ|ậ|ằ|ắ|ẵ|ẳ|ặ|а/' => 'a',
	            '/Б/' => 'B',
	            '/б/' => 'b',
	            '/Ç|Ć|Ĉ|Ċ|Č/' => 'C',
	            '/ç|ć|ĉ|ċ|č/' => 'c',
	            '/Д/' => 'D',
	            '/д/' => 'd',
	            '/Ð|Ď|Đ|Δ/' => 'Dj',
	            '/ð|ď|đ|δ/' => 'dj',
	            '/È|É|Ê|Ë|Ē|Ĕ|Ė|Ę|Ě|Ε|Έ|Ẽ|Ẻ|Ẹ|Ề|Ế|Ễ|Ể|Ệ|Е|Э/' => 'E',
	            '/è|é|ê|ë|ē|ĕ|ė|ę|ě|έ|ε|ẽ|ẻ|ẹ|ề|ế|ễ|ể|ệ|е|э/' => 'e',
	            '/Ф/' => 'F',
	            '/ф/' => 'f',
	            '/Ĝ|Ğ|Ġ|Ģ|Γ|Г|Ґ/' => 'G',
	            '/ĝ|ğ|ġ|ģ|γ|г|ґ/' => 'g',
	            '/Ĥ|Ħ/' => 'H',
	            '/ĥ|ħ/' => 'h',
	            '/Ì|Í|Î|Ï|Ĩ|Ī|Ĭ|Ǐ|Į|İ|Η|Ή|Ί|Ι|Ϊ|Ỉ|Ị|И|Ы/' => 'I',
	            '/ì|í|î|ï|ĩ|ī|ĭ|ǐ|į|ı|η|ή|ί|ι|ϊ|ỉ|ị|и|ы|ї/' => 'i',
	            '/Ĵ/' => 'J',
	            '/ĵ/' => 'j',
	            '/Ķ|Κ|К/' => 'K',
	            '/ķ|κ|к/' => 'k',
	            '/Ĺ|Ļ|Ľ|Ŀ|Ł|Λ|Л/' => 'L',
	            '/ĺ|ļ|ľ|ŀ|ł|λ|л/' => 'l',
	            '/М/' => 'M',
	            '/м/' => 'm',
	            '/Ñ|Ń|Ņ|Ň|Ν|Н/' => 'N',
	            '/ñ|ń|ņ|ň|ŉ|ν|н/' => 'n',
	            '/Ò|Ó|Ô|Õ|Ō|Ŏ|Ǒ|Ő|Ơ|Ø|Ǿ|Ο|Ό|Ω|Ώ|Ỏ|Ọ|Ồ|Ố|Ỗ|Ổ|Ộ|Ờ|Ớ|Ỡ|Ở|Ợ|О/' => 'O',
	            '/ò|ó|ô|õ|ō|ŏ|ǒ|ő|ơ|ø|ǿ|º|ο|ό|ω|ώ|ỏ|ọ|ồ|ố|ỗ|ổ|ộ|ờ|ớ|ỡ|ở|ợ|о/' => 'o',
	            '/П/' => 'P',
	            '/п/' => 'p',
	            '/Ŕ|Ŗ|Ř|Ρ|Р/' => 'R',
	            '/ŕ|ŗ|ř|ρ|р/' => 'r',
	            '/Ś|Ŝ|Ş|Ș|Š|Σ|С/' => 'S',
	            '/ś|ŝ|ş|ș|š|ſ|σ|ς|с/' => 's',
	            '/Ț|Ţ|Ť|Ŧ|τ|Т/' => 'T',
	            '/ț|ţ|ť|ŧ|т/' => 't',
	            '/Þ|þ/' => 'th',
	            '/Ù|Ú|Û|Ũ|Ū|Ŭ|Ů|Ű|Ų|Ư|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ|Ũ|Ủ|Ụ|Ừ|Ứ|Ữ|Ử|Ự|У/' => 'U',
	            '/ù|ú|û|ũ|ū|ŭ|ů|ű|ų|ư|ǔ|ǖ|ǘ|ǚ|ǜ|υ|ύ|ϋ|ủ|ụ|ừ|ứ|ữ|ử|ự|у/' => 'u',
	            '/Ý|Ÿ|Ŷ|Υ|Ύ|Ϋ|Ỳ|Ỹ|Ỷ|Ỵ|Й/' => 'Y',
	            '/ý|ÿ|ŷ|ỳ|ỹ|ỷ|ỵ|й/' => 'y',
	            '/В/' => 'V',
	            '/в/' => 'v',
	            '/Ŵ/' => 'W',
	            '/ŵ/' => 'w',
	            '/Ź|Ż|Ž|Ζ|З/' => 'Z',
	            '/ź|ż|ž|ζ|з/' => 'z',
	            '/Æ|Ǽ/' => 'AE',
	            '/ß/' => 'ss',
	            '/Ĳ/' => 'IJ',
	            '/ĳ/' => 'ij',
	            '/Œ/' => 'OE',
	            '/ƒ/' => 'f',
	            '/ξ/' => 'ks',
	            '/π/' => 'p',
	            '/β/' => 'v',
	            '/μ/' => 'm',
	            '/ψ/' => 'ps',
	            '/Ё/' => 'Yo',
	            '/ё/' => 'yo',
	            '/Є/' => 'Ye',
	            '/є/' => 'ye',
	            '/Ї/' => 'Yi',
	            '/Ж/' => 'Zh',
	            '/ж/' => 'zh',
	            '/Х/' => 'Kh',
	            '/х/' => 'kh',
	            '/Ц/' => 'Ts',
	            '/ц/' => 'ts',
	            '/Ч/' => 'Ch',
	            '/ч/' => 'ch',
	            '/Ш/' => 'Sh',
	            '/ш/' => 'sh',
	            '/Щ/' => 'Shch',
	            '/щ/' => 'shch',
	            '/Ъ|ъ|Ь|ь/' => '',
	            '/Ю/' => 'Yu',
	            '/ю/' => 'yu',
	            '/Я/' => 'Ya',
	            '/я/' => 'ya'
	        );

	        $str = preg_replace(array_keys($foreign_characters), array_values($foreign_characters), $str);

	        $replace = ($separator == 'dash') ? '-' : '_';

	        $trans = array(
	            '&\#\d+?;' => '',
	            '&\S+?;' => '',
	            '\s+' => $replace,
	            '[^a-z0-9\-\._]' => '',
	            $replace . '+' => $replace,
	            $replace . '$' => $replace,
	            '^' . $replace => $replace,
	            '\.+$' => ''
	        );

	        $str = strip_tags($str);

	        foreach ($trans as $key => $val) {
	            $str = preg_replace("#" . $key . "#i", $val, $str);
	        }

	        if ($lowercase === TRUE) {
	            if (function_exists('mb_convert_case')) {
	                $str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8");
	            } else {
	                $str = strtolower($str);
	            }
	        }

	        $str = preg_replace('#[^' . $CI->config->item('permitted_uri_chars') . ']#i', '', $str);

	        return trim(stripslashes($str));
	    }
	}