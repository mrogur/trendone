<?php

add_action("customize_register","customize_register");

function customize_register($wp_customize)
{
	$wp_customize->add_section("home_page", array(
		"title" => __("Hero Section", "customizer_hp_sections"),
		"priority" => 30,
	));


	$wp_customize->add_setting("hero_title_setting", array(
		"transport" => "refresh",
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"customizer_hp_title_label",
		array(
			"label" => __("Heading", "customizer_hp_title_label"),
			"section" => "home_page",
			"settings" => "hero_title_setting",
			"type" => "text",
		)
	));

	$wp_customize->add_setting("hero_content_setting", array(
		"default" => "",
		"transport" => "refresh",
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"customizer_hp_content_label",
		array(
			"label" => __("Content For First Section", "customizer_hp_content_label"),
			"section" => "home_page",
			"settings" => "hero_content_setting",
			"type" => "textarea",
		)
	));
}