# BoostConfig.cmake looks up each component with an EXACT version match, so
# report back whatever version it happens to ask for.
set(PACKAGE_VERSION "${PACKAGE_FIND_VERSION}")
set(PACKAGE_VERSION_COMPATIBLE TRUE)
set(PACKAGE_VERSION_EXACT TRUE)
