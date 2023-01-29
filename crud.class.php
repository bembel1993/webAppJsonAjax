<?php 

class Crud{ 
    private $containerDataRegUser = "userData.json";
    private $saveUserArray; 
    private $errorMessage;
     
///////////////////////////////////////////////////////////////////////////////////////////// 
    public function getRows(){ 
        if(file_exists($this->containerDataRegUser)){ 
            $this->saveUserArray = json_decode(file_get_contents($this->containerDataRegUser), true);
         
            if(!empty($this->saveUserArray)){ 
                usort($this->saveUserArray, function($a, $b) { 
                    return $b['id'] - $a['id']; 
                }); 
            } 
            return !empty($this->saveUserArray)?$this->saveUserArray:false; 
        } 
        return false; 
    } 
/////////////////////////////////////////////////////////////////////////////////////////////     
    public function getSingle($id){ 
        $this->saveUserArray = json_decode(file_get_contents($this->containerDataRegUser), true); 
        $singleData = array_filter($this->saveUserArray, function ($var) use ($id) { 
            return (!empty($var['id']) && $var['id'] == $id); 
        }); 
        $singleData = array_values($singleData)[0]; 
        return !empty($singleData)?$singleData:false; 
    } 
/////////////////////////////////////////////////////////////////////////////////////////////
    public function insert($newData){ 
        if(!empty($newData)){ 
            $id = time(); 
            $newData['id'] = $id;
            
            $this->saveUserArray = json_decode(file_get_contents($this->containerDataRegUser), true); 
             
            $this->saveUserArray = !empty($this->saveUserArray)?array_filter($this->saveUserArray):$this->saveUserArray; 
            if(!empty($this->saveUserArray)){ 
                array_push($this->saveUserArray, $newData); 
            }else{ 
                $this->saveUserArray[] = $newData; 
            } 
            
            
            $insert = file_put_contents($this->containerDataRegUser, json_encode($this->saveUserArray)); 
            return $insert?$id:false;
         
        }else{ 
            return false; 
        }
    } 
///////////////////////////////////////////////////////////////////////////////////////////// 
    public function update($upData, $id){ 
        if(!empty($upData) && is_array($upData) && !empty($id)){
         //   $this->saveUserArray = json_decode(file_get_contents($this->containerDataRegUser), true); 
            
            $jsonData = file_get_contents($this->containerDataRegUser); 
            $data = json_decode($jsonData, true); 


            foreach ($data as $key => $value) { 
                if ($value['id'] == $id) { 
                    if(isset($upData['login'])){ 
                        $data[$key]['login'] = $upData['login']; 
                    } 
                    if(isset($upData['email'])){ 
                        $data[$key]['email'] = $upData['email']; 
                    } 
                    if(isset($upData['password'])){ 
                        $data[$key]['password'] = $upData['password']; 
                    } 
                    if(isset($upData['confirm_password'])){ 
                        $data[$key]['confirm_password'] = $upData['confirm_password']; 
                    }
                    if(isset($upData['name'])){ 
                        $data[$key]['name'] = $upData['name']; 
                    }  
                } 
            } 
            $update = file_put_contents($this->containerDataRegUser, json_encode($data)); 
             
            return $update?true:false; 
        }else{ 
            return false; 
        } 
    } 
///////////////////////////////////////////////////////////////////////////////////////////////    
    public function delete($id){ 
        $this->saveUserArray = json_decode(file_get_contents($this->containerDataRegUser), true); 
             
        $newData = array_filter($this->saveUserArray, function ($var) use ($id) { 
            return ($var['id'] != $id); 
        }); 
        $delete = file_put_contents($this->containerDataRegUser, json_encode($newData)); 
        return $delete?true:false; 
    } 
}