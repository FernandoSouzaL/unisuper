<?php
// classe com as variáveis que você quer puxar do back end
class MenuNv3
{
    public $titulo;
    public $id;
    public $url;
    public $submenu;
    public $classes;
}

$menu_name   = 'main-nav';
$locations   = get_nav_menu_locations();
$menu        = wp_get_nav_menu_object($locations[ $menu_name ]);
$menuitems   = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));
$submenu     = false;
$id_anterior = 0;
$set_menu    = false;

foreach( $menuitems as $item ):
    //adiciona o menu
    if (!$item->menu_item_parent){
        // o menu precisa ser adicionado depois de setar seus filhos logo 
        //a variavel setmenu vai certificar que você consiga setar os 
        //filhos do menu corretamente
        if ($set_menu == true) { $menus[] = $myMenu;  $set_menu = false;}
        if ($set_menu == false) { $set_menu = true;}

        $myMenu = new MenuNv3();
        $myMenu->titulo = $item->title;
        $myMenu->id = $item->ID;
        $myMenu->url = $item->url;
        $myMenu->classes = $item->classes;
    } 
    else 
    { 
        //adiciona o submenu
        if ($id_anterior != $item->menu_item_parent) { 
            $mySubmenu = new MenuNv3();
            $mySubmenu->titulo = $item->title;
            $mySubmenu->id = $item->ID;
            $mySubmenu->url = $item->url;
            $mySubmenu->classes = $item->classes;
            $myMenu->submenu[] = $mySubmenu; 
        }
        //adiciona o submenu

        //adiciona o subsubmenu
        if ($id_anterior == $item->menu_item_parent) { 
            $mySubSubmenu = new MenuNv3();
            $mySubSubmenu->titulo = $item->title;
            $mySubSubmenu->id = $item->ID;
            $mySubSubmenu->url =  $item->url;
            $mySubSubmenu->classes = $item->classes;
            $mySubmenu->submenu[] = $mySubSubmenu; 
        }
        if ($id_anterior != $item->menu_item_parent){
            $id_anterior = $item->ID; 
        }
        //adiciona o subsubmenu
    }  
endforeach; 
//necessário para adicionar o último ítem do menu
$menus[] = $myMenu;
?>

<?php 
    $count = 1;
    foreach ($menus as $menu):
        $link = $menu->url;
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $current = $link == $actual_link ? 'c-menu__current' : ''; 
?>
    <?php 
        $classNv1 = '';
        foreach ( $menu->classes as $class ) {
            $classNv1 .= $class . ' ';
        } 
        ?>

    <li class="c-menu__item">
        <a href="<?= $menu->url; ?>" class="o-ttl o-ttl--primary o-ttl--15 o-ttl--upper o-ttl--white <?= $current; ?> <?= $classNv1; ?>">
            <?= $menu->titulo; ?> 
        </a>
            
        <?php if ($menu->submenu): ?>
            <ul class="c-menu__sub">
                <?php foreach ($menu->submenu as $submenu):
                    $linkSubmenu = $submenu->url;
                    $currentNv2 = $linkSubmenu == $actual_link ? 'c-menu__current js-current' : ''; ?>

                    <?php 
                        $classNv2 = '';
                        foreach ( $submenu->classes as $class ) {
                            $classNv2 .= $class . ' ';
                        } 
                    ?>
    
                    <li class="c-menu__item">
                        <a href="<?= $submenu->url; ?>" class="o-ttl o-ttl--primary o-ttl--15 o-ttl--upper o-ttl--white o-ttl--center <?= $currentNv2; ?> <?= $classNv2; ?>">
                            <?= $submenu->titulo; ?> 
                        </a> 
                    </li>
    
                <?php endforeach; ?>
            </ul>          
        <?php endif; ?>
    </li>

<?php $count++; endforeach; ?>