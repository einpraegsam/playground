
plugin.tx_person_pi1 {
    view {
        # cat=plugin.tx_person_pi1/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:person/Resources/Private/Templates/
        # cat=plugin.tx_person_pi1/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:person/Resources/Private/Partials/
        # cat=plugin.tx_person_pi1/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:person/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_person_pi1//a; type=string; label=Default storage PID
        storagePid =
    }
}
