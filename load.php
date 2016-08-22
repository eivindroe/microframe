<?php
/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
require '_system/Crypt.php';
require '_config/Config.php';
require '_system/Request.php';
require 'db/Database.php';
require 'db/DBTable_base.php';
require 'db/DBTable.php';
require 'db/GenericObject.php';
require 'db/functions.php';

// Controllers
require '_system/Element.php';
require '_system/FormController.php';
require '_system/FormElement.php';
require '_system/FormElementHidden.php';
require '_system/FormElementText.php';
require '_system/FormElementPassword.php';
require '_system/FormElementTextArea.php';
require '_system/FormElementSelect.php';
require '_system/FormElementButton.php';
require '_system/FormElementRange.php';
require '_system/FormElementRangeSlider.php';
require '_system/FormElementFile.php';
require '_system/ListInterface.php';
require '_system/ListController.php';
require '_system/HtmlList.php';
require '_system/ListColumn.php';
require '_system/ListRow.php';
require '_system/Button.php';
require '_system/Navigation.php';
require '_system/NavigationElement.php';

// Language
require '_lang/Norwegian.php';