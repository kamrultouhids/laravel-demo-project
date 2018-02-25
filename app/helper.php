<?php

	use Illuminate\Support\Facades\DB;

	function dateConvertFormtoDB($date){
		if(!empty($date)){
			return date("Y-m-d",strtotime(str_replace('/','-',$date)));
		}
	}


	function dateConvertDBtoForm($date){
		if(!empty($date)){
			$date = strtotime($date);
			return date('d/m/Y', $date);
		}
	}


	function employeeInfo(){
        return DB::table('user')->where('user_id',session('logged_session_data.user_id'))->first();
    }


	function showMenu(){
        $role_id = session('logged_session_data.role_id');

        $menus =  DB::table('menus')
                ->select(DB::raw('menus.id, menus.name, menus.menu_url,menus.menu_icon'))
                ->join('menu_permission', 'menu_permission.menu_id', '=', 'menus.id')
                ->where('menu_permission.role_id',$role_id)
                ->where('menus.status',1)
                ->orderBy('menu_serial_id','ASC')
                ->get();
        return $menus;

    }


    function imageName()
    {
        return md5(str_random(10).time().'_');
    }


    function bloodGroup()
    {
        return [''=>'--- Please select ---','A+'=>'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','AB+'=>'AB+','AB-'=>'AB-','O+'=>'O+','O-'=>'O-'];
    }


    function findAge($date)
    {
        $birthday = new DateTime ( $date);
        $currentDate = new DateTime ( 'now' );
        $interval = $birthday->diff ( $currentDate );
        return $interval->format ( '%y' ) ." Years, ".$interval->format ( '%m' )." Month ";
    }

    function deformity_type()
    {
        return [
            'Typical'=>'Typical',
            'Atypical'=>'Atypical','Syndromic'=>'Syndromic',
            'Complex'=>'Complex','Neglected'=>'Neglected',
            'Positional'=>'Positional','Musculoskeletal' =>'Musculoskeletal',
            'Degenerative'=>'Degenerative','Rheumatologic'=>'Rheumatologic',
            'Neurological'=>'Neurological','Deficiency Disorder'=>'Deficiency Disorder',
            'Developmental'=>'Developmental','Post- operative'=>'Post- operative',
            'Post - Burn'=>'Post - Burn','Traumatic'=>'Traumatic',
            'Inflammatory'=>'Inflammatory'
        ];
    }

    function treatment_given()
    {
        return [
            'ZCF' => ['Consultancy','Registration','Casting','Tenotomy','Fasciotomy','ATT','Lengthening','New Brace','Brace Follow up'],
            'Physiotherapy' => ['IRR','TENS','UST','SWD','IFT','Traction','Wax bath','Vibrator','Manual Therapy','Therapeutic Exercise']
        ];
    }


?>