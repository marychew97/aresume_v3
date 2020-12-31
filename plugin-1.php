<?php
function adminer_object() {
    // required to run any plugin
    include_once "./plugins/plugin.php";
    
    // autoloader
    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }
    
    $plugins = array(
        // specify enabled plugins here
        // new AdminerDumpXml,
        // new AdminerTinymce,
        // new AdminerFileUpload("data/"),
        // new AdminerSlugify,
        // new AdminerTranslation,
        // new AdminerForeignSystem,
        new FillLoginForm ('pgsql', 'ec2-174-129-253-53.compute-1.amazonaws.com', 'kjoiwgdfgwrxbf', '3678cd37386aa59354c4478a4ea6d4b4016d16b49d83a6585fa07ec907d19dc5', 'd23m1kun1tmsvj')
    );
    
    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
    */
    
    return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include "./adminer-4.7.4.php";
?>