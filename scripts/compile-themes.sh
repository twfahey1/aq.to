# First lets cd up to the top dir, since we're inside of a subdir ROOT/scripts
cd ..
# Base theme
cd web/themes/contrib/aqto_theme_base
npm install
npm run build

# Subtheme
cd ../custom/aqto_custom_subtheme
npm install
npm run build
