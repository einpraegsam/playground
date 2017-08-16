
plugin.tx_employees_pi1 {
    view {
        # cat=plugin.tx_employees_pi1/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:employees/Resources/Private/Templates/
        # cat=plugin.tx_employees_pi1/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:employees/Resources/Private/Partials/
        # cat=plugin.tx_employees_pi1/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:employees/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_employees_pi1//a; type=string; label=Default storage PID
        storagePid =
    }
}
