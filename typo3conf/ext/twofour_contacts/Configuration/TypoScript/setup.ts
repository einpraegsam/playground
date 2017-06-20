plugin.tx_twofourcontacts_pi1 {
  settings {
    administratorUid = {$plugin.tx_twofourcontacts_pi1.settings.administratorUid}
  }
  view {
    templateRootPaths.0 = EXT:twofour_contacts/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_twofourcontacts_pi1.view.templateRootPath}
    partialRootPaths.0 = EXT:twofour_contacts/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_twofourcontacts_pi1.view.partialRootPath}
    layoutRootPaths.0 = EXT:twofour_contacts/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_twofourcontacts_pi1.view.layoutRootPath}
  }
  persistence {
    #storagePid = {$plugin.tx_twofourcontacts_pi1.persistence.storagePid}
    #recursive = 1
  }
  features {
    skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

ajaxSearterm = PAGE
ajaxSearterm {
  typeNum = 101

  config {
    additionalHeaders = Content-Type: application/json
    no_cache = 1
    disableAllHeaderCode = 1
    disablePrefixComment = 1
    xhtml_cleaning = 0
    admPanel = 0
    debug = 0
  }

  10 = USER
  10 {
    userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
    extensionName = TwofourContacts
    pluginName = Pi1
    vendorName = Twofour
    controller = Contact
    action = ajaxSearch
    switchableControllerActions.Contact.1 = ajaxSearch
  }
}
