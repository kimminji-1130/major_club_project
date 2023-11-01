<?php
/**
 * total : 게시물의 총 개수
 * limit : 한 화면 출력 갯수
 * page_limit : 출력페이지수 맨처음 < 1 2 3 4 > 맨마지막
 * page : 현재 페이지
 * 
 */
function pagination($total, $limit, $page_limit, $page){

    // 게시물 데이터
    $data = range(1, $total); 
    
    $start = ($page - 1) * $limit;
    $end = (($start + $limit) > $total) ? $total : ($start + $limit);
    
    // 1 2 3 4 5  =====  6 7 8 9 10
    // 총 페이지 수
    $total_page = ceil($total / $limit);
    
    $start_page = ( ( floor( ($page - 1 ) / $page_limit ) ) * $page_limit ) + 1;
    $end_page = $start_page + $page_limit -1;
    
    if($end_page > $total_page) {
      $end_page = $total_page;
    }
    
    $prev_page = $start_page - 1;
    if($prev_page < 1) {
      $prev_page = 1;
    }
    
    $rs_str =  "<a href='".$_SERVER['PHP_SELF']."?page=1'><<</a> ";
    
    if($prev_page > 1) {
        $rs_str .=  "<a href='".$_SERVER['PHP_SELF']."?page={$prev_page}'><</a> ";
    }
    
    for($i = $start_page; $i <= $end_page; $i++) {
      if($i == $page) {
        $rs_str .=  $i .' ';
      }else {
        $rs_str .= "<a href='".$_SERVER['PHP_SELF']."?page={$i}'>{$i}</a> ";
      }
    }
    
    $next_page = $end_page + 1;
    if($next_page <= $total_page) {
        $rs_str .= "<a href='".$_SERVER['PHP_SELF']."?page={$next_page}'>></a> ";
    }
    
    if($page < $total_page) {
        $rs_str .= "<a href='".$_SERVER['PHP_SELF']."?page={$total_page}'>>></a> ";
    }
    
    return $rs_str;
    
    }