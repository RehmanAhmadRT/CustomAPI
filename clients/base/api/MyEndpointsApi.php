<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class MyEndpointsApi extends SugarApi
{
   public function registerApiRest()
   {
       return array(
           //GET
           'MyGetEndpoint' => array(
               //request type
               'reqType' => 'GET',

               //set authentication
               'noLoginRequired' => false,

               //endpoint path
               'path' => array('MyEndpoint', 'GetExample'),

               //endpoint variables
               'pathVars' => array('', ''),

               //method to call
               'method' => 'MyGetMethod',

               //short help string to be displayed in the help documentation
               'shortHelp' => 'An example of a GET endpoint',

               //long help to be displayed in the help documentation
               'longHelp' => 'custom/clients/base/api/help/MyEndPoint_MyGetEndPoint_help.html',
           ),
       );
   }

   /**
    * Method to be used for my MyEndpoint/GetExample endpoint
    */
   public function MyGetMethod($api, $args)
   {
     $servername ="localhost";
     $username = "root";
     $password = "123";
     $dbname="sugarcrm";

     $conn =mysqli_connect($servername,$username,$password,$dbname);

     $select="select ac.name as account_name,op.name as opportunity_name
              from accounts_opportunities ao,accounts ac,opportunities op
              where ao.deleted=0 and ao.opportunity_id=op.id and ao.account_id=ac.id";
     $result=$conn->query($select);
     return $result->fetch_assoc();
/*
   //  $bean = BeanFactory::newBean($Opportunities);
     $sugarQuery = new SugarQuery();
     $sugarQuery->select(array('name'));
     $sugarQuery->from(BeanFactory::newBean('Accounts'));
     //$sugarQuery->join(BeanFactory::newBean('Opportunities'));
     $result = $sugarQuery->execute();

     return $result;
*/
  }
}
//localhost/SugarPro-Full-7.7.1.2/rest/v10/MyEndpoint/GetExample/
?>
