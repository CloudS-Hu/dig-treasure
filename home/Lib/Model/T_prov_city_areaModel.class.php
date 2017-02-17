<?php
   class T_prov_city_areaModel extends Model{
   	    
   	    //查询省份信息
   	    public function selectProvince(){
   	     	$T_prov_city_area=M("T_prov_city_area");
   	     	return $T_prov_city_area->query("select areaname from C_T_prov_city_area where arealevel=1;");
   	    }
   	    
   		//查询市/区信息
   	    public function selectCity($areaname){
   	     	$T_prov_city_area=M("T_prov_city_area");
   	     	$areanoQuery=$T_prov_city_area->query("select areano from C_T_prov_city_area where areaname='$areaname';");
		    $cityParentno=$areanoQuery[0]['areano'];
		    return $T_prov_city_area->query("select areaname from C_T_prov_city_area where parentno='$cityParentno';");
   	    }

   }
?>