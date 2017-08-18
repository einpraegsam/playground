plugin.tx_employees_pi1 {
    view {
        templateRootPaths.0 = EXT:employees/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_employees_pi1.view.templateRootPath}
        partialRootPaths.0 = EXT:employees/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_employees_pi1.view.partialRootPath}
        layoutRootPaths.0 = EXT:employees/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_employees_pi1.view.layoutRootPath}
    }
    persistence {
        #storagePid = {$plugin.tx_employees_pi1.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
    settings {
        foo = bar

        color {
            1 {
                value = red
                category = 3
            }
        }
    }
}

# these classes are only used in auto-generated templates
plugin.tx_employees._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-employees table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-employees table th {
        font-weight:bold;
    }

    .tx-employees table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)


suggestAjax = PAGE
suggestAjax {
    typeNum = 847857858
    config {
        additionalHeaders = Content-Type: application/json
        additionalHeaders.10.header = Content-Type: application/json
        no_cache = 1
        disableAllHeaderCode = 1
        disablePrefixComment = 1
        xhtml_cleaning = 0
        admPanel = 0
        debug = 0
    }

    10  = USER
    10 {
        userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
        extensionName = Employees
        pluginName = Pi1
        vendorName = In2code
        controller = Employee
        action = suggestAjax
        switchableControllerActions.Employee.1 = suggestAjax
        features.requireCHashArgumentForActionArguments = 0
    }
}
