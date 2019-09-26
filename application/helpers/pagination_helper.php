<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Chorbazaar Pagination Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Rakesh Falke
 * @link		https://codeigniter.com/user_guide/helpers/form_helper.html
 */

if (!function_exists('pagination_config')) {
  function pagination_config()
  {
    $config['per_page'] = 1;
    // custom paging configuration
    $config['attributes'] = array('class' => 'page-link');
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';

    $config['first_link'] = 'First Page';
    $config['first_tag_open'] = '<li class="paginate_button page-item">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Last Page';
    $config['last_tag_open'] = '<li class="paginate_button page-item">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = 'Next Page';
    $config['next_tag_open'] = '<li class="paginate_button page-item next">';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = 'Prev Page';
    $config['prev_tag_open'] = '<li class="paginate_button page-item previous">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="paginate_button page-item active"><a href="#" class="page-link">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="paginate_button page-item">';
    $config['num_tag_close'] = '</li>';

    return $config;
  }
}
