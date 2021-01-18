<?php

get_header();

get_the_content() ? the_content() : get_template_part('error');

get_footer();

