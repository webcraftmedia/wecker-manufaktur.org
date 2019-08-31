REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9000, 42, 0, 0, '_SAI_saimod_project', 'action', NULL);

REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9001, 42, 3, 0, '_SAI_saimod_project', 'search', 'STRING');
REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9002, 42, 3, 0, '_SAI_saimod_project', 'page', 'UINT0');

REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9010, 42, 2, 9000, 'project_delete', 'data', 'JSON');
REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9020, 42, 2, 9000, 'project_order', 'data', 'JSON');
REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9030, 42, 2, 9000, 'project_visibility', 'data', 'JSON');
REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9040, 42, 2, 9000, 'project_details', 'project', 'UINT0');

-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9030, 42, 2, 9000, 'contact', 'email', 'STRING');
-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9035, 42, 2, 9000, 'update_contact', 'data', 'JSON');
-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9037, 42, 2, 9000, 'insert_contact', 'data', 'JSON');
-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9039, 42, 2, 9000, 'delete_contact', 'data', 'JSON');

-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9043, 42, 2, 9000, 'send_email', 'data', 'JSON');
-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9045, 42, 2, 9000, 'update_email', 'data', 'JSON');
-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9047, 42, 2, 9000, 'insert_email', 'data', 'JSON');
-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9048, 42, 2, 9000, 'clone_email', 'data', 'JSON');
-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9049, 42, 2, 9000, 'delete_email', 'data', 'JSON');

-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9050, 42, 3, 9000, 'list', 'id', 'UINT0');
-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9055, 42, 2, 9000, 'update_list', 'data', 'JSON');
-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9057, 42, 2, 9000, 'insert_list', 'data', 'JSON');
-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9059, 42, 2, 9000, 'delete_list', 'data', 'JSON');

-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9060, 42, 3, 9000, 'templates', 'type', 'UINT0');
-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9062, 42, 2, 9000, 'template', 'id', 'UINT0');
-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9065, 42, 2, 9000, 'update_template', 'data', 'JSON');
-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9067, 42, 2, 9000, 'insert_template', 'data', 'JSON');
-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9069, 42, 2, 9000, 'delete_template', 'data', 'JSON');

-- REPLACE INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (9070, 42, 2, 9000, 'csvimport', 'list', 'UINT0');