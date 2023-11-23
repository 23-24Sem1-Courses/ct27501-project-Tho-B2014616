<?php
    function get_catelog() {
        $sql="SELECT * FROM danhmuc ORDER BY name_dm";
        return get_all($sql);
    }
    function showDm($data, $activeCategory){
        $category="";
        foreach ($data as $item) {
            extract($item);
    
            // Check if the current category is the active one
            $isActive = ($sort_name === $activeCategory) ? ' caterory-item--active' : '';
    
            $category .= '<li class="caterory-item' . $isActive . '">
                            <form action="" method="post">
                            <button type="submit" name="dm" class="btn-dm caterory-item__link" value="'.$sort_name.'">'.$name_dm.'</button>
                            </form>
                        </li>';
        } 
        return $category;
    } 
    
?>
