<?php

Class Site {
    private $sites = array(
        1 => 'taobao',
        2 => 'Google',
        3 => 'Runoob',
        4 => 'Baidu',
        5 => 'Weibo',
        6 => 'taobao',
    );

    public function getAllSite() {
        return $this -> sites;
    }

    public function getSite($id) {

        $site = array($id => ( $this -> sites[$id]) ? $this -> sites[$id] : $this -> sites[1]);
        return $site;

    }
}

?>