REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (900, 42, 'project', 'project', -1, 0, 0, '#content', './sai.php?sai_mod=.SAI.saimod_project&search=${search}&page=${page}', 'init_saimod_project', '\\SAI\\saimod_project');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (910, 42, 'new', 'project', 900, 0, 1, '#content', './sai.php?sai_mod=.SAI.saimod_project&action=project_new', 'init_saimod_project_new', '\\SAI\\saimod_project');
REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (920, 42, 'details', 'project', 900, 0, 1, '#content', './sai.php?sai_mod=.SAI.saimod_project&action=project_details&project=${project}', 'init_saimod_project_details', '\\SAI\\saimod_project');
-- REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (901, 42, 'overview', 'mail', 900, 0, 0, '#content_mail', './sai.php?sai_mod=.SAI.saimod_mail&action=overview', 'init_saimod_mail_overview', '\\SAI\\saimod_mail');

-- REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (910, 42, 'contacts', 'mail', 900, 0, 1, '#content_mail', './sai.php?sai_mod=.SAI.saimod_mail&action=contacts&search=${search}&page=${page}&list=${list}', 'init_saimod_mail_contacts', '\\SAI\\saimod_mail');
-- REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (915, 42, 'contact', 'mail', 900, 0, 1, '#content_mail', './sai.php?sai_mod=.SAI.saimod_mail&action=contact&email=${email}', 'init_saimod_mail_contact', '\\SAI\\saimod_mail');

-- REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (920, 42, 'lists', 'mail', 900, 0, 1, '#content_mail', './sai.php?sai_mod=.SAI.saimod_mail&action=lists', 'init_saimod_mail_lists', '\\SAI\\saimod_mail');
-- REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (925, 42, 'list', 'mail', 900, 0, 1, '#content_mail', './sai.php?sai_mod=.SAI.saimod_mail&action=list&id=${id}', 'init_saimod_mail_list', '\\SAI\\saimod_mail');
-- REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (927, 42, 'list_new', 'mail', 900, 0, 1, '#content_mail', './sai.php?sai_mod=.SAI.saimod_mail&action=list_new', 'init_saimod_mail_list_new', '\\SAI\\saimod_mail');

-- REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (930, 42, 'emails', 'mail', 900, 0, 1, '#content_mail', './sai.php?sai_mod=.SAI.saimod_mail&action=emails', 'init_saimod_mail_emails', '\\SAI\\saimod_mail');
-- REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (935, 42, 'email', 'mail', 900, 0, 1, '#content_mail', './sai.php?sai_mod=.SAI.saimod_mail&action=email&id=${id}', 'init_saimod_mail_email', '\\SAI\\saimod_mail');
-- REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (937, 42, 'email_new', 'mail', 900, 0, 1, '#content_mail', './sai.php?sai_mod=.SAI.saimod_mail&action=email_new', 'init_saimod_mail_email_new', '\\SAI\\saimod_mail');

-- REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (940, 42, 'templates', 'mail', 900, 0, 1, '#content_mail', './sai.php?sai_mod=.SAI.saimod_mail&action=templates&type=${type}', 'init_saimod_mail_templates', '\\SAI\\saimod_mail');
-- REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (945, 42, 'template', 'mail', 900, 0, 1, '#content_mail', './sai.php?sai_mod=.SAI.saimod_mail&action=template&id=${id}', 'init_saimod_mail_template', '\\SAI\\saimod_mail');
-- REPLACE INTO `system_page` (`id`, `group`, `name`, `state`, `parent_id`, `login`, `type`, `div`, `url`, `func`, `php_class`) VALUES (947, 42, 'template_new', 'mail', 900, 0, 1, '#content_mail', './sai.php?sai_mod=.SAI.saimod_mail&action=template_new', 'init_saimod_mail_template_new', '\\SAI\\saimod_mail');