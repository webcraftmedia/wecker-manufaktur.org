INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (200, 0, 2, 11, 'newserver', 'address', 'STRING');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (205, 0, 2, 11, 'vote', 'server', 'INT');

-- SAIMOD

INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5011, 42, 2, 5000, 'visible', 'visible', 'INT');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5010, 42, 2, 5000, 'visible', 'id', 'INT');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5008, 42, 2, 5000, 'del', 'id', 'INT');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5005, 42, 2, 5000, 'save', 'description', 'STRING');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5004, 42, 2, 5000, 'save', 'version', 'INT');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5003, 42, 2, 5000, 'save', 'url', 'STRING');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5002, 42, 2, 5000, 'save', 'name', 'STRING');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5001, 42, 2, 5000, 'save', 'id', 'INT');
INSERT INTO `system_api` (`ID`, `group`, `type`, `parentID`, `parentValue`, `name`, `verify`) VALUES (5000, 42, 0, 0, '_SAI_saimod_mojotrollz_servers', 'action', NULL);