<?php 
  class foreachPrintfArr implements Iterator {
       //当前数组作用域
       private $_items; 
       private $_old_items;
       //保存每次执行数组环境栈
       private $_stack = array(); 
       
       public function __construct($data=array()){
           $this->_items = $data;
       }
       
       private function _isset(){
           $val = current($this->_items);

           if (empty($this->_stack) && !$val) {
                return false;
           } else {
                return true;
           }   
       }
       
       public function current() {
            $this->_old_items = null;
            $val = current($this->_items);
            
            //如果是数组则保存当前执行环境，然后切换到新的数组执行环境
            if (is_array($val)){
                array_push($this->_stack,$this->_items);
                $this->_items = $val;
                return $this->current();
            }
            
            //判断当前执行完成后是否需要切回上次执行环境
            //(1) 如果存在跳出继续执行
            //(2) 如果不存在且环境栈为空，则表示当前执行到最后一个元素
            //(3) 如果当前数组环境下一个元素不存在,则保存一下当前执行数组环境 $this->_old_items = $this->_items;
            //然后切换上次执行环境 $this->_items = array_pop($this->_stack) 继续循环, 直到当前数组环境下一个
            //元素不为空为止
            while (1) {
                if (next($this->_items)) {  
                    prev($this->_items); break;
                } elseif (empty($this->_stack)) {
                    end($this->_items); break;
                } else {
                    end($this->_items);
                    if (!$this->_old_items) 
                        $this->_old_items = $this->_items;
                    $this->_items = array_pop($this->_stack);
                }
            }
            
            return $val;
       }
     
       public function next() {
            next($this->_items);   
       }
       
       public function key() {
            // 由于 key() 函数执行在 current() 函数之后
            // 所以在 current() 函数切换执行环境 , 会导致切换之前的执行环境最后一个 key
            // 变成切换之后的key , 所以 $this->_old_items 保存一下切换之前的执行环境
            // 防止key打印出错
            return $this->_old_items ? key($this->_old_items) : key($this->_items);
       }
     
       public function rewind() {
            reset($this->_items);
       }
     
       public function valid() {                                                                              
            return $this->_isset();
       }
   }


 ?>