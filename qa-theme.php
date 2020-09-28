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

	
	public function body_content()
	{
		$this->body_prefix();
		$this->notices();

		$extratags = isset($this->content['wrapper_tags']) ? $this->content['wrapper_tags'] : '';
		$this->output('<div class="qa-body-wrapper"' . $extratags . '>', '');

		$this->widgets('full', 'top');
		$this->header();
		$this->widgets('full', 'high');

		$this->output('<div class="qam-main-sidepanel">');
		$this->main();
		$this->sidepanel();
		$this->output('</div>');

		$this->widgets('full', 'low');
		$this->footer();
		$this->widgets('full', 'bottom');

		$this->output('</div> <!-- END body-wrapper -->');

		$this->body_suffix();
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

	public function q_item_main($q_item)
	{
		$this->output('<div class="qa-q-item-main">');
		$this->view_count($q_item);
		$this->post_avatar_meta($q_item, 'qa-q-item');
		$this->q_item_title($q_item);
		$this->q_item_content($q_item);
		$this->post_tags($q_item, 'qa-q-item');
		$this->q_item_buttons($q_item);

		$this->output('</div>');
	}
	public function post_avatar_meta($post, $class, $avatarprefix = null, $metaprefix = null, $metaseparator = '<br/>')
	{
		$this->output('<div class="qam-q-post-meta">');
		$this->output('<span class="' . $class . '-avatar-meta">');
		$this->avatar($post, $class, $avatarprefix);
		$this->post_meta($post, $class, $metaprefix, $metaseparator);
		$this->output('</span>');
		$this->output('</div>');
	}

	public function q_view_main($q_view)
	{
		$this->output('<div class="qa-q-view-main">');

		if (isset($q_view['main_form_tags'])) {
			$this->output('<form ' . $q_view['main_form_tags'] . '>'); // form for buttons on question
		}

		$this->post_avatar_meta($q_view, 'qa-q-view');
		$this->view_count($q_view);
		$this->q_view_content($q_view);
		$this->q_view_extra($q_view);
		$this->q_view_follows($q_view);
		$this->q_view_closed($q_view);
		$this->post_tags($q_view, 'qa-q-view');
		$this->q_view_buttons($q_view);

		if (isset($q_view['main_form_tags'])) {
			$this->form_hidden_elements(@$q_view['buttons_form_hidden']);
			$this->output('</form>');
		}

		$this->c_list(@$q_view['c_list'], 'qa-q-view');
		$this->c_form(@$q_view['c_form']);

		$this->output('</div> <!-- END qa-q-view-main -->');
	}

	public function a_item_main($a_item)
	{
		$this->output('<div class="qa-a-item-main">');

		if (isset($a_item['main_form_tags'])) {
			$this->output('<form ' . $a_item['main_form_tags'] . '>'); // form for buttons on answer
		}

		$this->post_avatar_meta($a_item, 'qa-a-item');
		
		if ($a_item['hidden'])
			$this->output('<div class="qa-a-item-hidden">');
		elseif ($a_item['selected'])
			$this->output('<div class="qa-a-item-selected">');

		$this->a_selection($a_item);
		$this->error(@$a_item['error']);
		$this->a_item_content($a_item);

		if ($a_item['hidden'] || $a_item['selected'])
			$this->output('</div>');

		$this->a_item_buttons($a_item);

		if (isset($a_item['main_form_tags'])) {
			$this->form_hidden_elements(@$a_item['buttons_form_hidden']);
			$this->output('</form>');
		}

		$this->c_list(@$a_item['c_list'], 'qa-a-item');
		$this->c_form(@$a_item['c_form']);

		$this->output('</div> <!-- END qa-a-item-main -->');
	}

	public function search_field($search)
	{
		$this->output('<input type="text" ' .'placeholder="' . $search['button_label'] . '..." ' . $search['field_tags'] . ' value="' . @$search['value'] . '" class="qa-search-field"/>');
	}
}
?>