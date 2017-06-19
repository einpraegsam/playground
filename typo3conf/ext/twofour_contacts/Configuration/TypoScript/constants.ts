
plugin.tx_twofourcontacts_pi1 {
  view {
    # cat=plugin.tx_twofourcontacts_pi1/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:twofour_contacts/Resources/Private/Templates/
    # cat=plugin.tx_twofourcontacts_pi1/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:twofour_contacts/Resources/Private/Partials/
    # cat=plugin.tx_twofourcontacts_pi1/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:twofour_contacts/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_twofourcontacts_pi1//a; type=string; label=Default storage PID
    storagePid =
  }
}
