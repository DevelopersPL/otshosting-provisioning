# Boost.System has been header-only since Boost 1.69, and Boost 1.90 (Ubuntu
# 26.04) finally removed both the stub library and this CMake package config.
# TFS still does find_package(Boost ... COMPONENTS system) and links
# Boost::system, so stand in for the package with an interface target that
# needs no library to link against.
#
# Remove this once upstream TFS stops requesting the component.
if(NOT TARGET Boost::system)
  add_library(Boost::system INTERFACE IMPORTED)
endif()

set(boost_system_FOUND 1)
