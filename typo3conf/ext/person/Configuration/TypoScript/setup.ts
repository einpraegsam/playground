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
        # storagePid = {$plugin.tx_person_pi1.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 0
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
    settings {
        color.1 = red
        color.2 = blue
        foo = bar
        subtitle = Wunderschöne Liste
    }
}
