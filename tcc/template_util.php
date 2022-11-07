<?php
class TemplateUtil{
	public static function parseTemplate($template,$values){
		$result = '';
		$start_pos =0;
		$template_len = strlen($template);
		TemplateUtil::parseTemplateRecursion($template,$template_len,$values,$result,$start_pos,'');
		return $result;
	}
	
	// 只支持两种简单的语法
	// ${key} ${{key_start}} ${{key_end}}
	/*
	 * 
	 */
	static function parseTemplateRecursion($template,$template_len,$values,&$result,&$start_pos,$array_key){
		while(True){
			$pos = strpos($template,'${',$start_pos);
			if($pos === false){
				if($array_key == ''){
					$result.=substr($template,$start_pos);
					$start_pos = $template_len;
					return $start_pos;
				}else{
					BaseError::throw_exception(OtherError::$NOT_FIND, array('key' => $array_key, 'msg' => 'end}}'));
				}
			}
			//把中间这段值加入结果
			$result.=substr($template,$start_pos,$pos-$start_pos);
			$start_pos = $pos;
			//找到 ${
			if($pos+2 < $template_len && $template[$pos+2]=='{'){
				//找到一个${{
				//解析key值
				$pos_key_end = strpos($template,'}}',$pos+3);
				if($pos_key_end === false){
					BaseError::throw_exception(OtherError::$NOT_FIND, array('key' => '}}', 'msg' => ''));
				}
				$t = substr($template,$pos+3,$pos_key_end-($pos+3));
				$t_len = strlen($t);
				if($t_len>6 && substr($t,$t_len-6)=='_start' && substr($t,0,3)=='if_'){//条件开始
					//找到一个${{key_start}}
					$key = substr($t,3,$t_len-9);
					$is_true = array_key_exists($key,$values) && $values[$key];
					$tmp_result = $result;
					
					$new_pos = $pos_key_end+2;
					
					TemplateUtil::parseTemplateRecursion($template,$template_len,$values,$result,$new_pos,$key);
					//解析完递归:
					$start_pos = $new_pos;//结束
					if(!$is_true){
						$result = $tmp_result;
					}
						
				}else if($t_len>4 && substr($t,$t_len-4) == '_end' && substr($t,0,3)=='if_'){//循环结束
					//找到一个${{key_end}}
					$key = substr($t,3,$t_len-7);
					if($key != $array_key){
						BaseError::throw_exception(OtherError::$BEGIN_NOT_MATCH_END, array('begin' => $array_key, 'end' => $key));
					}
					$start_pos = $pos_key_end+2;//取到结束
					return;
				}
				else
				if($t_len>6 && substr($t,$t_len-6)=='_start'){//循环开始
					//找到一个${{key_start}}
					$key = substr($t,0,$t_len-6);
					if(!array_key_exists($key,$values)){
						BaseError::throw_exception(OtherError::$NOT_IN_VALUE, array('key' => $key));
					}
					if(!is_array($values[$key])){
						BaseError::throw_exception(OtherError::$VALUE_SHOULD_BE_ARRAY, array('key' => $key));
					}
					$new_pos = $start_pos + $t_len+5;
					foreach($values[$key] as $row){
						$new_pos = $start_pos + $t_len+5;
						TemplateUtil::parseTemplateRecursion($template,$template_len,$row,$result,$new_pos,$key);
					}
					//解析完递归:
					$start_pos = $new_pos;//结束
					
				}else if($t_len>4 && substr($t,$t_len-4) == '_end'){//循环结束
					//找到一个${{key_end}}
					$key = substr($t,0,$t_len-4);
					if($key != $array_key){
						BaseError::throw_exception(OtherError::$BEGIN_NOT_MATCH_END, array('begin' => $array_key, 'end' => $key));
					}
					$start_pos = $pos_key_end+2;//取到结束
					return;
				}else{
					BaseError::throw_exception(OtherError::$UNKNOWN_KEY, array('key' => $t));
				}
			}else{
				//找到一个${
				$pos_key_end = strpos($template,'}',$pos+2);
				if($pos_key_end === false){
					BaseError::throw_exception(OtherError::$NOT_FIND, array('key' => '}', 'msg' => ''));
				}
				$key = substr($template,$pos+2,$pos_key_end-($pos+2));
				if(!array_key_exists($key,$values)){
					BaseError::throw_exception(OtherError::$NOT_IN_VALUE, array('key' => $key));
				}
				$result.=$values[$key];
				$start_pos = $pos_key_end+1;
			}
			
		}
	}
}