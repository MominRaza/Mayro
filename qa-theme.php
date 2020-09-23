<?php

class qa_html_theme extends qa_html_theme_base
{
	public function head_metas()
	{
		$this->output('<meta name="viewport" content="width=device-width, initial-scale=1"/>');
		parent::head_metas();
	}

	public function head_css()
	{
		$this->content['css_src'][] = $this->rooturl . 'icons/material-icons.css';
		parent::head_css();
	}

	public function search_button($search)
	{
		$this->output('<button type="submit" class="qa-search-button"><i class="material-icons">search</i></button>');
	}

	public function q_list_item($q_item)
	{
		$this->output('<div class="qa-q-list-item' . rtrim(' ' . @$q_item['classes']) . '" ' . @$q_item['tags'] . '>');

		$this->q_item_main($q_item);
		$this->q_item_stats($q_item);
		$this->q_item_clear();

		$this->output('</div> <!-- END qa-q-list-item -->', '');
	}
}
?>