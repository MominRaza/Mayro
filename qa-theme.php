<?php

class qa_html_theme extends qa_html_theme_base
{
	private $nav_bar_avatar_size = 52;

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

	public function head_script()
	{
		$jsUrl = $this->rooturl . 'js/main.js?' . QA_VERSION;
		$this->content['script'][] = '<script src="' . $jsUrl . '"></script>';

		parent::head_script();
	}

	public function header()
	{
		$this->output('<div class="qa-header">');

		$this->logo();

		$this->output('<i id="menu-toggle" onclick="toggleMenu()" class="material-icons">menu</i>');
		$this->output('<i id="search-toggle"  onclick="toggleSearch()" class="material-icons">search</i>');

		$this->nav_user_search();
		$this->output($this->ask_button());
		$this->nav_main_sub();
		$this->header_clear();

		$this->output('</div> <!-- END qa-header -->', '');
	}

	public function nav_user_search()
	{
		$this->qam_user_account();
		$this->output('<div id="qa-nav-user">');
		$this->nav('user');
		$this->output('</div>');
		$this->output('<div id="qa-search">');
		$this->search();
		$this->output('</div>');
	}

	public function nav_main_sub()
	{
		$this->output('<div id="qa-nav-main">');
		$this->nav('main');
		$this->output('</div>');
		$this->nav('sub');
	}

	public function search_button($search)
	{
		$this->output('<button type="submit" class="qa-search-button"><i class="material-icons">search</i></button>');
	}

	private function qam_user_account()
	{
		if (qa_is_logged_in()) {
			// get logged-in user avatar
			$handle = qa_get_logged_in_user_field('handle');

			if (QA_FINAL_EXTERNAL_USERS)
				$tobar_avatar = qa_get_external_avatar_html(qa_get_logged_in_user_field('userid'), $this->nav_bar_avatar_size, true);
			else {
				$tobar_avatar = qa_get_user_avatar_html(
					qa_get_logged_in_user_field('flags'),
					qa_get_logged_in_user_field('email'),
					$handle,
					qa_get_logged_in_user_field('avatarblobid'),
					qa_get_logged_in_user_field('avatarwidth'),
					qa_get_logged_in_user_field('avatarheight'),
					$this->nav_bar_avatar_size,
					false
				);
			}

			$avatar = strip_tags($tobar_avatar, '<img>');
		}
		else {
			// display login icon and label
			$avatar = '<i class="material-icons">person</i>';
		}

		// finally output avatar with div tag
		$this->output(
			'<div id="user-toggle" onclick="toggleUser()">',
			$avatar,
			'</div>'
		);
	}

	private function ask_button()
	{
		return
			'<div class="qam-ask">' .
			'<a href="' . qa_path('ask', null, qa_path_to_root()) . '" class="qam-ask-link">' .
			'<i class="material-icons">edit</i>'.
			qa_lang_html('main/nav_ask') .
			'</a>' .
			'</div>';
	}

	public function q_list_item($q_item)
	{
		$this->output('<div class="qa-q-list-item' . rtrim(' ' . @$q_item['classes']) . '" ' . @$q_item['tags'] . '>');

		$this->q_item_main($q_item);
		$this->q_item_stats($q_item);
		$this->q_item_clear();

		$this->output('</div> <!-- END qa-q-list-item -->', '');
	}

	public function search_field($search)
	{
		$this->output('<input type="text" ' .'placeholder="' . $search['button_label'] . '..." ' . $search['field_tags'] . ' value="' . @$search['value'] . '" class="qa-search-field"/>');
	}
}
?>