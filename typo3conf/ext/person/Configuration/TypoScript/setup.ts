plugin.tx_person {
    settings {
        color {
            1 = red
            2 = blue
        }
    }
}


plugin.tx_person_pi1 {
    view {
        templateRootPaths.0 = EXT:person/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_person_pi1.view.templateRootPath}
        partialRootPaths.0 = EXT:person/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_person_pi1.view.partialRootPath}
        layoutRootPaths.0 = EXT:person/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_person_pi1.view.layoutRootPath}
    }
    persistence {
        #storagePid = {$plugin.tx_person_pi1.persistence.storagePid}
        #recursive = 1
    }
    features {
        skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 0
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}


exampleAjax = PAGE
exampleAjax {
    # &type=688684
    typeNum = 688684
    config {
        # < TYPO3 8
        additionalHeaders = Content-Type: application/json

        # >= TYPO3 8
        additionalHeaders.10.header = Content-Type: application/json

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
        extensionName = Person
        pluginName = Pi1
        vendorName = Group
        controller = Person
        action = exampleJson
        switchableControllerActions.Person.1 = exampleJson
    }
}
