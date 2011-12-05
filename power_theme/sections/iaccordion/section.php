<?php
/*
	Section: iAccordion
	Author: PageLines
	Author URI: http://www.pagelines.com
	Description: An accordion widgetized sidebar
	Class Name: iBPAccordion
	Workswith: sidebar1, sidebar2, sidebar_wrap
*/

class iBPAccordion extends PageLinesSection {

   function section_persistent() { 
		$setup = array(
					'name'			=> $this->name,
					'description' 	=> $this->description, 
		    		'before_widget' => '<h3 id="%1$s" class="%2$s accordion_sidebar drawer-handle">',
		    		'after_widget' 	=> '&nbsp;</div>',
		    		'before_title' 	=> '<a href="#">',
		    		'after_title' 	=> '&nbsp;</a></h3><div class="drawer-content">'
		);
		register_sidebar($setup);
	}

	function section_head(){ ?>

		<script type="text/javascript">
		/* <![CDATA[ */

			jQuery(document).ready(function () {
				
				jQuery("#list_iaccordion").accordion();
		
			});	
		/* ]]> */
		</script>
	
		<?php 
	}

   function section_template() { 
	 	 pagelines_draw_sidebar($this->id, $this->name, null, 'div');
	}
	
	function section_scripts() {  
		
		return array(
				'accordion' => array(
						'file' => $this->base_url . '/jquery.ui.accordion.js',
						'dependancy' => array('jquery'), 
					)
			);
		
	}
}
