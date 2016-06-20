<?php

class TMZPage
{
    public function get($pageID)
    {
        if( is_string($pageID) )
        {
            $pageHolder = get_page_by_path($pageID);
        }

        $page = new stdClass();
        $page->title = $pageHolder->post_title;
        $page->content = $pageHolder->post_content;

        return $page;
    }
}