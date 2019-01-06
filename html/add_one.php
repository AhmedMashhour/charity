
    <?php
   

    /////////////////////////////////////////////////////////////
    
include_once('../database/database.php');
session_start();
    print_r($_POST);
echo '<br>';
print_r($_SESSION);
    
   if($_SERVER["REQUEST_METHOD"] == "POST"){
       
       $i=$db->getCount('select *from الحاله where الرقم_القومى ="'.$_POST['nat_num'].'" and  اسم_الجمعيه_التى_اضافه_الحاله ="'.$_SESSION['org_name'].'"',array());
       
           if($i>0)
           {
            redirect($_SERVER['HTTP_REFERER']);
           }
        if($_POST['username']!=NULL&&$_POST['nat_num']!=NULL&&$_SESSION['org_name']!=NULL){
       
    if(isset($_POST['username'])&&isset($_POST['nat_num'])){
        
        $q='Insert into الحاله values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';  
        $k=$db->insertRow($q,array($_POST['username'],$_POST['nat_num'],$_POST['status'],$_POST['qualified'],$_POST['age'],$_POST['familyN'],$_POST['work'],$_POST['income'],$_POST['outcome'],$_POST['phone'],$_POST['date'],$_POST['kind'],$_POST['researcher'],$_POST['guide'],$_POST['Quartermaster'],$_SESSION['org_name'],$_POST['building'],$_POST['area'],$_POST['help_kind2'],$_SESSION['org_name'],$_POST['address'],$_POST['period']));
     
        
        
        
    }
        
    for($t=1;$t<=$_POST['familyN'];$t++)
    {
        if($_POST['username'.$t]!=NULL&&$_POST['national'.$t]!=NULL&&$_POST['nat_num']!=NULL&&$_POST['nam'.$t]!=NULL&&$_POST['age'.$t]!=NULL&&$_POST['income_ch'.$t]!=NULL){
        $q='Insert into الابناء values(?,?,?,?,?,?)';
        $k=$db->insertRow($q,array($_POST['username'.$t],$_POST['national'.$t],$_POST['nat_num'],$_POST['nam'.$t],$_POST['age'.$t],$_POST['income_ch'.$t]));
        
    }}
        
        for($t=1;$t<=$_POST['num_incomes'];$t++)
    {
            if($_POST['nat_num']!=NULL&&$_POST['income'.$t]!=NULL&&$_POST['num_income'.$t]!=NULL){
        $q='Insert into الدخل values(?,?,?)';
        $k=$db->insertRow($q,array($_POST['nat_num'],$_POST['income'.$t],$_POST['num_income'.$t]));
            }
    }
        
        for($t=1;$t<=$_POST['num_outcomes'];$t++)
    {
            if($_POST['nat_num']!=NULL&&$_POST['outcome'.$t]!=NULL&&$_POST['num_outcome'.$t]!=NULL){

        $q='Insert into المصروفات values(?,?,?)';
        $k=$db->insertRow($q,array($_POST['nat_num'],$_POST['outcome'.$t],$_POST['num_outcome'.$t]));
        
    }}
        
      
        
    
    }
    }
 
?>
    
    
    
    
  