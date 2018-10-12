<?php
/**
* fileImporter class
*
* DESCRIPTION
* This class is used to import file into database table i,e upload this file into a temporary folder. The read all the datas
* from this file and insert all datas into a table and finaly delete this file from temp folder. 
* 
* @author   Md. Kausar Alam<kausar_ss2003@yahoo.com>
* @version  1.0.0
* @lisence  BSD
* @date     November 27,2008
*
*/
class fileImporter
{
    /**    
    * Call constructor
    * @param    string -- file Name
    * @param    string -- database name
    * @param    string -- table name 
    */
    public function __construct( $uploadDir , $database ,$tableName )
    {
       $this->fileName  = $uploadDir."/".$_FILES['import_file']['name'];
       $this->dbName    = $database;
       $this->tableName = $tableName;
       
    }
    
    /**
    * create an mysql connection and select database
    *
    * @param    string OPTIONAL -- servr name
    * @param    string -- user name 
    * @param    string -- password
    * @return   bool
    */
    public function connectDatabase( $server ='localhost' , $user, $password )
    {
       mysql_connect( $server ,$user,$password) or die('Couldnot connect mysql');
       if ( mysql_select_db( $this->dbName ) ) {
            return true;
       } else {
            return false;
       } 
    }
    
    /**
    * set delimiter 
    * @param    string --seperator fields of a file    
    */
    public function setDelimiter( $seperator = "tab" )
    {
        if( $seperator == "tab" )
            $this->separator = "\t";
        else if ( $seperator == "comma" ) {
            $this->separator = ",";
        }            
    } 
    
    /**
    * Upload file in a temp directory    
    * @return   bool
    */
    public function uploadFile() 
    {        
        if ( $_FILES['import_file']['type'] != "text/plain") {
            $optmsg="Please import text file<br />";
            return false;
        }
     
        if(copy($_FILES['import_file']['tmp_name'] , $this->fileName )) {
            return true;
        } else {
            return false;
        }                
    }
    
    /**
    * Delete uploaded file after import completion successfully 
    * @param    bool     
    */
    public function deleteFile()
    {
        if( file_exists($this->fileName) ) {
            if( unlink( $this->fileName ) ) {
                return true;
            }
        } else {
            return false;
        }
    }
    
    /**
    * Import file
    * @return   bool
    */
    public function importFile()
    {
       //upload file
       if( $this->uploadFile() ) {
           $tableFields = $this->getTableFields( $this->tableName );
           $this->lines = file( $this->fileName );
           if( $this->lines ) {
			   $k=0;
               foreach($this->lines as $line ) {
				   $k++;
                    $fields = array();                
                    $fields = explode("$this->separator", $line);                    
                    $this->insertDataIntoTable( $tableFields , $fields );                
                    $fields = "";
					if($k>=10000)
						break;
                }                            
                if( file_exists($this->fileName) ) {
                    if( $this->deleteFile() ) {
                        return true;
                    }
                } 
           }            
        }
        return false;       
    }
    
    /**
    * return num of fields of a table and its fields name
    * 
    * @access   public
    * @param    string -- tabel name
    * @return   array -- table fields name
    */
    public function getTableFields( $table )
    {
        $tableFields = array();
        $result = mysql_query( "SELECT *FROM " .$table );
        $numOfField = mysql_num_fields($result);
        for( $i = 0 ; $i<$numOfField ;$i++ ) 
		{
           $tableFields[] = mysql_field_name($result, $i);            
        }
        return $tableFields;                  
    }
    
    /**
    * Insert a row into table
    * 
    * @param    array  -- table fields
    * @return   true    
    */
    public function insertDataIntoTable( $fields , $fieldsValues )
    {        
//        echo "Data ";
		$sql = 'INSERT INTO ' . $this->dbName . '.'.$this->tableName .' (mobile  ' ;
        $values = "";
        /*foreach( $fields as $key => $field ) {
            $sql    .= $field . ' , ';            
        } */                   
        foreach($fieldsValues as $key => $value) {
            if( $key == 0 ) {
                $values = " VALUES ('" .$value ."' ";
            } else {
                $values .= " '".$value. "' ";
            }
        }
        $query  = substr( $sql      ,0 , -2);
        $values = substr( $values   ,0 , -1); 
        $query =  $query .') '. $values ." )";
        
        //echo $query;
		mysql_query( $query );
		
                            
    }
    
} //END of Class
?>